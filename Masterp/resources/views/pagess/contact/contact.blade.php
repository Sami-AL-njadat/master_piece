 @extends('layout.master')
 @section('content')
     <!-- ##### Breadcrumb Area Start ##### -->
     <div class="breadcrumb-area">
         <!-- Top Breadcrumb Area -->
         <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
             style="background-image: url('{{ asset('front_end/img/bg-img/24.jpg') }}')">
             <h2>Contact US</h2>
         </div>

         <div class="container">
             <div class="row">
                 <div class="col-12">
                     <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                             <li class="breadcrumb-item active" aria-current="page">Contact</li>
                         </ol>
                     </nav>
                 </div>
             </div>
         </div>
     </div>
     {{-- @if (session('success'))
         <div class="alert alert-success">
             {{ session('success') }}
         </div>
     @endif --}}
     <!-- ##### Breadcrumb Area End ##### -->

     <!-- ##### Contact Area Info Start ##### -->
     <div class="contact-area-info section-padding-0-100">
         <div class="container">
             <div class="row align-items-center justify-content-between">
                 <!-- Contact Thumbnail -->
                 <div class="col-12 col-md-6">
                     <div class="contact--thumbnail">
                         <img src="{{ asset('front_end/img/bg-img/contact-us-2400x1320.jpg') }}" alt="">
                     </div>
                 </div>

                 <div class="col-12 col-md-5">
                     <!-- Section Heading -->
                     <div class="section-heading">
                         <h2>CONTACT US</h2>
                         <p>We are improving our services to serve you better.</p>
                     </div>
                     <!-- Contact Information -->
                     <div class="contact-information">
                         <p><span>Address:</span> st.Ajloun Castle, Ajloun City</p>
                         <p><span>Phone:</span> +962 777 415 591</p>
                         <p><span>Email:</span> Mashtal.online@gmail.com</p>
                         <p><span>Open hours:</span> Sun - Thu: 8 AM to 9 PM</p>
                         <p><span>Happy days:</span> Wen: 2 PM to 4 PM 4th/Oct </p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- ##### Contact Area Info End ##### -->

     <!-- ##### Contact Area Start ##### -->
     <section class="contact-area">
         <div class="container">
             <div class="row align-items-center justify-content-between">
                 <div class="col-12 col-lg-5">
                     <!-- Section Heading -->
                     <div class="section-heading">
                         <h2>GET IN TOUCH</h2>
                         <p>Send us a message, we will call back later</p>
                     </div>


                     <!-- Contact Form Area -->
                     <div class="contact-form-area mb-100">
                         <form action="{{ route('store.contact') }}" method="post">
                             @csrf
                             <div class="row">
                                 <div class="col-12 col-md-6">
                                     <div class="form-group">
                                         <input type="text" class="form-control" name="name"  
                                             placeholder="Your Name">
                                     </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                     <div class="form-group">
                                         <input type="email" class="form-control" name="email"  
                                             placeholder="Your Email">
                                     </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="form-group">
                                         <input type="text" class="form-control" name="subject"  
                                             placeholder="Subject">
                                     </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="form-group">
                                         <textarea class="form-control" name="message"
                                           cols="30" rows="10" placeholder="Message"></textarea>
                                     </div>
                                 </div>
                                 <div class="col-12">
                                     <button type="submit" class="btn alazea-btn mt-15">Send Message</button>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>

                 <div class="col-12 col-lg-6">
                     <!-- Google Maps -->
                     <div class="map-area mb-100">

                         <iframe
                             src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1851.6349645004714!2d35.728692638093136!3d32.325765069469114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151c8888296393d7%3A0xad15bd4bdbfa4a2c!2sAjloun%20Castle!5e0!3m2!1sen!2sjo!4v1693144853069!5m2!1sen!2sjo"
                             width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                             referrerpolicy="no-referrer-when-downgrade"></iframe>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- ##### Contact Area End ##### -->
 @endsection
