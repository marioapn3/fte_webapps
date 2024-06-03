@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">List Stasiun Kerja</h5>
            {{-- button create --}}

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Elemen Kerja</th>
                            <th></th>
                        </tr>

                    </thead>
                    <tbody class="text-center">
                        @foreach ($work_stations as $workStation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $workStation->name }}</td>
                                {{-- button untuk form delete dan edit --}}
                                <td>
                                    <a href="{{ route('admin.workElement.show', $workStation->id) }}"
                                        class="btn btn-warning">Lihat Elemen Kerja</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
