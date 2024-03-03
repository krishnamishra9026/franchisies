<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>Register | Creator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="favicon.png">
    <title>Want to increase YouTube video engagement, views, and Subscriptions organically? Register Now! on Winwinpromo</title>
    <meta name ="description" content="Winwinpromo provides the best Influencer Service to promote your YouTube promotion and Instagram video promotion Channels at the best prices and offers. Register Now!">
    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>

    <div class="auth-fluid" style="background-image: url('{{ asset('assets/images/bg-creator.png') }}')">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box pb-4 px-3">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="auth-brand text-center">
                        <a href="/" class="logo-dark">
                            <span><img src="{{ asset('assets/images/logo.png') }}"></span>
                        </a>
                        <a href="/" class="logo-light">
                            <span><img src="{{ asset('assets/images/logo.png') }}"></span>
                        </a>
                    </div>

                    <!-- title-->
                    <h4 class="mt-0">Creator Register</h4>
                    <p class="text-muted mb-4">Enter your email address and password to access account.</p>

                    <!-- form -->
                    <form method="POST" action="{{ route('creator.register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" autocomplete="email" autofocus>
                            @error('email')
                                <code id="email-error" class="text-danger">{{ $message }}</code>
                            @enderror
                        </div>
                        <div class="mb-3">

                                <a href="{{ route('creator.password.request') }}" class="text-muted float-end"><small>Forgot
                                        your password?</small></a>

                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="current-password">
                            @error('password')
                                <code id="password-error" class="text-danger">{{ $message }}</code>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}
                                    class="form-check-input" id="checkbox-signin">
                                <label class="form-check-label" for="checkbox-signin">Remember me</label>
                            </div>
                        </div>
                        <div class="d-grid mb-0 text-center">
                            <button class="btn btn-warning btn-userlogin" type="submit"><i class="mdi mdi-login"></i> Log In
                            </button>
                        </div>
                    </form>
                    <!-- end form-->

                </div> <!-- end .card-body -->
            </div> <!-- end .align-items-center.d-flex.h-100-->
        </div>
        <!-- end auth-fluid-form-box-->


    </div>
    <!-- end auth-fluid-->

    <!-- bundle -->

</body>
</html>
