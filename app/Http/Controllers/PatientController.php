<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Patient::latest();

        if (request()->has('search')) {
            $query->where(function($q){
                $search = request()->input('search');
                $q->where('fname', 'like', "%{$search}%")
                ->orWhere('lname', 'like', "%{$search}%");
            });
        }

        $patients = $query->paginate(10);

        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required|string|max:50',
            'lname' => 'required|string|max:50',
            'address' => 'required|string',
            'contact_num' => 'required|string|max:20',
            'email' => 'required|email|unique:patients',
            'emergency_num' => 'required|string|max:20'
        ]);

        Patient::create($validated);

        return redirect()->route('patients.index')
            ->with('success', 'Patient was created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'fname' => 'required|string|max:50',
            'lname' => 'required|string|max:50',
            'address' => 'required|string',
            'contact_num' => 'required|string|max:20',
            'email' => 'required|email|unique:patients,email,' . $patient->id,
            'emergency_num' => 'required|string|max:20'
        ]);

        $patient->update($validated);

        return redirect()->route('patients.index')
            ->with('success', 'Patient was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')
            ->with('success', 'Patient was deleted successfully.');
    }
}
