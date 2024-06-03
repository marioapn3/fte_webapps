@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">Perhitungan Absensi</h5>

        </div>
        <div class="card-body">
            {{-- judul table  --}}
            <h4>Tabel Perhitungan Absensi Tenaga Kerja</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Stasiun Kerja</th>
                            <th>Hari Kerja</th>
                            <th>Absensi</th>
                            <th>Absensi (%)</th>
                            <th>Tenaga Kerja Masuk</th>
                            <th>Tenaga Kerja Keluar</th>
                            <th>Tenaga Kerja Rata</th>
                            <th>LTO</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody class="text-center">
                        @foreach ($work_stations as $workStation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $workStation->name }}</td>
                                <td>{{ optional($workStation->absences)->total_days ?? 'N/A' }}</td>
                                <td>{{ optional($workStation->absences)->total_absences ?? 'N/A' }}</td>
                                <td>{{ optional($workStation->absences)->absence_rate ?? 'N/A' }}</td>
                                <td>{{ optional($workStation->absences)->workforce_in ?? 'N/A' }}</td>
                                <td>{{ optional($workStation->absences)->workforce_out ?? 'N/A' }}</td>
                                <td>{{ optional($workStation->absences)->workforce_avg ?? 'N/A' }}</td>
                                <td>{{ optional($workStation->absences)->lto ?? 'N/A' }}</td>
                                {{-- @dd($detail->ratingFactor) --}}
                                <td>
                                    @if ($workStation->absences)
                                        <a href="{{ route('admin.absence.edit', $workStation->absences->id) }}"
                                            class="btn btn-primary">Edit</a>
                                    @else
                                        <a href="{{ route('admin.absence.createAbs', $workStation->id) }}"
                                            class="btn btn-warning">Add
                                            Output</a>
                                    @endif

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
