{{-- <!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $subService->name }}</p>
</div>

<!-- Service Id Field -->
<div class="col-sm-12">
    {!! Form::label('service_id', 'Service:') !!}
    <p>{{ $subService->service->name }}</p>
</div>

<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $subService->price }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $subService->description }}</p>
</div>

<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', 'Image:') !!}
    <p><img src="{{$subService->image}}" width="100" alt=""></p>
</div> --}}


<div>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            {{-- <x-bread-crumb title="SubServices" url="subServices" /> --}}
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
                                                            <img src="/lineone/images/product/img-7.png" alt="" class="img-fluid mx-auto d-block">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="text-center d-flex justify-content-center">
                                                    <a href="{{roleBasedRoute('subServices.edit', $subService->id)}}" class="btn btn-primary waves-effect waves-light mt-2 me-1">
                                                        <i class="bx bx-edit me-2"></i> Edit
                                                    </a>
                                                    <form action="{{roleBasedRoute('subServices.destroy', $subService->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger waves-effect  mt-2 waves-light" onclick = "return confirm('Are you sure?')">
                                                            <i class="bx bx-trash me-2"></i>Delete
                                                        </button>
                                                    </form>
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="mt-4 mt-xl-3">
                                        <p class="text-primary">Subservice</p>
                                        <h4 class="mt-1 mb-3">{{$subService->name}}</h4>

                                        <h6 class="text-success text-uppercase">{{$subService->name}}</h6>
                                        <h5 class="mb-4">Service : <span class="text-muted me-2"></span> <b>{{$subService->service?->name}}</b></h5>
                                        <p class="text-muted mb-4">{{$subService->service?->description}}</p>
                                        <h5 class="mb-4">Price : <span class="text-muted me-2"></span> <b> {{ '₦' . number_format($subService->price, 2, '.', ',') }}</b></h5>
                                        <div class="row mb-3">
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

    
</div>

