<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Mu-Tae-Cute</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('template/assets/img/Logo_1.png') }}" rel="icon">
    <link href="{{ asset('template/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('template/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    {{-- Template Shopping --}}
    <link href="{{ asset('templateshop/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('templateshop/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('templateshop/css/style.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Moderna
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper" class="">
        @include('layutsUser.top')

        @include('layutsUser.left')

        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('layutsUser.footer')

    </div>
</body>
@stack('script')
<script src="{{ asset('template/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('template/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('template/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('template/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('template/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('template/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
<script src="{{ asset('template/assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('template/assets/js/main.js') }}"></script>
{{-- Template Shopping --}}
<script src="{{ asset('templateshop/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('templateshop/js/tiny-slider.js')}}"></script>
<script src="{{ asset('templateshop/js/custom.js')}}"></script>

</html>
