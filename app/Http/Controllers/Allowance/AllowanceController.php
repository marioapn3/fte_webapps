<?php

namespace App\Http\Controllers\Allowance;

use App\Http\Controllers\Controller;
use App\Models\Allowance;
use App\Models\WorkStation;
use App\Models\WorkStationDetail;
use Illuminate\Http\Request;

class AllowanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $work_stations = WorkStation::all();
        return view('admin.allowance.index', compact('work_stations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function createAllowance($id)
    {
        $work_station_detail = WorkStationDetail::find($id);
        return view('admin.allowance.create', compact('work_station_detail'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'required_power' => 'required|integer',
            'work_attitude' => 'required|integer',
            'work_movement' => 'required|integer',
            'eye_fatigue' => 'required|integer',
            'working_condition' => 'required|integer',
            'atmospheric_condition' => 'required|integer',
            'good_environment' => 'required|integer',
            'work_station_detail_id' => 'required',
        ]);

        $total = 2 +  $request->required_power + $request->work_attitude + $request->work_movement + $request->eye_fatigue + $request->working_condition + $request->atmospheric_condition + $request->good_environment;
        $total_rate = $total / 100;
        Allowance::create([
            'required_power' => $request->required_power,
            'work_attitude' => $request->work_attitude,
            'work_movement' => $request->work_movement,
            'eye_fatigue' => $request->eye_fatigue,
            'working_condition' => $request->working_condition,
            'atmospheric_condition' => $request->atmospheric_condition,
            'good_environment' => $request->good_environment,
            'total' => $total,
            'total_rate' => $total_rate,
            'work_station_detail_id' => $request->work_station_detail_id,
        ]);

        return redirect()->route('admin.allowance.index')->with('success', 'Allowance created successfully');
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
        // edit allowance
        $allowance = Allowance::find($id);
        return view('admin.allowance.edit', compact('allowance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $allowance = Allowance::find($id);
        $request->validate([
            'required_power' => 'required|integer',
            'work_attitude' => 'required|integer',
            'work_movement' => 'required|integer',
            'eye_fatigue' => 'required|integer',
            'working_condition' => 'required|integer',
            'atmospheric_condition' => 'required|integer',
            'good_environment' => 'required|integer',
        ]);

        $total = 2 + $request->required_power + $request->work_attitude + $request->work_movement + $request->eye_fatigue + $request->working_condition + $request->atmospheric_condition + $request->good_environment;
        $total_rate = $total / 100;

        $allowance->required_power = $request->required_power;
        $allowance->work_attitude = $request->work_attitude;
        $allowance->work_movement = $request->work_movement;
        $allowance->eye_fatigue = $request->eye_fatigue;
        $allowance->working_condition = $request->working_condition;
        $allowance->atmospheric_condition = $request->atmospheric_condition;
        $allowance->good_environment = $request->good_environment;
        $allowance->total = $total;
        $allowance->total_rate = $total_rate;
        $allowance->save();

        return redirect()->route('admin.allowance.index')->with('success', 'Allowance updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
