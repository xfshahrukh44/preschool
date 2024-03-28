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

                        <form action="" method="post" enctype="multipart/form-data">

                            @csrf 

                            <div class="form-group">
                            
                                <label for="">Name :</label>
                                <input type="text" name="job_title" class="form-control" placeholder="" value="{{$view_request_job->name}}" readonly >

                                <br><br>

                                <label for="">Email :</label>
                                <input type="text" name="job_title" class="form-control" placeholder="" value="{{$view_request_job->email}}" readonly >

                                <br><br>

                                <label for="">Contact No :</label>
                                <input type="text" name="job_title" class="form-control" placeholder="" value="{{$view_request_job->contact}}" readonly >

                                <br><br>

                                <label for="">Job Title :</label>
                                <input type="text" name="job_title" class="form-control" placeholder="" value="{{$view_request_job->job_title}}" readonly >

                                <br><br>
                                
                                <label for="">Location :</label>
                                <textarea name="location" class="form-control" placeholder="" readonly > {{$view_request_job->location}} </textarea>


                                <br><br>
                                
                                <label for="">Job Type :</label>
                                <input type="text" name="job_type" class="form-control" placeholder="" value="{{$view_request_job->job_type}}" readonly >


                                <br><br>
                                
                                <label for="">Salary Range :</label>
                                <input type="text" name="salary_range" class="form-control" placeholder="" value="{{$view_request_job->expected_salary}}" readonly >

                                <br><br>
                                
                                <label for="">Education :</label>
                                <input type="text" name="required_education" class="form-control" placeholder="" value="{{ $view_request_job->education }}" readonly>  


                                <br><br>
                                
                                <label for="">Skills and Competencies :</label>
                                <input type="text" name="skills" class="form-control" placeholder="" value="{{$view_request_job->skills}}"  readonly>

                                <br><br>

                                <label for="">Apply Date :</label>
                                <input type="date" name="post_date" class="form-control" placeholder="" value="{{$view_request_job->apply_date}}" readonly >

        
                            </div>

                            <!-- <div class="post">
                                <button type="submit" class="btn custom-btn"> Update Job </button>
                            </div> -->

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