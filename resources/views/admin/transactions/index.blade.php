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
                    <div class="card ">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Transactions</span>
                                    <h5 class="mb-3">
                                        <span>{{ formatMoney($total_transactions) }}</span>
                                    </h5>
                                    <div class="text-nowrap">
                                        <span class="badge bg-success-subtle text-success">{{ $transactions_count }}</span>
                                        <span class="ms-1 text-muted font-size-13">Total Transactions</span>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 text-end dash-widget">
                                    <div id="mini-chart3" data-colors='["--bs-primary", "--bs-success"]'
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
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Referrals Paid</span>
                                    <h4 class="mb-3">
                                        <span>{{ formatMoney($total_referral_transactions) }}</span>
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
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row-->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Transactions</h4>
                        </div>
                        <div class="card-body">
                            <livewire:transactions-table />
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- container-fluid -->
        </div>
    @endsection
