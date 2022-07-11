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
            'user_year_department_role'=> 'nullable',
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
          return view('pages.admin.users.show', [
            'user' => UserPatient::findOrFail($id)
          ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return view('pages.admin.users.edit', [
            'user' => UserPatient::findOrFail($id)
       ]);
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
        $user = UserPatient::findOrFail($id);

        $formFields = $request->validate([
            'user_patient_id'  => 'required',
            'user_patient_role'  => 'required',
            'user_patient_full_name'=> 'required',
            'user_patient_gender' => 'required',
            'user_patient_birthday' => 'required',
            'user_patient_blood_type'=> 'nullable',
            'user_patient_medical_history'=> 'nullable',
            'user_year_department_role'=> 'nullable',
            'patient_phone_number' => 'required',
        ]);

         $user->update($formFields);

        return redirect()->route('users.show', $id)->with('success-message', 'User Updated Successfully!');
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
