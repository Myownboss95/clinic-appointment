@extends('layouts.app')

@section('content')
     

    

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0 ">
                     
                
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="mb-3">
                         </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mt-3">
                             
                            <div>
                                <a href="{{roleBasedRoute('subServices.create')}}" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Add New</a>
                            </div>
                            
                            <div class="dropdown">
                                  <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                     
                                </a>
                            
                                 
                            </div>
                        </div>

                    </div>
                </div>



                @include('admin.sub_services.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

