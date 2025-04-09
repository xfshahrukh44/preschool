<?php $segment = request()->segment(1); ?>

@if (
    !in_array($segment, [
        'home',
        'claimed_center_detail',
        'rules-of-conduct-individual',
        'joinnow',
        'contact',
        'become-a-provider',
        'job-board',
        'angel-list',
        'become-a-teacher',
        'projects',
    ]))
    <section class="sec-four">
        <div class="col-lg-12 col-md-12 col-12 text-center mt-5">
            <div class="give-the-best">
                <a href="{{ route('joinnow') }}" class="custom-btn">Enroll now</a>
            </div>
        </div>
    </section>
@endif

<footer style="height:450px !important;">
    <div class="container" style="margin-top: -70px;">
        <div class="row">
            <div class="col-lg-4 col-md-5 col-12">
                <div class="FooterMainDiv">

                    <?php

                    $footer = DB::table('pages')->where('id', 6)->first();

                    ?>

                    <!--<h5><a href="#"> {{ $footer->name }} </a></h5>-->

                    <h5><a href="#"> Support </a></h5>

                    <!--{!! $footer->content !!}-->

                    <ul class="FooterUl">
                        <li>
                            <p><a href="javascript:void(0)" data-url="{{ route('termsandconditionprovider') }}"> Terms & Conditions-Individual
                                    Membership </a></p>
                            <p><a href="{{ route('termsandconditionprovider') }}"> Terms & Conditions-Provider
                                    Membership</a></p>
                            <p><a href="{{ route('privacy') }}"> Privacy Policy </a></p>
                            <p><a href="{{ route('community') }}"> Community Guidelines </a></p>
                        </li>

                    </ul>

                    <!-- <div class="ReadMoreFooter"><span><i class="fa-solid fa-circle-arrow-right"></i></span> <span><a href="#">Request A Quote</a></span> </div> -->
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-12">
                <div class="FooterMainDiv">
                    <h5><a href="#">Teacher Links</a></h5>
                    <ul class="FooterUl">
                        <li>
                            <p><a href="{{ route('become-a-teacher') }}">Teachers</a></p>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-12">
                <div class="FooterMainDiv">
                    <h5><a href="#">Provider Links</a></h5>
                    <ul class="FooterUl">
                        <li>
                            <p><a href="{{ route('become-a-provider') }}">Providers</a></p>
                        </li>


                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-3 col-12">
                <div class="FooterMainDiv QuickContact">
                    <h5><a href="#">Quick Contact</a></h5>
                    <p><a href="#"> If you have any questions or need help, feel free to contact our team.</a></p>

                    <!--<div class="ReadMoreFooter"><span><i class="fa-solid fa-phone"></i></span> -->
                    <!--<span class="Colored"><a href="tel:{{ App\Http\Traits\HelperTrait::returnFlag(59) }}"> {{ App\Http\Traits\HelperTrait::returnFlag(59) }} </a></span> -->
                    <!--</div>-->

                    <div class="ReadMoreFooter"><span><i class="fa-solid fa-envelope"></i></span>
                        <span class="Colored"><a href="mailto:{{ App\Http\Traits\HelperTrait::returnFlag(218) }}">
                                {{ App\Http\Traits\HelperTrait::returnFlag(218) }} </a></span>
                    </div>

                    <!--<p class="Reused"><a href="#"> {{ App\Http\Traits\HelperTrait::returnFlag(519) }}</a></p>-->
                    <div class="ReadMoreFooter social-linsk">
                        <span><a href="{{ App\Http\Traits\HelperTrait::returnFlag(682) }}"><i
                                    class="fa-brands fa-facebook-f"></i></a></span>
                        <span><a href="{{ App\Http\Traits\HelperTrait::returnFlag(1962) }}"><i
                                    class="fa-brands fa-instagram"></i></a></span>
                        <span><a href="{{ App\Http\Traits\HelperTrait::returnFlag(1960) }}"><i
                                    class="fa-brands fa-twitter"></i></a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<section class="DownFooter" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="2000">
    <div class="container">
        <div class="maindivFooter">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-12">
                    {{--                    <div class="LOGO"> --}}
                    {{--                        <a class="navbar-brand Colored" href="#"> --}}
                    {{--                            <div class="bg-video-wrap"> --}}
                    {{--                                <video class="video-1" width="100%" height="100%" autoplay muted loop> --}}
                    {{--                                    <source src="{{asset('images/gif.mp4')}}" type="video/mp4"> --}}
                    {{--                                    <source src="{{asset('images/video.ogg')}}" type="video/ogg"> --}}
                    {{--                                </video> --}}
                    {{--                            </div> --}}
                    {{--                        </a> --}}
                    {{--                    </div> --}}
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="SignUp">
                        <p>Sign up for news alerts,</p>
                        <p>news and insights from inside.</p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="EmailSubbmision">
                        <form method="post" id="newForm">
                            @csrf
                            <input type="email" name="newemail" id="newemail" placeholder="Your Email Address"
                                id="" required>
                            <button type="submit" class="custom-btn big"> Sign Up! </button>
                        </form>


                    </div>
                </div>
                <div id="newsresult"></div>
            </div>
        </div>
    </div>
</section>
<section class="DownFooterTwo">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="footerSpan">
                    <p>© {{ App\Http\Traits\HelperTrait::returnFlag(499) }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
