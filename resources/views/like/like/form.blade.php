<div class="form-body">
    <div class="row">
		<div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('user_id', 'User Id') !!}
    	    	{!! Form::text('user_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('post_id', 'Post Id') !!}
    	    	{!! Form::text('post_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div>
	</div>
</div>
<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
