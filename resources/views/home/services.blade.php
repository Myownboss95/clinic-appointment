@extends('home.layouts.app')

@section("content")

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">
 
        <div class="section-title" style="padding-top: 5rem">
          <h2>{{$services->name}} Services</h2>
          <p>{{$settings->hero}}</p>
        </div>
        <div class="row justify-content-center">
          @if($services->subService->count() > 0)
              @foreach ($services->subService as $service)
              <div class="col-md-4">

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
          @endforeach
            @else
                <p>No Subservice for this service</p>
            @endif
          
        </div>
 
      </div>
    </section><!-- End Services Section -->
 

@endsection