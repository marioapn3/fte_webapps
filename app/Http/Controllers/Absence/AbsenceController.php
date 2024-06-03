<?php

namespace App\Http\Controllers\Absence;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\WorkStation;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $work_stations = WorkStation::with('absences')->get();
        return view('admin.absence.index', compact('work_stations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createAbs($id)
    {
        $work_station = WorkStation::find($id);
        return view('admin.absence.create', compact('work_station'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'total_days' => 'required|integer',
            'total_absences' => 'required|integer',
            'workforce_in' => 'required|integer',
            'workforce_out' => 'required|integer',
            'workforce_avg' => 'required|numeric',
        ]);
        $absence_rate = $request->total_absences / $request->total_days + $request->total_absences;
        $lto = ($request->workforce_out + $request->workforce_in) / $request->workforce_avg;
        $request['absence_rate'] = $absence_rate;
        $request['lto'] = $lto;
        // $request['workstation_id'] = $request->id;
        Absence::create([
            'total_days' => $request->total_days,
            'total_absences' => $request->total_absences,
            'workforce_in' => $request->workforce_in,
            'workforce_out' => $request->workforce_out,
            'workforce_avg' => $request->workforce_avg,
            'absence_rate' => $absence_rate,
            'lto' => $lto,
            'work_station_id' => $request->work_station_id,
        ]);

        return redirect()->route('admin.absence.index')->with('success', 'Absence data has been added successfully');
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
        $absence = Absence::find($id);
        return view('admin.absence.edit', compact('absence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'total_days' => 'required|integer',
            'total_absences' => 'required|integer',
            'workforce_in' => 'required|integer',
            'workforce_out' => 'required|integer',
            'workforce_avg' => 'required|numeric',
        ]);
        $absence_rate = $request->total_absences / $request->total_days + $request->total_absences;
        $lto = ($request->workforce_out + $request->workforce_in) / $request->workforce_avg;
        $request['absence_rate'] = $absence_rate;
        $request['lto'] = $lto;
        Absence::find($id)->update([
            'total_days' => $request->total_days,
            'total_absences' => $request->total_absences,
            'workforce_in' => $request->workforce_in,
            'workforce_out' => $request->workforce_out,
            'workforce_avg' => $request->workforce_avg,
            'absence_rate' => $absence_rate,
            'lto' => $lto,
        ]);

        return redirect()->route('admin.absence.index')->with('success', 'Absence data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
