@extends('layouts.main')

@section('css')
<style>

.about-sec-one {
    background-image: url('{{asset($page->image)}}');
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

<!-- ============================================================== -->
<!-- BODY START HERE -->


<section class="about-sec-one">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="about-us"  data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                
                    {!! $page->content !!}

                </div>
            </div>
        </div>
    </div>
</section>


<section class="zig-zag">
    <div class="container">
        <div class="row">
            <div class="col-lg-6  col-md-6 col-12 p-0">
                <div class="images-zag" data-aos="flip-left" data-aos-easing="linear" data-aos-duration="1500">
                    <figure>
                        <img src="{{asset($section[0]->value)}}" class="img-fluid" alt="">
                    </figure>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="content-zig"  data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                
                {!! $section[1]->value !!}

                </div>
            </div>

            <!-- <div class="col-lg-6 col-md-6 col-12">
                <div class="content-zig"  data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                    <h6>
                        Find Quality Teachers
                    </h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 p-0">
                <div class="images-zag"  data-aos="flip-right" data-aos-easing="linear" data-aos-duration="1500">
                    <img src="images/14.png" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 p-0">
                <div class="images-zag"  data-aos="flip-left" data-aos-easing="linear" data-aos-duration="1500">
                    <img src="images/15.png" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="content-zig"  data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                    <h6>
                        Angel’s List
                    </h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem </p>
                </div>
            </div> -->

            <div class="col-lg-6 col-md-6 col-12">
                <div class="content-zig"  data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                
                {!! $section[2]->value !!}

                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 p-0">
                <div class="images-zag"  data-aos="flip-left" data-aos-easing="linear" data-aos-duration="1500">
                    <img src="{{asset($section[3]->value)}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ============================================================== -->


@endsection


@section('js')
<script type="text/javascript"></script>
@endsection