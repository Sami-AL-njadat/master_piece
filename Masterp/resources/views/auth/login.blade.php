 {{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>  --}}

 <!doctype html>
 <html lang="en">

 <head>
     <title>look</title>
     <!-- log CSS -->
     <link rel="stylesheet" href="{{ asset('front_end/login.css') }}" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     <!-- log CSS -->
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
         integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <title>Mashtal.online - Gardening &amp; Landscaping HTML Template</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="{{ asset('front_end/style.css') }}" />
     <link rel="icon" href="{{ asset('front_end/img/core-img/favicon.ico') }}" />


 </head>

 <body>

     <!-- <h2>WELCOME</h2> -->
     <div class="container" id="container">
         <div id="singipp" class="form-container sign-up-container">
             <form method="POST" action="{{ route('register') }}">
                 @csrf
                 <h1>Create Account</h1>
                 <!-- <div class="social-container">
                    <a href="#" class="social"><i class="fa-brands fa-facebook-f" style="color: #4b82e2;"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-linkedin-in" style="color: #2e64c2;"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-google" style="color: #5089ed;"></i></a>
                </div> -->
                 <strong> use your email for registration</strong>
                 <br>
                 {{-- <x-input-label for="name" :value="__('Name')" /> --}}
                 <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                     required autofocus autocomplete="name" />
                 <x-input-error :messages="$errors->get('name')" class="mt-2" />
                 <br>
                 {{-- <x-input-label for="email" :value="__('Email')" /> --}}
                 <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                     required autocomplete="username" />
                 <x-input-error :messages="$errors->get('email')" class="mt-2" />
                 <br>
                 {{-- <x-input-label for="password" :value="__('Password')" /> --}}

                 <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                     autocomplete="new-password" />

                 <x-input-error :messages="$errors->get('password')" class="mt-2" />
                 <br>

                 {{-- <x-input-label for="password_confirmation" :value="__('Confirm Password')" /> --}}

                 <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                     name="password_confirmation" required autocomplete="new-password" />

                 <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /> <br>
                 {{-- <p>
                    a password with a minimum of 8 characters that contains at least one lowercase letter, one uppercase
                    letter, one number, and one special character?
                </p> --}}


                 <x-primary-button class="ml-4">
                     {{ __('Register') }}
                 </x-primary-button>
             </form>
         </div>
         <!--sign in here baby  -->


         <div id="signinn" class="form-container sign-in-container">
             <!-- <a href="index.html"> <button  type="button" class="btn btn-outline-success" >Back Home</button></a> -->
             <!-- <i  href="index.html" class="fa-solid fa-arrow-left-long" style="color: #94ee58;"></i> -->


             <a href="index.html"> <i class="fa fa-arrow-left" aria-hidden="true"
                     style="color: #94ee58; font-size: x-large;"></i>
             </a>
             <form method="POST" action="{{ route('login') }}">
                 @csrf
                 <h1>Sign in</h1>
                 <!-- <div class="social-container">
                    <a href="#" class="social"><i class="fa-brands fa-facebook-f" style="color: #4b82e2;"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-linkedin-in" style="color: #2e64c2;"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-google" style="color: #5089ed;"></i></a>
                </div> -->
                 <strong> use your account</strong>
                 <br>
                 <x-input-label for="email" :value="__('Email')" />
                 <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                     required autofocus autocomplete="username" />
                 <x-input-error :messages="$errors->get('email')" class="mt-2" />
                 <br>
                 <x-input-label for="password" :value="__('Password')" />

                 <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                     autocomplete="current-password" />

                 <x-input-error :messages="$errors->get('password')" class="mt-2" /> <br>
                 @if (Route::has('password.request'))
                     <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                         href="{{ route('password.request') }}">
                         {{ __('Forgot your password?') }}
                     </a>
                 @endif

                 <x-primary-button class="ml-3">
                     {{ __('Log in') }}
                 </x-primary-button>


             </form>
         </div>
         <div class="overlay-container">
             <div class="overlay">
                 <div class="overlay-panel overlay-left">
                     <img src="{{ asset('front_end/img/core-img/LOGOss.PNG') }}" alt="logo">


                     <!-- <h1>Welcome Back!</h1> -->
                     <!-- <h5>To keep connected with us login with your Account </h5> -->

                     <button class="ghost" id="signIn">Sign In</button>
                 </div>
                 <div class="overlay-panel overlay-right">
                     <img src="{{ asset('front_end/img/core-img/LOGOss.PNG') }}" alt="logo">
                     <!-- <h1>Hello, Friend!</h1> -->
                     <!-- <h5>Enter your personal details and start journey with us</h5> -->

                     <button class="ghost" id="signUp">Sign Up</button>
                 </div>
             </div>
         </div>
         <p class="spase"></p>
     </div>



     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->

     <script src="{{ asset('front_end/login.js') }}"></script>
     <script src="{{ asset('https://code.jquery.com/jquery-3.3.1.slim.min.js') }}"
         integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
     </script>
     <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js') }}"
         integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
     </script>
     <script src="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js') }}"
         integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
     </script>

     <!-- jQuery-2.2.4 js -->
     <script src="{{ asset('front_end/js/jquery/jquery-2.2.4.min.js') }}"></script>
     <!-- Popper js -->
     <script src="{{ asset('front_end/js/bootstrap/popper.min.js') }}"></script>
     <!-- Bootstrap js -->
     <script src="{{ asset('front_end/js/bootstrap/bootstrap.min.js') }}"></script>
     <!-- All Plugins js -->
     <script src="{{ asset('front_end/js/plugins/plugins.js') }}"></script>
     <!-- Active js -->
     <script src="{{ asset('front_end/js/active.js') }}"></script>

     <script>
         document.addEventListener("DOMContentLoaded", function() {
             const signUpButton = document.getElementById("signUp");
             const signInButton = document.getElementById("signIn");
             const container = document.getElementById("container");
             const signUpForm = document.getElementById("signUp-form");
             const signInForm = document.getElementById("signIn-form");

             signUpButton.addEventListener("click", () => {
                 container.classList.add("right-panel-active");
                 // Store the state in sessionStorage
                 sessionStorage.setItem("isSignUpActive", "true");
             });

             signInButton.addEventListener("click", () => {
                 container.classList.remove("right-panel-active");
                 // Remove the state from sessionStorage
                 sessionStorage.removeItem("isSignUpActive");
             });

             // Check if the sign-up form was active before the refresh
             const isSignUpActive = sessionStorage.getItem("isSignUpActive");

             if (isSignUpActive === "true") {
                 container.classList.add("right-panel-active");
             }

             // Handle sign-up and sign-in form submissions as needed
             signUpForm.addEventListener("submit", function(e) {
                 e.preventDefault();
                 // Handle sign-up form submission logic here
             });

             signInForm.addEventListener("submit", function(e) {
                 e.preventDefault();
                 // Handle sign-in form submission logic here
             });
         });
     </script>

 </body>

 </html>
