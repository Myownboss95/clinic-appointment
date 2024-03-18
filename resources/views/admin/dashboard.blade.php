@extends('layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Welcome, {{ auth()->user()->first_name }}!</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Welcome {{ auth()->user()->first_name }}!</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Customers</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value" data-target="{{ $customers_count }}">0</span>
                                    </h4>
                                    <div class="text-nowrap">
                                        <span class="badge bg-success-subtle text-success">{{ $new_customers_count }}</span>
                                        <span class="ms-1 text-muted font-size-13">Since last week</span>
                                    </div>
                                </div>

                                <div class="flex-shrink-0 text-end dash-widget">
                                    <div id="mini-chart1" data-colors='["--bs-primary", "--bs-success"]'
                                        class="apex-charts"></div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                <a href="{{ roleBasedRoute('appointments.index') }}">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Appointments</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value text-dark" data-target={{ $appointment_count }}>0</span>
                                    </h4>
                                    <div class="text-nowrap">
                                        <span
                                            class="badge bg-danger-subtle text-danger">{{ $follow_up_appointment_count }}</span>
                                        <span class="ms-1 text-muted font-size-13">Follow Up Appointments</span>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 text-end dash-widget">
                                    <div id="mini-chart2" data-colors='["--bs-primary", "--bs-success"]'
                                        class="apex-charts"></div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                </a>
                    </div><!-- end card -->
                </div><!-- end col-->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card ">
                        <!-- card body -->
                <a href="{{ roleBasedRoute('transactions') }}">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                             @if(auth()->user()->role_id == 3)
                                
                                    <div class="">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Transactions</span>
                                        <h5 class="mb-3">
                                            <span class="text-dark">{{ formatMoney($total_transactions) }}</span>
                                        </h5>
                                        <div class="text-nowrap">
                                            <span class="badge bg-success-subtle text-success">{{ $transactions_count }}</span>
                                            <span class="ms-1 text-muted font-size-13">Total Transactions</span>
                                        </div>
                                    </div>
                                @endif
                                @if(auth()->user()->role_id == 2)
                                    <div class="">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Transactions</span>
                                        <h5 class="mb-3">
                                            <span>{{ $transactions_count }}</span>
                                        </h5>
                                        <div class="text-nowrap">
                                            <span class="ms-1 text-muted font-size-13">Total Transactions</span>
                                        </div>
                                    </div>
                                @endif


                                <div class="flex-shrink-0 text-end dash-widget">
                                    <div id="mini-chart3" data-colors='["--bs-primary", "--bs-success"]'
                                        class="apex-charts"></div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                </a>
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                <a href="{{ roleBasedRoute('referrals.index') }}">
                        <div class="card-body">
                            @if(auth()->user()->role_id == 3)
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Referrals Paid</span>
                                        <h4 class="mb-3">
                                            <span class="text-dark">{{ formatMoney($total_referral_transactions) }}</span>
                                        </h4>
                                        <div class="text-nowrap">
                                            <span
                                                class="badge bg-success-subtle text-success">{{ $referral_transactions_count }}</span>
                                            <span class="ms-1 text-muted font-size-13">Total Referrals Paid</span>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 text-end dash-widget">
                                        <div id="mini-chart4" data-colors='["--bs-primary", "--bs-success"]'
                                            class="apex-charts"></div>
                                    </div>
                                </div>
                            @endif
                            @if(auth()->user()->role_id == 2)
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Referrals</span>
                                        <h4 class="mb-3">
                                            <span>{{ $referral_transactions_count }}</span>
                                        </h4>
                                        <div class="text-nowrap">
                                            <span class="ms-1 text-muted font-size-13">Total Referrals</span>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 text-end dash-widget">
                                        <div id="mini-chart4" data-colors='["--bs-primary", "--bs-success"]'
                                            class="apex-charts"></div>
                                    </div>
                                </div>
                            @endif
                        </div><!-- end card body -->
                </a>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row-->

            @if(auth()->user()->role_id == 3)
                {{-- <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Connect to Calendly</h4>
                                </div>
                                <div class="card-body">
                                    <div class="col-6">
                                        <a class="btn btn-primary" href="{{ route('admin.settings.calendly.init') }}">
                                            Connect to Calendly
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">{{ $calendly_last_handshake ?? 'Not connected' }}</small>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                </div> --}}
            @endif


            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Users</h4>
                        </div>
                        <div class="card-body">
                            <livewire:customers-table />
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- container-fluid -->
        </div>
    @endsection
