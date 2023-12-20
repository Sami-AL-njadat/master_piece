@extends('layout.master')

@section('content')
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="{{ asset('front_end/img/core-img/pls.jpeg') }}" alt="" />
        </div>
    </div>
    @if (count($review) > 0)
        @php
            $R1 = 0;
            $R2 = 0;
            $R3 = 0;
            $R4 = 0;
            $R5 = 0;
            foreach ($review as $reviews) {
                if ($reviews->rating == 1) {
                    $R1++;
                } elseif ($reviews->rating == 2) {
                    $R2++;
                } elseif ($reviews->rating == 3) {
                    $R3++;
                } elseif ($reviews->rating == 4) {
                    $R4++;
                } elseif ($reviews->rating == 5) {
                    $R5++;
                }
            }
            $AVG = ($R1 + $R2 * 2 + $R3 * 3 + $R4 * 4 + $R5 * 5) / count($review);
            $roundedAVG = round($AVG, 1);
        @endphp
    @endif

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url('{{ asset('front_end/img/bg-img/24.jpg') }}')">
            >
            <h2>SHOP DETAILS</h2>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('shops') }}">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Shop Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    {{-- @foreach ($product as $item) --}}
    {{-- @dd($product); --}}
    <section class="single_product_details_area mb-50">
        <div class="produts-details--content mb-50">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="product-img" href="{{ asset($product->image1) }} }}"
                                            title="Product Image">
                                            <img class="d-block w-100" src="{{ asset($product->image1) }}" alt="1" />
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="product-img" href="{{ asset($product->image2) }}" title="Product Image">
                                            <img class="d-block w-100" src="{{ asset($product->image2) }}" alt="1" />
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="product-img" href="{{ asset($product->image3) }}" title="Product Image">
                                            <img class="d-block w-100 " src="{{ asset($product->image3) }}"
                                                alt="1" />
                                        </a>
                                    </div>
                                </div>
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0"
                                        style="background-image: url('{{ asset($product->image1) }}')"></li>
                                    <li data-target="#product_details_slider" data-slide-to="1"
                                        style="background-image: url('{{ asset($product->image2) }}')"></li>
                                    <li data-target="#product_details_slider" data-slide-to="2"
                                        style="background-image: url('{{ asset($product->image3) }}')"></li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="single_product_desc">
                            <h4 class="title">{{ $product->productName }}</h4>
                            <h4 class="price">JOD {{ $product->price }}</h4>
                            <div class="short_overview">
                                <p>{{ $product->Ldescription }}</p>

                            </div>

                            <div class="cart--area d-flex flex-wrap align-items-center">
                                <!-- Add to Cart Form -->
                                <form class="cart clearfix d-flex align-items-center"
                                    action="{{ route('cartstoree') }}/{{ $product->id }}" method="get">
                                    @csrf
                                    <div class="quantity">
                                        <a class="qty-minus"
                                            onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i
                                                class="fa fa-minus" aria-hidden="true"></i></a>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1"
                                            max="99" name="quantity" value="1" />
                                        <a class="qty-plus"
                                            onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i
                                                class="fa fa-plus" aria-hidden="true"></i></a>
                                    </div>





                                    <button type="submit" name="addtocart" value="5" class="btn alazea-btn ml-15"
                                        href="{{ route('cartstoree') }}/{{ $product->id }}">
                                        Add to cart
                                    </button>
                                </form>
                                <!-- Wishlist & Compare -->
                                <div class="wishlist-compare d-flex flex-wrap align-items-center">
                                    <a href="{{ route('wishlist.updated') }}/{{ $product->id }}"
                                        class="wishlist-btn ml-15"><i class="icon_heart_alt"></i></a>
                                    <a href="{{ route('shops') }}" class="compare-btn ml-15"><i
                                            class="arrow_left_alt"></i></a>
                                </div>

                                <!-- <select name="" id="">
                                                                            <option value="0">Type of pots</option>
                                                                            <option value="1">plastic</option>
                                                                            <option value="2">
                                                                              <img src="img/bg-img/1.jpg" alt="" srcset="" /> cycle
                                                                            </option>
                                                                          </select> -->
                            </div>

                            <div class="products--meta">
                                <p><span>SKU:</span> <span>CT201807</span></p>
                                <p><span>Category:</span> <span>{{ $selectedCategory->categoryName }}</span></p>


                                <p><span>Tags:</span> <span>plants, green, cactus </span></p>
                                <p>
                                    <span>Share on:</span>
                                    <span>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </span>
                                </p>






                                <p>
                                    <span>Rating:</span>



                                    <span style="color:rgb(56, 239, 40); "><b>
                                            @if (isset($roundedAVG))
                                                {{ $roundedAVG }}
                                                <i class="fa fa-star" style="color: #1dc328;"></i>
                                            @else
                                                NO rating yet
                                            @endif
                                        </b>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @endforeach --}}
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_details_tab clearfix">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs" role="tablist" id="product-details-tab">
                            <li class="nav-item">
                                <a href="#description" class="nav-link active" data-toggle="tab"
                                    role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a href="#addi-info" class="nav-link" data-toggle="tab" role="tab">Additional
                                    Information</a>
                            </li>
                            <li class="nav-item">
                                <a href="#reviews" class="nav-link" data-toggle="tab" role="tab">Reviews <span
                                        class="text-muted">({{ count($review) }}) </span></a>
                            </li>
                        </ul>
                        <!-- Tab Content -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="description">
                                <div class="description_area">
                                    <p>
                                        {{ $product->Sdescription }}
                                    </p>
                                    <p>
                                        {{ $product->Ldescription }}

                                    </p>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="addi-info">
                                <div class="additional_info_area">
                                    <p>
                                        What should I do if I receive a damaged parcel? <br />
                                        <span>If you receive a damaged parcel, document the damage with photos, contact the
                                            carrier to report the issue, and follow their instructions for filing a claim.
                                            Additionally, inform the seller if applicable and retain the original packaging
                                            for inspection.</span>
                                    </p>
                                    <p>
                                        I have received my order but the wrong item was delivered
                                        to me. <br />
                                        <span>Received wrong item. Contact seller promptly, provide details, and follow their instructions for returns or exchanges to get the correct item delivered.</span>
                                    </p>
                                    <p>
                                        Product Receipt and Acceptance Confirmation Process <br />
                                        <span>The product receipt and acceptance confirmation process includes inspecting received items, verifying order accuracy, and confirming acceptance, ensuring accurate inventory and facilitating issue resolution if necessary.</span>
                                    </p>
                                    <p>
                                        How do I cancel my order? <br />
                                        <span>To cancel your order, check the seller's cancellation policy on their website or contact customer support. Follow their instructions, provide necessary details, and adhere to any specified time frames.</span>
                                    </p>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="reviews">

                                <div class="comment_area clearfix">
                                    <h4 class="headline">Comments</h4>
                                    <ol id="commentList">
                                        <!-- Display the first two reviews initially -->
                                        @foreach ($review->take(2) as $reviews)
                                            <li class="single_comment_area">
                                                <div class="comment-wrapper d-flex">
                                                    <!-- Comment Meta -->
                                                    <div class="comment-author">
                                                        <img src="{{ asset($reviews->user->image) }}" alt="" />
                                                    </div>
                                                    <!-- Comment Content -->
                                                    <div class="comment-content">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <h3>{{ $reviews->name }} </h3>
                                                                <strong>for {{ $reviews->reason }}</strong>
                                                            </div>
                                                            <span class="comment-date">{{ $reviews->created_at }}</span>
                                                        </div>
                                                        <p>{{ $reviews->review }}</p>
                                                        <div class="review-rating">
                                                            @for ($i = 0; $i < 5; $i++)
                                                                @if ($reviews->rating > $i)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ol>

                                    <!-- "Show More" button with styling -->
                                    @if ($review->count() > 2)
                                        {{-- <button id="showMoreBtn" onclick="showMoreComments()">Show More</button> --}}
                                        <div class="col-12 text-center">
                                            <a id="showMoreBtn" onclick="showMoreComments()" class="btn alazea-btn">View
                                                All</a>
                                        </div>
                                    @endif
                                </div>

                                <div class="submit_a_review_area mt-50">
                                    <h4>Submit A Review</h4>
                                    @auth
                                        @if ($hasBeenBought)
                                            <form action="{{ route('review', $product->id) }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group d-flex align-items-center">
                                                            <span class="mr-15">Your Ratings:</span>
                                                            <div class="stars">
                                                                <input type="radio" value="1" name="rating"
                                                                    class="star-1" id="star-1" />
                                                                <label class="star-1" for="star-1">1</label>
                                                                <input type="radio" value="2"name="rating"
                                                                    class="star-2" id="star-2" />
                                                                <label class="star-2" for="star-2">2</label>
                                                                <input type="radio" value="3" name="rating"
                                                                    class="star-3" id="star-3" />
                                                                <label class="star-3" for="star-3">3</label>
                                                                <input type="radio" value="4" name="rating"
                                                                    class="star-4" id="star-4" />
                                                                <label class="star-4" for="star-4">4</label>
                                                                <input type="radio" value="5" name="rating"
                                                                    class="star-5" id="star-5" />
                                                                <label class="star-5" for="star-5">5</label>
                                                                <span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input name="name" type="text" class="form-control"
                                                                id="name" placeholder="Nazrul" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="options">Reason for your rating</label>
                                                            <select name="reason" class="form-control" id="options">
                                                                <option value="Quality">Quality</option>
                                                                <option value="Value">Value</option>
                                                                <option value="Design">Design</option>
                                                                <option value="Price">Price</option>
                                                                <option value="Others">Others</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="comments">Comments</label>
                                                            <textarea name="review" class="form-control" id="comments" rows="5" data-max-length="150"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn alazea-btn">
                                                            Submit Your Review
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            <h3>You must purchase this product to leave a review.</h3>
                                        @endif
                                    @else
                                        <h3>If you want to make a review, you must be logged in.</h3>
                                    @endauth

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->

    <!-- ##### Related Product Area Start ##### -->
    <div class="related-products-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Product Area -->
                <div class="portfolio-slides owl-carousel mb-100">

                    @foreach ($reproduct as $reproducts)
                        <div class="single-portfolio-slide">

                            <div class="col-12 col-sm-6 col-lg-8">
                                <div class="single-product-area ">


                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="{{ route('shopdetai', $reproducts->id) }}">
                                            <img style="height: 302.21px !important;"
                                                src="{{ asset($reproducts->image1) }}" alt="image" /></a>
                                        <!-- Product Tag -->
                                        <div class="product-tag">
                                            <a href="#">{{ $reproducts->status }}</a>
                                        </div>

                                        <div class="product-meta d-flex">

                                            <a href="{{ route('WishListStore') }}/{{ $reproducts->id }}"
                                                class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                            <a href="{{ route('cartstor', $reproducts->id) }}"
                                                class="add-to-cart-btn">Add to
                                                cart</a>
                                            <a href="{{ route('shopdetai', $reproducts->id) }}" class="compare-btn"><i
                                                    class="arrow_left-right_alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="shop-details.html">
                                            <p>{{ $reproducts->productName }}</p>
                                        </a>
                                        <h6>{{ $reproducts->price }}</h6>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
    <!-- ##### Related Product Area End ##### -->

    <script>
        function showMoreComments() {
            // Show the hidden reviews
            document.getElementById('commentList').innerHTML += `
            @foreach ($review->slice(2) as $reviews)
                <li class="single_comment_area">
                    <div class="comment-wrapper d-flex">
                        <!-- Comment Meta -->
                        <div class="comment-author">
                            <img src="{{ asset($reviews->user->image) }}" alt="" />
                        </div>
                        <!-- Comment Content -->
                        <div class="comment-content">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h3>{{ $reviews->name }} </h3>
                                    <strong>for {{ $reviews->reason }}</strong>
                                </div>
                                <span class="comment-date">{{ $reviews->created_at }}</span>
                            </div>
                            <p>{{ $reviews->review }}</p>
                            <div class="review-rating">
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($reviews->rating > $i)
                                        <i class="fa fa-star"></i>
                                    @else
                                        <i class="fa fa-star-o"></i>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        `;

            // Hide the "Show More" button if all reviews are displayed
            document.getElementById('showMoreBtn').style.display = 'none';
        }
    </script>
    <!-- ##### Single Product Details Area Start ##### -->
@endsection




{{-- <div class="reviews_area">
                                    <ul>
                                        @foreach ($review as $reviews)
                                            <li>
                                                <div class="single_user_review mb-15">
                                                    <div class="review-rating">
                                                       
                                                        @for ($i = 0; $i < 5; $i++)
                                                            @if ($reviews->rating > $i)
                                                                <i class="fa fa-star"></i>
                                                            @else
                                                                <i class="fa fa-star-o"></i>
                                                            @endif
                                                        @endfor



                                                        <span>for {{ $reviews->reason }}</span>
                                                    </div>
                                                    <h4> "{{ $reviews->review }}"</h4>

                                                    <div class="review-details">
                                                        <p>

                                                            by <a href="#">{{ $reviews->name }}</a> on
                                                            <span>{{ $reviews->created_at }}</span>
                                                        </p>


                                                    </div>
                                                </div>



                                            </li>
                                        @endforeach





                                    </ul>
                                </div> --}}
