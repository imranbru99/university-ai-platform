<!doctype html>
<html lang="{{ config('app.locale') }}" itemscope itemtype="http://schema.org/WebPage">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> {{ $general->siteName(__($pageTitle)) }}</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/global/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/global/css/all.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/global/css/line-awesome.min.css') }}" />

    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/lib/custom-icon.css') }}">

    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/lib/slick.css') }}">

    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/lib/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/lib/simplebar.min.css') }}">

    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/main.css') }}">

    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/custom.css') }}">
    @stack('style-lib')

    @stack('style')

    <link rel="stylesheet"
        href="{{ asset($activeTemplateTrue . 'css/color.php') }}?color={{ $general->base_color }}&secondColor={{ $general->secondary_color }}">
</head>

<body>



    @yield('panel')



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('assets/global/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/bootstrap.bundle.min.js') }}"></script>

    <!-- slick slider js -->
    <script src="{{ asset($activeTemplateTrue . 'js/lib/slick.js') }}"></script>

    <!-- magnific popup plugin -->
    <script src="{{ asset($activeTemplateTrue . 'js/lib/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/lib/simplebar.min.js') }}"></script>

    <!-- dashboard custom js -->
    <script src="{{ asset($activeTemplateTrue . 'js/app.js') }}"></script>

    @stack('script-lib')

    @stack('script')

    @include('partials.plugins')

    @include('partials.notify')



</body>

</html>
