@extends('home.layouts.app')

@section("content")

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          <p>Allow patients to schedule appointments through online portals, reducing administrative workload and improving accessibility for patients and send automated reminders to patients about upcoming appointments, helping reduce no-shows and improve overall appointment adherence.</p>
        </div>


        <div class="row">
          <div class="col-lg-8 col-md-6 d-flex align-items-stretch">
            @if($services->sub_service()->count() > 0)
            @foreach ($services->sub_service as $sub_service)
            <a href="{{route('register.sub_service', $sub_service->slug)}}">
                <div class="icon-box">
                <div class="icon"><i class="fas fa-heartbeat"></i></div>
                <h4>{{$sub_service->price}}</h4>
                <p>{{$sub_service->description}}</p>
                </div>
                
            </a>
            @endforeach
            @else
                <p>No Subservice for this service</p>
            @endif
          </div>
          
        </div>
 
      </div>
    </section><!-- End Services Section -->
 

  </main><!-- End #main -->

   @endsection