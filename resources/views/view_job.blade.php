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

div.dataTables_wrapper div.dataTables_filter input {
    margin-left: -4.5em !important;
    display: inline-block !important;
}

select.custom-select.custom-select-sm.form-control.form-control-sm {
    width: 60px !important;
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

            <div class="col-lg-9 col-md-8">
                
                <div class="profileparent">
                    <div class="profilein1">

    
        <section class="content">
            <div class="row">
                <div class="col-12">
                                                    
                <div class="card">
                
                    <!-- /.card-header -->
                    <div class="card-body">
                    
                        <table id="example1" class="table table-hover table-bordered table-striped text-center">
                            <thead>
                            <tr>
                                <th>SR No</th>
                                <th>Job Title</th>
                                <th>Job Type</th>
                                <th style="width:150px;">Salary Raneg</th>
                                <th>Skills</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                                        
                                @foreach($job_post as $key => $val_job_post)
                                <tr>
                                    <td> {{ $key+1 }} </td>
                                    <td> {{ $val_job_post->job_title }} </td>
                                    <td> {{ $val_job_post->job_type }} </td>
                                    <td> {{ $val_job_post->salary_range }} </td>
                                    <td> {{ $val_job_post->skills }} </td>
                                    <td> 
                                        <a href="{{route('edit_job',['id'=>$val_job_post->id])}}" class="btn btn-success"> <span class="fa fa-edit"></span> </a>
                                        <br><br>
                                        <a href="{{route('delete_job',['id'=>$val_job_post->id])}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"> <span class="fa fa-trash"></span> </a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        
                        </table>

                        </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>





                    </div>
                    <div class="write-jus">

                       
                    </div>
                </div>

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