<?php

namespace App\Http\Controllers;

use App\Models\ExaminationReport;
use App\Http\Requests\StoreExaminationReportRequest;
use App\Http\Requests\UpdateExaminationReportRequest;
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
        return view('pages.admin.medical-examination-report.index', [
          'examine_records' => UserPatient::latest()->with('examination_reports')->has('examination_reports')->paginate(6)
        ]);
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
        $examination_report_data = UserPatient::with('examination_reports')->has('examination_reports')->findOrFail($examinationReport);
        $todayDate = date('Y-m-d', strtotime('today'));
        return view('pages.admin.medical-examination-report.show', compact('examination_report_data', 'todayDate'));
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
           $todayDate = date('Y-m-d', strtotime('today'));
          return view('pages.admin.users.examine', compact('user', 'todayDate'));
    }

    public function exportDocument($examinationReport) {
        $data = UserPatient::with('examination_reports')->has('examination_reports')->findOrFail($examinationReport);
        $pr = $data->examination_reports->pre_employment === 1 ? '✓' : ' ';
        $an = $data->examination_reports->annual === 1 ? '✓' : ' ';
        $ojt = $data->examination_reports->ojt === 1 ? '✓' : ' ';
        $examinationDate = \Carbon\Carbon::parse($data->examination_reports->date_of_examination)->isoFormat('MMM D YYYY');
        $age = \Carbon\Carbon::parse($data->user_patient_birthday)->age;

        $templateProcessor = new TemplateProcessor('documents/document.docx');
        // basic information
        $templateProcessor->setValue('name', $data->user_patient_full_name);
        $templateProcessor->setValue('age', $age);
        $templateProcessor->setValue('sex', $data->user_patient_gender);
        $templateProcessor->setValue('civil_status', $data->civil_status);
        $templateProcessor->setValue('course_department', $data->user_year_department_role);
        $templateProcessor->setValue('pr', $pr);
        $templateProcessor->setValue('an', $an);
        $templateProcessor->setValue('ojt', $ojt);
        $templateProcessor->setValue('address', $data->examination_reports->address);
        $templateProcessor->setValue('date_of_examination', $examinationDate);
        // medical history
        $templateProcessor->setValue('present_symptoms', $data->examination_reports->present_symptoms);
        $templateProcessor->setValue('past_medical_history', $data->examination_reports->past_medical_history);
        $templateProcessor->setValue('family_medical_history', $data->examination_reports->family_medical_history);
        $templateProcessor->setValue('present_symptoms', $data->examination_reports->present_symptoms);


        // naming and saving file
        $fileName = $data->user_patient_full_name;
        $templateProcessor->saveAs($fileName . ' Medical Examination Report' . '.docx');
        return response()->download($fileName . ' Medical Examination Report' . '.docx')->deleteFileAfterSend(true);
    }
}
