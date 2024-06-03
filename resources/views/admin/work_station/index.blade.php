@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">List Stasiun Kerja</h5>
            {{-- button create --}}
            <a href="{{ route('admin.work-station.create') }}" class="btn btn-primary">
                Tambah Elemen Kerja
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Stasiun Kerja</th>
                            <th></th>
                        </tr>

                    </thead>
                    <tbody class="text-center">
                        @foreach ($workStations as $workStation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $workStation->name }}</td>
                                {{-- button untuk form delete dan edit --}}
                                <td>
                                    <form action="{{ route('admin.work-station.destroy', $workStation->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.work-station.edit', $workStation->id) }}"
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
