<!DOCTYPE html>
<html>
<head>
    <title>Job Application</title>
</head>
<body>
    <p>Dear Hiring Manager,</p>
    <p>A new job application has been submitted. Here are the details:</p>

    <p><strong>Name:</strong> {{ $requestJob->name }}</p>
    <p><strong>Email:</strong> {{ $requestJob->email }}</p>
    <p><strong>Resume:</strong> Attached</p>

    <p>Best Regards,</p>
    <p>Your Website</p>
</body>
</html>
