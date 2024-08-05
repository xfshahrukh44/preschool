<?php
use App\User;
use Carbon\Carbon;
use DateTime;
?>

<!doctype html>
<html lang="en">

@include('headerlink')
<style>
    .fill-5 {
        animation: fill 5s linear 1;
    }

    .fill-4 {
        animation: fill 4s linear 1;
    }

    .fill-3 {
        animation: fill 3s linear 1;
    }

    .fill-2 {
        animation: fill 2s linear 1;
    }

    .fill-1 {
        animation: fill 1s linear 1;
    }

    @keyframes fill {
        0% {
            width: 0%;
        }

        100% {
            width: 100%;
        }
    }

    .progress {
        --bs-progress-height: 1rem;
        --bs-progress-font-size: 0.75rem;
        --bs-progress-bg: #e9ecef;
        --bs-progress-border-radius: 0.375rem;
        --bs-progress-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
        --bs-progress-bar-color: #fff;
        --bs-progress-bar-bg: #0d6efd;
        --bs-progress-bar-transition: width 0.6s ease;
        display: flex;
        height: var(--bs-progress-height);
        overflow: hidden;
        font-size: var(--bs-progress-font-size);
        background-color: var(--bs-progress-bg);
        border-radius: var(--bs-progress-border-radius);
    }

    .progress-bar {
        display: flex;
        flex-direction: column;
        justify-content: center;
        overflow: hidden;
        color: var(--bs-progress-bar-color);
        text-align: center;
        white-space: nowrap;
        background-color: var(--bs-progress-bar-bg);
        transition: var(--bs-progress-bar-transition);
    }


    .newfeed_progress {
        background-color: #F5F7FC;
        border: 8px;
        padding: 8px 8px;
        margin-top: 13px;
    }


    .sidebar {

        position: fixed !important;
    }

    .new-feedbut {
        margin-top: 13px;
        display: flex;
        width: 65rem;
    }

    /*select2 css*/
    span.select2.select2-container.select2-container--default {
        width: 100% !important;
        margin-top: 10px;
    }

    textarea.select2-search__field {
        font-size: 15px !important;
    }

    .share_post .newfeed {
        margin: 0 40px;
        padding: 10px 20px;
    }

    .share_post {
        margin: 40px 0;
        border: 2px solid #70809047;
        padding: 10px 10px;
        background: #d8dbe4;
    }

    .share_post .new-feedbut .but2 {
        width: 30%;
    }

    .share_post .new-feedbut {
        margin-top: 40px;
        justify-content: center;
        width: 100%;
    }
</style>

