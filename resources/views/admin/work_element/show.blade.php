@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">List Elemen Kerja</h5>
            {{-- button create --}}
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4>Elemen Kerja {{ $work_station->name }}</h4>

            </div>
            <table class="table mt-3 table-striped table-hover">
                <thead class="text-center">
                    <tr>
                        <th>Nama Elemen Kerja</th>
                        <th>Iterasi</th>
                        <th>Total Kuadrat</th>
                        <th>Rata-Rata</th>
                        <th>BKA</th>
                        <th>BKA</th>
                        <th>N</th>
                        <th>Standar Deviasi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($work_station->workStationDetails as $detail)
                        <tr>
                            <td>{{ $detail->job_desc }}</td>
                            @if ($detail->workElement)
                                <td>
                                    <div class="iteration-values">
                                        @foreach ($detail->workElement->iterations as $iteration)
                                            <span>{{ $iteration->value }}</span><br>
                                        @endforeach
                                    </div>
                                </td>
                                <td>{{ $detail->workElement->total_squared }}</td>
                                <td>{{ $detail->workElement->average }}</td>
                                <td>{{ $detail->workElement->bka }}</td>
                                <td>{{ $detail->workElement->bkb }}</td>
                                <td>{{ $detail->workElement->n }}</td>
                                <td>{{ $detail->workElement->standart_deviation }}</td>
                            @else
                                <td>
                                    <a href="{{ route('admin.workElement.create', $detail->id) }}"
                                        class="ml-auto btn btn-primary">
                                        Tambah Job Desk
                                    </a>
                                </td>
                            @endif

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <style>
        .iteration-values span {
            display: inline-block;
            width: 25%;
        }
    </style>
@endsection
