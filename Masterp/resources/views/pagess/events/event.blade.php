@extends('layout.master')
@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url({{ asset('front_end/img/bg-img/24.jpg') }});">
            <h2>EVENTS</h2>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">EVENTS</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->
  <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="{{ asset('front_end/img/core-img/pls.jpeg') }}" alt="" />
        </div>
    </div>
    <!-- ##### Portfolio Area Start ##### -->
    <section class="alazea-portfolio-area portfolio-page section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>OUR EVENTS</h2>
                        <p>We devote all of our experience and efforts for creation</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="alazea-portfolio-filter">
                        <div class="portfolio-filter">
                            <button class="btn active" data-filter="*">All</button>

                            @foreach ($EventType as $events)
                                <button class="btn" data-filter=".{{ $events->name }}">{{ $events->name }}</button>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

            <div class="row alazea-portfolio">


                @foreach ($Event as $index => $items)
                    @if ($index % 2 == 0)
                        <!-- Single Portfolio Area (Template 1) -->
                        <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item {{ $items->eventTypes->name }}">
                            <!-- Portfolio Thumbnail -->
                            <div class="portfolio-thumbnail bg-img"
                                style="background-image: url({{ asset($items->image1) }});"></div>
                            <!-- Portfolio Hover Text -->
                            <div class="portfolio-hover-overlay">
                                <a href="{{ route('eventdetal') }}/{{ $items->id }}"
                                    class="portfolio-img d-flex align-items-center justify-content-center">
                                    <div class="port-hover-text">
                                        <h3>{{ $items->name }}</h3>
                                        <h5>{{ $items->eventTypes->name }}</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @else
                        <!-- Single Portfolio Area (Template 2) -->
                        <div class="col-12 col-sm-6 col-lg-6 single_portfolio_item {{ $items->eventTypes->name }}">
                            <!-- Portfolio Thumbnail -->
                            <div class="portfolio-thumbnail bg-img"
                                style="background-image: url({{ asset($items->image1) }});"></div>
                            <!-- Portfolio Hover Text -->
                            <div class="portfolio-hover-overlay">
                                <a href="{{ route('eventdetal') }}/{{ $items->id }}"
                                    class="portfolio-img d-flex align-items-center justify-content-center">
                                    <div class="port-hover-text">
                                        <h3>{{ $items->name }}</h3>
                                        <h5>{{ $items->eventTypes->name }}</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </section>
@endsection
