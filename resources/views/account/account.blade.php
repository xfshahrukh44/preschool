@extends('layouts.main')
@section('title', 'Account Details')
@section('content')

<?php $segment = Request::segments(); ?>


<section class="about-sec-one Teacher-Banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="about-us" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                    <h2> ACCOUNT DETAILS </h2>
                </div>
            </div>
        </div>
    </div>
</section>

<br><br><br>

<main class="my-cart">
    <!-- banner start -->
    <!-- banner end -->

<!-- main content start -->

 <!-- my account wrapper start -->
    <div class="my-account-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            @include('account.sidebar')
                            <!-- My Account Tab Menu End -->
    
                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                   
                                   <!-- Single Tab Content Start -->
                                    <div class="tab-pane active" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <!--<div class="section-heading">-->
                                            <!--    <h4 style="color:#000; font-weight:bold;">Account Details</h4>-->
                                            <!--</div>-->
    
                                            <div class="account-details-form">
                                               <form action="{{ route('update.account') }}" method="post" enctype="multipart/form-data" id="accountForm">
                                                @csrf
                                                    <div class="row">
                                                    
                                                        <div class="col-lg-12">
                                                            <div class="single-input-item">
                                                                <label for="last-name" class="required">Name</label>
                                                                <input type="text" class="form-control" id="last-name" name="uname" placeholder="Last Name" value="<?php echo Auth::user()->name; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="single-input-item">
                                                        <label for="email" class="required">Email Addres</label>
                                                        <input type="email" id="email" class="form-control" placeholder="Email Address" name="email" value="<?php echo Auth::user()->email; ?>">
                                                    </div>
    
                                                    <fieldset>
                                                        <legend>Password change</legend>
    
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="new-pwd" class="required">New Password</label>
                                                                    <input type="password" class="form-control" id="new-pwd" placeholder="New Password" name="password">
                                                                </div>
                                                            </div>
    
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="confirm-pwd" class="required">Confirm Password</label>
                                                                    <input type="password" class="form-control" id="confirm-pwd" placeholder="Confirm Password" name="password_confirmation">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
    
                                                    <div class="single-input-item">
                                                        <button class="check-btn sqr-btn btn btn-red" id="updateProfile">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> <!-- Single Tab Content End -->
    
                                    
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
@section('css')
<style type="text/css">
    
    
	.about-sec-one {
        background-image: url('https://testdemowebsite-v1.com/custom-backend/preschool_portal/public/uploads/pages/9_(2)_1680636205.png');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 450px;
        display: flex;
        align-items: center;
    }



button, input, optgroup, select, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    border: 1px solid !important;
}

</style>
@endsection
@section('js')

<script type="text/javascript">

 $(document).on('click', "#updateProfile", function(e){
        $('#accountForm').submit();
  });

</script>

@endsection