<?php

namespace App\Http\Controllers;

use App\Models\SubWorkElement;
use App\Models\WorkElement;
use Illuminate\Http\Request;

class SubWorkElementController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'work_element_name' => 'required',
            'order' => 'required|numeric|min:1|',
        ]);
        $workElement = WorkElement::where('name', $request->work_element_name)->first();
        // $workElement1 = WorkElement::where('name', $request->work_element_name)->where('order', 1)->first();
        // $workElement2 = WorkElement::where('name', $request->work_element_name)->where('order', 2)->first();
        // $workElement3 = WorkElement::where('name', $request->work_element_name)->where('order', 3)->first();
        SubWorkElement::create([
            'name' => $request->name,
            'work_element_id' => $workElement->id,
            'order' => $request->order,
        ]);
        return redirect()->back()->with('success', 'Sub Work Element has been added');
    }
}
