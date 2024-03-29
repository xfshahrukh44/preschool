<!doctype html>
<html lang="en">

@include('headerlink')

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

            <div class="col-lg-9 col-md-8">

                <div class="profileparent">
                    <div class="profilein1">


                        <section class="content">
                            <div class="row">
                                <div class="col-12">

                                    <div class="card">

                                        <!-- /.card-header -->
                                        <div class="card-body">
{{--                                            <form method="get" class="d-flex" action="{{ route('provider.findDaycare') }}">--}}

{{--                                                <div class="col-md-12 d-flex" >--}}

{{--                                                    <input type="text" name="search" class="form-control" placeholder="Enter State Name" value="{{$search}}" style="width: 50% !important; margin-left: 200px;" required/>--}}
{{--                                                    &nbsp;&nbsp;--}}
{{--                                                    <button type="submit" class="btn btn-primary" style="width: 25%; height: 50px;" > FIND YOUR DAYCARE CENTER </button>--}}

{{--                                                </div>--}}

{{--                                            </form>--}}

{{--                                            <hr>--}}

{{--                                            <br><br>--}}

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
                                                @foreach($claimed_centers as $key => $value)
                                                    <tr>
                                                        <td> <?php if($value->claim_status == 2){ echo "CLAIMED";}else{ echo "CLAIM"; } ?> </td>
                                                        <td>{{$value->name ? $value->name : 'N\A' }}</td>
                                                        <td>{{$value->county ? $value->county : 'N\A'}}</td>
                                                        <td>{{$value->city ? $value->city : 'N\A'}}</td>
                                                        <td>{{$value->physical_address ? $value->physical_address : 'N\A'}}</td>
                                                        <td>{{$value->zip ? $value->zip : 'N\A'}}</td>
                                                        <td>{{$value->phone ? $value->phone : 'N\A'}}</td>
                                                        <td>
                                                            <button class="btn btn-primary" data-toggle="modal"
                                                                    data-target="#myModal{{$value->id}}"> <i class="fas fa-edit"></i> Edit
                                                            </button>
                                                        </td>
                                                    </tr>

                                                    <!-- The Modal -->
                                                    <div class="modal fade" id="myModal{{$value->id}}" data-backdrop="static" data-keyboard="false">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">

                                                                <form id="form{{$value->id}}"
                                                                      action="{{ route('provider.updateDaycareCenter') }}"
                                                                      method="post" enctype="multipart/form-data">

                                                                @csrf



                                                                <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        {{--                                                                                <h5 class="modal-title text-center">Claimed--}}
                                                                        <h5 class="modal-title text-center">Claim Center</h5>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal">&times;
                                                                        </button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">

                                                                        <p class="text-center"> {{$value->name}} </p>

                                                                        <hr>

                                                                        <div class="row">

                                                                            <div class="col-md-12 mb-2">

                                                                                <input type="hidden" name="id"
                                                                                       value="{{ $value->id }}"/>

                                                                                <label> Name </label>
                                                                                <input type="text"
                                                                                       value="{{$value->name}}"
                                                                                       class="form-control" readonly/>

                                                                            </div>

                                                                            <div class="col-md-6 mb-2">

                                                                                <label> County </label>
                                                                                <input type="text" name="county"
                                                                                       value="{{$value->county}}"
                                                                                       class="form-control" required/>

                                                                                <br>

                                                                                <label> Zipcode </label>
                                                                                <input type="text" name="zip"
                                                                                       value="{{$value->zip}}"
                                                                                       class="form-control" required/>

                                                                                <br>

                                                                                <label> Address </label>
                                                                                <input type="text"
                                                                                       name="physical_address"
                                                                                       value="{{$value->physical_address}}"
                                                                                       class="form-control" required/>

                                                                            </div>

                                                                            <div class="col-md-6 mb-2">

                                                                                <label> City </label>
                                                                                <input type="text" name="city"
                                                                                       value="{{$value->city}}"
                                                                                       class="form-control" required/>

                                                                                <br>

                                                                                <label> Phone </label>
                                                                                <input type="text" name="phone"
                                                                                       value="{{$value->phone}}"
                                                                                       class="form-control" required/>

                                                                                <br>

                                                                                <label> Email </label>
                                                                                <input type="text" name="email_address"
                                                                                       value="{{$value->email_address}}"
                                                                                       class="form-control" required/>

                                                                            </div>

                                                                            <div class="col-md-12 mb-2">

                                                                                <label> Description </label>
                                                                                <textarea type="text"
                                                                                          style="height: 120px;"
                                                                                          name="description"
                                                                                          class="form-control"
                                                                                          required> {{$value->description}} </textarea>

                                                                            </div>

                                                                            <div class="col-md-12 mb-2">

                                                                                <label> Feature Image </label>
                                                                                <input type="file" name="feature_image"
                                                                                       class="form-control"/>

                                                                            </div>

                                                                            <div class="col-md-12 mb-2">

                                                                                <label> Other Image 1 </label>
                                                                                <input type="file"
                                                                                       name="other_image_one"
                                                                                       class="form-control"/>

                                                                            </div>

                                                                            <div class="col-md-12 mb-2">

                                                                                <label> Other Image 2 </label>
                                                                                <input type="file"
                                                                                       name="other_image_two"
                                                                                       class="form-control"/>

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
                                                                                        <input class="form-control" type="time"
                                                                                               name="timings[Monday][from]" value="{{!is_null($decoded_timings->Monday->from) ? Carbon\Carbon::parse($decoded_timings->Monday->from)->format('H:i') : ''}}">
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <input class="form-control" type="time"
                                                                                               name="timings[Monday][to]" value="{{!is_null($decoded_timings->Monday->to) ? Carbon\Carbon::parse($decoded_timings->Monday->to)->format('H:i') : ''}}">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-4">
                                                                                        <label for="">
                                                                                            <h5>Tuesday</h5>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <input class="form-control" type="time"
                                                                                               name="timings[Tuesday][from]" value="{{!is_null($decoded_timings->Tuesday->from) ? Carbon\Carbon::parse($decoded_timings->Tuesday->from)->format('H:i') : ''}}">
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <input class="form-control" type="time"
                                                                                               name="timings[Tuesday][to]" value="{{!is_null($decoded_timings->Tuesday->to) ? Carbon\Carbon::parse($decoded_timings->Tuesday->to)->format('H:i') : ''}}">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-4">
                                                                                        <label for="">
                                                                                            <h5>Wednesday</h5>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <input class="form-control" type="time"
                                                                                               name="timings[Wednesday][from]" value="{{!is_null($decoded_timings->Wednesday->from) ? Carbon\Carbon::parse($decoded_timings->Wednesday->from)->format('H:i') : ''}}">
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <input class="form-control" type="time"
                                                                                               name="timings[Wednesday][to]" value="{{!is_null($decoded_timings->Wednesday->to) ? Carbon\Carbon::parse($decoded_timings->Wednesday->to)->format('H:i') : ''}}">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-4">
                                                                                        <label for="">
                                                                                            <h5>Thursday</h5>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <input class="form-control" type="time"
                                                                                               name="timings[Thursday][from]" value="{{!is_null($decoded_timings->Thursday->from) ? Carbon\Carbon::parse($decoded_timings->Thursday->from)->format('H:i') : ''}}">
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <input class="form-control" type="time"
                                                                                               name="timings[Thursday][to]" value="{{!is_null($decoded_timings->Thursday->to) ? Carbon\Carbon::parse($decoded_timings->Thursday->to)->format('H:i') : ''}}">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-4">
                                                                                        <label for="">
                                                                                            <h5>Friday</h5>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <input class="form-control" type="time"
                                                                                               name="timings[Friday][from]" value="{{!is_null($decoded_timings->Friday->from) ? Carbon\Carbon::parse($decoded_timings->Friday->from)->format('H:i') : ''}}">
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <input class="form-control" type="time"
                                                                                               name="timings[Friday][to]" value="{{!is_null($decoded_timings->Friday->to) ? Carbon\Carbon::parse($decoded_timings->Friday->to)->format('H:i') : ''}}">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-4">
                                                                                        <label for="">
                                                                                            <h5>Saturday</h5>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <input class="form-control" type="time"
                                                                                               name="timings[Saturday][from]" value="{{!is_null($decoded_timings->Saturday->from) ? Carbon\Carbon::parse($decoded_timings->Saturday->from)->format('H:i') : ''}}">
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <input class="form-control" type="time"
                                                                                               name="timings[Saturday][to]" value="{{!is_null($decoded_timings->Saturday->to) ? Carbon\Carbon::parse($decoded_timings->Saturday->to)->format('H:i') : ''}}">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-4">
                                                                                        <label for="">
                                                                                            <h5>Sunday</h5>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <input class="form-control" type="time"
                                                                                               name="timings[Sunday][from]" value="{{!is_null($decoded_timings->Sunday->from) ? Carbon\Carbon::parse($decoded_timings->Sunday->from)->format('H:i') : ''}}">
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <input class="form-control" type="time"
                                                                                               name="timings[Sunday][to]" value="{{!is_null($decoded_timings->Sunday->to) ? Carbon\Carbon::parse($decoded_timings->Sunday->to)->format('H:i') : ''}}">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6 mb-2 mt-4">
                                                                                <h2 class="ml-2"> Services </h2>

                                                                                <div class="row ml-2">
                                                                                    <label for="after_school" class="ml-5">
                                                                                        <strong>After school</strong>
                                                                                    </label>
                                                                                    <input class="form-check-input" type="checkbox" value="" name="services[After school]" id="after_school" {!! in_array('After school', $decoded_services) ? 'checked' : '' !!}>
                                                                                </div>

                                                                                <div class="row ml-2">
                                                                                    <label for="before_school" class="ml-5">
                                                                                        <strong>Before school</strong>
                                                                                    </label>
                                                                                    <input class="form-check-input" type="checkbox" value="" name="services[Before school]" id="before_school" {!! in_array('Before school', $decoded_services) ? 'checked' : '' !!}>
                                                                                </div>

                                                                                <div class="row ml-2">
                                                                                    <label for="drop_in" class="ml-5">
                                                                                        <strong>Drop in</strong>
                                                                                    </label>
                                                                                    <input class="form-check-input" type="checkbox" value="" name="services[Drop in]" id="drop_in" {!! in_array('Drop in', $decoded_services) ? 'checked' : '' !!}>
                                                                                </div>

                                                                                <div class="row ml-2">
                                                                                    <label for="food_served" class="ml-5">
                                                                                        <strong>Food served</strong>
                                                                                    </label>
                                                                                    <input class="form-check-input" type="checkbox" value="" name="services[Food served]" id="food_served" {!! in_array('Food served', $decoded_services) ? 'checked' : '' !!}>
                                                                                </div>

                                                                                <div class="row ml-2">
                                                                                    <label for="full_day" class="ml-5">
                                                                                        <strong>Full day</strong>
                                                                                    </label>
                                                                                    <input class="form-check-input" type="checkbox" value="" name="services[Full day]" id="full_day" {!! in_array('Full day', $decoded_services) ? 'checked' : '' !!}>
                                                                                </div>

                                                                                <div class="row ml-2">
                                                                                    <label for="half_day" class="ml-5">
                                                                                        <strong>Half day</strong>
                                                                                    </label>
                                                                                    <input class="form-check-input" type="checkbox" value="" name="services[Half day]" id="half_day" {!! in_array('Half day', $decoded_services) ? 'checked' : '' !!}>
                                                                                </div>

                                                                                <div class="row ml-2">
                                                                                    <label for="infant_care" class="ml-5">
                                                                                        <strong>Infant care</strong>
                                                                                    </label>
                                                                                    <input class="form-check-input" type="checkbox" value="" name="services[Infant care]" id="infant_care" {!! in_array('Infant care', $decoded_services) ? 'checked' : '' !!}>
                                                                                </div>

                                                                                <div class="row ml-2">
                                                                                    <label for="night_care" class="ml-5">
                                                                                        <strong>Night care</strong>
                                                                                    </label>
                                                                                    <input class="form-check-input" type="checkbox" value="" name="services[Night care]" id="night_care" {!! in_array('Night care', $decoded_services) ? 'checked' : '' !!}>
                                                                                </div>

                                                                                <div class="row ml-2">
                                                                                    <label for="transportation" class="ml-5">
                                                                                        <strong>Transportation</strong>
                                                                                    </label>
                                                                                    <input class="form-check-input" type="checkbox" value="" name="services[Transportation]" id="transportation" {!! in_array('Transportation', $decoded_services) ? 'checked' : '' !!}>
                                                                                </div>

                                                                                <div class="row ml-2">
                                                                                    <label for="weekend_care" class="ml-5">
                                                                                        <strong>Weekend care</strong>
                                                                                    </label>
                                                                                    <input class="form-check-input" type="checkbox" value="" name="services[Weekend care]" id="weekend_care" {!! in_array('Weekend care', $decoded_services) ? 'checked' : '' !!}>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <input type="submit" class="btn btn-primary"/>
                                                                    </div>

                                                                </form>

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


</body>

</html>
