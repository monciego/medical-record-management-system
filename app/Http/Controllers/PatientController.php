<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Medicine;
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
        $user = UserPatient::latest()->with('patient_information')->has('patient_information')->paginate(6);
        // dd($user);
        return view('pages.admin.patient.index', [
            'patients' => $user
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
     *
     * @param  \App\Http\Requests\StorePatientRequest  $request
     * @return \Illuminate\Http\Response
     */
 /*    public function store(StorePatientRequest $request)
    {
        //
         $formFields = $request->validate([
            'patient_id' => 'required',
            'patient_full_name' => 'required',
            'patient_gender' => 'required',
            'patient_role' => 'required',
            'patient_year' => 'nullable',
            'patient_department' => 'nullable',
            'patient_phone_number' => 'required',
            'patient_consult_date' => 'required',
            'patient_consult_time' => 'required',
            'patient_medical_comments' => 'nullable',
        ]);
         Patient::create($formFields);

        return redirect('/patient')->with('success-message', 'Patient Added Successfully!');
    }
 */
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
        return view('pages.admin.patient.show', ['patient' => $patient ]);
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
        //   dd($user);
           $todayDate = date('Y-m-d', strtotime('today'));
           $medicines = Medicine::all();
        //   dd($user);
          return view('pages.admin.users.consult', compact('user', 'todayDate', 'medicines'));
    }

    public function store(StorePatientRequest $request)
    {

         $formFields = $request->validate([
            'user_patient_id' => 'required',
            'patient_consult_date' => 'required',
            'patient_consult_time' => 'required',
            'patient_medical_comments' => 'nullable', // make this nullable in migration
            'patient_prescribed_medicine' => 'nullable', // make this nullable in migration
            'patient_prescribed_medicine_quantity' => 'nullable', // make this nullable in migration
        ]);

        Patient::create($formFields);
        DB::table('medicines')->where('medicine_name', $request->input('patient_prescribed_medicine'))
                 ->decrement('medicine_quantity', $request->input('patient_prescribed_medicine_quantity'));
        return redirect('/patient')->with('success-message', 'Patient Added Successfully!');
    }


}
