@extends('layouts.app')

@section('content')
 
<div>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Transaction Detail</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{roleBasedRoute('transactions')}}">Transactions</a></li>
                                <li class="breadcrumb-item active">Transaction Detail</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="product-detai-imgs">
                                        <div class="row">
                                           
                                            <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                                <div class="tab-content" id="v-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="product-1" role="tabpanel" aria-labelledby="product-1-tab">
                                                        <div>
                                                            
                                                                    <h5 class="card-title mb-4">Card Details</h5>
                                                                    
                                                                    <div class="card bg-primary text-white visa-card mb-0">
                                                                        <div class="card-body">
                                                                            <div>
                                                                                <i class="bx bxl-visa visa-pattern"></i>
                                                                            
                                                                                <div class="float-end">
                                                                                    <i class="bx bxl-visa visa-logo display-3"></i>
                                                                                </div>
                                
                                                                                <div>
                                                                                    <i class="bx bx-chip h1 text-warning"></i>
                                                                                </div>
                                                                            </div>
                            
                                                                            <div class="row mt-5">
                                                                                <div class="col-3">
                                                                                    <p class="mb-2">
                                                                                        <i class="fas fa-star-of-life m-1"></i>
                                                                                        <i class="fas fa-star-of-life m-1"></i>
                                                                                        <i class="fas fa-star-of-life m-1"></i>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <p class="mb-2">
                                                                                        <i class="fas fa-star-of-life m-1"></i>
                                                                                        <i class="fas fa-star-of-life m-1"></i>
                                                                                        <i class="fas fa-star-of-life m-1"></i>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <p class="mb-2">
                                                                                        <i class="fas fa-star-of-life m-1"></i>
                                                                                        <i class="fas fa-star-of-life m-1"></i>
                                                                                        <i class="fas fa-star-of-life m-1"></i>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <p class="mb-2">
                                                                                        <i class="fas fa-star-of-life m-1"></i>
                                                                                        <i class="fas fa-star-of-life m-1"></i>
                                                                                        <i class="fas fa-star-of-life m-1"></i>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                            
                                                                            <div class="mt-5">
                                                                                <h5 class="text-white float-end mb-0">12/22</h5>
                                                                                <h5 class="text-white mb-0">{{$transaction->user?->last_name}} {{$transaction->user?->first_name}}</h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                               

                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="text-center">
                                                    <button type="button" class="btn btn-primary waves-effect waves-light mt-2 me-1">
                                                        <i class="bx bx-arrow-back me-2"></i> Go back to Trasanctions
                                                    </button>
                                                </div> --}}
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="mt-4 mt-xl-3">
                                        <h4>Trasaction status: <span class="btn btn-sm btn-danger text-uppercase">{{$transaction->status}}</span></h4>
                                        <h5 class="mb-4">Amount :  <b>{{number_format($transaction->amount, 2)}}</b></h5>
                                        <h6>Payment Reason</h6>
                                        <p class="text-muted mb-4">{{$transaction?->reason}}</p>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div>
                                                    <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i>Trasaction Type: <span>{{$transaction->type}}</span></p>
                                                    <p class="text-muted"><i class="bx bx-calendar-event font-size-16 align-middle text-primary me-1"></i>Transaction Date: <span class="btn btn-info btn-sm">{{$transaction->created_at}}</span></p>
                                                    <p class="text-muted"><i class="bx bx-money font-size-16 align-middle text-primary me-1"></i>Payment Type: {{$transaction->payment_channel->name}}</p>
                                                </div>
                                            </div>
                                        </div>

                                      
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="mt-5">
                                <h5 class="mb-3">User Details :</h5>

                                <div class="table-responsive">
                                    <table class="table mb-0 table-bordered">
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="width: 400px;">Name</th>
                                                <td>{{$transaction->user?->last_name}} {{$transaction->user?->first_name}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email</th>
                                                <td>{{$transaction->user?->email}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Country</th>
                                                <td>{{$transaction->user?->country}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">State</th>
                                                <td>{{$transaction->user?->state}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">City</th>
                                                <td>{{$transaction->user?->city}}</td>
                                            </tr>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end Specifications -->
 

                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- end row -->

            
            <!-- end row -->
            
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

 
</div>
@endsection
