<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\VaxRecord;
use App\Models\VaxSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VaxRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Patient $patient)
    {
        $vaxRecords = $patient->vaxRecords()->latest()->paginate(10);

        return view('vax-records.index', compact('vaxRecords', 'patient'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Patient $patient)
    {
        return view('vax-records.create', compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Patient $patient)
    {
        $validated = $request->validate([

            'date_of_exposure' => 'required|date',
            'date_of_visit' => 'required|date',
            'place_of_exposure' => 'nullable|string',
            'exposure_type' => 'required|string',
            'animal_type' => 'required|string',
            'animal_condition' => 'required|string|in:Healthy,Sick,Lost,Dead',
            'exposure_category' => 'required|string|in:I,II,III',
            'rig_brand' => 'nullable|string',
            'tetanus_brand' => 'nullable|string',
            'remarks' => 'nullable|string'
        ]);

        $vaxRecord = $patient->vaxRecords()->create($validated);
        $day0 = $vaxRecord->date_of_visit;

        $validated = $request->validate([
            'antirabies' => 'required|integer'
        ]);

        $antirabies = $validated['antirabies'];
        $selectedDays = $request->input('vaccination_days', []);

        $vaxRecord->vaxSchedules()->create([
            'dose_day' => '0',
            'scheduled_date' => $day0,
            'actual_date' => $day0,
            'status' => 'Completed',
            'vax_brand_id' => $antirabies
        ]);

        foreach ($selectedDays as $day) {
            $vaxRecord->vaxSchedules()->create([
                'dose_day' => $day,
                'scheduled_date' => $day0->addDays((int)$day),
                'vax_brand_id' => $antirabies
            ]);
        }

        // $name = "Chantal Rivera";
        // Mail::to('chantalylirivera@gmail.com')->send(new EmailSchedule($name));

        return redirect()->route('patients.vaxRecords.index', $patient)
            ->with('success', 'Vaccination Record was created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VaxRecord $vaxRecord)
    {
        $patient = $vaxRecord->patient;
        if (!$patient) {
            abort(404, 'Patient for this vaccination record not found.');
        }

        return view('vax-records.show', compact('vaxRecord', 'patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VaxRecord $vaxRecord)
    {
        $patient = $vaxRecord->patient;
        if (!$patient) {
            abort(404, 'Patient for this vaccination record not found.');
        }

        return view('vax-records.edit', compact('vaxRecord', 'patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VaxRecord $vaxRecord)
    {
        $validated = $request->validate([
            'date_of_exposure' => 'required|date',
            'date_of_visit' => 'required|date',
            'place_of_exposure' => 'nullable|string',
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
        if (!$patient) {
            return redirect()->route('patients.index')->with('error', 'Patient not found.');
        }

        return redirect()->route('patients.vaxRecords.index', $patient)
            ->with('success', 'Vaccination Record was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VaxRecord $vaxRecord)
    {
        $patient = $vaxRecord->patient;
        if (!$patient) {
            return redirect()->route('patients.index')->with('error', 'Patient not found.');
        }
        $vaxRecord->delete();

        return redirect()->route('patients.vaxRecords.index', $patient)
            ->with('success', 'Vaccination Record was deleted successfully.');
    }
}
