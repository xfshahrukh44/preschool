@extends('layouts.app')

@push('before-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Childcares</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Home</li>
                    <li class="breadcrumb-item active">Childcares</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-4 col-12">
        <div class="btn-group float-md-right">
            <a class="btn btn-info mb-1" href="{{route('admin.childcare.create')}}">Add Childcares</a>
        </div>
    </div>
</div>

<section id="configuration">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Childcares Info</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <form action="{{route('admin.childcare.index')}}" method="GET">
                            @csrf
                            <div class="row">
                                <div class="col-md-11">
                                    <input type="text" class="form-control" name="search" value="{{request()->get('search') ?? ''}}" placeholder="Search childcare">
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-primary btn-block">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>{{ucfirst('name')}}</th>
                                        <th>{{ucfirst('county')}}</th>
                                        <th>{{ucfirst('city')}}</th>
                                        <th>{{ucfirst('state')}}</th>
                                        <th>{{ucfirst('zip')}}</th>
                                        <th>{{ucfirst('phone')}}</th>
                                        <th>{{ucfirst('email address')}}</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($childcares as $key => $childcare)
                                        <tr>
                                            <td>{{ $childcare->name ?? '' }}</td>
                                            <td>{{ $childcare->county ?? '' }}</td>
                                            <td>{{ $childcare->city ?? '' }}</td>
                                            <td>{{ $childcare->state ?? '' }}</td>
                                            <td>{{ $childcare->zip ?? '' }}</td>
                                            <td>{{ $childcare->phone ?? '' }}</td>
                                            <td>{{ $childcare->emai_address ?? '' }}</td>
                                            <td>
                                                <a href="{{route('admin.childcare.edit', $childcare->id)}}">
                                                    <span class="btn btn-primary">
                                                        <i class="fas fa-pencil"></i>
                                                    </span>
                                                </a>
                                                <a href="{{route('admin.childcare.destroy', $childcare->id)}}">
                                                    <span class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row m-0 float-right">
                                {{ $childcares->appends(request()->input())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection



@push('js')
    <script src="{{asset('assets/js/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            // $(".zero-configuration").DataTable({
            //     "order": [
            //         [0, 'desc']
            //     ],
            // });
        });
    </script>
    <script>
        $(document).ready(function () {
            @if(\Session::has('message'))
            $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: '{{session()->get('message')}}',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });
            @endif
        })
    </script>
@endpush
