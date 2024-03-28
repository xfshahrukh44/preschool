@extends('layouts.main')
@section('title', 'Account')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


<style>
.about-sec-one {
    background-image: url(<?php echo asset('images/find_day_care.png'); ?>);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 450px;
    display: flex;
    align-items: center;
}

.modal-body {
    position: relative;
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1rem;
    max-height: 590px !important;
    overflow-y: scroll !important;
}

 .payment-accordion img {
    display: inline-block;
    margin-left: 10px;
    background-color: white;
  }
  form#order-place .form-control {
    border-width: 1px;
    border-color: rgb(150, 163, 218);
    border-style: solid;
    border-radius: 8px;
    background-color: transparent;
    height: 54px;
    padding-left: 15px;
    color: black;
  }
  form#order-place textarea.form-control {
      height: auto !important;
  }

  .checkoutPage {
      padding: 50px 0px;
  }
  .checkoutPage .section-heading h3{
      margin-bottom: 30px;
  }
  .YouOrder {
      background-color: #c91d22;
      color: white;
      padding: 25px;
      padding-bottom: 2px;
      min-height: 300px;
      border-radius: 3px;
      margin-bottom: 20px;
  }
  .amount-wrapper {
      padding-top: 12px;
      border-top: 2px solid white;
      text-align: left;
      margin-top: 90px;
  }

  .amount-wrapper h2 {
      font-size: 20px;
      display: flex;
      justify-content: space-between;
  }
  .amount-wrapper h3 {
      display: FLEX;
      justify-content: SPACE-BETWEEN;
      font-size: 22px;
      border-top: 2px solid white;
      padding-top: 10px;
      margin-top: 14px;
  }
  .checkoutPage span.invalid-feedback strong {
      color: #721c24;
      background-color: #f8d7da;
      border-color: #f5c6cb;
      display: block;
      width: 100%;
      font-size: 15px;
      padding: 5px 15px;
      border-radius: 6px;
  }
  .payment-accordion .btn-link {
    display: block;
    width: 100%;
    text-align: left;
    padding: 10px 19px;
    color: black;
  }

  .payment-accordion .card-header {
      padding: 0px !important;
  }
  .payment-accordion .card-header:first-child{
    border-radius: 0px;
  }
  .payment-accordion .card{
    border-radius: 0px;
  }
  .form-group.hide {
    display: none;
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

<?php $segment = Request::segments(); ?>

<section class="about-sec-one Teacher-Banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="about-us" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                    <h2> FIND DAYCARE & CLAIM </h2>
                </div>
            </div>
        </div>
    </div>
</section>

<br><br><br>

<main class="my-cart">
    <div class="my-account-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="myaccount-page-wrapper">
                        <div class="row">

                            <div class="col-lg-12 col-md-12">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="dashboad">
                                        <div class="myaccount-content">
                                            <div class="section-heading">

                                                <div class="row">
                                                    <!--@dump($amount->amount)-->
                                                    @if($amount->amount == '0')

                                                        <div class="col-md-12" style="margin-top:50px;">
                                                            <form class="order-search" action="{{route('order-search')}}" method="post" id="order-search" >
                                                                @csrf
                                                                <input type="hidden" name="payment_id" value="" />
                                                                <input type="hidden" name="payer_id" value="" />
                                                                <input type="hidden" name="payment_status" value="" />
                                                                <input type="hidden" name="payment_method" id="payment_method" value="paypal" />

                                                                <div class="container">
                                                                <div id="accordion" class="payment-accordion">

                                                                  <!--<div class="card">-->
                                                                    <!--<div class="card-header" id="headingOne">-->
                                                                    <!--  <h5 class="mb-0">-->
                                                                    <!--    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" data-payment="paypal">-->
                                                                    <!--      Pay with Paypal <img src="{{ asset('images/paypal.png') }}" width="60" alt="">-->
                                                                    <!--    </button>-->
                                                                    <!--  </h5>-->
                                                                    <!--</div>-->
                                                                    <?php
                                                                        $subtotal = App\Http\Traits\HelperTrait::returnFlag(1974);
                                                                    ?>
                                                                    <!--<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">-->
                                                                    <!--  <div class="card-body">-->
                                                                    <!--    <input type="hidden" name="price" value="{{ App\Http\Traits\HelperTrait::returnFlag(1974) }}" />-->
                                                                    <!--    <div id="paypal-button-container-popup"></div>-->
                                                                    <!--  </div>-->
                                                                    <!--</div>-->
                                                                  <!--</div>-->
                                                                  <div class="card">
                                                                    <div class="card-header" id="headingTwo">
                                                                      <h5 class="mb-0">
                                                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" data-payment="stripe">
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
                                                                            <button class="btn btn-red btn-block" type="button" id="stripe-submit" style="background: #646464; color: #fff;">Pay Now ${{ $subtotal }}  </button>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>

                                                                </div>

                                                            </form>
                                                        </div>

                                                    @else


                                                    <div class="col-md-12" style="margin-top:50px;">


                                                         <form method="get" class="d-flex" action="{{ route('finddaycare') }}">

                                                            <div class="col-md-12 d-flex" >

                                                                <input type="text" name="search" class="form-control" placeholder="Enter State Name" value="{{$search}}" style="width: 50% !important; margin-left: 200px;" required/>
                                                                &nbsp;&nbsp;
                                                                <button type="submit" class="btn btn-primary" style="width: 25%; height: 50px;" > FIND YOUR DAYCARE CENTER </button>

                                                            </div>

                                                        </form>

                                                        <hr>

                                                        <br><br>


                                                        <table id="example1" style="width:100%;" class="table table-hover table-bordered table-striped text-center">

                                                            <thead>
                                                                <tr>
                                                                    <th> Action </th>
                                                                    <th>Name</th>
                                                                    <th>County</th>
                                                                    <th>City</th>
                                                                    <!--<th>Program Type</th>-->
                                                                    <th>Address</th>
                                                                    <th>Zip</th>
                                                                    <th>Phone</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                @foreach($childCare as $key => $value)
                                                                    <tr>
                                                                        <td>
                                                                           @if($value->claim_status == "1")
                                                                                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$value->id}}"> CLAIM </button>
                                                                           @else
                                                                                <button class="btn btn-secondary"> CLAIMED </button>
                                                                           @endif
                                                                        </td>
                                                                        <td>{{$value->name ? $value->name : 'N\A' }}</td>
                                                                        <td>{{$value->county ? $value->county : 'N\A'}}</td>
                                                                        <td>{{$value->city ? $value->city : 'N\A'}}</td>
                                                                        <!--<td>{{$value->program_type ? $value->program_type : 'N\A'}}</td>-->
                                                                        <td>{{$value->physical_address ? $value->physical_address : 'N\A'}}</td>
                                                                        <td>{{$value->zip ? $value->zip : 'N\A'}}</td>
                                                                        <td>{{$value->phone ? $value->phone : 'N\A'}}</td>
                                                                    </tr>

                                                                    <!-- The Modal -->
                                                                    <div class="modal fade" id="myModal{{$value->id}}" data-backdrop="static" data-keyboard="false">
                                                                        <div class="modal-dialog modal-lg">
                                                                          <div class="modal-content">

                                                                            <form  id="form{{$value->id}}" action="{{ route('update_daycare_center') }}" method="post" enctype="multipart/form-data">

                                                                                @csrf



                                                                            <!-- Modal Header -->
                                                                            <div class="modal-header">
                                                                              <h5 class="modal-title text-center">Claimed Daycare Center</h5>
                                                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            </div>

                                                                            <!-- Modal body -->
                                                                            <div class="modal-body">

                                                                                <p class="text-center"> {{$value->name}} </p>

                                                                                <hr>

                                                                                <div class="row">

                                                                                    <div class="col-md-12 mb-2">

                                                                                        <input type="hidden" name="id" value="{{ $value->id }}"/>

                                                                                        <label> Name </label>
                                                                                        <input type="text" value="{{$value->name}}" class="form-control" readonly/>

                                                                                    </div>

                                                                                    <div class="col-md-6 mb-2">

                                                                                        <label> County </label>
                                                                                        <input type="text" name="county" value="{{$value->county}}" class="form-control" required/>

                                                                                        <br>

                                                                                        <label> Zipcode </label>
                                                                                        <input type="text" name="zip" value="{{$value->zip}}" class="form-control" required/>

                                                                                        <br>

                                                                                        <label> Address </label>
                                                                                        <input type="text" name="physical_address" value="{{$value->physical_address}}" class="form-control" required/>

                                                                                    </div>

                                                                                    <div class="col-md-6 mb-2">

                                                                                        <label> City </label>
                                                                                        <input type="text" name="city" value="{{$value->city}}" class="form-control" required/>

                                                                                        <br>

                                                                                        <label> Phone </label>
                                                                                        <input type="text" name="phone" value="{{$value->phone}}" class="form-control" required/>

                                                                                        <br>

                                                                                        <label> Email </label>
                                                                                        <input type="text" name="email_address" value="{{$value->email_address}}" class="form-control" required/>

                                                                                    </div>

                                                                                     <div class="col-md-12 mb-2">

                                                                                        <label> Description </label>
                                                                                        <textarea type="text" style="height: 120px;" name="description" class="form-control" required> {{$value->description}} </textarea>

                                                                                    </div>

                                                                                    <div class="col-md-12 mb-2">

                                                                                        <label> Feature Image </label>
                                                                                        <input type="file" name="feature_image" class="form-control" />

                                                                                    </div>

                                                                                    <div class="col-md-12 mb-2">

                                                                                        <label> Other Image 1 </label>
                                                                                        <input type="file" name="other_image_one" class="form-control" />

                                                                                    </div>

                                                                                    <div class="col-md-12 mb-2">

                                                                                        <label> Other Image 2 </label>
                                                                                        <input type="file" name="other_image_two" class="form-control" />

                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                            <!-- Modal footer -->
                                                                            <div class="modal-footer">
                                                                              <input type="submit" class="btn btn-primary" />
                                                                            </div>

                                                                            </form>

                                                                          </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </tbody>

                                                        </table>

                                                    </div>

                                                    @endif


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div> <!-- My Account Page End -->
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->


<!-- main content end -->
</main>

<br><br><br>

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
    var form = document.getElementById('order-search');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
    form.submit();
  }
  function checkEmptyFileds(){
    var errorCount = 0;
    $('form#order-search').find('.form-control').each(function(){
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

<!--<script type="text/javascript">-->
<!--     $(document).on('click', ".btn1", function(e){-->
            // alert('it works');
<!--            $('.loginForm').submit();-->
<!--     });-->
<!--</script>-->



@endsection
