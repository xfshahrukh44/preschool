<div class="form-body">
    <div class="row">
		<div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('user_id', 'User Id') !!}
    	{!! Form::text('user_id', Auth::user()->id , ('' == 'required') ? ['class' => 'form-control','required' => 'required'] : ['class' => 'form-control' , 'readonly']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('post', 'Post') !!}
    	    	{!! Form::text('post', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('image', 'Post Image') !!}
      	<input class="form-control dropify" name="image" type="file" id="image" {{ ($post->image != '') ? "data-default-file = /$post->image" : ''}} {{ ($page->image == '') ? "required" : ''}} value="{{$post->image}}">
    </div>
</div>
	</div>
</div>
<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
