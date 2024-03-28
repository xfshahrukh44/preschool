<div class="form-body">
    <div class="row">
		<div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('name', 'Name') !!}
    	    	{!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('lname', 'Lname') !!}
    	    	{!! Form::text('lname', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div>

<input type="hidden" name="role" value="3">

<?php $segment = Request::segment(4);?>

@if($segment == "")
<div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('email', 'Email') !!}
    	    	{!! Form::text('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('password', 'Password') !!}
    	    	{!! Form::text('password', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div>
@endif


<!-- <div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('gender', 'Gender') !!}
    	    	{!! Form::text('gender', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div> -->


<div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('age', 'Age') !!}
    	    	{!! Form::text('age', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('phone', 'Phone') !!}
    	    	{!! Form::text('phone', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('address', 'Address') !!}
    	    	{!! Form::text('address', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('current_position', 'Current Position') !!}
    	    	{!! Form::text('current_position', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('year_of_experience', 'Year Of Experience') !!}
    	    	{!! Form::text('year_of_experience', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('age_worked_with', 'Age Worked With') !!}
    	    	{!! Form::text('age_worked_with', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('about', 'About') !!}
    	{!! Form::textarea('about', null, ('required' == 'required') ? ['class' => 'form-control', 'id' => 'summary-ckeditor', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div>



<!-- <div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('hour_open', 'Hour Open') !!}
    	    	{!! Form::text('hour_open', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('age_accepted', 'Age Accepted') !!}
    	    	{!! Form::text('age_accepted', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div>


<div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('position_accepted', 'Position Accepted') !!}
    	    	{!! Form::text('position_accepted', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('about_preschool', 'About Preschool') !!}
    	    	{!! Form::text('about_preschool', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('status', 'Status') !!}
    	    	{!! Form::text('status', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div> -->


	</div>
</div>
<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
