@extends('layouts.app')
@section('title', 'Welcome to Collab Marketplace Verify Your Email')
@section('description', 'Welcome to Collab Marketplace Verify Your Email')

@section('content')

<div class="authentication-bg">

    <div class="account-pages mt-5  custom-accountpage ResetPass">
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
                                <h3 class="mt-0">{{ __('Verify Your Email Address') }}</h3>
                            </div>

                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                            <p>{{ __('If you did not receive the email') }},</p>
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                            </form>

                        </div>
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
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection

@push('scripts')
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
{{--  <script src="{{ asset('assets/js/app.min.js') }}"></script>  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
@endpush
