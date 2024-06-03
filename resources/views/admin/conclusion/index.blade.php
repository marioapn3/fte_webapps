@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">Tabel Kesimpulan</h5>
            {{-- generate data --}}
            <a href="{{ route('admin.conclusion.generatePDF') }}" class="btn btn-primary">
                Generate PDF
            </a>
        </div>
        <div class="card-body">
            {{-- judul table  --}}
            <h4>Tabel Kesimpulan</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Stasiun Kerja</th>
                            <th>Tenaga Kerja</th>
                            <th>WLA</th>
                            <th>WFA</th>
                        </tr>

                    </thead>
                    <tbody class="text-center">
                        @foreach ($work_stations as $workStation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $workStation->name }}</td>
                                <td>{{ $workStation->absences->workforce_avg ?? 'N/A' }}</td>
                                <td>{{ $workStation->wlaCycle->wla_bulet ?? 'N/A' }}</td>
                                <td>{{ $workStation->wfa_markup ?? 'N/A' }}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
