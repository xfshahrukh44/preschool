@extends('layouts.main')

@section('css')
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <style>

        .about-sec-one {
            /*background-image: url(<?php //echo asset('images/194-scaled.jpg'); ?>);*/
            background-image: url(<?php echo asset('images/contact_img.png'); ?>);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 650px;
            display: flex;
            align-items: center;
        }

        a:hover {
            text-decoration: none !important;
        }

        button#stripe-submit {
            margin-top: 2rem;
        }
        
        
        .StripeElement {
    box-sizing: border-box;
    height: 40px;
    padding: 10px 12px;
    border: 1px solid transparent;
    border-radius: 4px;
    background-color: white;
    box-shadow: 0 1px 3px 0 #e6ebf1;
    -webkit-transition: box-shadow 150ms ease;
    transition: box-shadow 150ms ease;
    border-width: 1px;
    border-color: rgb(150, 163, 218);
    border-style: solid;
    margin-bottom: 10px;
  }

  .StripeElement--focus {
    box-shadow: 0 1px 3px 0 #cfd7df;
  }

  .StripeElement--invalid {
    border-color: #fa755a;
  }

  .StripeElement--webkit-autofill {
    background-color: #fefde5 !important;
  }
  div#card-errors {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
    display: block;
    width: 100%;

    font-size: 15px;
    padding: 5px 15px;
    border-radius: 6px;
    display: none;
    margin-bottom: 10px;
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
                            <img src="images/become-a-provider.jpg" class="img-fluid" alt="">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-12">
                    <div class="content-zig mt-0 pt-0 priority" data-aos="fade-down" data-aos-easing="linear"
                         data-aos-duration="1500">
{{--                        <p><span>FOR BECOME A PROVIDER</span></p>--}}
                        <h6>
                            Provider Registration
                        </h6>

                        <form class="sign-up" method="POST" action="{{ route('register') }}" id="sign-up">

                            @csrf
                            <?php
                                $subtotal = App\Http\Traits\HelperTrait::returnFlag(1973);
                            ?>
                            
                            <input type="hidden" name="payment_id" value=""/>
                            <input type="hidden" name="amount" value="10"/>
                            <input type="hidden" name="payer_id" value=""/>
                            <input type="hidden" name="payment_status" value=""/>
                            <input type="hidden" name="amount" value="{{$subtotal}}"/>
                            <input type="hidden" name="payment_method" id="payment_method" value="paypal"/>
                            
                            <div class="row">

                                <input type="hidden" name="role" value="4">

                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="name" placeholder="Business Name"
                                           required="">
                                </div>
                                @if ($errors->registerForm->has('name'))
                                    <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('name') }}</small>
                                @endif

                                <div class="col-lg-6 pl-lg-1 pl-md-1">
                                    <input type="text" class="form-control" name="phone"
                                           placeholder="Business Phone  Number" required="">
                                </div>
                                @if ($errors->registerForm->has('phone'))
                                    <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('phone') }}</small>
                                @endif

                                <div class="col-lg-12 mt-3">
                                    <input type="text" class="form-control" name="address"
                                           placeholder="Business Address" required="">
                                </div>
                                @if ($errors->registerForm->has('address'))
                                    <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('address') }}</small>
                                @endif

                                <div class="col-lg-6 mt-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                           required="">
                                </div>
                                @if ($errors->registerForm->has('email'))
                                    <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('email') ?? '' }}</small>
                                @endif

                                <div class="col-lg-6 mt-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password"
                                           required="">
                                </div>
                                @if ($errors->registerForm->has('password'))
                                    <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('password') }}</small>
                                @endif

{{--                                <div class="col-lg-4 mt-3">--}}
{{--                                    <span>Hour open</span>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="text" class="form-control" name="hour_open" placeholder="1 to 3"--}}
{{--                                               required="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                @if ($errors->registerForm->has('hour_open'))--}}
{{--                                    <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('hour_open') }}</small>--}}
{{--                                @endif--}}

                                <div class="col-lg-12 mt-3">
                                    <span>What ages do you accept?</span>
                                    <div class="form-group">
                                        <select name="age_accepted[]" id="select1" class="form-control" multiple required>
                                            <option value="">Select an option</option>
                                            <option value="0-12 months">0-12 months</option>
                                            <option value="12-24 months">12-24 months</option>
                                            <option value="2-5 years">2-5 years</option>
                                            <option value="5+ years">5+ years</option>
                                        </select>
                                    </div>
                                </div>
                                @if ($errors->registerForm->has('age_accepted'))
                                    <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('age_accepted') }}</small>
                                @endif
                                
                                
{{--                                <div class="col-lg-12 mt-3">--}}
{{--                                    <!--<span>Custom Age</span>-->--}}
{{--                                    <input type="number" class="form-control" name="custom_age" placeholder="Enter Age">--}}
{{--                                </div>--}}

