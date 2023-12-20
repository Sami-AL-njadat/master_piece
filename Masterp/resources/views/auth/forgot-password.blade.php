{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}




<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
<style>
    /* Red Alert for x-input-error */
    .red-alert {
        background-color: #ffcccc;
        /* Red background color */
        color: #ff0000;
        /* Red text color */
        border: 1px solid #ff0000;
        /* Red border */
        padding: 10px;
        margin-top: 5px;
        border-radius: 5px;
    }

    /* Green Alert for x-auth-session-status */
    .green-alert {
        background-color: #ccffcc;
        /* Green background color */
        color: #009900;
        /* Green text color */
        border: 1px solid #009900;
        /* Green border */
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
    }
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="form-gap" style="padding-top: 70px;"></div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body ">
                    <div class="text-center">
                        <h3><i class="fa fa-lock fa-4x"></i></h3>
                        <h2 class="text-center">Forgot Password?</h2>
                        <p>You can reset your password here.</p>
                        <div class="panel-body">
                            
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf


                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-envelope color-green"></i></span>

                                        <x-text-input id="email" class="form-control" type="email" name="email"
                                            :value="old('email')" required autofocus />
                                    </div>
                                    {{-- <x-input-error :messages="$errors->get('email')" class="mt-3" /> --}}

                                         <x-input-error :messages="$errors->get('email')" class="mt-3 red-alert" />

                                        <x-auth-session-status class="mb-4 green-alert" :status="session('status')" />

 
                                </div>
                                <div class="form-group">
                                    <x-primary-button name="recover-submit" class="btn btn-l btn-success  btn-block"
                                        type="submit">
                                        {{ __('Link Password Reset') }}

                                    </x-primary-button>
                                </div>



                            </form>

                        </div>
                        <div>
                            <a class="btn btn-m btn-success" href="{{ '/' }}">home</a>
                            <a class="btn btn-m btn-success" href="/login">Login</a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
