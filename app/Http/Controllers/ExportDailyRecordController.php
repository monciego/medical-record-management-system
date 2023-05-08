<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Exception;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\Settings;

class ExportDailyRecordController extends Controller
{

    // students

    /**
     * Exports the students reports first sem
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
   public function exportStudentsFirstSem($id)
    {
          // this will get the data of students on school year of ${school_year->id} (depends on request), first sem
        $first_sem = 0;
        $datas = Patient::with('school_year', 'user_data')->where('school_year_id', $id)->where('semester', $first_sem)->whereHas('user_data', function ($query) {
            return $query->where('user_patient_role', '=', 'student');
        })->get();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();

         $section->addText('Daily Treatment Record');
         $section->addText('Students');

        $table = array('borderColor'=>'black', 'borderSize'=> 1, 'cellMargin'=>50, 'valign'=>'center');
        $phpWord->addTableStyle('table', $table);
        $table = $section->addTable('table');
        $table->addRow();
        $table->addCell(1750)->addText(htmlspecialchars("DATE"));
        $table->addCell(1750)->addText(htmlspecialchars("NAME OF PATIENT"));
        $table->addCell(1750)->addText(htmlspecialchars("DEPARTMENT"));
        $table->addCell(1750)->addText(htmlspecialchars("COMPLAINTS"));
        $table->addCell(1750)->addText(htmlspecialchars("DIAGNOSIS"));
        $table->addCell(1750)->addText(htmlspecialchars("MEDICINES GIVEN"));
        foreach($datas as $data) {
            $school_year = $data->school_year->school_year;
            $semester = $data->semester;
            $medicines = Str::of($data->patient_prescribed_medicine)->explode('|');
            $medicineData = $medicines->implode(', ');
            $consult_date = \Carbon\Carbon::parse($data->patient_consult_date)->isoFormat('MMM D YYYY');
            $table->addRow();
            $table->addCell(2000)->addText($consult_date);
                      $table->addCell(2000)->addText($data->user_data->user_patient_first_name . " " . $data->user_data->user_patient_middle_name . " " . $data->user_data->user_patient_last_name . " " . $data->user_data->user_patient_suffix);
            $table->addCell(2000)->addText($data->user_data->user_year_department_role);
            $table->addCell(2000)->addText($data->complaints);
            $table->addCell(2000)->addText($data->diagnosis);
            if($data->patient_prescribed_medicine === "") {
                // $table->addCell(2000)->addText($medicineData);
                $table->addCell(2000)->addText('No Medicines Given');
            } else {
                $table->addCell(2000)->addText($medicineData);
            }
        }

        \PhpOffice\PhpWord\Settings::setZipClass(Settings::PCLZIP);

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
          if($semester === 0) {
            $semester_name = '-first-sem';
        } elseif ($semester == 1) {
             $semester_name = '-second-sem';
        } elseif ($semester === 2) {
            $semester_name = '-summer';
        }
            $fileName = $school_year;
            $objWriter->save(storage_path($fileName . $semester_name . '-StudentsDailyRecord.docx'));
        } catch (Exception $e) {
          return redirect('/report/students')->with('danger-message', 'There was no patient on this semester!');
        }

        if($semester === 0) {
            $semester_name = '-first-sem';
        } elseif ($semester == 1) {
             $semester_name = '-second-sem';
        } elseif ($semester === 2) {
            $semester_name = '-summer';
        }
        $fileName = $school_year;
        return response()->download(storage_path($fileName . $semester_name . '-StudentsDailyRecord.docx'))->deleteFileAfterSend(true);
    }
    /**
     * Exports the students reports second sem
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
   public function exportStudentsSecondSem($id)
    {
          // this will get the data of students on school year of ${school_year->id} (depends on request), second sem
        $second_sem = 1;
        $datas = Patient::with('school_year', 'user_data')->where('school_year_id', $id)->where('semester', $second_sem)->whereHas('user_data', function ($query) {
            return $query->where('user_patient_role', '=', 'student');
        })->get();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();

         $section->addText('Daily Treatment Record');
         $section->addText('Students');

        $table = array('borderColor'=>'black', 'borderSize'=> 1, 'cellMargin'=>50, 'valign'=>'center');
        $phpWord->addTableStyle('table', $table);
        $table = $section->addTable('table');
        $table->addRow();
        $table->addCell(1750)->addText(htmlspecialchars("DATE"));
        $table->addCell(1750)->addText(htmlspecialchars("NAME OF PATIENT"));
        $table->addCell(1750)->addText(htmlspecialchars("DEPARTMENT"));
        $table->addCell(1750)->addText(htmlspecialchars("COMPLAINTS"));
        $table->addCell(1750)->addText(htmlspecialchars("DIAGNOSIS"));
        $table->addCell(1750)->addText(htmlspecialchars("MEDICINES GIVEN"));
        foreach($datas as $data) {
            $school_year = $data->school_year->school_year;
            $semester = $data->semester;
            $medicines = Str::of($data->patient_prescribed_medicine)->explode('|');
            $medicineData = $medicines->implode(', ');
            $consult_date = \Carbon\Carbon::parse($data->patient_consult_date)->isoFormat('MMM D YYYY');
            $table->addRow();
            $table->addCell(2000)->addText($consult_date);
            $table->addCell(2000)->addText($data->user_data->user_patient_first_name . " " . $data->user_data->user_patient_middle_name . " " . $data->user_data->user_patient_last_name . " " . $data->user_data->user_patient_suffix);
            $table->addCell(2000)->addText($data->user_data->user_year_department_role);
            $table->addCell(2000)->addText($data->complaints);
            $table->addCell(2000)->addText($data->diagnosis);
            if($data->patient_prescribed_medicine === "") {
                // $table->addCell(2000)->addText($medicineData);
                $table->addCell(2000)->addText('No Medicines Given');
            } else {
                $table->addCell(2000)->addText($medicineData);
            }
        }
        \PhpOffice\PhpWord\Settings::setZipClass(Settings::PCLZIP);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
          if($semester === 0) {
            $semester_name = '-first-sem';
        } elseif ($semester == 1) {
             $semester_name = '-second-sem';
        } elseif ($semester === 2) {
            $semester_name = '-summer';
        }
            $fileName = $school_year;
            $objWriter->save(storage_path($fileName . $semester_name . '-StudentsDailyRecord.docx'));
        } catch (Exception $e) {
          return redirect('/report/students')->with('danger-message', 'There was no patient on this semester!');
        }

        if($semester === 0) {
            $semester_name = '-first-sem';
        } elseif ($semester == 1) {
             $semester_name = '-second-sem';
        } elseif ($semester === 2) {
            $semester_name = '-summer';
        }
        $fileName = $school_year;
        return response()->download(storage_path($fileName . $semester_name . '-StudentsDailyRecord.docx'))->deleteFileAfterSend(true);
    }

    /**
     * Exports the students reports summer
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
   public function exportStudentsSummer($id)
    {
          // this will get the data of students on school year of ${school_year->id} (depends on request), summer
        $summer = 2;
        $datas = Patient::with('school_year', 'user_data')->where('school_year_id', $id)->where('semester', $summer)->whereHas('user_data', function ($query) {
            return $query->where('user_patient_role', '=', 'student');
        })->get();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();

         $section->addText('Daily Treatment Record');
         $section->addText('Students');

        $table = array('borderColor'=>'black', 'borderSize'=> 1, 'cellMargin'=>50, 'valign'=>'center');
        $phpWord->addTableStyle('table', $table);
        $table = $section->addTable('table');
        $table->addRow();
        $table->addCell(1750)->addText(htmlspecialchars("DATE"));
        $table->addCell(1750)->addText(htmlspecialchars("NAME OF PATIENT"));
        $table->addCell(1750)->addText(htmlspecialchars("DEPARTMENT"));
        $table->addCell(1750)->addText(htmlspecialchars("COMPLAINTS"));
        $table->addCell(1750)->addText(htmlspecialchars("DIAGNOSIS"));
        $table->addCell(1750)->addText(htmlspecialchars("MEDICINES GIVEN"));
        foreach($datas as $data) {
            $school_year = $data->school_year->school_year;
            $semester = $data->semester;
            $medicines = Str::of($data->patient_prescribed_medicine)->explode('|');
            $medicineData = $medicines->implode(', ');
            $consult_date = \Carbon\Carbon::parse($data->patient_consult_date)->isoFormat('MMM D YYYY');
            $table->addRow();
            $table->addCell(2000)->addText($consult_date);
           $table->addCell(2000)->addText($data->user_data->user_patient_first_name . " " . $data->user_data->user_patient_middle_name . " " . $data->user_data->user_patient_last_name . " " . $data->user_data->user_patient_suffix);
            $table->addCell(2000)->addText($data->user_data->user_year_department_role);
            $table->addCell(2000)->addText($data->complaints);
            $table->addCell(2000)->addText($data->diagnosis);
            if($data->patient_prescribed_medicine === "") {
                // $table->addCell(2000)->addText($medicineData);
                $table->addCell(2000)->addText('No Medicines Given');
            } else {
                $table->addCell(2000)->addText($medicineData);
            }
        }
                \PhpOffice\PhpWord\Settings::setZipClass(Settings::PCLZIP);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
          if($semester === 0) {
            $semester_name = '-first-sem';
        } elseif ($semester == 1) {
             $semester_name = '-second-sem';
        } elseif ($semester === 2) {
            $semester_name = '-summer';
        }
            $fileName = $school_year;
            $objWriter->save(storage_path($fileName . $semester_name . '-StudentsDailyRecord.docx'));
        } catch (Exception $e) {
          return redirect('/report/students')->with('danger-message', 'There was no patient on this semester!');
        }

        if($semester === 0) {
            $semester_name = '-first-sem';
        } elseif ($semester == 1) {
             $semester_name = '-second-sem';
        } elseif ($semester === 2) {
            $semester_name = '-summer';
        }
        $fileName = $school_year;
        return response()->download(storage_path($fileName . $semester_name . '-StudentsDailyRecord.docx'))->deleteFileAfterSend(true);
    }

    /* ============ */

