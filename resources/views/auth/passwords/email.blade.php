@extends('layouts.app')
@section('title', 'Welcome to Collab Marketplace Reset Password')
@section('description', 'Welcome to Collab Marketplace Reset Password')

@section('content')

@php
if(!str_contains(url()->previous(), 'password/reset')){
session()->forget('status');
session()->forget('status_email');
}
@endphp
<div class="authentication-bg">

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
                                <h1 class="mt-0">{{ __('Reset Password') }}</h1>
                            </div>

                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                             @if (session('status_email'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status_email') }}
                            </div>
                            @endif





                    <form method="POST" action="{{ route('password.email') }}" @if(session('status') || session('status_email') ) style="display:none;" @endif>
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="email" class="col-form-label">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12 d-grid">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>

                        </div>
                    </div>


                </div>
            </div>

        </div>

    </div>
</div>

@endsection
@push('scripts')
{{--  <script src="{{ asset('assets/js/vendor.min.js') }}"></script>  --}}
{{--  <script src="{{ asset('assets/js/app.min.js') }}"></script>  --}}
{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>  --}}
@endpush
