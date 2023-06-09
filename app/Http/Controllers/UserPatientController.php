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
            'users' =>  UserPatient::latest()->filter(request(['role', 'search']))->paginate(7)
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
            'user_patient_id' => 'required|max:255|unique:user_patients', // must unique
            'user_patient_role' => 'required',
            'user_patient_first_name' => 'required|max:255',
            'user_patient_middle_name' => 'nullable',
            'user_patient_last_name' => 'required|max:255',
            'user_patient_suffix' => 'nullable',
            'user_patient_gender' => 'required',
            'user_patient_birthday' => 'required',
            'user_year_department_role' =>'required|max:255',
            'user_patient_blood_type' => 'nullable',
            'civil_status' => 'nullable',
            'nationality' => 'nullable|max:255',
            'religion' => 'nullable',
            'contact_person' => 'nullable',
            'user_patient_height' => 'nullable',
            'user_patient_weight' => 'nullable',
            'user_patient_bmi' => 'nullable',
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
            // neurological examination
            'mental_status' => 'nullable',
            'coordination_and_balance' => 'nullable',
            'reflexes' => 'nullable',
            'sensation' => 'nullable',
            'cranial_nerves' => 'nullable',
            'autonomic_nervous_system_nerves' => 'nullable',
            'neurological_examination' => 'nullable',
            // laboratory results
            'urine' => 'nullable',
            'urine_comment' => 'nullable',
            'complete_blood_count' => 'nullable',
            'complete_blood_count_comment' => 'nullable',
            'x_ray' => 'nullable',
            'x_ray_comment' => 'nullable',
            'laboratory_results' => 'nullable',
            // textareas
            'assestment' => 'nullable',
            'university_physician' => 'nullable',
        ]);

        $height_squared = (float)$request->user_patient_height * (float)$request->user_patient_height;

        $bmi = (float)$request->user_patient_weight / $height_squared;
        $rounded_bmi = round($bmi, 2);

         UserPatient::create([
             'user_patient_id' => $request->user_patient_id,
             'user_patient_role' => $request->user_patient_role,
             'user_patient_first_name' => $request->user_patient_first_name,
             'user_patient_middle_name' => $request->user_patient_middle_name,
             'user_patient_last_name' => $request->user_patient_last_name,
             'user_patient_suffix' => $request->user_patient_suffix,
             'user_patient_gender' => $request->user_patient_gender,
             'user_patient_birthday' => $request->user_patient_birthday,
             'user_year_department_role' => $request->user_year_department_role,
             'user_patient_blood_type' => $request->user_patient_blood_type,
             'civil_status' => $request->civil_status,
             'nationality' => $request->nationality,
             'religion' => $request->religion,
             'contact_person' => $request->contact_person,
             'user_patient_height' => $request->user_patient_height,
             'user_patient_weight' => $request->user_patient_weight,
             'user_patient_bmi' => $rounded_bmi,
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
            //  neurological examination
            'mental_status' => $request->mental_status === 'on',
            'coordination_and_balance' => $request->coordination_and_balance === 'on',
            'reflexes' => $request->reflexes === 'on',
            'sensation' => $request->sensation === 'on',
            'cranial_nerves' => $request->cranial_nerves === 'on',
            'autonomic_nervous_system_nerves' => $request->autonomic_nervous_system_nerves === 'on',
            'neurological_examination' => $request->neurological_examination,
            // laboratory result
            'urine' => $request->urine,
            'urine_comment' => $request->urine_comment,
            'complete_blood_count' => $request->complete_blood_count,
            'complete_blood_count_comment' => $request->complete_blood_count_comment,
            'x_ray' => $request->x_ray,
            'x_ray_comment' => $request->x_ray_comment,
            'laboratory_results' => $request->laboratory_results,
             // textareas
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
            'user_patient_first_name' => 'required',
            'user_patient_middle_name' => 'nullable',
            'user_patient_last_name' => 'required',
            'user_patient_suffix' => 'nullable',
            'user_patient_gender' => 'required',
            'user_patient_birthday' => 'required',
            'user_year_department_role' =>'required',
            'user_patient_blood_type' => 'nullable',
            'civil_status' => 'nullable',
            'nationality' => 'nullable',
            'religion' => 'nullable',
            'contact_person' => 'nullable',
            'user_patient_height' => 'nullable',
            'user_patient_weight' => 'nullable',
            'user_patient_bmi' => 'nullable',
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
            // neurological examination
            'mental_status' => 'nullable',
            'coordination_and_balance' => 'nullable',
            'reflexes' => 'nullable',
            'sensation' => 'nullable',
            'cranial_nerves' => 'nullable',
            'autonomic_nervous_system_nerves' => 'nullable',
            'neurological_examination' => 'nullable',
            // laboratory results
            'urine' => 'nullable',
            'urine_comment' => 'nullable',
            'complete_blood_count' => 'nullable',
            'complete_blood_count_comment' => 'nullable',
            'x_ray' => 'nullable',
            'x_ray_comment' => 'nullable',
            'laboratory_results' => 'nullable',
            // textareas
            'assestment' => 'nullable',
            'university_physician' => 'required',
        ]);

        //  $user->update($formFields);

        $height_squared = (float)$request->user_patient_height * (float)$request->user_patient_height;

        $bmi = (float)$request->user_patient_weight / $height_squared;
        $rounded_bmi = round($bmi, 2);


          UserPatient::where('id', $id)->update([
            'user_patient_id' => $request->user_patient_id,
             'user_patient_role' => $request->user_patient_role,
             'user_patient_first_name' => $request->user_patient_first_name,
             'user_patient_middle_name' => $request->user_patient_middle_name,
             'user_patient_last_name' => $request->user_patient_last_name,
             'user_patient_suffix' => $request->user_patient_suffix,
             'user_patient_gender' => $request->user_patient_gender,
             'user_patient_birthday' => $request->user_patient_birthday,
             'user_year_department_role' => $request->user_year_department_role,
             'user_patient_blood_type' => $request->user_patient_blood_type,
             'civil_status' => $request->civil_status,
             'nationality' => $request->nationality,
             'religion' => $request->religion,
             'contact_person' => $request->contact_person,
             'user_patient_height' => $request->user_patient_height,
             'user_patient_weight' => $request->user_patient_weight,
             'user_patient_bmi' =>  $rounded_bmi ,
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
            //  neurological examination
            'mental_status' => $request->mental_status === 'on',
            'coordination_and_balance' => $request->coordination_and_balance === 'on',
            'reflexes' => $request->reflexes === 'on',
            'sensation' => $request->sensation === 'on',
            'cranial_nerves' => $request->cranial_nerves === 'on',
            'autonomic_nervous_system_nerves' => $request->autonomic_nervous_system_nerves === 'on',
            'neurological_examination' => $request->neurological_examination,
            // laboratory result
            'urine' => $request->urine,
            'urine_comment' => $request->urine_comment,
            'complete_blood_count' => $request->complete_blood_count,
            'complete_blood_count_comment' => $request->complete_blood_count_comment,
            'x_ray' => $request->x_ray,
            'x_ray_comment' => $request->x_ray_comment,
            'laboratory_results' => $request->laboratory_results,
             // textareas
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
