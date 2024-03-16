<?php

namespace App\Http\Controllers;

use App\Models\WorkElement;
use App\Models\WorkLoad;
use Illuminate\Http\Request;

class WorkLoadController extends Controller
{
    //  $table->id();
    //         $table->foreignId('detail_element_id')->constrained('detail_elements');
    //         $table->integer('work_time_per_year')->nullable();
    //         $table->integer('frequency_per_shift')->nullable();
    //         $table->decimal('total_hour')->nullable();
    //         $table->decimal('effective_time_per_shift')->nullable();
    //         $table->decimal('effective_time_per_year')->nullable();
    //         $table->timestamps();
    public function index()
    {
        $workElements = WorkElement::all();
        return view('admin.workload.index', compact('workElements'));
    }

    public function input_data(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'frequency_per_shift' => 'required|integer',
            'work_time_per_year' => 'required|integer',
            'efective_time_per_shift' => 'required|numeric',
            'efective_time_per_year' => 'required|numeric',
        ]);

        $workLoad = WorkLoad::find($request->id);
        $workLoad->frequency_per_shift = $request->frequency_per_shift;
        $workLoad->work_time_per_year = $request->work_time_per_year;
        $workLoad->effective_time_per_shift = $request->efective_time_per_shift;
        $workLoad->effective_time_per_year = $request->efective_time_per_year;
        $workLoad->total_hour = ($request->frequency_per_shift * $request->work_time_per_year * $workLoad->detailElement->average) / 60;
        $workLoad->work_load = $workLoad->total_hour / ($request->efective_time_per_shift *  $request->work_time_per_year);
        $workLoad->save();

        $subWorkElement = $workLoad->detailElement->subWorkElement;
        $check = true;
        $totalFte = 0;
        foreach ($subWorkElement->detailElements as $detailElement) {
            if ($detailElement->work_load->work_load == null) {
                $check = false;
            }
            $totalFte += $workLoad->work_load;
        }
        if ($check) {
            $subWorkElement->workload = $totalFte;
            $subWorkElement->save();
        }
        $workElement = $subWorkElement->workElement;
        $checkWE = true;
        $totalFteWE = 0;
        foreach ($workElement->subWorkElements as $subWorkElement) {
            if ($subWorkElement->workload == null) {
                $checkWE = false;
            }
            $totalFteWE += $subWorkElement->workload;
        }
        if ($checkWE) {
            $workElement->workload = $totalFteWE;
            $workElement->save();
        }
        return redirect()->back()->with('success', 'Data berhasil diinput');
    }
}
