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

            <h2>Cart</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Cart Area Start ##### -->
    @if (empty($products) || count($products) === 0)
        <h1 style="margin-left:35%; height: 250px;">No items in the cart</h1>
    @else
        <div class="cart-area section-padding-0-100 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Products</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>TOTAL</th>
                                        <th>Delete</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @dd($products)   --}}
                                    @php
                                        $subtotal = 0;

                                    @endphp


                                    @php

                                        if (session()->has('discounts') && session()->get('discounts') != null) {
                                            $codedd = session('discounts');
                                        }

                                    @endphp



                                    @foreach ($products as $product)
                                        <tr>


                                            @php
                                                $subtotal += $product['price'] * $product['quantity'];

                                            @endphp



                                            <td class="cart_product_img">
                                                <a href="#"><img src="{{ asset($product['image']) }}"
                                                        alt="Product" /></a>
                                                <h5>{{ $product['productname'] }}</h5>
                                            </td>
                                            <td class="qty">
                                                <div class="quantity">

                                                    <a href={{ route('cart.remove', ['id' => $product['id']]) }}
                                                        class="qty-minus"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                                    <input class="qty-text" id="qty" step="1" min="1"
                                                        max="99" name="quantity" value="{{ $product['quantity'] }}">
                                                    <a href="{{ route('cart.add', ['id' => $product['id']]) }}"
                                                        class="qty-plus"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                                </div>
                                            </td>
                                            <td class="price"><span>{{ $product['price'] }}</span></td>
                                            <td class="total_price">
                                                <span>{{ $product['price'] * $product['quantity'] }}</span>
                                            </td>
                                            <td class="action">
                                                <a href="{{ route('cart.destroy', ['id' => $product['id']]) }}"><i
                                                        class="icon_close"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Coupon Discount -->
                    <div class="col-12 col-lg-6">
                        <div class="coupon-discount mt-70">
                            <h5>COUPON DISCOUNT</h5>
                            <p>
                                Coupons can be applied in the cart prior to checkout. Add an
                                eligible item from the booth of the seller that created the
                                coupon code to your cart. Click the green "Apply code" button to
                                add the coupon to your order. The order total will update to
                                indicate the savings specific to the coupon code entered.
                            </p>
                            <form action="{{ route('coupon') }}" method="post">
                                @csrf
                                <input type="text" name="code" placeholder="Enter your coupon code" />
                                <button type="submit">APPLY COUPON</button>
                            </form>

     
                        </div>
                    </div>

                    <!-- Cart Totals -->
                    <div class="col-12 col-lg-6">
                        <div class="cart-totals-area mt-70">
                            <h5 class="title--">Cart Total</h5>
                            <div class="subtotal d-flex justify-content-between">
                                <h5>Subtotal</h5>
                                <h5>$ {{ $subtotal }}</h5>
                            </div>

                            <div class="subtotal d-flex justify-content-between">
                                <h5>COUPON </h5>
                                @if (session()->has('discounts') && session()->get('discounts') != null)
                                    <h5>%{{ $codedd }}</h5>
                                @else
                                    <h5>$ 0</h5>
                                @endif



                            </div>
                   
                            


                            <h5>Total</h5>
                            <h5>jod
                                @if (session()->has('discounts') && session()->get('discounts') != null)
                                    {{number_format($subtotal - ($subtotal * $codedd) / 100,2) }}
                                    @else{{ $subtotal }}
                                @endif
                            </h5>
                        </div>
                        <div class="checkout-btn">
                            <a href="{{ 'checkout' }}" class="btn alazea-btn w-100">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endif

    <!-- ##### Cart Area End ##### -->
@endsection
