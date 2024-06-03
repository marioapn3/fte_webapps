@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">Perhitungan Allowance</h5>
            {{-- button create --}}
            {{-- <a href="{{ route('admin.work-station.create') }}" class="btn btn-primary">
                Tambah Elemen Kerja
            </a> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Job Description</th>
                            <th>Tenaga yang diperlukan</th>
                            <th>Sikap Kerja</th>
                            <th>Gerakan Kerja</th>
                            <th>Kelelahan mata</th>
                            <th>Keadaan Temperatur Tempat</th>
                            <th>Keadaan Atmosfer</th>
                            <th>Keadaan Lingkungan Baik</th>
                            <th>Total</th>
                            <th>Presentase Total</th>
                            <th>Actions</th>
                        </tr>

                    </thead>
                    <tbody class="text-center">
                        @foreach ($work_stations as $workStation)
                            <tr class="text-start">
                                <td colspan="13">
                                    <p class="text-bold">Stasiun Kerja{{ $workStation->name }}</p>

                                </td>
                            </tr>
                            @foreach ($workStation->workStationDetails as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        {{ $detail->job_desc }}
                                    </td>
                                    <td>{{ optional($detail->allowance)->required_power ?? 'N/A' }}</td>
                                    <td>{{ optional($detail->allowance)->work_attitude ?? 'N/A' }}</td>
                                    <td>{{ optional($detail->allowance)->work_movement ?? 'N/A' }}</td>
                                    <td>{{ optional($detail->allowance)->eye_fatigue ?? 'N/A' }}</td>
                                    <td>{{ optional($detail->allowance)->working_condition ?? 'N/A' }}</td>
                                    <td>{{ optional($detail->allowance)->atmospheric_condition ?? 'N/A' }}</td>
                                    <td>{{ optional($detail->allowance)->good_environment ?? 'N/A' }}</td>
                                    <td>{{ optional($detail->allowance)->total ?? 'N/A' }}</td>
                                    <td>{{ optional($detail->allowance)->total_rate ?? 'N/A' }}</td>

                                    {{-- @dd($detail->ratingFactor) --}}
                                    <td>

                                        @if ($detail->allowance)
                                            <a href="{{ route('admin.allowance.edit', $detail->allowance->id) }}"
                                                class="btn btn-primary">Edit</a>
                                        @else
                                            <a href="{{ route('admin.allowance.create-allowance', $detail->id) }}"
                                                class="btn btn-warning">Add</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
