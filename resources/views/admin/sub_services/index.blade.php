@extends('layouts.app')

@section('content')
     

    

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0 ">
                     
                
                
                <x-create-button url="subServices.create" />



                @include('admin.sub_services.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

