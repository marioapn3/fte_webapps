@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header ">
            <h5 class="card-title">{{ $workstation->name }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="">
                    <h5>Nama Stasiun Kerja</h5>
                    <form action="{{ route('admin.work-station.update', $workstation->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Nama Stasiun Kerja</label>
                            <input name="name" value="{{ $workstation->name }}" type="text" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="">
                    <h5>Tambah Job Desk</h5>
                    <form action="{{ route('admin.detail.store') }}" method="POST">
                        @csrf
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Nama Stasiun Kerja</label>
                            <input name="job_desc" value="" type="text" class="form-control">
                            <input type="text" hidden name="work_station_id" value="{{ $workstation->id }}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
            {{-- List Job Desk Judul --}}
            <div class="d-flex justify-content-between">
                <h5 class="mt-5 card-title">List Job Desk</h5>

            </div>
            {{-- button create --}}

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Job Desc</th>
                            <th></th>
                        </tr>

                    </thead>
                    <tbody class="text-center">
                        @foreach ($workstation->workStationDetails as $detail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $detail->job_desc }}</td>
                                {{-- button untuk form delete dan edit --}}
                                <td>
                                    <form action="{{ route('admin.detail.destroy', $detail->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.detail.edit', $detail->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
