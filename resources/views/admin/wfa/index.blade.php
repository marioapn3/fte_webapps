@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">Perhitungan WFA</h5>
            {{-- generate data --}}
            <a href="{{ route('admin.generateData-wfa') }}" class="btn btn-primary">
                Generate Data
            </a>
        </div>
        <div class="card-body">
            {{-- judul table  --}}
            <h4>Tabel Perhitungan WFA</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Stasiun Kerja</th>
                            <th>WFA</th>
                            <th>WFA Pembulatan</th>

                        </tr>

                    </thead>
                    <tbody class="text-center">
                        @foreach ($work_stations as $workStation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $workStation->name }}</td>
                                <td>{{ $workStation->wfa }}</td>
                                <td>{{ $workStation->wfa_markup }}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
