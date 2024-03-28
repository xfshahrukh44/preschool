@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Users3 {{ $users3->id }}</h3>
                    
                        <a class="btn btn-success pull-right" href="{{ url('/users3/users3') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $users3->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $users3->name }} </td></tr><tr><th> Lname </th><td> {{ $users3->lname }} </td></tr><tr><th> Role </th><td> {{ $users3->role }} </td></tr>
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

