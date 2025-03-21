@extends('layouts.main')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <style>
        .about-sec-one {
            /*background-image: url(<?php //echo asset('images/194-scaled.jpg');
            ?>);*/
            background-image: url(<?php echo asset('images/provider-image.webp'); ?>);
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


    <section class="about-sec-one Teacher-Banner provider-banner">
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
                    <div class="images-zag " data-aos="flip-left" data-aos-easing="linear" data-aos-duration="1500">
                        <figure>
                            <img src="{{ asset('images/provv.png') }}" class="img-fluid" alt="">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-12">
                    <div class="content-zig mt-0 pt-0 priority" data-aos="fade-down" data-aos-easing="linear"
                        data-aos-duration="1500">
                        {{-- <p><span>FOR BECOME A PROVIDER</span></p> --}}
                        <h6>
                            Provider Registration
                        </h6>

                        <form class="sign-up" method="POST" action="{{ route('register') }}" id="sign-up">
                            @csrf
                            <?php
                            $total = App\Http\Traits\HelperTrait::returnFlag(1973);
                            ?>

                            <input type="hidden" name="payment_id" value="" />
                            <input type="hidden" name="amount" value="10" />
                            <input type="hidden" name="payer_id" value="" />
                            <input type="hidden" name="payment_status" value="" />
                            <input type="hidden" name="amount" value="{{ $total }}" />
                            <input type="hidden" name="payment_method" id="payment_method" value="stripe" />

                            <div class="row">

                                <input type="hidden" name="role" value="4" />



                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="name" placeholder="Business Name"
                                        required="" />
                                </div>
                                {{-- @dd($errors->registerForm->get('email')[0]) --}}
                                @if ($errors->registerForm->has('name'))
                                    <small
                                        class="alert alert-danger w-100 d-block p-2 mt-2 mx-3">{{ $errors->registerForm->get('name')[0] }}</small>
                                @endif

                                <div class="col-lg-6 pl-lg-1 pl-md-1">
                                    <input type="text" class="form-control" name="phone"
                                        placeholder="Business Phone  Number" required="" />
                                </div>
                                @if ($errors->registerForm->has('phone'))
                                    <small
                                        class="alert alert-danger w-100 d-block p-2 mt-2 mx-3">{{ $errors->registerForm->get('phone')[0] }}</small>
                                @endif

                                <div class="col-lg-12 mt-3">
                                    <textarea name="address" placeholder="Business Address" id="" cols="30" rows="4"
                                        class="form-control"></textarea>
                                    {{-- <input type="text" class="form-control" name="address" placeholder="Business Address" required=""/> --}}
                                </div>
                                @if ($errors->registerForm->has('address'))
                                    <small
                                        class="alert alert-danger w-100 d-block p-2 mt-2 mx-3">{{ $errors->registerForm->get('address')[0] }}</small>
                                @endif

                                <div class="col-lg-6 mt-3">
                                    <input type="name" class="form-control" name="name" placeholder="Name"
                                        required="" />
                                </div>
                                @if ($errors->registerForm->has('name'))
                                    <small
                                        class="alert alert-danger w-100 d-block p-2 mt-2 mx-3">{{ $errors->registerForm->get('name')[0] ?? '' }}</small>
                                @endif
                                <div class="col-lg-6 mt-3">
                                    <input type="position" class="form-control" name="position" placeholder="Position"
                                        required="" />
                                </div>
                                @if ($errors->registerForm->has('position'))
                                    <small
                                        class="alert alert-danger w-100 d-block p-2 mt-2 mx-3">{{ $errors->registerForm->get('position')[0] ?? '' }}</small>
                                @endif
                                <div class="col-lg-6 mt-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                        required="" />
                                </div>
                                @if ($errors->registerForm->has('email'))
                                    <small
                                        class="alert alert-danger w-100 d-block p-2 mt-2 mx-3">{{ $errors->registerForm->get('email')[0] ?? '' }}</small>
                                @endif

                                <div class="col-lg-6 mt-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password"
                                        required="" />
                                </div>
                                @if ($errors->registerForm->has('password'))
                                    <small
                                        class="alert alert-danger w-100 d-block p-2 mt-2 mx-3">{{ $errors->registerForm->get('password')[0] }}</small>
                                @endif

                                {{-- <div class="col-lg-4 mt-3"> --}}
                                {{-- <span>Hour open</span> --}}
                                {{-- <div class="form-group"> --}}
                                {{-- <input type="text" class="form-control" name="hour_open" placeholder="1 to 3" --}}
                                {{-- required=""/> --}}
                                {{-- </div> --}}
                                {{-- </div> --}}
                                {{-- @if ($errors->registerForm->has('hour_open')) --}}
                                {{-- <small class="alert alert-danger w-100 d-block p-2 mt-2 mx-3">{{ $errors->registerForm->registerForm->first('hour_open') }}</small> --}}
                                {{-- @endif --}}

                                <div class="col-lg-12 mt-3">
                                    <span>What ages do you accept?</span>
                                    <div class="form-group">
                                        <select name="age_accepted[]" id="select1" class="form-control" multiple
                                            required>
                                            <option value="">Select an option</option>
                                            <option value="0-12 months">0-12 months</option>
                                            <option value="12-24 months">12-24 months</option>
                                            <option value="2-5 years">2-5 years</option>
                                            <option value="5+ years">5+ years</option>
                                        </select>
                                    </div>
                                </div>
                                @if ($errors->registerForm->has('age_accepted'))
                                    <small
                                        class="alert alert-danger w-100 d-block p-2 mt-2 mx-3">{{ $errors->registerForm->get('age_accepted')[0] }}</small>
                                @endif

                                <div class="col-md-7 mb-2 mt-4">
                                    <h4 class="ml-2 bigh"> Hours open </h4>

                                    <?php
                                    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                                    foreach ($days as $day): ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>
                                                    <span><?= $day ?></span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input class="form-control" type="time" name="timings[<?= $day ?>][from]">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input class="form-control" type="time" name="timings[<?= $day ?>][to]">
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
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


                                {{-- <div class="col-lg-12 mt-3"> --}}
                                {{-- <!--<span>Custom Age</span>--> --}}
                                {{-- <input type="number" class="form-control" name="custom_age" placeholder="Enter Age"> --}}
                                {{-- </div> --}}

                                {{-- <div class="col-lg-4 mt-3"> --}}
                                {{-- <span>Position accepted?</span> --}}
                                {{-- <div class="form-group"> --}}
                                {{-- <input type="text" class="form-control" name="position_accepted" --}}
                                {{-- placeholder="1 to 3" required=""> --}}
                                {{-- </div> --}}
                                {{-- </div> --}}
                                {{-- @if ($errors->registerForm->has('position_accepted')) --}}
                                {{-- <small class="alert alert-danger w-100 d-block p-2 mt-2 mx-3">{{ $errors->registerForm->registerForm->first('position_accepted') }}</small> --}}
                                {{-- @endif --}}


                                <div class="form-group col-lg-12 mt-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="about" rows="6"
                                        placeholder="Tell us about Business?"></textarea>
                                </div>
                                @if ($errors->registerForm->has('about'))
                                    <small
                                        class="alert alert-danger w-100 d-block p-2 mt-2 mx-3">{{ $errors->registerForm->get('about')[0] }}</small>
                                @endif

                                <div class="form-group col-lg-12 mt-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea2" name="about_preschool" rows="6"
                                        placeholder="How did you hear about preschool portal?"></textarea>
                                </div>
                                @if ($errors->registerForm->has('about_preschool'))
                                    <small
                                        class="alert alert-danger w-100 d-block p-2 mt-2 mx-3">{{ $errors->registerForm->get('about_preschool')[0] }}</small>
                                @endif

                                <div class="form-group col-lg-12 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="isLicensed"
                                            name="is_licensed">
                                        <label class="form-check-label" for="isLicensed">Are you licensed?</label>
                                    </div>
                                </div>

                                <div id="licenseFields" class="form-group col-lg-12 mt-3" style="display: none;">
                                    <div class="form-group">
                                        <label for="licenseNumber">License Number</label>
                                        <input type="text" class="form-control" id="licenseNumber"
                                            name="license_number" placeholder="Enter your license number">
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="expirationDate">Expiration Date</label>
                                        <input type="date" class="form-control" id="expirationDate"
                                            name="expiration_date">
                                    </div>
                                </div>

                                <div class="form-group col-lg-12 mt-3">
                                    <input type="checkbox" id="checkbox_agreed_to_terms" required>
                                    <label for="checkbox_agreed_to_terms">
                                        I have read the
                                        <a target="_blank" href="{{ route('termsandconditionprovider') }}">Terms and
                                            conditions</a>
                                    </label>
                                    {{-- <textarea class="form-control" id="exampleFormControlTextarea2" name="about_preschool" rows="6" placeholder="How did you hear about preschool portal?"></textarea> --}}
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
                                                        Pay with Credit Card ${{ $total }}<img
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
                                                        <!-- <div class="form-group">
                                                                <button class="btn btn-red btn-block" type="button"
                                                                    style="background: #5798fc; color: #fff;"
                                                                    id="stripe-submit">Pay Now ${{ $total }}</button>
                                                            </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-12 mt-3">
                                    <button type="button" id="stripe-submit"
                                        class="btn btn-primary btn-block">Register</button>
                                </div>
                            </div>


                        </form>


                    </div>




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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var stripe = Stripe("{{ env('STRIPE_KEY') }}");

            // Create an instance of Elements
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

            var cardElement = document.getElementById('card-element');
            if (cardElement) {
                var card = elements.create('card', {
                    style: style
                });
                card.mount('#card-element');

                card.addEventListener('change', function(event) {
                    var displayError = document.getElementById('card-errors');
                    if (event.error) {
                        displayError.textContent = event.error.message || "An error occurred.";
                    } else {
                        displayError.textContent = '';
                    }
                });
            }

            $('#stripe-submit').click(function() {
                stripe.createToken(card).then(function(result) {
                    var errorCount = checkEmptyFields();
                    if (result.error || errorCount === 1) {
                        // Handle Errors
                        if (result.error) {
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
                        } else {
                            toastr.error(
                                'Please fill the required fields before proceeding to pay');
                        }
                    } else {
                        // Handle Token
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                var form = document.getElementById('sign-up');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                form.submit();
            }

            function checkEmptyFields() {
                var errorCount = 0;
                $('form#sign-up').find('.form-control').each(function() {
                    if ($(this).prop('required') && !$(this).val()) {
                        $(this).parent().find('.invalid-feedback').addClass('d-block');
                        $(this).parent().find('.invalid-feedback strong').html('Field is Required');
                        errorCount = 1;
                    }
                });
                return errorCount;
            }
        });
    </script>


    <script>
        const refresh_stripe_button_state = () => {
            $('#stripe-submit').prop('disabled', !($('#checkbox_agreed_to_terms').prop('checked')));
            $('#stripe-submit').prop('title', $('#checkbox_agreed_to_terms').prop('checked') ? '' :
                'Please read and accept our terms/privacy policy.');
        }
        refresh_stripe_button_state();

        $('#checkbox_agreed_to_terms').on('change', function() {
            refresh_stripe_button_state();
        });

        document.getElementById('isLicensed').addEventListener('change', function() {
            document.getElementById('licenseFields').style.display = this.checked ? 'block' : 'none';
        });
    </script>
@endsection
