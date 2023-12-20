 <section class="testimonial-area bg-gray section-padding-100" s>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonials-slides owl-carousel">
                        <!-- Single Testimonial Slide -->
                        @foreach ($data as $Testimonial  )
                            
                        <div class="single-testimonial-slide">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-thumb">
                                        <img style="height:-webkit-fill-available !important;" src="{{ asset($Testimonial['image']) }}" alt="image" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-content">
                                        <!-- Section Heading -->
                                        <div class="section-heading">
                                            <h2>TESTIMONIAL</h2>
                                            <strong>Some kind words from clients about Mashtal.online the last comments</strong>
                                        </div>

                                         <div class="testimonial-author-info">
                                            <h4> By: “ {{ $Testimonial['name'] }} ”</h4>
                                        </div>
                                        <h4>
                                            “ {{ $Testimonial['review']}} ”
                                        </h4>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    
                    </div>
                </div>
            </div>
        </div>
    </section>