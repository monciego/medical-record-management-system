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
        $table->addCell(1750)->addText(htmlspecialchars("#"));
        $table->addCell(1750)->addText(htmlspecialchars("Medicines Given or Distributed"));
        $table->addCell(1750)->addText(htmlspecialchars("No. of Students"));
        $table->addCell(1750)->addText(htmlspecialchars("No. of Faculty"));
        $table->addCell(1750)->addText(htmlspecialchars("No. of Staff"));
            foreach($datas as $data) {
        /*     $school_year = $data->school_year->school_year;
        $consult_date = \Carbon\Carbon::parse($data->patient_consult_date)->isoFormat('MMM D YYYY');
            $semester = $data->semester; */

            $medicines = Str::of($data->patient_prescribed_medicine)->explode('|');
            $quantity = Str::of($data->patient_prescribed_medicine_quantity)->explode('|');
            $student_value = '';
            if ($data->user_data->user_patient_role === 'student') {
                $student_value = '1';
            } else {
                $student_value = '0';
            }

            $faculty_value = '';
            if ($data->user_data->user_patient_role === 'teaching_staff') {
                $faculty_value = '1';
            } else {
                $faculty_value = '0';
            }

            $staff_value = '';
            if ($data->user_data->user_patient_role === 'non_teaching_staff') {
                $staff_value = '1';
            } else {
                $staff_value = '0';
            }

            $table->addRow();
            $table->addCell(2000)->addText($quantity->implode(', '));
             if($data->patient_prescribed_medicine == '') {
                 $table->addCell(2000)->addText(htmlspecialchars("No Prescribed Medicine"));
            } else {
            $table->addCell(2000)->addText($medicines->implode(', '));

            }
            $table->addCell(2000)->addText($student_value );
            $table->addCell(2000)->addText($faculty_value);
            $table->addCell(2000)->addText($staff_value);
       /*   */
        }
        $table->addRow();
        $table->addCell(1750)->addText(htmlspecialchars("No. of Medicines Given"));
        $table->addCell(1750)->addText(htmlspecialchars(""));
        $table->addCell(1750)->addText($student);
        $table->addCell(1750)->addText($total_teaching_staff);
        $table->addCell(1750)->addText($staff);

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
