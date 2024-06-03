@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header ">
            <h5 class="card-title">Edit Allowance : {{ $allowance->workStationDetail->job_desc }}</h5>
            {{-- @dd($allowance->workStationDetail) --}}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="">
                    <form action="{{ route('admin.allowance.update', $allowance->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Tenaga yang diperlukan</label>
                            <input value="{{ $allowance->required_power }}" name="required_power" type="number"
                                class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Sikap Kerja</label>
                            <input value="{{ $allowance->work_attitude }}" name="work_attitude" type="number"
                                class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Gerakan Kerja</label>
                            <input value="{{ $allowance->work_movement }}" name="work_movement" type="number"
                                class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Kelelahan mata</label>
                            <input value="{{ $allowance->eye_fatigue }}" name="eye_fatigue" type="number"
                                class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Keadaan Temperatur Tempat</label>
                            <input value="{{ $allowance->working_condition }}" name="working_condition" type="number"
                                class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Keadaan Atmosfer</label>
                            <input value="{{ $allowance->atmospheric_condition }}" name="atmospheric_condition"
                                type="number" class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Keadaan Lingkungan Baik</label>
                            <input value="{{ $allowance->good_environment }}" name="good_environment" type="number"
                                class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
