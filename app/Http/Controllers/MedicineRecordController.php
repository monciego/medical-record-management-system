<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Patient;
use App\Models\UserPatient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicineRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

        return view('pages.admin.medicine.medicine-record.index', compact('datas', 'total_teaching_staff', 'student', 'staff'));
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
        //
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
