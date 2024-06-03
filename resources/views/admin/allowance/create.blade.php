@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header ">
            <h5 class="card-title">Hitung Allowance {{ $work_station_detail->job_desc }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="">
                    <form action="{{ route('admin.allowance.store') }}" method="POST">
                        @csrf
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Tenaga yang diperlukan</label>
                            <input name="required_power" type="number" class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Sikap Kerja</label>
                            <input name="work_attitude" type="number" class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Gerakan Kerja</label>
                            <input name="work_movement" type="number" class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Kelelahan mata</label>
                            <input name="eye_fatigue" type="number" class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Keadaan Temperatur Tempat</label>
                            <input name="working_condition" type="number" class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Keadaan Atmosfer</label>
                            <input name="atmospheric_condition" type="number" class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Keadaan Lingkungan Baik</label>
                            <input name="good_environment" type="number" class="form-control">
                        </div>
                        <input type="text" hidden name="work_station_detail_id" value="{{ $work_station_detail->id }}">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
