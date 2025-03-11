@extends('layouts.app')
@push('before-css')
    <link rel="stylesheet" href="{{asset('plugins/vendors/dropify/dist/css/dropify.min.css')}}">
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
                    <li class="breadcrumb-item active">Edit Childcares #{{ $childcare->id }}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-4 col-12">
        <div class="btn-group float-md-right">
            <a class="btn btn-info mb-1" href="{{ url('/users2/users2') }}">Back</a>
        </div>
    </div>
</div>

<div class="content-body">
  <section id="basic-form-layouts">
      <div class="row match-height">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title" id="basic-layout-form">Childcares Info</h4>
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
                      <div class="card-body">
                          <form action="{{route('admin.childcare.update', $childcare->id)}}" method="POST">
                              @csrf
                              <div class="form-body">
                                  <div class="row">
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              {!! Form::label('name', 'Name') !!}
                                              <input class="form-control" type="text" name="name" required value="{{$childcare->name}}">
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              {!! Form::label('program_type', 'Program type') !!}
                                              <input class="form-control" type="text" name="program_type" value="{{$childcare->program_type}}">
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              {!! Form::label('licence_sub_type', 'Licence sub-type') !!}
                                              <input class="form-control" type="text" name="licence_sub_type" value="{{$childcare->licence_sub_type}}">
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              {!! Form::label('county', 'County') !!}
                                              <input class="form-control" type="text" name="county" value="{{$childcare->county}}">
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              {!! Form::label('city', 'City') !!}
                                              <input class="form-control" type="text" name="city" value="{{$childcare->city}}">
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              {!! Form::label('state', 'State') !!}
                                              <input class="form-control" type="text" name="state" value="{{$childcare->state}}">
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              {!! Form::label('zip', 'Zip') !!}
                                              <input class="form-control" type="text" name="zip" value="{{$childcare->zip}}">
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              {!! Form::label('physical_address', 'Physical address') !!}
                                              <input class="form-control" type="text" name="physical_address" value="{{$childcare->physical_address}}">
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              {!! Form::label('phone', 'Phone') !!}
                                              <input class="form-control" type="text" name="phone" value="{{$childcare->phone}}">
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              {!! Form::label('email_address', 'Email address') !!}
                                              <input class="form-control" type="text" name="email_address" value="{{$childcare->email_address}}">
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              {!! Form::label('description', 'Description') !!}
                                              <textarea class="form-control" name="description" id="" cols="30" rows="10" value={{$childcare->description}}>
                                                  {{$childcare->description}}
                                              </textarea>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-actions text-right pb-0">
                                  <button class="btn btn-primary" type="submit">
                                      Update
                                  </button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>
@endsection
@push('js')
  <script src="{{asset('plugins/vendors/dropify/dist/js/dropify.min.js')}}"></script>
  <script>
      $(function() {
          $('.dropify').dropify();
      });
  </script>
@endpush

