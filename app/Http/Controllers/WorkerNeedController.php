<?php

namespace App\Http\Controllers;

use App\Models\WorkElement;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class WorkerNeedController extends Controller
{
    //    $table->timestamps();
    //         $table->foreignId('work_element_id')->constrained('work_elements');
    //         $table->integer('operator_now')->nullable();
    //         $table->decimal('operator_load')->nullable();
    //         $table->string('desc')->nullable();
    //         $table->integer('operator_need')->nullable();
    //         $table->decimal('operator_load_need')->nullable();
    //         $table->string('desc_need')->nullable();

    public function index()
    {
        $workElements = WorkElement::all();
        return view('admin.workerneed.index', compact('workElements'));
    }

    public function index_head()
    {
        return view('head_division.index');
    }


    public function work_head()
    {
        $workElements = WorkElement::all();
        return view('head_division.worker_need', compact('workElements'));
    }


    public function downloadPDF()
    {
        $workElements = WorkElement::all();

        $pdf = Pdf::loadView('head_division.invoice', ['workElements' => $workElements]);
        return $pdf->download('work-need.pdf');
    }




    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'operator_now' => 'required|integer',
        ]);

        $workElement = WorkElement::find($request->id);
        $workNeed = $workElement->workerNeed;

        $workNeed->operator_now = $request->operator_now;
        $workNeed->operator_load = $workElement->workload / $request->operator_now;
        $workNeed->desc = $this->descCount($workElement->operator_load);
        $workNeed->operator_need = $workElement->workload / 1.28;
        $workNeed->operator_load_need = $workElement->workload / $workNeed->operator_need;
        $workNeed->desc_need = $this->descCount($workNeed->operator_load_need);
        $workNeed->save();

        return redirect()->back()->with('success', 'Worker Need has been added');
    }

    public function descCount($operator_load)
    {
        if ($operator_load < 0.6) {
            return "Underload";
        } elseif ($operator_load >= 0.6 && $operator_load <= 1.2) {
            return "Normal";
        } elseif ($operator_load > 1.2) {
            return "High";
        } else {
            return "Data Tidak Validd";
        }
    }
}
