<!doctype html>
<html lang="en">

@include('headerlink')

<style>

.form-group label {
    font-size: 20px;
    line-height: 0 !important;
    margin-left: 10px !important;
    margin-bottom: 20px !important;
}

.profilein1 input {
    outline: none;
    font-size: 15px;
    width: 100% !important;
    height: 50px !important;
    border: 1px solid #000 !important;
    color: #000 !important;
    border-radius: 10px !important;
}


.profilein1 textarea {
    outline: none;
    font-size: 15px;
    width: 100% !important;
    height: 150px !important;
    border: 1px solid #000 !important;
    color: #000 !important;
    border-radius: 10px !important;
    margin-left:10px;
}


.dropify-wrapper input {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    height: 100%;
    width: 100%;
    opacity: 0;
    cursor: pointer;
    z-index: 5;
}


.dropify-wrapper{

    height:58px !important;
}

.dropify-wrapper .dropify-message span.file-icon {
    font-size: 28px !important;
    color: #CCC !important;

}

.account-details-form input {

    height: auto !important;
    width: auto !important;
}



</style>

<body>


<section class="back">

    <div class="container-fluid">

    <div class="profilebg1" style="<?php if(Auth::user()->banner_image != ''){ echo 'background-image: url('.asset(Auth::user()->banner_image).') !important;'; }else{ echo 'background-image: url(../images/profilebg.png) !important;';} ?> background-size: cover !important;">
            <div class="row">
                <div class="col-md-12">
                <div class="profile1">
                        @if(Auth::user()->image != '')
                        <img src="{{asset(Auth::user()->image)}}" style="height:175px; width:175px;" class="img-fluid">
                        @else
                        <img src="{{asset('images/profilemain1.png')}}" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="profile-name-bg">
            <div class="row">

                <div class="col-md-3">
                    <div class="profile-name">
                        <h5> {{Auth::user()->name}} {{Auth::user()->lname}} <span> {{Auth::user()->email}} </span></h5>
                    </div>
                </div>

            </div>
        </div>



    </div>

    <div class="container-fluid">
        <div class="feedDiv" data-toggle="modal" data-target="#feedModal">
            <i class="fas fa-address-book"></i>
        </div>
        <div class="row">

        @include('provider_menues')

            <div class="col-lg-6 col-md-8">

                <div class="profileparent">
                    <div class="profilein1">

                        <form action="{{route('update_add_job')}}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">

                                <input type="hidden" name="id" value="{{Request::segment(2)}}">

                                <input type="hidden" name="creator_name" value="{{Auth::user()->id}}">

                                <label for="">Job Title :</label>
                                <input type="text" name="job_title" class="form-control" placeholder="" value="{{$get_post_byid->job_title}}" >

                                <br><br>

                                <label for="">Job Description :</label>
                                <textarea  name="job_description" class="form-control" placeholder="" > {!! $get_post_byid->job_description !!} </textarea>

                                <br><br>

                                <label for="">Company Name :</label>
                                <input type="text" name="company_name" class="form-control" placeholder="" value="{{$get_post_byid->company_name}}"  >

                                <!--<br><br>-->

                                <!--<label for="">Company Description: :</label>-->
                                <!--<textarea name="company_description" class="form-control" placeholder="" > {!! $get_post_byid->company_description !!}  </textarea>-->


                                <br><br>

                                <label for="">Location :</label>
                                <input type="text" name="location" class="form-control" placeholder="" value="{{$get_post_byid->location}}"  >


                                <br><br>

                                <label for="">Job Type :</label>
                                <input type="text" name="job_type" class="form-control" placeholder="" value="{{$get_post_byid->job_type}}"  >


                                <br><br>

                                <label for="">Salary Range :</label>
                                <input type="text" name="salary_range" class="form-control" placeholder="" value="{{$get_post_byid->salary_range}}"  >

                                <br><br>

                                <label for="">Required Education and Experience :</label>
                                <textarea type="text" name="required_education" class="form-control" placeholder="" > {!! $get_post_byid->required_education !!}  </textarea>


                                <br><br>

                                <label for="">Skills and Competencies :</label>
                                <input type="text" name="skills" class="form-control" placeholder="" value="{{$get_post_byid->skills}}"  >

                                <br><br>

                                <label for="">Application Instructions :</label>
                                <textarea type="text" name="instruction" class="form-control" placeholder="" > {!! $get_post_byid->instruction !!}  </textarea>

                                <br><br>

                                <label for="">Post Date :</label>
                                <input type="date" name="post_date" class="form-control" placeholder="" value="{{$get_post_byid->post_date}}"  >

                                <br><br>

                                <label for="">Due Date :</label>
                                <input type="date" name="due_date" class="form-control" placeholder="" value="{{$get_post_byid->due_date}}"  >

                            </div>

                            <div class="post">
                                <button type="submit" class="btn custom-btn"> Update Job </button>
                            </div>

                        </form>

                    </div>
                    <div class="write-jus">


                    </div>
                </div>

            </div>


            <div class="col-md-3 sidebarleftprofile">

                @include('all_teacher')

            </div>


        </div>
    </div>

</section>


@include('footerlink')


</body>

</html>
