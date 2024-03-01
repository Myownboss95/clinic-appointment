@extends('layouts.app')

@section('content')
<style>
.powergrid-actions .btn {
    display: block;
}

</style>
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
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Transactions</span>
                                            <h4 class="mb-3">
                                                <span class="counter-value" data-target={{ $user->transactions?->count() }}>0</span>
                                            </h4>
                                            
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
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Unconfirmed Transactions</span>
                                            <h4 class="mb-3">
                                                <span class="counter-value" data-target={{ $initiatedTransactions?->count() }}>0</span>
                                            </h4>
                                            
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
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Lifetime Earnings</span>
                                            <h4 class="mb-3">₦<span class="counter-value" data-target="{{ $user->life_time_balance}}">0</span>
                                            </h4>
                                            <div class="text-nowrap">
                                                <span class="badge bg-success-subtle text-success">₦{{ $user->balance }}</span>
                                                <span class="ms-1 text-muted font-size-13">Current Balance</span>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 text-end dash-widget">
                                            <div id="mini-chart4" data-colors='["--bs-primary", "--bs-success"]' class="apex-charts"></div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->    
                    </div><!-- end row-->     


                    {{-- tables --}}
                     <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Transactions</h4>
                                </div>
                                <div class="card-body">
                                    <livewire:user-transactions-table userId="{{$user->id}}"/>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->

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
