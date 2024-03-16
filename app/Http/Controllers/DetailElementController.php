<?php

namespace App\Http\Controllers;

use App\Models\WorkElement;
use Illuminate\Http\Request;

class DetailElementController extends Controller
{
    public function index()
    {
        $workElements = WorkElement::all();
        return view('admin.average-standart-times.index', compact('workElements'));
    }
}
