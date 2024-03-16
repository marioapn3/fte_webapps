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
                <form action="{{ route('admin.standartTimeCalculation.input_standart_time') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3 input-group input-group-outline">
                            <label for="work_time" class="form-label">Waktu Kerja (𝐱̅)</label>
                            <input type="number" class="form-control" id="work_time" name="work_time" step="any">
                        </div>
                        <div class="mb-3 input-group input-group-outline">
                            <label for="rating_factor" class="form-label">Rating Factor (RF)</label>
                            <input type="number" class="form-control" id="rating_factor" name="rating_factor"
                                step="any">
                        </div>
                        <div class="mb-3 input-group input-group-outline">
                            <label for="allowance" class="form-label">Allowance (%)</label>
                            <input type="number" class="form-control" id="allowance" name="allowance">
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
            <h5 class="card-title">Hitung Waktu Baku Pekerja 1</h5>
            {{-- <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create SubWork Element</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.subWorkElement.store') }}" method="POST">
                            <div class="modal-body">
                                @csrf
                                <div class="mb-3 input-group input-group-outline">
                                    <label for="name" class="form-label">SubWork Element</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="mb-3 input-group input-group-outline">
                                    <label for="order" class="form-label">Urutan</label>
                                    <input type="text" class="form-control" id="order" name="order">
                                </div>
                                <input hidden type="text" name="work_element_name" value="{{ $workElement->name }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
             --}}



            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="">
                        <thead>
                            <tr>
                                <th>WorkElement</th>
                                <th></th>
                                <th>𝐱̅</th>
                                <th>RF</th>
                                <th>Waktu Normal</th>
                                <th>Allowance</th>
                                <th>WaktuBaku</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($WorkElements as $workElement)
                                @foreach ($workElement->subWorkElements as $subWorkElement)
                                    <tr class="table-danger">
                                        <td colspan="9">
                                            <b>
                                                {{ $subWorkElement->order }}. {{ $subWorkElement->name }}

                                            </b>
                                        </td>

                                    </tr>

                                    @foreach ($subWorkElement->detailElements as $detailElement)
                                        <tr class="text-center">
                                            <td></td>
                                            <td>{{ $detailElement->name }}</td>
                                            @foreach ($detailElement->standartTimeCalculations->where('order', 1) as $item)
                                                <td>{{ $item->work_time }}</td>
                                                <td>{{ $item->rating_factor }}</td>
                                                <td>{{ $item->normal_time }}</td>
                                                <td>{{ $item->allowance }}%</td>
                                                <td>{{ $item->standard_time }}</td>
                                                <td>
                                                    <a href="#"
                                                        class="btn btn-primary btn-sm delete-btn hitungWaktuBaku"
                                                        data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"
                                                        data-id="{{ $item->id }}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Add Data">
                                                        Input Nilai
                                                    </a>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="card-header">
            <h5 class="card-title">Hitung Waktu Baku Pekerja 2</h5>



            <div class="card-body " style="">
                <div class="table-responsive">
                    <table class="table table-bordered" id="">
                        <thead>
                            <tr>
                                <th>WorkElement</th>
                                <th></th>
                                <th>𝐱̅</th>
                                <th>RF</th>
                                <th>Waktu Normal</th>
                                <th>Allowance</th>
                                <th>WaktuBaku</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($WorkElements as $workElement)
                                @foreach ($workElement->subWorkElements as $subWorkElement)
                                    <tr class="table-danger">
                                        <td colspan="9">
                                            <b>
                                                {{ $subWorkElement->order }}. {{ $subWorkElement->name }}

                                            </b>
                                        </td>

                                    </tr>

                                    @foreach ($subWorkElement->detailElements as $detailElement)
                                        <tr class="text-center">
                                            <td></td>
                                            <td>{{ $detailElement->name }}</td>
                                            @foreach ($detailElement->standartTimeCalculations->where('order', 2) as $item)
                                                <td>{{ $item->work_time }}</td>
                                                <td>{{ $item->rating_factor }}</td>
                                                <td>{{ $item->normal_time }}</td>
                                                <td>{{ $item->allowance }}</td>
                                                <td>{{ $item->standard_time }}</td>
                                                <td>
                                                    <a href="#"
                                                        class="btn btn-primary btn-sm delete-btn hitungWaktuBaku"
                                                        data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"
                                                        data-id="{{ $item->id }}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Add Data">
                                                        Input Nilai
                                                    </a>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="card-header">
            <h5 class="card-title">Hitung Waktu Baku Pekerja 3</h5>
            {{-- <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create SubWork Element</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.subWorkElement.store') }}" method="POST">
                            <div class="modal-body">
                                @csrf
                                <div class="mb-3 input-group input-group-outline">
                                    <label for="name" class="form-label">SubWork Element</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="mb-3 input-group input-group-outline">
                                    <label for="order" class="form-label">Urutan</label>
                                    <input type="text" class="form-control" id="order" name="order">
                                </div>
                                <input hidden type="text" name="work_element_name" value="{{ $workElement->name }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
             --}}



            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="">
                        <thead>
                            <tr>
                                <th>WorkElement</th>
                                <th></th>
                                <th>𝐱̅</th>
                                <th>RF</th>
                                <th>Waktu Normal</th>
                                <th>Allowance</th>
                                <th>WaktuBaku</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($WorkElements as $workElement)
                                @foreach ($workElement->subWorkElements as $subWorkElement)
                                    <tr class="table-danger">
                                        <td colspan="9">
                                            <b>
                                                {{ $subWorkElement->order }}. {{ $subWorkElement->name }}

                                            </b>
                                        </td>

                                    </tr>

                                    @foreach ($subWorkElement->detailElements as $detailElement)
                                        <tr class="text-center">
                                            <td></td>
                                            <td>{{ $detailElement->name }}</td>
                                            @foreach ($detailElement->standartTimeCalculations->where('order', 3) as $item)
                                                <td>{{ $item->work_time }}</td>
                                                <td>{{ $item->rating_factor }}</td>
                                                <td>{{ $item->normal_time }}</td>
                                                <td>{{ $item->allowance }}</td>
                                                <td>{{ $item->standard_time }}</td>
                                                <td>
                                                    <a href="#"
                                                        class="btn btn-primary btn-sm delete-btn hitungWaktuBaku"
                                                        data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"
                                                        data-id="{{ $item->id }}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Add Data">
                                                        Input Nilai
                                                    </a>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).on('click', '.hitungWaktuBaku', function() {
            let id = $(this).attr('data-id');
            $('#id').val(id);
        });
    </script>
    {{--
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
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
