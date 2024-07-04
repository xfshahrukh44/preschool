@extends('layouts.main')

@section('css')
<style>

	.about-sec-one {
        background-image: url('<?php echo asset('images/techer-banner.webp'); ?>');
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


<section class="about-sec-one Teacher-Banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="about-us" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                    <h2 style="color:black !important;">Teachers</h2>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="zig-zag Teacher-sec">
    <div class="container">
        <div class="row">

            <div class="col-lg-5 col-md-6 col-12 p-0">
                <div class="images-zag womenimg" data-aos="flip-left" data-aos-easing="linear" data-aos-duration="1500">
                    <figure>
                        <img src="images/teacher-standing-in-front-of-chalkboard-in-classroom-683x1024.jpg" class="img-fluid" alt="">
                    </figure>
                </div>
            </div>

            <div class="col-lg-7 col-md-6 col-12">
                <div class="content-zig mt-0 pt-0 priority" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
{{--                    <p><span>FOR BECOME A INSTRUCTOR</span></p>--}}
                    <h6>
                        Teacher Registration
                    </h6>

                    <form class="teacher-form" method="POST" action="{{route('register')}}">

                        @csrf

                        <input type="hidden" name="role" value="3">

                        <div class="row">
                            <div class="col-lg-6">
                                <label>
                                    <small><b>First name</b></small>
                                </label>
                                <input type="text" class="form-control" name="name" required="">
                            </div>
                            <div class="col-lg-6 pl-lg-1 pl-md-1">
                                <label>
                                    <small><b>Last name</b></small>
                                </label>
                                <input type="text" class="form-control" name="lname" required="">
                            </div>
                            <div class="col-lg-6 mt-3">
                                <label>
                                    <small><b>Gender</b></small>
                                </label>
                                <div class="form-group">
                                    <select class="form-control" name="gender"  id="exampleFormControlSelect1">
                                        <option value="0">Gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-3 pl-lg-1 pl-md-1">
                                <label for="Date of birth">
                                    <small><b>D.O.B</b></small>
                                </label>
                                <input class="form-control" name="dob" type="date" id="">
                            </div>
                            <div class="col-lg-6 mt-3">
                                <label>
                                    <small><b>Phone Number</b></small>
                                </label>
                                <input type="number" class="form-control" name="phone" required="">
                            </div>
                            <div class="col-lg-6 mt-3">
                                <label>
                                    <small><b>Email</b></small>
                                </label>
                                <input type="email" class="form-control" name="email" required="">
                            </div>
                            <div class="col-lg-6 mt-3">
                                <label>
                                    <small><b>Password</b></small>
                                </label>
                                <input type="password" class="form-control" name="password" required="">
                            </div>
                            <div class="col-lg-12 mt-1">
                                <label>
                                    <small><b>Address</b></small>
                                </label>
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="address"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 pl-lg-1 pl-md-1">
                                <label>
                                    <small><b>Do you currently work?</b></small>
                                </label>
                                <input id="do_you_work_1" type="radio" class="do_you_work" name="do_you_work" value="1" required>
                                <label for="do_you_work_1">
                                    <small><b>Yes</b></small>
                                </label>
                                <input id="do_you_work_0" type="radio" class="do_you_work" name="do_you_work" value="0" required>
                                <label for="do_you_work_0">
                                    <small><b>No</b></small>
                                </label>
                            </div>
                        </div>

                        <div class="form-group form-group-work" hidden>
                            <div class="row">

                                <div class="col-lg-6">
                                    <label>
                                        <small><b>Current Position</b></small>
                                    </label>
                                    <div class="form-group">
                                        <select name="current_position" class="form-control" id="current_position">
                                            {{--                                        <option>Current Position / Current Employer</option>--}}
                                            <option value=""> Select position </option>
                                            <option value="Owner"> Owner </option>
                                            <option value="Director"> Director </option>
                                            <option value="Teacher"> Teacher </option>
                                            <option value="Aide"> Aide </option>
                                            <option value="Other"> Other </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label>
                                        <small><b>Ages</b></small>
                                    </label>
{{--                                    <input type="text" class="form-control" name="age_worked_with" placeholder="what age have you worked with?______to_______ " required="">--}}
{{--                                    <input type="text" class="form-control" name="age_worked_with" placeholder="what age do you worked with?______to_______ " required="">--}}
{{--                                    <input type="text" class="form-control" name="age_worked_with" placeholder="what age do you work with?" required="">--}}
                                    <input type="text" class="form-control" name="age_worked_with" id="age_worked_with" placeholder="what age do you work with?">
                                </div>

                                <div class="col-lg-6">
                                    <label>
                                        <small><b>Years of experience</b></small>
                                    </label>
                                    <div class="form-group">
{{--                                        <input type="text" class="form-control" name="year_of_experience" placeholder="Year of experience in the Preschool Field?" required="">--}}
                                        <div class="form-group">
                                            <select name="year_of_experience" class="form-control" id="year_of_experience">
                                                {{--                                        <option>Current Position / Current Employer</option>--}}
                                                <option value=""> Select years of experience </option>
                                                <option value="Less than 1"> Less than 1 </option>
                                                <option value="1-5"> 1-5 </option>
                                                <option value="5-10"> 5-10 </option>
                                                <option value="10+"> 10+ </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label>
                                        <small><b>Level of education</b></small>
                                    </label>
                                    <div class="form-group">
                                        <select class="form-control" name="loe" id="loe"  id="exampleFormControlSelect1">
                                            <option value="">None</option>
                                            <option value="HS Diploma/GED">HS Diploma/GED</option>
                                            <option value="Some College">Some College</option>
                                            <option value="A.A./A.S.">A.A./A.S.</option>
                                            <option value="B.A./B.S.">B.A./B.S.</option>
                                            <option value="M.A./M.S.">M.A./M.S.</option>
                                            <option value="Ph.D./Ed.D.">Ph.D./Ed.D.</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-lg-12 pl-lg-1 pl-md-1">
                                <label>
                                    <small><b>Bio</b></small>
                                </label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="about" placeholder="Tell us a little about yourself?"></textarea>
                            </div>
                        </div>

                        <button class="custom-btn">Join for FREE to get started</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================== -->


@endsection


@section('js')
<script type="text/javascript">
    $('.do_you_work').on('change', (e) => {
        $('.form-group-work').prop('hidden', $('.do_you_work:checked').val() != 1);

        $('#current_position').prop('required', ($('.do_you_work:checked').val() == 1));
        $('#age_worked_with').prop('required', ($('.do_you_work:checked').val() == 1));
        $('#year_of_experience').prop('required', ($('.do_you_work:checked').val() == 1));
        $('#loe').prop('required', ($('.do_you_work:checked').val() == 1));
    });
</script>
@endsection