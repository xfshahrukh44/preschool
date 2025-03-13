<?php

$segment = Request::segment(1);

?>

<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 order-xxl-1 order-xl-1 order-lg-1 order-md-1 order-sm-1 feedcol">
    <div class="sidebarleft">
        <div class="profilebuttons">
            <ul>
                <li><a class="<?php if($segment == "teacher_dashboard"){ echo 'menu_active'; } ?>" href="{{route('teacher_dashboard')}}"><img src="{{asset('images/home1.png')}}"> Teacher Dashboard </a></li>
                <li><a class="<?php if($segment == "add_post"){ echo 'menu_active'; } ?>" href="{{route('add_post')}}"><img src="{{asset('images/notification1.png')}}"> Sandbox </a></li>
                {{-- <li><a class="<?php //if($segment == "add_post"){ echo 'menu_active'; } ?>" href="{{route('job_board')}}"><img src="{{asset('images/notification1.png')}}"> Job Board </a></li> --}}
{{--                <li><a class="<?php if($segment == "job-board"){ echo 'menu_active'; } ?>" href="{{route('bulletin_board')}}"><img src="{{asset('images/notification1.png')}}"> Bulletin Board </a></li>--}}
                <li><a class="<?php if($segment == "job-board"){ echo 'menu_active'; } ?>" href="{{route('bulletin_board')}}"><img src="{{asset('images/notification1.png')}}"> Job Board </a></li>
                <li><a class="<?php if($segment == "update-profile"){ echo 'menu_active'; } ?>" href="{{route('update_profile')}}"><img src="{{asset('images/group511.png')}}">Profile Update</a></li>
                <li><a class="<?php if($segment == "my-pinned"){ echo 'menu_active'; } ?>" href="{{route('my_pinned')}}"><img src="{{asset('images/home1.png')}}"> Saved </a></li>
                {{-- <li><a class="<?php if($segment == "messages"){ echo 'menu_active'; } ?>" href="{{route('chats.show')}}"><img src="{{asset('images/home1.png')}}"> Messages </a></li> --}}
                <li><a class="<?php if($segment == ""){ echo 'menu_active'; } ?>" href="{{ URL('signout') }}"><img src="{{asset('images/logout1.png')}}">Logout</a></li>
            </ul>
        </div>
    </div>
</div>
