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


.profilein1 select {
    outline: none;
    font-size: 15px;
    width: 100% !important;
    height: 50px !important;
    border: 1px solid #000 !important;
    color: #000 !important;
    border-radius: 10px !important;
    margin-left: 10px;
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
        
    <div class="profilebg1" style="<?php if(Auth::user()->banner_image != ''){ echo "background-image: url('".asset(Auth::user()->banner_image)."') !important;"; }else{ echo 'background-image: url('.asset("images/profilebg.png").') !important;';} ?> background-size: cover !important;">
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
            
            @include('teacher_menues')

            <div class="col-lg-6 col-md-8">
                
                <div class="profileparent">
                    <div class="profilein1">

                        <form action="{{route('update_profile2')}}" method="post" enctype="multipart/form-data">

                            @csrf 

                            <div class="form-group">
                            
                                <input type="hidden" name="id" value="{{Auth::user()->id}}">

                                <label for="">Email :</label>
                                <input type="email" name="email" class="form-control" placeholder="" value="{{Auth::user()->email}}" readonly>

                                <br><br>

                                <label for="">First Name :</label>
                                <input type="text" name="name" class="form-control" placeholder="" value="{{Auth::user()->name}}" >


                                <br><br>
                                
                                <label for="">Last Name :</label>
                                <input type="text" name="lname" class="form-control" placeholder="" value="{{Auth::user()->lname}}" >


                                <br><br>
                                
                                <label for="">Phone No :</label>
                                <input type="number" name="phone" class="form-control" placeholder="" value="{{Auth::user()->phone}}" >

                                <br><br>
                                
                                <label for="">About :</label>
                                <textarea type="text" name="about" class="form-control" placeholder="" > {{Auth::user()->about}} </textarea>

                                <br><br>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Profile Image</label>
                                    <input type="file" name="image" class="form-control" />
                                </div>

                                <br><br>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Upload Banner Image</label>
                                    <input type="file" name="banner_image" class="form-control" />
                                </div>
                                
                                <br><br>
                                
                                <label for="">Change Password :</label>
                                <input type="text" name="password" class="form-control" placeholder="Enter New Password"  >

                                <br><br>
                                
                                <label for="">Race :</label>
                                <input type="text" name="race" class="form-control" placeholder="Enter Race" value="{{Auth::user()->race}}" >

                                <br><br>
                                
                                <label for="">Ethnicity :</label>
                                <input type="text" name="ethnicity" class="form-control" placeholder="Enter Ethnicity" value="{{Auth::user()->ethnicity}}" >

                                <br><br>
                                
                                <label for="">Date of Birth :</label>
                                <input type="date" name="date_of_birth" class="form-control" value="{{Auth::user()->date_of_birth}}" >

                                <br><br>
                                
                                <label for="">Do You Currently Work :</label>
                                <select id="dycw" class="form-control"  >
                                    <option>Select</option>
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                                
                                <br>
                                
                                <select name="do_you_currently_work" class="form-control" id="show_current_work">
                                    <option <?php if(Auth::user()->do_you_currently_work == 'Select'){echo 'selected';} ?> >Select</option>
                                    <option <?php if(Auth::user()->do_you_currently_work == 'Childcare facility'){echo 'selected';} ?> >Childcare facility</option>
                                    <option <?php if(Auth::user()->do_you_currently_work == 'In Home Provider'){echo 'selected';} ?> >In Home Provider</option>
                                </select>
                                
                                <br><br>
                                
                                <label for="">Position :</label>
                                <select name="current_position" class="form-control"  >
                                    <option <?php if(Auth::user()->current_position == 'Owner'){echo 'selected';} ?> >Owner</option>
                                    <option <?php if(Auth::user()->current_position == 'Director'){echo 'selected';} ?> >Director</option>
                                    <option <?php if(Auth::user()->current_position == 'Teacher'){echo 'selected';} ?> >Teacher</option>
                                    <option <?php if(Auth::user()->current_position == 'Aide'){echo 'selected';} ?> >Aide</option>
                                    <option <?php if(Auth::user()->current_position == 'Other'){echo 'selected';} ?> >Other</option>
                                </select>
                                
                                
                                <br><br>
                                
                                <label for="">Years of Experience :</label>
                                <select name="year_of_experience" class="form-control"  >
                                    <option <?php if(Auth::user()->year_of_experience == 'Less than 1'){echo 'selected';} ?> >Less than 1</option>
                                    <option <?php if(Auth::user()->year_of_experience == '1-5'){echo 'selected';} ?> >1-5</option>
                                    <option <?php if(Auth::user()->year_of_experience == '5-10'){echo 'selected';} ?> >5-10</option>
                                    <option <?php if(Auth::user()->year_of_experience == '10+yrs'){echo 'selected';} ?> >10+yrs</option>
                                </select>   
                                
                                 
                                <br><br>
                                
                                <label for="">Level of Education :</label>
                                <select name="level_of_education" class="form-control"  >
                                    <option <?php if(Auth::user()->level_of_education == 'None'){echo 'selected';} ?> >None</option>
                                    <option <?php if(Auth::user()->level_of_education == 'HS Diploma/GED'){echo 'selected';} ?> >HS Diploma/GED</option>
                                    <option <?php if(Auth::user()->level_of_education == 'A.A./A.S.'){echo 'selected';} ?> >A.A./A.S.</option>
                                    <option <?php if(Auth::user()->level_of_education == 'B.A./B.S.'){echo 'selected';} ?> >B.A./B.S.</option>
                                    <option <?php if(Auth::user()->level_of_education == 'M.A./M.S.'){echo 'selected';} ?> >M.A./M.S.</option>
                                    <option <?php if(Auth::user()->level_of_education == 'Ph.D./Ed.D.'){echo 'selected';} ?> >Ph.D./Ed.D.</option>
                                </select>  
                                
                            </div>

                            <div class="post">
                                <button type="submit" class="btn custom-btn"> Update Profile </button>
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


<script>
    
    $(document).ready(function(){
        
        $('#show_current_work').hide(); 
        
        $('#dycw').change(function(){
            
            var get_sel = $('#dycw').val();
            
            // alert(get_sel);
            
            if(get_sel == "Yes")
            {
                $('#show_current_work').show(500); 
            }
            else if(get_sel == "No"){
                
                $('#show_current_work').hide(500); 
            }
             else if(get_sel == "Select"){
                
                $('#show_current_work').hide(500); 
            }
            
                
        });
       
    });
    
</script>