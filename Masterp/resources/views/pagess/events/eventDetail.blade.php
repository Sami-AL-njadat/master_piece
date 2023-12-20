@extends('layout.master')
@section('content')
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
            style="background-image: url({{ asset('front_end/img/bg-img/24.jpg') }});">
            <h2>OUR WORKS</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#"><i class="fa fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Portfolio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Single Portfolio
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Portfolio Detaila Area Start ##### -->
    <section class="portfolio-details-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>{{ $Event->title }}</h2>
                        <p>Design &amp; constructed by Alazea.</p>
                    </div>
                </div>
            </div>

            <div class="portfolio-text mb-100">
                <div class="row">


                     <div class="col-12 col-lg-6">
                       
                     <div class="portfolio-details-meta">
                        <h5>Date (Start - Finish)</h5>
                        <p> {{ $Event->beginning }}
                            - {{ $Event->ending }}
                        </p>
                    </div>
                    <div class="portfolio-details-meta">
                        <h5>Client</h5>
                        <p>{{ $Event->clientName }}</p>
                    </div>
                    <div class="portfolio-details-meta">
                        <h5>Project Type</h5>
                        <p>{{ $Event->eventTypes->name }}</p>
                    </div>
                  
                    <div class="portfolio-details-meta">
                        <h5>Total contract value</h5>
                        <p>${{ $Event->contractValue}}</p>
                    </div>
                     </div>
                    <div class="col-12 col-lg-6">
                        <h5>About this project</h5>
                        <p>
                            {{ $Event->aboutProject }}
                        </p>

                    </div>
                    
                   
                    
                    <div class="col-12 col-lg-6">
                        <h5>Client requirements</h5>
                        <p>
                            {{ $Event->clientRequest }}

                        </p>
                    </div>

                    
                        
                    <div class="col-12 col-lg-6">
                        <h5>Main idea and details</h5>
                        <p>
                            {{ $Event->idea }}
                        </p>

                        
                        <ul>
                            <li>
                                <i class="fa fa-check"></i> Vivamus starlord finibus, massa
                                eget, suscipit metus nami at elit started
                            </li>
                            <li>
                                <i class="fa fa-check"></i> Cras ipsum libero, suscipit
                                vitamin tellus vitae, feugiat ultricies purus praesent gamora.
                            </li>
                            <li>
                                <i class="fa fa-check"></i> Proin ex sem, ultrices drax the
                                sit amet, facilisis destroyer et odio profession risusest.
                            </li>
                            <li>
                                <i class="fa fa-check"></i> Morbi maximus mauris eget groot
                                dignissim, in laoreet justo facilisis.
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Portfolio Slides -->
        <div class="portfolio-slides owl-carousel mb-100">
            <!-- Single Portfolio Slide -->
            <div class="single-portfolio-slide">
                <img style="width:100vw; height: 450px;"   src="{{ asset($Event->image1) }}" alt="" />
            </div> 
            <!-- Single Portfolio Slide -->
            <div class="single-portfolio-slide">
                <img style="width:100vw; height: 450px;"   src=" {{ asset($Event->image2) }}" alt="" />
            </div>
            <!-- Single Portfolio Slide -->
            <div class="single-portfolio-slide">
                <img style="width:100vw; height: 450px;"   src=" {{ asset($Event->image3) }}" alt="" />
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-8">
       
                </div>

             
            </div>
        </div>
    </section>
@endsection
