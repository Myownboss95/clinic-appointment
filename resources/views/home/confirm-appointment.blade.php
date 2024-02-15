@extends('home.layouts.app')

@section('content')
    <div class="row  p-5 pt-5" style="margin-top: 100px ">
        <div class="col-xl-4 col-lg-4  py-5">
            <div class="card p-5">
                <p class="text-muted">
                    You are to pay into any of these accounts the sum of {{ formatMoney($service->price) }}, and upload
                    proof of payment.
                <form action="{{ route('booking.confirm-appointment-booking', $appointment->uuid) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @foreach ($paymentChannels as $paymentChannel)
                        <div class="accordion-item card p-3 m-1 border">
                            <h2 class="accordion-header" id="heading-{{ $paymentChannel->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-{{ $paymentChannel->id }}">
                                    {{ $paymentChannel->bank_name }}
                                </button>
                            </h2>
                            <div id="collapse-{{ $paymentChannel->id }}" class="accordion-collapse collapse mt-3"
                                data-bs-parent=".accordion">
                                <div class="card border my-3 p-2">
                                    <div class="accordion-body">
                                        <p>{{ $paymentChannel->account_name }}</p>
                                        <p>{{ $paymentChannel->account_number }}</p>
                                        <div class="form-check">
                                            <label for="{{ $paymentChannel->id }}">Choose {{ $paymentChannel->bank_name }}
                                                as payment option</label>
                                            <input type="radio" name="payment_channel_id" class="form-check-input"
                                                value="{{ $paymentChannel->id }}" id="{{ $paymentChannel->id }}">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="my-3">
                        <label for="proof">Upload Proof</label>
                        <input type="file" name="image" class="form-control" id="proof">
                    </div>
                    </p>
                    <div class="d-flex">
                        <a class="btn btn-danger waves-effect mt-2 waves-light me-3"
                            href="{{ route('booking.decline-appointment-booking', $appointment->uuid) }}">Decline
                            Payment</a>
                        <button class="btn btn-primary waves-effect mt-2 waves-light" id="payNow">Confirm
                            Payment</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4  py-5">
            <div class="card p-5">

                <h3>{{ $service->name }}</h3>
                <p>
                    {{ $service->description }}
                </p>

                <div class="icon-box">
                    <div class="icon"><i class="bx bx-fingerprint" style="font-size: 20px"></i></div>
                    <h5 class="title"><a href="">Price</a></h5>
                    <p class="description">{{ formatMoney($service->price) }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4  py-5">
            <div class="card p-5">

                <p class="mb-4">Client:<span class="badge rounded-pill bg-primary-subtle text-primary"></span>
                    <b>{{ $appointment->user->last_name }}
                        {{ $appointment->user->first_name }}</b>
                </p>

                <p class="mb-4">Amount to be Paid:<span class="badge rounded-pill bg-primary-subtle text-primary "></span>
                    <b>{{ formatMoney($transaction->amount) }}</b>
                </p>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div>
                            <p class="text-muted"><i
                                    class="bx bx-calendar-event font-size-16 align-middle text-primary me-1"></i>Booking
                                for: {{ date_format($appointment->start_time, 'l jS \of F Y h:i:s A') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
