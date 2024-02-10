 

<div>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
           
            <!-- end page title -->

            

            <div class="row">
            <x-bread-crumb title="SubService" url="subServices.index" /> 
                <div class="col-lg-12">
                    <div class="card">



                    <div class="col-md-6">
                        <div class="d-flex flex-wrap gap-2 mt-3">
                             
                            <div>
                                <a href="{{roleBasedRoute('subServices.index')}}" class="btn btn-light"><i class="bx bx-arrow-back me-1"></i> Go Back</a>
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
                                    <div class="product-detai-imgs">
                                        <div class="row">
                                            
                                          
                                            <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                                <div class="tab-content" id="v-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="product-1" role="tabpanel" aria-labelledby="product-1-tab">
                                                        <div>
                                                            <img src="{{asset('storage/sub_service/' . $subService->image)}}" alt="" class="img-fluid mx-auto d-block rounded img-thumbnail">
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="text-center d-flex justify-content-center">
                                                    <a href="{{roleBasedRoute('subServices.edit', $subService->id)}}" class="btn btn-primary waves-effect waves-light mt-2 me-1">
                                                        <i class="bx bx-edit me-2"></i> Edit
                                                    </a>
                                                    
                                                        <button type="button" class="btn btn-danger waves-effect  mt-2 waves-light" id="deleteButton">
                                                            <i class="bx bx-trash me-2"></i>Delete
                                                        </button>
                                                     
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="mt-4 mt-xl-3">
                                        <p class="text-primary">Subservice</p>
                                        <h4 class="mt-1 mb-3">{{$subService->name}}</h4>

                                        <h5 class="mb-4">Service : <span class="text-muted me-2"></span> <b>{{$subService->service?->name}}</b></h5>
                                        <p class="text-muted mb-4">{{$subService->service?->description}}</p>
                                        <h5 class="mb-4">Price : <span class="text-muted me-2"></span> <b> {{ '₦' . number_format($subService->price, 2, '.', ',') }}</b></h5>
                                        <div class="row mb-3">
                                            <h6>Description:</h6>
                                            <p class="text-muted mb-4">{{ $subService?->description }}</p>
                                            <div class="col-md-6">
                                                <div>
                                                    <p class="text-muted"><i class="bx bx-calendar-event font-size-16 align-middle text-primary me-1"></i> {{$subService->created_at}}</p>
                                                  </div>
                                            </div>
                                             
                                        </div>
 
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
<x-delete-modal url="subServices" :id="$subService->id" />
    
</div>

