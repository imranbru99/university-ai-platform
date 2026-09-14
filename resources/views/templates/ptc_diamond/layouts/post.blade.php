<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="title" Content="{{ $post->title }}">
    <meta name="description" content={{ str_limit($post->description, 160) }}">
    <meta name="keywords" content="{{ $post->title }}">
    <link rel="apple-touch-icon" href="{{ getImage(imagePath()['logoIcon']['path'] .'/logo.png') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="{{ $post->title }}">
    <meta name="apple-mobile-web-app-title" content="{{ $post->title }}">
    <meta itemprop="name" content="{{ $post->title }}">
    <meta itemprop="description" content="{{ str_limit($post->description, 160) }}">
    <meta itemprop="image" content="{{ asset($post->image) }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ str_limit($post->description, 160) }}">
    <meta property="og:image" content="{{ asset $post->image) }}"/>
    <meta property="og:image:type" content="{{ asset($post->image) }}"/>
    <meta property="og:image:width" content="{{ asset($post->image) }}"/>
    <meta property="og:image:height" content="{{ asset($post->image) }}"/>
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="{{ asset($post->image) }}">
  
  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- theme meta -->
    <meta name="theme-name" content="revolve" />

    <!--Favicon-->
    <link rel="icon" href="{{ getImage(getFilePath('logoIcon') . '/favicon.png') }}" type="image/gif" />
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'mariam/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'mariam/plugins/themify/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'mariam/plugins/slick-carousel/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'mariam/plugins/slick-carousel/slick.css') }}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'mariam/plugins/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset($activeTemplateTrue . 'mariam/plugins/owl-carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'mariam/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'mariam/css/style.css') }}">
</head>

<body>

    <header class="header-top bg-grey justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-4 text-center d-none d-lg-block">
                    <a class="navbar-brand " href="{{ route('home') }}">
                        <img src="{{ asset($activeTemplateTrue . 'mariam/images/logo.png') }}" alt=""
                            class="img-fluid">
                    </a>
                </div>

                <div class="col-lg-8 col-md-12">
                    <nav class="navbar navbar-expand-lg navigation-2 navigation">
                        <a class="navbar-brand text-uppercase d-lg-none" href="{{ route('home') }}">
                            <img src="{{ asset($activeTemplateTrue . 'mariam/images/logo.png') }}" alt=""
                                class="img-fluid">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="ti-menu"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbar-collapse">
                            <ul id="menu" class="menu navbar-nav mx-auto">
                                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                                <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
                                <li class="nav-item"><a href="{{ route('blog') }}" class="nav-link">Blog</a></li>
                                <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <div class="header-socials-2 text-right d-none d-lg-block">

                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <section class="footer-2 section-padding gray-bg pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="subscribe-footer text-center">
                        <div class="form-group mb-0">
                            <h2 class="mb-3">Subscribe Newsletter</h2>
                            <p class="mb-4">Subscribe my Newsletter for new blog posts , tips and info.
                            <p>
                            <div class="form-group form-row align-items-center mb-0">
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" placeholder="Email Address">
                                </div>
                                <div class="col-sm-3">
                                    <a href="#" class="btn btn-dark ">Subscribe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-btm mt-5 pt-4 border-top">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-inline footer-socials-2 text-center">
                            <li class="list-inline-item"><a href="{{ route('blog') }}">Blog</a></li>
                            <li class="list-inline-item"><a href="{{ route('privacy') }}">Privacy policy</a></li>
                            <li class="list-inline-item"><a href="{{ route('about') }}">About</a></li>
                            <li class="list-inline-item"><a href="{{ route('contact') }}">Contact</a></li>
                            <li class="list-inline-item"><a href="{{ route('terms') }}">Terms</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="copyright text-center ">
                            @ Copyright all reserved to <a href="{{ url('/') }}">themefisher.com</a>-
                            {{ date('Y') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- THEME JAVASCRIPT FILES
================================================== -->
    <!-- initialize jQuery Library -->
    <script src="{{ asset($activeTemplateTrue . 'mariam/plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'mariam/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'mariam/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'mariam/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'mariam/plugins/slick-carousel/slick.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'mariam/plugins/magnific-popup/magnific-popup.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'mariam/plugins/instafeed-js/instafeed.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script src="{{ asset($activeTemplateTrue . 'mariam/plugins/google-map/gmap.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'mariam/js/custom.js"') }}></script>


</body>

</html>
