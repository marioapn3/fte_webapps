@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Detail Work Element </h5>
            <p>{{ $workElement->name }}</p>


            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Create SubWork Element
            </button>

            <!-- Modal -->
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

            <!-- Modal For DeleteData -->
            <div class="modal fade" id="deleteConfirmationModal" tabindex="-1"
                aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteConfirmationModalLabel">
                                Tambah Detail Dari SubWork Element
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.standartTimeCalculation.store') }}" method="POST">
                            <div class="modal-body">
                                @csrf
                                <div class="mb-3 input-group input-group-outline">
                                    <label for="name" class="form-label">Detail SubWork Element</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <input hidden id="id" name="id">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="">
                        <thead>
                            <tr>
                                <th>WorkElement</th>
                                <th></th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($workElement->subWorkElements as $subWorkElement)
                                <tr>
                                    <td colspan="2">
                                        <b>
                                            {{ $subWorkElement->order }}. {{ $subWorkElement->name }}

                                        </b>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm delete-btn addDetailSubWorkElement"
                                            data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"
                                            data-id="{{ $subWorkElement->id }}" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Add Data">
                                            <i class="fa-solid fa-plus"></i>
                                        </a>
                                    </td>
                                </tr>

                                @foreach ($subWorkElement->detailElements as $item)
                                    <tr>
                                        <td></td>
                                        <td>{{ $item->name }}</td>
                                        <td></td>
                                    </tr>
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
        $(document).on('click', '.addDetailSubWorkElement', function() {
            let id = $(this).attr('data-id');
            $('#id').val(id);
        });
    </script>
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
    </script>
@endsection