    // teaching staffs

    /**
     * Exports the teaching reports first sem
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
   public function exportTeachingFirstSem($id)
    {
          // this will get the data of teaching staff on school year of ${school_year->id} (depends on request), first sem
        $first_sem = 0;
        $datas = Patient::with('school_year', 'user_data')->where('school_year_id', $id)->where('semester', $first_sem)->whereHas('user_data', function ($query) {
            return $query->where('user_patient_role', '=', 'teaching_staff');
        })->get();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();

         $section->addText('Daily Treatment Record');
         $section->addText('Teaching Staffs');

        $table = array('borderColor'=>'black', 'borderSize'=> 1, 'cellMargin'=>50, 'valign'=>'center');
        $phpWord->addTableStyle('table', $table);
        $table = $section->addTable('table');
        $table->addRow();
        $table->addCell(1750)->addText(htmlspecialchars("DATE"));
        $table->addCell(1750)->addText(htmlspecialchars("NAME OF PATIENT"));
        $table->addCell(1750)->addText(htmlspecialchars("DEPARTMENT"));
        $table->addCell(1750)->addText(htmlspecialchars("COMPLAINTS"));
        $table->addCell(1750)->addText(htmlspecialchars("DIAGNOSIS"));
        $table->addCell(1750)->addText(htmlspecialchars("MEDICINES GIVEN"));
        foreach($datas as $data) {
            $school_year = $data->school_year->school_year;
            $semester = $data->semester;
            $medicines = Str::of($data->patient_prescribed_medicine)->explode('|');
            $medicineData = $medicines->implode(', ');
            $consult_date = \Carbon\Carbon::parse($data->patient_consult_date)->isoFormat('MMM D YYYY');
            $table->addRow();
            $table->addCell(2000)->addText($consult_date);
            $table->addCell(2000)->addText($data->user_data->user_patient_first_name . " " . $data->user_data->user_patient_middle_name . " " . $data->user_data->user_patient_last_name . " " . $data->user_data->user_patient_suffix);
            $table->addCell(2000)->addText($data->user_data->user_year_department_role);
            $table->addCell(2000)->addText($data->complaints);
            $table->addCell(2000)->addText($data->diagnosis);
            if($data->patient_prescribed_medicine === "") {
                // $table->addCell(2000)->addText($medicineData);
                $table->addCell(2000)->addText('No Medicines Given');
            } else {
                $table->addCell(2000)->addText($medicineData);
            }
        }
                \PhpOffice\PhpWord\Settings::setZipClass(Settings::PCLZIP);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
          if($semester === 0) {
            $semester_name = '-first-sem';
        } elseif ($semester == 1) {
             $semester_name = '-second-sem';
        } elseif ($semester === 2) {
            $semester_name = '-summer';
        }
            $fileName = $school_year;
            $objWriter->save(storage_path($fileName . $semester_name . '-TeachingStaffsDailyRecord.docx'));
        } catch (Exception $e) {
          return redirect('/report/teaching-staffs')->with('danger-message', 'There was no patient on this semester!');
        }

        if($semester === 0) {
            $semester_name = '-first-sem';
        } elseif ($semester == 1) {
             $semester_name = '-second-sem';
        } elseif ($semester === 2) {
            $semester_name = '-summer';
        }
        $fileName = $school_year;
        return response()->download(storage_path($fileName . $semester_name . '-TeachingStaffsDailyRecord.docx'))->deleteFileAfterSend(true);
    }
    /**
     * Exports the teaching reports second sem
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
   public function exportTeachingSecondSem($id)
    {
          // this will get the data of teaching staff on school year of ${school_year->id} (depends on request), second sem
        $second_sem = 1;
        $datas = Patient::with('school_year', 'user_data')->where('school_year_id', $id)->where('semester', $second_sem)->whereHas('user_data', function ($query) {
            return $query->where('user_patient_role', '=', 'teaching_staff');
        })->get();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();

         $section->addText('Daily Treatment Record');
         $section->addText('Teaching Staffs');

        $table = array('borderColor'=>'black', 'borderSize'=> 1, 'cellMargin'=>50, 'valign'=>'center');
        $phpWord->addTableStyle('table', $table);
        $table = $section->addTable('table');
        $table->addRow();
        $table->addCell(1750)->addText(htmlspecialchars("DATE"));
        $table->addCell(1750)->addText(htmlspecialchars("NAME OF PATIENT"));
        $table->addCell(1750)->addText(htmlspecialchars("DEPARTMENT"));
        $table->addCell(1750)->addText(htmlspecialchars("COMPLAINTS"));
        $table->addCell(1750)->addText(htmlspecialchars("DIAGNOSIS"));
        $table->addCell(1750)->addText(htmlspecialchars("MEDICINES GIVEN"));
        foreach($datas as $data) {
            $school_year = $data->school_year->school_year;
            $semester = $data->semester;
            $medicines = Str::of($data->patient_prescribed_medicine)->explode('|');
            $medicineData = $medicines->implode(', ');
            $consult_date = \Carbon\Carbon::parse($data->patient_consult_date)->isoFormat('MMM D YYYY');
            $table->addRow();
            $table->addCell(2000)->addText($consult_date);
            $table->addCell(2000)->addText($data->user_data->user_patient_first_name . " " . $data->user_data->user_patient_middle_name . " " . $data->user_data->user_patient_last_name . " " . $data->user_data->user_patient_suffix);
            $table->addCell(2000)->addText($data->user_data->user_year_department_role);
            $table->addCell(2000)->addText($data->complaints);
            $table->addCell(2000)->addText($data->diagnosis);
            if($data->patient_prescribed_medicine === "") {
                // $table->addCell(2000)->addText($medicineData);
                $table->addCell(2000)->addText('No Medicines Given');
            } else {
                $table->addCell(2000)->addText($medicineData);
            }
        }
                \PhpOffice\PhpWord\Settings::setZipClass(Settings::PCLZIP);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
          if($semester === 0) {
            $semester_name = '-first-sem';
        } elseif ($semester == 1) {
             $semester_name = '-second-sem';
        } elseif ($semester === 2) {
            $semester_name = '-summer';
        }
            $fileName = $school_year;
            $objWriter->save(storage_path($fileName . $semester_name . '-TeachingStaffsDailyRecord.docx'));
        } catch (Exception $e) {
          return redirect('/report/teaching-staffs')->with('danger-message', 'There was no patient on this semester!');
        }

        if($semester === 0) {
            $semester_name = '-first-sem';
        } elseif ($semester == 1) {
             $semester_name = '-second-sem';
        } elseif ($semester === 2) {
            $semester_name = '-summer';
        }
        $fileName = $school_year;
        return response()->download(storage_path($fileName . $semester_name . '-TeachingStaffsDailyRecord.docx'))->deleteFileAfterSend(true);
    }
    /**
     * Exports the teaching report summer
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
   public function exportTeachingSummer($id)
    {
          // this will get the data of teaching staff on school year of ${school_year->id} (depends on request), summer
        $summer = 2;
        $datas = Patient::with('school_year', 'user_data')->where('school_year_id', $id)->where('semester', $summer)->whereHas('user_data', function ($query) {
            return $query->where('user_patient_role', '=', 'teaching_staff');
        })->get();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();

         $section->addText('Daily Treatment Record');
         $section->addText('Teaching Staffs');

        $table = array('borderColor'=>'black', 'borderSize'=> 1, 'cellMargin'=>50, 'valign'=>'center');
        $phpWord->addTableStyle('table', $table);
        $table = $section->addTable('table');
        $table->addRow();
        $table->addCell(1750)->addText(htmlspecialchars("DATE"));
        $table->addCell(1750)->addText(htmlspecialchars("NAME OF PATIENT"));
        $table->addCell(1750)->addText(htmlspecialchars("DEPARTMENT"));
        $table->addCell(1750)->addText(htmlspecialchars("COMPLAINTS"));
        $table->addCell(1750)->addText(htmlspecialchars("DIAGNOSIS"));
        $table->addCell(1750)->addText(htmlspecialchars("MEDICINES GIVEN"));
        foreach($datas as $data) {
            $school_year = $data->school_year->school_year;
            $semester = $data->semester;
            $medicines = Str::of($data->patient_prescribed_medicine)->explode('|');
            $medicineData = $medicines->implode(', ');
            $consult_date = \Carbon\Carbon::parse($data->patient_consult_date)->isoFormat('MMM D YYYY');
            $table->addRow();
            $table->addCell(2000)->addText($consult_date);
            $table->addCell(2000)->addText($data->user_data->user_patient_first_name . " " . $data->user_data->user_patient_middle_name . " " . $data->user_data->user_patient_last_name . " " . $data->user_data->user_patient_suffix);
            $table->addCell(2000)->addText($data->user_data->user_year_department_role);
            $table->addCell(2000)->addText($data->complaints);
            $table->addCell(2000)->addText($data->diagnosis);
            if($data->patient_prescribed_medicine === "") {
                // $table->addCell(2000)->addText($medicineData);
                $table->addCell(2000)->addText('No Medicines Given');
            } else {
                $table->addCell(2000)->addText($medicineData);
            }
        }
                \PhpOffice\PhpWord\Settings::setZipClass(Settings::PCLZIP);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
          if($semester === 0) {
            $semester_name = '-first-sem';
        } elseif ($semester == 1) {
             $semester_name = '-second-sem';
        } elseif ($semester === 2) {
            $semester_name = '-summer';
        }
            $fileName = $school_year;
            $objWriter->save(storage_path($fileName . $semester_name . '-TeachingStaffsDailyRecord.docx'));
        } catch (Exception $e) {
          return redirect('/report/teaching-staffs')->with('danger-message', 'There was no patient on this semester!');
        }

        if($semester === 0) {
            $semester_name = '-first-sem';
        } elseif ($semester == 1) {
             $semester_name = '-second-sem';
        } elseif ($semester === 2) {
            $semester_name = '-summer';
        }
        $fileName = $school_year;
        return response()->download(storage_path($fileName . $semester_name . '-TeachingStaffsDailyRecord.docx'))->deleteFileAfterSend(true);
    }

    /* =========== */
    // non - teaching

