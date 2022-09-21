<?php

namespace App\Http\Controllers;

use App\Models\TreatmentRecord;
use App\Http\Requests\StoreTreatmentRecordRequest;
use App\Http\Requests\UpdateTreatmentRecordRequest;
use App\Models\Patient;
use App\Models\UserPatient;

class TreatmentRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $patients = UserPatient::latest()->with('patient_information')->has('patient_information')->get();
         $patients = Patient::latest()->with('user_data', 'school_year')->get();
        return view('pages.admin.treatment-record.index', compact('patients'));
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
     * @param  \App\Http\Requests\StoreTreatmentRecordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTreatmentRecordRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TreatmentRecord  $treatmentRecord
     * @return \Illuminate\Http\Response
     */
    public function show(TreatmentRecord $treatmentRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TreatmentRecord  $treatmentRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(TreatmentRecord $treatmentRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTreatmentRecordRequest  $request
     * @param  \App\Models\TreatmentRecord  $treatmentRecord
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTreatmentRecordRequest $request, TreatmentRecord $treatmentRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TreatmentRecord  $treatmentRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(TreatmentRecord $treatmentRecord)
    {
        //
    }
}
