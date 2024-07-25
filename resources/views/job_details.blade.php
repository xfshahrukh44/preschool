<!-- resources/views/partials/job_details.blade.php -->
<table class="table table-bordered">
    <tr>
        <th>Job Title</th>
        <td>{{ $job->job_title }}</td>
    </tr>
    <tr>
        <th>Company Name</th>
        <td>{{ $job->company_name }}</td>
    </tr>
    <tr>
        <th>Company Description</th>
        <td>{{ $job->company_description }}</td>
    </tr>
    <tr>
        <th>Location</th>
        <td>{{ $job->location }}</td>
    </tr>
    <tr>
        <th>Job Type</th>
        <td>{{ $job->job_type }}</td>
    </tr>
    <tr>
        <th>Salary Range</th>
        <td>{{ $job->salary_range }}</td>
    </tr>
    <tr>
        <th>Required Education</th>
        <td>{{ $job->required_education }}</td>
    </tr>
    <tr>
        <th>Skills</th>
        <td>{{ $job->skills }}</td>
    </tr>
    <tr>
        <th>Instruction</th>
        <td>{{ $job->instruction }}</td>
    </tr>
    <tr>
        <th>Post Date</th>
        <td>{{ $job->post_date }}</td>
    </tr>
    <tr>
        <th>Due Date</th>
        <td>{{ $job->due_date }}</td>
    </tr>
</table>
