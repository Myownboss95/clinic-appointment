@extends('home.layouts.app')

@section('content')
    <div class="row  p-5 pt-5" style="margin-top: 100px ">
        <div class="col-xl-5 col-lg-6  py-5">
            <div class="row justify-content-center">
                <div class="col-md-7 offset-md-5 mt-4">

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
                        </div>
                    </div>

                </div>
                <div>
                </div>
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
                    let calendlyUrl = "https://calendly.com/tobeodiachi2014/appointments";
                    let head = document.querySelector('head');
                    let script = document.createElement('script');

                    script.type = 'text/javascript';
                    script.onload = function() {
                        // document.addEventListener('DOMContentLoaded', function () {
                        Calendly.initInlineWidget({
                            url: "{{ env('CALENDLY_SCHEDULE_URL') }}",
                            parentElement: document.getElementById('calendly-embed'),
                            prefill: {
                                firstName: "{{ auth()->user()?->first_name ?? ''}}",
                                lastName: "{{ auth()->user()?->last_name ?? ''}}",
                                email: "{{ auth()->user()?->email ?? ''}}",
                                phoneNumber: "{{ auth()->user()?->phone_number ?? ''}}",
                            }
                        });
                    }
                    // });
                    script.src = 'https://assets.calendly.com/assets/external/widget.js';
                    head.appendChild(script);
                </script>
            @endpush

            <!-- Calendly inline widget end -->
        </div>
    </div>
    </div>
@endsection
