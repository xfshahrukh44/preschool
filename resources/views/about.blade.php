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

/*.top-bottom {*/
/*  background-image: url('{{asset($section[0]->value)}}');*/
/*  background-position: center;*/
/*  background-repeat: no-repeat;*/
/*  background-size: cover;*/
/*  height: 820px;*/
/*  box-shadow: 0px 0px 14px 2px #0000002b;*/
/*  border-radius: 20px;*/
/*}*/
/*.top-bottom.two {*/
/*  background-image: url('{{asset($section[2]->value)}}');*/
/*  background-position: center;*/
/*  background-repeat: no-repeat;*/
/*  background-size: cover;*/
/*  height: 720px;*/
/*  margin-top: 100px;*/
/*}*/


.top-bottom {
  background-image: url('{{asset($section[0]->value)}}');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 830px;
  box-shadow: 0px 0px 14px 2px #0000002b;
  border-radius: 20px;

}

.top-bottom.two {
  background-image: url('{{asset($section[2]->value)}}');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 830px;
  box-shadow: 0px 0px 14px 2px #0000002b;
  border-radius: 20px;
}


.about-sec-three {
  background-image: url('{{asset($section[4]->value)}}');
  background-position: left;
  background-size: 50%;
  background-color: #000000;
  background-repeat: no-repeat;
  height: auto;
  padding: 3rem 0;
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
                <div class="about-us" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </div>
</section>


<section class="about-sec-two pt-about">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6 col-12">
                <div class="top-bottom" data-aos="flip-right" data-aos-easing="linear" data-aos-duration="1500">
                    <div class="about-bottom">

                    {!! $section[1]->value !!}

                    </div>

{{--                    <a href="{{route('become-a-provider')}}" style="margin-left:20px; margin-top:10px;" class="custom-btn pink"> Enrolled Now </a>--}}

                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
                <div class="top-bottom two" data-aos="flip-left" data-aos-easing="linear" data-aos-duration="1500">
                    <div class="about-bottom two">

                    {!! $section[3]->value !!}

                    </div>

                    <br><br><br><br><br>
{{--                    <a href="{{route('become-a-teacher')}}" style="text-align:center; margin-left:15px;" class="custom-btn pink"> Enrolled Now </a>--}}

                </div>
            </div>

        </div>
    </div>
</section>

<section class="about-sec-three about-pg" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="our-goal">

                {!! $section[5]->value !!}

                </div>
            </div>

        </div>
    </div>
</section>


<section class="how-this-work" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1500">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="work">

                {!! $section[6]->value !!}

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