<body>


    <section class="home-sec1">
        <div class="container-fluid">


            <div class="row">

                <div class="col-lg-3 dashboard-nav">
                    <nav class="sidebar sidebar-offcanvas mesgSidebar" id="sidebar">
                        <div class="logoDiv">

                            <a href="{{ route('teacher_dashboard') }}">
                                <a
                                    href="{{ Auth::user()->role == 4 ? route('provider_dashboard') : route('teacher_dashboard') }}">

                                    <img src="{{ asset('images/back_button-removebg-preview.png') }}" alt=""
                                        style="height:40px; width:40px;">

                                    <!-- <div class="form-group">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                </div> -->

                                </a>

                                <a href="{{ route('teacher_dashboard') }}">

                                    <img src="{{ asset('images/techer-7.png') }}" alt=""
                                        style="margin-left: 100px;">

                                    <!-- <div class="form-group">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                </div> -->

                                </a>

                        </div>
                        <ul class="nav">

                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <h6>Recent {{ Auth::user()->role == 4 ? 'Providers' : 'Teachers' }}</h6>
                                </a>
                            </li>

                            @foreach ($get_all_teachers as $key => $val_teacher)
                                <li class="nav-item">
                                    <a class="nav-link" href="#">

                                        @if ($val_teacher->image != '')
                                            <img style="height:60px; width:60px; border-radius:50px;"
                                                src="{{ asset($val_teacher->image) }}" class="img-fluid">
                                        @else
                                            <img style="height:50px; width:50px; border-radius:50px;"
                                                src="{{ asset('images/profilemain1.png') }}" class="img-fluid">
                                        @endif

                                        <span class="menu-title"> {{ $val_teacher->name }} {{ $val_teacher->lname }}
                                        </span>

                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </nav>
                </div>


                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="center-bar">

                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <form action="{{ route('add_post') }}" method="GET">
                                            <div class="row m-auto px-5" style="background-color: #f5f7fc;">
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control mt-4"
                                                        placeholder="Search posts (press enter to search)"
                                                        name="search" value="{{ request()->get('search') }}"
                                                        style="border: 1px solid #bad234;">
                                                </div>
                                            </div>
                                        </form>
                                        <div class="write-in">

                                            <form action="{{ route('teacher_create_new_post') }}" id="save_post"
                                                method="post" enctype="multipart/form-data">

                                                @csrf
                                                <input type="hidden" name="role_id" value="{{ Auth::user()->role }}">

                                                <div class="profileparent" style="">

                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"
                                                        id="">
                                                    <input type="hidden" name="user_name"
                                                        value="{{ Auth::user()->name }} {{ Auth::user()->lname }}"
                                                        id="">
                                                    <input type="hidden" name="user_image"
                                                        value="{{ Auth::user()->image }}" id="">

                                                    <div>
                                                        <input type="file" name="image" id=""
                                                            class="form-control dropify">
                                                    </div>

                                                    <div class="profilein1">

                                                        <div class="newfeed-commnet">
                                                            <div class="com-img">
                                                                @if (Auth::user()->image != '')
                                                                    <img style="height:50px; width:50px; border-radius: 50px;"
                                                                        src="{{ asset(Auth::user()->image ?? 'images/profilemain1.png') }}"
                                                                        class="img-fluid">
                                                                @else
                                                                    <img src="{{ asset('images/profilein1.png') }}"
                                                                        class="img-fluid">
                                                                @endif
                                                            </div>
                                                            <div class="commentbox">
                                                                <h4>
                                                                    <input type="text" name="post"
                                                                        placeholder="Write Comment / Picture title"
                                                                        style="height: 30px; !important; font-size: 15px;"
                                                                        required>
                                                                    {{--                                                                <br> --}}

                                                                    {{--                                                                <select name="tags" id="tags" multiple --}}
                                                                    {{--                                                                        class="mt-4" id="tags"> --}}
                                                                    {{--                                                                </select> --}}
                                                                    {{--                                                                <input type="text" name="tags" --}}
                                                                    {{--                                                                       class="mt-4" id="tags" --}}
                                                                    {{--                                                                       placeholder="Add tags" --}}
                                                                    {{--                                                                       style="height: 30px; !important; font-size: 15px;" --}}
                                                                    {{--                                                                       required> --}}
                                                                </h4>
                                                            </div>
                                                            {{--                                                        <div class="row"> --}}
                                                            {{--                                                            <h1>ad</h1> --}}
                                                            {{--                                                        </div> --}}
                                                        </div>

                                                    </div>


                                                    <div class="write-jus">


                                                        <div class="post">
                                                            <button id="btn_post" type="submit"
                                                                class="btn  custom-btn">Post
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="newfeed_progress" id="prog" style="display:none;">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped fill-2"
                                                        role="progressbar" style="width: 100%" aria-valuenow="100"
                                                        aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="comment_div">

                                    @foreach ($get_last_post as $key => $val_get_last)
                                        <?php

                                        $get_comment_count = DB::table('comments')
                                            ->where('post_id', $val_get_last->id)
                                            ->count();

                                        ?>

                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-lg-6">
                                                @if($val_get_last->share_post != null)
                                                    @php
                                                    $share_user = App\Models\Post::with('users')->where('id', $val_get_last->share_post)->first();
                                                    @endphp
                                                    <div class="share_post">
                                                        <div class="newfeed-profile-name">


                                                            @if (App\User::find($val_get_last->user_id)->image != '')
                                                                <img style="height:60px; width:60px; border-radius: 50px;"
                                                                    src="{{ asset(App\User::find($val_get_last->user_id)->image) }}"
                                                                    class="img-fluid">
                                                            @else
                                                                <img style="height:60px; width:60px; border-radius:50px;"
                                                                    src="{{ asset('images/profilemain1.png') }}"
                                                                    class="img-fluid">
                                                            @endif

                                                            <h4> {{ App\User::find($val_get_last->user_id)->name }}
                                                                {{ App\User::find($val_get_last->user_id)->lname }}
                                                                <span>
                                                                    {{ Carbon::parse($val_get_last->created_at)->diffForHumans() }}
                                                                </span>
                                                            </h4>

                                                            @if (Auth::user()->id == $val_get_last->user_id)
                                                                <button class="btn btn-danger"
                                                                    onClick="delete_post('{{ $val_get_last->id }}');"
                                                                    style="position:absolute; right:50px;">
                                                                    <span class="fa fa-trash"> </span></button>
                                                            @endif

                                                        </div>

                                                        <div class="newfeed-image">

                                                            <p> {{ $val_get_last->post }} </p>

                                                        </div>

                                                        <div class="newfeed">

                                                            <input type="hidden" name="" id="get_id"
                                                                value="{{ $share_user->id }}">

                                                            <div class="newfeed-profile-name">


                                                                @if ($share_user->users->image != null)
                                                                    <img style="height:60px; width:60px; border-radius: 50px;"
                                                                        src="{{ asset($share_user->users->image) }}"
                                                                        class="img-fluid">
                                                                @else
                                                                    <img style="height:60px; width:60px; border-radius:50px;"
                                                                        src="{{ asset('images/profilemain1.png') }}"
                                                                        class="img-fluid">
                                                                @endif

                                                                <h4> {{ $share_user->users->name }}
                                                                    {{ $share_user->users->lname }}
                                                                    <span>
                                                                        {{ Carbon::parse($share_user->created_at)->diffForHumans() }}
                                                                    </span>
                                                                </h4>

                                                            </div>

                                                            <div class="newfeed-image">

                                                                <p> {{ $share_user->post }} </p>

                                                            </div>

                                                            <div class="newfeed-image">

                                                                @php
                                                                    $post_image = App\Models\Post::find($val_get_last->share_post)->image;
                                                                @endphp
                                                                @if (!is_null($post_image))
                                                                    <img style="height:400px; width:100%; border-radius:10px;"
                                                                        src="{{ asset($post_image) }}"
                                                                        class="img-fluid">
                                                                @endif


                                                            </div>


                                                            <hr>



                                                        </div>
                                                        <div class="new-feedbut">

                                                            <?php
                                                                $get_like = DB::table('likes')
                                                                    ->where('user_id', Auth::user()->id)
                                                                    ->where('post_id', $val_get_last->id)
                                                                    ->first();

                                                                $like_count = DB::table('likes')
                                                                    ->where('post_id', $val_get_last->id)
                                                                    ->count();
                                                            ?>

                                                            @if ($get_like)
                                                                <button onClick="unlike('{{ $val_get_last->id }}','{{ Auth::user()->id }}');" class="but0 but1">
                                                                    <b>Liked ({{ $like_count }})</b>
                                                                </button>
                                                            @else
                                                                <button onClick="like('{{ $val_get_last->id }}','{{ Auth::user()->id }}');" class="but0 but2">
                                                                    Like ({{ $like_count }})
                                                                </button>
                                                            @endif



                                                            <button href="" style="pointer-events:none;"
                                                                class="but0 but2">
                                                                Comment ({{ $get_comment_count }})
                                                            </button>


                                                            <button class="but0 but2 share-post-button"
                                                                data-postid="{{ $val_get_last->id }}" data-sharepost="{{ $val_get_last->share_post }}" data-toggle="modal"
                                                                data-target="#shareModal" style="width: 20px;"><span
                                                                    class="fa fa-share">
                                                                </span></button>

                                                        </div>

                                                        <hr>

                                                        <form class="save_comments" method="post">

                                                            <div class="newfeed-commnet">

                                                                @csrf

                                                                <input type="hidden" name="post_id" id="post_id"
                                                                    value="{{ $val_get_last->id }}">
                                                                <input type="hidden" name="user_id" id="user_id"
                                                                    value="{{ Auth::user()->id }}">

                                                                <input type="hidden" name="user_image" id="user_image"
                                                                    value="{{ App\Models\Post::find($val_get_last->id)->name }} {{ App\Models\Post::find($val_get_last->id)->lname }}">
                                                                <input type="hidden" name="post_image" id="post_image"
                                                                    value="{{ App\Models\Post::find($val_get_last->id)->image }}">
                                                                <input type="hidden" name="user_image" id="user_image"
                                                                    value="{{ Auth::user()->image }}">

                                                                <div class="com-img col-md-1">
                                                                    <img style="height:50px; width:50px; border-radius:50px;"
                                                                        src="{{ asset(Auth::user()->image ?? 'images/profilemain1.png') }}"
                                                                        class="img-fluid">
                                                                </div>

                                                                <div class="com-img col-md-10">
                                                                    <input type="text"
                                                                        class="form-control comment_text" id="comment"
                                                                        name="comment"
                                                                        style="height: 50px; border-radius:15px; font-size: 15px;"
                                                                        placeholder="Write Comment">
                                                                </div>

                                                                <div class="com-img col-md-1">
                                                                    <button type="submit"
                                                                        class="btn btn-primary comment_post_btn"
                                                                        style="height: 40px;width: 50px; margin-top: 5px;">
                                                                        <span class="fa fa-paper-plane">
                                                                        </span></button>
                                                                </div>

                                                            </div>

                                                        </form>

                                                        <hr>


                                                        <div class="row post_comment">

                                                            <?php $get_comments_by_id = DB::table('comments')
                                                                ->where('post_id', $val_get_last->id)
                                                                ->orderBy('id', 'desc')
                                                                ->get(); ?>
                                                            <!-- @dump($get_comments_by_id) -->

                                                            @foreach ($get_comments_by_id as $key => $val_comments)
                                                                <div class="com-img col-md-1">
                                                                    <img style="height:50px; width:50px; border-radius:50px;"
                                                                        src="{{ asset(App\User::find($val_comments->user_id)->image ?? 'images/profilemain1.png') }}"
                                                                        class="img-fluid">
                                                                </div>

                                                                <div class="commentbox col-md-10">

                                                                    <h4> {{ App\User::find($val_comments->user_id)->name }}
                                                                        <span>
                                                                            {{ Carbon::parse($val_comments->created_at)->diffForHumans() }}
                                                                        </span>

                                                                        <p> {{ $val_comments->comment }} </p>
                                                                    </h4>
                                                                </div>
                                                            @endforeach


                                                        </div>

                                                    </div>
                                                @endif
                                                @if($val_get_last->share_post == null)
                                                    <div class="newfeed">

                                                        <input type="hidden" name="" id="get_id"
                                                            value="{{ $val_get_last->id }}">

                                                        <div class="newfeed-profile-name">


                                                            @if (App\User::find($val_get_last->user_id)->image != '')
                                                                <img style="height:60px; width:60px; border-radius: 50px;"
                                                                    src="{{ asset(App\User::find($val_get_last->user_id)->image) }}"
                                                                    class="img-fluid">
                                                            @else
                                                                <img style="height:60px; width:60px; border-radius:50px;"
                                                                    src="{{ asset('images/profilemain1.png') }}"
                                                                    class="img-fluid">
                                                            @endif

                                                            <h4> {{ App\User::find($val_get_last->user_id)->name }}
                                                                {{ App\User::find($val_get_last->user_id)->lname }}
                                                                <span>
                                                                    {{ Carbon::parse($val_get_last->created_at)->diffForHumans() }}
                                                                </span>
                                                            </h4>

                                                            @if (Auth::user()->id == $val_get_last->user_id)
                                                                <button class="btn btn-danger"
                                                                    onClick="delete_post('{{ $val_get_last->id }}');"
                                                                    style="position:absolute; right:50px;">
                                                                    <span class="fa fa-trash"> </span></button>
                                                            @endif

                                                        </div>

                                                        <div class="newfeed-image">

                                                            <p> {{ $val_get_last->post }} </p>

                                                        </div>

                                                        <div class="newfeed-image">

                                                            @if (!is_null($val_get_last->image))
                                                                <img style="height:400px; width:100%; border-radius:10px;"
                                                                    src="{{ asset($val_get_last->image) }}"
                                                                    class="img-fluid">
                                                            @endif


                                                        </div>


                                                        <hr>

                                                        <div class="new-feedbut">

                                                            <?php
                                                                $get_like = DB::table('likes')
                                                                    ->where('user_id', Auth::user()->id)
                                                                    ->where('post_id', $val_get_last->id)
                                                                    ->first();

                                                                $like_count = DB::table('likes')
                                                                    ->where('post_id', $val_get_last->id)
                                                                    ->count();
                                                            ?>

                                                            @if ($get_like)
                                                                <button onClick="unlike('{{ $val_get_last->id }}','{{ Auth::user()->id }}');" class="but0 but1">
                                                                    <b>Liked ({{ $like_count }})</b>
                                                                </button>
                                                            @else
                                                                <button onClick="like('{{ $val_get_last->id }}','{{ Auth::user()->id }}');" class="but0 but2">
                                                                    Like ({{ $like_count }})
                                                                </button>
                                                            @endif


                                                            <button href="" style="pointer-events:none;"
                                                                class="but0 but2">
                                                                Comment ({{ $get_comment_count }})
                                                            </button>


                                                            <button class="but0 but2 share-post-button"
                                                                data-postid="{{ $val_get_last->id }}" data-toggle="modal"
                                                                data-target="#shareModal" style="width: 20px;"><span
                                                                    class="fa fa-share"> </span></button>

                                                        </div>

                                                        <hr>

                                                        <form class="save_comments" method="post">

                                                            <div class="newfeed-commnet">

                                                                @csrf

                                                                <input type="hidden" name="post_id" id="post_id"
                                                                    value="{{ $val_get_last->id }}">
                                                                <input type="hidden" name="user_id" id="user_id"
                                                                    value="{{ Auth::user()->id }}">

                                                                <input type="hidden" name="user_image" id="user_image"
                                                                    value="{{ App\Models\Post::find($val_get_last->id)->name }} {{ App\Models\Post::find($val_get_last->id)->lname }}">
                                                                <input type="hidden" name="post_image" id="post_image"
                                                                    value="{{ App\Models\Post::find($val_get_last->id)->image }}">
                                                                <input type="hidden" name="user_image" id="user_image"
                                                                    value="{{ Auth::user()->image }}">

                                                                <div class="com-img col-md-1">
                                                                    <img style="height:50px; width:50px; border-radius:50px;"
                                                                        src="{{ asset(Auth::user()->image ?? 'images/profilemain1.png') }}"
                                                                        class="img-fluid">
                                                                </div>

                                                                <div class="com-img col-md-10">
                                                                    <input type="text"
                                                                        class="form-control comment_text" id="comment"
                                                                        name="comment"
                                                                        style="height: 50px; border-radius:15px; font-size: 15px;"
                                                                        placeholder="Write Comment">
                                                                </div>

                                                                <div class="com-img col-md-1">
                                                                    <button type="submit"
                                                                        class="btn btn-primary comment_post_btn"
                                                                        style="height: 40px;width: 50px; margin-top: 5px;">
                                                                        <span class="fa fa-paper-plane"> </span></button>
                                                                </div>

                                                            </div>

                                                        </form>

                                                        <hr>


                                                        <div class="row post_comment">

                                                            <?php $get_comments_by_id = DB::table('comments')
                                                                ->where('post_id', $val_get_last->id)
                                                                ->orderBy('id', 'desc')
                                                                ->get(); ?>
                                                            <!-- @dump($get_comments_by_id) -->

                                                            @foreach ($get_comments_by_id as $key => $val_comments)
                                                                <div class="com-img col-md-1">
                                                                    <img style="height:50px; width:50px; border-radius:50px;"
                                                                        src="{{ asset(App\User::find($val_comments->user_id)->image ?? 'images/profilemain1.png') }}"
                                                                        class="img-fluid">
                                                                </div>

                                                                <div class="commentbox col-md-10">

                                                                    <h4> {{ App\User::find($val_comments->user_id)->name }}
                                                                        <span>
                                                                            {{ Carbon::parse($val_comments->created_at)->diffForHumans() }}
                                                                        </span>

                                                                        <p> {{ $val_comments->comment }} </p>
                                                                    </h4>
                                                                </div>
                                                            @endforeach


                                                        </div>


                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                </div>


                            </div>
                            @endforeach
                        </div>
                    </div>


                </div>


                <div class="col-lg-3 desktop-chat">
                    <div class="sidebarLeft side-ri">
                        <div class="searimg">

                            @if (Auth::user()->image != '')
                                <img src="{{ asset(Auth::user()->image) }}" class="img-fluid"
                                    style="height:70px;width:70px; border-radius:50px;">
                            @else
                                <img style="height:60px; width:60px; border-radius:50px;"
                                    src="{{ asset('images/profilemain1.png') }}" class="img-fluid">
                            @endif

                            <div class="main">
                                <h3>{{ Auth::user()->name }} {{ Auth::user()->lname }}</h3>
                                <h4>{{ Auth::user()->email }}</h4>
                            </div>
                        </div>
                        <div class="most">
                            <h5>Most Recent Posts</h5>
                        </div>
                        <div class="user recent_users">
                            <ul>

                                @foreach ($get_last_post as $key => $val_recent_post)
                                    <li>
                                        @if ($val_recent_post->user_image != '')
                                            <img style="height:50px; width:50px; border-radius:50px;"
                                                src="{{ asset($val_recent_post->user_image) }}" class="img-fluid">
                                        @else
                                            <img style="height:50px; width:50px; border-radius:50px;"
                                                src="{{ asset('images/profilemain1.png') }}" class="img-fluid">
                                        @endif
                                        <h6> {{ $val_recent_post->user_name }}
                                            <span>
                                                {{ \Illuminate\Support\Str::limit($val_recent_post->post, 70, $end = '...') }}
                                            </span>
                                        </h6>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    @include('footerlink')
    <div class="modal fade sharePost" id="shareModal" tabindex="-1" role="dialog"
        aria-labelledby="shareModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shareModalLabel">Share Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="sharePostForm">
                        <div class="form-group">
                            <label for="note">Add a note</label>
                            <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="confirmShareButton">Share</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Sandbox terms modal -->
    <div class="modal fade" id="modal_agree_to_sandbox_terms" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
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
                                The Sandbox is meant to be a place to interact with other professionals while at work;
                                learn from others, build relationships, and otherwise just ‘hang out’. This is the
                                spirit in which these guidelines have been established. The discussions and the way all
                                members and Preschool Portal employees are treated are always to be professional. The
                                general rule of thumb to follow is that if the talk is inappropriate for a traditional
                                workplace, then it is not appropriate here. Forums like the Sandbox are at their best
                                when participants treat each other with respect and courtesy. Please be mindful of this
                                when participating here in the Sandbox.
                            </p>
                            <p>
                                Preschool Portal will occasionally move discussions if they belong in a different
                                category. We will also close/remove duplicate discussions and/or replies if they are
                                causing confusion, are mean-spirited, or are otherwise inappropriate (see our
                                Do’s/Don’ts below). Our intention is not to censor, but to foster an environment that is
                                easy to use and productive for all those involved.
                            </p>
                        </div>
                        <div class="col-12 text-center">
                            <a target="_blank" href="{{ route('rules-of-conduct-individual') }}">Rules of conduct</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <a href="{{ route('agree_to_sandbox_terms') }}" type="button" class="btn btn-primary">I agree
                        to the terms</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(() => {

            if (parseInt('{{ \Illuminate\Support\Facades\Auth::user()->agreed_to_sandbox_terms }}') == 0) {
                $('#modal_agree_to_sandbox_terms').modal({
                    keyboard: false
                });
                $('#modal_agree_to_sandbox_terms').modal('show');
            }
        });
    </script>

