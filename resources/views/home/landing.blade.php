@extends('home.layouts.app')

@section('content')
    <style>
        .hyphen-list {
            list-style-type: disc;
            /* Use the standard disc marker for hyphens */
        }

        .hyphen-list li::marker {
            /* Target the list marker itself */
            content: "-";
            /* Replace the disc with a hyphen */
        }

        /* Ensure left alignment within flexbox */
        .d-flex .hyphen-list {
            text-align: left;
        }
    </style>
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <h1>Welcome to {{ $settings->app_name ?? config('app.name') }}</h1>
            <h2>{{ $settings->hero }}</h2>
            @foreach ($services as $service)
                <a href="{{ route('services.sub_service', $service->slug) }}" class="btn-get-started scrollto">Request {{$service->name}}</a>
            @endforeach
        </div>
    </section><!-- End Hero -->

    {{-- <main id="main"> --}}

    <!-- ======= Why Us Section ======= -->
    {{-- <section id="why-us" class="why-us">
        <div class="container">

            <div class="row" id="about">
                <div class="col-lg-4 d-flex align-items-stretch">
                    <div class="content">
                        <h3>Why Choose {{ $settings->app_name ?? config('app.name') }}?</h3>
                        <p>{{ $settings->site_description }} </p>
                        <div class="text-center">
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            @foreach ($services as $service)
                                <div class="col-md-6 d-flex align-items-stretch">

                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-receipt"></i>
                                        <h4>{{ $service->name }}</h4>
                                        <ul class="hyphen-list">
                                            @foreach ($service->subService as $subService)
                                                <li>{{ $subService->name }}; {{ $subService->description }}</li>
                                            @endforeach
                                        </ul>
                                        <a href="{{ route('services.sub_service', $service->slug) }}" class="more-btn">View
                                            Services </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div><!-- End .content-->
                </div>
            </div>

        </div>
    </section> --}}
    <!-- End Why Us Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Contact</h2>
            </div>
        </div>

        {{-- <div>
            <iframe style="border:0; width: 100%; height: 350px;"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                frameborder="0" allowfullscreen></iframe>
        </div> --}}

        <div class="container">
            <div class="row mt-5">

                <div class="col-lg-4">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>{{ $settings->app_address }}</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>{{ $settings->site_email }}</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>{{ $settings->site_phone }}</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">

                    <form action="{{ route('contact-form') }}" method="POST" class="php-email-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Your Name" required>
                                @error('name')
                                    <span class="error invalid-feedback text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required>
                                @error('email')
                                    <span class="error invalid-feedback text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                required>
                            @error('subject')
                                <span class="error invalid-feedback text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            @error('message')
                                <span class="error invalid-feedback text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="text-center"><button type="submit" class="">Send Message</button></div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->



    <!-- ======= Footer ======= -->
@endsection
