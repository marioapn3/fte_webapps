@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">Perhitungan Rating Factor</h5>
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
                            <th>Keterampilan</th>
                            <th>Usaha</th>
                            <th>Kondisi Kerja</th>
                            <th>Konsistensi</th>
                            <th>Rating Factors</th>
                            <th>Actions</th>
                        </tr>

                    </thead>
                    <tbody class="text-center">
                        @foreach ($work_stations as $workStation)
                            <tr class="text-start">
                                <td colspan="8">
                                    <p class="text-bold">Stasiun Kerja{{ $workStation->name }}</p>

                                </td>
                            </tr>
                            @foreach ($workStation->workStationDetails as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        {{ $detail->job_desc }}
                                    </td>
                                    <td>{{ optional($detail->ratingFactor)->skill ?? 'N/A' }}</td>
                                    <td>{{ optional($detail->ratingFactor)->effort ?? 'N/A' }}</td>
                                    <td>{{ optional($detail->ratingFactor)->working_condition ?? 'N/A' }}</td>
                                    <td>{{ optional($detail->ratingFactor)->consistency ?? 'N/A' }}</td>
                                    <td>{{ optional($detail->ratingFactor)->rating_factor ?? 'N/A' }}</td>

                                    {{-- @dd($detail->ratingFactor) --}}
                                    <td>

                                        @if ($detail->ratingFactor)
                                            <a href="{{ route('admin.ratingFactor.edit', $detail->ratingFactor->id) }}"
                                                class="btn btn-primary">Edit</a>
                                        @else
                                            <a href="{{ route('admin.ratingFactor.create', $detail->id) }}"
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
