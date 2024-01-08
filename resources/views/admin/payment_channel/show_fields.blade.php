 

<div>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            {{-- <x-bread-crumb title="SubServices" url="subServices" /> --}}
            <!-- end page title -->

            

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">



                    <div class="col-md-6">
                        <div class="d-flex flex-wrap gap-2 mt-3">
                             
                            <div>
                                <a href="{{roleBasedRoute('paymentChannels.index')}}" class="btn btn-light"><i class="bx bx-arrow-back me-1"></i> Go Back</a>
                            </div>
                            
                            <div class="dropdown">
                                  <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                     
                                </a>
                            
                                 
                            </div>
                        </div>

                    </div>



                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mt-4 mt-xl-3">
                                        <p class="text-primary">Payment Channel</p>
                                        {{-- <h4 class="mt-1 mb-3">{{$subService->name}}</h4> --}}

                                        <h5 class="mb-4">Bank Name : <span class="text-muted me-2"></span> <b>{{$paymentChannel->bank_name}}</b></h5>
                                         
                                        <h5 class="mb-4">Account Name : <span class="text-muted me-2"></span> <b> {{ $paymentChannel->account_name }}</b></h5>
                                        <h5 class="mb-4">Account Number : <span class="text-muted me-2"></span> <b> {{ $paymentChannel->account_number }}</b></h5>
                                       
 
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->                             
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- end row -->

             
            
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
<x-delete-modal url="paymentChannels" :id="$paymentChannel->id" />
    
</div>

