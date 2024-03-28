<?php 

$segment = Request::segment(1);

?>

<div class="col-lg-3 feedcol">
    <div class="sidebarleft">
        <div class="profilebuttons">
            <ul>
                <li><a class="<?php if($segment == "provider_dashboard"){ echo 'menu_active'; } ?>" href="{{route('provider_dashboard')}}"><img src="{{asset('images/home1.png')}}"> Provider Dashboard </a></li>
                <li><a class="<?php if($segment == "add-job"){ echo 'menu_active'; } ?>" href="{{route('add_job')}}"> <i class="fa fa-pencil"> &nbsp; </i> Add Job </a></li>
                <li><a class="<?php if($segment == "view-job"){ echo 'menu_active'; } ?>" href="{{route('view_job')}}"> <i class="fa fa-eye">  &nbsp;</i>  View Job </a></li>

                @if($segment == "edit-job")
                <li><a class="<?php if($segment == "edit-job"){ echo 'menu_active'; } ?>" href="javascript:;"><i class="fa fa-edit">  &nbsp;</i>  Edit Job </a></li>
                @endif


                <li><a class="<?php if($segment == "job-request"){ echo 'menu_active'; } ?>" href="{{route('job_request')}}"><img src="{{asset('images/notification1.png')}}"> Job Request </a></li>
                
                @if($segment == "view-job-request")
                <li><a class="<?php if($segment == "view-job-request"){ echo 'menu_active'; } ?>" href="javascript:;"><i class="fa fa-edit">  &nbsp;</i>  View Job Request </a></li>
                @endif
                
                <li><a class="<?php if($segment == "update-provider-profile"){ echo 'menu_active'; } ?>" href="{{route('update_provider_profile')}}"><img src="{{asset('images/group511.png')}}">Profile Update</a></li>
                <li><a class="<?php if($segment == ""){ echo 'menu_active'; } ?>" href="{{ URL('signout') }}"><img src="{{asset('images/logout1.png')}}">Logout</a></li>
            </ul>
        </div>
    </div>
</div>