@extends('layouts.main')

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

<!-- ============================================================== -->
<!-- BODY START HERE -->


<section class="about-sec-one Teacher-Banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="about-us" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                    <h2>Become A Teacher</h2>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="zig-zag Teacher-sec">
    <div class="container">
        <div class="row">

            <div class="col-lg-5 col-md-6 col-12 p-0">
                <div class="images-zag" data-aos="flip-left" data-aos-easing="linear" data-aos-duration="1500">
                    <figure>
                        <img src="images/techer-1.png" class="img-fluid" alt="">
                    </figure>
                </div>
            </div>

            <div class="col-lg-7 col-md-6 col-12">
                <div class="content-zig mt-0 pt-0 priority" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                    <p><span>FOR BECOME A INSTRUCTOR</span></p>
                    <h6>
                        Teacher Registration
                    </h6>

                    <form class="teacher-form" method="POST" action="{{route('register')}}">

                        @csrf

                        <input type="hidden" name="role" value="3">

                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="name" placeholder="First name" required="">
                            </div>
                            <div class="col-lg-6 pl-lg-1 pl-md-1">
                                <input type="text" class="form-control" name="lname" placeholder="Last name" required="">
                            </div>
                            <div class="col-lg-3 mt-3">
                                <div class="form-group">
                                    <select class="form-control" name="gender"  id="exampleFormControlSelect1">
                                        <option value="0">Sex</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 mt-3 pl-lg-1 pl-md-1">
                                <input type="number" class="form-control" name="age" placeholder="Age" required="">
                            </div>
                            <div class="col-lg-6 mt-3 pl-lg-1 pl-md-1">
                                <input type="number" class="form-control" name="phone" placeholder="Phone Number" required="">
                            </div>
                            <div class="col-lg-12 mt-1">
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="address" placeholder="Address"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-3">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="">
                            </div>
                            <div class="col-lg-4 mt-3">
                                <input type="password" class="form-control" name="password" placeholder="Password" required="">
                            </div>
                            <div class="col-lg-4 mt-3 pl-lg-1 pl-md-1">
                                <div class="form-group">
                                    <select name="current_position" class="form-control" id="exampleFormControlSelect1">
                                        <option>Current Position / Current Employer</option>
                                        <option> Teacher </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="year_of_experience" placeholder="Year of experience in the Preschool Field?" required="">
                                </div>
                            </div>
                            <div class="col-lg-6 pl-lg-1 pl-md-1">
                                <input type="text" class="form-control" name="age_worked_with" placeholder="what age have you worked with?______to_______ " required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="about" placeholder="Tell us about yoursel?"></textarea>
                        </div>

                        <button class="custom-btn">Become a teacher</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->


@endsection


@section('js')
<script type="text/javascript"></script>
@endsection