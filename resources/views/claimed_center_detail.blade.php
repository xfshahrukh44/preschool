@extends('layouts.main')

@section('css')
    <style>
        /* section-2 */
        .section-2 {
            padding: 50px 0 0px 0;
        }

        .section-2-txt .heading-6 {
            color: var(--blue-color-2);
        }

        .section-2-txt .small-heading .anker-1 {
            color: var(--blue-color-2);
        }

        .section-2-txt .small-heading .anker-2 {
            color: var(--purpule-color-2);
        }

        .section-2-txt .span-txt {
            padding: 0 0 10px;
        }

        .section-2-txt .section-1-menu-txt {
            padding: 0 0 30px;
        }

        .section-2-txt .section-1-anker {
            padding: 10px 0 20px 0;
        }

        /* section-2 */


        /* section-3 */
        .section-3-img {
            display: flex;
            gap: 10px;
        }

        .section-3-img figure {
            width: 50%;
        }

        .section-3-img figure img {
            width: 100%;
        }

        .section-3 .span-txt {
            display: flex;
            gap: 12px;
            align-items: start;
            padding: 10px 0 10px 0;
        }

        .section-3 .para-2 i {
            color: var(--yellow-color);
        }

        .span-txt1 {
            display: flex;
            flex-direction: column;
            padding: 20px 0 0 0;
        }

        .section-3-family-txt1 a {
            color: var(--blue-color-1);
        }

        .section-3-family-txt {
            display: flex;
            gap: 10px;
            position: relative;
            padding: 25px 0 0 25px;
        }

        .section-3-family-txt::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 120px;
            height: 10px;
            background-color: var(--yellow-color);
        }

        .section-3-family-txt::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 10px;
            height: 120px;
            background-color: var(--yellow-color);
        }

        .section-3-family-txt1 {
            gap: 10px;
            position: relative;
            padding: 0px 0px 0 25px;
        }

        .section-3-family-txt1::before {
            content: "";
            position: absolute;
            bottom: 0;
            right: 0;
            width: 70px;
            height: 10px;
            background-color: var(--yellow-color);
        }

        .section-3-family-txt1::after {
            content: "";
            position: absolute;
            bottom: 0;
            right: 0;
            width: 10px;
            height: 65px;
            background-color: var(--yellow-color);
        }

        .section-2-main-cheaq ul {
            display: flex;
            align-items: end;
            list-style: none;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        .section-3-main-cheaq .para-2 i {
            color: var(--purpule-color-2) !important;
            font-size: 18px;
        }

        .section-3-main-txt .heading-2 {
            padding: 55px 0 0 0;
        }

        .section-3-main-txt .para-1 {
            padding: 14px 0 14px 0;
        }

        .section-3-txt .para-2 a {
            color: var(--blue-color-2);
        }

        .section-3-txt .anker-1 {
            color: var(--blue-color-1);
        }

        .section-3-main-cheaq ul {
            display: flex;
            gap: 25px;
            list-style: none;
            margin: 0;
        }

        /* section-3-form */
        .section-3-form .heading-5 {
            text-align: center;
            padding: 0 0 13px 0;
        }

        .section-3-form form {
            background-color: #eef7f9;
            padding: 30px;
        }

        .section-3-form form input {
            padding: 15px 19px;
        }

        .section-3-form form button {
            width: 100%;
            padding: 10px 21px;
            border-radius: 52px;
            background-color: var(--purpule-color-1);
            color: var(--white-color);
            font-weight: 600;
            transition: 0.3s ease-in-out;
            border: none;
        }

        .section-3-form form button:hover {
            background-color: var(--purpule-color-2);
        }

        .section-3-form .para-2 {
            padding: 20px 0 0 12px;
        }

        .section-3-form .para-2 a {
            color: var(--blue-color-2);
            text-decoration: underline;
        }

        .section-3-form .para-2 a:hover {
            text-decoration: none;
        }

        .section-3-txt figure img {
            width: 100%;
            height: 330px;
            object-fit: cover;
            margin-bottom: 100px;
        }

        /* section-3-form */

        .about-sec-one {
            background-image: url(<?php echo asset('images/find_day_care.png'); ?>);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 450px;
            display: flex;
            align-items: center;
        }

        .images-zag iframe {
            width: 100%;
        }

        .tabs_info ul {
            justify-content: center;
            gap: 30px;
            border-bottom: 1px solid black;
        }

        .tabs_info ul li a.nav-link {
            color: black !important;
            font-weight: 600;
            font-size: 18px;
            padding: 10px 20px;
        }

        .tabs_info ul li .nav-link.active {
            border-bottom: 3px solid black !important;
            font-size: 20px;
        }

        .tabs_info .tab-content {
            margin-top: 50px;
        }

        .review_show h5 {
            color: black;
            font-weight: 600;
            font-size: 40px;
            margin-bottom: 10px;
        }

        .review_show p {
            color: black;
            font-weight: 500;
            font-size: 16px
        }

        .review_show p a {
            color: black;
            font-size: 30px;
            font-weight: 600;
        }

        .rating_client {
            display: flex;
            gap: 2px;
            align-items: center;
        }

        .rating_client i {
            font-size: 35px;
            color: #ffe234;
        }

        .rating_client span {
            font-size: 30px;
            font-weight: 700;
            margin-left: 10px;
        }

        .hihglight h3 {
            font-size: 25px;
            color: black;
            font-weight: 700;
        }

        .hihglight ul li {
            padding-bottom: 5px;
            font-size: 16px;
            color: black;
            font-weight: 600;
        }

        .hihglight ul {
            padding-bottom: 20px;
        }

        .review_show {
            margin-bottom: 50px;
        }

        .tabs_info ul {
            border: none;
        }
    </style>
@endsection


@section('content')
    <!-- ============================================================== -->
    <!-- BODY START HERE -->
    <section class="about-sec-one Teacher-Banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="about-us" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                        <h2>Provider Page</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <div class="border-line"><span></span></div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="section-3 main-padding">
        <div class="container-fluid">
            <div class="row custom-row" style="padding-left: 150px;padding-right: 150px;">
                <div class="col-lg-12">
                    <div class="review_show">
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        <h5>{{ $get_claimed_daycare_center_detail->name }}</h5>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>

                                        <p>
                                            <a href="#">
                                                {{ $get_claimed_daycare_center_detail->city ?? '' . ' ' . $get_claimed_daycare_center_detail->state }}
                                            </a>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php
                                        $average_rating = DB::table('reviews')->where('daycareid', $get_claimed_daycare_center_detail->id)->avg('rate');
                                        $rounded_rating = round($average_rating);
                                        
                                        $full_stars = floor($average_rating);
                                        $half_star = $average_rating - $full_stars >= 0.5;
                                        ?>
                                        <div class="rating_client">
                                            <?php for ($i = 0; $i < $full_stars; $i++): ?>
                                            <i class="fa-solid fa-star"></i>
                                            <?php endfor; ?>

                                            <?php if ($half_star): ?>
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                            <?php endif; ?>

                                            <?php for ($i = $full_stars + ($half_star ? 1 : 0); $i < 5; $i++): ?>
                                            <i class="fa-regular fa-star"></i>
                                            <?php endfor; ?>
                                            <span>{{ $average_rating ?? 0.0 }}</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row custom-row" style="padding-left: 150px;padding-right: 150px;">
                <div class="col-lg-12">
                    <div class="section-3-txt">
                        <figure><img src="{{ asset($get_claimed_daycare_center_detail->feature_image) }}" alt=""
                                class="img-fluid"></figure>
                        <div class="section-3-img">
                            <figure><img src="{{ asset($get_claimed_daycare_center_detail->other_image_one) }}"
                                    style="height: 329px;width: 100%;" alt="" class="img-fluid"></figure>
                            <figure><img src="{{ asset($get_claimed_daycare_center_detail->other_image_two) }}"
                                    style="height: 329px;width: 100%;" alt="" class="img-fluid"></figure>
                        </div>

                    </div>
                    <div class="section-3-main-txt">
                        {{-- <div class="tabs_info">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Location</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Review</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">Center
                                        Highlights</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-5" role="tab">Cost</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">License</a>
                                </li>
                            </ul>
                        </div> --}}
                        {{-- <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel"> --}}
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="section-3-main-txt">
                                    <h2 class="heading-2" style="color:#000;">About the facility</h2>
                                    <h4>Provider information</h4>
                                    @if ($claimant->name)
                                        <b>Name: </b> {{ $claimant->name }}
                                        <br />
                                    @endif
                                    @if ($claimant->address)
                                        <b>Address: </b> {!! $claimant->address !!}
                                        <br />
                                    @endif
                                    @if ($claimant->phone)
                                        <b>Phone: </b> {{ $claimant->phone }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->age_accepted)
                                        <b>Ages accepted: </b>
                                        {{ $get_claimed_daycare_center_detail->age_accepted }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->food_served)
                                        <b>Food served: </b>
                                        {{ $get_claimed_daycare_center_detail->food_served }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->costing)
                                        <b>Costing: </b> {{ $get_claimed_daycare_center_detail->costing }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->city)
                                        <b>City: </b> {{ $get_claimed_daycare_center_detail->city }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->state)
                                        <b>State: </b> {{ $get_claimed_daycare_center_detail->state }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->language)
                                        <b>Language: </b> {{ $get_claimed_daycare_center_detail->language }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->meal_offered)
                                        <b>Meals Offered : </b>
                                        {{ implode(',', json_decode($get_claimed_daycare_center_detail->meal_offered)) }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->tansportation)
                                        <b>Do you offer tansportation? : </b>
                                        {{ $get_claimed_daycare_center_detail->tansportation }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->family_discount)
                                        <b>Family Discount Offered? : </b>
                                        ${{ $get_claimed_daycare_center_detail->family_discount }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->military_child_discount)
                                        <b>Military Child Care Discount? : </b>
                                        ${{ $get_claimed_daycare_center_detail->military_child_discount }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->application_registration)
                                        <b>Application/Registration : </b>
                                        ${{ $get_claimed_daycare_center_detail->application_registration }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->diapers)
                                        <b>Diapers : </b>
                                        ${{ $get_claimed_daycare_center_detail->diapers }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->early_drop_off)
                                        <b>Early Drop off : </b>
                                        ${{ $get_claimed_daycare_center_detail->early_drop_off }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->extended_stay)
                                        <b>Extended stay : </b>
                                        ${{ $get_claimed_daycare_center_detail->extended_stay }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->late_payment)
                                        <b>Late Payment : </b>
                                        ${{ $get_claimed_daycare_center_detail->late_payment }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->waitingList_registration)
                                        <b>WaitingList Registration : </b>
                                        ${{ $get_claimed_daycare_center_detail->waitingList_registration }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->late_pick_up)
                                        <b>Late Pick-up : </b>
                                        ${{ $get_claimed_daycare_center_detail->late_pick_up }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->meals_snacks)
                                        <b>Meals/Snacks : </b>
                                        ${{ $get_claimed_daycare_center_detail->meals_snacks }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->returned_check)
                                        <b>Returned Check : </b>
                                        ${{ $get_claimed_daycare_center_detail->returned_check }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->credit_card_declined)
                                        <b>Credit Card Declined : </b>
                                        ${{ $get_claimed_daycare_center_detail->credit_card_declined }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->supplies_materials)
                                        <b>Supplies/Materials : </b>
                                        ${{ $get_claimed_daycare_center_detail->supplies_materials }}
                                        <br />
                                    @endif
                                    @if ($get_claimed_daycare_center_detail->other)
                                        <b>Other : </b>
                                        ${{ $get_claimed_daycare_center_detail->other }}
                                        <br />
                                    @endif
                                    <h4>Facility information</h4>
                                    <p class="para-1">
                                        {!! $get_claimed_daycare_center_detail->description !!}
                                    </p>
                                </div>
                                <hr>
                            </div>
                            <div class="col-lg-5">
                                @if (!is_null($get_claimed_daycare_center_detail->location_iframe))
                                    <div class="images-zag" data-aos="flip-left" data-aos-easing="linear"
                                        data-aos-duration="1500">
                                        <div style="overflow:hidden;resize:none;max-width:100%;width:100%;height:500px;">

                                            <div id="embed-map-display" style="height:100%; width:100%;max-width:100%;">
                                                {!! $get_claimed_daycare_center_detail->location_iframe !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-12">
                                @if (!is_null($get_claimed_daycare_center_detail->timings))
                                    <div class="col-md-12">
                                        <h3 style="color: black;">Hours open</h3>
                                        <table class="table" style="width: 69%">
                                            <thead>
                                                <tr>
                                                    <th>Day</th>
                                                    <th class="text-center">Hours open</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (json_decode($get_claimed_daycare_center_detail->timings) as $day => $timings)
                                                    <tr>
                                                        <td><b>{{ $day }}</b></td>

                                                        @if (is_null($timings->from) || is_null($timings->to))
                                                            <td class="text-danger text-center" style="font-size: 0.9em;">
                                                                Closed</td>
                                                        @else
                                                            <td class="text-center" style="font-size: 0.9em;">
                                                                <b>{{ Carbon\Carbon::parse($timings->from)->format('h:i A') }}</b>
                                                                -
                                                                <b>{{ Carbon\Carbon::parse($timings->to)->format('h:i A') }}</b>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        @if (!is_null($get_claimed_daycare_center_detail->services))
                                            <div class="col-md-6">
                                                <h3 style="color: black;">Services</h3>
                                                <table class="table">
                                                    <thead>
                                                        {{--                                    <tr> --}}
                                                        {{--                                        <th>Day</th> --}}
                                                        {{--                                        <th>From</th> --}}
                                                        {{--                                        <th>To</th> --}}
                                                        {{--                                    </tr> --}}
                                                        {{--                                </thead> --}}
                                                    <tbody>
                                                        @foreach (json_decode($get_claimed_daycare_center_detail->services) as $service)
                                                            <tr>
                                                                <td style="font-size: 0.9em;">
                                                                    {{ $service }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if (Auth::user()->role == 4)
                                <div class="col-lg-12">
                                    <div class="hihglight">
                                        <h3>Center Highlights</h3>
                                        <p><strong>Highlights:</strong></p>
                                        <ul>
                                            <li>State-of-the-art facilities</li>
                                            <li>Experienced and qualified staff</li>
                                            <li>Comprehensive care and support programs</li>
                                            <li>Community involvement and outreach</li>
                                            <li>Advanced technology and equipment</li>
                                            <li>Provider Enrollment</li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="hihglight">
                                        <h3>Cost</h3>
                                        <p><strong>Cost:</strong></p>
                                        <ul>
                                            <li>Initial Consultation: $100</li>
                                            <li>Monthly Membership: $50</li>
                                            <li>Specialized Services: Prices vary, contact for details</li>
                                        </ul>


                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="hihglight">
                                        <h3>License</h3>
                                        <p><strong>License:</strong></p>
                                        <ul>
                                            <li>Licensed by the Health Department</li>
                                            <li>Accredited by the National Health Association</li>
                                            <li>Certified for Quality and Safety Standards</li>
                                        </ul>

                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row"
                            style="border: 1px solid #cec6c6; padding: 20px; margin-top: 50px; margin-bottom: 50px;">
                            <div class="col-lg-12">
                                @foreach ($get_reviews as $key => $val_review)
                                    <div class="span-txt1">
                                        <div class="section-3-family-txt">
                                            <strong class="small-heading">{{ $val_review->name }}</strong>
                                            <strong class="small-heading">-</strong>
                                            <!--<p class="para-2">Family/friend</p>-->
                                            <strong class="small-heading"></strong>

                                            <p class="para-2">

                                                <?php if($val_review->rate == 1){ ?>

                                                <i class="fas fa-star"></i>

                                                <?php }elseif($val_review->rate == 2){ ?>

                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>

                                                <?php }elseif($val_review->rate == 3){ ?>

                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>

                                                <?php }elseif($val_review->rate == 4){ ?>

                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>

                                                <?php }elseif($val_review->rate == 5){ ?>

                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>

                                                <?php } ?>

                                                {{ $val_review->rate }}.0

                                            </p>

                                        </div>
                                        <div class="section-3-family-txt1">
                                            <!--<h6 class="heading-6">Great place!</h6>-->
                                            <p class="para-1"> {!! $val_review->message !!} </p>
                                            <!--<strong class="small-heading"><a class="anker-1" href="">Add review-->
                                            <!--<i class="fas fa-chevron-right"></i></a>-->
                                            <!--</strong>-->
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-12" style="margin-top: 45px;">

                                <h3>Review Form</h3>

                                <form method="post" action="{{ URL('review_store') }}">

                                    @csrf

                                    <input type="hidden" name="daycareid"
                                        value="{{ $get_claimed_daycare_center_detail->id }}" class="form-control" />

                                    <div class="row">

                                        <div class="form-group col-md-4">
                                            <label> Enter Name </label>
                                            <input name="name" class="form-control" required />
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label> Enter Email </label>
                                            <input name="email" class="form-control" required />
                                        </div>


                                        <div class="form-group col-md-4">
                                            <label> Select Stars </label>
                                            <select name="rate" class="form-control">
                                                <option value="1">&#11088;</option>
                                                <option value="2">&#11088;&#11088;</option>
                                                <option value="3">&#11088;&#11088;&#11088;</option>
                                                <option value="4">&#11088;&#11088;&#11088;&#11088;
                                                </option>
                                                <option value="5">&#11088;&#11088;&#11088;&#11088;&#11088;
                                                </option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label> Enter Comments </label>
                                        <textarea name="message" style="height: 200px;" class="form-control" required>  </textarea>
                                    </div>

                                    <button class="btn btn-primary" type="submit"> Add Reviews</button>

                                </form>

                            </div>

                        </div>
                        {{-- </div> --}}
                        {{-- <div class="tab-pane" id="tabs-3" role="tabpanel">

                                </div>
                                <div class="tab-pane" id="tabs-4" role="tabpanel">

                                </div>
                                <div class="tab-pane" id="tabs-5" role="tabpanel">

                                </div>
                                <div class="tab-pane" id="tabs-6" role="tabpanel">

                                </div> --}}
                        {{-- </div> --}}
                    </div>
                </div>
            </div>

            {{-- <div class="row align-items-end" style="padding-left: 150px;padding-right: 150px;">
                <h2 style="color:#000; font-size:40px;" class=""> {{ $get_claimed_daycare_center_detail->name }}
                </h2>
                <div class="col-lg-6">
                    <div class="section-3-txt">
                        <figure><img src="{{ asset($get_claimed_daycare_center_detail->feature_image) }}" alt=""
                                class="img-fluid"></figure>

                    </div>
                    <div class="section-3-main-txt">
                        <h2 class="heading-2" style="color:#000;">About the facility</h2>
                        <!--<h6 class="heading-6">Renaissance North Tampa</h6>-->
                        <h4>Provider information</h4>
                        @if ($claimant->name)
                            <b>Name: </b> {{ $claimant->name }}
                            <br />
                        @endif
                        @if ($claimant->address)
                            <b>Address: </b> {!! $claimant->address !!}
                            <br />
                        @endif
                        @if ($claimant->phone)
                            <b>Phone: </b> {{ $claimant->phone }}
                            <br />
                        @endif
                        @if ($claimant->age_accepted)
                            <b>Ages accepted: </b> {{ $claimant->age_accepted }}
                        @endif

                        <br />

                        <h4>Facility information</h4>
                        <p class="para-1">

                            {!! $get_claimed_daycare_center_detail->description !!}

                        </p>
                        <!-- <h6 class="heading-6">Related</h6>
                                                                                                                                                                                                    <p class="para-2"><a href="">6 Practical Things to Consider When Moving an Aging Loved One <span class="d-block"></span> Memory Care Checklist: How to Choose a Memory Care Facility</a></p>
                                                                                                                                                                                                    <strong class="small-heading"><a class="anker-1" href="">Add review
                                                                                                                                                                                                        <i class="fas fa-chevron-up"></i></a>
                                                                                                                                                                                                        </strong>
                                                                                                                                                                                                    <h2 class="heading-2">Senior living options offered</h2>
                                                                                                                                                                                                    <div class="section-3-main-cheaq">
                                                                                                                                                                                                        <ul>
                                                                                                                                                                                                        <li><p class="para-2"><i class="fas fa-check"></i> Assisted Living</p></li>
                                                                                                                                                                                                        <li><p class="para-2"><i class="fas fa-check"></i> Memory Care</p></li>
                                                                                                                                                                                                        </ul>
                                                                                                                                                                                                      <p class="para-2"><i class="fas fa-check"></i> Independent Living</p> -->

                    </div>
                    <hr>

                    @foreach ($get_reviews as $key => $val_review)
                        <div class="span-txt1">
                            <div class="section-3-family-txt">
                                <strong class="small-heading">{{ $val_review->name }}</strong>
                                <strong class="small-heading">-</strong>
                                <!--<p class="para-2">Family/friend</p>-->
                                <strong class="small-heading"></strong>

                                <p class="para-2">

                                    <?php if($val_review->rate == 1){ ?>

                                    <i class="fas fa-star"></i>

                                    <?php }elseif($val_review->rate == 2){ ?>

                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>

                                    <?php }elseif($val_review->rate == 3){ ?>

                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>

                                    <?php }elseif($val_review->rate == 4){ ?>

                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>

                                    <?php }elseif($val_review->rate == 5){ ?>

                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>

                                    <?php } ?>

                                    {{ $val_review->rate }}.0

                                </p>

                            </div>
                            <div class="section-3-family-txt1">
                                <!--<h6 class="heading-6">Great place!</h6>-->
                                <p class="para-1"> {!! $val_review->message !!} </p>
                                <!--<strong class="small-heading"><a class="anker-1" href="">Add review-->
                                <!--<i class="fas fa-chevron-right"></i></a>-->
                                <!--</strong>-->
                            </div>
                    @endforeach
                </div>
                <div class="col-lg-6 col-md-6 col-6 p-0">
                    <div class="section-3-img">
                        <figure><img src="{{ asset($get_claimed_daycare_center_detail->other_image_one) }}"
                                style="height: 329px;width: 100%;" alt="" class="img-fluid"></figure>
                        <figure><img src="{{ asset($get_claimed_daycare_center_detail->other_image_two) }}"
                                style="height: 329px;width: 100%;" alt="" class="img-fluid"></figure>
                    </div>
                    <h4>Location</h4>
                    @if (!is_null($get_claimed_daycare_center_detail->location_iframe))
                        <div class="images-zag" data-aos="flip-left" data-aos-easing="linear" data-aos-duration="1500">
                            <div style="overflow:hidden;resize:none;max-width:100%;width:100%;height:500px;">

                                <div id="embed-map-display" style="height:100%; width:100%;max-width:100%;">
                                    {!! $get_claimed_daycare_center_detail->location_iframe !!}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>



                <div class="col-md-10 text-black">
                    <div class="row">
                        @if (!is_null($get_claimed_daycare_center_detail->timings))
                            <div class="col-md-6">
                                <h3 style="color: black;">Hours open</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Day</th>
                                            <th class="text-center">Hours open</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (json_decode($get_claimed_daycare_center_detail->timings) as $day => $timings)
                                            <tr>
                                                <td><b>{{ $day }}</b></td>

                                                @if (is_null($timings->from) || is_null($timings->to))
                                                    <td class="text-danger text-center" style="font-size: 0.9em;">Closed
                                                    </td>
                                                @else
                                                    <td class="text-center" style="font-size: 0.9em;">
                                                        <b>{{ Carbon\Carbon::parse($timings->from)->format('h:i A') }}</b>
                                                        -
                                                        <b>{{ Carbon\Carbon::parse($timings->to)->format('h:i A') }}</b>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        @if (!is_null($get_claimed_daycare_center_detail->services))
                            <div class="col-md-6">
                                <h3 style="color: black;">Services</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Day</th>
                                            <th>From</th>
                                            <th>To</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (json_decode($get_claimed_daycare_center_detail->services) as $service)
                                            <tr>
                                                <td style="font-size: 0.9em;">{{ $service }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif


                    </div>
                </div>

                <hr>

                <div class="col-md-10 offset-md-1 text-black">
                    <div class="row"
                        style="border: 1px solid #cec6c6; padding: 20px; margin-top: 50px; margin-bottom: 50px;">

                        <div class="col-md-12">

                            <form method="post" action="{{ URL('review_store') }}">

                                @csrf

                                <input type="hidden" name="daycareid"
                                    value="{{ $get_claimed_daycare_center_detail->id }}" class="form-control" />

                                <div class="row">

                                    <div class="form-group col-md-4">
                                        <label> Enter Name </label>
                                        <input name="name" class="form-control" required />
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label> Enter Email </label>
                                        <input name="email" class="form-control" required />
                                    </div>


                                    <div class="form-group col-md-4">
                                        <label> Select Stars </label>
                                        <select name="rate" class="form-control">
                                            <option value="1">&#11088;</option>
                                            <option value="2">&#11088;&#11088;</option>
                                            <option value="3">&#11088;&#11088;&#11088;</option>
                                            <option value="4">&#11088;&#11088;&#11088;&#11088;</option>
                                            <option value="5">&#11088;&#11088;&#11088;&#11088;&#11088;</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label> Enter Comments </label>
                                    <textarea name="message" style="height: 200px;" class="form-control" required>  </textarea>
                                </div>

                                <button class="btn btn-primary" type="submit"> Add Reviews</button>

                            </form>

                        </div>

                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="section-3-form">
                        <form>
                            <h5 class="heading-5">Get pricing & check availability</h5>
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Full Name*">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Email*">
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Phone*">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <p class="para-2">
                                By clicking “Submit”, you agree to our <a href="">Terms of Use</a>
                                and <a href="">Privacy Policy.</a> You also consent to receive texts and calls,
                                which may be autodialed, from us and our partner providers; however, your consent is not a
                                condition to using our service.
                            </p>
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>

    <section class="sec-four">
        <div class="col-lg-12 col-md-12 col-12 text-center mt-5">
            <div class="give-the-best">
                <a href="tel:{{ $get_claimed_daycare_center_detail->phone }}" class="custom-btn">Contact provider</a>
            </div>
        </div>
    </section>

    <br><br>

    <!-- ============================================================== -->
@endsection


@section('js')
    <script type="text/javascript"></script>
@endsection