</body>

</html>


<script>
    $(document).ready(() => {
        $('#tags').select2({
            tags: true,
            placeholder: "Add tags to your post",
            allowClear: true
        });
    });

    $("#save_post").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        var ele = this;

        $.ajax({
            url: "{{ route('teacher_create_new_post') }}",
            type: 'POST',
            data: formData,
            success: function(response) {

                // toastr.success(response.message);

                // $('.comment_div').empty();

                if (response.status) {
                    $('#prog').show();

                    var data = response.get_last_post;
                    var post_user_image = response.p_u_profile;
                    var dayago = response.dayago;

                    setTimeout(function() {
                        // alert("sd");

                        $('#prog').hide();
                        toastr.success(response.message);

                        $(ele).parent().next().prepend(
                            `<div class="">

                            <input type="hidden" name="" id="get_id" value="{{ '${data.id}' }}">

                            <div class="newfeed-profile-name">


                                <img style="height:60px; width:60px; border-radius:50px;" src="{{ asset('${data.user_image}') }}" class="img-fluid">

                                <h4> {{ '${data.user_name}' }} <span> {{ '${dayago}' }} </span></h4>

                                <button class="btn btn-danger" style="position:absolute; right:50px;" onClick="delete_post({{ '${data.id}' }})"> <span class="fa fa-trash" > </span> </button>

                            </div>

                            <div class="newfeed-image">

                                <p> {{ '${data.post}' }} </p>

                            </div>

                            <div class="newfeed-image">

                                <img style="height:400px; width:100%; border-radius:10px;" src="{{ '${data.image}' }}" class="img-fluid">

                            </div>


                            <hr>

                            <div class="new-feedbut">
                                <a href="" class="but0 but1">Like</a>
                                <a href="" style="pointer-events:none;" class="but0 but2"> Comment </a>
                                // <a href="" class="but0 but2">Share</a>
                            </div>

                            <hr>

                            <div class="newfeed-commnet">

                                    <div class="com-img col-md-1">
                                        <img style="height:50px; width:50px; border-radius:50px;" src="{{ '${data.user_image}' }}" class="img-fluid">
                                    </div>

                                    <div class="com-img col-md-10">
                                        <input type="text" class="form-control" name="" style="height: 50px; border-radius:15px; font-size: 15px;" placeholder="Write Comment">
                                    </div>

                                    <div class="com-img col-md-1">
                                        <button class="btn btn-primary" style="height: 40px;width: 50px; margin-top: 5px;"> <span class="fa fa-paper-plane">  </span> </button>
                                    </div>


                            </div>

                            </div>




                        </div>`
                        );

                        location.reload();

                    }, 2000);


                }

            },
            cache: false,
            contentType: false,
            processData: false
        });
    });


    $(".save_comments").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        var ele = this;

        $.ajax({
            url: "{{ route('save_comment') }}",
            type: 'POST',
            data: formData,
            success: function(response) {

                var get_comment = response.get_last_comments;
                var dayago2 = response.dayago2;

                // console.log(get_comment);

                if (response.status) {

                    // toastr.success(response.message);

                    console.log(ele);

                    $(ele).next().next().prepend(
                        `<div class="post_comment">

                    <div class="com-img>
                        <img style="height:50px; width:50px; border-radius:50px;" src="{{ asset('${get_comment.user_image}') }}" class="img-fluid">
                    </div>

                    <div class="commentbox>

                        <h4> {{ '${get_comment.user_image}' }} <span> {{ '${dayago2}' }} </span>

                        <p>  {{ '${get_comment.comment}' }} </p>
                        </h4>
                    </div>

                    </div>`
                    );

                    location.reload();

                    // setTimeout(function() {
                    //     // alert("sd");

                    // },2000);
                }

            },
            cache: false,
            contentType: false,
            processData: false
        });
    });


    // setInterval(function(){
    //     // alert("sd");
    //     $(".refresh_comments").load(location.href+".refresh_comments>*","");

    // }, 2000);


    // $('#btn_post').click(function(){

    //     $('#prog').show();
    //     setTimeout(function(){

    //         $('#prog').hide();
    //         // $(".comment_div").load(location.href+" .comment_div>*","");


    //     }, 3000);

    // });


    function like(postid, userid) {

        // alert(postid);
        // alert(userid);
        var post_id = postid;
        var user_id = userid;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('like_post') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                post_id: post_id,
                user_id: user_id
            },
            success: function(response) {

                if (response.status) {


                    // setTimeout(function() {
                    //     // alert("sd");

                    //     $('#prog').hide();

                    // toastr.success(response.message);
                    location.reload();

                    //     get_last_post();


                    // }, 2000);


                }

            }
        });

    }


    function unlike(postid, userid) {

        // alert(postid);
        // alert(userid);
        var post_id = postid;
        var user_id = userid;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('unlike_post') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                post_id: post_id,
                user_id: user_id
            },
            success: function(response) {

                if (response.status) {


                    // setTimeout(function() {
                    //     // alert("sd");

                    //     $('#prog').hide();

                    // toastr.success(response.message);
                    location.reload();

                    //     get_last_post();


                    // }, 2000);


                }

            }
        });

    }


    function delete_post(postid) {

        // alert(postid);

        var post_id = postid;

        $('#prog').show();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('delete_post') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                post_id: post_id
            },
            success: function(response) {

                if (response.status) {

                    location.reload();

                    // setTimeout(function() {
                    //     // alert("sd");

                    // }, 2000);

                }

            }
        });

    }


    function add_pined_post(postid) {

        // alert(postid);

        var pined_post_id = postid;

        $('#prog').show();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('add_pined_post') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                pined_post_id: pined_post_id

            },
            success: function(response) {

                if (response.status) {


                    setTimeout(function() {
                        // alert("sd");

                        $('#prog').hide();
                        toastr.success(response.message);


                    }, 2000);


                    location.reload();
                }

            }
        });

    }


    function delete_pined_post(postid) {

        // alert(postid);

        var pined_post_id = postid;

        $('#prog').show();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('delete_pined_post') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                pined_post_id: pined_post_id

            },
            success: function(response) {

                if (response.status) {


                    setTimeout(function() {
                        // alert("sd");

                        $('#prog').hide();
                        toastr.success(response.message);


                    }, 2000);

                    location.reload();

                }

            }
        });

    }

    $(document).ready(function() {
        var postId;
        var sharepost;

        $('.share-post-button').click(function() {
            postId = $(this).data('postid');
            sharepost = $(this).data('sharepost');
        });

        $('#confirmShareButton').click(function() {
            var note = $('#note').val();

            $.ajax({
                url: "{{ url('share-post') }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    post_id: postId,
                    share_post: sharepost,
                    note: note
                },
                success: function(response) {
                    if (response.status) {
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = response.redirectUrl; // Redirect to the URL specified in the response
                            }
                        });
                        $('#shareModal').modal('hide');
                    } else {
                        Swal.fire({
                            title: 'Notice',
                            text: response.message,
                            icon: 'info',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred: ' + xhr.responseText,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });

</script>
