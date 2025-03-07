<!doctype html>
<html lang="en">

@include('headerlink')

<style>
    <!-- select2 
    -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</style>

<style>
    .form-group label {
        font-size: 20px;
        line-height: 0 !important;
        margin-left: 10px !important;
        margin-bottom: 20px !important;
    }

    .profilein1 input {
        outline: none;
        font-size: 15px;
        width: 100% !important;
        height: 50px !important;
        border: 1px solid #000 !important;
        color: #000 !important;
        border-radius: 10px !important;
    }


    .profilein1 textarea {
        outline: none;
        font-size: 15px;
        width: 100% !important;
        height: 150px !important;
        border: 1px solid #000 !important;
        color: #000 !important;
        border-radius: 10px !important;
        margin-left: 10px;
    }


    .dropify-wrapper input {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        cursor: pointer;
        z-index: 5;
    }


    .dropify-wrapper {

        height: 58px !important;
    }

    .dropify-wrapper .dropify-message span.file-icon {
        font-size: 28px !important;
        color: #CCC !important;

    }

    .account-details-form input {

        height: auto !important;
        width: auto !important;
    }

    div.dataTables_wrapper div.dataTables_filter input {
        margin-left: -4.5em !important;
        display: inline-block !important;
    }

    select.custom-select.custom-select-sm.form-control.form-control-sm {
        width: 60px !important;
    }



    label {
        margin-left: 10px;
    }

    .col-md-4 label {
        margin-top: 12px;
    }

    .modal .modal-dialog .modal-content .modal-body {
        padding: 35px 26px;
        max-height: 750px !important;
        overflow-y: scroll;
    }

    .modal-lg {
        max-width: 60% !important;
    }

    input[type="checkbox"] {
        width: 1em !important;
        height: 1rem !important;
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

    .special_h5 {
        font-size: 12px !important;
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

    .select2-container--default .select2-selection--multiple .select2-selection__choice__display {

        padding-left: 15px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove {
        color: #ffffff;
        margin-top: 4px;
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

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="profile-name">
                            <h5> {{ Auth::user()->name }} {{ Auth::user()->lname }} <span> {{ Auth::user()->email }}
                                </span></h5>
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

                <div class="col-lg-9 col-md-12 col-sm-12 col-12">

                    <div class="profileparent">
                        <div class="profilein1">


                            <section class="content">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="card">

                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                {{-- <form method="get" class="d-flex" action="{{ route('provider.findDaycare') }}"> --}}

                                                {{-- <div class="col-md-12 d-flex" > --}}

                                                {{-- <input type="text" name="search" class="form-control" placeholder="Enter State Name" value="{{$search}}" style="width: 50% !important; margin-left: 200px;" required/> --}}
                                                {{-- &nbsp;&nbsp; --}}
                                                {{-- <button type="submit" class="btn btn-primary" style="width: 25%; height: 50px;" > FIND YOUR DAYCARE CENTER </button> --}}

                                                {{-- </div> --}}

                                                {{-- </form> --}}

                                                {{-- <hr> --}}

                                                {{-- <br><br> --}}

                                                <table id="example1"
                                                    class="table table-hover table-bordered table-striped text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>Status</th>
                                                            <th>Name</th>
                                                            <th>County</th>
                                                            <th>City</th>
                                                            <th>Address</th>
                                                            <th>Zip</th>
                                                            <th>Phone</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach ($claimed_centers as $key => $value)
                                                        <tr>
                                                            <td> <?php if ($value->claim_status == 2) {
                                                                        echo 'CLAIMED';
                                                                    } else {
                                                                        echo 'CLAIM';
                                                                    } ?> </td>
                                                            <td>{{ $value->name ? $value->name : 'N\A' }}</td>
                                                            <td>{{ $value->county ? $value->county : 'N\A' }}</td>
                                                            <td>{{ $value->city ? $value->city : 'N\A' }}</td>
                                                            <td>{{ $value->physical_address ? $value->physical_address : 'N\A' }}
                                                            </td>
                                                            <td>{{ $value->zip ? $value->zip : 'N\A' }}</td>
                                                            <td>{{ $value->phone ? $value->phone : 'N\A' }}</td>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <button class="btn-sm btn-primary py-1 px-2"
                                                                            data-toggle="modal"
                                                                            data-target="#myModal{{ $value->id }}">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <button class="btn-sm btn-info py-1 px-2"
                                                                            data-toggle="modal"
                                                                            data-target="#myViewModal{{ $value->id }}">
                                                                            <i class="fas fa-eye"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <!-- The Edit Modal -->
                                                        <div class="modal fade" id="myModal{{ $value->id }}"
                                                            data-backdrop="static" data-keyboard="false">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">

                                                                    <form id="form{{ $value->id }}"
                                                                        action="{{ route('provider.updateDaycareCenter') }}"
                                                                        method="post"
                                                                        enctype="multipart/form-data">

                                                                        @csrf



                                                                        <!-- Modal Header -->
                                                                        <div class="modal-header">
                                                                            {{-- <h5 class="modal-title text-center">Claimed --}}
                                                                            <h5 class="modal-title text-center">
                                                                                Claim Center</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal">&times;
                                                                            </button>
                                                                        </div>

                                                                        <!-- Modal body -->
                                                                        <div class="modal-body">

                                                                            <p class="text-center">
                                                                                {{ $value->name }}
                                                                            </p>

                                                                            <hr>

                                                                            <div class="row">

                                                                                <div class="col-md-12 mb-2">

                                                                                    <input type="hidden"
                                                                                        name="id"
                                                                                        value="{{ $value->id }}" />

                                                                                    <label> Name </label>
                                                                                    <input type="text"
                                                                                        value="{{ $value->name }}"
                                                                                        class="form-control"
                                                                                        readonly />

                                                                                </div>

                                                                                <div class="col-md-6 mb-2">

                                                                                    <label> County </label>
                                                                                    <input type="text"
                                                                                        name="county"
                                                                                        value="{{ $value->county }}"
                                                                                        class="form-control"
                                                                                        required />

                                                                                    <br>

                                                                                    <label> Zipcode </label>
                                                                                    <input type="text"
                                                                                        name="zip"
                                                                                        value="{{ $value->zip }}"
                                                                                        class="form-control"
                                                                                        required />

                                                                                    <br>

                                                                                    <label> Address </label>
                                                                                    <input type="text"
                                                                                        name="physical_address"
                                                                                        value="{{ $value->physical_address }}"
                                                                                        class="form-control"
                                                                                        required />

                                                                                </div>

                                                                                <div class="col-md-6 mb-2">

                                                                                    <label> City </label>
                                                                                    <input type="text"
                                                                                        name="city"
                                                                                        value="{{ $value->city }}"
                                                                                        class="form-control"
                                                                                        required />

                                                                                    <br>

                                                                                    <label> Phone </label>
                                                                                    <input type="text"
                                                                                        name="phone"
                                                                                        value="{{ $value->phone }}"
                                                                                        class="form-control"
                                                                                        required />

                                                                                    <br>

                                                                                    <label> Email </label>
                                                                                    <input type="text"
                                                                                        name="email_address"
                                                                                        value="{{ $value->email_address }}"
                                                                                        class="form-control"
                                                                                        required />

                                                                                </div>

                                                                                <div class="col-md-12 mb-2">

                                                                                    <label> Ages Accepted : </label>
                                                                                    @php
                                                                                    $age_accepted = explode(',', $value->age_accepted);
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
                                                                                </div>

                                                                                <div class="col-md-12 mb-12">
                                                                                    <label for="food_served">Food Served:</label>
                                                                                    @php
                                                                                    $food_served = explode(',', $value->food_served ?? '');
                                                                                    @endphp
                                                                                    <select name="food_served[]" class="form-control food_served" multiple id="food_served">
                                                                                        <option value="Breakfast" {{ in_array('Breakfast', $food_served) ? 'selected' : '' }}>Breakfast</option>
                                                                                        <option value="Lunch" {{ in_array('Lunch', $food_served) ? 'selected' : '' }}>Lunch</option>
                                                                                        <option value="Snacks" {{ in_array('Snacks', $food_served) ? 'selected' : '' }}>Snacks</option>
                                                                                        <option value="Dinner" {{ in_array('Dinner', $food_served) ? 'selected' : '' }}>Dinner</option>
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
                                                                                        <option value="">{{ $value->tansportation }}</option>
                                                                                        <option value="yes">Yes</option>
                                                                                        <option value="no">No</option>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="col-md-12 mb-12">

                                                                                    <label>Family Discount Offered? </label>
                                                                                    <select type="text" name="family_discount_offered"
                                                                                        class="form-control language_spoken family_discount select_id">
                                                                                        <option value="">{{ $value->family_discount_offered }}</option>
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
                                                                                        <option value="">{{ $value->military_child_care_discount }}</option>
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
                                                                                                <input type="number" class="form-control language_spoken" value="{{ $value->application_registration }}" name="application_registration">
                                                                                                <label>Diapers </label>
                                                                                                <input type="number" class="form-control language_spoken" value="{{ $value->diapers }}" name="diapers">
                                                                                                <label>Early Drop off </label>
                                                                                                <input type="number" class="form-control language_spoken" value="{{ $value->early_drop_off }}" name="early_drop_off">
                                                                                                <label>Extended stay </label>
                                                                                                <input type="number" class="form-control language_spoken" value="{{ $value->extended_stay }}" name="extended_stay">
                                                                                                <label>Late Payment </label>
                                                                                                <input type="number" class="form-control language_spoken" value="{{ $value->late_payment }}" name="late_payment">
                                                                                                <label>WaitingList Registration </label>
                                                                                                <input type="number" class="form-control language_spoken" value="{{ $value->waitingList_registration }}" name="waitingList_registration">
                                                                                            </div>
                                                                                            <div class="col-lg-6">
                                                                                                <label>Late Pick-up </label>
                                                                                                <input type="number" class="form-control language_spoken" value="{{ $value->late_pick_up }}" name="late_pick_up">
                                                                                                <label>Meals/Snacks </label>
                                                                                                <input type="number" class="form-control language_spoken" value="{{ $value->meals_snacks }}" name="meals_snacks">
                                                                                                <label>Returned Check </label>
                                                                                                <input type="number" class="form-control language_spoken" value="{{ $value->returned_check }}" name="returned_check">
                                                                                                <label>Credit Card Declined </label>
                                                                                                <input type="number" class="form-control language_spoken" value="{{ $value->credit_card_declined }}" name="credit_card_declined">
                                                                                                <label>Supplies/Materials </label>
                                                                                                <input type="number" class="form-control language_spoken" value="{{ $value->supplies_materials }}" name="supplies_materials">
                                                                                                <label>Other </label>
                                                                                                <input type="number" class="form-control language_spoken" value="{{ $value->other }}" name="other">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12 mb-2">

                                                                                    <label> Description </label>
                                                                                    <textarea type="text" style="height: 120px;" name="description" class="form-control" required> {{ $value->description }} </textarea>

                                                                                </div>

                                                                                <div class="col-md-12 mb-2">

                                                                                    <label> Feature Image </label>
                                                                                    <input type="file"
                                                                                        name="feature_image"
                                                                                        class="form-control" />

                                                                                </div>

                                                                                <div class="col-md-12 mb-2">

                                                                                    <label> Other Image 1 </label>
                                                                                    <input type="file"
                                                                                        name="other_image_one"
                                                                                        class="form-control" />

                                                                                </div>

                                                                                <div class="col-md-12 mb-2">

                                                                                    <label> Other Image 2 </label>
                                                                                    <input type="file"
                                                                                        name="other_image_two"
                                                                                        class="form-control" />

                                                                                </div>

                                                                                <div class="col-md-12 mb-2">

                                                                                    <label> Location iframe </label>
                                                                                    <textarea type="text" style="height: 120px;" name="location_iframe" class="form-control"> {{ $value->location_iframe }} </textarea>

                                                                                </div>

                                                                                @php
                                                                                $decoded_timings =
                                                                                json_decode(
                                                                                $value->timings,
                                                                                true,
                                                                                ) ?? [];
                                                                                $decoded_services =
                                                                                json_decode(
                                                                                $value->services,
                                                                                true,
                                                                                ) ?? [];
                                                                                $decoded_meal_offered =
                                                                                json_decode(
                                                                                $value->meal_offered,
                                                                                true,
                                                                                ) ?? [];
                                                                                @endphp
                                                                                <div class="col-md-6 mb-2 mt-4">
                                                                                    <h2 class="ml-2"> Timings
                                                                                    </h2>

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
                                                                                        <div
                                                                                            class="col-md-4 form-group">
                                                                                            <input
                                                                                                class="form-control"
                                                                                                type="time"
                                                                                                name="timings[Monday][from]"
                                                                                                value="{{ !is_null($decoded_timings->Monday->from) ? Carbon\Carbon::parse($decoded_timings->Monday->from)->format('H:i') : '' }}">
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-4 form-group">
                                                                                            <input
                                                                                                class="form-control"
                                                                                                type="time"
                                                                                                name="timings[Monday][to]"
                                                                                                value="{{ !is_null($decoded_timings->Monday->to) ? Carbon\Carbon::parse($decoded_timings->Monday->to)->format('H:i') : '' }}">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <label for="">
                                                                                                <h5>Tuesday</h5>
                                                                                            </label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-4 form-group">
                                                                                            <input
                                                                                                class="form-control"
                                                                                                type="time"
                                                                                                name="timings[Tuesday][from]"
                                                                                                value="{{ !is_null($decoded_timings->Tuesday->from) ? Carbon\Carbon::parse($decoded_timings->Tuesday->from)->format('H:i') : '' }}">
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-4 form-group">
                                                                                            <input
                                                                                                class="form-control"
                                                                                                type="time"
                                                                                                name="timings[Tuesday][to]"
                                                                                                value="{{ !is_null($decoded_timings->Tuesday->to) ? Carbon\Carbon::parse($decoded_timings->Tuesday->to)->format('H:i') : '' }}">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <label for="">
                                                                                                <h5>Wednesday</h5>
                                                                                            </label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-4 form-group">
                                                                                            <input
                                                                                                class="form-control"
                                                                                                type="time"
                                                                                                name="timings[Wednesday][from]"
                                                                                                value="{{ !is_null($decoded_timings->Wednesday->from) ? Carbon\Carbon::parse($decoded_timings->Wednesday->from)->format('H:i') : '' }}">
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-4 form-group">
                                                                                            <input
                                                                                                class="form-control"
                                                                                                type="time"
                                                                                                name="timings[Wednesday][to]"
                                                                                                value="{{ !is_null($decoded_timings->Wednesday->to) ? Carbon\Carbon::parse($decoded_timings->Wednesday->to)->format('H:i') : '' }}">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <label for="">
                                                                                                <h5>Thursday</h5>
                                                                                            </label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-4 form-group">
                                                                                            <input
                                                                                                class="form-control"
                                                                                                type="time"
                                                                                                name="timings[Thursday][from]"
                                                                                                value="{{ !is_null($decoded_timings->Thursday->from) ? Carbon\Carbon::parse($decoded_timings->Thursday->from)->format('H:i') : '' }}">
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-4 form-group">
                                                                                            <input
                                                                                                class="form-control"
                                                                                                type="time"
                                                                                                name="timings[Thursday][to]"
                                                                                                value="{{ !is_null($decoded_timings->Thursday->to) ? Carbon\Carbon::parse($decoded_timings->Thursday->to)->format('H:i') : '' }}">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <label for="">
                                                                                                <h5>Friday</h5>
                                                                                            </label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-4 form-group">
                                                                                            <input
                                                                                                class="form-control"
                                                                                                type="time"
                                                                                                name="timings[Friday][from]"
                                                                                                value="{{ !is_null($decoded_timings->Friday->from) ? Carbon\Carbon::parse($decoded_timings->Friday->from)->format('H:i') : '' }}">
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-4 form-group">
                                                                                            <input
                                                                                                class="form-control"
                                                                                                type="time"
                                                                                                name="timings[Friday][to]"
                                                                                                value="{{ !is_null($decoded_timings->Friday->to) ? Carbon\Carbon::parse($decoded_timings->Friday->to)->format('H:i') : '' }}">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <label for="">
                                                                                                <h5>Saturday</h5>
                                                                                            </label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-4 form-group">
                                                                                            <input
                                                                                                class="form-control"
                                                                                                type="time"
                                                                                                name="timings[Saturday][from]"
                                                                                                value="{{ !is_null($decoded_timings->Saturday->from) ? Carbon\Carbon::parse($decoded_timings->Saturday->from)->format('H:i') : '' }}">
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-4 form-group">
                                                                                            <input
                                                                                                class="form-control"
                                                                                                type="time"
                                                                                                name="timings[Saturday][to]"
                                                                                                value="{{ !is_null($decoded_timings->Saturday->to) ? Carbon\Carbon::parse($decoded_timings->Saturday->to)->format('H:i') : '' }}">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <label for="">
                                                                                                <h5>Sunday</h5>
                                                                                            </label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-4 form-group">
                                                                                            <input
                                                                                                class="form-control"
                                                                                                type="time"
                                                                                                name="timings[Sunday][from]"
                                                                                                value="{{ !is_null($decoded_timings->Sunday->from) ? Carbon\Carbon::parse($decoded_timings->Sunday->from)->format('H:i') : '' }}">
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-4 form-group">
                                                                                            <input
                                                                                                class="form-control"
                                                                                                type="time"
                                                                                                name="timings[Sunday][to]"
                                                                                                value="{{ !is_null($decoded_timings->Sunday->to) ? Carbon\Carbon::parse($decoded_timings->Sunday->to)->format('H:i') : '' }}">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-6 mb-2 mt-4">
                                                                                    <h2 class="ml-2"> Services
                                                                                    </h2>
                                                                                    <div class="row ml-2">
                                                                                        <label for="full_time"
                                                                                            class="ml-5">
                                                                                            <strong>Full
                                                                                                Time</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[Full Time]"
                                                                                            id="full_time"
                                                                                            {!! in_array('Full Time', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>



                                                                                    <div class="row ml-2">
                                                                                        <label for="part_time"
                                                                                            class="ml-5">
                                                                                            <strong>Part
                                                                                                Time</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[Part Time]"
                                                                                            id="part_time"
                                                                                            {!! in_array('Part Time', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label for="before_school"
                                                                                            class="ml-5">
                                                                                            <strong>Before
                                                                                                school</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[Before school]"
                                                                                            id="before_school"
                                                                                            {!! in_array('Before school', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label for="after_school"
                                                                                            class="ml-5">
                                                                                            <strong>After
                                                                                                school</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[After school]"
                                                                                            id="after_school"
                                                                                            {!! in_array('After school', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label for="camp"
                                                                                            class="ml-5">
                                                                                            <strong>Camp</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[Camp]"
                                                                                            id="camp"
                                                                                            {!! in_array('Camp', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label
                                                                                            for="early_head_start"
                                                                                            class="ml-5">
                                                                                            <strong>Early Head
                                                                                                Start</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[Early Head Start]"
                                                                                            id="early_head_start"
                                                                                            {!! in_array('Early Head Start', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label for="24_hour_care"
                                                                                            class="ml-5">
                                                                                            <strong>24-Hour
                                                                                                Care</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[24-Hour Care]"
                                                                                            id="24_hour_care"
                                                                                            {!! in_array('24-Hour Care', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label for="head_start"
                                                                                            class="ml-5">
                                                                                            <strong>Head
                                                                                                Start</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[Head Start]"
                                                                                            id="head_start"
                                                                                            {!! in_array('Head Start', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label
                                                                                            for="migrant_head_start"
                                                                                            class="ml-5">
                                                                                            <strong>Migrant Head
                                                                                                Start</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[Migrant Head Start]"
                                                                                            id="migrant_head_start"
                                                                                            {!! in_array('Migrant Head Start', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label for="kindergarten"
                                                                                            class="ml-5">
                                                                                            <strong>Kindergarten</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[Kindergarten]"
                                                                                            id="kindergarten"
                                                                                            {!! in_array('Kindergarten', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label for="summer_camp"
                                                                                            class="ml-5">
                                                                                            <strong>Summer
                                                                                                Camp</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[Summer Camp]"
                                                                                            id="summer_camp"
                                                                                            {!! in_array('Summer Camp', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>


                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <div class="row ml-2">
                                                                                        <label for="playgroup"
                                                                                            class="ml-5">
                                                                                            <strong>Playgroup</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[Playgroup]"
                                                                                            id="playgroup"
                                                                                            {!! in_array('Playgroup', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label
                                                                                            for="sick_child_care_mildly_Ill"
                                                                                            class="ml-5">
                                                                                            <strong>Sick Child
                                                                                                Care-Mildly
                                                                                                Ill</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[Sick Child Care-Mildly Ill]"
                                                                                            id="sick_child_care_mildly_Ill"
                                                                                            {!! in_array('Sick Child Care-Mildly Ill', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label for="overnight"
                                                                                            class="ml-5">
                                                                                            <strong>Overnight</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[Overnight]"
                                                                                            id="overnight"
                                                                                            {!! in_array('Overnight', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>


                                                                                    <div class="row ml-2">
                                                                                        <label for="drop_in"
                                                                                            class="ml-5">
                                                                                            <strong>Drop in</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[Drop in]"
                                                                                            id="drop_in"
                                                                                            {!! in_array('Drop in', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label for="food_served"
                                                                                            class="ml-5">
                                                                                            <strong>Food
                                                                                                served</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[Food served]"
                                                                                            id="food_served"
                                                                                            {!! in_array('Food served', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label for="full_day"
                                                                                            class="ml-5">
                                                                                            <strong>Full
                                                                                                day</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[Full day]"
                                                                                            id="full_day"
                                                                                            {!! in_array('Full day', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label for="half_day"
                                                                                            class="ml-5">
                                                                                            <strong>Half
                                                                                                day</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[Half day]"
                                                                                            id="half_day"
                                                                                            {!! in_array('Half day', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label for="infant_care"
                                                                                            class="ml-5">
                                                                                            <strong>Infant
                                                                                                care</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[Infant care]"
                                                                                            id="infant_care"
                                                                                            {!! in_array('Infant care', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label for="night_care"
                                                                                            class="ml-5">
                                                                                            <strong>Night
                                                                                                care</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[Night care]"
                                                                                            id="night_care"
                                                                                            {!! in_array('Night care', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label for="transportation"
                                                                                            class="ml-5">
                                                                                            <strong>Transportation</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[Transportation]"
                                                                                            id="transportation"
                                                                                            {!! in_array('Transportation', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label for="weekend_care"
                                                                                            class="ml-5">
                                                                                            <strong>Weekend
                                                                                                care</strong>
                                                                                        </label>
                                                                                        <input
                                                                                            class="form-check-input"
                                                                                            type="checkbox"
                                                                                            value=""
                                                                                            name="services[Weekend care]"
                                                                                            id="weekend_care"
                                                                                            {!! in_array('Weekend care', $decoded_services ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-md-12 mb-2 mt-4 services_list">
                                                                                    <h5 class="ml-2 mb-3"> Meals Offered <span>Select all that apply</span> </h5>
                                                                                    <div class="row ml-2">
                                                                                        <label for="full_time" class="ml-5">
                                                                                            <strong>Breakfast</strong>
                                                                                        </label>
                                                                                        <input class="form-check-input" type="checkbox" value=""
                                                                                            name="meal_offered[Breakfast]" id="breakfast" {!! in_array('Breakfast', $decoded_meal_offered ?? []) ? 'checked' : '' !!}>
                                                                                    </div>
                                                                                    <div class="row ml-2">
                                                                                        <label for="full_time" class="ml-5">
                                                                                            <strong>Morning Snack</strong>
                                                                                        </label>
                                                                                        <input class="form-check-input" type="checkbox" value=""
                                                                                            name="meal_offered[Morning Snack]" id="morning_snack"
                                                                                            {!! in_array('Morning Snack', $decoded_meal_offered ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label for="full_time" class="ml-5">
                                                                                            <strong>Lunch</strong>
                                                                                        </label>
                                                                                        <input class="form-check-input" type="checkbox" value=""
                                                                                            name="meal_offered[Lunch]" id="lunch" {!! in_array('Lunch', $decoded_meal_offered ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label for="full_time" class="ml-5">
                                                                                            <strong>Afternoon Snack</strong>
                                                                                        </label>
                                                                                        <input class="form-check-input" type="checkbox" value=""
                                                                                            name="meal_offered[Afternoon Snack]" id="afternoon_snack"
                                                                                            {!! in_array('Afternoon Snack', $decoded_meal_offered ?? []) ? 'checked' : '' !!}>
                                                                                    </div>

                                                                                    <div class="row ml-2">
                                                                                        <label for="full_time" class="ml-5">
                                                                                            <strong>Dinner</strong>
                                                                                        </label>
                                                                                        <input class="form-check-input" type="checkbox" value=""
                                                                                            name="meal_offered[Dinner]" id="dinner" {!! in_array('Dinner', $decoded_meal_offered ?? []) ? 'checked' : '' !!}>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <!-- Modal footer -->
                                                                        <div class="modal-footer">
                                                                            <input type="submit"
                                                                                class="btn btn-primary" />
                                                                        </div>

                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- The View Modal -->
                                                        <div class="modal fade"
                                                            id="myViewModal{{ $value->id }}"
                                                            data-backdrop="static" data-keyboard="false">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        {{-- <h5 class="modal-title text-center">Claimed --}}
                                                                        <h4 class="modal-title text-center">
                                                                            {{ $value->name }}
                                                                        </h4>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal">&times;
                                                                        </button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <img src="{{ asset($value->feature_image) }}"
                                                                                    alt=""
                                                                                    class="img-fluid"
                                                                                    height="2">
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <img src="{{ asset($value->other_image_one) }}"
                                                                                    alt=""
                                                                                    class="img-fluid"
                                                                                    height="2">
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <img src="{{ asset($value->other_image_two) }}"
                                                                                    alt=""
                                                                                    class="img-fluid"
                                                                                    height="2">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            @if ($value->county)
                                                                            <div class="col-3 px-4 py-2">
                                                                                <div class="row text-left">
                                                                                    <strong>County</strong>
                                                                                </div>
                                                                                <div class="row text-left">
                                                                                    {{ $value->county }}
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                            @if ($value->zip)
                                                                            <div class="col-3 px-4 py-2">
                                                                                <div class="row text-left">
                                                                                    <strong>Zipcode</strong>
                                                                                </div>
                                                                                <div class="row text-left">
                                                                                    {{ $value->zip }}
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                            @if ($value->physical_address)
                                                                            <div class="col-3 px-4 py-2">
                                                                                <div class="row text-left">
                                                                                    <strong>Address</strong>
                                                                                </div>
                                                                                <div class="row text-left">
                                                                                    {{ $value->physical_address }}
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                            @if ($value->city)
                                                                            <div class="col-3 px-4 py-2">
                                                                                <div class="row text-left">
                                                                                    <strong>City</strong>
                                                                                </div>
                                                                                <div class="row text-left">
                                                                                    {{ $value->city }}
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                            @if ($value->phone)
                                                                            <div class="col-3 px-4 py-2">
                                                                                <div class="row text-left">
                                                                                    <strong>Phone</strong>
                                                                                </div>
                                                                                <div class="row text-left">
                                                                                    {{ $value->phone }}
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                            @if ($value->email_address)
                                                                            <div class="col-3 px-4 py-2">
                                                                                <div class="row text-left">
                                                                                    <strong>Email</strong>
                                                                                </div>
                                                                                <div class="row text-left">
                                                                                    {{ $value->email_address }}
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                            @if ($value->description)
                                                                            <div class="col-12 px-4 py-2">
                                                                                <div class="row text-left">
                                                                                    <strong>Description</strong>
                                                                                </div>
                                                                                <div class="row text-left">
                                                                                    {{ $value->description }}
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                        </div>

                                                                        <div class="row">
                                                                            @php
                                                                            $decoded_timings = json_decode(
                                                                            $value->timings,
                                                                            );
                                                                            $decoded_services = json_decode(
                                                                            $value->services,
                                                                            );
                                                                            @endphp
                                                                            <div class="col-md-6 mb-2 mt-4">
                                                                                <h4 class="ml-2"> Timings </h4>

                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <label for="">
                                                                                            <h5 class="special_h5">
                                                                                                Monday</h5>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="">
                                                                                            @if (!is_null($decoded_timings->Monday->from) && !is_null($decoded_timings->Monday->to))
                                                                                            <h5
                                                                                                class="special_h5">
                                                                                                {{ Carbon\Carbon::parse($decoded_timings->Monday->from)->format('h:i A') . ' - ' . Carbon\Carbon::parse($decoded_timings->Monday->to)->format('h:i A') }}
                                                                                            </h5>
                                                                                            @else
                                                                                            <h5
                                                                                                class="text-danger special_h5">
                                                                                                Closed</h5>
                                                                                            @endif
                                                                                        </label>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <label for="">
                                                                                            <h5 class="special_h5">
                                                                                                Tuesday</h5>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="">
                                                                                            @if (!is_null($decoded_timings->Tuesday->from) && !is_null($decoded_timings->Tuesday->to))
                                                                                            <h5
                                                                                                class="special_h5">
                                                                                                {{ Carbon\Carbon::parse($decoded_timings->Tuesday->from)->format('h:i A') . ' - ' . Carbon\Carbon::parse($decoded_timings->Tuesday->to)->format('h:i A') }}
                                                                                            </h5>
                                                                                            @else
                                                                                            <h5
                                                                                                class="text-danger special_h5">
                                                                                                Closed</h5>
                                                                                            @endif
                                                                                        </label>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <label for="">
                                                                                            <h5 class="special_h5">
                                                                                                Wednesday</h5>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="">
                                                                                            @if (!is_null($decoded_timings->Wednesday->from) && !is_null($decoded_timings->Wednesday->to))
                                                                                            <h5
                                                                                                class="special_h5">
                                                                                                {{ Carbon\Carbon::parse($decoded_timings->Wednesday->from)->format('h:i A') . ' - ' . Carbon\Carbon::parse($decoded_timings->Wednesday->to)->format('h:i A') }}
                                                                                            </h5>
                                                                                            @else
                                                                                            <h5
                                                                                                class="text-danger special_h5">
                                                                                                Closed</h5>
                                                                                            @endif
                                                                                        </label>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <label for="">
                                                                                            <h5 class="special_h5">
                                                                                                Thursday</h5>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="">
                                                                                            @if (!is_null($decoded_timings->Thursday->from) && !is_null($decoded_timings->Thursday->to))
                                                                                            <h5
                                                                                                class="special_h5">
                                                                                                {{ Carbon\Carbon::parse($decoded_timings->Thursday->from)->format('h:i A') . ' - ' . Carbon\Carbon::parse($decoded_timings->Thursday->to)->format('h:i A') }}
                                                                                            </h5>
                                                                                            @else
                                                                                            <h5
                                                                                                class="text-danger special_h5">
                                                                                                Closed</h5>
                                                                                            @endif
                                                                                        </label>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <label for="">
                                                                                            <h5 class="special_h5">
                                                                                                Friday</h5>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="">
                                                                                            @if (!is_null($decoded_timings->Friday->from) && !is_null($decoded_timings->Friday->to))
                                                                                            <h5
                                                                                                class="special_h5">
                                                                                                {{ Carbon\Carbon::parse($decoded_timings->Friday->from)->format('h:i A') . ' - ' . Carbon\Carbon::parse($decoded_timings->Friday->to)->format('h:i A') }}
                                                                                            </h5>
                                                                                            @else
                                                                                            <h5
                                                                                                class="text-danger special_h5">
                                                                                                Closed</h5>
                                                                                            @endif
                                                                                        </label>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <label for="">
                                                                                            <h5 class="special_h5">
                                                                                                Saturday</h5>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="">
                                                                                            @if (!is_null($decoded_timings->Saturday->from) && !is_null($decoded_timings->Saturday->to))
                                                                                            <h5
                                                                                                class="special_h5">
                                                                                                {{ Carbon\Carbon::parse($decoded_timings->Saturday->from)->format('h:i A') . ' - ' . Carbon\Carbon::parse($decoded_timings->Saturday->to)->format('h:i A') }}
                                                                                            </h5>
                                                                                            @else
                                                                                            <h5
                                                                                                class="text-danger special_h5">
                                                                                                Closed</h5>
                                                                                            @endif
                                                                                        </label>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <label for="">
                                                                                            <h5 class="special_h5">
                                                                                                Sunday</h5>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="">
                                                                                            @if (!is_null($decoded_timings->Sunday->from) && !is_null($decoded_timings->Sunday->to))
                                                                                            <h5
                                                                                                class="special_h5">
                                                                                                {{ Carbon\Carbon::parse($decoded_timings->Sunday->from)->format('h:i A') . ' - ' . Carbon\Carbon::parse($decoded_timings->Sunday->to)->format('h:i A') }}
                                                                                            </h5>
                                                                                            @else
                                                                                            <h5
                                                                                                class="text-danger special_h5">
                                                                                                Closed</h5>
                                                                                            @endif
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6 mb-2 mt-4"
                                                                                style="font-size: 12px;">
                                                                                <h4 class="ml-2"> Services </h4>
                                                                                @if (count($decoded_services ?? []))
                                                                                @foreach ($decoded_services as $service)
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-12 text-left">
                                                                                        <label
                                                                                            for="after_school"
                                                                                            class="">
                                                                                            <strong>{{ $service }}</strong>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                @endforeach
                                                                                @else
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-12 text-left ml-2">
                                                                                        <span>No
                                                                                            services.</span>
                                                                                    </div>
                                                                                </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </tbody>

                                                </table>

                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </section>


                        </div>
                        <div class="write-jus">


                        </div>
                    </div>

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
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
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


</body>

</html>