@extends('layouts.main')

@section('css')
    <style>
        .about-sec-one {
            background-image: url('{{ asset('uploads/pages/iStock_000076101011_Large_1715294141.jpg') }}');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 450px;
            display: flex;
            align-items: center;
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

        .project_table {
            padding: 50px 0;
        }

        .porject_btn {
            margin-bottom: 50px;
        }

        .show_inner {
            padding: 100px;
        }

        .show_inner .project_form {
            width: 100%;
            border: none;
        }

        .single_img img {
            width: 150px !important;
            height: 150px !important;
            margin-bottom: 50px;
        }

        .show_img img {
            width: 150px;
            height: 120px;
        }

        .heading_porjects h3 {
            color: black;
            font-size: 40px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .heading_porjects p {
            color: black;
            font-size: 20px;
            font-weight: 500;
        }
    </style>
@endsection

@section('content')
    <section class="about-sec-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="about-us" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                        <h2>Projects Detail</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="projects_sect show_inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="porject_btn">
                        <a href="{{ route('projects.index') }}" class="btn btn-success">Projects</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="project_form">
                        <div class="show_img single_img">
                            <img src="{{ asset($Project->images()->first()->path) }}" class="img-fluid" alt="">
                        </div>
                        <div class="show_img">
                            @foreach ($Project->images as $key => $item)
                                @if ($key != 0)
                                    <img src="{{ asset($item->path) }}" class="img-fluid" alt="">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="heading_porjects">
                        <h3>{{ $Project->title }}</h3>
                        <p>{{ $Project->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
