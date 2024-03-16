@extends('layouts.head_division')

@section('title')
    Kebutuhan Pekerja
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

                <form action="{{ route('admin.workerNeed.store') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3 input-group input-group-outline">
                            <label for="operator_now" class="form-label">Jumlah Operator Saat Ini</label>
                            <input type="number" class="form-control" id="operator_now" name="operator_now"step=".0001">
                        </div>

                        <input id="id" name="id">
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
            <div class="gap-5 justify-content-between row ">
                <div class="col-auto">
                    <h5 class="card-title">Penentuan jumlah tenaga kerja pembuatan cylinder setiap shift</h5>

                </div>
                <div class="col-auto">
                    <a href="{{ route('head-div.workerNeed.downloadPDF') }}">
                        <button class="btn btn-primaryco">Import PDF</button>
                    </a>

                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-center table-hover">
                    <thead class="">
                        <tr>
                            <th>Proses Kerja</th>
                            <th>Beban Kerja</th>
                            <th>Jumlah Operator saat ini</th>
                            <th>Beban kerja setiap operator </th>
                            <th>Keterangan</th>
                            <th>Jumlah
                                operator
                                optimal
                                menjadi</th>
                            <th>Beban
                                kerja
                                setiap
                                operator</th>
                            <th>keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($workElements as $workElement)
                            <tr>
                                <td>{{ $workElement->name }}</td>
                                <td>{{ $workElement->workload }}</td>
                                <td>{{ $workElement->workerNeed->operator_now }}</td>
                                <td>{{ $workElement->workerNeed->operator_load }}</td>
                                <td>{{ $workElement->workerNeed->desc }}</td>
                                <td>{{ $workElement->workerNeed->operator_need }}</td>
                                <td>{{ $workElement->workerNeed->operator_load_need }}</td>
                                <td>{{ $workElement->workerNeed->desc_need }}</td>
                                <td> <a href="#" class="btn btn-primary btn-sm addFTE" data-bs-toggle="modal"
                                        data-bs-target="#deleteConfirmationModal"
                                        data-id="{{ $workElement->workerNeed->id }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Add Data">
                                        Input Nilai
                                    </a></td>
                            </tr>
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
