<?php

namespace App\Http\Controllers\RatingFactor;

use App\Http\Controllers\Controller;
use App\Models\RatingFactor;
use App\Models\WorkStation;
use App\Models\WorkStationDetail;
use Illuminate\Http\Request;

class RatingFactorController extends Controller
{
    public function index()
    {
        $work_stations = WorkStation::all();
        return view('admin.rating_factor.index', compact('work_stations'));
    }

    public function create($id)
    {
        $work_station_detail = WorkStationDetail::find($id);
        return view('admin.rating_factor.create', compact('work_station_detail'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'work_station_detail_id' => 'required',
            'skill' => 'required',
            'effort' => 'required',
            'working_condition' => 'required',
            'consistency' => 'required',
        ]);

        $rating_factor = 1 + ($request->skill + $request->effort + $request->working_condition + $request->consistency);
        RatingFactor::create([
            'work_station_detail_id' => $request->work_station_detail_id,
            'skill' => $request->skill,
            'effort' => $request->effort,
            'working_condition' => $request->working_condition,
            'consistency' => $request->consistency,
            'rating_factor' => $rating_factor,
        ]);
        return redirect()->route('admin.ratingFactor.index')->with('success', 'Rating Factor created successfully');
    }

    public function edit($id)
    {
        $rating_factor = RatingFactor::find($id);
        return view('admin.rating_factor.edit', compact('rating_factor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'skill' => 'required',
            'effort' => 'required',
            'working_condition' => 'required',
            'consistency' => 'required',
        ]);

        $rating_factor = RatingFactor::find($id);
        $rating_factor->skill = $request->skill;
        $rating_factor->effort = $request->effort;
        $rating_factor->working_condition = $request->working_condition;
        $rating_factor->consistency = $request->consistency;
        $rating_factor->rating_factor = 1 + ($request->skill + $request->effort + $request->working_condition + $request->consistency);
        $rating_factor->save();
        return redirect()->route('admin.ratingFactor.index')->with('success', 'Rating Factor updated successfully');
    }
}
