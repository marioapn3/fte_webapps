<?php

namespace App\Http\Controllers\WorkStation;

use App\Http\Controllers\Controller;
use App\Models\WorkStation;
use Illuminate\Http\Request;

class WorkStationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workStations = WorkStation::all();
        return view('admin.work_station.index', compact('workStations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.work_station.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        WorkStation::create([
            'name' => $request->name,
            'user_id' => auth()->id(),
        ]);
        return redirect()->route('admin.work-station.index');
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
        $workstation = WorkStation::find($id);
        return view('admin.work_station.edit', compact('workstation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        $workstation = WorkStation::find($id);
        $workstation->update([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.work-station.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        WorkStation::destroy($id);
        return redirect()->route('admin.work-station.index');
    }
}
