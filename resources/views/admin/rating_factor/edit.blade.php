@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header ">
            <h5 class="card-title">Edit Rating Factor</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="">
                    <form action="{{ route('admin.ratingFactor.update', $rating_factor->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Keterampilan</label>
                            <input name="skill" value="{{ $rating_factor->skill }}" type="number" step="any"
                                class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Usaha</label>
                            <input name="effort"value="{{ $rating_factor->effort }}" type="number" step="any"
                                class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Kondisi Kerja</label>
                            <input name="working_condition" value="{{ $rating_factor->working_condition }}" step="any"
                                type="number" class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Konsistensi</label>
                            <input name="consistency" value="{{ $rating_factor->consistency }}" type="number"
                                step="any" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
