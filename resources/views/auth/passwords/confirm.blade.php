@extends('layouts.app')
@section('title', 'Welcome to Collab Marketplace Reset Password')
@section('description', 'Welcome to Collab Marketplace Reset Password')

@section('content')

<body class="authentication-bg">

    <div class="account-pages mt-5 custom-accountpage ResetPass">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card BoxShadow">

                        <!-- Logo -->
                        {{--  <div class="card-header text-center cardhbg">
                            <a href="{{ url('/') }}">
                                <span><img src="{{ asset('assets/images/frontend/winlogo-white.png') }}" alt="logo"></span>
                            </a>
                        </div>  --}}

                        <div class="card-body p-3">

                            <div class="text-center ">
                                <h1 class="mt-0">{{ __('Confirm Password') }}</h1>
                            </div>

                            <p>{{ __('Please confirm your password before continuing.') }}</p>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12 d-grid">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgotten password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

                        </div>
                    </div>


                </div>
            </div>

        </div>

    </div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
@push('scripts')
{{--  <script src="{{ asset('assets/js/vendor.min.js') }}"></script>  --}}
{{--  <script src="{{ asset('assets/js/app.min.js') }}"></script>  --}}
{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>  --}}
@endpush
