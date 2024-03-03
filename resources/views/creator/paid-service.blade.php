@extends('layouts.creator')
@section('title', 'Welcome to Collab Marketplace Favorites')

@section('content')
<div class="container">
    <div id="content" class="paid-service">
        <h1>Upgrades included</h1>
        <div class="row">
            <div class="col-sm-6">
                <div class="upgrade-services">
                    @if($badges && count($badges))
                    @foreach($badges as $badge)
                    <div class="upgrade-box">
                        <div class="d-flex">
                            <div class="featured-checkbox">
                                <span style="background-color:{{ $badge->color ?? "#f07238" }};margin-left:0">{{ $badge->name }}</span>
                                <span ><img style="max-width: 70px;" src="{{ asset('storage/uploads/badges/'.$badge->icon)  }}"> </span>
                            </div>
                            <div>
                                <h3 class="text-right">${{ $badge->price }} USD</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p>{{ $badge->description }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif 

                    <div class="have-promo">
                        <p>Have Coupon Code?</p>
                        @if(@$error)
                        <div class="alert alert-error alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ @$error }}</strong>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('creator.apply-coupon') }}">
                            @csrf
                            <div class="d-flex">
                                <input type="hidden" name="total" value="{{ $total }}">
                                <input type="hidden" name="sub_total" value="{{ $sub_total }}">
                                <input type="hidden" name="ids[]" value="{! $ids !}">
                                <input type="text" class="form-control" name="coupon" placeholder="Enter promo code" >
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Apply</button>
                                </div>
                            </div>
                            
                        </form>                        
                    </div>
                    <div class="table">
                        <table class="table-responsive table">
                            <tr>
                                <td>Sub total</td>
                                <td>${{$sub_total}}</td>
                            </tr>
                            <tr>
                                <td>Promo Applied @if($code)({{@$code}})@endif</td>
                                <td>- ${{$coupon_total}}</td>
                            </tr>
                            <tr>
                                <td><strong>Total</strong></td>
                                <td><strong>${{$total}}</strong></td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-primary btn-lg" href="{{ route('creator.stripe-payment') }}">Pay Now</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6" style="display: none;">
                <div class="pay-with">
                    <div class="visa-card">
                        <div class="mr-auto">
                            <h4>Pay with</h4>
                        </div>
                        @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p><br>
                        </div>
                        @endif
                        <br>
                        <div class="ml-auto">
                            <ul class="list-inline">
                                <li class="list-inline-item"><img src="{{asset('assets/images/payments/visa.png')}}" alt="" class="img-fluid"></li>
                                <li class="list-inline-item"><img src="{{asset('assets/images/payments/master.png')}}" alt="" class="img-fluid"></li>
                                <li class="list-inline-item"><img src="{{asset('assets/images/payments/american-express.png')}}" alt="" class="img-fluid"></li>
                                <li class="list-inline-item"><img src="{{asset('assets/images/payments/discover.png')}}" alt="" class="img-fluid"></li>
                                <li class="list-inline-item"><img src="{{asset('assets/images/payments/citi.png')}}" alt="" class="img-fluid"></li>
                            </ul>
                        </div>
                    </div>
                    <form role="form" action="{{ route('creator.stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        @csrf
                        <input type="hidden" name="amount" value="{{$total}}">
                        <div class="form-group">
                            <label class="control-label">Name on card</label>
                            <input type="text" class="form-control" required placeholder="Eg. Alex Martin">
                        </div>
                        <div class="form-group required {{ $errors->has('card_no') ? ' has-error' : '' }}">
                            <label class="control-label">Card number</label>
                            <input type="text" class="form-control card-number" name="card_no" id="credit-card" required autocomplete="off" placeholder="1234 5678 9012 3456" minlength="16" maxlength="19">
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group required {{ $errors->has('card_expiry_month') ? ' has-error' : '' }}">
                                    <label class="control-label">Expiration Month</label>
                                    <input class="form-control card-expiry-month" name="card_expiry_month" required maxlength='2' placeholder="MM" type="number">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group required {{ $errors->has('card_expiry_year') ? ' has-error' : '' }}">
                                    <label class="control-label">Expiration Year</label>
                                    <input class="form-control card-expiry-year" name="card_expiry_year" required maxlength='4' placeholder="YYYY" type="number">
                                </div>
                            </div>
                            <div class="col-sm-4">
                            <div class="form-group required {{ $errors->has('card_cvc') ? ' has-error' : '' }}">
                                    <label class="control-label">Security Code / CVV</label>
                                    <input type="text" class="form-control card-cvc" name="card_cvc" required placeholder="&#9679;&#9679;&#9679;" minlength="3" maxlength="3">
                                </div>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide' style="display:none;">
                                <div class='alert-danger alert'>Please correct the errors and try
                                again.</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <p><img src="{{asset('assets/images/payments/shield.png')}}" alt="" class="img-fluid"> Your payments are 100% safe and secures with Stripe.</p>
                            <p><input required type="checkbox"> By providing your card information, you allow Winwinpromo to charge your card for the services rendered</p>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">Pay Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");

    $(document).on('submit', 'form.require-validation', function(e) {
        e.preventDefault();

        var $form     = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
            'input[type=text]', 'input[type=number]', 'input[type=file]',
            'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');

        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
            }
        });

        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }

    });

  function stripeResponseHandler(status, response) {
      console.log('response',response);
        if (response.error) {
          $('.error').css('display', 'block')
              .find('.alert')
              .text(response.error.message);
      } else {
          /* token contains id, last4, and card type */
          var token = response['id'];
          $form.find('input[type=text]').empty();
          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
          $form.get(0).submit();
      }
  }
});
</script>

<script type="text/javascript">
    $('#credit-card').on('keypress change', function () {
        $(this).val(function (index, value) {
            return value.replace(/\W/gi, '').replace(/(.{4})/g, '$1 ');
        });
        });
</script>

<script>
    function formatString(e) {
    var inputChar = String.fromCharCode(event.keyCode);
    var code = event.keyCode;
    var allowedKeys = [8];
    if (allowedKeys.indexOf(code) !== -1) {
        return;
    }

    event.target.value = event.target.value.replace(
        /^([1-9]\/|[2-9])$/g, '0$1/' // 3 > 03/
    ).replace(
        /^(0[1-9]|1[0-2])$/g, '$1/' // 11 > 11/
    ).replace(
        /^([0-1])([3-9])$/g, '0$1/$2' // 13 > 01/3
    ).replace(
        /^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2' // 141 > 01/41
    ).replace(
        /^([0]+)\/|[0]+$/g, '0' // 0/ > 0 and 00 > 0
    ).replace(
        /[^\d\/]|^[\/]*$/g, '' // To allow only digits and `/`
    ).replace(
        /\/\//g, '/' // Prevent entering more than 1 `/`
    );
    }
</script>

<script>
    $(document).ready(function(){
        $("#btn-coupon").click(function(){
            $(".promo").toggle();
        });
    });

    $(".alert-error").click(function(event) {
        $(this).alert('close');
    });

    setTimeout(function () {
        $('.alert-error').alert('close');
    }, 8000);
</script>

@endpush