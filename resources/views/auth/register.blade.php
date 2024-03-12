@extends('layouts.app')
@section('title', 'Want to increase YouTube video engagement, views, and Subscriptions organically? Register Now! on Franchisee Bazaar.')
@section('description', 'Franchisee Bazaar provides the best Influencer Service to promote your YouTube promotion and Instagram video promotion Channels at the best prices and offers. Register Now!')

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

<div class="lookingfor">
<div class="account-pages mt-4 custom-accountpage">

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-12">
                <h1 class="text-center">What are you looking for?</h1>
                <div class="chooselogin">

                    <div class="radio">
                        <label>
                            <input type="radio" class="btn-check" name="user_type" value="sponsor">
                            <span class="forcustom"><img src="{{ asset('assets/images/frontend/icons/Creator.png') }}" />I am a Sponsor</span>
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" class="btn-check" value="creator" @if(Session::get('tab') == 1) checked @endif  name="user_type" @if(str_contains(url()->previous(), 'ppc')) checked @endif>
                            <span class="forcustom"><img src="{{ asset('assets/images/frontend/icons/Sponsor.png') }}" />I am a Content Creator</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card BoxShadow" @if(str_contains(url()->previous(), 'ppc')) style="display: block"  @else style="display: none" @endif>



                    <div class="card-body p-3">

                        <div class="text-center ">
                            <h3 class="mt-0">{{ __('Sign Up as ') }} @if(str_contains(url()->previous(), 'ppc')) Creator @endif<span id="changetype"></span></h3>
                        </div>

                        @if(Session::get('tab') == 1)
                        <form method="POST" action="{{ route('creator.register') }}" id="register-form">
                            @csrf
                            @else
                        <form method="POST" action="{{ route('register') }}" id="register-form">
                            @csrf
                            @endif

                            <div class="row mb-1">
                                <div class="col-md-12">
                                    <label for="email" class="col-form-label">{{ __('Email') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email address" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-md-12">
                                    <label for="username" class="col-form-label">{{ __('Username') }}</label>
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Enter your username / brand name" required autocomplete="username" >

                                    @error('username')
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

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Enter confirm password" required autocomplete="new-password">
                                    <span toggle="#password-confirm" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12 d-grid">
                                    <button type="submit" class="btn btn-primary">{{ __('Join') }}</button>
                                    <button type="button" style="display:none;" class="btn btn-primary btn-trigger" data-bs-toggle="modal" data-bs-target="#EmailVerifyModal">

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
                                    <a  href="{{ url('auth/facebook') }}" class="btn btn-light mb-2"><img src="{{ asset('assets/images/frontend/icons/facebook.svg') }}" alt="Login with Facebook" /> Continue with Facebook</a>
                                    <a href="{{ url('auth/google') }}" class="btn btn-light"><img src="{{ asset('assets/images/frontend/icons/google.svg') }}" alt="Login with Google" /> Continue with Google</a>
                                </div>
                            </div>



                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <div class="donthave">
                                        <p>Already have an account? <a href="{{ route('login') }}"><b>Login</b></a></p>
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


<!-- Modal-Email-Verify -->
<div class="modal stymodal EmailVerify fade" id="EmailVerifyModal" tabindex="-1" aria-labelledby="RatingModal" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="modalform">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <img src="{{ asset('assets/images/frontend/winlogo-black.png') }}" alt="logo" />
            <p><b>Thank you for registering on our website! Your account has been taken.</b></p>
            <h6>A confirmation email has been sent to {{Session::get('message')}}. Please verify and login on the website</h6>
          </div>
        </div>
      </div>
    </div>
</div>




@endsection

@push('scripts')

<script>
    $('input[type=radio][name=user_type]').change(function() {
    $('.BoxShadow').hide();
    if (this.value == 'creator') {
        $('#changetype').html("Content Creator");
        let url = "{{ route('creator.register') }}";
        $('#register-form').attr('action',url);
    }
    else if (this.value == 'sponsor') {
        $('#changetype').html("Sponsor");
        let url = "{{ route('register') }}";
        $('#register-form').attr('action',url);
    }
    $('.BoxShadow').show();
    });

    $(document).ready(function() {
        var success = "{{ Session::get('success') }}";
        if(success == 'Registerd sucess'){
            $(".btn-trigger").trigger('click');
        }
    });

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
