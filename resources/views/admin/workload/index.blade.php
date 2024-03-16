@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">
                        Masukan Data Waktu
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- $table->integer('work_time')->nullable();
            $table->integer('rating_factor')->nullable();

            $table->integer('allowance')->nullable();
         --}}
                <form action="{{ route('admin.workLoad.input_data') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3 input-group input-group-outline">
                            <label for="frequency_per_shift" class="form-label">Frekuensi /Shif</label>
                            <input type="number" class="form-control" id="frequency_per_shift"
                                name="frequency_per_shift"step=".0001">
                        </div>
                        <div class="mb-3 input-group input-group-outline">
                            <label for="work_time_per_year" class="form-label">Hari Kerja /Tahun</label>
                            <input type="number" class="form-control" id="work_time_per_year" name="work_time_per_year"
                                step=".0001">
                        </div>
                        <div class="mb-3 input-group input-group-outline">
                            <label for="efective_time_per_shift" class="form-label">Waktu Efektif /Shif </label>
                            <input type="number" class="form-control" id="efective_time_per_shift"
                                name="efective_time_per_shift" step=".0001">
                        </div>
                        <div class="mb-3 input-group input-group-outline">
                            <label for="efective_time_per_year" class="form-label">Waktu Efektif /Tahun </label>
                            <input type="number" class="form-control" id="efective_time_per_year"
                                name="efective_time_per_year"step=".0001">
                        </div>
                        <input id="id" name="id" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Perhitungan Beban Kerja FTE</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>Elemen Kerja</th>
                            <th>Waktu Baku</th>
                            <th>Hari Kerja /tahun</th>
                            <th>Frekuensi
                                /shif</th>
                            <th>Total
                                jam</th>
                            <th>Waktu
                                efektif
                                /shif</th>
                            <th>Waktu
                                efektif
                                /tahun</th>
                            <th colspan="3">Beban Kerja</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($workElements as $workElement)
                            @php
                                $totalItem = 0;
                                $totalDetailElement = 0;
                                foreach ($workElement->subWorkElements as $subWorkElement) {
                                    foreach ($subWorkElement->detailElements as $detailElement) {
                                        $totalDetailElement += 1;
                                    }
                                }
                                $totalSubWorkItem = $workElement->subWorkElements->count();
                                $totalItem = $totalDetailElement + $totalSubWorkItem + 1;
                            @endphp
                            <tr>
                                <td colspan="9" class="table-primary text-start"><b>{{ $workElement->name }}</b></td>
                                <td style="vertical-align : middle;text-align:center;" rowspan="{{ $totalItem }}">
                                    {{ $workElement->workload }}</td>
                            </tr>
                            @foreach ($workElement->subWorkElements as $subWorkElement)
                                <tr>
                                    <td colspan="8">{{ $subWorkElement->order }}. {{ $subWorkElement->name }}</td>
                                    <td style="vertical-align : middle;text-align:center;"
                                        rowspan="{{ $subWorkElement->detailElements->count() + 1 }}">
                                        {{ $subWorkElement->workload }}</td>
                                </tr>
                                @foreach ($subWorkElement->detailElements as $detailElement)
                                    @php
                                        $fteSubWorkelement = $detailElement->subWorkElement->workload;
                                    @endphp
                                    <tr class="text-center">
                                        <td class="text-start">
                                            <p class="">
                                                {{ $detailElement->name }}
                                            </p>
                                        </td>
                                        <td>{{ $detailElement->average }}</td>
                                        <td>{{ $detailElement->work_load->work_time_per_year }}</td>
                                        <td>{{ $detailElement->work_load->frequency_per_shift }}</td>
                                        <td>{{ $detailElement->work_load->total_hour }}</td>
                                        <td>{{ $detailElement->work_load->effective_time_per_shift }}</td>
                                        <td>{{ $detailElement->work_load->effective_time_per_year }}</td>
                                        <td>{{ $detailElement->work_load->work_load }}</td>

                                        <td> <a href="#" class="btn btn-primary btn-sm addFTE" data-bs-toggle="modal"
                                                data-bs-target="#deleteConfirmationModal"
                                                data-id="{{ $detailElement->work_load->id }}" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Add Data">
                                                Input Nilai
                                            </a></td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).on('click', '.addFTE', function() {
            let id = $(this).attr('data-id');
            $('#id').val(id);
        });
    </script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script> --}}
@endsection
