<!doctype html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Kode Kreatif">
    <!-- <link rel="shortcut icon" href="favicon.png"> -->

    <meta name="description" content="" />
    <meta name="keywords" content="Web Pemprograman" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/front/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet">
    <title>{{ $title }}</title>

    {{-- Animation AOS --}}
    {{--
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> --}}
    @stack('styles')
</head>

<body>

    <!-- Start Header/Navigation -->
    <x-front-nav />
    <!-- End Header/Navigation -->

    <!-- Hero Section -->
    <x-front-hero />
    <!-- End Hero Section -->
    <div class="container">
        {{ $slot }}
    </div>


    <!-- Start Testimonial Slider -->

    <!-- End Testimonial Slider -->

    <!-- Start Footer Section -->
    <x-front-footer />
    <!-- End Footer Section -->


    <script src="{{ asset('assets/front/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/front/js/custom.js') }}"></script>
</body>


</html>