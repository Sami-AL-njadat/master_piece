 <div class="main-sidebar sidebar-style-2">
     <aside id="sidebar-wrapper">
         <div class="sidebar-brand mt-2">
             <img style="width: 80px; border-radius: 50%;  margin: auto;"
                 src="{{ asset('front_end/img/core-img/mashtal.jpg') }}" alt="logo">
         </div>
         <div class="sidebar-brand sidebar-brand-sm">
             <a href="{{ route('admin.dashboard') }}">M$tl</a>
         </div>

         <ul class="sidebar-menu mt-4">

             <li class="">
                 <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                         class="fas fa-fire"></i><span>Dashboard</span></a>
             </li>




             <li class=""><a class="nav-link" href="{{ route('indexxxs') }}"><i class="fas fa-vector-square"></i>
                     <span>Categories</span></a></li>
             <li class=""><a class="nav-link" href="{{ route('product.index') }}"><i
                         class="fas fa-hand-holding"></i> <span>Product</span></a></li>
             <li class=""><a class="nav-link" href="{{ route('admins.index') }}"><i class="fas fa-user-tie"></i>
                     <span>Admins</span></a></li>
             <li class=""><a class="nav-link" href="{{ route('message.index') }}"><i class="fas fa-envelope"></i>
                     <span>Messages</span></a></li>
             <li class=""><a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-users"></i>
                     <span>Users</span></a></li>
             <li class=""><a class="nav-link" href="{{ route('coupons.index') }}"> <i class="fas fa-tag"></i>
                     <span>Coupons</span></a></li>
             <li class=""><a class="nav-link" href="{{ route('review.index') }}"> <i class="fas fa-heart"></i>
                     <span>Review</span></a></li>
             <li class=""><a class="nav-link" href="{{ route('orders.index') }}"> <i class="fas fa-box"></i>
                     <span>Orders</span></a></li>
             <li class=""><a class="nav-link" href="{{ route('event.index') }}"> <i class="fas fa-box"></i>
                     <span>Events Type</span></a></li>
 

                       <li class=""><a class="nav-link" href="{{ route('eventes.index') }}"> <i class="fas fa-star"></i>
                     <span>Event</span></a></li>

         </ul>







         <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
             <a href=" {{ route('logoutprocess') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                 <i class="fas fa-rocket"></i> LOGOUT


             </a>
         </div>
     </aside>
 </div>
