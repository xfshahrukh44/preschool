@extends('layouts.main')


@section('css')
    {{--
    <link rel="stylesheet" href="{{ asset('css/dashboard-2.css') }}"> --}}

    <style>
        .about-sec-one {
            background-image: url('{{ asset($page->image) }}');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 450px;
            display: flex;
            align-items: center;
        }

        .top-bottom {
            background-image: url('{{ asset($section[0]->value) }}');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 820px;
            box-shadow: 0px 0px 14px 2px #0000002b;
            border-radius: 20px;
        }

        .top-bottom.two {
            background-image: url('{{ asset($section[2]->value) }}');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 720px;
            margin-top: 100px;
        }


        .about-sec-three {
            background-image: url('{{ asset($section[4]->value) }}');
            background-position: left;
            background-size: 50%;
            background-color: #000000;
            background-repeat: no-repeat;
            height: 600px;
            display: flex;
            align-items: center;
        }

        a.btn.btn-secondary {
            background: #8cc63f;
            border: 0px #8cc63f;
        }

        .clien_details {
            display: flex;
            align-items: start;
            justify-content: space-between;
            margin-bottom: 20px
        }

        .profile_img {
            display: flex;
            align-items: start;
            gap: 20px;
        }

        .profile_img figure img {
            width: 50px !important;
            height: 50px !important;
        }

        .client_info h4 {
            font-weight: bold;
            color: black;
            font-size: 14px;
            margin: 0;
            padding-bottom: 3px;
        }

        .client_info p {
            color: black;
            font-weight: 500;
            font-size: 15px;
            margin-bottom: 0;
        }

        .profile_img figure {
            margin: 0;
        }

        .rating_client {
            text-align: end;
        }

        .rating_client span {
            font-size: 18px;
            color: black;
            font-weight: bold;
        }

        .client_star i {
            font-size: 16px;
            color: #ffe234;
        }

        .comment_box {
            display: flex;
            align-items: start;
            gap: 30px;
            margin-top: 40px;
            border: 1px solid #0000002b;
            border-radius: 10px;
            padding: 10px;
        }

        .comment_box .rating_client {
            width: 12%;
            text-align: start;
        }

        .dashboard_details p {
            color: black;
            font-weight: 500;
            font-size: 12px;
            line-height: 16px;
        }

        .search_bar_location {
            display: flex;
            align-items: center;
            position: relative;
            z-index: 0;
        }

        .search_bar_location .btn-block {
            width: 70px;
            height: 47px;
            /* position: absolute; */
            z-index: 0;
            right: 0px;
        }

        .search_bar_location input {
            height: 45px;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .dashboard_details {
            margin-bottom: 40px;
            border: 1px solid #0000002b;
            padding: 12px;
            border-radius: 10px;
        }

        .sty_para p {
            line-height: unset;
        }

        .select2-container--default .select2-search--inline .select2-search__field {
            display: none;
        }

        .select2-selection__choice {
            font-size: 14px !important;
            padding: 6px !important;
            background: #0B94F7 !important;
        }

        .select2-selection.select2-selection--multiple {
            background: #f5f7fc;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: unset;
            z-index: 1000;
            display: none;
            background: #fff;
            width: 57%;
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #ccc;
            right: 0;
        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-item {
            padding: 8px;
            cursor: pointer;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        .search_bar_location #search-bar {
            width: 50%;
        }

        .search_bar_location #state-input {
            border-radius: 0;
            border-left: none;
        }

        .search_bar_location #city-input {
            border-left: none;
            border-radius: 0;
        }

        div#city-results {
            position: absolute;
            left: unset;
            right: 246px;
            width: 246px;
        }

        div#state-results {
            position: absolute;
            left: 0;
            width: 242px;
        }

        .select2-selection__choice {
            font-size: 14px !important;
            padding: 6px !important;
            background: #0B94F7 !important;
        }

        .select2-selection.select2-selection--multiple {
            background: #f5f7fc;
        }

        span.select2.select2-container.select2-container--default {
            width: 100% !important;
            margin-top: 10px;
        }

        select.form-control.age_accepted.select2-hidden-accessible {
            width: 100% !important;
            height: 50px !important;
        }

        .searchable-input {
            width: 33%;
        }

        .custom-select {
            height: 45px;
        }

        .about-sec-two .enroll-listed p {
            font-size: 12px !important;
            margin-bottom: 0 !important;
        }

        .services_list .form-check-input {
            margin: 0 !important;
        }

        .services_list h6 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 30px !important;
            color: black;
        }

        .language_spoken {
            margin-bottom: 20px;
            margin-top: 10px;
        }

        .language_label label span {
            font-size: 12px !important;

        }

        .language_label label {
            margin-top: 5px;

        }
    </style>
