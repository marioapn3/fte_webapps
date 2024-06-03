@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header ">
            <h5 class="card-title">Absensi Tenaga Kerja {{ $work_station->job_desc }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="">
                    <form action="{{ route('admin.absence.store') }}" method="POST">
                        @csrf
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Hari Kerja</label>
                            <input name="total_days" type="number" class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Absensi</label>
                            <input name="total_absences" type="number" class="form-control">
                        </div>

                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Jumlah Tenaga Masuk</label>
                            <input name="workforce_in" type="number" class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Jumlah Tenaga Keluar</label>
                            <input name="workforce_out" type="number" class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Rata Rata Tenaga Kerja</label>
                            <input name="workforce_avg" type="number" step="0.01" class="form-control">
                        </div>

                        <input type="text" hidden name="work_station_id" value="{{ $work_station->id }}">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
