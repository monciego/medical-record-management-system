<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\SchoolYear;
use App\Models\UserPatient;
use Illuminate\Http\Request;


class DailyRecordReport extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.reports.index');
    }
    /**
     * Display a listing of the students.
     *
     * @return \Illuminate\Http\Response
     */
    public function students()
    {
        $school_years = SchoolYear::get();
       $student_records = Patient::with('user_data')->filter(request(['clinic', 'diagnosis']))->whereHas('user_data', function ($query) {
            return $query->where('user_patient_role', '=', 'student');
        })->get();

        $ids = [];
        foreach($student_records as $list){
            array_push($ids, $list->diagnosis);
        }
        $diagnosis = array_unique($ids);

        return view('pages.admin.reports.students.index', compact('student_records', 'school_years', 'diagnosis'));
    }
    /**
     * Display a listing of the teaching staffs.
     *
     * @return \Illuminate\Http\Response
     */
    public function teaching()
    {
        $school_years = SchoolYear::get();
       $teaching_records = Patient::with('user_data')->filter(request(['clinic', 'diagnosis']))->whereHas('user_data', function ($query) {
            return $query->where('user_patient_role', '=', 'teaching_staff');
        })->get();

        $ids = [];
        foreach($teaching_records as $list){
            array_push($ids, $list->diagnosis);
        }
        $diagnosis = array_unique($ids);

        return view('pages.admin.reports.teaching.index', compact('teaching_records', 'school_years', 'diagnosis'));
    }
    /**
     * Display a listing of the non-teaching staffs.
     *
     * @return \Illuminate\Http\Response
     */
    public function non_teaching()
    {
        // this well get the school year id that has 1 semester as on or = second semester
        // $example = Patient::with('school_year', 'user_data')->where('school_year_id', 1)->where('semester', 1)->get();

        $school_years = SchoolYear::get();
       $non_teaching_records = Patient::with('user_data')->filter(request(['clinic', 'diagnosis']))->whereHas('user_data', function ($query) {
            return $query->where('user_patient_role', '=', 'non_teaching_staff');
        })->get();

        $ids = [];
        foreach($non_teaching_records as $list){
            array_push($ids, $list->diagnosis);
        }
        $diagnosis = array_unique($ids);

        return view('pages.admin.reports.non-teaching.index', compact('non_teaching_records', 'school_years', 'diagnosis'));
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
