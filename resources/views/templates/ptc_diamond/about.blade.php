@extends($activeTemplate . 'layouts.mariam')
@section('content')
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                        <h2 class="lg-title">About Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="pt-5 padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="row">
                        <div class="col-lg-12">
                            <img src="{{ asset($activeTemplateTrue . 'mariam/images/about.jpg') }}" alt=""
                                class="img-fluid w-100">
                        </div>
                    </div>

                    <div class="row justify-content-center mt-5">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h5 class="text-uppercase letter-spacing mb-4">Who are US?</h5>
                                    <p>We are Team of Phd Friendship of our University. in The last week we have planned to
                                        write content from our own demand and self wish. We want to write something for our
                                        next generation that is our dream to our website.</p>

                                </div>
                                <div class="col-lg-4">
                                    <h5 class="text-uppercase letter-spacing mb-4">Our vission</h5>
                                    <p> To make a perfect world where everything is fair and good where we can live safely
                                        where our next generation feel better by checking our activities.</p>
                                </div>
                            </div>

                            <h3 class="mb-3 mt-5">We have travel 10+ more countries in this year.</h3>
                            <p class="mb-5">We have travelled more than 10 country with our team. Our team are more self
                                expert with working with our society what we made several way with following the vission of
                                our activities. We are enjoying and learning new something with our new era with new
                                environment and new technology uses</p>

                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="about-widget mb-4 mb-lg-0">
                                        <img src="{{ asset($activeTemplateTrue . 'mariam/images/news/news-1.jpg') }}"
                                            alt="" class="img-fluid">
                                        <h4 class="mt-3">Hill ward</h4>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="about-widget mb-4 mb-lg-0">
                                        <img src="{{ asset($activeTemplateTrue . 'mariam/images/news/news-2.jpg') }}"
                                            alt="" class="img-fluid">
                                        <h4 class="mt-3">Awesome ride</h4>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="about-widget mb-4 mb-lg-0">
                                        <img src="{{ asset($activeTemplateTrue . 'mariam/images/news/news-3.jpg') }}"
                                            alt="" class="img-fluid">
                                        <h4 class="mt-3">Newyork</h4>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="about-widget mb-4 mb-lg-0">
                                        <img src="{{ asset($activeTemplateTrue . 'mariam/images/news/news-4.jpg') }}"
                                            alt="" class="img-fluid">
                                        <h4 class="mt-3">Rising Sea</h4>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
