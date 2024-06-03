@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header ">
            <h5 class="card-title">Hitung Rating Factor</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="">
                    <form action="{{ route('admin.ratingFactor.store') }}" method="POST">
                        @csrf
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Keterampilan</label>
                            <input name="skill" type="text" class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Usaha</label>
                            <input name="effort" type="text" class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Kondisi Kerja</label>
                            <input name="working_condition" type="text" class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Konsistensi</label>
                            <input name="consistency" type="text" class="form-control">
                        </div>
                        <input type="text" hidden name="work_station_detail_id" value="{{ $work_station_detail->id }}">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