    /**
     * Exports the non teaching reports first sem
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
   public function exportNonTeachingFirstSem($id)
    {
          // this will get the data of non teachign staff on school year of ${school_year->id} (depends on request), first sem
        $first_sem = 0;
        $datas = Patient::with('school_year', 'user_data')->where('school_year_id', $id)->where('semester', $first_sem)->whereHas('user_data', function ($query) {
            return $query->where('user_patient_role', '=', 'non_teaching_staff');
        })->get();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();

         $section->addText('Daily Treatment Record');
         $section->addText('Non-Teaching');

        $table = array('borderColor'=>'black', 'borderSize'=> 1, 'cellMargin'=>50, 'valign'=>'center');
        $phpWord->addTableStyle('table', $table);
        $table = $section->addTable('table');
        $table->addRow();
        $table->addCell(1750)->addText(htmlspecialchars("DATE"));
        $table->addCell(1750)->addText(htmlspecialchars("NAME OF PATIENT"));
        $table->addCell(1750)->addText(htmlspecialchars("DEPARTMENT"));
        $table->addCell(1750)->addText(htmlspecialchars("COMPLAINTS"));
        $table->addCell(1750)->addText(htmlspecialchars("DIAGNOSIS"));
        $table->addCell(1750)->addText(htmlspecialchars("MEDICINES GIVEN"));
        foreach($datas as $data) {
            $school_year = $data->school_year->school_year;
            $semester = $data->semester;
            $medicines = Str::of($data->patient_prescribed_medicine)->explode('|');
            $medicineData = $medicines->implode(', ');
            $consult_date = \Carbon\Carbon::parse($data->patient_consult_date)->isoFormat('MMM D YYYY');
            $table->addRow();
            $table->addCell(2000)->addText($consult_date);
            $table->addCell(2000)->addText($data->user_data->user_patient_first_name . " " . $data->user_data->user_patient_middle_name . " " . $data->user_data->user_patient_last_name . " " . $data->user_data->user_patient_suffix);
            $table->addCell(2000)->addText($data->user_data->user_year_department_role);
            $table->addCell(2000)->addText($data->complaints);
            $table->addCell(2000)->addText($data->diagnosis);
            if($data->patient_prescribed_medicine === "") {
                // $table->addCell(2000)->addText($medicineData);
                $table->addCell(2000)->addText('No Medicines Given');
            } else {
                $table->addCell(2000)->addText($medicineData);
            }
        }
                \PhpOffice\PhpWord\Settings::setZipClass(Settings::PCLZIP);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
          if($semester === 0) {
            $semester_name = '-first-sem';
        } elseif ($semester == 1) {
             $semester_name = '-second-sem';
        } elseif ($semester === 2) {
            $semester_name = '-summer';
        }
            $fileName = $school_year;
            $objWriter->save(storage_path($fileName . $semester_name . '-NonTeachingDailyRecord.docx'));
        } catch (Exception $e) {
          return redirect('/report/non-teaching-staffs')->with('danger-message', 'There was no patient on this semester!');
        }

        if($semester === 0) {
            $semester_name = '-first-sem';
        } elseif ($semester == 1) {
             $semester_name = '-second-sem';
        } elseif ($semester === 2) {
            $semester_name = '-summer';
        }
        $fileName = $school_year;
        return response()->download(storage_path($fileName . $semester_name . '-NonTeachingDailyRecord.docx'))->deleteFileAfterSend(true);
    }

    /**
     * Exports the non teaching reports second sem
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
   public function exportNonTeachingSecondSem($id)
    {
          // this will get the data of non teachign staff on school year of ${school_year->id} (depends on request), second sem
        $second_sem = 1;
        $datas = Patient::with('school_year', 'user_data')->where('school_year_id', $id)->where('semester', $second_sem)->whereHas('user_data', function ($query) {
            return $query->where('user_patient_role', '=', 'non_teaching_staff');
        })->get();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();

         $section->addText('Daily Treatment Record');
         $section->addText('Non-Teaching');

        $table = array('borderColor'=>'black', 'borderSize'=> 1, 'cellMargin'=>50, 'valign'=>'center');
        $phpWord->addTableStyle('table', $table);
        $table = $section->addTable('table');
        $table->addRow();
        $table->addCell(1750)->addText(htmlspecialchars("DATE"));
        $table->addCell(1750)->addText(htmlspecialchars("NAME OF PATIENT"));
        $table->addCell(1750)->addText(htmlspecialchars("DEPARTMENT"));
        $table->addCell(1750)->addText(htmlspecialchars("COMPLAINTS"));
        $table->addCell(1750)->addText(htmlspecialchars("DIAGNOSIS"));
        $table->addCell(1750)->addText(htmlspecialchars("MEDICINES GIVEN"));
        foreach($datas as $data) {
            $school_year = $data->school_year->school_year;
            $semester = $data->semester;
            $medicines = Str::of($data->patient_prescribed_medicine)->explode('|');
            $medicineData = $medicines->implode(', ');
            $consult_date = \Carbon\Carbon::parse($data->patient_consult_date)->isoFormat('MMM D YYYY');
            $table->addRow();
            $table->addCell(2000)->addText($consult_date);
            $table->addCell(2000)->addText($data->user_data->user_patient_first_name . " " . $data->user_data->user_patient_middle_name . " " . $data->user_data->user_patient_last_name . " " . $data->user_data->user_patient_suffix);
            $table->addCell(2000)->addText($data->user_data->user_year_department_role);
            $table->addCell(2000)->addText($data->complaints);
            $table->addCell(2000)->addText($data->diagnosis);
            if($data->patient_prescribed_medicine === "") {
                // $table->addCell(2000)->addText($medicineData);
                $table->addCell(2000)->addText('No Medicines Given');
            } else {
                $table->addCell(2000)->addText($medicineData);
            }
        }
                \PhpOffice\PhpWord\Settings::setZipClass(Settings::PCLZIP);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
          if($semester === 0) {
            $semester_name = '-first-sem';
        } elseif ($semester == 1) {
             $semester_name = '-second-sem';
        } elseif ($semester === 2) {
            $semester_name = '-summer';
        }
            $fileName = $school_year;
            $objWriter->save(storage_path($fileName . $semester_name . '-NonTeachingDailyRecord.docx'));
        } catch (Exception $e) {
             return redirect('/report/non-teaching-staffs')->with('danger-message', 'There was no patient on this semester!');
        }

        if($semester === 0) {
            $semester_name = '-first-sem';
        } elseif ($semester == 1) {
             $semester_name = '-second-sem';
        } elseif ($semester === 2) {
            $semester_name = '-summer';
        }
        $fileName = $school_year;
        return response()->download(storage_path($fileName . $semester_name . '-NonTeachingDailyRecord.docx'))->deleteFileAfterSend(true);
    }

    /**
     * Exports the non teaching reports summer
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
   public function exportNonTeachingSummer($id)
    {
          // this will get the data of non teachign staff on school year of ${school_year->id} (depends on request), summer
        $summer =  2;
        $datas = Patient::with('school_year', 'user_data')->where('school_year_id', $id)->where('semester', $summer)->whereHas('user_data', function ($query) {
            return $query->where('user_patient_role', '=', 'non_teaching_staff');
        })->get();

     /*    if(Patient::with('school_year', 'user_data')->where('school_year_id', $id)->where('semester', $summer) === true) {
            dd('true');
        } else {
            dd('false');
        } */

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();

