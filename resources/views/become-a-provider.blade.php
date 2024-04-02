@extends('layouts.main')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<style>

	.about-sec-one {
        background-image: url('https://testdemowebsite-v1.com/custom-backend/preschool_portal/public/uploads/pages/9_(2)_1680636205.png');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 450px;
        display: flex;
        align-items: center;
    }

a:hover{
    text-decoration:none !important;
}
button#stripe-submit {
    margin-top: 2rem;
}

</style>
@endsection


@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->


<section class="about-sec-one Teacher-Banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="about-us" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                    <h2>Become A Provider</h2>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="zig-zag Teacher-sec provider">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-12 p-0">
                <div class="images-zag" data-aos="flip-left" data-aos-easing="linear" data-aos-duration="1500">
                    <figure>
                        <img src="images/techer-1.png" class="img-fluid" alt="">
                    </figure>
                </div>
            </div>
            <div class="col-lg-7 col-md-6 col-12">
                <div class="content-zig mt-0 pt-0 priority" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                    <p><span>FOR BECOME A PROVIDER</span></p>
                    <h6>
                        Provider Registration
                    </h6>

                    <form class="sign-up" method="POST" action="{{ route('register') }}" id="sign-up">

                        @csrf
                        <?php
                        $subtotal = App\Http\Traits\HelperTrait::returnFlag(1973);
                        ?>
                    <input type="hidden" name="payment_id" value="" />
                    <input type="hidden" name="amount" value="10" />
                    <input type="hidden" name="payer_id" value="" />
                    <input type="hidden" name="payment_status" value="" />
                    <input type="hidden" name="amount" value="{{$subtotal}}" />
                    <input type="hidden" name="payment_method" id="payment_method" value="paypal" />
                        <div class="row">

                           <input type="hidden" name="role" value="4">

                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="name" placeholder="Business Name" required="">
                            </div>
                            @if ($errors->registerForm->has('name'))
                            <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('name') }}</small>
                            @endif

                            <div class="col-lg-6 pl-lg-1 pl-md-1">
                                <input type="text" class="form-control" name="phone" placeholder="Business Phone  Number" required="">
                            </div>
                            @if ($errors->registerForm->has('phone'))
                            <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('phone') }}</small>
                            @endif

                            <div class="col-lg-12 mt-3">
                                <input type="text" class="form-control" name="address" placeholder="Business Address" required="">
                            </div>
                            @if ($errors->registerForm->has('address'))
                            <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('address') }}</small>
                            @endif

                            <div class="col-lg-6 mt-3">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="">
                            </div>
                            @if ($errors->registerForm->has('email'))
                            <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('email') }}</small>
                            @endif

                            <div class="col-lg-6 mt-3">
                                <input type="password" class="form-control" name="password" placeholder="Password" required="">
                            </div>
                            @if ($errors->registerForm->has('password'))
                            <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('password') }}</small>
                            @endif

                            <div class="col-lg-4 mt-3">
                                <span>Hour open</span>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="hour_open" placeholder="1 to 3" required="">
                                </div>
                            </div>
                            @if ($errors->registerForm->has('hour_open'))
                            <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('hour_open') }}</small>
                            @endif

                            <div class="col-lg-4 mt-3">
                                <span>Ages accepted?</span>
                                <div class="form-group">
                                    <select name="age_accepted" id="" class="form-control">
                                        <option value="1-3">1-3</option>
                                        <option value="4-8">4-8</option>
                                        <option value="9-10">9-10</option>
                                    </select>
                                </div>
                            </div>
                            @if ($errors->registerForm->has('age_accepted'))
                            <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('age_accepted') }}</small>
                            @endif

                            <div class="col-lg-4 mt-3">
                                <span>Position accepted?</span>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="position_accepted" placeholder="1 to 3" required="">
                                </div>
                            </div>
                            @if ($errors->registerForm->has('position_accepted'))
                            <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('position_accepted') }}</small>
                            @endif

                            <div class="form-group col-lg-12 mt-3">
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="about" rows="6" placeholder="Tell us about Business?"></textarea>
                            </div>
                            @if ($errors->registerForm->has('about'))
                            <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('about') }}</small>
                            @endif

                            <div class="form-group col-lg-12 mt-3">
                                <textarea class="form-control" id="exampleFormControlTextarea2" name="about_preschool" rows="6" placeholder="How did you hear about preschool portal?"></textarea>
                            </div>
                            @if ($errors->registerForm->has('about_preschool'))
                            <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('about_preschool') }}</small>
                            @endif

                            <!--<button type="submit" class="custom-btn">Become a provider</button>-->
                            <div class="form-group col-lg-12 mt-3">
                                <div id="accordion" class="payment-accordion">
{{--                                  <div class="card">--}}
{{--                                    <div class="card-header" id="headingOne">--}}
{{--                                      <h5 class="mb-0">--}}
{{--                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" data-payment="paypal">--}}
{{--                                          Pay with Paypal <img src="{{ asset('images/paypal.png') }}" width="60" alt="">--}}
{{--                                        </button>--}}
{{--                                      </h5>--}}
{{--                                    </div>--}}
{{--                                    <?php--}}
{{--                                    $subtotal = App\Http\Traits\HelperTrait::returnFlag(1973);--}}
{{--                                    ?>--}}
{{--                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">--}}
{{--                                      <div class="card-body">--}}
{{--                                        <input type="hidden" name="price" value="{{ App\Http\Traits\HelperTrait::returnFlag(1973) }}" />--}}
{{--                                        <div id="paypal-button-container-popup"></div>--}}
{{--                                      </div>--}}
{{--                                    </div>--}}
{{--                                  </div>--}}
                                  <div class="card">
                                    <div class="card-header" id="headingTwo">
                                      <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" data-payment="stripe">
                                          Pay with Credit Card <img src="{{ asset('images/payment1.png') }}" alt="" width="150">
                                        </button>
                                      </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                      <div class="card-body">
                                        <div class="stripe-form-wrapper require-validation" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" data-cc-on-file="false">
                                          <div id="card-element"></div>
                                          <div id="card-errors" role="alert"></div>
                                          <div class="form-group">
                                            <button class="btn btn-red btn-block" type="button" id="stripe-submit">Pay Now ${{ $subtotal }}</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>


                    </form>


                </div>
            </div>
        </div>
    </div>
</section>


<!-- ============================================================== -->


@endsection


@section('js')
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script src="https://js.stripe.com/v3/"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
	$(document).ready(function() {
		toastr.options = {
			'closeButton': true,
			'debug': false,
			'newestOnTop': false,
			'progressBar': false,
			'positionClass': 'toast-top-right',
			'preventDuplicates': false,
			'showDuration': '1000',
			'hideDuration': '1000',
			'timeOut': '5000',
			'extendedTimeOut': '1000',
    		'showEasing': 'swing',
			'hideEasing': 'linear',
			'showMethod': 'fadeIn',
			'hideMethod': 'fadeOut',
		}
	});

</script>

<script type="text/javascript">
      $('#accordion .btn-link').on('click', function(e) {
        if (!$(this).hasClass('collapsed')) {
          e.stopPropagation();
        }
        $('#payment_method').val($(this).attr('data-payment'));
      });
paypal.Button.render({
      env: 'sandbox', //production

      style: {
        label: 'checkout',
        size:  'responsive',
        shape: 'rect',
        color: 'gold'
      },
      client: {
        sandbox: 'AV06KMdIerC8pd6_i1gQQlyVoIwV8e_1UZaJKj9-aELaeNXIGMbdR32kDDEWS4gRsAis6SRpUVYC9Jmf',
        // production:'ARIYLCFJIoObVCUxQjohmqLeFQcHKmQ7haI-4kNxHaSwEEALdWABiLwYbJAwAoHSvdHwKJnnOL3Jlzje',
      },
      validate: function(actions) {
        actions.disable();
        paypalActions = actions;
      },

      onClick:  function(e) {
        var errorCount = checkEmptyFileds();

        if(errorCount == 1){
            	toastr.error('Please fill the required fields before proceeding to pay');

          paypalActions.disable();
        }else{
          paypalActions.enable();
        }
      },
      payment: function(data, actions) {
        return actions.payment.create({
          payment: {
            transactions: [
              {
                amount: { total: {{number_format(((float)$subtotal),2, '.', '')}}, currency: 'USD' }
              }
            ]
          }
        });
      },
      onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function() {
          // generateNotification('success','Payment Authorized');
            toastr.success('Payment Authorized');
        //   $.toast({
        //         heading: 'Success!',
        //         position: 'bottom-right',
        //         text:  'Payment Authorized',
        //         loaderBg: '#ff6849',
        //         icon: 'success',
        //         hideAfter: 1000,
        //         stack: 6
        //     });

          var params = {
            payment_status:'Completed',
            paymentID: data.paymentID,
            payerID: data.payerID
          };

          // console.log(data.paymentID);
          // return false;
          $('input[name="payment_status"]').val('Completed');
          $('input[name="payment_id"]').val(data.paymentID);
          $('input[name="payer_id"]').val(data.payerID);
          $('input[name="payment_method"]').val('paypal');
          $('.sign-up').submit();
        });
      },
      onCancel: function(data, actions) {
          var params = {
            payment_status:'Failed',
            paymentID: data.paymentID
          };
          $('input[name="payment_status"]').val('Failed');
          $('input[name="payment_id"]').val(data.paymentID);
          $('input[name="payer_id"]').val('');
          $('input[name="payment_method"]').val('paypal');
      }
    }, '#paypal-button-container-popup');
</script>
<script>
var stripe = Stripe('{{ env("STRIPE_KEY") }}');
  // Create an instance of Elements.
  var elements = stripe.elements();
  var style = {
    base: {
      color: '#32325d',
      lineHeight: '18px',
      fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
      fontSmoothing: 'antialiased',
      fontSize: '16px',
      '::placeholder': {
        color: '#aab7c4'
      }
    },
    invalid: {
      color: '#fa755a',
      iconColor: '#fa755a'
    }
  };
  var card = elements.create('card', {style: style});
  card.mount('#card-element');

  card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
      $(displayError).show();
      displayError.textContent = event.error.message;
    } else {
      $(displayError).hide();
      displayError.textContent = '';
    }
  });

  var form = document.getElementById('order-place');

  $('#stripe-submit').click(function(){
    stripe.createToken(card).then(function(result) {
      var errorCount = checkEmptyFileds();
      if ((result.error) || (errorCount == 1)) {
        // Inform the user if there was an error.
        if(result.error){
          var errorElement = document.getElementById('card-errors');
          $(errorElement).show();
          errorElement.textContent = result.error.message;
        }else{
            toastr.error('Please fill the required fields before proceeding to pay')
        //   $.toast({
        //     heading: 'Alert!',
        //     position: 'bottom-right',
        //     text:  'Please fill the required fields before proceeding to pay',
        //     loaderBg: '#ff6849',
        //     icon: 'error',
        //     hideAfter: 5000,
        //     stack: 6
        //   });
        }
      } else {
        // Send the token to your server.
        stripeTokenHandler(result.token);
      }
    });
  });

  function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('sign-up');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
    form.submit();
  }
  function checkEmptyFileds(){
    var errorCount = 0;
    $('form#sign-up').find('.form-control').each(function(){
      if($(this).prop('required')){
        if( !$(this).val() ) {
          $(this).parent().find('.invalid-feedback').addClass('d-block');
          $(this).parent().find('.invalid-feedback strong').html('Field is Required');
          errorCount = 1;
        }
      }
    });
    return errorCount;
  }
</script>
@endsection
