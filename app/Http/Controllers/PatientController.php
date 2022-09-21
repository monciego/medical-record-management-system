<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Medicine;
use App\Models\SchoolYear;
use App\Models\UserPatient;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = UserPatient::latest()->with('patient_information')->has('patient_information')->filter(request(['role']))->paginate(6);
        // dd($patients);
        return view('pages.admin.patient.index', [
            'patients' => $patients
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
        $todayDate = date('Y-m-d', strtotime('today'));
        return view('pages.admin.patient.create', compact('todayDate'));
    }

    /**
     * Store a newly created resource in storage.
     * Consult function
     * @param  \App\Http\Requests\StorePatientRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StorePatientRequest $request)
    {
         $formFields = $request->validate([
            'user_patient_id' => 'required',
            'clinic' => 'required',
            'patient_consult_date' => 'required',
            'patient_consult_time' => 'required',
            'complaints' => 'required',
            'diagnosis' => 'required',
            'patient_prescribed_medicine' => 'nullable',
            'patient_prescribed_medicine_quantity' => 'nullable',
            'patient_medical_comments' => 'nullable',
            'physician_name' => 'required',
            'school_year_id' => 'required',
        ]);

          $patient_prescribed_medicine = $request->input('patient_prescribed_medicine');
          $patient_prescribed_medicine_quantity = $request->input('patient_prescribed_medicine_quantity');
        Patient::create([
            'user_patient_id' => $request->user_patient_id,
            'clinic' => $request->clinic,
            'patient_consult_date' =>  $request->patient_consult_date,
            'patient_consult_time' =>  $request->patient_consult_time,
            'complaints' =>  $request->complaints,
            'diagnosis' =>  $request->diagnosis,
            'patient_prescribed_medicine' =>  implode('|', $patient_prescribed_medicine),
            'patient_prescribed_medicine_quantity' =>  implode('|', array_filter($patient_prescribed_medicine_quantity)),
            'patient_medical_comments' =>  $request->patient_medical_comments,
            'physician_name' => $request->physician_name,
            'school_year_id' => $request->school_year_id,
        ]);

    $patient_prescribed_medicines = $request->input('patient_prescribed_medicine');

    $num_i = 0;
    foreach($patient_prescribed_medicines as $given_medicine){
        DB::table('medicines')->where('medicine_name', $given_medicine)->decrement('medicine_quantity',   array_values(array_filter($patient_prescribed_medicine_quantity))[$num_i]);
        $num_i = $num_i + 1;
    }

        return redirect('/patient')->with('success-message', 'Patient Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show($patient)
    {
        //
         $patient = UserPatient::with('patient_information')->has('patient_information')->findOrFail($patient);
        //  $patientInfo = UserPatient::with('patient_information')->has('patient_information')->get();
        $PATIENT_CONSULTATION_INFORMATION = Patient::where('user_patient_id', $patient->id)->get();
        return view('pages.admin.patient.show', compact('patient', 'PATIENT_CONSULTATION_INFORMATION'));
    /*      $patient = UserPatient::with('patient_information')->has('patient_information')->findOrFail($patient);
        return view('pages.admin.patient.show', ['patient' => $patient ]); */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientRequest  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }

    /**
     * consult a user
     *
     * @param  \App\Models\UserPatient $user
     * @return \Illuminate\Http\Response
     */
    public function consult(UserPatient $user)
    {
          $user = UserPatient::findOrFail($user->id);
          $school_years = SchoolYear::all();
        //   dd($user);
           $todayDate = date('Y-m-d', strtotime('today'));
           $medicines = Medicine::all();
        //   dd($user);
          return view('pages.admin.users.consult', compact('user', 'todayDate', 'medicines', 'school_years'));
    }
}
