<?php

namespace App\Http\Controllers;

use App\Models\WorkElement;
use Illuminate\Http\Request;

class WorkElementController extends Controller
{
    public function index()
    {
        return view('admin.WorkElement.index');
    }

    public function create()
    {
        return view('admin.WorkElement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $workElement = new WorkElement([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);
        $workElement->save();
        return redirect('/workElement')->with('success', 'Work Element has been added');
    }

    public function show($id)
    {
        $workElement = WorkElement::find($id);
        return view('admin.WorkElement.show', compact('workElement'));
    }
}
