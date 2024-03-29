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
                                                    </tr>
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
