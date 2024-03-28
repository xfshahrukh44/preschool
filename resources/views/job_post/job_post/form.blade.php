<div class="form-body">
    <div class="row">
		<div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('job_title', 'Job Title') !!}
    	    	{!! Form::text('job_title', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('job_description', 'Job Description') !!}
    	{!! Form::textarea('job_description', null, ('required' == 'required') ? ['class' => 'form-control', 'id' => 'summary-ckeditor', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('company_name', 'Company Name') !!}
    	{!! Form::text('company_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('company_description', 'Company Description') !!}
    	{!! Form::textarea('company_description', null, ('required' == 'required') ? ['class' => 'form-control', 'id' => 'summary-ckeditor1', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('location', 'Location') !!}
    	{!! Form::text('location', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('job_type', 'Job Type') !!}
    	{!! Form::text('job_type', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('salary_range', 'Salary Range') !!}
    	{!! Form::text('salary_range', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('required_education', 'Required Education') !!}
    	{!! Form::textarea('required_education', null, ('required' == 'required') ? ['class' => 'form-control', 'id' => 'summary-ckeditor2', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('skills', 'Skills') !!}
    	{!! Form::text('skills', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('instruction', 'Instruction') !!}
    	{!! Form::textarea('instruction', null, ('required' == 'required') ? ['class' => 'form-control', 'id' => 'summary-ckeditor3', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('post_date', 'Post Date') !!}
    	{!! Form::date('post_date', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('due_date', 'Due Date') !!}
    	{!! Form::date('due_date', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div>

<input class="form-control" name="creator_name" type="hidden" value="{{Auth::user()->id}}" id="creator_name" readonly>


</div>
</div>
<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
