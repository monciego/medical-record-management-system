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
            'user_patient_id' => 'required|max:255', // must unique
            'user_patient_role' => 'required',
            'user_patient_full_name' => 'required|max:255',
            'user_patient_gender' => 'required',
            'user_patient_birthday' => 'required',
            'user_year_department_role' =>'required|max:255',
            'user_patient_blood_type' => 'nullable',
            'civil_status' => 'nullable',
            'nationality' => 'nullable|max:255',
            'religion' => 'nullable',
            'contact_person' => 'nullable',
            'patient_phone_number' => 'required',
            // medical history
            'history_of_past_illness' => 'nullable',
            'past_illness' => 'nullable',
            'operations_and_hospitalizations' => 'nullable',
            'immunization_history' => 'nullable',
            'social_and_environmental_history' => 'nullable',
            'obstetrics_gynecological_history' => 'nullable',
            // checkboxes
            'general_survey' => 'nullable',
            'skin' => 'nullable',
            'heent' => 'nullable',
            'chest_and_lungs' => 'nullable',
            'heart' => 'nullable',
            'abdomen' => 'nullable',
            'genitourinary' => 'nullable',
            'musculoskeletal' => 'nullable',
            // textareas
            'neurological_examination' => 'nullable',
            'laboratory_results' => 'nullable',
            'assestment' => 'nullable',
            'university_physician' => 'nullable',
        ]);
         UserPatient::create([
             'user_patient_id' => $request->user_patient_id,
             'user_patient_role' => $request->user_patient_role,
             'user_patient_full_name' => $request->user_patient_full_name,
             'user_patient_gender' => $request->user_patient_gender,
             'user_patient_birthday' => $request->user_patient_birthday,
             'user_year_department_role' => $request->user_year_department_role,
             'user_patient_blood_type' => $request->user_patient_blood_type,
             'civil_status' => $request->civil_status,
             'nationality' => $request->nationality,
             'religion' => $request->religion,
             'contact_person' => $request->contact_person,
             'patient_phone_number' => $request->patient_phone_number,
             // medical history
             'history_of_past_illness' => $request->history_of_past_illness,
             'past_illness' => $request->past_illness,
             'operations_and_hospitalizations' => $request->operations_and_hospitalizations,
             'immunization_history' => $request->immunization_history,
             'social_and_environmental_history' => $request->social_and_environmental_history,
             'obstetrics_gynecological_history' => $request->obstetrics_gynecological_history,
            // checkboxes
             'general_survey' => $request->general_survey === 'on',
             'skin' => $request->skin === 'on',
             'heent' => $request->heent === 'on',
             'chest_and_lungs' => $request->chest_and_lungs === 'on',
             'heart' => $request->heart === 'on',
             'abdomen' => $request->abdomen === 'on',
             'genitourinary' => $request->genitourinary === 'on',
             'musculoskeletal' => $request->musculoskeletal === 'on',
             // textareas
              'neurological_examination' => $request->neurological_examination,
              'laboratory_results' => $request->laboratory_results,
              'assestment' => $request->assestment,
              'university_physician' => $request->university_physician,
          ]);

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
        $user = UserPatient::with('patient_information')->findOrFail($id);


        return view('pages.admin.users.show', [
            'user' => $user
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
        // $user = UserPatient::findOrFail($id);

         $request->validate([
            'user_patient_id' => 'required', // must unique
            'user_patient_role' => 'required',
            'user_patient_full_name' => 'required',
            'user_patient_gender' => 'required',
            'user_patient_birthday' => 'required',
            'user_year_department_role' =>'required',
            'user_patient_blood_type' => 'nullable',
            'civil_status' => 'nullable',
            'nationality' => 'nullable',
            'religion' => 'nullable',
            'contact_person' => 'nullable',
            'patient_phone_number' => 'required',
            // medical history
            'history_of_past_illness' => 'nullable',
            'past_illness' => 'nullable',
            'operations_and_hospitalizations' => 'nullable',
            'immunization_history' => 'nullable',
            'social_and_environmental_history' => 'nullable',
            'obstetrics_gynecological_history' => 'nullable',
            // checkboxes
            'general_survey' => 'nullable',
            'skin' => 'nullable',
            'heent' => 'nullable',
            'chest_and_lungs' => 'nullable',
            'heart' => 'nullable',
            'abdomen' => 'nullable',
            'genitourinary' => 'nullable',
            'musculoskeletal' => 'nullable',
            // textareas
            'neurological_examination' => 'nullable',
            'laboratory_results' => 'nullable',
            'assestment' => 'nullable',
            'university_physician' => 'required',
        ]);

        //  $user->update($formFields);

          UserPatient::where('id', $id)->update([
            'user_patient_id' => $request->user_patient_id,
             'user_patient_role' => $request->user_patient_role,
             'user_patient_full_name' => $request->user_patient_full_name,
             'user_patient_gender' => $request->user_patient_gender,
             'user_patient_birthday' => $request->user_patient_birthday,
             'user_year_department_role' => $request->user_year_department_role,
             'user_patient_blood_type' => $request->user_patient_blood_type,
             'civil_status' => $request->civil_status,
             'nationality' => $request->nationality,
             'religion' => $request->religion,
             'contact_person' => $request->contact_person,
             'patient_phone_number' => $request->patient_phone_number,
             // medical history
             'history_of_past_illness' => $request->history_of_past_illness,
             'past_illness' => $request->past_illness,
             'operations_and_hospitalizations' => $request->operations_and_hospitalizations,
             'immunization_history' => $request->immunization_history,
             'social_and_environmental_history' => $request->social_and_environmental_history,
             'obstetrics_gynecological_history' => $request->obstetrics_gynecological_history,
            // checkboxes
             'general_survey' => $request->general_survey === 'on',
             'skin' => $request->skin === 'on',
             'heent' => $request->heent === 'on',
             'chest_and_lungs' => $request->chest_and_lungs === 'on',
             'heart' => $request->heart === 'on',
             'abdomen' => $request->abdomen === 'on',
             'genitourinary' => $request->genitourinary === 'on',
             'musculoskeletal' => $request->musculoskeletal === 'on',
             // textareas
              'neurological_examination' => $request->neurological_examination,
              'laboratory_results' => $request->laboratory_results,
              'assestment' => $request->assestment,
              'university_physician' => $request->university_physician,
            ]);

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
        UserPatient::findOrFail($id)->delete();
        return redirect()->route('users.index')->with('danger-message', 'User Deleted Successfully!');
    }
}