         $section->addText('Daily Treatment Record');
         $section->addText('Non-Teaching');

        $table = array('borderColor'=>'black', 'borderSize'=> 1, 'cellMargin'=>50, 'valign'=>'center');
        $phpWord->addTableStyle('table', $table);
        $table = $section->addTable('table');
        $table->addRow();
        $table->addCell(1750)->addText(htmlspecialchars("DATE"));
        $table->addCell(1750)->addText(htmlspecialchars("NAME OF PATIENT"));
        $table->addCell(1750)->addText(htmlspecialchars("DEPARTMENT"));
        $table->addCell(1750)->addText(htmlspecialchars("COMPLAINTS"));
        $table->addCell(1750)->addText(htmlspecialchars("DIAGNOSIS"));
        $table->addCell(1750)->addText(htmlspecialchars("MEDICINES GIVEN"));
        foreach($datas as $data) {
            $school_year = $data->school_year->school_year;
            $semester = $data->semester;
            $medicines = Str::of($data->patient_prescribed_medicine)->explode('|');
            $medicineData = $medicines->implode(', ');
            $consult_date = \Carbon\Carbon::parse($data->patient_consult_date)->isoFormat('MMM D YYYY');
            $table->addRow();
            $table->addCell(2000)->addText($consult_date);
           $table->addCell(2000)->addText($data->user_data->user_patient_first_name . " " . $data->user_data->user_patient_middle_name . " " . $data->user_data->user_patient_last_name . " " . $data->user_data->user_patient_suffix);
            $table->addCell(2000)->addText($data->user_data->user_year_department_role);
            $table->addCell(2000)->addText($data->complaints);
            $table->addCell(2000)->addText($data->diagnosis);
            if($data->patient_prescribed_medicine === "") {
                // $table->addCell(2000)->addText($medicineData);
                $table->addCell(2000)->addText('No Medicines Given');
            } else {
                $table->addCell(2000)->addText($medicineData);
            }
        }
                \PhpOffice\PhpWord\Settings::setZipClass(Settings::PCLZIP);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
          if($semester === 0) {
            $semester_name = '-first-sem';
        } elseif ($semester == 1) {
             $semester_name = '-second-sem';
        } elseif ($semester === 2) {
            $semester_name = '-summer';
        }
            $fileName = $school_year;
            $objWriter->save(storage_path($fileName . $semester_name . '-NonTeachingDailyRecord.docx'));
        } catch (Exception $e) {
             return redirect('/report/non-teaching-staffs')->with('danger-message', 'There was no patient on this semester!');
        }

        if($semester === 0) {
            $semester_name = '-first-sem';
        } elseif ($semester == 1) {
             $semester_name = '-second-sem';
        } elseif ($semester === 2) {
            $semester_name = '-summer';
        }
        $fileName = $school_year;
        return response()->download(storage_path($fileName . $semester_name . '-NonTeachingDailyRecord.docx'))->deleteFileAfterSend(true);
    }
}
