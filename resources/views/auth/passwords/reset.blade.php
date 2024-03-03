@extends('layouts.app')
@section('title', 'Welcome to Collab Marketplace Reset Password')
@section('description', 'Welcome to Collab Marketplace Reset Password')

<style>
.field-icon {
    float: right;
    left: -8px;
    margin-top: -25px;
    position: relative;
    z-index: 2;
    cursor: pointer;
}
</style>

@section('content')

<div class="authentication-bg">

    <div class="account-pages mt-4 custom-accountpage">
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


                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="row mb-1">

                                    <div class="col-md-12">
                                        <label for="email" class="col-form-label">{{ __('Email') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Enter your email" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <div class="col-md-12">
                                        <label for="password" class="col-form-label">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password" required autocomplete="new-password">
                                        <span toggle="#password" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Enter confirm password" required autocomplete="new-password">
                                        <span toggle="#password-confirm" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-12 d-grid">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Reset Password') }}
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

<script>
    $(".toggle-password").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});
</script>

@endpush
