@extends('home.layouts.app')

@section('content')
    <div class="row pt-5" style="margin-top: 100px ">
        <div class="col-xl-5 col-lg-6  py-5">
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

        <div class="col-xl-7 col-lg-6 ">

            <div id="calendly-embed" style="min-width:320px;height:700px;"></div>
        </div>
        <div>
            <!-- Calendly inline widget begin -->
            @push('scripts')
                <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
                <script>
                    let calendlyUrl = "{{env('CALENDLY_APPOINTMENT_URL')}}?utm_service={{$service->id}}";
                    // let redirectUri = "{{env('CALENDLY_APPOINTMENT_URL')}}?utm_service={{$service->id}}";


                    document.addEventListener('DOMContentLoaded', function () {
                        Calendly.initInlineWidget({
                            url: "https://calendly.com/tobeodiachi2014/appointments",
                            parentElement: document.getElementById('calendly-embed'),
                            redirect_uri:"https://clinic.test/appointment-recieved?utm_service={{$service->id}}" ,
                            prefill: {
                                firstName: "John",
                                lastName: "Doe",
                                email: "john@doe2.com",
                            } 
                        });
                    });
                </script>
            @endpush

            <!-- Calendly inline widget end -->
        </div>
    </div>
    </div>
@endsection
