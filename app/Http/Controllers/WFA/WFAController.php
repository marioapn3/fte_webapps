<?php

namespace App\Http\Controllers\WFA;

use App\Http\Controllers\Controller;
use App\Models\WorkStation;
use Illuminate\Http\Request;

class WFAController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $work_stations = WorkStation::all();
        return view('admin.wfa.index', compact('work_stations'));
    }

    public function generateData()
    {
        // WFA = WLA + (% Absensi x WLA) + (%LTO x WLA
        try {
            $work_stations = WorkStation::all();
            foreach ($work_stations as $work_station) {

                $wla = $work_station->wlaCycle->wla;
                $absence_rate = $work_station->absences->absence_rate;
                $lto = $work_station->absences->lto;
                $wfa = $wla + ($absence_rate * $wla) + ($lto * $wla);
                $work_station->wfa = $wfa;
                // bulatkan wfa ke atas dan masukan kedalam wfa_markup
                $work_station->wfa_markup = ceil($wfa);
                $work_station->save();
            }

            return redirect()->route('admin.wfa.index')->with('success', 'WFA data has been generated successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.wfa.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
