@extends('Admin.pages.login.master')

@section('content')
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">

                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                       

                        <div class="card card-primary" >
                            <div class="card-header">
                                    <img style="width: 100px; border-radius: 50%;  margin: auto;"
                                src="{{ asset('front_end/img/core-img/LOGOss.PNG') }}" alt="logo">
                            </div>

                            <form action="{{ route('loginprocess') }}" method="POST">
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif

                                @if (Session::has('fail'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ Session::get('fail') }}
                                    </div>
                                @endif

                                @csrf
                                <div class="card-body">
                                    <form method="POST" action="#" class="needs-validation" novalidate="">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email" type="email" class="form-control" name="email"
                                                tabindex="1" value="{{ old('email') }}" autofocus>
                                            <span class="text-danger">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                            {{-- <div class="invalid-feedback">
                                                Please fill in your email
                                            </div> --}}
                                        </div>

                                        <div class="form-group">
                                            <div class="d-block">
                                                <label for="password" class="control-label">Password</label>
                                                {{-- <div class="float-right">
                                                    <a href="{{ route('password.request') }}" class="text-small">
                                                        Forgot Password?
                                                    </a>
                                                </div> --}}
                                            </div>
                                            <input id="password" type="password" class="form-control" name="password"
                                                {{ old('password') }} tabindex="2">
                                            <span class="text-danger">
                                                @error('password')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                            <div class="invalid-feedback">
                                                please fill in your password
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="remember" class="custom-control-input"
                                                    tabindex="3" id="remember-me">
                                                {{-- <label class="custom-control-label" for="remember-me">Remember Me</label> --}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                  

                                </div>
                            </form>
                        </div>
                        {{-- <div class="mt-5 text-muted text-center">
                            Don't have an account? <a href="auth-register.html">Create One</a>
                        </div> --}}
                        <div class="simple-footer">
                            Copyright &copy; MASHTAL ONLLINE 2023
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
