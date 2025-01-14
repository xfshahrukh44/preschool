@extends('layouts.main')

@section('css')
<style>

.about-sec-one {
    background-image: url(<?php echo asset('images/iStock-684061754--crop.jpg'); ?>);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 450px;
    display: flex;
    align-items: center;
}

#embed-map-display .text-marker{}.map-generator{
    max-width: 100%;
    max-height: 100%;
    background: none;
}

.spc {
    justify-content: center;
    display: flex;
    margin-top: 100px;
}

</style>
@endsection


@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->



<section class="about-sec-one Teacher-Banner joinnow">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="about-us" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">

{{--                    <h2> Join Now </h2>--}}
                    <h2> Enroll Now </h2>

                </div>
            </div>
        </div>
    </div>
</section>


<section class="mt-btn join-now-style" style="height:250px;">

    <div class="container">

        <div class="row">

{{--            <div class="col-lg-4"> --}}
{{--            --}}
{{--                <a href="{{'signup'}}" class="custom-btn spc" type="submit" style="color:#fff !important;<?php if($segment == "signup"){ echo 'background-color:#f84c8f';} ?>">   Become A User </a>--}}
{{--            --}}
{{--            </div>--}}

            <div class="col-lg-6 col-md-6 col-6">

{{--                <a href="{{'become-a-teacher'}}" class="custom-btn spc" type="submit" style="color:#fff !important;<?php if($segment == "become-a-teacher"){ echo 'background-color:#f84c8f';} ?>">   Become A Teacher </a>--}}
                <a href="{{'become-a-teacher'}}" class="custom-btn spc" type="submit" style="color:#fff !important;<?php if($segment == "become-a-teacher"){ echo 'background-color:#f84c8f';} ?>">Individual</a>

            </div>

            <div class="col-lg-6  col-md-6 col-6">

{{--                <a href="{{'become-a-provider'}}" class="custom-btn spc" type="submit" style="color:#fff !important;<?php if($segment == "become-a-provider"){ echo 'background-color:#f84c8f';} ?>">  Become A Provider </a> --}}
                <a href="{{'become-a-provider'}}" class="custom-btn spc" type="submit" style="color:#fff !important;<?php if($segment == "become-a-provider"){ echo 'background-color:#f84c8f';} ?>">  Business </a>

            </div>

        </div>

    </div>


</section>

<!-- ============================================================== -->


@endsection


@section('js')
<script type="text/javascript"></script>
@endsection
