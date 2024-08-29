@extends('layouts.main')


@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/dashboard-2.css') }}"> --}}

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
            align-items: end;
            justify-content: space-between;
            margin-bottom: 20px
        }

        .profile_img {
            display: flex;
            align-items: start;
            gap: 20px;
        }

        .profile_img figure img {
            width: 110px !important;
            height: 120px !important;
        }

        .client_info h4 {
            font-weight: bold;
            color: black;
            font-size: 20px;
            margin-bottom: 0;
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
            font-size: 30px;
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
            font-size: 16px;
        }

        .search_bar_location {
            display: flex;
            align-items: center;
            position: relative;
            z-index: 0;
        }

        .search_bar_location .btn-block {
            width: 70px;
            position: absolute;
            z-index: 0;
            right: 0px;
        }

        .search_bar_location input {
            height: 45px;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .dashboard_details {
            margin-bottom: 50px;
            border: 1px solid #0000002b;
            padding: 15px;
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

                        {{--                    <h2>Daycare Center</h2> --}}
                        {{--                    <h2>Childcare Provider Search</h2> --}}
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


    <section class="about-sec-two">
        <div class="container">

            <div class="row">
                <div class="col-md-6 sty_para" style="margin-top:50px;">

                    <?php $get_daycarecount = DB::table('childcares')->distinct('name')->count(); ?>

                    {{--                <center> --}}
                    {{--                    <h4 Style="color:#000;"> Childcare Provider Search </h4> --}}
                    {{--                </center> --}}

                    <form method="get" action="{{ route('search') }}" class="search_bar_location">
                        <input class="form-control" name="search" type="text" placeholder="Search providers"
                            value="{{ $search ?? '' }}">
                        <button type="submit" class="btn btn-block"><i class="fas fa-search"></i></button>
                    </form>


                    <hr>
                    <span>
                        <p>
                            The providers listed as [Unverified], have not claimed their listing, and Preschool Portal has
                            not been able to verify any of the information displayed. We strongly recommend that you verify
                            the information, on your own, through your local licensing agency. Preschool Portal does not
                            recommend and/or endorse any provider or business.
                        </p>
                    </span>
                    <span>
                        <p class="pt-2">
                            Is this your business? <a href="#">Claim your profile</a>
                        </p>
                    </span>
                    <span>
                        <p class="pt-2">
                            Don't see your center listed?
                            <a href="{{ route('joinnow') }}">Enroll now</a>
                            to create your profile and start advertising and placing ads
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
            <div class="row">
                {{-- @dd($search_result); --}}
                @foreach ($search_result as $key => $val_search)
                    @php
                        $average_rating = DB::table('reviews')
                            ->where('daycareid', $val_search->id)
                            ->avg('rate');
                        $rounded_rating = round($average_rating);

                        $full_stars = floor($average_rating);
                        $half_star = $average_rating - $full_stars >= 0.5;

                        $latest_review = DB::table('reviews')
                            ->where('daycareid', $val_search->id)
                            ->orderBy('id', 'DESC')
                            ->first();
                        $rating = $latest_review ? $latest_review->rate : 0;
                    @endphp
                    <div class="col-lg-12">
                        <div class="dashboard_details">
                            <div class="clien_details">
                                <div class="profile_img">
                                    <figure>
                                        @if (!empty($val_search->feature_image))
                                            <img src="{{ asset($val_search->feature_image) }}"
                                                style="height: 329px;width: 100%;" alt="" class="img-fluid">
                                        @else
                                            <img src="{{ asset('assets/imgs/profile_empty.png') }}"
                                                style="height: 329px;width: 100%;" alt="" class="img-fluid">
                                        @endif
                                    </figure>
                                    <div class="client_info">
                                        <h4>{{ $val_search->name ? $val_search->name : 'N\A' }}</h4>
                                        <p>
                                            {{ $val_search->physical_address ?? 'N/A' }}
                                            {{-- @if (!empty($val_search->city) && !empty($val_search->state))
                                                {{ $val_search->city . ',' . $val_search->state }},
                                            @else
                                                {{ $val_search->city . ' ' . ($val_search->state = 'N\A') }}
                                            @endif --}}
                                        </p>
                                    </div>
                                </div>
                                <div class="rating_client">
                                    <span>{{ $average_rating ?? 0.0 }}</span>
                                    <div class="client_star">
                                        <?php for ($i = 0; $i < $full_stars; $i++): ?>
                                        <i class="fa-solid fa-star"></i>
                                        <?php endfor; ?>

                                        <?php if ($half_star): ?>
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                        <?php endif; ?>

                                        <?php for ($i = $full_stars + ($half_star ? 1 : 0); $i < 5; $i++): ?>
                                        <i class="fa-regular fa-star"></i>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="current_info">
                                <a class="btn btn-success"
                                    href="{{ URL('claimed_center_detail/' . $val_search->id) }}">View</a>

                                @if (is_null($val_search->claimed_by_id))
                                    @if (auth()->check() && auth()->user()->role == 4)
                                        <button data-toggle="modal" data-target="#myModal{{ $val_search->id }}"
                                            class="btn btn-primary">Claim</button>
                                    @else
                                        <button data-toggle="modal" data-target="#providerAlert"
                                            class="btn btn-primary">Claim</button>
                                    @endif
                                @else
                                    <button class="btn btn-danger" disabled>Claimed</button>
                                @endif
                                {{-- @endif --}}
                            </div>
                            <div class="comment_box">
                                <div class="rating_client">
                                    <span><?php echo htmlspecialchars($rating); ?></span>
                                    <div class="client_star">
                                        <?php
                                        // Full stars
                                        $full_stars = floor($rating);
                                        // Half star
                                        $half_star = ($rating - $full_stars) >= 0.5;
                                        // Display full stars
                                        for ($i = 0; $i < $full_stars; $i++): ?>
                                        <i class="fa-solid fa-star"></i>
                                        <?php endfor; ?>
                                        <?php if ($half_star): ?>
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                        <?php endif; ?>
                                        <?php for ($i = $full_stars + ($half_star ? 1 : 0); $i < 5; $i++): ?>
                                        <i class="fa-regular fa-star"></i>
                                        <?php endfor; ?>
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

                    <table id="" style="width:100%;"
                        class="table table-hover table-bordered table-striped text-center">

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
                                            @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == 4)
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

                    <form id="form{{ $value->id }}" action="{{ route('provider.updateDaycareCenter') }}" method="post"
                        enctype="multipart/form-data">

                        @csrf



                        <!-- Modal Header -->
                        <div class="modal-header">
                            {{--                                                                                <h5 class="modal-title text-center">Claimed --}}
                            <h5 class="modal-title text-center">Claim Center</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;
                            </button>
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
                                    <input type="text" name="county" value="{{ $value->county }}" class="form-control"
                                        required />

                                    <br>

                                    <label> Zipcode </label>
                                    <input type="text" name="zip" value="{{ $value->zip }}" class="form-control"
                                        required />

                                    <br>

                                    <label> Address </label>
                                    <input type="text" name="physical_address" value="{{ $value->physical_address }}"
                                        class="form-control" required />

                                </div>

                                <div class="col-md-6 mb-2">

                                    <label> City </label>
                                    <input type="text" name="city" value="{{ $value->city }}"
                                        class="form-control" required />

                                    <br>

                                    <label> Phone </label>
                                    <input type="text" name="phone" value="{{ $value->phone }}"
                                        class="form-control" required />

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
                                    <select type="text" name="age_accepted[]" class="form-control age_accepted"
                                        multiple id="">
                                        <option>Select</option>
                                        <option {!! in_array('0-1', $age_accepted) ? 'selected' : '' !!}>0-1</option>
                                        <option {!! in_array('1-2', $age_accepted) ? 'selected' : '' !!}>1-2</option>
                                        <option {!! in_array('2-3', $age_accepted) ? 'selected' : '' !!}>2-3</option>
                                        <option {!! in_array('3-4', $age_accepted) ? 'selected' : '' !!}>3-4</option>
                                        <option {!! in_array('4-5', $age_accepted) ? 'selected' : '' !!}>4-5</option>
                                        <option {!! in_array('School-ager', $age_accepted) ? 'selected' : '' !!}>School-ager</option>
                                    </select>

                                </div>

                                <div class="col-md-12 mb-2">

                                    <label> Description </label>
                                    <textarea type="text" style="height: 120px;" name="description" class="form-control" required> {{ $value->description }} </textarea>

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
                                    <textarea type="text" style="height: 120px;" name="location_iframe" class="form-control"> {{ $value->location_iframe }} </textarea>

                                </div>

                                @php
                                    $decoded_timings = json_decode($value->timings);
                                    $decoded_services = json_decode($value->services);
                                @endphp
                                <div class="col-md-6 mb-2 mt-4">
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

                                <div class="col-md-6 mb-2 mt-4">
                                    <h2 class="ml-2"> Services </h2>

                                    <div class="row ml-2">
                                        <label for="after_school" class="ml-5">
                                            <strong>After school</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                            name="services[After school]" id="after_school" {!! in_array('After school', $decoded_services) ? 'checked' : '' !!}>
                                    </div>

                                    <div class="row ml-2">
                                        <label for="before_school" class="ml-5">
                                            <strong>Before school</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                            name="services[Before school]" id="before_school" {!! in_array('Before school', $decoded_services) ? 'checked' : '' !!}>
                                    </div>

                                    <div class="row ml-2">
                                        <label for="drop_in" class="ml-5">
                                            <strong>Drop in</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                            name="services[Drop in]" id="drop_in" {!! in_array('Drop in', $decoded_services) ? 'checked' : '' !!}>
                                    </div>

                                    <div class="row ml-2">
                                        <label for="food_served" class="ml-5">
                                            <strong>Food served</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                            name="services[Food served]" id="food_served" {!! in_array('Food served', $decoded_services) ? 'checked' : '' !!}>
                                    </div>

                                    <div class="row ml-2">
                                        <label for="full_day" class="ml-5">
                                            <strong>Full day</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                            name="services[Full day]" id="full_day" {!! in_array('Full day', $decoded_services) ? 'checked' : '' !!}>
                                    </div>

                                    <div class="row ml-2">
                                        <label for="half_day" class="ml-5">
                                            <strong>Half day</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                            name="services[Half day]" id="half_day" {!! in_array('Half day', $decoded_services) ? 'checked' : '' !!}>
                                    </div>

                                    <div class="row ml-2">
                                        <label for="infant_care" class="ml-5">
                                            <strong>Infant care</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                            name="services[Infant care]" id="infant_care" {!! in_array('Infant care', $decoded_services) ? 'checked' : '' !!}>
                                    </div>

                                    <div class="row ml-2">
                                        <label for="night_care" class="ml-5">
                                            <strong>Night care</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                            name="services[Night care]" id="night_care" {!! in_array('Night care', $decoded_services) ? 'checked' : '' !!}>
                                    </div>

                                    <div class="row ml-2">
                                        <label for="transportation" class="ml-5">
                                            <strong>Transportation</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                            name="services[Transportation]" id="transportation" {!! in_array('Transportation', $decoded_services) ? 'checked' : '' !!}>
                                    </div>

                                    <div class="row ml-2">
                                        <label for="weekend_care" class="ml-5">
                                            <strong>Weekend care</strong>
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                            name="services[Weekend care]" id="weekend_care" {!! in_array('Weekend care', $decoded_services) ? 'checked' : '' !!}>
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
        });
    </script>
@endsection
