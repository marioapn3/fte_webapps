<?php

namespace App\Http\Controllers\Conclusion;

use App\Http\Controllers\Controller;
use App\Models\WorkStation;
use Illuminate\Http\Request;
use PDF;

class ConclusionController extends Controller
{
    public function index()
    {
        $work_stations = WorkStation::all();
        return view('admin.conclusion.index', compact('work_stations'));
    }



    public function generatePDF()
    {
        $work_stations = WorkStation::all(); // Ambil semua data work station

        $pdf = PDF::loadView('admin.conclusion.pdf', compact('work_stations')); // Load view pdf.blade.php dengan data work stations

        return $pdf->download('work_stations.pdf'); // Download file PDF
    }
}
