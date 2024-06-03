@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header ">
            <h5 class="card-title">Edit Absensi</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="">
                    <form action="{{ route('admin.absence.update', $absence->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Hari Kerja</label>
                            <input value="{{ $absence->total_days }}" name="total_days" type="number" class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Absensi</label>
                            <input value="{{ $absence->total_absences }}" name="total_absences" type="number"
                                class="form-control">
                        </div>

                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Jumlah Tenaga Masuk</label>
                            <input value="{{ $absence->workforce_in }}" name="workforce_in" type="number"
                                class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Jumlah Tenaga Keluar</label>
                            <input value="{{ $absence->workforce_out }}" name="workforce_out" type="number"
                                class="form-control">
                        </div>
                        <div class="my-3 input-group input-group-outline">
                            <label class="form-label">Rata Rata Tenaga Kerja</label>
                            <input value="{{ $absence->workforce_avg }}" name="workforce_avg" type="number" step="0.01"
                                class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
