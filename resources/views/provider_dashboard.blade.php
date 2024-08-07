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
                        <h5> {{Auth::user()->name}} {{Auth::user()->lname}} <span> {{Auth::user()->email}} </span>
                            @if (Auth::user()->age_accepted)
                                <span><strong>Ages accepted: </strong> {{Auth::user()->age_accepted}} </span>
                            @endif
                        </h5>
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

                @include('all_provider')

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