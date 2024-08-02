@extends('layouts.main')

@section('css')
    <style>

        .sec-one {
        	background-image: url('{{ asset($page->image) }}');
        	background-position: center;
        	background-repeat: no-repeat;
        	background-size: cover;
        	height: 800px;
        	display: flex;
        	align-items: center;
          }


        header {
            background-color: #e3e6e6;
            position: relative;
            right: 0;
            left: 0;
            top: 20px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
        }

        .header-form {
            display: flex;
            justify-content: space-between;
            width: 80% !important;
            margin: auto;
            background-color: var(--header-color);
            align-items: center;
            border-radius: 5px;
            margin-top: 40px;
            padding-top: 6px;
            padding-right: 10px;
            padding-bottom: 6px;
            border: 1px solid #000;
        }

        .header-form input {
            width: 70% !important;
            background-color: transparent;
            border: none;
            font-size: 25px !important;
            padding: 0;
            padding-left: 12px;
        }

        .sec-one {

            margin-top: -80px;

        }

        .bloc-video {
            position: relative;
            height: 80vh;
        }

        .bloc-video video {
            width: 100%;
            height: 100px;
            object-fit: cover;
            z-index: -1;
            position: absolute;
            height: 80vh;
        }

        .bloc-video .content-video {
            flex-direction: column;
            color: #ffffff;
            /*margin-top: 280px;*/
            font-size: 62px;
        }

        .bloc-video .content-video .content-text,
        .content-button {
            /*display: flex;*/
            /*justify-content: center;*/

            position: absolute;
            left: 20%;
            top: 40%;


        }

        .bloc-video .content-video .content-button {
            /*margin-top: 25%;*/
        }

        .bloc-video .content-video .content-button button {

            cursor: pointer;
            padding: 10px;
            width: 200px;
            height: 60px;
            font-size: 16px;
            font-family: cursive;
            background: #fff;
            color: #000;
            border: 2px solid #000000;
            border-radius: 5px;
            text-transform: uppercase;

        }

        .bloc-video .content-video .content-button button:hover {
            transition: all .75s ease-in-out;
            background-color: #ffffff;
            color: #000000;
            transform: rotateX(360deg);
        }


        hh {
            color: var(--white-color);
            font-family: "Inter", sans-serif;
            font-weight: bold;
            font-size: 65px;
            line-height: 80px;
        }

        .box-new-img {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .box-new-img img {
            height: 100px !important;
            width: 100px !important;
        }

        .box-new-text ul {
            padding-left: 10px;
        }

        .box-new-text ul li p {
            margin: 0;
        }

        .box-new-1 {
            padding-top: 100px;
        }


        .services.aos-init.aos-animate {
            height: auto !important;
        }



        .top-bottom {
          background-image: url(<?php echo asset($section[25]->value); ?>);
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          height: 830px;
          box-shadow: 0px 0px 14px 2px #0000002b;
          border-radius: 20px;
        }

        .top-bottom.two {
          background-image: url(<?php echo asset($section[24]->value); ?>);
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          height: 830px;
          box-shadow: 0px 0px 14px 2px #0000002b;
          border-radius: 20px;
        }


        .about-sec-three {
          background-image: url(<?php echo asset($section[26]->value); ?>);
          background-position: left;
          background-size: 50%;
          background-color: #000000;
          background-repeat: no-repeat;
          height: 600px;
          display: flex;
          align-items: center;
        }

        .our-goal p {
            color: #b3b3b3;
            margin: auto;
            text-align: center;
            width: 70%;
            font-size: 25px !important;
            line-height: 25px;
            margin-top: 60px;
        }

    </style>
@endsection


@section('content')
    <!-- ============================================================== -->
    <!-- BODY START HERE -->


    <section class="sec-one">
        <div class="container">
            <div class="rwo">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="childcare" data-aos="fade-down" data-aos-duration="2000">

                        {!! $page->content !!}

                    </div>

                    <form method="get" action="{{ route('search') }}">
                        <div class="header-form">
                            <input type="text" class="form-control" name="search" id="validationCustom03" placeholder="Enter a zip code or city" required>
                            <button class="custom-btn">Search</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>


    <!--<section class="sec-one">-->
    <!--    <div class="bloc-video">-->
    <!--        <video autoplay muted loop>-->
    <!--            <source src="{{ asset($banner->video) }}" type="video/mp4">-->
    <!--        </video>-->
    <!--        <div class="content-video">-->
    <!--            <div class="content-text">-->
    <!--                <h1></h1>-->
    <!--            </div>-->
    <!--            <div class="content-button">-->
    <!--                <h2 class="hh"> Are You Looking For Childcare? </h2>-->

    <!--                <form method="get" action="{{ route('search') }}">-->

    <!--                    <div class="header-form">-->
    <!--                        <input type="text" name="search" class="form-control" id="validationCustom03"-->
    <!--                            placeholder="Enter a zip code or city" required>-->
    <!--                        <button type="submit" class="custom-btn"> Search </button>-->
    <!--                    </div>-->

    <!--                </form>-->

    <!--            </div>-->
    <!--        </div>-->
    <!--</section>-->


{{--    <section class="sec-two" style="background: url({{asset('images/doodle-wall.png')}})">--}}
    <section class="sec-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="priority" data-aos="fade-down" data-aos-duration="2000">

                        {!! $section[0]->value !!}

                    </div>
                </div>
                <!--<div class="main-col-div">-->
                <!--    <div class="row">-->
                <!--        <div class="col-lg-6 col-md-6 col-12">-->
                <!--            <div class="Provider" data-aos="flip-left" data-aos-duration="1500">-->

                <!--                {!! $section[1]->value !!}-->

                <!--                <a href="#" class="custom-btn pink">Learn More</a>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-lg-6 col-md-6 col-12">-->
                <!--            <div class="Provider" data-aos="flip-right" data-aos-duration="1500">-->

                <!--                {!! $section[2]->value !!}-->

                <!--                <a href="#" class="custom-btn pink">Learn More</a>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>
    </section>


{{--    <section class="about-sec-two" style="background: url({{asset('images/doodle-wall.png')}})">--}}
    <section class="about-sec-two">
        <div class="container">

            <div class="row">
                <div class="col-lg-6 col-md-6 col-12" style="background: white;">
                <div class="top-bottom aos-init aos-animate" data-aos="flip-right" data-aos-easing="linear" data-aos-duration="1500">
                    <div class="about-bottom">

                    {!! $section[1]->value !!}

                    </div>


{{--                 <a href="{{route('become-a-provider')}}" style="text-align:center; margin-left:15px;" class="custom-btn pink"> Enrolled Now </a>--}}

                </div>




                </div>
                <div class="col-lg-6 col-md-6 col-12" style="background: white;">
                <div class="top-bottom two aos-init aos-animate" data-aos="flip-left" data-aos-easing="linear" data-aos-duration="1500">
                    <div class="about-bottom two">

                   {!! $section[2]->value !!}

                    </div>

{{--                <a href="{{route('become-a-teacher')}}" style="text-align:center; margin-left:15px;" class="custom-btn pink"> Enrolled Now </a>--}}
                <br><br><br><br><br>

                </div>




                </div>
            </div>

        </div>
    </section>


    <section class="about-sec-three aos-init aos-animate" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="our-goal">

                {!! $section[27]->value !!}

                </div>
            </div>

        </div>
    </div>
</section>


{{--    <section class="sec-three" style="background: url({{asset('images/doodle-wall.png')}})">--}}
    <section class="sec-three">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="give-the-best">

                        {!! $section[3]->value !!}

                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-12">
                    <div class="give-the-best two">

                        {!! $section[4]->value !!}

                        <!--<a href="{{ route('contact') }}" class="custom-btn">Contact Us</a>-->
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="services" data-aos="flip-right" data-aos-duration="2000">

                        <figure>
                            <img src="{{ asset($section[5]->value) }}" class="img-fluid" alt="">
                        </figure>

                        {!! $section[6]->value !!}

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="services" data-aos="flip-left" data-aos-duration="2000">
                        <figure>
                            <img src="{{ asset($section[7]->value) }}" class="img-fluid" alt="">
                        </figure>

                        {!! $section[8]->value !!}

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="services" data-aos="flip-right" data-aos-duration="2000">
                        <figure>
                            <img src="{{ asset($section[9]->value) }}" class="img-fluid" alt="">
                        </figure>

                        {!! $section[10]->value !!}

                    </div>
                </div>
            </div>
        </div>
    </section>

{{--    <section class="sec-four" style="background: url({{asset('images/doodle-wall.png')}})">--}}
    <section class="sec-four">
        <div class="container">
            <div class="row" style="box-shadow: 0px 0px 20px 1px #0000002b;">
                <div style="background: white;" class="col-lg-12 col-md-12 col-12">
                    <div class="trands" data-aos="fade-down" data-aos-duration="2000">

                        {!! $section[11]->value !!}

                    </div>
                </div>
                <div style="background: white;" class="col-lg-4 col-md-4 col-12">
                    <div class="first-img" data-aos="flip-right" data-aos-duration="2000">
                        <figure>
                            <img src="{{ asset($section[12]->value) }}" class="img-fluid" alt="">
                        </figure>
                        <div class="teaching">

                            {!! $section[13]->value !!}

                            <!--<a href="#" class="custom-btn"><i class="fa-solid fa-arrow-right"></i> Read More</a>-->
                        </div>
                    </div>
                </div>
                <div style="background: white;" class="col-lg-4 col-md-4 col-12">
                    <div class="first-img" data-aos="zoom-in" data-aos-duration="2000">
                        <figure>
                            <img src="{{ asset($section[14]->value) }}" class="img-fluid" alt="">
                        </figure>
                        <div class="teaching">

                            {!! $section[15]->value !!}

                            <!--<a href="#" class="custom-btn"><i class="fa-solid fa-arrow-right"></i> Read More</a>-->

                        </div>
                    </div>
                </div>
                <div style="background: white;" class="col-lg-4 col-md-4 col-12">
                    <div class="first-img" data-aos="flip-left" data-aos-duration="2000">
                        <figure>
                            <img src="{{ asset($section[16]->value) }}" class="img-fluid" alt="">
                        </figure>
                        <div class="teaching">

                            {!! $section[17]->value !!}

                            <!--<a href="#" class="custom-btn"><i class="fa-solid fa-arrow-right"></i> Read More</a>-->

                        </div>
                    </div>
                </div>
            </div>
            <div class="row box-new-1" style="background: white; box-shadow: 0px 0px 20px 1px #0000002b">
                <div class="col-md-4">
                    <div class="box-new">
                        <div class="box-new-img">
                            <img src="{{ asset($section[18]->value) }}" class="img-fluid" />
                        </div>
                        <div class="box-new-text">
                            {!! $section[19]->value !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-new">
                        <div class="box-new-img">
                            <img src="{{ asset($section[20]->value) }}" class="img-fluid" />
                        </div>
                        <div class="box-new-text">
                            {!! $section[21]->value !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-new">
                        <div class="box-new-img">
                            <img src="{{ asset($section[22]->value) }}" class="img-fluid" />
                        </div>
                        <div class="box-new-text">
                            {!! $section[23]->value !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{--        <div class="col-lg-12 col-md-12 col-12 text-center mt-5">--}}
{{--            <div class="give-the-best">--}}
{{--                <a href="{{ route('joinnow') }}" class="custom-btn">Enroll now</a>--}}
{{--            </div>--}}
{{--        </div>--}}
    </section>


    <!-- ============================================================== -->

@endsection


@section('js')
    <script type="text/javascript"></script>
@endsection
