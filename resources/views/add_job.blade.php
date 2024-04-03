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

/*header*/
li.nav-item.active {
    background-color: #b8bab7;
    border-radius: 10px;
}

.myaccount-tab-menu.nav a {
    display: block;
    padding: 20px;
    font-size: 16px;
    align-items: center;
    width: 100%;
    font-weight: bold;
    color: black;
}
.myaccount-tab-menu.nav a i {
    padding-right: 10px;
    /* background-color: #5798fc; */
}

.myaccount-tab-menu.nav {
    border: 1px solid;
}

.myaccount-tab-menu.nav .active, .myaccount-tab-menu.nav a:hover {
    background-color: #5798fc;
    color: white;
}

.account-details-form label.required {
    width: 100%;
    font-weight: 500;
    font-size: 18px;
}
.account-details-form input {
    border-width: 1px;
    border-color: white;
    border-style: solid;
    padding-left: 15px;
    color: black;
    width: 100%;
    border-radius: 3px;
    background-color: rgb(255, 255, 255);
    height: 52px;
    padding-left: 15px;
    margin-bottom: 30px;
    color: #000000;
    font-size: 15px;
}
.account-details-form legend {
    font-family: CottonCandies;
    font-size: 50px;
}
.editable {
    position: relative;
}
.editable-wrapper {
    position: absolute;
    right: 0px;
    top: -50px;
}

.editable-wrapper a {
    background-color: #17a2b8;
    border-radius: 50px;
    width: 35px;
    height: 35px;
    display: inline-block;
    text-align: center;
    line-height: 35px;
    color: white;
    margin-left: 10px;
    font-size: 16px;
}
.editable-wrapper a.edit{
    background-color: #007bff;
}

.profilebg1 {
    margin-top: -16px;
}



</style>

<body>
@include('layouts.front.css')
@include('layouts/front.header')


<section class="back">

    <div class="container-fluid">
        
        <div class="profilebg1" style="<?php if(Auth::user()->banner_image != ''){ echo 'background-image: url('.Auth::user()->banner_image.') !important;'; }else{ echo 'background-image: url(../images/profilebg.png) !important;';} ?> background-size: cover !important;">
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

                        <form action="{{route('save_add_job')}}" method="post" enctype="multipart/form-data">

                            @csrf 

                            <div class="form-group">
                            
                                <input type="hidden" name="creator_name" value="{{Auth::user()->id}}">

                                <label for="">Job Title :</label>
                                <input type="text" name="job_title" class="form-control" placeholder="" >

                                <br><br>
                                
                                <label for="">Job Description :</label>
                                <textarea  name="job_description" class="form-control" placeholder="" >  </textarea>

                                <br><br>

                                <label for="">Company Name :</label>
                                <input type="text" name="company_name" class="form-control" placeholder=""  >

                                <br><br>
                                
                                <label for="">Company Description: :</label>
                                <textarea name="company_description" class="form-control" placeholder="" >  </textarea>


                                <br><br>
                                
                                <label for="">Location :</label>
                                <input type="text" name="location" class="form-control" placeholder=""  >


                                <br><br>
                                
                                <label for="">Job Type :</label>
                                <input type="text" name="job_type" class="form-control" placeholder=""  >


                                <br><br>
                                
                                <label for="">Salary Range :</label>
                                <input type="text" name="salary_range" class="form-control" placeholder=""  >

                                <br><br>
                                
                                <label for="">Required Education and Experience :</label>
                                <textarea type="text" name="required_education" class="form-control" placeholder="" >  </textarea>


                                <br><br>
                                
                                <label for="">Skills and Competencies :</label>
                                <input type="text" name="skills" class="form-control" placeholder=""  >

                                <br><br>
                                
                                <label for="">Application Instructions :</label>
                                <textarea type="text" name="instruction" class="form-control" placeholder="" >  </textarea>
                                
                                <br><br>
                                
                                <label for="">Post Date :</label>
                                <input type="date" name="post_date" class="form-control" placeholder=""  >

                                <br><br>
                                
                                <label for="">Due Date :</label>
                                <input type="date" name="due_date" class="form-control" placeholder=""  >

                            </div>

                            <div class="post">
                                <button type="submit" class="btn custom-btn"> Post Job </button>
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