@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">List Elemen Kerja</h5>
            {{-- button create --}}

        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4>Tambah Elemen Kerja {{ $work_station_detail->job_desc }}</h4>

            </div>
            <form action="{{ route('admin.workElement.store', $work_station_detail->id) }}" method="POST">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Perulangan</th>
                            <th>Value</th>
                        </tr>

                    </thead>
                    <tbody>

                        @csrf
                        @for ($i = 1; $i < 26; $i++)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>
                                    <input step="any" type="number" name="value[]">
                                </td>
                            </tr>
                        @endfor

                    </tbody>
                </table>
                {{-- input ketika ditkean maka akan menambahkan input dengan name value[] --}}
                <button type="button" class="btn btn-primary" id="addInput">Tambah Input</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                <script>
                    let counter = 26;
                    document.getElementById('addInput').addEventListener('click', function() {
                        let tbody = document.querySelector('tbody');
                        let tr = document.createElement('tr');
                        let tdCounter = document.createElement('td');
                        tdCounter.textContent = counter++;
                        let td = document.createElement('td');
                        let input = document.createElement('input');
                        input.setAttribute('type', 'number');
                        input.setAttribute('name', 'value[]');
                        td.appendChild(input);
                        tr.appendChild(tdCounter);
                        tr.appendChild(td);
                        tbody.appendChild(tr);
                    });
                </script>
            </form>
        </div>
    </div>
@endsection
