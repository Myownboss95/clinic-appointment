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
                                                    <p class="text-muted font-size-13">{{auth()->user()->email}}</p>
                                                    
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
                                            <li class="nav-item">
                                                <a class="nav-link px-3" data-bs-toggle="tab" href="#security" role="tab">Security</a>
                                            </li>
                                        </ul>
                                   </div>
                               </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-5 col-lg-5">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="overview" role="tabpanel">
                                        <div class="card p-3">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">About</h5>
                                            </div>

                                            <div class="card-body">
                                                <div>
                                                    <div class="pb-3">
                                                        <div class="text-muted">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Phone Number: {{auth()->user()->phone_number}}</li>
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Date of Birth: {{auth()->user()->dob}}</li>
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Location: {{auth()->user()->country}}, {{auth()->user()->state}}, {{auth()->user()->city}}</li>
                                                                <div class="d-flex">
                                                                    <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Referral Code:{{refCode()}} </li>
                                                                    <div class="form-floating-icon px-4 cursor-pointer">
                                                                        <i data-feather="copy"></i>
                                                                    </div>
                                                                </div>
                                                                
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Last Login: {{auth()->user()->updated_at->diffForHumans()}}</li>



                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!-- end tab pane -->

                                    <div class="tab-pane" id="post" role="tabpanel">
                                        <div class="card p-5">
                                            <div class="card-body"> 
                                                <div class="row">
                                                    <div>
                                                        <div>
                                                            <div class="mb-3">
                                                                <label for="example-text-input" class="form-label">FullName</label>
                                                                <input class="form-control" disabled type="text" value="{{auth()->user()->last_name .' '. auth()->user()->first_name }}" id="example-text-input" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="example-email-input" class="form-label">Email</label>
                                                                <input class="form-control" disabled readonly type="email" value="{{old('email', auth()->user()->email)}}" id="example-email-input" >
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="example-date-input" class="form-label">Date</label>
                                                                <input class="form-control" name="dob" type="date" value="{{old('dob', auth()->user()->dob)}}" id="example-date-input">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="example-tel-input" class="form-label">Telephone</label>
                                                                <input class="form-control" name="phone_number" type="tel" value="{{old('phone_number', auth()->user()->phone_number)}}" id="example-tel-input">
                                                            </div>
                                                           
                                                            <div class="mt-4 d-flex justify-content-left">
                                                                <button type="submit" class="btn btn-primary w-md">Update Profile</button>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        
                                    </div>
                                    <!-- end tab pane -->
                                    <div class="tab-pane" id="security" role="tabpanel">
                                        <div class="card p-5">
                                            <div class="card-body"> 
                                                <div class="row">
                                                    <div>
                                                        <div>
                                                            <div class="mb-3">
                                                                <label for="example-password-old" class="form-label">Old Password</label>
                                                                <input class="form-control" name="password" type="password" value="" id="example-password-old">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="example-password-new" class="form-label">New Password</label>
                                                                <input class="form-control" name="password" type="password" value="" id="example-password-new">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="example-password-confirm" class="form-label">Confirm Password</label>
                                                                <input class="form-control" name="confirm_password" type="password" value="" id="example-password-confirm">
                                                            </div>

                                                            <div class="mt-4 d-flex justify-content-center">
                                                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        
                                    </div>
                                    <!-- end tab pane -->
                                </div>
                                </div>
                                <!-- end tab content -->
                            </div>
                            <!-- end col -->

                            <div class="col-xl-7 col-lg-7">

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Referrals</h5>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap">
                                                <tbody>
                                                    <tr>
                                                        @foreach ($user->referrals as $referral)
                                                            
                                                        <td style="width: 50px;"><img src="{{ asset('lineone/images/users/avatar-2.jpg')}}" class="rounded-circle avatar-sm" alt=""></td>
                                                        <td><h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">{{ $referral->first_name}}</a></h5></td>
                                                        
                                                        <td>
                                                            <i class="mdi mdi-circle-medium font-size-18 text-success align-middle me-1"></i> {{ '₦'.number_format($refBonus, 2, '.', ',')  }}
                                                        </td>
                                                        @endforeach
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
