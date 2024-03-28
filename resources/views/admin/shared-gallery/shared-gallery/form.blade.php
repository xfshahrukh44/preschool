<div class="form-body">
    <div class="row">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text(
                    'name',
                    null,
                    'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('tagline', 'Tagline') !!}
                {!! Form::text(
                    'tagline',
                    null,
                    'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                <input class="form-control dropify" name="image" type="file" id="image" {{ ($product->image != '') ? "data-default-file = /$sharedgallery->image" : ''}} {{ ($sharedgallery->image == '') ? "required" : ''}} value="{{$sharedgallery->image}}">
            </div>
        </div>
    </div>
</div>
<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
