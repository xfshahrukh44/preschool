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


.main-job {
    box-shadow: 0px 0px 32px 2px #00000038;
    padding: 15px 17px;
    border-radius: 15px;
    text-align: center;
    margin-top: 40px;
    height: 18rem !important;
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

<section class="job-board">
    <div class="container-fluid">
        <div class="row">

            
            @foreach($get_all_new_job as $key => $val_newjob)
            <div class="col-md-4">
                <div class="main-job">
                    <div class="full-time">
                        <p> {{ $val_newjob->job_type }} </p>
                    </div>
                    <div class="center-info">
                        <h6> {{ $val_newjob->job_title }} </h6>
                        <p><a href="#"><i class="fa-solid fa-location-dot"></i> {{ $val_newjob->location }} </a></p>
                    </div>
                    <div class="apply">
                        <a href="{{route('apply_for_job',['id'=>$val_newjob->id])}}" class="custom-btn views">View Details</a>
                        <a href="{{route('apply_for_job',['id'=>$val_newjob->id])}}" class="custom-btn now">Apply Now</a>
                    </div>
                </div>
            </div>
            @endforeach



        </div>


        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="last-btn">
                    <a href="#">View More Jobs</a>
                </div>
            </div>
        </div> -->


    </div>
</section>


<!-- ============================================================== -->


@endsection


@section('js')
<script type="text/javascript"></script>
@endsection