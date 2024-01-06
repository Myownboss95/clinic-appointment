@extends('layouts.app')

@section('content')
    

    <div class="content px-3">
        <x-bread-crumb title="Service" url="services.index" />
        <div class="card">
            <div class="col-md-6">
                <div class="d-flex flex-wrap gap-2 mt-3">
                     
                    <div>
                        <a href="{{roleBasedRoute('services.index')}}" class="btn btn-light"><i class="bx bx-arrow-back me-1"></i> Go Back</a>
                    </div>
                    
                    <div class="dropdown">
                          <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                             
                        </a>
                    
                         
                    </div>
                </div>

            </div>
             
                    @include('admin.services.show_fields')
                
        </div>
    </div>
@endsection
