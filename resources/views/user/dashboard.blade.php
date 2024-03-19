@extends('layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Welcome {{ auth()->user()->first_name }}!</h4>

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

            {{-- card panel --}}
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <a href="{{route('user.appointments.index')}}">

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
                                        <span
                                            class="badge bg-danger-subtle text-danger">{{ $user->appointments?->whereNotNull('end_time')->count() }}
                                            Appointments</span>
                                        <span class="ms-1 text-muted font-size-13">Completed</span>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 text-end dash-widget">
                                    <div id="mini-chart2" data-colors='["--bs-primary", "--bs-success"]'
                                        class="apex-charts"></div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    </a>
                </div><!-- end col-->
                <div class="col-xl-3 col-md-6">
                    <a href="{{route('user.transactions.initiated')}}">

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
                                    <div class="text-nowrap">
                                        <small
                                            class="badge bg-danger-subtle text-danger p-2">  <h6>
                                                <i data-feather="alert-triangle"></i> 
                                                Settle Transactions 
                                                </h6> </small>
                                    </div>
                                    
                                </div>
                                <div class="flex-shrink-0 text-end dash-widget">
                                    <div id="mini-chart2" data-colors='["--bs-primary", "--bs-success"]' class="apex-charts"></div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    </a>
                </div><!-- end col-->
                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Services Purchased</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value"
                                            data-target="{{ $user->appointments()?->with('subService')->count() ?? 0 }}">0</span>
                                    </h4>
                                    <div class="text-nowrap">
                                        <span
                                            class="badge bg-success-subtle text-success">{{ $user->appointments()?->with('subService')->count() ?? 0 }}</span>
                                        <span class="ms-1 text-muted font-size-13">Since joining us</span>
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
                    @if($nextAppointment)
                    <a href="{{route('user.appointments.show', $nextAppointment->id)}}">
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Next Appointment</span>
                                    <h4 class="mb-3">
                                        <span class="">{{ $nextAppointmentDate }}</span>
                                    </h4>
                                </div>
                                <div class="flex-shrink-0 text-end dash-widget">
                                    <div id="mini-chart3" data-colors='["--bs-primary", "--bs-success"]'
                                        class="apex-charts"></div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </a>
                @endif
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Lifetime Earnings</span>
                                    <h4 class="mb-3">₦<span class="counter-value"
                                            data-target="{{ number_format($user->life_time_balance, 2, '.', ',') }}">0</span>
                                    </h4>
                                    <div class="text-nowrap">
                                        <span
                                            class="badge bg-success-subtle text-success">{{ '₦' . number_format($user->balance, 2, '.', ',') }}</span>
                                        <span class="ms-1 text-muted font-size-13">Current Balance</span>
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


            {{-- tables --}}
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Appointments</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0">

                                    <thead class="table-light">
                                        <tr>
                                            <th>Appointment Date</th>
                                            <th>Service</th>
                                            <th>Stage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointments as $appointment)
                                            @php
                                            @endphp
                                            <tr>
                                                <th scope="row">{{ formatDateTime($appointment->start_time) }}</th>
                                                @if ($appointment->subService->count() > 0)
                                                    <td>
                                                        {{ strtoupper($appointment->subService->first()->name) }}
                                                    </td>

                                                    <td>
                                                        {{ $appointment->stage->name }}
                                                    </td>
                                                @endif
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
                <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Your Transactions</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">

                                    <thead>
                                        <tr>
                                            <th>Amount</th>
                                            <th>Service</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <th scope="row">
                                                    {{ '₦' . number_format($transaction->amount, 2, '.', ',') }}</th>
                                                <td>    
                                                    @if($transaction->appointment)
                                                     {{ $transaction->appointment?->first()?->subService?->first()?->name ?? ''}}
                                                    @endif
                                                </td>
                                                <td>{{ formatDateTime($transaction->created_at) }}</td>
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
                <!-- end col -->
                <div class="col-xl-6">
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
                                                <th scope="row">{{ formatDateTime($followUpAppointment->start_time) }}
                                                </th>

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
