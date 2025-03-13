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


            <div class="col-md-6">
                <div class="main-job">
                    <div class="full-time">
                        <p> Due Date : {{ $get_all_new_job_byid->due_date }} </p>
                    </div>
                    <div class="center-info">


                        <h6> {{ $get_all_new_job_byid->job_title }}  </h6>
                        <hr>
                        <p><a href="#"><i class=""></i> <b> <u> Description : </u> </b> <br> {!! $get_all_new_job_byid->job_description !!} </a></p>
                        <hr>
                        <p><a href="#"><i class=""></i> <b> <u> Location : </u> </b> <br> {!! $get_all_new_job_byid->location !!} </a></p>
                        <hr>
                        <p><a href="#"><i class=""></i> <b> <u> Company : </u> </b> <br> {!! $get_all_new_job_byid->company_name !!} </a></p>
                        <hr>
                        <p><a href="#"><i class=""></i> <b> <u> Job Type : </u> </b> <br> {!! $get_all_new_job_byid->job_type !!} </a></p>
                        <hr>
                        <p><a href="#"><i class=""></i> <b> <u> Salary : </u> </b> <br> {!! $get_all_new_job_byid->salary_range !!} </a></p>
                        <hr>
                        <p><a href="#"><i class=""></i> <b> <u> Required Education : </u> </b> <br> {!! $get_all_new_job_byid->required_education !!} </a></p>
                        <hr>
                        <p><a href="#"><i class=""></i> <b> <u> Required Skills : </u> </b> <br> {!! $get_all_new_job_byid->skills !!} </a></p>
                        <hr>
                        <p><a href="#"><i class=""></i> <b> <u> Instruction : </u> </b> <br> {!! $get_all_new_job_byid->instruction !!} </a></p>

                        <hr>
                        <p><a href="#"><i class=""></i> <b> <u> Job Post Date : </u> </b> <br> {!! $get_all_new_job_byid->post_date !!} </a></p>
                        <p><a href="#"><i class=""></i> <b> <u> Last Date For Apply : </u> </b> <br> {!! $get_all_new_job_byid->due_date !!} </a></p>


                    </div>
                    <!-- <div class="apply">
                        <a href="#" class="custom-btn views">View Details</a>
                        <a href="#" class="custom-btn now">Apply Now</a>
                    </div> -->
                </div>
            </div>

            <div class="col-md-6">
                <div class="main-job">
                    <div class="full-time">
                        <p> Apply Form </p>
                    </div>

                    <?php $job_id = Request::segment(2); ?>

                    <form action="{{route('save_apply_for_job')}}" method="post" enctype= multipart/form-data>

                        @csrf

                        <br>

                        <input type="hidden" name="job_id" value="{{$job_id}}">
                        <input type="hidden" name="requester_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="job_creator_id" value="{{$get_all_new_job_byid->creator_name}}">



                        <div class="center-info">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" placeholder="Enter Name" id="name" class="form-control" value="{{Auth::user()->name}}" readonly>
                            </div>
                        </div>

                        <div class="center-info">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" placeholder="Enter Email" id="email" class="form-control" value="{{Auth::user()->email}}" readonly>
                            </div>
                        </div>

                        <div class="center-info">
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" name="contact" id="contact" placeholder="Enter Contact No" class="form-control" value="{{Auth::user()->contact}}" Required>
                            </div>
                        </div>

                        <div class="center-info">
                            <div class="form-group">
                                <label for="job_title">Job Title</label>
                                <input type="text" name="job_title" placeholder="Enter Job Title" id="job_title" class="form-control" value="{{ App\Models\Job_post::find($job_id)->job_title }}" readonly>
                            </div>
                        </div>

{{--                        <div class="center-info">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="job_type">Job Type</label>--}}
{{--                                <input type="text" name="job_type" placeholder="Enter Job Type" id="job_type" class="form-control" Required>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <div class="center-info">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="contact">Location</label>--}}
{{--                                <textarea name="location" id="location" placeholder="Enter Location" class="form-control" rows="3" Required></textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}


                        <div class="center-info">
                            <div class="form-group">
                                <label for="expected_salary">Expected Salary</label>
                                <input type="text" name="expected_salary" placeholder="Enter Expected Salary" id="expected_salary" class="form-control" Required>
                            </div>
                        </div>


                        <div class="center-info">
                            <div class="form-group">
                                <label for="education">Education</label>
                                <input type="text" name="education" placeholder="Enter Education" id="education" class="form-control" Required>
                            </div>
                        </div>


                        <div class="center-info">
                            <div class="form-group">
                                <label for="skills">Skills</label>
                                <input type="text" name="skills" placeholder="Enter Skills" id="skills" class="form-control" Required>
                            </div>
                        </div>

                        <input type="hidden" name="apply_date" id="apply_date" value="{{\Carbon\Carbon::now()->format('Y-m-d ')}}">

                        <div class="center-info">
                            <div class="form-group">
                                <label for="about">About </label>
                                <textarea type="text" name="about" id="about" placeholder="About Yourself" class="form-control" rows="3" Required></textarea>
                            </div>
                        </div>


                        <div class="center-info">
                            <div class="form-group">
                                <label for="resume">Upload Resume </label>
                                <input type="file" name="resume" id="resume" class="form-control" rows="3" Required>
                            </div>
                        </div>


                        <div class="apply">
                            <!-- <a href="#" class="custom-btn views">View Details</a> -->
                            <button type="submit" class="custom-btn now btn-block">Apply Now</button>
                        </div>

                    </form>

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
