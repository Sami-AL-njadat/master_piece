@extends('layout.master')
@section('content')

    @php
        $subtotal = 0;
        if (session()->has('discounts') && session()->get('discounts') != null) {
            $codedd = session('discounts');
        }
    @endphp
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
            style="background-image: url('{{ asset('front_end/img/bg-img/25.jpg') }}')">
            <h2>Checkout</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area mb-100">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-7">
                    <div class="checkout_details_area clearfix">
                        <h5>Billing Details</h5>
                        <form action="{{ route('store-shipment') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <label for="first_name">Full Name *</label>
                                    <input type="text" class="form-control" name="name" id="first_name"
                                        value=" {{ Auth::user()->name }}">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address *</label>
                                    <input type="email" name="email" class="form-control" id="email_address"
                                        value="{{ Auth::user()->email }}">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="phone_number">Phone Number *</label>
                                    <input type="number" name="phone" class="form-control" id="phone_number"
                                        min="0" value="{{ Auth::user()->phone }}">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="company">Company Name</label>
                                    <input type="text" class="form-control" id="company" value="" name="company">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="address">Address *</label>
                                    <input name="address" type="text" class="form-control" id="address"
                                        value="{{ optional(Auth::user()->address->first())->address }}">
                                </div>

                                <div class="col-md-12 mb-4">
                                    <label for="city">Town/City *</label>
                                    <select id="citySelect" class="custom-select" onchange="submitForm()">
                                        <option selected disabled>CITY</option>
                                        <option value="AJLOUN">AJLOUN</option>
                                        <option value="AMMAN">AMMAN</option>
                                        <option value="JARASH">JARASH</option>
                                        <option value="IRBID">IRBID</option>
                                    </select>
                                    <input hidden id="cityInput" name="city" type="text" class="form-control">

                                </div>

                                {{-- 
                                <div class="col-md-12 mb-4">
                                    <form id="shippingForm" action="{{ route('store-shipment') }}" method="post">
                                        @csrf
                                        <select id="citySelect" class="custom-select" onchange="submitForm()">
                                            <option selected>CITY</option>
                                            <option value="AJLOUN">AJLOUN</option>
                                            <option value="AMMAN">AMMAN</option>
                                            <option value="JARASH">JARASH</option>
                                            <option value="IRBID">IRBID</option>
                                        </select>
                                    </form>
                                </div> --}}
                            </div>

                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="checkout-content">
                        <h5 class="title--">Your Order</h5>
                        <div class="products">
                            <div class="products-data">
                                <h5>Products:</h5>
                                <div class="single-products">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Qut</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cartitem as $items)
                                                <tr>
                                                    <td>{{ $items->productName }}</td>
                                                    <td>
                                                        <h5>{{ $items->price }}</h5>
                                                    </td>
                                                    <td>
                                                        <h5>{{ $items->quantity }}</h5>
                                                    </td>
                                                </tr>



                                                @php
                                                    $subtotal += $items['price'] * $items['quantity'];

                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="subtotal d-flex justify-content-between align-items-center">
                            <h5>Subtotal</h5>
                            <h5>${{ $subtotal }}</h5>
                        </div>
                        {{-- <div class="shipping d-flex justify-content-between align-items-center">
                            <h5>COUPON</h5>
                            @if (session()->has('discounts') && session()->get('discounts') != null)
                                <h5>%{{ $codedd }}</h5>
                            @else
                                <h5>$ 0</h5>
                            @endif
                        </div> --}}


                        <!-- ... (other code) ... -->



                        <!-- ... (other code) ... -->

                        <div class="shipping d-flex justify-content-between align-items-center">
                            <h5>COUPON { x } </h5>
                            @if ($cartitem->isNotEmpty() && $cartitem[0]->coupon)
                                <h5>%{{ $cartitem[0]->coupon->discount }}</h5>
                            @else
                                <h5>$ 0</h5>
                            @endif
                        </div>

                        <!-- ... (other code) ... -->




                        <div class="shipping d-flex justify-content-between align-items-center">
                            <h5>Shipping { + }</h5>
                            <h5 id="shipmentCost">$0.00</h5>
                            <input hidden id="shipmentCostInput" name="ship" type="text" class="form-control">

                        </div>
                        {{-- <div class="col-md-6 mb-4">
                                    <form id="shippingForm" action="{{ route('store-shipment') }}" method="post">
                                        @csrf
                                        <select id="citySelect" class="custom-select" onchange="submitForm()">
                                            <option selected>CITY</option>
                                            <option value="AJLOUN">AJLOUN</option>
                                            <option value="AMMAN">AMMAN</option>
                                            <option value="JARASH">JARASH</option>
                                            <option value="IRBID">IRBID</option>
                                        </select>
                                    </form>
                                </div> --}}


                        <div class="order-total d-flex justify-content-between align-items-center">
                            <h5>Order Total = </h5>
                            @php
                                $discount = 0;
                                if ($cartitem->isNotEmpty() && $cartitem[0]->coupon) {
                                    $discount = $cartitem[0]->coupon->discount;
                                }
                                $discountAmount = ($subtotal * $discount) / 100;
                                $total = $subtotal - $discountAmount;
                            @endphp

                            <h5 id="total">${{ number_format($total, 2) }}</h5>
                            <input hidden id="totalInput" name="total" type="text" class="form-control"
                                value="{{ number_format($total, 2) }}">

                        </div>












                        {{-- <div class="order-total d-flex justify-content-between align-items-center">
                            <h5>Order Total = </h5>
                            <h5>$ @if (session()->has('discounts') && session()->get('discounts') != null)
                                    {{ $subtotal - ($subtotal * $codedd) / 100 }}
                                    @else{{ $subtotal }}
                                @endif
                            </h5>
                            <input hidden name="total" type="text" class="form-control" id="city"
                                value="@if (session()->has('discounts') && session()->get('discounts') != null) {{ $subtotal - ($subtotal * $codedd) / 100 }}
                                    @else{{ $subtotal }} @endif">
                        </div> --}}
                        <div class="checkout-btn mt-30">
                            <input type="submit" name="paypal" class="btn alazea-btn w-100" value="paypal">
                        </div>
                        <div class="checkout-btn mt-30">
                            <input type="submit" name="cash" class="btn alazea-btn w-100" value="cash on delivary">
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            let form = document.querySelector('#shippingForm');

            function submitForm() {
                if (form) {
                    form.submit();
                }
            }
        });
    </script> --}}
 <script>
    var previousShipmentCost = 0;

    function submitForm() {
        var selectedCity = $('#citySelect').val();

        if (selectedCity !== 'CITY') {
            $.ajax({
                url: '/get-shipment-cost/' + selectedCity,
                type: 'GET',
                success: function(response) {
                    if (response.shipment_cost) {
                        // Subtract the previous shipment cost from the total
                        var currentTotal = parseFloat($('#totalInput').val());
                        var newTotal = currentTotal - previousShipmentCost;

                        // Update the shipment cost on the page
                        var shipmentCost = response.shipment_cost.toFixed(2);
                        $('#shipmentCost').text('Shipment Cost: $' + shipmentCost);

                        // Update the hidden input value
                        $('#shipmentCostInput').val(shipmentCost);

                        // Add the new shipment cost to the total
                        newTotal += parseFloat(shipmentCost);

                        // Update the total value
                        $('#total').text('$' + newTotal.toFixed(2));
                        $('#totalInput').val(newTotal.toFixed(2));

                        // Include the selected city in the form data
                        $('#cityInput').val(selectedCity);

                        // Update the previous shipment cost
                        previousShipmentCost = parseFloat(shipmentCost);
                    } else {
                        console.error('Error: ' + response.error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Ajax request failed: ' + status + ', ' + error);
                }
            });
        }
    }
</script>

@endsection
