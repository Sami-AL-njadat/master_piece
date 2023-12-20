 @extends('layout.master')

 @section('content')
     <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="{{ asset('front_end/img/core-img/pls.jpeg') }}" alt="" />
        </div>
    </div>
     <div class="breadcrumb-area">
         <!-- Top Breadcrumb Area -->
         <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
             style="background-image: url('{{ asset('front_end/img/bg-img/24.jpg') }}')">
             <h2>My Account</h2>
         </div>
         <div class="container">
             <div class="row">
                 <div class="col-12">
                     <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                             </li>
                             <li class="breadcrumb-item active" aria-current="page">My Accounts</li>
                         </ol>
                     </nav>
                 </div>
             </div>
             <!-- Begin Uren's Page Content Area -->
             <main class="page-content">
                 <!-- Begin Uren's Account Page Area -->
                 <div class="account-page-area">
                     <div class="container-fluid">
                         <div class="row">
                             <div class="col-lg-3">
                                 <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                                     <li class="nav-item">
                                         <a class="nav-link active" id="account-dashboard-tab" data-toggle="tab"
                                             href="#account-dashboard" role="tab" aria-controls="account-dashboard"
                                             aria-selected="true">Dashboard</a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link" id="account-orders-tab" data-toggle="tab"
                                             href="#account-orders" role="tab" aria-controls="account-orders"
                                             aria-selected="false">Orders</a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link" id="account-address-tab" data-toggle="tab"
                                             href="#account-address" role="tab" aria-controls="account-address"
                                             aria-selected="false">Addresses</a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link" id="account-details-tab" data-toggle="tab"
                                             href="#account-details" role="tab" aria-controls="account-details"
                                             aria-selected="false">Account Details</a>
                                     </li>


                                     <li class="nav-item">
                                         <a class="nav-link" id="account-delete-tab" data-toggle="tab"
                                             href="#account-delete" role="tab" aria-controls="account-delete"
                                             aria-selected="false"> Delete Account </a>
                                     </li>

                                     {{-- start of logout --}}

                                     <li class="nav-item">
                                         <!-- <a class="nav-link" id="account-logout-tab" href="login-register.html" role="tab" aria-selected="false">Logout</a> -->
                                         {{-- <button type="submit" href="login-register.html"
                                    class="btn alazea-btn btn-success mt-15"
                                    style="margin-top: 10px; border:1px solid lawngreen;">Logout</button> --}}
                                         <form style="display: inline-block" method="POST" class="nav-item"
                                             action="{{ route('logout') }}">
                                             @csrf
                                     <li>
                                         <button class="btn alazea-btn btn-success mt-15"
                                             style="margin-top: 10px; border:1px solid lawngreen;"
                                             href="{{ route('logout') }}"
                                             onclick="event.preventDefault();this.closest('form').submit();">
                                             {{ __('Log Out') }}
                                         </button>
                                     </li>
                                     </form>
                                     </li>
                                     {{-- end of logout --}}


                                 </ul>
                             </div>
                             <div class="col-lg-9">
                                 <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                                     <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel"
                                         aria-labelledby="account-dashboard-tab">
                                         <div class="myaccount-dashboard col-12 ">
                                             <h3>DASHBOARD</h3>

                                             @php
                                                 $user = auth()->user();
                                             @endphp
                                             <div class="card-body media align-items-center ">
                                                 @if (Auth::user()->image)
                                                     <img src="{{ asset('' . Auth::user()->image) }}"
                                                         style=" ; padding:10px ;width:150px" alt=""
                                                         class="d-block ui-w-80">
                                                 @else
                                                     <img src="{{ url('front_end/no-category-image.jpg') }}"
                                                         style="height: 200px;  " alt="" class="d-block ui-w-80 ">
                                                 @endif
                                                 <div>
                                                     <strong>Hello <b> {{ Auth::user()->name }} </b></strong>
                                                     <strong><span
                                                             style="color: greenyellow">{{ Auth::user()->email }}</span></strong>

                                                     <p>From your account dashboard you can view your recent orders, and
                                                         billing addresses and <a href="javascript:void(0)">edit your
                                                             password and
                                                             account details</a>.</p>
                                                 </div>
                                             </div>


                                         </div>
                                     </div>


                                     {{-- start form of order  --}}

                                     <div class="tab-pane fade" id="account-orders" role="tabpanel"
                                         aria-labelledby="account-orders-tab">
                                         <div class="myaccount-orders">
                                             <h4 class="small-title">MY ORDERS</h4>
                                             <div class="table-responsive">
                                                 <table class="table table-bordered table-hover">
                                                     <thead class="thead-dark">
                                                         <tr>
                                                             <th>Order ID</th>
                                                             <th>Date</th>
                                                             <th>Total Price</th>
                                                             <th>Details</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>

                                                         @php $No = 0; @endphp
                                                         @foreach ($orders as $item)
                                                             @php $No++; @endphp
                                                             <tr style="background-color:#000000c4; color:white">
                                                                 <td>{{ $No }}</td>
                                                                 <td>{{ $item->created_at }}</td>
                                                                 <td>{{ $item->totalPrice }}</td>
                                                                 <td>
                                                                     <button class="btn alazea-btn active view-details-btn"
                                                                         data-order-id="{{ $item->id }}">View
                                                                         Details</button>
                                                                 </td>
                                                             </tr>
                                                             <tr class="order-items-row"
                                                                 id="order-items-{{ $item->id }}"
                                                                 style="display: none;">
                                                                 <td colspan="4">
                                                                     <table class="table table-bordered">
                                                                         <thead class="thead-info"
                                                                             style="background-color:#70c745; color:white">
                                                                             <tr>


                                                                                 <th>Product Image</th>
                                                                                 <th>Product Name</th>
                                                                                 <th>Price</th>
                                                                                 <th>Quantity</th>
                                                                             </tr>
                                                                         </thead>
                                                                         <tbody>
                                                                             @foreach ($item->orderItems as $items)
                                                                                 <tr>
                                                                                     <td>
                                                                                         @if (isset($items->product))
                                                                                             <img src="{{ asset($items->product->image1) }}"
                                                                                                 alt=""
                                                                                                 style="width:80px">
                                                                                         @else
                                                                                             <!-- Provide a default image or handle the case where the product is not set -->
                                                                                             <img src="{{ url('front_end/no-category-image.jpg') }}"
                                                                                                 alt="Default Image"
                                                                                                 style="width:80px">
                                                                                         @endif
                                                                                     </td>
                                                                                     <td>
                                                                                         @if (isset($items->product))
                                                                                             {{ $items->product->productName }}
                                                                                         @else
                                                                                             PRODUCT REMOVE
                                                                                         @endif
                                                                                     </td>
                                                                                     <td>
                                                                                         @if (isset($items->product))
                                                                                             {{ $items->product->price }}
                                                                                         @else
                                                                                             PRICE REMOVE
                                                                                         @endif
                                                                                     </td>
                                                                                     <td>{{ $items->quantity }}
                                                                                     </td>
                                                                                 </tr>
                                                                             @endforeach

                                                                         </tbody>
                                                                     </table>
                                                                 </td>
                                                             </tr>
                                                         @endforeach
                                                     </tbody>
                                                 </table>
                                                 <script>
                                                     // Add JavaScript to handle the "View Details" button click event
                                                     document.addEventListener("DOMContentLoaded", function() {
                                                         const viewDetailsButtons = document.querySelectorAll(".view-details-btn");

                                                         viewDetailsButtons.forEach(button => {
                                                             button.addEventListener("click", function() {
                                                                 const orderId = this.getAttribute("data-order-id");
                                                                 const orderItemsRow = document.getElementById("order-items-" + orderId);

                                                                 if (orderItemsRow) {
                                                                     if (orderItemsRow.style.display === "none") {
                                                                         orderItemsRow.style.display = "table-row";
                                                                     } else {
                                                                         orderItemsRow.style.display = "none";
                                                                     }
                                                                 }
                                                             });
                                                         });
                                                     });
                                                 </script>
                                             </div>
                                         </div>
                                     </div>
 

                                     <div class="tab-pane fade" id="account-address" role="tabpanel"
                                         aria-labelledby="account-address-tab">
                                         <div class="myaccount-address">
                                             <h3>YOUR ADDERSS</h3>

                                             <p>The following addresses will be used on the checkout page by default.</p>
                                             <div class="row">
                                                 <table class="table table-bordered">
                                                     <thead style="text-align: center" class="thead-dark">
                                                         <tr>
                                                             <th>Address</th>
                                                             <th>City</th>
                                                             <th>Company</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody style="text-align: center">
                                                         @foreach ($address as $addres)
                                                             <tr>
                                                                 <td>{{ $addres->address }}</td>
                                                                 <td>{{ $addres->city }}</td>
                                                                 <td>{{ $addres->company }}</td>
                                                             </tr>
                                                         @endforeach
                                                     </tbody>
                                                 </table>

                                             </div>
                                         </div>
                                     </div>

                                     {{-- end form of address  --}}

                                     <div class="tab-pane fade " id="account-details" role="tabpanel"
                                         aria-labelledby="account-details-tab">
                                         {{-- start form of email and pssword --}}

                                         <div class="myaccount-details mt-3">

                                             <form method="post" action="{{ route('profile.update') }}"
                                                 enctype="multipart/form-data" class="uren-form">
                                                 @csrf
                                                 @method('PUT')
                                                 <h3>CHANGE PROFILE INFORMATION</h3>

                                                 <div class="uren-form-inner">


                                                     <div class="media-body mt-3">
                                                         @if (Auth::user()->image)
                                                             <img id="showImage"
                                                                 src="{{ asset('' . Auth::user()->image) }}"
                                                                 style="height: 200px;  " alt=""
                                                                 class="d-block ui-w-80 ">
                                                         @else
                                                             <img src="{{ url('front_end/no-category-image.jpg') }}"
                                                                 style="height: 200px;  " alt=""
                                                                 class="d-block ui-w-80 ">
                                                         @endif
                                                         <x-text-input id="image" name="image" type="file"
                                                             class="account-settings-fileinput" :value="old('image', $user->image)" autofocus
                                                             autocomplete="name" />
                                                     </div>



                                                     <div class="single-input">
                                                         <label for="account-details-firstname">Full Name*</label>
                                                         <input type="text" id="account-details-firstname"
                                                             name="name" value="{{ Auth::user()->name }}">
                                                     </div>

                                                     <div class="single-input">
                                                         <label for="account-details-email">Email*</label>
                                                         <input type="email" id="account-details-email"
                                                             value="{{ Auth::user()->email }}">
                                                     </div>


                                                     <button class="btn alazea-btn  mt-5">{{ __('SUBMIT') }}</button>

                                                     {{-- @if (session('status') === 'profile-updated')
                                                         <p x-data="{ show: true }" x-show="show" x-transition
                                                             x-init="setTimeout(() => show = false, 2000)"
                                                             class="text-sm text-gray-600 dark:text-gray-400">
                                                             {{ __('Saved.') }}</p>
                                                     @endif --}}


                                                 </div>
                                             </form>
                                         </div>

                                         <div class="myaccount-details mt-3">




                                             <form action="{{ route('password.updated') }}" method="post"
                                                 class="uren-form">
                                                 @csrf
                                                 @method('put')
                                                 <div class="uren-form-inner">
                                                     <h3>CHANGE PASSWORD</h3>



                                                     <div class="single-input">
                                                         <x-input-label for="current_password" :value="__('Current Password')" />
                                                         <x-text-input id="current_password" name="current_password"
                                                             type="password" autocomplete="current-password" />
                                                         <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                                     </div>

                                                     <div class="single-input">
                                                         <x-input-label for="password" :value="__('New Password')" />
                                                         <x-text-input id="password" name="password" type="password"
                                                             autocomplete="new-password" />
                                                         <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                                     </div>


                                                     <div class="single-input">
                                                         <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                                         <x-text-input id="password_confirmation"
                                                             name="password_confirmation" type="password"
                                                             autocomplete="new-password" />
                                                         <x-input-error :messages="$errors->updatePassword->get(
                                                             'password_confirmation',
                                                         )" class="mt-2" />
                                                     </div>


                                                     <div class="single-input">
                                                         <button class="btn alazea-btn  mt-15"
                                                             type="submit"><span>SUBMIT</span></button>
                                                     </div>


                                                     {{-- @if (session('status') === 'password-updated')
                                                         <p x-data="{ show: true }" x-show="show" x-transition
                                                             x-init="setTimeout(() => show = false, 2000)"
                                                             class="text-sm text-gray-600 dark:text-gray-400">
                                                             {{ __('Saved.') }}</p>
                                                     @endif --}}
                                                 </div>
                                             </form>
                                         </div>

                                         {{-- end form of email and pssword --}}


                                         {{-- //////////////////////s --}}
                                     </div>


                                     <div class="tab-pane fade" id="account-delete" role="tabpanel"
                                         aria-labelledby="account-delete-tab">
                                         <div class="myaccount-delete">
                                             <div class="container">
                                                 <h3>DELETE ACCOUNT </h3>

                                                 <p class="text-danger mt-3">
                                                     Please enter your current password to delete your account. We're sad to
                                                     see you go, and we'd like to know the reason for your departure.
                                                 </p>
                                                 <form method="POST" action="{{ route('profile.destroyAccount') }}">
                                                     @csrf
                                                     @method('DELETE')
                                                     <div class="form-group">
                                                         <label for="password">Current Password:</label>
                                                         <input type="password" name="password" id="password"
                                                             class="form-control" required>
                                                     </div>
                                                     <button type="submit" class="btn btn-danger">Delete Account</button>
                                                 </form>

                                             </div>
                                         </div>

                                     </div>




                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Uren's Account Page Area End Here -->
             </main>




         </div>
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
         <script>
             $(document).ready(function() {
                 $('#image').change(function(e) {
                     var reader = new FileReader();
                     reader.onload = function(e) {
                         $('#showImage').attr('src', e.target.result);
                     }
                     reader.readAsDataURL(e.target.files[0]);
                 })
             });
         </script>

     </div>
 @endsection
