@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Form File Upload</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                    <li class="breadcrumb-item active">Form File Upload</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- @livewire('image-update') --}}
                                <livewire:image-update :user="$user" />    

                                
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                
            </div> <!-- container-fluid -->
        </div>
    </section>

   

@endsection

