 @extends('layouts.app')
 @section('content')
     <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="profile-user"></div>
                            </div>
                        </div>

                        <div class="row">
                           <div class="profile-content">
                               <div class="row align-items-end">
                                    <div class="col-sm">
                                        <div class="d-flex align-items-end mt-3 mt-sm-0">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xxl me-3">
                                                    <img src="{{ asset('lineone/images/users/avatar-3.jpg')}}" alt="" class="img-fluid rounded-circle d-block img-thumbnail">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <h5 class="font-size-16 mb-1">{{auth()->user()->first_name . ' '. auth()->user()->last_name}}</h5>
                                                    <p class="text-muted font-size-13 mb-2 pb-2">{{auth()->user()->email}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div class="d-flex align-items-start justify-content-end gap-2 mb-2">
                                            
                                            {{-- <div>
                                                <div class="dropdown">
                                                    <button class="btn btn-link font-size-16 shadow-none text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded font-size-20"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                    </ul>
                                                </div>
                                            </div> --}}
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
                                                <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab">Overview</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link px-3" data-bs-toggle="tab" href="#post" role="tab">Edit Profile</a>
                                            </li>
                                        </ul>
                                   </div>
                               </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-8 col-lg-8">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="overview" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">About</h5>
                                            </div>

                                            <div class="card-body">
                                                <div>
                                                    Overview Here
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!-- end tab pane -->

                                    <div class="tab-pane" id="post" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body"> 
                                                    Form Here
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        
                                    </div>
                                    <!-- end tab pane -->
                                </div>
                                <!-- end tab content -->
                            </div>
                            <!-- end col -->

                            <div class="col-xl-4 col-lg-4">

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Referrals</h5>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 50px;"><img src="{{ asset('lineone/images/users/avatar-2.jpg')}}" class="rounded-circle avatar-sm" alt=""></td>
                                                        <td><h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Daniel Canales</a></h5></td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript: void(0);" class="badge bg-primary-subtle text-primary font-size-11">Frontend</a>
                                                                <a href="javascript: void(0);" class="badge bg-primary-subtle text-primary font-size-11">UI</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <i class="mdi mdi-circle-medium font-size-18 text-success align-middle me-1"></i> Online
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="{{ asset('lineone/images/users/avatar-1.jpg')}}" class="rounded-circle avatar-sm" alt=""></td>
                                                        <td><h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Jennifer Walker</a></h5></td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript: void(0);" class="badge bg-primary-subtle text-primary font-size-11">UI / UX</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <i class="mdi mdi-circle-medium font-size-18 text-warning align-middle me-1"></i> Buzy
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-sm">
                                                                <span class="avatar-title rounded-circle bg-primary text-white font-size-16">
                                                                    C
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Carl Mackay</a></h5></td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript: void(0);" class="badge bg-primary-subtle text-primary font-size-11">Backend</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <i class="mdi mdi-circle-medium font-size-18 text-success align-middle me-1"></i> Online
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="{{ asset('lineone/images/users/avatar-4.jpg')}}" class="rounded-circle avatar-sm" alt=""></td>
                                                        <td><h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Janice Cole</a></h5></td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript: void(0);" class="badge bg-primary-subtle text-primary font-size-11">Frontend</a>
                                                                <a href="javascript: void(0);" class="badge bg-primary-subtle text-primary font-size-11">UI</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <i class="mdi mdi-circle-medium font-size-18 text-success align-middle me-1"></i> Online
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-sm">
                                                                <span class="avatar-title rounded-circle bg-primary text-white font-size-16">
                                                                    T
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Tony Brafford</a></h5></td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript: void(0);" class="badge bg-primary-subtle text-primary font-size-11">Backend</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <i class="mdi mdi-circle-medium font-size-18 text-secondary align-middle me-1"></i> Offline
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
 @endsection
