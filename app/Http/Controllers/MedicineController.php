<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Http\Requests\StoreMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.medicine.index', [
            'medicines' => Medicine::latest()->paginate(6)
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMedicineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicineRequest $request)
    {
        //
        $formFields = $request->validate([
            'medicine_name' => 'required',
            'medicine_quantity' => ['required'],
            'medicine_cost' => 'required',
            'date_of_acquisition' => 'required',
        ]);
         Medicine::create($formFields);

        return redirect('/medicine')->with('success-message', 'Medicine Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicineRequest  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicineRequest $request, Medicine $medicine)
    {
        //
          $formFields = $request->validate([
            'medicine_name' => 'required',
            'medicine_quantity' => ['required'],
            'medicine_cost' => 'required',
            'date_of_acquisition' => 'required',
        ]);

        $medicine->update($formFields);

        return redirect('/medicine')->with('success-message', 'Medicine Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
             $medicine->delete();
        return redirect('/medicine')->with('danger-message', 'Deleted Successfully');
    }
}
