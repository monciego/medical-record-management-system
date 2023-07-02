<?php

namespace App\Http\Controllers;

use App\Models\ExaminationReport;
use App\Http\Requests\StoreExaminationReportRequest;
use App\Http\Requests\UpdateExaminationReportRequest;
use App\Models\SchoolYear;
use App\Models\UserPatient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class ExaminationReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examine_records =  UserPatient::latest()->with('examination_reports')->has('examination_reports')->filter(request(['role', 'search']))->paginate(6);
        return view('pages.admin.medical-examination-report.index', compact('examine_records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $formFields = $request->validate([
            // checkbox
            'pre_employment' => 'nullable' ,
            'annual' => 'nullable',
            'ojt' => 'nullable',
            // basic information
            'date_of_examination' => 'nullable',
            'address' => 'nullable',
            // medical history
            'present_symptoms' => 'nullable',
            'past_medical_history' => 'nullable',
            'family_medical_history' => 'nullable',
            'history_of_operations' => 'nullable',
            'allergies' => 'nullable',
            'gynecological_obstetrics_history' => 'nullable',
            'personal_social_history' => 'nullable',
            // physical examination
            'general_survey' => 'nullable',
            'height' => 'nullable',
            'weight' => 'nullable',
            'blood_pressure' => 'nullable',
            'heart_rate' => 'nullable',
            'respiratory_rate' => 'nullable',
            'temperature' => 'nullable',
            'skin' => 'nullable',
            'heent' => 'nullable',
            'chest_and_lungs' => 'nullable',
            'heart' => 'nullable',
            'abdomen' => 'nullable',
            'genitourinary' => 'nullable',
            'extremities' => 'nullable',
            'neurological' => 'nullable',
            // laboratory results
            'obo' => 'nullable',
            'obo_findings' => 'required_if:obo,==,not_normal|nullable|string',
            'urinalysis' => 'nullable',
            'urinalysis_findings' => 'required_if:urinalysis,==,not_normal|nullable|string',
            'fecalysis' => 'nullable',
            'fecalysis_findings' => 'required_if:fecalysis,==,not_normal|nullable|string',
            'hbs_ag' => 'nullable',
            'hbs_ag_findings' => 'required_if:hbs_ag,==,not_normal|nullable|string',
            'pregnancy_test' => 'nullable',
            'pregnancy_test_findings' => 'required_if:pregnancy_test,==,not_normal|nullable|string',
            'drug_test' => 'nullable',
            'drug_test_findings' => 'required_if:drug_test,==,not_normal|nullable|string',
            'chest_xray' => 'nullable',
            'chest_xray_findings' => 'required_if:chest_xray,==,not_normal|nullable|string',
            'ecg' => 'nullable',
            'ecg_findings' => 'required_if:ecg,==,not_normal|nullable|string',
            'others' => 'nullable',
            // classification
            'class_a' => 'nullable',
            'class_b' => 'nullable',
            'class_c' => 'nullable',
            'pending' => 'nullable',
            'pending_text' => 'nullable',
            'unfit' => 'nullable',
            'unfit_text' => 'nullable',
            // remarks
            'remarks' => 'nullable',
            // university physician
            'university_physician_examine' => 'nullable',
            'school_year_id' => 'required',
           ]);

             ExaminationReport::create([
                 'user_patient_id' => $request->user_patient_id,
                'pre_employment' => $request->pre_employment === 'on',
                'annual' => $request->annual === 'on',
                'ojt' => $request->ojt === 'on',
                // basic information
                'date_of_examination' => $request->date_of_examination,
                'address' => $request->address,
                // medical history
                'present_symptoms' => $request->present_symptoms,
                'past_medical_history' => $request->past_medical_history,
                'family_medical_history' => $request->family_medical_history,
                'history_of_operations' => $request->history_of_operations,
                'allergies' => $request->allergies,
                'gynecological_obstetrics_history' => $request->gynecological_obstetrics_history,
                'personal_social_history' => $request->personal_social_history,
                // physical examination
                'general_survey' => $request->general_survey,
                'height' => $request->height,
                'weight' => $request->weight,
                'blood_pressure' => $request->blood_pressure,
                'heart_rate' => $request->heart_rate,
                'respiratory_rate' => $request->respiratory_rate,
                'temperature' => $request->temperature,
                'skin' => $request->skin,
                'heent' => $request->heent,
                'chest_and_lungs' => $request->chest_and_lungs,
                'heart' => $request->heart,
                'abdomen' => $request->abdomen,
                'genitourinary' => $request->genitourinary,
                'extremities' => $request->extremities,
                'neurological' => $request->neurological,
                // lab results
                'obo' => $request->obo,
                'obo_findings' => $request->obo_findings,
                'urinalysis' => $request->urinalysis,
                'urinalysis_findings' => $request->urinalysis_findings,
                'fecalysis' => $request->fecalysis,
                'fecalysis_findings' => $request->fecalysis_findings,
                'hbs_ag' => $request->hbs_ag,
                'hbs_ag_findings' => $request->hbs_ag_findings,
                'pregnancy_test' => $request->pregnancy_test,
                'pregnancy_test_findings' => $request->pregnancy_test_findings,
                'drug_test' => $request->drug_test,
                'drug_test_findings' => $request->drug_test_findings,
                'chest_xray' => $request->chest_xray,
                'chest_xray_findings' => $request->chest_xray_findings,
                'ecg' => $request->ecg,
                'ecg_findings' => $request->ecg_findings,
                'others' => $request->others,
                // classification
                'class_a' => $request->class_a === 'on',
                'class_b' => $request->class_b === 'on',
                'class_c' => $request->class_c === 'on',
                'pending' => $request->pending === 'on',
                'pending_text' => $request->pending_text,
                'unfit' => $request->unfit === 'on',
                'unfit_text' => $request->unfit_text,
                //remarks
                'remarks' => $request->remarks,
                //school_year
                'school_year_id' => $request->school_year_id,
                // university physician
                'university_physician_examine' => $request->university_physician_examine,
             ]);


             return redirect('/medical-examination-report')->with('success-message', 'Examine Report Saved Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExaminationReport  $examinationReport
     * @return \Illuminate\Http\Response
     */
    public function show($examinationReport)
    {
        $data = UserPatient::with('examination_reports')->has('examination_reports')->findOrFail($examinationReport);
        $examination_report_datas = ExaminationReport::with('user_data')->where('user_patient_id', $examinationReport)->get();


        // $todayDate = date('Y-m-d', strtotime('today'));
        return view('pages.admin.medical-examination-report.show', compact('examination_report_datas', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExaminationReport  $examinationReport
     * @return \Illuminate\Http\Response
     */
    public function edit(ExaminationReport $examinationReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExaminationReportRequest  $request
     * @param  \App\Models\ExaminationReport  $examinationReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExaminationReportRequest $request, ExaminationReport $examinationReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExaminationReport  $examinationReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExaminationReport $examinationReport)
    {
        //
    }

    /**
     * examine a patient
     *
     * @param  \App\Models\UserPatient $user
     * @return \Illuminate\Http\Response
     */
    public function examine(UserPatient $user)
    {
        // function for examining the patient hmm, i think this is only for route and not POST
          $user = UserPatient::findOrFail($user->id);
          $school_years = SchoolYear::all();
           $todayDate = date('Y-m-d', strtotime('today'));
          return view('pages.admin.users.examine', compact('user', 'todayDate', 'school_years'));
    }

    public function exportDocument($examinationReport) {
        $data = ExaminationReport::with('user_data')->findOrFail($examinationReport);
        $first_name = $data->user_data->user_patient_first_name;
        $middle_name = $data->user_data->user_patient_middle_name;
        $last_name = $data->user_data->user_patient_last_name;
        $suffix = $data->user_data->user_patient_suffix;
        $full_name = $first_name . " " . $middle_name . " " . $last_name . " " . $suffix;
        $pr = $data->pre_employment === '1' ? '✓' : ' ';
        $an = $data->annual === '1' ? '✓' : ' ';
        $ojt = $data->ojt === '1' ? '✓' : ' ';
        $examinationDate = \Carbon\Carbon::parse($data->date_of_examination)->isoFormat('MMM D YYYY');
        $age = \Carbon\Carbon::parse($data->user_data->user_patient_birthday)->age;
        // lab results
         $obo_n = $data->obo === 'normal' ? '✓' : ' ';
         $obo_nn = $data->obo === 'not_normal' ? '✓' : ' ';
         $urinalysis_n = $data->urinalysis === 'normal' ? '✓' : ' ';
         $urinalysis_nn = $data->urinalysis === 'not_normal' ? '✓' : ' ';
         $fecalysis_n = $data->fecalysis === 'normal' ? '✓' : ' ';
         $fecalysis_nn = $data->fecalysis === 'not_normal' ? '✓' : ' ';
         $hbs_ag_n = $data->hbs_ag === 'normal' ? '✓' : ' ';
         $hbs_ag_nn = $data->hbs_ag === 'not_normal' ? '✓' : ' ';
         $pregnancy_test_n = $data->pregnancy_test === 'normal' ? '✓' : ' ';
         $pregnancy_test_nn = $data->pregnancy_test === 'not_normal' ? '✓' : ' ';
         $pregnancy_test_n = $data->pregnancy_test === 'normal' ? '✓' : ' ';
         $pregnancy_test_nn = $data->pregnancy_test === 'not_normal' ? '✓' : ' ';
         $drug_test_n = $data->drug_test === 'normal' ? '✓' : ' ';
         $drug_test_nn = $data->drug_test === 'not_normal' ? '✓' : ' ';
         $chest_xray_n = $data->chest_xray === 'normal' ? '✓' : ' ';
         $chest_xray_nn = $data->chest_xray === 'not_normal' ? '✓' : ' ';
         $ecg_n = $data->ecg === 'normal' ? '✓' : ' ';
         $ecg_nn = $data->ecg === 'not_normal' ? '✓' : ' ';

         $class_a = $data->class_a === '1' ? '✓' : ' ';
         $class_b = $data->class_b === '1' ? '✓' : ' ';
         $class_c = $data->class_c === '1' ? '✓' : ' ';
         $pending = $data->pending === '1' ? '✓' : ' ';
         $unfit = $data->class_c === '1' ? '✓' : ' ';

        $templateProcessor = new TemplateProcessor('documents/document.docx');
        // purpose
        $templateProcessor->setValue('pr', $pr);
        $templateProcessor->setValue('an', $an);
        $templateProcessor->setValue('ojt', $ojt);
        // basic information
         $templateProcessor->setValue('name', $full_name);
         $templateProcessor->setValue('age', $age);
         $templateProcessor->setValue('address', $data->address);
         $templateProcessor->setValue('sex', $data->user_data->user_patient_gender);
         $templateProcessor->setValue('civil_status', $data->user_data->civil_status);
         $templateProcessor->setValue('date_of_examination', $examinationDate);
         $templateProcessor->setValue('course_department', $data->user_data->user_year_department_role);
         // medical history
        $templateProcessor->setValue('present_symptoms', $data->present_symptoms);
        $templateProcessor->setValue('past_medical_history', $data->past_medical_history);
        $templateProcessor->setValue('family_medical_history', $data->family_medical_history);
        $templateProcessor->setValue('history_of_operations', $data->history_of_operations);
        $templateProcessor->setValue('gynecological_obstetrics_history', $data->gynecological_obstetrics_history);
        $templateProcessor->setValue('personal_social_history', $data->personal_social_history);
        // physical examination
        $templateProcessor->setValue('general_survey', $data->general_survey);
        $templateProcessor->setValue('height', $data->height);
        $templateProcessor->setValue('weight', $data->weight);
        $templateProcessor->setValue('blood_pressure', $data->blood_pressure);
        $templateProcessor->setValue('heart_rate', $data->heart_rate);
        $templateProcessor->setValue('respiratory_rate', $data->respiratory_rate);
        $templateProcessor->setValue('temperature', $data->temperature);
        $templateProcessor->setValue('skin', $data->skin);
        $templateProcessor->setValue('heent', $data->heent);
        $templateProcessor->setValue('chest_and_lungs', $data->chest_and_lungs);
        $templateProcessor->setValue('heart', $data->heart);
        $templateProcessor->setValue('abdomen', $data->abdomen);
        $templateProcessor->setValue('genitourinary', $data->genitourinary);
        $templateProcessor->setValue('extremities', $data->extremities);
        $templateProcessor->setValue('neurological', $data->neurological);

        $templateProcessor->setValue('obo_n', $obo_n);
        $templateProcessor->setValue('obo_nn', $obo_nn);
        $templateProcessor->setValue('obo_findings', $data->obo_findings);
        $templateProcessor->setValue('urinalysis_n', $urinalysis_n);
        $templateProcessor->setValue('urinalysis_nn', $urinalysis_nn);
        $templateProcessor->setValue('urinalysis_findings', $data->urinalysis_findings);
        $templateProcessor->setValue('fecalysis_n', $fecalysis_n);
        $templateProcessor->setValue('fecalysis_nn', $fecalysis_nn);
        $templateProcessor->setValue('fecalysis_findings', $data->fecalysis_findings);
        $templateProcessor->setValue('hbs_ag_n', $hbs_ag_n);
        $templateProcessor->setValue('hbs_ag_nn', $hbs_ag_nn);
        $templateProcessor->setValue('hbs_ag_findings', $data->hbs_ag_findings);
        $templateProcessor->setValue('pregnancy_test_n', $pregnancy_test_n);
        $templateProcessor->setValue('pregnancy_test_nn', $pregnancy_test_nn);
        $templateProcessor->setValue('pregnancy_test_findings', $data->pregnancy_test_findings);
        $templateProcessor->setValue('drug_test_n', $drug_test_n);
        $templateProcessor->setValue('drug_test_nn', $drug_test_nn);
        $templateProcessor->setValue('drug_test_findings', $data->drug_test_findings);
        $templateProcessor->setValue('chest_xray_n', $chest_xray_n);
        $templateProcessor->setValue('chest_xray_nn', $chest_xray_nn);
        $templateProcessor->setValue('chest_xray_findings', $data->chest_xray_findings);
        $templateProcessor->setValue('ecg_n', $ecg_n);
        $templateProcessor->setValue('ecg_nn', $ecg_nn);
        $templateProcessor->setValue('ecg_findings', $data->ecg_findings);
        $templateProcessor->setValue('others', $data->others);
        $templateProcessor->setValue('pending_text', $data->pending_text);
        $templateProcessor->setValue('unfit_text', $data->unfit_text);
        $templateProcessor->setValue('remarks', $data->remarks);

        $templateProcessor->setValue('class_a', $class_a);
        $templateProcessor->setValue('class_b', $class_b);
        $templateProcessor->setValue('class_c', $class_c);
        $templateProcessor->setValue('pending', $pending);
        $templateProcessor->setValue('unfit', $unfit);

        // laboratory and lab results are not printed (box issue)
        // and remarks

        // university physician
        $templateProcessor->setValue('university_physician_examine', $data->university_physician_examine);

        // naming and saving file
        $fileName = $data->user_data->user_patient_first_name;
        $templateProcessor->saveAs($fileName . ' Medical Examination Report' . '.docx');
        return response()->download($fileName . ' Medical Examination Report' . '.docx')->deleteFileAfterSend(true);
    }
}
