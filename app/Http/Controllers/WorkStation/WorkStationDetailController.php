<?php

namespace App\Http\Controllers\WorkStation;

use App\Http\Controllers\Controller;
use App\Models\WorkStationDetail;
use Illuminate\Http\Request;

class WorkStationDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.work_station.detail.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'work_station_id' => 'required|integer',
            'job_desc' => 'required|string',
        ]);

        WorkStationDetail::create([
            'work_station_id' => $request->work_station_id,
            'job_desc' => $request->job_desc,
        ]);

        return redirect()->back()->with('success', 'Work Station Detail has been created');
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
        $detail = WorkStationDetail::find($id);
        return view('admin.work_station.detail.edit', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'job_desc' => 'required|string',
        ]);

        $detail = WorkStationDetail::find($id);
        $detail->job_desc = $request->job_desc;
        $detail->save();

        return redirect()->route('admin.work-station.edit', $detail->work_station_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detail = WorkStationDetail::find($id);

        $detail->delete();

        return redirect()->back()->with('success', 'Work Station Detail has been created');
    }
}
