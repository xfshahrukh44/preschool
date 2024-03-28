@extends('layouts.main')
@section('title', 'Account')
@section('css')

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




</style>

@endsection
@section('content')

<?php $segment = Request::segments(); ?>

<section class="about-sec-one Teacher-Banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="about-us" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                    <h2> USER DASHBOARD </h2>
                </div>
            </div>
        </div>
    </div>
</section>

<br><br><br>

<main class="my-cart">
    <div class="my-account-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="myaccount-page-wrapper">
                        <div class="row">
                            @include('account.sidebar')
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="dashboad">
                                        <div class="myaccount-content">
                                            <div class="section-heading">
                                                <h4 style="color:#000; font-weight:bold;">Dashboard</h4>
    
                                                <div class="welcome">
                                                
                                                    <p>Hello, <strong>{{ Auth::user()->name }}</strong> (If Not <strong>{{ Auth::user()->name }} !</strong><a href="{{ url('logout') }}" class="logout"> Logout</a>)</p>
                                                </div>
        
                                                <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
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
<script type="text/javascript">
     $(document).on('click', ".btn1", function(e){
            // alert('it works');
            $('.loginForm').submit();
     });
</script>
@endsection