{{--                                <div class="col-lg-4 mt-3">--}}
{{--                                    <span>Position accepted?</span>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="text" class="form-control" name="position_accepted"--}}
{{--                                               placeholder="1 to 3" required="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                @if ($errors->registerForm->has('position_accepted'))--}}
{{--                                    <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('position_accepted') }}</small>--}}
{{--                                @endif--}}


                                <div class="col-md-7 mb-2 mt-4">
{{--                                    <h4 class="ml-2"> Timings </h4>--}}
                                    <h4 class="ml-2"> Hours open </h4>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">
                                                <span>Monday</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time"
                                                   name="timings[Monday][from]" value="09:00">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time"
                                                   name="timings[Monday][to]" value="17:00">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">
                                                <span>Tuesday</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time"
                                                   name="timings[Tuesday][from]" value="09:00">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time"
                                                   name="timings[Tuesday][to]" value="17:00">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">
                                                <span>Wednesday</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time"
                                                   name="timings[Wednesday][from]" value="09:00">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time"
                                                   name="timings[Wednesday][to]" value="17:00">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">
                                                <span>Thursday</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time"
                                                   name="timings[Thursday][from]" value="09:00">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time"
                                                   name="timings[Thursday][to]" value="17:00">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">
                                                <span>Friday</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time"
                                                   name="timings[Friday][from]" value="09:00">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time"
                                                   name="timings[Friday][to]" value="17:00">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">
                                                <span>Saturday</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time"
                                                   name="timings[Saturday][from]" value="09:00">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time"
                                                   name="timings[Saturday][to]" value="17:00">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">
                                                <span>Sunday</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time"
                                                   name="timings[Sunday][from]" value="09:00">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time"
                                                   name="timings[Sunday][to]" value="17:00">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 mb-2 mt-4">
                                    <h4 class="ml-2"> Services </h4>

                                    <div class="row ml-2">
                                        <label for="after_school" class="ml-5">
                                            <strong>After school</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                               name="services[After school]" id="after_school">
                                    </div>

                                    <div class="row ml-2">
                                        <label for="before_school" class="ml-5">
                                            <strong>Before school</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                               name="services[Before school]" id="before_school">
                                    </div>

                                    <div class="row ml-2">
                                        <label for="drop_in" class="ml-5">
                                            <strong>Drop in</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                               name="services[Drop in]" id="drop_in">
                                    </div>

                                    <div class="row ml-2">
                                        <label for="food_served" class="ml-5">
                                            <strong>Food served</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                               name="services[Food served]" id="food_served">
                                    </div>

                                    <div class="row ml-2">
                                        <label for="full_day" class="ml-5">
                                            <strong>Full day</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                               name="services[Full day]" id="full_day">
                                    </div>

                                    <div class="row ml-2">
                                        <label for="half_day" class="ml-5">
                                            <strong>Half day</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                               name="services[Half day]" id="half_day">
                                    </div>

                                    <div class="row ml-2">
                                        <label for="infant_care" class="ml-5">
                                            <strong>Infant care</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                               name="services[Infant care]" id="infant_care">
                                    </div>

                                    <div class="row ml-2">
                                        <label for="night_care" class="ml-5">
                                            <strong>Night care</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                               name="services[Night care]" id="night_care">
                                    </div>

                                    <div class="row ml-2">
                                        <label for="transportation" class="ml-5">
                                            <strong>Transportation</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                               name="services[Transportation]" id="transportation">
                                    </div>

                                    <div class="row ml-2">
                                        <label for="weekend_care" class="ml-5">
                                            <strong>Weekend care</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                               name="services[Weekend care]" id="weekend_care">
                                    </div>
                                </div>

                                <div class="form-group col-lg-12 mt-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="about"
                                              rows="6" placeholder="Tell us about Business?"></textarea>
                                </div>
                                @if ($errors->registerForm->has('about'))
                                    <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('about') }}</small>
                                @endif

                                <div class="form-group col-lg-12 mt-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea2"
                                              name="about_preschool" rows="6"
                                              placeholder="How did you hear about preschool portal?"></textarea>
                                </div>
                                @if ($errors->registerForm->has('about_preschool'))
                                    <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('about_preschool') }}</small>
                                @endif

                                <div class="form-group col-lg-12 mt-3">
                                    <input type="checkbox" id="checkbox_agreed_to_terms">
                                    <label for="checkbox_agreed_to_terms">
                                        I have read the
                                        <a target="_blank" href="{{route('termsandconditionprovider')}}">Terms and conditions</a>
                                    </label>
                                    {{--                                <textarea class="form-control" id="exampleFormControlTextarea2" name="about_preschool" rows="6" placeholder="How did you hear about preschool portal?"></textarea>--}}
                                </div>

                                <!--<button type="submit" class="custom-btn">Become a provider</button>-->
                                <div class="form-group col-lg-12 mt-3">
                                    <div id="accordion" class="payment-accordion">
                                       
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button"
                                                            data-toggle="collapse" data-target="#collapseTwo"
                                                            aria-expanded="false" aria-controls="collapseTwo"
                                                            data-payment="stripe">
                                                        Pay with Credit Card <img
                                                                src="{{ asset('images/payment1.png') }}" alt=""
                                                                width="150">
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                                 data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="stripe-form-wrapper require-validation"
                                                         data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                                         data-cc-on-file="false">
                                                        <div id="card-element"></div>
                                                        <div id="card-errors" role="alert"></div>
                                                        <div class="form-group">
                                                            <button class="btn btn-red btn-block" type="button" style="background: #5798fc; color: #fff;"
                                                                    id="stripe-submit">Pay Now ${{ $subtotal }}</button>
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
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $(document).ready(function () {
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
        $('#accordion .btn-link').on('click', function (e) {
            if (!$(this).hasClass('collapsed')) {
                e.stopPropagation();
            }
            $('#payment_method').val($(this).attr('data-payment'));
        });
        paypal.Button.render({
            env: 'sandbox', //production

            style: {
                label: 'checkout',
                size: 'responsive',
                shape: 'rect',
                color: 'gold'
            },
            client: {
                sandbox: 'AV06KMdIerC8pd6_i1gQQlyVoIwV8e_1UZaJKj9-aELaeNXIGMbdR32kDDEWS4gRsAis6SRpUVYC9Jmf',
                // production:'ARIYLCFJIoObVCUxQjohmqLeFQcHKmQ7haI-4kNxHaSwEEALdWABiLwYbJAwAoHSvdHwKJnnOL3Jlzje',
            },
            validate: function (actions) {
                actions.disable();
                paypalActions = actions;
            },

            onClick: function (e) {
                var errorCount = checkEmptyFileds();

                if (errorCount == 1) {
                    toastr.error('Please fill the required fields before proceeding to pay');

                    paypalActions.disable();
                } else {
                    paypalActions.enable();
                }
            },
            payment: function (data, actions) {
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: {total: {{number_format(((float)$subtotal),2, '.', '')}}, currency: 'USD'}
                            }
                        ]
                    }
                });
            },
            onAuthorize: function (data, actions) {
                return actions.payment.execute().then(function () {
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
                        payment_status: 'Completed',
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
            onCancel: function (data, actions) {
                var params = {
                    payment_status: 'Failed',
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

        card.addEventListener('change', function (event) {
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

        $('#stripe-submit').click(function () {
            stripe.createToken(card).then(function (result) {
                var errorCount = checkEmptyFileds();
                if ((result.error) || (errorCount == 1)) {
                    // Inform the user if there was an error.
                    if (result.error) {
                        var errorElement = document.getElementById('card-errors');
                        $(errorElement).show();
                        errorElement.textContent = result.error.message;
                    } else {
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

        function checkEmptyFileds() {
            var errorCount = 0;
            $('form#sign-up').find('.form-control').each(function () {
                if ($(this).prop('required')) {
                    if (!$(this).val()) {
                        $(this).parent().find('.invalid-feedback').addClass('d-block');
                        $(this).parent().find('.invalid-feedback strong').html('Field is Required');
                        errorCount = 1;
                    }
                }
            });
            return errorCount;
        }
    </script>

    <script>
        const refresh_stripe_button_state = () => {
            $('#stripe-submit').prop('disabled', !($('#checkbox_agreed_to_terms').prop('checked')));
            $('#stripe-submit').prop('title', $('#checkbox_agreed_to_terms').prop('checked') ? '' : 'Please read and accept our terms/privacy policy.');
        }
        refresh_stripe_button_state();

        $('#checkbox_agreed_to_terms').on('change', function () {
            refresh_stripe_button_state();
        });
    </script>
@endsection
