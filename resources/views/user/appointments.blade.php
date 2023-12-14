@extends('layouts.app')

@section('content')

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Welcome {{ auth()->user()->first_name}}!</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    {{-- card panel --}}
                    <div class="row">
                       <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-h-100">
                                <!-- card body -->
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Appointments</span>
                                            <h4 class="mb-3">
                                                <span class="counter-value" data-target={{ $user->appointments?->count() }}>0</span>
                                            </h4>
                                            <div class="text-nowrap">
                                                <span class="badge bg-danger-subtle text-danger">{{ $user->appointments?->whereNotNull('end_time')->count() }} Appointments</span>
                                                <span class="ms-1 text-muted font-size-13">Completed</span>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 text-end dash-widget">
                                            <div id="mini-chart2" data-colors='["--bs-primary", "--bs-success"]' class="apex-charts"></div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col-->
                        
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-h-100">
                                <!-- card body -->
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Next Appointment</span>
                                            <h4 class="mb-3">
                                                <span class="">{{ $nextAppointment }}</span>
                                            </h4>
                                        </div>
                                        <div class="flex-shrink-0 text-end dash-widget">
                                            <div id="mini-chart3" data-colors='["--bs-primary", "--bs-success"]' class="apex-charts"></div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->   
                    </div><!-- end row-->     


                    {{-- tables --}}
                     <div class="row">
                        <div class="col-xl-9">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Appointments</h4>
                                </div>
                                <div class="card-body">
                                    <livewire:user-appointment-table/>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Follow Up Appointments</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0">

                                            <thead class="table-light">
                                                <tr>
                                                    <th>Appointment Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($followUpAppointments as $followUpAppointment)
                                                    <tr>
                                                        <th scope="row">{{format_datetime($followUpAppointment->start_time)}}</th>
                                                       
                                                    </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>

                    </div>
                    <!-- end row -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->   
        </div>
    </div>
</div>
@endsection
