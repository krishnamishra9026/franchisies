@extends('layouts.app')
@section('title', 'Welcome to Collab Marketplace Login')
@section('description', 'Welcome to Collab Marketplace Login')

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



                        <div class="card-body p-3">

                            <div class="text-center ">
                                <h1 class="mt-0">{{ __('Login') }}</h1>
                            </div>

                            @if ($message = Session::get('message'))
                            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong><i class="dripicons-checkmark me-2"></i> </strong>{{ $message }}
                            </div>
                            @endif

                            <div class="chooselogin" style="display: none;">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <div class="radio">
										<label>
											<input type="radio" class="btn-check" name="btnradio" checked value="sponsor">
											<span class="forcustom">I am a Sponsor</span>
										</label>
									</div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="radio">
										<label>
											<input type="radio" class="btn-check" name="btnradio" value="creator" @if(Session::get('tab') == 1) checked @endif>
											<span class="forcustom">I am a Creator</span>
										</label>
									</div>
                                    </li>
                                </ul>
                            </div>

                            @if(Session::get('tab') == 1)
                            <form method="POST" action="{{ route('creator.login') }}" id="login-form">
                                @else
                            <form method="POST" action="{{ route('login') }}" id="login-form">
                                @endif
                                @csrf

                                <div class="row mb-1">
                                    <div class="col-md-12">
                                        <label for="email" class="col-form-label">{{ __('Email') }}</label>
                                        <input id="email" type="email" required class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Enter your email address" autocomplete="email" autofocus>

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
                                        <input id="password" required type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password" required autocomplete="current-password">
                                        <span toggle="#password" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Keep me signed in') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link" id="forgot-password" href="{{ route('password.request') }}">
                                            {{ __('Forgotten password?') }}
                                        </a>
                                    @endif
                                    </div>
                                </div>


                                <div class="row mb-2">
                                    <div class="col-md-12 d-grid">
                                        <button type="submit" class="btn btn-primary w-full">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="sociallogin">
                                        <div class="or-container">
                                            <div class="line-separator"></div>
                                            <div class="or-label">Or</div>
                                            <div class="line-separator"></div>
                                        </div>
                                        <a href="{{ url('auth/facebook') }}" id="fb-form" class="btn btn-light mb-2"><img src="{{ asset('assets/images/frontend/icons/facebook.svg') }}" alt="Login with Facebook" /> Login with Facebook</a>
                                        <a href="{{ url('auth/google') }}" id="google-form" class="btn btn-light"><img src="{{ asset('assets/images/frontend/icons/google.svg') }}" alt="Login with Google" /> Login with Google</a>
                                    </div>
                                </div>


                                <div class="row mt-3">
                                    <div class="col-12 text-center">
                                        <div class="donthave">
                                            <p>Don't have an account? <a href="{{ route('register') }}"><b>Sign Up</b></a></p>
                                        </div>
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
    $('input[type=radio][name=btnradio]').change(function() {
        if (this.value == 'sponsor') {
            let url = "{{ route('login') }}";
            let fb_url = "{{ route('auth.facebook') }}";
            let google_url = "{{ route('auth.google') }}";
            let forget_url = "{{ route('password.request') }}";
            $('#fb-form').attr('href',fb_url);
            $('#google-form').attr('href',google_url);
            $('#login-form').attr('action',url);
            $('#forgot-password').attr('href',forget_url);
        }
        else if (this.value == 'creator') {
            let fb_url = "{{ route('creator.auth.facebook') }}";
            let google_url = "{{ route('creator.auth.google') }}";
            let url = "{{ route('creator.login') }}";
            let forget_url = "{{ route('creator.password.request') }}";
            $('#login-form').attr('action',url);
            $('#fb-form').attr('href',fb_url);
            $('#google-form').attr('href',google_url);
            $('#forgot-password').attr('href',forget_url);
        }
    });

    $(".alert").click(function(event) {
        $(this).alert('close');
    });

    setTimeout(function () {
        $('.alert').alert('close');
    }, 8000);

</script>
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

