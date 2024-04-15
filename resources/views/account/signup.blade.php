@extends('layouts.main')
@section('content')

    <section class="about-sec-one Teacher-Banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="about-us" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">

                        <h2> Become A User </h2>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="top-prog-sec top-prog-sec2 contact-sec">
        <section class="inpage featurePro">
            <div class="container">

                <div class="row">

                    <div class="col-md-2"></div>

                    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 text-center">
                        <div class="account_form">
                            <form class="loginForm" method="POST" action="{{ route('register') }}">
                                @csrf

                                <input type="hidden" name="role" value="2"/>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <input type="text"
                                                   class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="name" placeholder="Full name" required>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <input type="text"
                                                   class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email" placeholder="Email" required>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
      							<strong>{{ $errors->first('email') }}</strong>
      						</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">

                                        <!--  <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" required>-->

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <input type="password"
                                                   class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                   name="password" placeholder="Password" required>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
        							<strong>{{ $errors->first('password') }}</strong>
        						</span>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class="row logRow">

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                        <div class="log submit-btn">

                                            <!--<a href="javascript:void(0)" class="btn btn1"> Register </a> --> <input
                                                    type="submit" class="log submit-btn" value="Register"/></div>

                                    </div>

                                </div>


                            </form>
                        </div>
                    </div>


                    <div class="col-md-2"></div>


                </div>
            </div>
        </section>

        <!-- END: Checkout Section -->
    </div>
    <!-- product page end-->




@endsection
@section('css')
    <style type="text/css">

        .account_form {
            margin: 70px 0px;
        }

        input.log.submit-btn {
            padding: 8px 30px;
            margin-right: 12px;
            background-image: -webkit-linear-gradient(90deg, rgb(162, 131, 0) 0%, rgb(203, 165, 0) 100%);
            margin-bottom: 12px;
            float: left;
            border-radius: unset;
            border-color: unset;
            color: #fff;
            text-transform: none;
        }


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
@section('js')
    <script type="text/javascript">
        $(document).on('click', ".btn1", function (e) {
            $('.loginForm').submit();
        });
    </script>
@endsection
