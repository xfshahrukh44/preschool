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
        }
    </style>
@endsection

@section('content')
    <section class="about-sec-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="about-us" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                        <h2>Projects</h2>
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
                        <a href="{{ route('projects.index') }}" class="btn btn-success">Project</a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="project_form">
                        <form action="{{ route('projects.store') }}" method="Post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <label for="name">Title</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                                <div class="col-12">
                                    <label for="photos">Pictures</label>
                                    <input type="file" name="photos[]" class="form-control" required multiple>
                                </div>
                                <div class="col-12">
                                    <label for="description">Description</label>
                                    <textarea type="text" name="description" class="form-control" rows="5" required></textarea>
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
