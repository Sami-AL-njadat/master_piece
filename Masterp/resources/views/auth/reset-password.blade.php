{{-- <x-guest-layout>
    <div class="min-h-screen flex justify-center items-center">
        <div class="w-full max-w-md">
            <div class="bg-white p-8 rounded shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">{{ __('Reset Password') }}</h2>
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-600">{{ __('Email') }}</label>
                        <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                        @if ($errors->has('email'))
                            <p class="text-sm text-red-600 mt-1">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-600">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password" class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                        @if ($errors->has('password'))
                            <p class="text-sm text-red-600 mt-1">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-600">{{ __('Confirm Password') }}</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                        @if ($errors->has('password_confirmation'))
                            <p class="text-sm text-red-600 mt-1">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="px-4 py-2 bg-primary text-white rounded hover:bg-primary-dark focus:outline-none focus:bg-primary-dark">{{ __('Reset Password') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>



 --}}






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
                        <h2 class="text-center">Reset Password</h2>
                        <p>You can reset your password here.</p>
                        <div class="panel-body">

                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="form-group">
                                    <div class="input-group " style="margin-top: 10px">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-envelope color-green"></i></span>

                                        <input id="email" type="email" name="email" class="form-control"
                                            value="{{ old('email', $request->email) }}" required autofocus
                                            autocomplete="username">


                                    </div>





                                    <div class="input-group "style="margin-top: 10px">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-pencil color-green"></i></span>

                                        <input id="password" type="password" class="form-control" name="password"
                                            required autocomplete="new-password">

                                    </div>


















                                    <div class="input-group" style="margin-top: 10px">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-pencil color-green"></i></span>

                                        <input id="password_confirmation" type="password" name="password_confirmation"
                                            class="form-control" required autocomplete="new-password">

                                    </div>










                                    <div style="margin-top: 10px">
                                        @if ($errors->has('email'))
                                            <p class="mt-3 red-alert">{{ $errors->first('email') }}</p>
                                        @endif

                                        @if ($errors->has('password'))
                                            <p class="mt-3 red-alert">{{ $errors->first('password') }}</p>
                                        @endif

                                        @if ($errors->has('password_confirmation'))
                                            <p class="mt-3 red-alert">{{ $errors->first('password_confirmation') }}</p>
                                        @endif
                                        {{-- <x-input-error :messages="$errors->get('email')" class="mt-3 red-alert" /> --}}

                                        {{-- <x-auth-session-status class="mb-4 green-alert" :status="session('status')" /> --}}

                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: 5px">
                                    <x-primary-button name="recover-submit" class="btn btn-l btn-success  btn-block"
                                        type="submit">
                                        {{ __(' Reset Password ') }}

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
