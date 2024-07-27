@extends('layouts.main')

@section('css')
    <style>
        /* section-1 */
        .section-1 {
            padding: 50px 0 50px 0;
            background: #d5d3d2;
        }

        .section-1 .heading-2 {
            padding-bottom: 40px;
        }

        .section-1-dropdown {
            border: 1px solid var(--black-color);
            color: var(--black-color);
            padding: 0px 20px;
            height: 50px;
            border-radius: 10px;
        }

        .section-1-main-txt1 .heading-6 {
            padding: 10px 0 5px 0;
        }

        .border-line {
            border-top: 1px solid var(--white-color-1);
            margin: 20px 0 20px 0;
        }

        .section-1-main-txt2 .form-check {
            padding: 10px;
        }

        .main-cheak {
            display: flex;
            gap: 10px;
            padding: 0 4px 0 4px;
        }

        .main-box-blue {
            background-color: var(--blue-color-1);
            width: 40px;
            height: 30px;
            color: var(--white-color);
            border-radius: 10px;
            font-weight: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main-box {
            color: var(--blue-color-1);
            font-size: 18px;
        }

        .section-1 label {
            display: inline-block;
            margin-bottom: 0.5rem;
            font-size: 13px;
        }

        .radio-cheak {
            display: flex;
        }

        .radio-cheak .checkmark--radio {
            padding-left: 10px;
        }

        .section-1-menu {
            background-color: var(--white-color);
            box-shadow: 0px 0px 10px -6px var(--black-color);
            border: 1px solid var(--white-color-1);
            margin-bottom: 50px;
            padding: 25px;
        }

        .section-1-menu-1 {
            display: flex;
            justify-content: space-between;
            background-color: var(--white-color-1);
            padding: 14px;
        }

        .section-1-detail-txt1 .heading-6 a {
            color: var(--blue-color-2) !important;
        }

        .section-1-detail-txt2 {
            text-align: right;
        }

        .section-1-menu-text {
            padding: 10px;
            display: flex;
            gap: 30px;
            width: 100%;
            align-items: center;
        }

        .section-1-menu-img img {
            height: 280px;
        }

        .section-1-menu-img {
            width: 40%;
        }

        .section-1-menu-txt {
            width: 60%;
        }

        .span-txt {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .section-1-menu-txt .para-2 {
            padding: 8px 0 9px 0;
            margin: 0;
        }

        .section-1-menu-txt i {
            font-size: 20px;
            padding-left: 10px;
            color: var(--blue-color-1);
        }

        .section-1-menu-txt .heading-6 a {
            color: var(--blue-color-1) !important;
            font-size: 16px;
        }

        .section-1-menu-txt .para-2 a {
            color: var(--blue-color-1) !important;
            font-size: 14px;
        }

        .section-1-menu-txt .border-line {
            border-top: 1px solid var(--white-color-1);
            margin: 0px 0 10px 0;
        }

        .section-1-menu-txt-from {
            display: flex;
            justify-content: space-between;
            padding-top: 10px;
        }

        .section-1-anker a {
            padding: 10px 30px;
            font-size: 17px;
            font-weight: 600;
            color: var(--white-color);
            border-radius: 50px;
            border: 2px solid var(--purpule-color-1);
            text-decoration: none;
            transition: 0.3s ease-in-out;
        }

        .section-1-anker .purpul1 {
            background-color: var(--purpule-color-1);
        }

        .section-1-anker .purpul1:hover {
            background-color: var(--purpule-color-2);
            border: 2px solid var(--purpule-color-2);
        }

        .section-1-anker .purpul2 {
            color: var(--purpule-color-1);
        }

        .section-1-anker .purpul2:hover {
            background-color: var(--purpule-color-1) !important;
            color: var(--white-color);
        }

        /* section-1 */


        .about-sec-one {
            background-image: url(<?php echo asset('images/find_day_care.png'); ?>);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 450px;
            display: flex;
            align-items: center;
        }

        .section-1-menu-img {
            width: 35% !important;
        }

        .section-1-menu-img img {
            height: 350px;
            width: 560px;
            border-radius: 20px;
        }
        .section-1 table thead tr {
    background: black;
    color: white;
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
                        <h2> Angel List </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-1">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center" style="padding-left: 150px;padding-right: 150px;">



                <table id="" class="table table-hover table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($angel as $key => $val)
                            @php
                                $data = DB::table('users')
                                    ->where('id', $val->teacher_id)
                                    ->first();
                            @endphp

                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name .' '.$data->lname }}</td>
                                <td>{{ $data->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {{-- <div class="col-lg-12">
                        <div class="section-1-menu">
                            <div class="section-1-menu-1">
                                <div class="section-1-detail-txt1">
                                    <h6 class="heading-6"><a href="#"> {{ $val->name }} </a></h6>
                                    <p class="para-2"> {{ $val->physical_address }} </p>
                                </div>
                                <div class="section-1-detail-txt2">
                                    <div class="para-2">Claimed</div>
                                </div>
                            </div>
                            <div class="section-1-menu-text">

                                <div class="section-1-menu-img">
                                    <figure>
                                        <img src="{{ asset($val->feature_image) }}" alt="" class="img-fluid"
                                            style="border: 1px solid #000;">
                                    </figure>
                                </div>

                                <div class="section-1-menu-txt">

                                    <p class="para-2">
                                        {!! $val->description !!}
                                    </p>

                                    <!--<a href="">Read more</a>-->

                                    <div class="border-line"><span></span></div>
                                    <div class="section-1-menu-txt-from">

                                        <div class="section-1-anker">
                                            <a href="{{ URL('claimed_center_detail/' . $val->id) }}"
                                                class="btn btn-primary">See details</a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div> --}}





            </div>
        </div>
    </section>


    <!-- ============================================================== -->
@endsection


@section('js')
    <script type="text/javascript"></script>
@endsection