@endsection


@section('content')
    <!-- ============================================================== -->
    <!-- BODY START HERE -->


    <section class="about-sec-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="about-us" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">

                        {{-- <h2>Daycare Center</h2> --}}
                        {{-- <h2>Childcare Provider Search</h2> --}}
                        <h2>
                            <span style="font-family:Comic Sans MS,cursive; color:#000;">
                                <strong>Childcare Provider Search</strong>
                            </span>
                        </h2>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="about-sec-two search-style main-responsive-style">
        <div class="container">

            <div class="row">
                <div class="col-md-8 sty_para" style="margin-top:50px;">

                    <?php $get_daycarecount = DB::table('childcares')->distinct('name')->count(); ?>

                    {{-- <center> --}}
                        {{-- <h4 Style="color:#000;"> Childcare Provider Search </h4> --}}
                        {{-- </center> --}}

                    {{-- <form method="get" action="{{ route('search') }}" class="search_bar_location">
                        <input class="form-control" name="search" type="text" placeholder="Search providers"
                            value="{{ $search ?? '' }}" id="search-bar">
                        <button type="submit" class="btn btn-block"><i class="fas fa-search"></i></button>
                    </form> --}}

                    <form method="get" action="{{ route('search') }}" class="search_bar_location">
                        {{-- <input class="form-control" name="search" type="text" placeholder="Search providers"
                            value="{{ $search ?? '' }}" id="search-bar"> --}}
                        <div class="searchable-input">
                            <input type="text" id="state-input" name="state" class="form-control"
                                placeholder="Search States">
                            <div id="state-results" class="dropdown-menu"></div>
                        </div>

                        <div class="searchable-input">
                            <input type="text" id="city-input" name="city" class="form-control" placeholder="Search Cities"
                                disabled>
                            <div id="city-results" class="dropdown-menu"></div>
                        </div>

                        <div class="searchable-input">
                            @php
                                $age_accepted = explode(',', Auth::user()->age_accepted);
                            @endphp
                            {{-- <select type="text" name="age_accepted[]" class="form-control age_accepted" multiple
                                id="age_accepted">
                                <option>--Select--</option>
                                <option>0-12 months</option>
                                <option>12-24 months</option>
                                <option>2-5 years</option>
                                <option>5+ years</option>
                            </select> --}}
                            <select name="age_accepted[]" class="form-control">
                                <option>Select Age</option>
                                <option value="0-12 months">0-12 months</option>
                                <option value="12-24 months">12-24 months</option>
                                <option value="2-5 years">2-5 years</option>
                                <option value="5+ years">5+ years</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-block"><i class="fas fa-search"></i></button>
                    </form>


                    <hr>
                    {{-- <span>
                        <p class="pt-2">
                            Is this your business? <a href="#">Claim your profile</a>
                        </p>
                    </span> --}}
                    <span class="enroll-listed">
                        <p class="pt-2">
                            Don't see your center listed?
                            <a href="{{ route('joinnow') }}">Enroll now</a>
                            to create your profile and start advertising and placing ads
                        </p>
                    </span>
                    <span class="enroll-listed">
                        <p>
                            The providers listed as [Unverified], have not claimed their listing, and Preschool Portal has
                            not been able to verify any of the information displayed. We strongly recommend that you verify
                            the information, on your own, through your local licensing agency. Preschool Portal does not
                            recommend and/or endorse any provider or business.
                        </p>
                    </span>
                    <hr>

                </div>
            </div>

            @if (!count($search_result))
                <div class="row text-center">
                    No daycares found
                </div>
            @endif
            <div class="row justify-content-center">
                {{-- @dd($search_result); --}}
                @foreach ($search_result as $key => $val_search)
                            @php
                                $average_rating = DB::table('reviews')->where('daycareid', $val_search->id)->avg('rate');
                                $rounded_rating = round($average_rating);

                                $full_stars = floor($average_rating);
                                $half_star = $average_rating - $full_stars >= 0.5;

                                $latest_review = DB::table('reviews')
                                    ->where('daycareid', $val_search->id)
                                    ->orderBy('id', 'DESC')
                                    ->first();
                                $rating = $latest_review ? $latest_review->rate : 0;
                                $data = DB::table('users')->where('id', $val_search->claimed_by_id)->first();
                            @endphp
                            <div class="col-lg-12">
                                <div class="dashboard_details">
                                    <div class="clien_details">
                                        <div class="profile_img">
                                            <figure>
                                                @if (!empty($val_search->feature_image))
                                                    <img src="{{ asset($val_search->feature_image) }}" style="height: 329px;width: 100%;"
                                                        alt="" class="img-fluid">
                                                @else
                                                    <img src="{{ asset('assets/imgs/profile_empty.png') }}"
                                                        style="height: 329px;width: 100%;" alt="" class="img-fluid">
                                                @endif
                                            </figure>
                                            <div class="client_info">
                                                <h4>{{ $val_search->name ? $val_search->name : 'N\A' }}</h4>
                                                {{-- <p> --}}
                                                    {{-- {{ $val_search->physical_address ?? 'N/A' }} --}}
                                                    {{-- --}}{{-- @if (!empty($val_search->city) && !empty($val_search->state)) --}}
                                                    {{-- {{ $val_search->city . ',' . $val_search->state }}, --}}
                                                    {{-- @else --}}
                                                    {{-- {{ $val_search->city . ' ' . ($val_search->state = 'N\A') }} --}}
                                                    {{-- @endif --}}
                                                    {{-- </p> --}}
                                                <p>Address: {{ $val_search->physical_address ?? 'N/A' }}</p>
                                                <p>Phone Number: {{ $val_search->phone ?? 'N/A' }}</p>
                                                @if ($val_search->age_accepted)
                                                    {{-- age accepted --}}
                                                    <p>Ages Accepted: {{ $val_search->age_accepted }}</p>
                                                @endif
                                                @if ($val_search->food_served)
                                                    {{-- age accepted --}}
                                                    <p>Food served: {{ $val_search->food_served }}</p>
                                                @endif
                                                @if ($val_search->costing)
                                                    {{-- age accepted --}}
                                                    <p>Costing: {{ $val_search->costing }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="rating_client">
                                            {{-- <span>{{ $average_rating ?? 0.0 }}</span> --}}
                                            <div class="client_star">
                                                <?php    for ($i = 0; $i < $full_stars; $i++): ?>
                                                <i class="fa-solid fa-star"></i>
                                                <?php    endfor; ?>

                                                <?php    if ($half_star): ?>
                                                <i class="fa-solid fa-star-half-stroke"></i>
                                                <?php    endif; ?>

                                                <?php    for ($i = $full_stars + ($half_star ? 1 : 0); $i < 5; $i++): ?>
                                                <i class="fa-regular fa-star"></i>
                                                <?php    endfor; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="current_info">
                                        <a class="btn btn-success" href="{{ URL('claimed_center_detail/' . $val_search->id) }}">View</a>

                                        @if (is_null($val_search->claimed_by_id))
                                            @if (auth()->check() && auth()->user()->role == 4)
                                                @if (auth()->user()->is_verified)
                                                    <button data-toggle="modal" data-target="#myModal{{ $val_search->id }}"
                                                        class="btn btn-primary">Claim</button>
                                                @else
                                                    <button data-toggle="modal" data-target="#not_verified_modal"
                                                        class="btn btn-primary">Claim</button>
                                                @endif
                                            @else
                                                <button data-toggle="modal" data-target="#providerAlert" class="btn btn-primary">Claim</button>
                                            @endif
                                        @else
                                            {{-- <button class="btn btn-danger" disabled>Claimed</button> --}}
                                        @endif
                                        {{-- @endif --}}
                                    </div>
                                    <div class="comment_box">
                                        <div class="rating_client">
                                            <span><?php    echo htmlspecialchars($rating); ?></span>
                                            <div class="client_star">
                                                <?php
                    // Full stars
                    $full_stars = floor($rating);
                    // Half star
                    $half_star = ($rating - $full_stars) >= 0.5;
                    // Display full stars
                    for ($i = 0; $i < $full_stars; $i++): ?>
                                                <i class="fa-solid fa-star"></i>
                                                <?php    endfor; ?>
                                                <?php    if ($half_star): ?>
                                                <i class="fa-solid fa-star-half-stroke"></i>
                                                <?php    endif; ?>
                                                <?php    for ($i = $full_stars + ($half_star ? 1 : 0); $i < 5; $i++): ?>
                                                <i class="fa-regular fa-star"></i>
                                                <?php    endfor; ?>
                                            </div>
                                        </div>
                                        <div class="client_discription">
                                            <p> {{ $latest_review->message ?? 'No Comment' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                @endforeach
                {{ $search_result->appends(request()->input())->links() }}
            </div>

            {{-- <div class="row">

                <div class="col-md-12" style="margin-top:50px;">

                    <table id="" style="width:100%;" class="table table-hover table-bordered table-striped text-center">

                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Name</th>
                                <th>County</th>
                                <th>City</th>
                                <th>Program Type</th>
                                <th>State</th>
                            </tr>
                        </thead>

                        <tbody>

                            @php
                            $search = request()->has('search') ? '?search=' . request()->get('search') : '';
                            @endphp
                            @foreach ($search_result as $key => $val_search)
                            <tr>
                                <td>
                                    @if ($val_search->claim_status == '1')
                                    @if (\Illuminate\Support\Facades\Auth::check() &&
                                    \Illuminate\Support\Facades\Auth::user()->role == 4)
                                    <a class="btn btn-primary"
                                        href="{{ route('provider.findDaycare') . $search }}">Claim</a>
                                    @else
                                    <button data-toggle="modal" data-target="#providerAlert"
                                        class="btn btn-primary">Claim</button>
                                    @endif
                                    @else
                                    <a class="btn btn-secondary"
                                        href="{{ URL('claimed_center_detail/' . $val_search->id) }}">View</a>
                                    @endif
                                </td>
                                <td>{{ $val_search->name ? $val_search->name : 'N\A' }}</td>
                                <td>{{ $val_search->county ? $val_search->county : 'N\A' }}</td>
                                <td>{{ $val_search->city ? $val_search->city : 'N\A' }}</td>
                                <td>{{ $val_search->program_type ? $val_search->program_type : 'N\A' }}</td>
                                <td>{{ $val_search->state ? $val_search->state : 'N\A' }}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{ $search_result->appends(request()->input())->links() }}

                </div>

            </div> --}}
        </div>
    </section>

    @foreach ($search_result as $key => $value)
        <!-- The Edit Modal -->
        <div class="modal fade" id="myModal{{ $value->id }}" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    {{-- @dd($value->id); --}}
                    <form id="form{{ $value->id }}" action="{{ route('provider.updateDaycareCenter') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- Modal Header -->
                        <div class="modal-header">
                            {{-- <h5 class="modal-title text-center">Claimed --}}
                                <h5 class="modal-title text-center">Claim Center</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">

                            <p class="text-center"> {{ $value->name }} </p>

                            <hr>

                            <div class="row">

                                <div class="col-md-12 mb-2">

                                    <input type="hidden" name="id" value="{{ $value->id }}" />

                                    <label> Name </label>
                                    <input type="text" value="{{ $value->name }}" class="form-control" readonly />

                                </div>

                                <div class="col-md-6 mb-2">

                                    <label> County </label>
                                    <input type="text" name="county" value="USA" class="form-control" required readonly />

                                    <br>

                                    <label> Zipcode </label>
                                    <input type="text" name="zip" value="{{ $value->zip }}" class="form-control" required />

                                    <br>

                                    <label> Address </label>
                                    <input type="text" name="physical_address" value="{{ $value->physical_address }}"
                                        class="form-control" required />

                                </div>

                                <div class="col-md-6 mb-2">

                                    <label> City </label>
                                    <input type="text" name="city" value="{{ $value->city }}" class="form-control" required />

                                    <br>

                                    <label> Phone </label>
                                    <input type="text" name="phone" value="{{ $value->phone }}" class="form-control" required />

                                    <br>

                                    <label> Email </label>
                                    <input type="text" name="email_address" value="{{ $value->email_address }}"
                                        class="form-control" required />
                                </div>

                                <div class="col-md-12 mb-12">
                                    <label for="">Ages Accepted :</label>
                                    @php
                                        $age_accepted = explode(',', Auth::user()->age_accepted);
                                    @endphp
                                    <select type="text" name="age_accepted[]" class="form-control age_accepted custom-select"
                                        multiple id="">
                                        <option>--Select--</option>
                                        <option value="0-12 months" {!! in_array('0-12 months', $age_accepted) ? 'selected' : '' !!}>0-12 months</option>
                                        <option value="12-24 months" {!! in_array('12-24 months', $age_accepted) ? 'selected' : '' !!}>12-24 months</option>
                                        <option value="2-5 years" {!! in_array('2-5 years', $age_accepted) ? 'selected' : '' !!}>2-5 years</option>
                                        <option value="5+ years" {!! in_array('5+ years', $age_accepted) ? 'selected' : '' !!}>
                                            5+ years</option>
                                    </select>
                                    {{-- <select type="text" name="age_accepted[]" class="form-control age_accepted" multiple
                                        id="">
                                        <option>Select</option>
                                        <option {!! in_array('0-1', $age_accepted) ? 'selected' : '' !!}>0-1</option>
                                        <option {!! in_array('1-2', $age_accepted) ? 'selected' : '' !!}>1-2</option>
                                        <option {!! in_array('2-3', $age_accepted) ? 'selected' : '' !!}>2-3</option>
                                        <option {!! in_array('3-4', $age_accepted) ? 'selected' : '' !!}>3-4</option>
                                        <option {!! in_array('4-5', $age_accepted) ? 'selected' : '' !!}>4-5</option>
                                        <option {!! in_array('School-ager', $age_accepted) ? 'selected' : '' !!}>School-ager
                                        </option>
                                    </select> --}}
                                </div>
                                <div class="col-md-12 mb-12">
                                    <label for="">Food Served :</label>
                                    {{-- @php --}}
                                    {{-- $food_served = explode(',', Auth::user()->food_served); --}}
                                    {{-- @endphp --}}
                                    <select type="text" name="food_served[]" class="form-control food_served" multiple id="">
                                        <option value="Breakfast">Breakfast</option>
                                        <option value="Lunch">Lunch</option>
                                        <option value="Snacks">Snacks</option>
                                        <option value="Dinner">Dinner</option>
                                    </select>

                                </div>

                                <div class="col-md-12 mb-12 language_label">
                                    <label for=""> Languages Spoken <span>Select all that apply</span></label>
                                    <select type="text" name="language" class="form-control language_spoken" id="">
                                        <option value="english">English</option>
                                        <option value="french">French</option>
                                        <option value="russian">Russian</option>
                                        <option value="japanese">Japanese</option>
                                        <option value="german">German</option>
                                        <option value="spanish">Spanish</option>
                                        <option value="portuguese">Portuguese</option>
                                    </select>

                                </div>

                                <div class="col-md-12 mb-12">
                                    <label> Costing </label>
                                    <input type="text" name="costing" value="{{ $value->costing }}" class="form-control"
                                        placeholder="Costing (ex. $4 - $6)" />
                                </div>

                                <div class="col-md-12 mb-12">
                                    <label> Do you offer tansportation? </label>
                                    <select type="text" name="tansportation" class="form-control language_spoken" id="">
                                        <option value="">Select</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-12">

                                    <label>Family Discount Offered? </label>
                                    <select type="text" name="family_discount_offered"
                                        class="form-control language_spoken family_discount select_id">
                                        <option value="">Select</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>


                                <div class="col-md-4 mb-12">
                                    <div class="show_discount" style="display: none">
                                        <label>Discount </label>
                                        <input type="number" class="form-control language_spoken family_discount_id"
                                            name="family_discount">
                                    </div>
                                </div>

                                <div class="col-md-12 mb-12">

                                    <label>Military Child Care Discount? </label>
                                    <select type="text" name="military_child_care_discount"
                                        class="form-control language_spoken military_child_care_discount select_id">
                                        <option value="">Select</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>


                                <div class="col-md-4 mb-12">
                                    <div class="military_child_discount" style="display: none">
                                        <label>Discount </label>
                                        <input type="number" class="form-control language_spoken military_child_discount_id"
                                            name="military_child_discount">
                                    </div>
                                </div>

                                <div class="col-md-12 mb-12">
                                    <div class="rate_discount">
                                        <h4>Rates & Discounts </h4>
                                        <div class="row">
                                        <div class="col-lg-6">
                                            <label>Application/Registration </label>
                                                <input type="number" class="form-control language_spoken" name="application_registration">
                                            <label>Diapers </label>
                                                <input type="number" class="form-control language_spoken" name="diapers">
                                            <label>Early Drop off </label>
                                                <input type="number" class="form-control language_spoken" name="early_drop_off">
                                            <label>Extended stay </label>
                                                <input type="number" class="form-control language_spoken" name="extended_stay">
                                            <label>Late Payment </label>
                                                <input type="number" class="form-control language_spoken" name="late_payment">
                                            <label>WaitingList Registration </label>
                                                <input type="number" class="form-control language_spoken" name="waitingList_registration">
                                            </div>
                                            <div class="col-lg-6">
                                            <label>Late Pick-up </label>
                                            <input type="number" class="form-control language_spoken" name="late_pick_up">
                                            <label>Meals/Snacks </label>
                                            <input type="number" class="form-control language_spoken" name="meals_snacks">
                                            <label>Returned Check </label>
                                            <input type="number" class="form-control language_spoken" name="returned_check">
                                            <label>Credit Card Declined </label>
                                            <input type="number" class="form-control language_spoken" name="credit_card_declined">
                                            <label>Supplies/Materials </label>
                                            <input type="number" class="form-control language_spoken" name="supplies_materials">
                                            <label>Other </label>
                                            <input type="number" class="form-control language_spoken" name="other">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">

                                    <label> Description </label>
                                    <textarea type="text" style="height: 120px;" name="description" class="form-control"
                                        required> {{ $value->description }} </textarea>

                                </div>

                                <div class="col-md-12 mb-2">

                                    <label> Feature Image </label>
                                    <input type="file" name="feature_image" class="form-control" />

                                </div>



                                <div class="col-md-12 mb-2">

                                    <label> Other Image 1 </label>
                                    <input type="file" name="other_image_one" class="form-control" />

                                </div>

                                <div class="col-md-12 mb-2">

                                    <label> Other Image 2 </label>
                                    <input type="file" name="other_image_two" class="form-control" />

                                </div>

                                <div class="col-md-12 mb-2">

                                    <label> Location iframe </label>
                                    <textarea type="text" style="height: 120px;" name="location_iframe"
                                        class="form-control"> {{ $value->location_iframe }} </textarea>

                                </div>

                                @php
                                    $decoded_timings = json_decode($value->timings);
                                    $decoded_services = json_decode($value->services);
                                    $decoded_meal_offered = json_decode($value->meal_offered);
                                @endphp
                                <div class="col-md-12 mb-2 mt-4">
                                    <h2 class="ml-2"> Timings </h2>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">
                                                <h5>Day</h5>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">
                                                <h5>From</h5>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">
                                                <h5>To</h5>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">
                                                <h5>Monday</h5>
                                            </label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time" name="timings[Monday][from]"
                                                value="{{ !is_null($decoded_timings->Monday->from) ? Carbon\Carbon::parse($decoded_timings->Monday->from)->format('H:i') : '' }}">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time" name="timings[Monday][to]"
                                                value="{{ !is_null($decoded_timings->Monday->to) ? Carbon\Carbon::parse($decoded_timings->Monday->to)->format('H:i') : '' }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">
                                                <h5>Tuesday</h5>
                                            </label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time" name="timings[Tuesday][from]"
                                                value="{{ !is_null($decoded_timings->Tuesday->from) ? Carbon\Carbon::parse($decoded_timings->Tuesday->from)->format('H:i') : '' }}">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time" name="timings[Tuesday][to]"
                                                value="{{ !is_null($decoded_timings->Tuesday->to) ? Carbon\Carbon::parse($decoded_timings->Tuesday->to)->format('H:i') : '' }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">
                                                <h5>Wednesday</h5>
                                            </label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time" name="timings[Wednesday][from]"
                                                value="{{ !is_null($decoded_timings->Wednesday->from) ? Carbon\Carbon::parse($decoded_timings->Wednesday->from)->format('H:i') : '' }}">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time" name="timings[Wednesday][to]"
                                                value="{{ !is_null($decoded_timings->Wednesday->to) ? Carbon\Carbon::parse($decoded_timings->Wednesday->to)->format('H:i') : '' }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">
                                                <h5>Thursday</h5>
                                            </label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time" name="timings[Thursday][from]"
                                                value="{{ !is_null($decoded_timings->Thursday->from) ? Carbon\Carbon::parse($decoded_timings->Thursday->from)->format('H:i') : '' }}">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time" name="timings[Thursday][to]"
                                                value="{{ !is_null($decoded_timings->Thursday->to) ? Carbon\Carbon::parse($decoded_timings->Thursday->to)->format('H:i') : '' }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">
                                                <h5>Friday</h5>
                                            </label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time" name="timings[Friday][from]"
                                                value="{{ !is_null($decoded_timings->Friday->from) ? Carbon\Carbon::parse($decoded_timings->Friday->from)->format('H:i') : '' }}">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time" name="timings[Friday][to]"
                                                value="{{ !is_null($decoded_timings->Friday->to) ? Carbon\Carbon::parse($decoded_timings->Friday->to)->format('H:i') : '' }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">
                                                <h5>Saturday</h5>
                                            </label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time" name="timings[Saturday][from]"
                                                value="{{ !is_null($decoded_timings->Saturday->from) ? Carbon\Carbon::parse($decoded_timings->Saturday->from)->format('H:i') : '' }}">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time" name="timings[Saturday][to]"
                                                value="{{ !is_null($decoded_timings->Saturday->to) ? Carbon\Carbon::parse($decoded_timings->Saturday->to)->format('H:i') : '' }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">
                                                <h5>Sunday</h5>
                                            </label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time" name="timings[Sunday][from]"
                                                value="{{ !is_null($decoded_timings->Sunday->from) ? Carbon\Carbon::parse($decoded_timings->Sunday->from)->format('H:i') : '' }}">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-control" type="time" name="timings[Sunday][to]"
                                                value="{{ !is_null($decoded_timings->Sunday->to) ? Carbon\Carbon::parse($decoded_timings->Sunday->to)->format('H:i') : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2 mt-4 services_list">
                                    <h5 class="ml-2 mb-3"> Services </h5>
                                    <h6 class="ml-2 mb-3"> Programs Offered:</h6>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row ml-2">
                                                <label for="full_time" class="ml-5">
                                                    <strong>Full Time</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[Full Time]" id="full_time" {!! is_array($decoded_services) && in_array('Full Time', $decoded_services) ? 'checked' : '' !!}>
                                            </div>

                                            <div class="row ml-2">
                                                <label for="part_time" class="ml-5">
                                                    <strong>Part Time</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[Part Time]" id="part_time" {!! is_array($decoded_services) && in_array('Part Time', $decoded_services) ? 'checked' : '' !!}>
                                            </div>

                                            <div class="row ml-2">
                                                <label for="before_school" class="ml-5">
                                                    <strong>Before school</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[Before school]" id="before_school" {!! is_array($decoded_services) && in_array('Before school', $decoded_services) ? 'checked' : '' !!}>
                                            </div>

                                            <div class="row ml-2">
                                                <label for="after_school" class="ml-5">
                                                    <strong>After school</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[After school]" id="after_school" {!! is_array($decoded_services) && in_array('After school', $decoded_services) ? 'checked' : '' !!}>
                                            </div>

                                            <div class="row ml-2">
                                                <label for="camp" class="ml-5">
                                                    <strong>Camp</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value="" name="services[Camp]"
                                                    id="camp" {!! is_array($decoded_services) && in_array('Camp', $decoded_services) ? 'checked' : '' !!}>
                                            </div>

                                            <div class="row ml-2">
                                                <label for="early_head_start" class="ml-5">
                                                    <strong>Early Head Start</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[Early Head Start]" id="early_head_start" {!! is_array($decoded_services) && in_array('Early Head Start', $decoded_services) ? 'checked' : '' !!}>
                                            </div>

                                            <div class="row ml-2">
                                                <label for="24_hour_care" class="ml-5">
                                                    <strong>24-Hour Care</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[24-Hour Care]" id="24_hour_care" {!! is_array($decoded_services) && in_array('24-Hour Care', $decoded_services) ? 'checked' : '' !!}>
                                            </div>

                                            <div class="row ml-2">
                                                <label for="head_start" class="ml-5">
                                                    <strong>Head Start</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[Head Start]" id="head_start" {!! is_array($decoded_services) && in_array('Head Start', $decoded_services) ? 'checked' : '' !!}>
                                            </div>

                                            <div class="row ml-2">
                                                <label for="migrant_head_start" class="ml-5">
                                                    <strong>Migrant Head Start</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[Migrant Head Start]" id="migrant_head_start" {!! is_array($decoded_services) && in_array('Migrant Head Start', $decoded_services) ? 'checked' : '' !!}>
                                            </div>

                                            <div class="row ml-2">
                                                <label for="kindergarten" class="ml-5">
                                                    <strong>Kindergarten</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[Kindergarten]" id="kindergarten" {!! is_array($decoded_services) && in_array('Kindergarten', $decoded_services) ? 'checked' : '' !!}>
                                            </div>

                                            <div class="row ml-2">
                                                <label for="summer_camp" class="ml-5">
                                                    <strong>Summer Camp</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[Summer Camp]" id="summer_camp" {!! is_array($decoded_services) && in_array('Summer Camp', $decoded_services) ? 'checked' : '' !!}>
                                            </div>


                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row ml-2">
                                                <label for="playgroup" class="ml-5">
                                                    <strong>Playgroup</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[Playgroup]" id="playgroup" {!! is_array($decoded_services) && in_array('Playgroup', $decoded_services) ? 'checked' : '' !!}>
                                            </div>

                                            <div class="row ml-2">
                                                <label for="sick_child_care_mildly_Ill" class="ml-5">
                                                    <strong>Sick Child Care-Mildly Ill</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[Sick Child Care-Mildly Ill]" id="sick_child_care_mildly_Ill"
                                                    {!! is_array($decoded_services) && in_array('Sick Child Care-Mildly Ill', $decoded_services) ? 'checked' : '' !!}>
                                            </div>

                                            <div class="row ml-2">
                                                <label for="overnight" class="ml-5">
                                                    <strong>Overnight</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[Overnight]" id="overnight" {!! is_array($decoded_services) && in_array('Overnight', $decoded_services) ? 'checked' : '' !!}>
                                            </div>
                                            <div class="row ml-2">
                                                <label for="drop_in" class="ml-5">
                                                    <strong>Drop in</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[Drop in]" id="drop_in" {!! is_array($decoded_services) && in_array('Drop in', $decoded_services) ? 'checked' : '' !!}>
                                            </div>

                                            <div class="row ml-2">
                                                <label for="food_served" class="ml-5">
                                                    <strong>Food served</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[Food served]" id="food_served" {!! is_array($decoded_services) && in_array('Food served', $decoded_services) ? 'checked' : '' !!}>
                                            </div>

                                            <div class="row ml-2">
                                                <label for="full_day" class="ml-5">
                                                    <strong>Full day</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[Full day]" id="full_day" {!! is_array($decoded_services) && in_array('Full day', $decoded_services) ? 'checked' : '' !!}>
                                            </div>

                                            <div class="row ml-2">
                                                <label for="half_day" class="ml-5">
                                                    <strong>Half day</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[Half day]" id="half_day" {!! is_array($decoded_services) && in_array('Half day', $decoded_services) ? 'checked' : '' !!}>
                                            </div>

                                            <div class="row ml-2">
                                                <label for="infant_care" class="ml-5">
                                                    <strong>Infant care</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[Infant care]" id="infant_care" {!! is_array($decoded_services) && in_array('Infant care', $decoded_services) ? 'checked' : '' !!}>
                                            </div>

                                            <div class="row ml-2">
                                                <label for="night_care" class="ml-5">
                                                    <strong>Night care</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[Night care]" id="night_care" {!! is_array($decoded_services) && in_array('Night care', $decoded_services) ? 'checked' : '' !!}>
                                            </div>

                                            <div class="row ml-2">
                                                <label for="transportation" class="ml-5">
                                                    <strong>Transportation</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[Transportation]" id="transportation" {!! is_array($decoded_services) && in_array('Transportation', $decoded_services) ? 'checked' : '' !!}>
                                            </div>

                                            <div class="row ml-2">
                                                <label for="weekend_care" class="ml-5">
                                                    <strong>Weekend care</strong>
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="services[Weekend care]" id="weekend_care" {!! is_array($decoded_services) && in_array('Weekend care', $decoded_services) ? 'checked' : '' !!}>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 mt-4 services_list">
                                    <h5 class="ml-2 mb-3"> Meals Offered <span>Select all that apply</span> </h5>
                                    <div class="row ml-2">
                                        <label for="full_time" class="ml-5">
                                            <strong>Breakfast</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value="" name="meal_offered[Breakfast]"
                                            id="breakfast" {!! is_array($decoded_meal_offered) && in_array('Breakfast', $decoded_meal_offered) ? 'checked' : '' !!}>
                                    </div>
                                    <div class="row ml-2">
                                        <label for="full_time" class="ml-5">
                                            <strong>Morning Snack</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                            name="meal_offered[Morning Snack]" id="morning_snack" {!! is_array($decoded_meal_offered) && in_array('Morning Snack', $decoded_meal_offered) ? 'checked' : '' !!}>
                                    </div>

                                    <div class="row ml-2">
                                        <label for="full_time" class="ml-5">
                                            <strong>Lunch</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value="" name="meal_offered[Lunch]"
                                            id="lunch" {!! is_array($decoded_meal_offered) && in_array('Lunch', $decoded_meal_offered) ? 'checked' : '' !!}>
                                    </div>

                                    <div class="row ml-2">
                                        <label for="full_time" class="ml-5">
                                            <strong>Afternoon Snack</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                            name="meal_offered[Afternoon Snack]" id="afternoon_snack" {!! is_array($decoded_meal_offered) && in_array('Afternoon Snack', $decoded_meal_offered) ? 'checked' : '' !!}>
                                    </div>

                                    <div class="row ml-2">
                                        <label for="full_time" class="ml-5">
                                            <strong>Dinner</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value="" name="meal_offered[Dinner]"
                                            id="dinner" {!! is_array($decoded_meal_offered) && in_array('Dinner', $decoded_meal_offered) ? 'checked' : '' !!}>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" />
                        </div>

                    </form>

                </div>
            </div>
        </div>
    @endforeach


    <!-- Modal -->
    <div class="modal fade" id="not_verified_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Verification required</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="verified_modal">
                        <div class="row">
                            <div class="col-12">
                                <p>Your account hasn't been verified. Please contact Administration</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ============================================================== -->
@endsection


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(() => {

            if (parseInt('{{ \Illuminate\Support\Facades\Auth::user()->agreed_to_sandbox_terms }}') == 0) {
                $('#modal_agree_to_sandbox_terms').modal({
                    keyboard: false
                });
                $('#modal_agree_to_sandbox_terms').modal('show');
            }
            $('.age_accepted').select2();
            $('.food_served').select2();
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.select_id').change(function () {
                var selectId = $(this).attr('name');
                var selectvalue = $(this).val();
                if (selectId === 'family_discount_offered') {
                    if (selectvalue === "yes") {
                        $('.show_discount').show();
                        $(this).parent().removeClass('col-md-12').addClass('col-md-8');
                    } else {
                        $('.show_discount').hide();
                        $('.family_discount_id').val('');
                        $(this).parent().removeClass('col-md-8').addClass('col-md-12');
                    }
                } else if (selectId === 'military_child_care_discount') {
                    if (selectvalue === "yes") {
                        $('.military_child_discount').show();
                        $(this).parent().removeClass('col-md-12').addClass('col-md-8');
                    } else {
                        $('.military_child_discount').hide();
                        $('.military_child_discount_id').val('');
                        $(this).parent().removeClass('col-md-8').addClass('col-md-12');
                    }
                }
            })
        })
    </script>
@endsection