<?php

namespace App\Http\Controllers\WorkElement;

use App\Http\Controllers\Controller;
use App\Models\Iteration;
use App\Models\WorkElement;
use App\Models\WorkStation;
use App\Models\WorkStationDetail;
use Illuminate\Http\Request;

class WorkElementController extends Controller
{
    public function index()
    {
        $work_stations = WorkStation::all();
        return view('admin.work_element.index', compact('work_stations'));
    }

    public function show($id)
    {
        $work_station = WorkStation::find($id);
        return view('admin.work_element.show', compact('work_station'));
    }

    public function create($id)
    {
        $work_station_detail = WorkStationDetail::find($id);

        return view('admin.work_element.create', compact('work_station_detail'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'value' => 'required',
        ]);

        // cek jika value nya kurang dari 26 maka akan di redirect kembali
        if (count($request->value) < 25) {
            // dd countnya
            return redirect()->back()->with('error', 'Value must be 25');
        }
        // total semua value dalam $total
        $total = array_sum($request->value);

        // $total_squeared = $total kuadrat
        $total_squeared = $total * $total;

        // average dari value
        $average = $total / 26;

        // standart deviation dari value
        $standart_deviation = 0;
        foreach ($request->value as $value) {
            $standart_deviation += pow($value - $average, 2);
        }
        $standart_deviation = sqrt($standart_deviation / 26);

        // foreach dari total value di kuadrat baru disum
        $squared_total = 0;
        foreach ($request->value as $value) {
            $squared_total += $value * $value;
        }

        // bka dari value
        $bka = $average + (2 * $standart_deviation);
        $bkb = $average - (2 * $standart_deviation);
        // =(2/0.05*(SQRT(25*P31-K32))/K31)^2
        // P31 = $squared_total
        // K32 = $total_squeared
        // K31 = $total
        $n = pow((2 / 0.05 * (sqrt(25 * $squared_total - $total_squeared)) / $total), 2);

        // cek jika work_station_id nya ga ada di work_elemen maka ietartion nya 1
        //buatkan perhitungan nya jika ada 1 maka iteration nya 2 dan seterusnya


        $work_element =     WorkElement::create([
            'work_station_detail_id' => $id,
            'total_squared' => $total_squeared,
            'average' => $average,
            'bka' => $bka,
            'bkb' => $bkb,
            'n' => $n,
            'standart_deviation' => $standart_deviation,
        ]);

        foreach ($request->value as $value) {
            Iteration::create([
                'work_element_id' => $work_element->id,
                'value' => $value,
            ]);
        }

        return redirect()->route('admin.workElement.index')->with('success', 'Work Element has been created');
    }
}
