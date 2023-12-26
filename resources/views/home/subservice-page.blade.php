
@extends('home.layouts.app')

@section("content")
 <div class="row pt-5" style="margin-top: 100px ">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative py-5" style="background-image: url('{{ asset($service->image) }}');">
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>{{ $service->name }}</h3>
            <p>
                {{ $service->description}}
            </p>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint" style="font-size: 20px"></i></div>
              <h5 class="title"><a href="">Price</a></h5>
              <p class="description">{{ formatMoney($service->price) }}</p>
            </div>
            <a href="{{route('book-appointment', $service->slug)}}" class="btn-get-started scrollto">Book Appointment</a>

          </div>
          <div>
          </div>
        </div>
    </div>      
    @endsection