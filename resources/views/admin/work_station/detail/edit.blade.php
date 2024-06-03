@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header ">
            <h5 class="card-title">Tambah Stasiun Kerja</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="">
                    <form action="{{ route('admin.detail.update', $detail->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Nama Job Desk</label>
                            <input name="job_desc" value="{{ $detail->job_desc }}" type="text" class="form-control">

                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
