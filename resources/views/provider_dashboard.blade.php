<!doctype html>
<html lang="en">
<?php use Carbon\Carbon; ?>

@include('headerlink')

<style>
    .profileparent {
        background-color: #F5F7FC;
        padding: 2rem 2rem;
        margin-top: 13px;
        border-radius: 8px;
        height: 54rem !important;
    }

    .parentNumber {
        height: 200px;
        border-radius: 20px;
        box-shadow: #d0cbcb 5px 5px 15px 0px;
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .span_icon {
        font-size: 20px;
        color: #bdbdbd;
        margin-left: 10px;
        border-radius: 15px;
        padding: 10px 20px;
        box-shadow: #D4D4D3 0px 0px 11px 0px;
        position: absolute;
        top: -10px;
        left: 10px;
        background: white;
    }

    .SpanNumber p {
        font-size: 7rem;
        font-weight: 800;
        color: #dfdfdf80;
        margin: 0;
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

    .myaccount-tab-menu.nav .active,
    .myaccount-tab-menu.nav a:hover {
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

    .editable-wrapper a.edit {
        background-color: #007bff;
    }

    .profilebg1 {
        margin-top: -16px;
    }

    .pl-left {
        width: 92%;
        margin-left: auto;
        margin-top: 20px;
    }

    .pl-left p {
        color: rgba(136, 136, 136, 1);
        font-size: 17px;
    }
</style>

<body>

    @include('layouts.front.css')
    @include('layouts/front.header')


    <section class="back">

        <div class="container-fluid">

            <div class="profilebg1" style="<?php if (Auth::user()->banner_image != '') {
                echo 'background-image: url(' . asset(Auth::user()->banner_image) . ') !important;';
            } else {
                echo 'background-image: url(../images/profilebg.png) !important;';
            } ?> background-size: cover !important;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile1">
                            @if (Auth::user()->image != '')
                                <img src="{{ asset(Auth::user()->image) }}" style="height:175px; width:175px;"
                                    class="img-fluid">
                            @else
                                <img src="{{ asset('images/profilemain1.png') }}" class="img-fluid">
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="profile-name-bg">
                <div class="row">
                    <div class="col-md-3">
                        <div class="profile-name">
                            <h5> {{ Auth::user()->name }} {{ Auth::user()->lname }} <span> {{ Auth::user()->email }}
                                </span>
                                @if (Auth::user()->age_accepted)
                                    <span><strong>Ages accepted: </strong> {{ Auth::user()->age_accepted }} </span>
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>
{{--                <div class="row">--}}
{{--                    <div class="col-lg-10">--}}
{{--                        <div class="profile-name pl-left">--}}
{{--                            <p>Details and information displayed here were found through public sources -- not the--}}
{{--                                business itself -- and may not reflect its current status, including license status. We--}}
{{--                                strongly encourage you to perform your own research while selecting a care provider.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>

        <div class="container-fluid">
            <div class="feedDiv" data-toggle="modal" data-target="#feedModal">
                <i class="fas fa-address-book"></i>
            </div>
            <div class="row">

                @include('provider_menues')

                <?php

                $post_job = DB::table('job_posts')
                    ->where('creator_name', Auth::user()->id)
                    ->count();
                $request_job = DB::table('request_jobs')
                    ->where('job_creator_id', Auth::user()->id)
                    ->count();
                $active_teacher = DB::table('users')->where('role', 3)->where('status', '1')->count();
                $pending_teacher = DB::table('users')->where('role', 3)->where('status', '0')->count();

                ?>

                <div class="col-lg-6 col-md-8">
                    <div class="profileparent">

                        <div class="row mt-5">

                            <div class="col-sm-6">
                                <div class="parentNumber">
                                    <span class="span_icon"> Post Jobs </span>
                                    <div class="SpanNumber">
                                        <p> {{ $post_job }} </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-1"></div>

                            <div class="col-sm-5">
                                <div class="parentNumber">
                                    <span class="span_icon"> View Request </span>
                                    <div class="SpanNumber">
                                        <p> {{ $request_job }} </p>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <div class="row mt-5">

                            <div class="col-sm-6">
                                <div class="parentNumber">
                                    <span class="span_icon"> Active Teacher </span>
                                    <div class="SpanNumber">
                                        <p> {{ $active_teacher }} </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-1"></div>

                            <div class="col-sm-5">
                                <div class="parentNumber">
                                    <span class="span_icon"> Waiting Teacher </span>
                                    <div class="SpanNumber">
                                        <p> {{ $pending_teacher }} </p>
                                    </div>
                                </div>
                            </div>


                        </div>


                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="center-bar">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12">
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
                                            <div class="col-lg-12">
                                                @if ($val_get_last->share_post != null)
                                                    @php
                                                        $share_user = App\Models\Post::with('users')
                                                            ->where('id', $val_get_last->share_post)
                                                            ->first();
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
                                                                    $post_image = App\Models\Post::find(
                                                                        $val_get_last->share_post,
                                                                    )->image;
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
                                                                <button
                                                                    onClick="unlike('{{ $val_get_last->id }}','{{ Auth::user()->id }}');"
                                                                    class="but0 but1">
                                                                    <b>Liked ({{ $like_count }})</b>
                                                                </button>
                                                            @else
                                                                <button
                                                                    onClick="like('{{ $val_get_last->id }}','{{ Auth::user()->id }}');"
                                                                    class="but0 but2">
                                                                    Like ({{ $like_count }})
                                                                </button>
                                                            @endif



                                                            <button href="" style="pointer-events:none;"
                                                                class="but0 but2">
                                                                Comment ({{ $get_comment_count }})
                                                            </button>


                                                            <button class="but0 but2 share-post-button"
                                                                data-postid="{{ $val_get_last->id }}"
                                                                data-sharepost="{{ $val_get_last->share_post }}"
                                                                data-toggle="modal" data-target="#shareModal"
                                                                style="width: 20px;"><span class="fa fa-share">
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

                                                                <input type="hidden" name="user_image"
                                                                    id="user_image"
                                                                    value="{{ App\Models\Post::find($val_get_last->id)->name }} {{ App\Models\Post::find($val_get_last->id)->lname }}">
                                                                <input type="hidden" name="post_image"
                                                                    id="post_image"
                                                                    value="{{ App\Models\Post::find($val_get_last->id)->image }}">
                                                                <input type="hidden" name="user_image"
                                                                    id="user_image"
                                                                    value="{{ Auth::user()->image }}">

                                                                <div class="com-img col-md-1">
                                                                    <img style="height:50px; width:50px; border-radius:50px;"
                                                                        src="{{ asset(Auth::user()->image ?? 'images/profilemain1.png') }}"
                                                                        class="img-fluid">
                                                                </div>

                                                                <div class="com-img col-md-10">
                                                                    <input type="text"
                                                                        class="form-control comment_text"
                                                                        id="comment" name="comment"
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
                                                @if ($val_get_last->share_post == null)
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
                                                                <button
                                                                    onClick="unlike('{{ $val_get_last->id }}','{{ Auth::user()->id }}');"
                                                                    class="but0 but1">
                                                                    <b>Liked ({{ $like_count }})</b>
                                                                </button>
                                                            @else
                                                                <button
                                                                    onClick="like('{{ $val_get_last->id }}','{{ Auth::user()->id }}');"
                                                                    class="but0 but2">
                                                                    Like ({{ $like_count }})
                                                                </button>
                                                            @endif


                                                            <button href="" style="pointer-events:none;"
                                                                class="but0 but2">
                                                                Comment ({{ $get_comment_count }})
                                                            </button>


                                                            <button class="but0 but2 share-post-button"
                                                                data-postid="{{ $val_get_last->id }}"
                                                                data-toggle="modal" data-target="#shareModal"
                                                                style="width: 20px;"><span class="fa fa-share">
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

                                                                <input type="hidden" name="user_image"
                                                                    id="user_image"
                                                                    value="{{ App\Models\Post::find($val_get_last->id)->name }} {{ App\Models\Post::find($val_get_last->id)->lname }}">
                                                                <input type="hidden" name="post_image"
                                                                    id="post_image"
                                                                    value="{{ App\Models\Post::find($val_get_last->id)->image }}">
                                                                <input type="hidden" name="user_image"
                                                                    id="user_image"
                                                                    value="{{ Auth::user()->image }}">

                                                                <div class="com-img col-md-1">
                                                                    <img style="height:50px; width:50px; border-radius:50px;"
                                                                        src="{{ asset(Auth::user()->image ?? 'images/profilemain1.png') }}"
                                                                        class="img-fluid">
                                                                </div>

                                                                <div class="com-img col-md-10">
                                                                    <input type="text"
                                                                        class="form-control comment_text"
                                                                        id="comment" name="comment"
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
                                            </div>
                                        </div>
                                    @endforeach
                                </div>


                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-md-3 sidebarleftprofile">

                    @include('all_provider')

                </div>


            </div>
        </div>

    </section>


    @include('footerlink')

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



    <script>
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
                                    window.location.href = response
                                        .redirectUrl; // Redirect to the URL specified in the response
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

</body>

</html>
