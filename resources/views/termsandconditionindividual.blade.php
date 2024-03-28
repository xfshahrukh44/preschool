@extends('layouts.main')

@section('css')
<style>

h2 span {
    color: #000;
    font-size: 40px !important;
    text-align: left !important;
    margin: 0 !important;
}

h2 {
    text-align: left !important;
}

h2 span span {
    color: #000;
    font-size: 40px !important;
    text-align: left !important;
    margin: 0px !important;
}

h2 {
    margin: 0 !important;
}

.about-sec-one {
    background-image: url('{{asset($page->image)}}');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 450px;
    display: flex;
    align-items: center;
}

.top-bottom {
  background-image: url('{{asset($section[0]->value)}}');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 820px;
  box-shadow: 0px 0px 14px 2px #0000002b;
  border-radius: 20px;
}
.top-bottom.two {
  background-image: url('{{asset($section[2]->value)}}');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 720px;
  margin-top: 100px;
}


.about-sec-three {
  background-image: url('{{asset($section[4]->value)}}');
  background-position: left;
  background-size: 50%;
  background-color: #000000;
  background-repeat: no-repeat;
  height: 600px;
  display: flex;
  align-items: center;
}
ol {
    list-style: none;
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
                <div class="about-us aos-init aos-animate" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                    <h2>{!! $page->name !!}</h2>
                </div>
                
            </div>
        </div>
    </div>
</section>


<section class="about-sec-two">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                {!! $page->content !!}
            </div>
        </div>
    </div>
</section>





<!-- ============================================================== -->


@endsection


@section('js')
<script type="text/javascript"></script>
@endsection