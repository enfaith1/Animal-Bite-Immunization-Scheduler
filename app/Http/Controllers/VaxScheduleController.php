<?php

namespace App\Http\Controllers;

use App\Models\VaxRecord;
use Illuminate\Http\Request;

class VaxScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(VaxRecord $vaxRecord)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(VaxRecord $vaxRecord)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, VaxRecord $vaxRecord)
    {
        $validated = $request->validate([

            'dose_day' => 'required|string|in:3,7,14,28',
            'scheduled_date' => 'required|date',
            'actual_date' => 'nullable|date',
            'status' => 'required|string|in:Completed,Upcoming,Missed'
        ]);

        $vaxRecord->vaxSchedules()->create($validated);

        return redirect()->route('vaxRecords.vaxSchedules.index', $vaxRecord);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
