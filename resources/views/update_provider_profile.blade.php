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
    margin-left:15px;
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

        <div class="profilebg1" style="<?php if (Auth::user()->banner_image != '') {
            echo 'background-image: url(' . Auth::user()->banner_image . ') !important;';
        } else {
            echo 'background-image: url(../images/profilebg.png) !important;';
        } ?> background-size: cover !important;">
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

                        <form action="{{route('update_prov_profile2')}}" method="post" enctype="multipart/form-data">

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

                                <label for="">Ages Accepted</label>
                                <input type="text" name="lname" class="form-control" placeholder="" value="{{Auth::user()->age_accepted}}" >


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
                                
                                <label for="">Business Name,  :</label>
                                <input type="text" name="business_name" class="form-control" placeholder="Enter Business Name" value="{{Auth::user()->business_name }}" >
                                
                                  
                                <br><br>
                                
                                <label for="">Address :</label>
                                <textarea type="text" name="address" class="form-control" placeholder="Enter Address"> {{Auth::user()->address }} </textarea>
                                
                                
                                <br><br>
                                
                                <label for="">City :</label>
                                <input type="text" name="city" class="form-control" placeholder="Enter City" value="{{Auth::user()->city }}" >
                                
                                
                                <br><br>
                                
                                <label for="">Zip :</label>
                                <input type="text" name="zip" class="form-control" placeholder="Enter Zip" value="{{Auth::user()->zip }}" >
                                
                                 
                                <br><br>
                                
                                <label for="">License Number :</label>
                                <input type="text" name="license_number" class="form-control" placeholder="Enter License Number" value="{{Auth::user()->license_number }}" >
                                
                                   
                                <br><br>
                                
                                <label for="">Capacity :</label>
                                <input type="text" name="capacity" class="form-control" placeholder="Enter Capacity" value="{{Auth::user()->capacity }}" >
                                
                                     
                                <br><br>
                                
                                <label for="">Hours of Operation :</label>
                                <select  name="hours_of_operation" class="form-control">
                                    <option>Select</option>
                                    <option <?php if(Auth::user()->hours_of_operation == 'Monday to Tuesday'){echo 'selected';} ?> >Monday to Tuesday</option>
                                    <option <?php if(Auth::user()->hours_of_operation == 'Tuesday to Wednesday'){echo 'selected';} ?> >Tuesday to Wednesday</option>
                                    <option <?php if(Auth::user()->hours_of_operation == 'Wednesday to Thursday'){echo 'selected';} ?> >Wednesday to Thursday</option>
                                    <option <?php if(Auth::user()->hours_of_operation == 'Thursday to Friday'){echo 'selected';} ?> >Thursday to Friday</option>
                                    <option <?php if(Auth::user()->hours_of_operation == 'Friday to Saturday'){echo 'selected';} ?> >Friday to Saturday</option>
                                    <option <?php if(Auth::user()->hours_of_operation == 'Saturday to Sunday'){echo 'selected';} ?> >Saturday to Sunday</option>
                                </select>
                                      
                                <br><br>
                                
                                <label for="">Ages Accepted :</label>
                                <select type="text" name="age_accepted" class="form-control">
                                    <option>Select</option>
                                    <option <?php if(Auth::user()->age_accepted == '0-1'){echo 'selected';} ?> >0-1</option>
                                    <option <?php if(Auth::user()->age_accepted == '1-2'){echo 'selected';} ?> >1-2</option>
                                    <option <?php if(Auth::user()->age_accepted == '2-3'){echo 'selected';} ?> >2-3</option>
                                    <option <?php if(Auth::user()->age_accepted == '3-4'){echo 'selected';} ?> >3-4</option>
                                    <option <?php if(Auth::user()->age_accepted == '4-5'){echo 'selected';} ?> >4-5</option>
                                    <option <?php if(Auth::user()->age_accepted == 'School-ager'){echo 'selected';} ?> >School-ager</option>
                                </select>
                                
                                <br><br>
                                
                                <label for="">Types of Care Provided :</label>
                                <select type="text" name="types_of_care_provided" class="form-control">
                                    <option>Select</option>
                                    <option <?php if(Auth::user()->types_of_care_provided == 'Full Time'){echo 'selected';} ?> >Full Time</option>
                                    <option <?php if(Auth::user()->types_of_care_provided == 'Part Time'){echo 'selected';} ?> >Part Time</option>
                                    <option <?php if(Auth::user()->types_of_care_provided == 'School-ager'){echo 'selected';} ?> >School-ager</option>
                                    <option <?php if(Auth::user()->types_of_care_provided == 'Drop-In'){echo 'selected';} ?> >Drop-In</option>
                                    <option <?php if(Auth::user()->types_of_care_provided == 'Temporary'){echo 'selected';} ?> >Temporary</option>
                                    <option <?php if(Auth::user()->types_of_care_provided == 'Summer Care'){echo 'selected';} ?> >Summer Care </option>
                                    <option <?php if(Auth::user()->types_of_care_provided == 'Evening'){echo 'selected';} ?> >Evening</option>
                                    <option <?php if(Auth::user()->types_of_care_provided == 'Overnight'){echo 'selected';} ?> >Overnight</option>
                                    <option <?php if(Auth::user()->types_of_care_provided == 'Faith Based'){echo 'selected';} ?> >Faith Based</option>
                                </select>
                                
                            </div>

                            <div class="post">
                                <button type="submit" class="btn custom-btn">Update Profile</button>
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

<!-- Sandbox terms modal -->
<div class="modal fade" id="modal_agree_to_sandbox_terms" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Sandbox terms</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <h6>Community Guidelines</h6>
                    </div>
                    <div class="col-12">
                        <p>
                            Welcome to the Sandbox!
                        </p>
                        <p>
                            The Sandbox is meant to be a place to interact with other professionals while at work; learn from others, build relationships, and otherwise just ‘hang out’. This is the spirit in which these guidelines have been established. The discussions and the way all members and Preschool Portal employees are treated are always to be professional. The general rule of thumb to follow is that if the talk is inappropriate for a traditional workplace, then it is not appropriate here. Forums like the Sandbox are at their best when participants treat each other with respect and courtesy. Please be mindful of this when participating here in the Sandbox.
                        </p>
                        <p>
                            Preschool Portal will occasionally move discussions if they belong in a different category. We will also close/remove duplicate discussions and/or replies if they are causing confusion, are mean-spirited, or are otherwise inappropriate (see our Do’s/Don’ts below). Our intention is not to censor, but to foster an environment that is easy to use and productive for all those involved.
                        </p>
                    </div>
                    <div class="col-12 text-center">
                        <a target="_blank" href="{{route('rules-of-conduct-individual')}}">Rules of conduct</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                <a href="{{route('agree_to_sandbox_terms')}}" type="button" class="btn btn-primary">I agree to the terms</a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(() => {

        if (parseInt('{{\Illuminate\Support\Facades\Auth::user()->agreed_to_sandbox_terms}}') == 0) {
            $('#modal_agree_to_sandbox_terms').modal({
                keyboard: false
            });
            $('#modal_agree_to_sandbox_terms').modal('show');
        }
    });
</script>


</body>

</html>