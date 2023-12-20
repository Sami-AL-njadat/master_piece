@extends('layout.master')
@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div   style="background-color:rgb(241, 241, 241)" class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url('{{ asset('front_end/img/bg-img/3.jpg') }}')">

            <h2>Wishlist</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ ('/') }}"><i class="fa fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### wish list Area Start ##### -->
    @if (empty($products) || count($products) === 0)
        <h1 style="margin-left:35%; height: 250px;">No items in the wishlist</h1>
    @else
        <div  style="background-color:rgb(241, 241, 241)" class="cart-area section-padding-0-100 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="cart-table clearfix">
                            <table class="table table-responsive gray">
                                <thead>
                                    <tr>
                                        <th>Products</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Add to Cart</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp

                                    @foreach ($products as $item)
                                        <tr>
                                            <td class="cart_product_img">
                                                <a href="#"><img src="{{ asset($item['image']) }}"
                                                        alt="Product" /></a>
                                                <h5></h5>
                                            </td>
                                            <td class="name"><span>{{ $item['productName'] }}</span></td>
                                            <td class="price"><span>{{ $item['price'] }}</span></td>
                                            <td class="action">
                                                <a href="{{ route('cartstor') }}/{{ $item['id'] }}"><i style="color: #70c745; ;" class="icon_plus icon-ccl"></i></a>
                                            </td>
                                            <td class="action">
                                                <a href="{{ route('wishlist.destroy') }}/{{ $item['id'] }}"><i
                                                        class="icon_close"></i></a>
                                            </td>
                                        </tr>
                                        @php
                                            $total += $item['price'];
                                        @endphp
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Cart Totals -->
                    <div class="col-12 col-lg-6">
                        <div class="cart-totals-area mt-70">
                            <h2 class="title--"> Total</h2>
                                <h5 style="color:" class="title-- mt-4">After Selecting The Product,<span style="color: red">Go To The Shopping Cart </span> <span style="color:rgb(62, 58, 58)">And Complete The Purchase</span></h5>

                                
                            <div class="total d-flex justify-content-between">
                                <h5>Total</h5>
                                <span> ${{ $total }} </span>
                            </div>
                            <div class="checkout-btn">
                                <a href="{{route  ( 'cart.index' ) }}" class="btn alazea-btn w-100">GO To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- ##### wishlist Area End ##### -->
@endsection
