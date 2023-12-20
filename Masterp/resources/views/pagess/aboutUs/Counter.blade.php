<section class="cool-facts-area bg-img
          section-padding-100-0"
        style="background-image: url('{{ asset('front_end/img/bg-img/cool-facts.png') }}')">
        <div class="container">
            <div class="row">

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact d-flex align-items-center justify-content-center mb-100">
                        <div class="cf-icon">
                            <img src="{{ asset('front_end/img/core-img/cf1.png') }}" alt="">
                        </div>
                        <div class="cf-content">
                            <h2><span class="counter">{{ $ordersCount }}</span></h2>
                            <h6>Orders</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact d-flex align-items-center justify-content-center mb-100">
                        <div class="cf-icon">
                            <img src="{{ asset('front_end/img/core-img/user.png') }}" alt="">
                        </div>
                        <div class="cf-content">
                            <h2><span class="counter">{{ $usersCount }}</span></h2>
                            <h6>User</h6>
                        </div>
                    </div>
                </div>


                

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact d-flex align-items-center justify-content-center mb-100">
                        <div class="cf-icon">
                            <img src="{{ asset('front_end/img/core-img/cf3.png') }}" alt="">
                        </div>
                        <div class="cf-content">
                            <h2><span class="counter">{{ $reviewCount }}</span>+</h2>
                            <h6>HAPPY Review</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact d-flex align-items-center justify-content-center mb-100">
                        <div class="cf-icon">
                            <img src="{{ asset('front_end/img/core-img/cf4.png') }}" alt="">
                        </div>
                        <div class="cf-content">
                            <h2><span class="counter">{{ $incomeCount }}</span>K+</h2>
                            <h6>REVENUE</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Side Image -->
        <div class="side-img wow fadeInUp" data-wow-delay="900ms">
            <img src="{{ asset('front_end/img/core-img/pot.png') }}" alt="">
        </div>
    </section>