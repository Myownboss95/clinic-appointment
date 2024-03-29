<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{$settings->app_name?? config('app.name')}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('clinic/assets/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('clinic/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('clinic/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{ asset('clinic/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{ asset('clinic/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('clinic/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('clinic/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('clinic/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('clinic/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('clinic/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('clinic/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:{{ $settings->site_email }}">{{ $settings->site_email }}</a>
        <i class="bi bi-whatsapp"></i> <a href="{{$settings->whatsapp_contact}}">{{ $settings->site_phone }}</a>
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="{{ $settings->site_twitter }}" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="{{ $settings->site_facebook }}" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="{{ $settings->site_instagram }}" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="{{ $settings->site_linkedin }}" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="/">{{ $settings->app_name ?? config('app.name')}}</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          {{-- <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#departments">Departments</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li> --}}
          <li class="dropdown">
            @guest
                <a href="#"><span>Sign Up</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                </ul>
            @else
                <a href="{{ roleBasedRoute('index') }}">Go to Dashboard</a>
            @endguest
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      {{-- <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a> --}}

    </div>
  </header><!-- End Header -->

  <main id="main">

    @yield('content')
    @stack('scripts')

  </main><!-- End #main -->

  <footer id="footer">

    {{-- <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>{{ config('app.name')}}</h3>
            <p>
              <strong>Phone:</strong> {{ $settings->site_phone }}<br>
              <strong>Email:</strong> {{ $settings->site_email }}<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>

            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div> --}}

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>{{ $settings->app_name ?? config('app.name')}}</span></strong>. All Rights Reserved
        </div>
      </div>
      {{-- <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="{{ $settings->site_twitter }}" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="{{ $settings->site_facebook }}" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="{{ $settings->site_instagram }}" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="{{ $settings->site_linkedin }}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div> --}}
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="{{ asset('clinic/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{ asset('clinic/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('clinic/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{ asset('clinic/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  {{-- <script src="{{ asset('clinic/assets/vendor/php-email-form/validate.js')}}"></script> --}}
  <!-- Template Main JS File -->
  <script src="{{ asset('clinic/assets/js/main.js')}}"></script>



</body>

</html>