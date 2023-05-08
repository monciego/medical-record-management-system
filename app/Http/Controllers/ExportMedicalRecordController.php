<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\Settings;

class ExportMedicalRecordController extends Controller
{
        /**
     * Exports the medical record
     *
     *
     * @return \Illuminate\Http\Response
     */
   public function medicalReport()
    {

        $datas = Patient::latest()->with('user_data', 'school_year')->get();

        // extract certain values from the collection with a role of teaching staff
        $teaching_staff = Patient::with('user_data')->whereHas('user_data', function ($query) {
            return $query->where('user_patient_role', '=', 'teaching_staff');
        })->pluck('patient_prescribed_medicine_quantity');

        // seperate the extracted data to | an
        $output = $teaching_staff->implode('|');

        //  breaks the $output string into an array
        $exploded = explode('|', $output);

        // get the sum of $exploded array
        $total_teaching_staff = array_sum($exploded);

        // ==============================================

        // extract certain values from the collection with a role of student
        $student = Patient::with('user_data')->whereHas('user_data', function ($query) {
            return $query->where('user_patient_role', '=', 'student');
        })->pluck('patient_prescribed_medicine_quantity');

        // seperate the extracted data to | an
        $output_student = $student->implode('|');

        //  breaks the $output string into an array
        $exploded_student = explode('|', $output_student);

        // get the sum of $exploded array
        $student = array_sum($exploded_student);

        // ==============================================

        // extract certain values from the collection with a role of non_teaching_staff
        $staff = Patient::with('user_data')->whereHas('user_data', function ($query) {
            return $query->where('user_patient_role', '=', 'non_teaching_staff');
        })->pluck('patient_prescribed_medicine_quantity');

        // seperate the extracted data to | an
        $output_staff = $staff->implode('|');

        //  breaks the $output string into an array
        $exploded_staff = explode('|', $output_staff);

        // get the sum of $exploded array
        $staff = array_sum($exploded_staff);

         $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $section->addImage('images/logo.png', array('width' => 42, 'height' => 42, 'marginLeft' => 20, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
        $section->addText('Pangasinan State University',  [], [ 'align' => \PhpOffice\PhpWord\Style\Cell::VALIGN_CENTER ]);
        $section->addText('MEDICAL-DENTAL UNIT',  [], [ 'align' => \PhpOffice\PhpWord\Style\Cell::VALIGN_CENTER ]);

        $table = array('borderColor'=>'black', 'borderSize'=> 1, 'cellMargin'=>50, 'valign'=>'center');
        $phpWord->addTableStyle('table', $table);
        $table = $section->addTable('table');
        $table->addRow();
        $table->addCell(1750)->addText(htmlspecialchars("Medicines Given or Distributed"));
        $table->addCell(1750)->addText(htmlspecialchars("No. of Medicines Given"));
        $table->addCell(1750)->addText(htmlspecialchars("No. of Students"));
        $table->addCell(1750)->addText(htmlspecialchars("No. of Faculty"));
        $table->addCell(1750)->addText(htmlspecialchars("No. of Staff"));


        // logic
                $medicineQuantities = [
            'students' => 0,
            'faculty' => 0,
            'staff' => 0,
            ];
            $medicines = [];
            $totalStudents = 0;
            $totalFaculty = 0;
            $totalStaff = 0;
            $totalMedicineQuantity = 0;

            foreach ($datas as $data) {
            $prescribedMedicines = explode('|', $data->patient_prescribed_medicine);
            $prescribedQuantities = explode('|', $data->patient_prescribed_medicine_quantity);
            $role = $data->user_data->user_patient_role;

            foreach ($prescribedMedicines as $index => $medicine) {
            $quantity = (int)$prescribedQuantities[$index];

            if ($quantity == 0) {
            continue; // skip adding quantity if it's 0
            }

            if (!array_key_exists($medicine, $medicines)) {
            $medicines[$medicine] = [
            'quantity' => 0,
            'students' => 0,
            'faculty' => 0,
            'staff' => 0,
            ];
            }

            $medicines[$medicine]['quantity'] += $quantity;


            if ($role === 'student') {
            $medicines[$medicine]['students'] += 1;
            $totalStudents += 1;
            } elseif ($role === 'teaching_staff') {
            $medicines[$medicine]['faculty'] += 1;
            $totalFaculty += 1;
            } elseif ($role === 'non_teaching_staff') {
                $medicines[$medicine]['staff'] += 1;
                $totalStaff += 1;
            }
        }}

            foreach ($medicines as $medicine) {
            $totalMedicineQuantity += $medicine['quantity'];
        }

        foreach($medicines as $medicine => $values) {
            $table->addRow();
            $table->addCell(2000)->addText($medicine);
            $table->addCell(2000)->addText($values['quantity'] );
            $table->addCell(2000)->addText($values['students'] );
            $table->addCell(2000)->addText($values['faculty'] );
            $table->addCell(2000)->addText($values['staff'] );
        }
        $table->addRow();
        $table->addCell(1750)->addText(htmlspecialchars("TOTAL"));
        $table->addCell(1750)->addText($totalMedicineQuantity);
        $table->addCell(1750)->addText($totalStudents);
        $table->addCell(1750)->addText($totalFaculty);
        $table->addCell(1750)->addText($totalStaff);

        \PhpOffice\PhpWord\Settings::setZipClass(Settings::PCLZIP);

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
            try {
            $objWriter->save(storage_path('MedicalReport.docx'));
        } catch (Exception $e) {
          return redirect('/medicine-record')->with('danger-message', 'Error!');
        }

        return response()->download(storage_path('MedicalReport.docx'))->deleteFileAfterSend(true);
    }
}
