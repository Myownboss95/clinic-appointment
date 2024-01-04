@extends('layouts.app')

@section('content')
    <div>

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Appointment</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a
                                            href="{{ roleBasedRoute('appointments.index') }}">Appointment</a></li>
                                    <li class="breadcrumb-item active">Appointment Detail</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="product-detai-imgs">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="product-1" role="tabpanel"
                                                    aria-labelledby="product-1-tab">
                                                    <div>
                                                        <img src="{{ asset('storage/sub_service/' . $appointment->subService?->first()?->image) }}"
                                                            alt="" class="rounded mb-4 d-block">
                                                    </div>
                                                    <h4 class="mt-1 mb-3">{{ $appointment->subService?->first()?->name }}
                                                    </h4>
                                                    <p class="text-muted mb-4">
                                                        {{ $appointment->subService?->first()?->description }}</p>
                                                </div>
                                            </div>
                                            <div class="text-center d-flex justify-content-left">
                                                <a href="{{ roleBasedRoute('appointments.edit', [$appointment->id]) }}"
                                                    class="btn btn-primary waves-effect waves-light mt-2 me-1">
                                                    <i class="bx bx-edit me-2"></i> Edit
                                                </a>
                                                <button type="button" class="btn btn-danger waves-effect mt-2 waves-light" id="deleteButton">
                                                    <i class="bx bx-trash"></i>Delete
                                                </button>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="mt-4 mt-xl-3">
                                            <a href="javascript: void(0);" class="text-primary"></a>

                                            <h5 class="mb-4">Client:<span
                                                    class="badge rounded-pill bg-primary-subtle text-primary"></span>
                                                <b>{{ $appointment->user->last_name }}
                                                    {{ $appointment->user->first_name }}</b>
                                            </h5>

                                            <h5 class="mb-4">Amount Paid:<span
                                                    class="badge rounded-pill bg-primary-subtle text-primary "></span>
                                                <b>{{ formatMoney($appointment->transaction?->first()->amount) }}</b>
                                            </h5>
                                            <h5 class="mb-4">Stage:<span
                                                    class="badge rounded-pill bg-primary-subtle text-primary "></span>
                                                <b>{{ $appointment->stage->name }}</b>
                                            </h5>
                                            @livewire('change-appointment-stage-selector', ['appointmentId' => $appointment->uuid])
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div>
                                                        <p class="text-muted"><i
                                                                class="bx bx-calendar-event font-size-16 align-middle text-primary me-1"></i>Start
                                                            Time: <span
                                                                class="btn btn-info">{{ date_format($appointment->start_time, 'l jS \of F Y h:i:s A') }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div>
                                                        <p class="text-muted"><i
                                                                class="bx bx-calendar-event font-size-16 align-middle text-primary me-1"></i>
                                                            End Time: <span
                                                                class="btn btn-info">{{ $appointment->end_time ? date_format($appointment->end_time, 'l jS \of F Y h:i:s A') : 'No end time specified' }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    @include('admin.appointments.comments')
                </div>


            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        @include('admin.appointments.delete-modal')
    </div>
@endsection
