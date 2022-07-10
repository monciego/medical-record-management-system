<?php

namespace App\Http\Controllers;

use App\Models\UserPatient;
use Illuminate\Http\Request;

class UserPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.users.index', [
            'users' => UserPatient::latest()->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.users.create');
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
            'user_patient_id'  => 'required',
            'user_patient_role'  => 'required',
            'user_patient_full_name'=> 'required',
            'user_patient_gender' => 'required',
            'user_patient_birthday' => 'required',
            'user_patient_blood_type'=> 'nullable',
            'user_patient_medical_history'=> 'nullable',
            'user_patient_year'=> 'nullable',
            'user_patient_department'=> 'nullable',
            'patient_phone_number' => 'required',
        ]);
         UserPatient::create($formFields);

        return redirect('/users')->with('success-message', 'User Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
