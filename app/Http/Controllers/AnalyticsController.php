<?php

namespace App\Http\Controllers;

use App\Models\Analytics;
use App\Http\Requests\StoreAnalyticsRequest;
use App\Http\Requests\UpdateAnalyticsRequest;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $january = Patient::whereMonth('patient_consult_date', '1')->count();
    $february = Patient::whereMonth('patient_consult_date', '2')->count();
    $march = Patient::whereMonth('patient_consult_date', '3')->count();
    $april = Patient::whereMonth('patient_consult_date', '4')->count();
    $may = Patient::whereMonth('patient_consult_date', '5')->count();
    $june = Patient::whereMonth('patient_consult_date', '6')->count();
    $july = Patient::whereMonth('patient_consult_date', '7')->count();
    $august = Patient::whereMonth('patient_consult_date', '8')->count();
    $september = Patient::whereMonth('patient_consult_date', '9')->count();
    $october = Patient::whereMonth('patient_consult_date', '10')->count();
    $november = Patient::whereMonth('patient_consult_date', '11')->count();
    $december = Patient::whereMonth('patient_consult_date', '12')->count();


    return view('pages.admin.analytics.index', compact(
        'january','february','march','april','may','june','july','august','september','october','november','december',
        ));
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
     * @param  \App\Http\Requests\StoreAnalyticsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnalyticsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Analytics  $analytics
     * @return \Illuminate\Http\Response
     */
    public function show(Analytics $analytics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Analytics  $analytics
     * @return \Illuminate\Http\Response
     */
    public function edit(Analytics $analytics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnalyticsRequest  $request
     * @param  \App\Models\Analytics  $analytics
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnalyticsRequest $request, Analytics $analytics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Analytics  $analytics
     * @return \Illuminate\Http\Response
     */
    public function destroy(Analytics $analytics)
    {
        //
    }
}
