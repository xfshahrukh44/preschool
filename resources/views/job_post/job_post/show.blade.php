@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Job post {{ $job_post->id }}</h3>
                    
                        <a class="btn btn-success pull-right" href="{{ url('/job_post/job_post') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $job_post->id }}</td>
                            </tr>
                            <tr><th> Job Title </th><td> {{ $job_post->job_title }} </td></tr><tr><th> Job Description </th><td> {{ $job_post->job_description }} </td></tr><tr><th> Company Name </th><td> {{ $job_post->company_name }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.admin.footer')
</div>
@endsection

