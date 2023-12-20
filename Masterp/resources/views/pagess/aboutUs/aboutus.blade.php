@extends('layout.master')
@section('content')
    <!-- ##### Header Area End ##### -->
  <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="{{ asset('front_end/img/core-img/pls.jpeg') }}" alt="" />
        </div>
    </div>
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url('{{ asset('front_end/img/bg-img/24.jpg') }}')">
            <h2>ABOUT US</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### About Area Start ##### -->
    <section class="about-us-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>ABOUT US</h2>
                        <h4>We are leading in the plants live Indoors .</h4>
                    </div>
                    <h5>We decided to specialize in a specific field of the world of plants, which is the plants that can
                        live in homes, especially apartments and companies that do not contain any landscape
                        Therefore, we seek to improve the internal and aesthetic environment and preserve people's health
                        through specific types of plants
                    </h5>

                    <!-- Progress Bar Content Area -->
                    <div class="alazea-progress-bar mb-50">
                        <!-- Single Progress Bar -->
                        <div class="single_progress_bar">
                            <p>Home Plant</p>
                            <div id="bar1" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="80"></span>
                            </div>
                        </div>

                        <!-- Single Progress Bar -->
                        <div class="single_progress_bar">
                            <p>Office Plant</p>
                            <div id="bar2" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="70"></span>
                            </div>
                        </div>

                        <!-- Single Progress Bar -->
                        <div class="single_progress_bar">
                            <p> Accessories</p>
                            <div id="bar3" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="85"></span>
                            </div>
                        </div>

                        <!-- Single Progress Bar -->
                        <div class="single_progress_bar">
                            <p>Event</p>
                            <div id="bar4" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="65"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="alazea-benefits-area">
                        <div class="row">
                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="{{ asset('front_end/img/core-img/b1.png') }}" alt="">
                                    <h5>Quality Products</h5>
                                    <p>Intiam eu sagittis est, at commodo lacini libero. Praesent dignissim sed odio vel
                                        aliquam manta lagorn.</p>
                                </div>
                            </div>

                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="{{ asset('front_end/img/core-img/b2.png') }}" alt="">
                                    <h5>Perfect Service</h5>
                                    <p>Intiam eu sagittis est, at commodo lacini libero. Praesent dignissim sed odio vel
                                        aliquam manta lagorn.</p>
                                </div>
                            </div>

                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="{{ asset('front_end/img/core-img/b3.png') }}" alt="">
                                    <h5>100% Natural</h5>
                                    <p>Intiam eu sagittis est, at commodo lacini libero. Praesent dignissim sed odio vel
                                        aliquam manta lagorn.</p>
                                </div>
                            </div>

                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="{{ asset('front_end/img/core-img/b4.png') }}" alt="">
                                    <h5>Environmentally friendly</h5>
                                    <p>Intiam eu sagittis est, at commodo lacini libero. Praesent dignissim sed odio vel
                                        aliquam manta lagorn.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="border-line"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Area End ##### -->

    <!-- ##### Service Area Start ##### -->
    <section class="our-services-area bg-gray section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>OUR SERVICES</h2>
                        <p>We provide the perfect service for you.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-lg-5">
                    <div class="alazea-service-area mb-100">

                        <!-- Single Service Area -->
                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                            <!-- Icon -->
                            <div class="service-icon mr-30">
                                <img src="{{ asset('front_end/img/core-img/b2.png') }}" alt="">
                            </div>
                            <!-- Content -->
                            <div class="service-content">
                                <h5> FUTURE PLAN </h5>
                                <p>To have plastic houses through which we cultivate thyme, sesame, and sumac, and use olive
                                    oil, all from Ajloun city.</p>
                            </div>
                        </div>

                        <!-- Single Service Area -->
                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="300ms">
                            <!-- Icon -->
                            <div class="service-icon mr-30">
                                <img src="{{ asset('front_end/img/core-img/cf1.png') }}" alt="">
                            </div>
                            <!-- Content -->
                            <div class="service-content">
                                <h5>SPECIAL ORDER</h5>
                                <p>Exclusive orders, including unique gifts and specific plants, are unavailable through
                                    other markets or our website.</p>
                            </div>
                        </div>

                        <!-- Single Service Area -->
                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="500ms">
                            <!-- Icon -->
                            <div class="service-icon mr-30">
                                <img src="{{ asset('front_end/img/core-img/event12.png') }}" alt="">
                            </div>
                            <!-- Content -->
                            <div class="service-content">
                                <h5>EVENT</h5>
                                <p>We enhance your events' beauty and enjoyment through the captivating allure of nature.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="alazea-video-area bg-overlay mb-100">
                        <img src="{{ asset('front_end/img/bg-img/23.jpg') }}" alt="">
                        <a href="http://www.youtube.com/watch?v=7HKoqNJtMTQ" class="video-icon">
                            <i class="fa fa-play" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Service Area End ##### -->

    <!-- ##### Testimonial Area Start ##### -->
    @include('pagess.aboutUs.testimonial')
    <!-- ##### Testimonial Area End ##### -->

    <!-- ##### Cool Facts Area Start ##### -->
    @include('pagess.aboutUs.Counter')
    
    <!-- ##### Cool Facts Area End ##### -->

    <!-- ##### Team Area Start ##### -->
    <section class="team-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2> OUR TEAM</h2>
                        <p>We are here to help </p>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single Team Member Area -->
                <div style="margin: auto;" class="col-12 col-sm-6 col-lg-5">
                    <div class="single-team-member text-center mb-100">
                        <!-- Team Member Thumb -->
                        <div class="team-member-thumb">
                            <img src="{{ asset('front_end/img/bg-img/admin-fotor-bg-remover-20230827223312.png') }}"
                                alt="">
                            <!-- Social Info -->
                            <div class="team-member-social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                         </div>
                        <!-- Team Member Info -->
                        <div class="team-member-info mt-30">
                            <h5>SAM NJT</h5>
                            <p> Owner &amp; designer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Team Area End ##### -->
@endsection
