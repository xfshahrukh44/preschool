@extends('layouts.main')

@section('css')
    <style>
        .about-sec-one {
            background-image: url('uploads/pages/iStock_000076101011_Large_1715294141.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 450px;
            display: flex;
            align-items: center;
        }

        .main-job {
            box-shadow: 0px 0px 32px 2px #00000038;
            padding: 15px 17px;
            border-radius: 15px;
            text-align: center;
            margin-top: 40px;
            height: 18rem !important;
        }

        .bulletin_board {
            padding: 0 120px;
            padding-top: 100px;
            background: url('uploads/pages/backwood.png');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        .main_card_rota {
            position: relative;
            z-index: 0;
            margin-bottom: 100px;
        }

        .purple_rota .info_rota {
            background: #ff5dcd;
        }

        .info_rota {
            transform: rotate(-12deg);
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 340px;
            box-shadow: 0px 6px 10px 1px #000000ad;
            position: relative;
            z-index: 0;
        }

        .fill_rota {
            transform: rotate(10deg);
        }

        .fill_rota h4 {
            font-size: 60px;
            font-weight: 800;
            color: black;
        }

        .pin_rota {
            width: 35px;
            height: 35px;
            border-radius: 60%;
            position: absolute;
            z-index: 0;
            left: 20px;
            top: 0px;
            box-shadow: 10px 15px 10px 1px #0000002e;
        }

        .purple_rota .pin_rota {
            background: #ff004f78;
        }

        .pin_rota:after {
            position: absolute;
            z-index: 0;
            content: "";
            background-color: white;
            left: 12px;
            top: 8px;
            width: 6px;
            height: 6px;
            border-radius: 60%;
            box-shadow: 0 0 3px 3px wheat;
        }

        .pin_rota:before {
            position: absolute;
            z-index: -3;
            content: "";
            left: 10px;
            top: 16px;
            width: 6px;
            height: 34px;
            transform: rotate(10deg);
            border-bottom-right-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        .purple_rota .pin_rota:before {
            background: #ff004f4a;
        }

        .yellow_rota .info_rota {
            background: #fffc9d;
        }

        .yellow_rota .pin_rota {
            background: #00f9639c;
        }

        .yellow_rota .pin_rota:before {
            background: #00f9635e;
        }

        .blue_rota .info_rota {
            background: #c2f3f3;
        }

        .blue_rota .pin_rota {
            background: #00aacbad;
        }

        .blue_rota .pin_rota:before {
            background: #00aacb99;
        }

        .light_blue_rota .info_rota {
            background: #e0f2ce;
        }

        .light_blue_rota .pin_rota {
            background: #00f9639c;
        }

        .light_blue_rota .pin_rota:before {
            background: #00f9635e;
        }

        .dark_yellow_rota .info_rota {
            background: #ffce49;
        }

        .dark_yellow_rota .pin_rota {
            background: #ff9100bd;
        }

        .dark_yellow_rota .pin_rota:before {
            background: #ff91008c;
        }

        .pink_rota .info_rota {
            background: #ffc2c6;
        }

        .pink_rota .pin_rota {
            background: #ff5346b5;
        }

        .pink_rota .pin_rota:before {
            background: #ff5346a3;
        }

        .projects_sect {
            padding: 100px 0;
            background: #F5F7FC;
        }

        .project_form .form-control {
            height: 50px;
            margin-bottom: 20px;
            border-radius: 10px;
            background: white;
            border: 1px solid black;
        }

        .project_form {
            padding: 30px;
            border: 2px solid black;
            border-radius: 15px;
            margin: auto;
            width: 80%;
        }

        .project_form label {
            font-size: 20px;
            color: black;
            font-weight: 600;
        }

        .project_form textarea {
            height: unset !important;
        }
    </style>
@endsection

@section('content')
    <section class="about-sec-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="about-us" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                        <h2>Projects Edit</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="projects_sect">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="project_form">
                        <form action="{{ route('projects.update', $Project->id) }}" method="Post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <label for="name">Title</label>
                                    <input type="text" name="title" value="{{ $Project->title }}" class="form-control"
                                        required>
                                </div>
                                <div class="col-12">
                                    <label for="photos">Pictures</label>
                                    @foreach ($Project->images as $item)
                                        <img src="{{ asset($item->path) }}" alt="">
                                    @endforeach
                                </div>
                                <div class="col-12">
                                    <label for="description">Description</label>
                                    <textarea type="text" name="description" class="form-control" rows="5" required>{{ $Project->description }}</textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="custom-btn">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
