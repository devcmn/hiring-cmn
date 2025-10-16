<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Job Application</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        h1 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .section {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1>Job Application</h1>
    <div class="section">
        <strong>Name:</strong> {{ $application->first_name }} {{ $application->last_name }}<br>
        <strong>Email:</strong> {{ $application->email }}<br>
        <strong>Phone:</strong> {{ $application->phone }}
    </div>
    <p>More detailed PDF content coming soon...</p>
</body>

</html>
