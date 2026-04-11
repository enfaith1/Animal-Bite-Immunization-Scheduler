<?php

namespace App\Http\Controllers;

use App\Models\VaxRecord;
use App\Models\VaxSchedule;
use Illuminate\Http\Request;

class VaxScheduleController extends Controller
{
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, VaxSchedule $vaxSchedule)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:Completed,Upcoming,Missed',
            'actual_date' => 'nullable|date',
        ]);

        $vaxSchedule->update($validated);

        return redirect()
            ->route('vaxRecords.show', $vaxSchedule->vaxRecord)
            ->with('success', 'Schedule updated.');
    }

}
