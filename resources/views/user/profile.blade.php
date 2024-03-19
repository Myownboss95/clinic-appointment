@extends('layouts.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="profile-content">
                    <div class="row align-items-end">
                        <div class="col-sm">
                            <div class="d-flex align-items-end mt-3 mt-sm-0">
                                <div class="flex-shrink-0">
                                    <div class="avatar-xxl me-3">
                                        <img src="{{ profilePicture(auth()->user()) }}" alt=""
                                            class="img-fluid rounded-circle d-block img-thumbnail"
                                            style="width: 150px;
                                                   height:150px;">
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div>
                                        <h5 class="font-size-16 mb-1 pt-5">
                                            {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h5>
                                        <p class="text-muted font-size-13">{{ auth()->user()->email }}</p>
                                        <small class="small">
                                            <a href="{{ route('image.index', auth()->user()->id) }}" class="btn btn-link"
                                                style="font-size: 11px; 
                                                   margin-left:-10px; 
                                                   margin-top:-10px">
                                                <i data-feather="edit" style="font-size: 11px"></i>
                                                Change Profile Image</a></small>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card bg-transparent shadow-none">
                        <div class="card-body">
                            <ul class="nav nav-tabs-custom card-header-tabs border-top mt-2" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview"
                                        role="tab">Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3" data-bs-toggle="tab" href="#post" role="tab">Edit
                                        Profile</a>
                                </li>
                                <li class="nav-item">

                                    <a class="nav-link px-3" data-bs-toggle="tab" href="#security"
                                        role="tab">Security</a>

                                </li>
                                <li class="nav-item">

                                    <a class="nav-link px-3" data-bs-toggle="tab" href="#bank-details"
                                        role="tab">Bank Details</a>

                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            @include('user.user-tabs')
            <!-- end row -->
        </div>
    </div>
@endsection
@push('scripts')
 <script>
    document.getElementById("password-addon").addEventListener("click", function() {
        var e = document.getElementById("password-input");
        "password" === e.type ? e.type = "text" : e.type = "password"
    });

    document.getElementById("current-password-addon").addEventListener("click", function() {
        var e = document.getElementById("current-password-input");
        "password" === e.type ? e.type = "text" : e.type = "password"
    });

    document.getElementById("confirm-password-addon").addEventListener("click", function() {
        var e = document.getElementById("confirm-password-input");
        "password" === e.type ? e.type = "text" : e.type = "password"
    });
</script>
@endpush