@extends('layouts.admin')

@section('title')
    Work Elements
@endsection

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Company Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.companyProfile.update') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 input-group input-group-outline">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $companyProfile->name }}">
                        </div>
                        <div class="mb-3 input-group input-group-outline">
                            <label for="name" class="form-label">Address</label>
                            <input type="text" class="form-control" id="name" name="address"
                                value="{{ $companyProfile->address }}">
                        </div>
                        <div class="mb-3 input-group input-group-outline">
                            <label for="name" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="name" name="phone"
                                value="{{ $companyProfile->phone }}">
                        </div>
                        <div class="mb-3 input-group input-group-outline">
                            <label for="name" class="form-label">Email</label>
                            <input type="text" class="form-control" id="name" name="email"
                                value="{{ $companyProfile->email }}">
                        </div>
                        <label for="">Description</label>
                        <div class="mb-3 form-floating input-group input-group-outline">

                            <textarea name="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                style="height: 100px"> {{ $companyProfile->description }}</textarea>
                        </div>

                        <div class="mb-3 input-group input-group-outline">
                            <input type="file" name="logo" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Modal --}}
    <div class="px-2 container-fluid px-md-4">
        <div class="mt-4 page-header min-height-300 border-radius-xl"
            style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="mx-3 card card-body mx-md-4 mt-n6">
            <div class="mb-2 row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        @if ($companyProfile->logo == null)
                            <img src="../assets/img/bruce-mars.jpg" alt="profile_image"
                                class="shadow-sm w-100 border-radius-lg">
                        @else
                            <img src="{{ asset($companyProfile->logo) }}" alt="profile_image"
                                class="shadow-sm w-100 border-radius-lg">
                        @endif
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h4 class="mb-1">
                            {{ $companyProfile->name }}
                        </h4>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="row">

                    <div class="col-12 col-xl-8">
                        <div class="card card-plain h-100">
                            <div class="p-3 pb-0 card-header">
                                <div class="row">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-0">Profile Information</h6>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <a href="javascript:;">

                                        </a>

                                        <!-- Button trigger modal -->
                                        <a type="button" class="" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <i class="text-sm fas fa-user-edit text-secondary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit Profile"></i>
                                        </a>


                                    </div>
                                </div>
                            </div>
                            <div class="p-3 card-body">
                                <p class="text-sm">
                                    {{ $companyProfile->description }}
                                </p>

                                <ul class="list-group">
                                    <li class="pt-0 text-sm border-0 list-group-item ps-0"><strong
                                            class="text-dark">Company
                                            Name:</strong> &nbsp;{{ $companyProfile->name }}</li>
                                    <li class="text-sm border-0 list-group-item ps-0"><strong
                                            class="text-dark">Mobile:</strong> &nbsp; {{ $companyProfile->phone }}</li>
                                    <li class="text-sm border-0 list-group-item ps-0"><strong
                                            class="text-dark">Email:</strong> &nbsp; {{ $companyProfile->email }}</li>


                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="card card-plain h-100">
                            <div class="p-3 pb-0 card-header">
                                <h6 class="mb-0">All User</h6>
                            </div>
                            <div class="p-3 card-body">
                                <ul class="list-group">
                                    @foreach ($users as $user)
                                        <li class="px-0 pt-0 mb-2 border-0 list-group-item d-flex align-items-center">
                                            <div class="avatar me-3">
                                                <img src="../assets/img/kal-visuals-square.jpg" alt="kal"
                                                    class="shadow border-radius-lg">
                                            </div>
                                            <div class="d-flex align-items-start flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                <p class="mb-0 text-xs">{{ $user->role }}</p>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
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
