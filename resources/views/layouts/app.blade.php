<!DOCTYPE html>
<html lang="id">
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Gramentheme">
    <meta name="description" content="Smartnesa">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ======== Page title ============ -->
    <title>@yield('title', 'Smartnesa')</title>

    <!--<< Favcion >>-->
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">

    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!--<< Magnific popup.css >>-->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="{{ asset('css/meanmenu.css') }}">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    <!--<< NiceSelect.css >>-->
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    @stack('styles')
</head>

<body>
    <!-- Preloader Start -->
    @include('layouts.partials.preloader')

    <!-- Mouse Cursor Start -->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>

    <!-- Back To Top Start -->
    <button id="back-top" class="back-to-top">
        <i class="fa-solid fa-chevron-up"></i>
    </button>

    <!-- Offcanvas Area Start -->
    @include('layouts.partials.offcanvas')

    <!-- Header Section Start -->
    @include('layouts.partials.navbar')

    <!-- Search Area Start -->
    @include('layouts.partials.search')

    <!-- Main Content -->
    @yield('content')

    <!-- Footer Section -->
    @include('layouts.partials.footer')

    <!--<< All JS Plugins >>-->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <!--<< Bootstrap Js >>-->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!--<< Waypoints Js >>-->
    <script src="{{ asset('js/jquery.waypoints.js') }}"></script>
    <!--<< Counterup Js >>-->
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <!--<< Viewport Js >>-->
    <script src="{{ asset('js/viewport.jquery.js') }}"></script>
    <!--<< Tilt Js >>-->
    <script src="{{ asset('js/tilt.min.js') }}"></script>
    <!--<< Swiper Slider Js >>-->
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
    <!--<< MeanMenu Js >>-->
    <script src="{{ asset('js/jquery.meanmenu.min.js') }}"></script>
    <!--<< Magnific popup Js >>-->
    <script src="{{ asset('js/magnific-popup.min.js') }}"></script>
    <!--<< Wow Animation Js >>-->
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <!--<< NIce Select Js >>-->
    <script src="{{ asset('js/nice-select.min.js') }}"></script>
    <!--<< Main.js >>-->
    <script src="{{ asset('js/main.js') }}"></script>

    @stack('scripts')
</body>
</html>
