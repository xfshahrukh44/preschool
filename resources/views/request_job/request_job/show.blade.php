@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Request_job {{ $request_job->id }}</h3>
                    
                        <a class="btn btn-success pull-right" href="{{ url('/request_job/request_job') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $request_job->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $request_job->name }} </td></tr><tr><th> Email </th><td> {{ $request_job->email }} </td></tr><tr><th> Contact </th><td> {{ $request_job->contact }} </td></tr>
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

