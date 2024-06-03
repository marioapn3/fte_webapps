@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header ">
            <h5 class="card-title">Edit Output Data</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="">
                    <form action="{{ route('admin.wla.update', $workStation->id) }}" method="POST">
                        @csrf
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Hasil Output</label>
                            <input name="output" value="{{ $workStation->output }}" type="number" step="any"
                                class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Saatuan Output</label>
                            <input name="unit_of_output"value="{{ $workStation->unit_of_output }}" type="text"
                                class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
