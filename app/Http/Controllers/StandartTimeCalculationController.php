<?php

namespace App\Http\Controllers;

use App\Models\DetailElement;
use App\Models\StandartTimeCalculation;
use App\Models\SubWorkElement;
use App\Models\WorkElement;
use App\Models\WorkLoad;
use Illuminate\Http\Request;

class StandartTimeCalculationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);

        $subWorkElementId = SubWorkElement::find($request->id)->id;
        $orders = [1, 2, 3];
        $detailElement =   DetailElement::create([
            'name' => $request->name,
            'sub_work_element_id' => $subWorkElementId,
        ]);
        foreach ($orders as $id) {
            StandartTimeCalculation::create([
                'detail_element_id' => $detailElement->id,
                'order' => $id,
            ]);
        }
        WorkLoad::create([
            'detail_element_id' => $detailElement->id,
        ]);

        return redirect()->back()->with('success', 'Standart Time Calculation has been added');
    }

    public function index()
    {
        $WorkElements = WorkElement::all();
        return view('admin.standart-time-calculation.index', compact('WorkElements'));
    }

    public function input_standart_time(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'work_time' => 'required',
            'rating_factor' => 'required',
            'allowance' => 'required',
        ]);
        $stc = StandartTimeCalculation::find($request->id);
        $stc->work_time = $request->work_time;
        $stc->rating_factor = $request->rating_factor;
        $stc->allowance = $request->allowance;
        $stc->normal_time = $request->work_time +  $request->rating_factor;
        $stc->standard_time = $stc->normal_time + ($stc->normal_time * $request->allowance / 100);
        $stc->save();

        $detailElement = $stc->detailElement;

        $check = true;
        $totalStandartTime = 0;
        foreach ($detailElement->standartTimeCalculations as $stc) {
            if ($stc->standard_time == null) {
                $check = false;
            } else {
                $totalStandartTime += $stc->standard_time;
            }
        }
        if ($check) {
            $detailElement->average = $totalStandartTime / 3;
            $detailElement->save();
        }

        return redirect()->back()->with('success', 'Standart Time Calculation has been added');
    }
}
