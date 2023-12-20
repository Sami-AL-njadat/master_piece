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
            style="background-image: url('{{ asset('front_end/img/bg-img/24.jpg') }}')">
            <h2>Shop</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>

                <div style="padding: 30px 50px 0 0" class="col-6">

                    <div class="single-widget-area">
                        <form action="{{ route('shops', ['id' => $id]) }}" method="get" class="search-form">
                            <input value="{{ $searchTerm }}" type="search" name="search" id="widgetsearch"
                                placeholder="product name...">
                            <button type="submit"><i class="icon_search"></i></button>
                        </form>
                    </div>
                </div>
            </div>


        </div>

    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Shop Area Start ##### -->
    <section class="shop-page section-padding-0-100">
        <div class="container">
            <div class="row">
                <!-- Shop Sorting Data -->
                <div class="col-12">
                    <div class="shop-sorting-data d-flex flex-wrap align-items-center justify-content-between">
                        <!-- Shop Page Count -->
                        <div class="shop-page-count">
                            @if ($id)
                                @foreach ($allcategory as $category)
                                    @if ($category->id == $id)
                                        <p>Showing 1-{{ Request::get('per_page') }} of {{ $category->Products->count() }}
                                            results</p>
                                    @endif
                                @endforeach
                            @else
                                <p>Showing 1-{{ Request::get('per_page') }} of {{ $counts }} results</p>
                            @endif



                        </div>

                        <div class="search_by_terms">



                            <form method="get" action="{{ route('shops', ['id' => $id]) }}" class="form-inline">
                                <label for="sortSelect">Sort by:</label>
                                <select class="custom-select widget-title" name="sort" id="sortSelect"
                                    onchange="this.form.submit()">
                                    <option value="az" {{ Request::get('sort') === 'az' ? 'selected' : '' }}>A - Z
                                    </option>

                                    <option value="za" {{ Request::get('sort') === 'za' ? 'selected' : '' }}>Z - A
                                    </option>
                                    <option value="high_price"
                                        {{ Request::get('sort') === 'high_price' ? 'selected' : '' }}>High Price</option>
                                    <option value="low_price" {{ Request::get('sort') === 'low_price' ? 'selected' : '' }}>
                                        Low Price
                                </select>
                            </form>
                            <!-- Search by Product Name -->


                        </div>


                        <!-- Search by Terms -->
                        <div class="search_by_terms">


                            <form method="get" action="{{ route('shops', ['id' => $id]) }}" class="form-inline">

                                <label for="perPageSelect">Short by Popularity:</label>
                                <select class="custom-select widget-title" name="per_page" id="perPageSelect"
                                    onchange="this.form.submit()">
                                    <option value="6" {{ Request::get('per_page') == '6' ? 'selected' : '' }}>6
                                    </option>
                                    <option value="9" {{ Request::get('per_page') == '9' ? 'selected' : '' }}>9
                                    </option>
                                    <option value="12" {{ Request::get('per_page') == '12' ? 'selected' : '' }}>12
                                    </option>
                                    <option value="18" {{ Request::get('per_page') == '18' ? 'selected' : '' }}>18
                                    </option>

                                </select>
                            </form>
                        </div>


                        {{-- <div class="single-widget-area">
                            <form action="{{ route('shop.search', ['id' => $id]) }}" method="get" class="search-form">
                                <input type="search" name="search" id="widgetsearch" placeholder="Search...">
                                <button type="submit"><i class="icon_search"></i></button>
                            </form>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar Area -->
                <div class="col-12 col-md-4 col-lg-3"
                    style="border-bottom: 1px solid #ebebeb; border-right: 1px solid #ebebeb;">
                    <div class="shop-sidebar-area">
                        <!-- Shop Widget -->
                        <form method="GET" action="{{ route('shop.filterByPrice', ['id' => $id]) }}" id="formeee">
                            <!-- Your other form elements (if any) here -->

                            <div class="shop-widget price ">
                                <h4 class="widget-title">Prices</h4>
                                <p> <b style="color: red">NOTE</b> <b>THAT :
                                        "We Proudly Present Our Products to You, as Our Prices Range from <b
                                            style="color: #70c745"> $ {{ $minPrices }}</b> To <b style="color: #70c745">
                                            $
                                            {{ $maxPrices }}</b> per Unit."</b></p>


                                <div class="widget-desc">
                                    <div class="slider-range">
                                        <div data-min="0" data-max="100" data-unit="$"
                                            class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                            data-value-min="0" data-value-max="100" data-label-result="Price:">

                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all "
                                                tabindex="0"></span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all"
                                                tabindex="0"></span>
                                        </div>
                                        <div class="range-price">Price: $ 0- $ 100</div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class=" btn alazea-btn active btn-ls mt-2 mb-2">Filter</button>

                            <!-- Add hidden input fields to capture price range -->

                            <input type="hidden" name="min_price" id="min_price" value="{{ $minPrice }}">
                            <input type="hidden" name="max_price" id="max_price" value="{{ $maxPrice }}">

                        </form>

                        <!-- Shop Widget -->
                        <div class="shop-widget catagory  mt-5 mb-5">
                            <h4 class="widget-title">Categories</h4>
                            <div class="widget-desc">

                                <div class="custom-control custom-control d-flex align-items-start p-0 mb-2">


                                    <a href="{{ route('shops') }}" class="btn alazea-btn ">
                                        All <span class="badge badge-success">{{ $counts }}</span>
                                    </a>

                                </div>


                                @foreach ($allcategory as $items)
                                    <div class="custom-control d-flex align-items-start p-0  mb-2 ">



                                        <a href="{{ route('shops', ['id' => $items->id]) }}" style="padding: 0 7px;"
                                            class="btn alazea-btn  ">
                                            {{ $items->categoryName }} <span class="badge badge-success">
                                                {{ $items->Products->count() }}</span>
                                        </a>


                                    </div>
                                @endforeach




                            </div>
                        </div>





                        <!-- Shop Widget -->
                        {{-- <div class="shop-widget sort-by mb-50">
                            <h4 class="widget-title">Sort by</h4>
                            <div class="widget-desc">
                                 
                               
                            </div>
                        </div> --}}

                        <!-- Shop Widget -->
                        <div class="shop-widget best-seller mt-5 mb-5">
                            <h4 class="widget-title">NEW</h4>
                            <div class="widget-desc">
                                <!-- Single Best Seller Products -->
                                @isset($newproducts)
                                    @foreach ($newproducts as $new)
                                        <div class="single-best-seller-product d-flex align-items-center">
                                            <div class="product-thumbnail">
                                                <a href="{{ route('shopdetai') }}/{{ $new->id }}"><img
                                                        src="{{ asset($new->image1) }}" alt="" /></a>
                                            </div>
                                            <div class="product-info">
                                                <a
                                                    href="{{ route('shopdetai') }}/{{ $new->id }}">{{ $new->productName }}</a>
                                                <p>${{ $new->price }}</p>
                                                {{-- <div class="ratings">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div> --}}
                                            </div>
                                        </div>
                                    @endforeach
                                @endisset


                            </div>
                        </div>
                    </div>
                </div>

                <!-- All Products Area -->
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop-products-area">
                        <div class="row">
                            <!-- Single Product Area -->

                            <!-- Single Product Area -->

                            @foreach ($product as $allproduct)
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="single-product-area mb-50">
                                        <!-- Product Image -->
                                        <div class="product-img">
                                            <a href="{{ route('shopdetai') }}/{{ $allproduct->id }}">
                                                <img style="height: 302.21px !important; "
                                                    src={{ asset($allproduct->image1) }} alt="" /></a>
                                            <div class="product-tag">
                                                @if ($allproduct->status > 0)
                                                    <a href="#">{{ $allproduct->status }}</a>
                                                @endif
                                            </div>
                                            <div class="product-meta d-flex">
                                                <a href="{{ route('WishListStore', ['id' => $allproduct->id]) }}"
                                                    class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                                <a href="{{ route('cartstor') }}/{{ $allproduct->id }}"
                                                    class="add-to-cart-btn">Add to cart</a>
                                                <a title="more"
                                                    href="{{ route('shopdetai', ['id' => $allproduct->id]) }}"
                                                    class="compare-btn"><i title="more"
                                                        class="arrow_left-right_alt"></i></a>
                                            </div>

                                        </div>

                                        <!-- Product Info -->
                                        <div class="product-info mt-15 text-center">

                                            <a href="shop-details.html">
                                                <p>{{ $allproduct->productName }}</p>
                                            </a>
                                            <h6>$ {{ $allproduct->price }}</h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <!-- Pagination -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                {{ $product->links() }}

                            </ul>
                        </nav>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Area End ##### -->
    <script>
        $(document).ready(function() {
            $('#searchForm').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    type: 'GET',
                    url: $(this).attr('action'),
                    data: formData,
                    success: function(response) {
                        $('#searchResults').html(response);
                    }
                });
            });
        });
    </script>
    <!-- ##### Footer Area Start ##### -->
@endsection
