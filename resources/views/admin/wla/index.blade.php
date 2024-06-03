@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">Perhitungan WLA</h5>
            {{-- button create --}}
            <a href="{{ route('admin.wla.generateData') }}" class="btn btn-primary">
                Generate Data WLA
            </a>
        </div>
        <div class="card-body">
            {{-- judul table  --}}
            <h4>Tabel Siklus Setiap Job Desc</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Job Description</th>
                            <th>Ws</th>
                            <th>Wn</th>
                            <th>Wb</th>
                        </tr>

                    </thead>
                    <tbody class="text-center">
                        @foreach ($work_stations as $workStation)
                            <tr class="text-start">
                                <td colspan="4">
                                    <p class="text-bold">Stasiun Kerja {{ $workStation->name }}</p>
                                    <p>Hasil Output : {{ $workStation->output ?? 'N/A' }}</p>
                                    <p>Satuan Output : {{ $workStation->unit_of_output ?? 'N/A' }}</p>

                                </td>
                                <td class="my-auto d-flex justify-content-center">
                                    <a href="{{ route('admin.wla.edit', $workStation->id) }}" class="btn btn-warning">Add
                                        Output</a>
                                </td>
                            </tr>
                            @foreach ($workStation->workStationDetails as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $detail->job_desc }}
                                    </td>
                                    <td>{{ optional($detail->wlaDetailCycle)->ws ?? 'N/A' }}</td>
                                    <td>{{ optional($detail->wlaDetailCycle)->wn ?? 'N/A' }}</td>
                                    <td>{{ optional($detail->wlaDetailCycle)->wb ?? 'N/A' }}</td>
                                    {{-- @dd($detail->ratingFactor) --}}

                                </tr>
                            @endforeach
                        @endforeach

                    </tbody>
                </table>
            </div>
            <h4>Tabel Siklus Setiap Job Desc</h4>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Stasiun Kerja</th>
                            <th>WB Total</th>
                            <th>WLA</th>
                            <th>WLA Markup</th>
                            <th>Hasil Output</th>
                        </tr>

                    </thead>
                    <tbody class="text-center">
                        @foreach ($work_stations as $workStation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $workStation->name }}</td>
                                <td>{{ optional($workStation->wlaCycle)->wb ?? 'N/A' }}</td>
                                <td>{{ optional($workStation->wlaCycle)->wla ?? 'N/A' }}</td>
                                <td>{{ optional($workStation->wlaCycle)->wla_bulet ?? 'N/A' }}</td>
                                <td>{{ $workStation->output }} {{ $workStation->unit_of_output }}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
