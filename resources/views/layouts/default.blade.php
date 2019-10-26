<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive admin dashboard and web application ui kit. ">
    <meta name="keywords" content="blank, starter">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('assets/css/core.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/izimodal/iziModal.min.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('assets/img/apple-touch-icon.png')}}">
    <link rel="icon" href="{{asset('assets/img/favicon.png')}}">

    <style>
        .error {
            color: red;
        }
        .sidebar-header {
            background-color: {{ config('brand.sidebar-header') }} !important;
        }
        .sidebar.sidebar-color-company .menu:not(.menu-bordery)>.menu-item.active>.menu-link {
            background-color: {{ config('brand.sidebar-active-color-company') }} !important;
        }
        .topbar {
            background-color: {{ config('brand.topbar-color') }} !important;
        }
        .btn-company {
            background-color: {{ config('brand.btn-company') }} !important;
            color: {{ config('brand.btn-text-color-company') }} !important;
        }

    </style>

    @yield('styles')
</head>

<body>

<!-- Preloader -->
<div class="preloader">
    <div class="spinner-dots">
        <span class="dot1"></span>
        <span class="dot2"></span>
        <span class="dot3"></span>
    </div>
</div>


@include('layouts.menu-left')


@include('layouts.top-bar')


<!-- Main container -->
<main class="main-container">
    @yield('content')


    @include('layouts.footer')

</main>
<!-- END Main container -->

<!-- Modal -->
<div id="modal"></div>
<!-- END Modal -->

<!-- Global quickview -->
<div id="qv-global" class="quickview" data-url="{{ asset('assets/data/quickview-global.html') }}">
    <div class="spinner-linear">
        <div class="line"></div>
    </div>
</div>
<!-- END Global quickview -->



<!-- Scripts -->
<script src="{{ asset('assets/js/core.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/script.min.js') }}"></script>

<script src="{{ asset('js/izimodal/iziModal.min.js') }}"></script>
<script src="{{ asset('js/izimodal/config.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


@yield('scripts')

</body>
</html>
