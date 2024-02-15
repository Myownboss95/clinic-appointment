
@extends('home.layouts.app')

@section("content")
<div class="row">
 
</div>
 <div class="row pt-5 px-5" style="margin-top: 100px">
  <div class="col-md-4 offset-md-4 mt-4">

    <div class="card mb-4 rounded-3 shadow-sm border-secondary">
        <div class="card-header py-3 text-bg-secondary border-secondary">
            <h4 class="my-0 fw-normal">
                {{ $service->name }}
            </h4>
        </div>
        <div class="card-body">
            <img src="{{ asset('storage/sub_service/' . $service->image) }}" alt="" class="object-fit-cover border rounded w-100">
            <h4 class="card-title pricing-card-title pt-5">{{ formatMoney($service->price) }}<small
                    class="text-body-secondary fw-light">/service</small></h4>

            <p>
                {{ $service->description }}
            </p>
            <a href="{{route('booking.book-appointment', $service->slug)}}" class="w-100 btn btn-lg btn-secondary">Book Appointment</a>
            {{-- <a href= class="appointment-btn scrollto w-100" style=" margin-left:0px;"><span class="d-md-inline">Book</span> Appointment</a> --}}

        </div>
    </div>

</div>
          <div>
          </div>
        </div>
    </div>      
    @endsection