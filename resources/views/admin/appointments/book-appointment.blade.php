@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h5>Create Appointment for {{ $user->first_name }} {{ $user->last_name }}</h5>
                    <h6 class="text-muted">{{ $service->name }}</h6>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div id="calendly-embed" style="min-width:320px;height:700px;"></div>
            </div>
        </div>


    </div>
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
                        firstName: "{{ $user->first_name ?? '' }}",
                        lastName: "{{ $user->last_name ?? '' }}",
                        email: "{{ $user->email ?? '' }}",
                    }
                });
            }
            // });
            script.src = 'https://assets.calendly.com/assets/external/widget.js';
            head.appendChild(script);
        </script>
    @endpush

    <!-- Calendly inline widget end -->
@endsection
