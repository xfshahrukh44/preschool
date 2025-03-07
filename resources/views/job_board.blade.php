@extends('layouts.main')

@section('css')
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


        .main-job {
            box-shadow: 0px 0px 32px 2px #00000038;
            padding: 15px 17px;
            border-radius: 15px;
            text-align: center;
            margin-top: 40px;
            height: 18rem !important;
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
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="job-board">
        <div class="container-fluid">
            <div class="row">


                @foreach ($get_all_new_job as $key => $val_newjob)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="main-job">
                            <div class="full-time">
                                <p> {{ $val_newjob->job_type }} </p>
                            </div>
                            <div class="center-info">
                                <h6> {{ $val_newjob->job_title }} </h6>
                                <p><a href="#"><i class="fa-solid fa-location-dot"></i> {{ $val_newjob->location }}
                                    </a></p>
                            </div>
                            <div class="apply">
                                {{-- <a href="javascript:void(0)" class="custom-btn views become-angel-button"
                                    data-jobid="{{ $val_newjob->id }}"
                                    data-creatorid="{{ $val_newjob->creator_name }}">Angel</a> --}}
                                <a href="{{ route('apply_for_job', ['id' => $val_newjob->id]) }}"
                                    class="custom-btn now">View
                                    Job Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>


            <!-- <div class="row">
                            <div class="col-lg-12">
                                <div class="last-btn">
                                    <a href="#">View More Jobs</a>
                                </div>
                            </div>
                        </div> -->


        </div>
    </section>


    <!-- ============================================================== -->

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
                                The Sandbox is meant to be a place to interact with other professionals while at work; learn
                                from others, build relationships, and otherwise just ‘hang out’. This is the spirit in which
                                these guidelines have been established. The discussions and the way all members and
                                Preschool Portal employees are treated are always to be professional. The general rule of
                                thumb to follow is that if the talk is inappropriate for a traditional workplace, then it is
                                not appropriate here. Forums like the Sandbox are at their best when participants treat each
                                other with respect and courtesy. Please be mindful of this when participating here in the
                                Sandbox.
                            </p>
                            <p>
                                Preschool Portal will occasionally move discussions if they belong in a different category.
                                We will also close/remove duplicate discussions and/or replies if they are causing
                                confusion, are mean-spirited, or are otherwise inappropriate (see our Do’s/Don’ts below).
                                Our intention is not to censor, but to foster an environment that is easy to use and
                                productive for all those involved.
                            </p>
                        </div>
                        <div class="col-12 text-center">
                            <a target="_blank" href="{{ route('rules-of-conduct-individual') }}">Rules of conduct</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <a href="{{ route('agree_to_sandbox_terms') }}" type="button" class="btn btn-primary">I agree to the
                        terms</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="teacherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Angel Addition</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="teacherDetailsForm">
                        <!-- Add teacher details here -->
                        <div class="form-group">
                            <label for="teacherName">Name</label>
                            <input type="text" class="form-control" id="teacherName"
                                value="{{ Auth::user()->name . ' ' . Auth::user()->lname }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="teacherEmail">Email</label>
                            <input type="email" class="form-control" id="teacherEmail" value="{{ Auth::user()->email }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="teacherPosition">Current Position</label>
                            <input type="text" class="form-control" id="teacherPosition"
                                value="{{ Auth::user()->current_position }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="teacherexperience">Years of experience</label>
                            <input type="text" class="form-control" id="teacherexperience"
                                value="{{ Auth::user()->year_of_experience }}" readonly>
                        </div>
                        <p>Are you sure you want to become an angel for this job?</p>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="confirmButton">Confirm</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(() => {

            if (parseInt('{{ \Illuminate\Support\Facades\Auth::user()->agreed_to_sandbox_terms }}') == 0) {
                $('#modal_agree_to_sandbox_terms').modal({
                    keyboard: false
                });
                $('#modal_agree_to_sandbox_terms').modal('show');
            }
        });
        $(document).ready(function() {
            $('.become-angel-button').click(function() {
                var jobId = $(this).data('jobid');
                var creatorId = $(this).data('creatorid');

                $.ajax({
                    url: "{{ url('check-angel') }}/" + jobId + "/" + creatorId,
                    type: 'GET',
                    success: function(response) {
                        if (response.exists) {
                            Swal.fire({
                                title: 'Notice',
                                text: 'You are already an angel for this job.',
                                icon: 'info',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            // Open modal with teacher's auth details
                            $('#teacherModal').modal('show');
                            $('#confirmButton').data('jobid', jobId);
                            $('#confirmButton').data('creatorid', creatorId);
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred: ' + xhr.responseText,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });

            $('#confirmButton').click(function() {
                var jobId = $(this).data('jobid');
                var creatorId = $(this).data('creatorid');

                $.ajax({
                    url: "{{ url('become-an-angel') }}/" + jobId + "/" + creatorId,
                    type: 'GET',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Success!',
                                text: response.success,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                            $('#teacherModal').modal('hide');
                        } else if (response.error) {
                            Swal.fire({
                                title: 'Error!',
                                text: response.error,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred: ' + xhr.responseText,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        });
    </script>
@endsection
