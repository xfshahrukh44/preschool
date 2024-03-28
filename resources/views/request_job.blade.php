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

</style>

<body>


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
                                <th> Name</th>
                                <th> Email</th>
                                <th> Salary</th>
                                <th> Education</th>
                                <th> Resume</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                                        
                                @foreach($request_job as $key => $val_job_request)
                                <tr>
                                    <td> {{ $key+1 }} </td>
                                    <td> {{ $val_job_request->job_title }} </td>
                                    <td> {{ $val_job_request->name }} </td>
                                    <td> {{ $val_job_request->email }} </td>
                                    <td> {{ $val_job_request->expected_salary }} </td>
                                    <td> {{ $val_job_request->education }} </td>
                                    <td> 
                                        <a href="{{ asset($val_job_request->resume) }}" download> <button class="btn btn-primary "> Resume </button> </a> </td>
                                    <td> 
                                        <a href="{{route('view_job_request',['id'=>$val_job_request->id])}}" class="btn btn-success"> <span class="fa fa-eye"></span> </a>
                                        <br><br>
                                        <a href="{{route('delete_job_request',['id'=>$val_job_request->id])}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"> <span class="fa fa-trash"></span> </a>
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


</body>

</html>