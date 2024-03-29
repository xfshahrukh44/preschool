<!doctype html>
<html lang="en">

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

</style>

<body>


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
                        @if(Auth::user()->image != '')
                            <img src="{{asset(Auth::user()->image)}}" style="height:175px; width:175px;"
                                 class="img-fluid">
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

            <?php

            $post_job = DB::table('job_posts')->where('creator_name', Auth::user()->id)->count();
            $request_job = DB::table('request_jobs')->where('job_creator_id', Auth::user()->id)->count();
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