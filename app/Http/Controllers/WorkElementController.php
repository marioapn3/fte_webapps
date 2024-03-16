<?php

namespace App\Http\Controllers;

use App\Models\WorkElement;
use App\Models\WorkerNeed;
use Illuminate\Http\Request;

class WorkElementController extends Controller
{
    public function index()
    {
        $workElements = WorkElement::all();
        return view('admin.WorkElement.index', compact('workElements'));
    }

    public function create()
    {
        return view('admin.WorkElement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        // for ($i = 0; $i < 3; $i++) {
        //     WorkElement::create([
        //         'name' => $request->name,
        //         'order' => $i + 1,
        //     ]);
        // }

        $workElement =      WorkElement::create([
            'name' => $request->name,
        ]);

        WorkerNeed::create([
            'work_element_id' => $workElement->id,
        ]);

        return redirect()->route('admin.workElement.index')->with('success', 'Work Element has been added');
    }

    public function show($id)
    {
        $workElement = WorkElement::find($id);
        return view('admin.WorkElement.detail', compact('workElement'));
    }

    public function delete($id)
    {
        $workElement = WorkElement::find($id);
        $workElement->delete();
        return redirect()->route('admin.workElement.index')->with('success', 'Work Element has been deleted');
    }
}
