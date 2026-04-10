<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\VaxRecord;
use Illuminate\Http\Request;

class VaxRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Patient $patient)
    {
        $vaxRecords = $patient->vaxRecords;
        return view('vaxRecords.index', compact('vaxRecords', 'patient'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Patient $patient)
    {
        return view('vaxRecords.create', compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Patient $patient)
    {
        $validated = $request->validate([

            'date_of_exposure' => 'required|date',
            'date_of_visit' => 'required|date',
            'place_of_exposure' => 'required|string',
            'exposure_type' => 'required|string',
            'animal_type' => 'required|string',
            'animal_condition' => 'required|string|in:Healthy,Sick,Lost,Dead',
            'exposure_category' => 'required|string|in:I,II,III',
            'rig_brand' => 'nullable|string',
            'tetanus_brand' => 'nullable|string',
            'remarks' => 'nullable|string'
        ]);

        $patient->vaxRecords()->create($validated);

        return redirect()->route('patients.vaxRecords.index', $patient)
            ->with('success', 'Vaccination Record was created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VaxRecord $vaxRecord)
    {
        return view('vaxRecord.show', compact('vaxRecord'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VaxRecord $vaxRecord)
    {
        return view('vaxRecord.edit', compact('vaxRecord'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VaxRecord $vaxRecord)
    {
        $validated = $request->validate([
            'date_of_exposure' => 'required|date',
            'date_of_visit' => 'required|date',
            'place_of_exposure' => 'required|string',
            'exposure_type' => 'required|string',
            'animal_type' => 'required|string',
            'animal_condition' => 'required|string|in:Healthy,Sick,Lost,Dead',
            'exposure_category' => 'required|string|in:I,II,III',
            'rig_brand' => 'nullable|string',
            'tetanus_brand' => 'nullable|string',
            'remarks' => 'nullable|string'
        ]);

        $vaxRecord->update($validated);

        $patient = $vaxRecord->patient;

        return redirect()->route('patients.vaxRecords.index', $patient)
            ->with('success', 'Vaccination Record was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VaxRecord $vaxRecord)
    {
        $patient = $vaxRecord->patient;
        $vaxRecord->delete();

        return redirect()->route('patients.vaxRecords.index', $patient)
            ->with('success', 'Vaccination Record was deleted successfully.');
    }
}
