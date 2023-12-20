<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
 
    <!-- Title -->
    <title>Mashtal.online - Gardening &amp; Landscaping </title>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('front_end/img/core-img/favicon.ico') }}" />

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('front_end/style.css') }}" />


    <link rel="stylesheet" href="{{ asset('front_end/myaccount22.css') }}">




    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>





</head>

<body>




    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- ***** Top Header Area ***** -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Top Header Content -->

                            <!-- كومنت على الايمل  -->
                            {{-- <div class="top-header-meta">
                                <a href="#" data-toggle="tooltip" data-placement="bottom"
                                    title="infodeercreative@gmail.com"><i class="fa fa-envelope-o"
                                        aria-hidden="true"></i> <span>Email: infodeercreative@gmail.com</span></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom"
                                    title="+1 234 122 122"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us:
                                        +1 234 122 122</span></a>
                            </div> --}}

                            <!-- Top Header Content -->
                            {{-- <div class="top-header-meta d-flex">

                                <div class="login">
                                    <a href="login.html"><i class="fa fa-user" style="font-size: 25px; "
                                            aria-hidden="true"></i>
                                        <span>Login</span></a>



                                </div>
                                <!-- Cart -->
                                <div class="cart">
                                    <a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"
                                            style="font-size: 25px;" aria-hidden="true"></i>
                                        <span>Cart <span class="cart-quantity">(5)</span></span></a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ***** Navbar Area ***** -->
        <div class="alazea-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="alazeaNav">
                        <!-- Nav Brand -->
                        <a href="{{ route('home') }}" class="nav-brand"><img id="navlogo"
                                src="{{ asset('front_end/img/core-img/NEWLOGO-removebg-preview.png') }}"
                                alt="LOGO" /></a>

                        <img style="z-index: 100; width:80px" src="{{ asset('front_end/img/core-img/pls22.jpeg') }}"
                            alt="">
                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap">
                                    <span class="top"></span><span class="bottom"></span>
                                </div>
                            </div>

                            <!-- Navbar Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li>
                                        <a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="{{ route('shops') }}">Shop</a></li>
                                            <li>
                                                <a href="portfolio.html">Service</a>
                                                <ul class="dropdown">
                                                    <li><a href="{{ route('events') }}">Event</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="blog.html">Blog</a>
                                                <ul class="dropdown">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-post.html">Blog Details</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('show.contact') }}">Contact Us</a></li>
                                    <li><a href="{{ route('about') }}">About Us</a></li>


                                    @if (Route::has('login'))
                                        @auth
                                            <li>
                                                <a>My Account</a>
                                                <ul class="dropdown text-center">
                                                    <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                                                    <form style="display: inline-block" method="POST" class="nav-item"
                                                        action="{{ route('logout') }}">
                                                        @csrf
                                                        <li>
                                                            <a href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();this.closest('form').submit();">
                                                                {{ __('Log Out') }}
                                                            </a>
                                                        </li>
                                                    </form>




                                                </ul>
                                            </li>
                                        @else
                                            <li><a style="min-width: 100px;" class="btn alazea-btn "
                                                    href="{{ route('login') }}">Login</a></li>
                                            @if (Route::has('register'))
                                                <li><a style="min-width: 100px;" class="btn alazea-btn active"
                                                        href="{{ route('register') }}">Register</a></li>
                                            @endif
                                        @endauth
                                    @endif

                                </ul>


                                <!-- Search Icon -->
                                <div>
                                    <ul>

                                        @livewire('counter-cart')
                                        @livewire('counter-wishlist')
                                       

                                        <ul>



                                </div>
                            </div>
                            <!-- Navbar End -->
                        </div>
                    </nav>

                   
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
