<?php

namespace App\Http\Controllers\WLA;

use App\Http\Controllers\Controller;
use App\Models\WLACycle;
use App\Models\WLADetailCycle;
use App\Models\WorkStation;
use Illuminate\Http\Request;

class WLAController extends Controller
{
    public function index()
    {
        $work_stations = WorkStation::all();
        return view('admin.wla.index', compact('work_stations'));
    }

    public function create()
    {
        return view('admin.wla.create');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'output' => 'required',
            'unit_of_output' => 'required',
        ]);
        $workStation = WorkStation::find($id);
        $workStation->update([
            'output' => $request->output,
            'unit_of_output' => $request->unit_of_output,
        ]);
        return redirect()->route('admin.wla.index');
    }

    public function edit($id)
    {
        $workStation = WorkStation::find($id);
        return view('admin.wla.edit', compact('workStation'));
    }



    public function generateData()
    {
        $work_stations = WorkStation::all();
        foreach ($work_stations as $work_station) {
            foreach ($work_station->workStationDetails as $work_station_detail) {
                $ws = $work_station_detail->workElement->average;
                $wn = $ws * $work_station_detail->ratingFactor->rating_factor;
                $wb = $wn * (100 / (100 - $work_station_detail->allowance->total));
                // if wla detail cycle is exist then update
                if ($work_station_detail->wlaDetailCycle) {
                    $work_station_detail->wlaDetailCycle->update([
                        'ws' => $ws,
                        'wn' => $wn,
                        'wb' => $wb,
                    ]);
                } else {
                    $wla_detail_cycle = WLADetailCycle::create([
                        'work_station_detail_id' => $work_station_detail->id,
                        'ws' => $ws,
                        'wn' => $wn,
                        'wb' => $wb,
                    ]);
                }
            }
            $wb_station = $work_station->workStationDetails->sum('wlaDetailCycle.wb');
            $wla = ($work_station->output * $wb_station) / (27 * 28800);
            // if wla cycle is exist then update
            if ($work_station->wlaCycle) {
                $work_station->wlaCycle->update([
                    'wb' => $wb_station,
                    'wla' => $wla,
                    'wla_bulet' => ceil($wla),
                ]);
            } else {
                WLACycle::create([
                    'work_station_id' => $work_station->id,
                    // wb sum dari wla cycle detail sesuai dengan work station
                    'wb' => $wb_station,
                    'wla' => $wla,
                    'wla_bulet' => ceil($wla),
                ]);
            }


            return redirect()->back()->with('success', 'Data WLA Berhasil Di Generate');
        }
    }
}
