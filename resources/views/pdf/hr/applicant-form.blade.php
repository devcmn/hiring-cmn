<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application - {{ $application->first_name }} {{ $application->last_name }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', 'Arial', sans-serif;
            font-size: 10px;
            line-height: 1.4;
            color: #333;
            background: #f5f5f5;
            padding: 15px;
        }

        .pdf-container {
            background: white;
            padding: 25px;
            max-width: 900px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Header */
        .header {
            border-bottom: 3px solid #1a5c3a;
            padding-bottom: 8px;
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 16px;
            color: #1a5c3a;
            font-weight: bold;
        }

        .header-info {
            text-align: right;
            font-size: 8px;
            line-height: 1.4;
        }

        /* Section Headers */
        .section-header {
            background-color: #1a5c3a;
            color: white;
            padding: 5px 10px;
            margin: 12px 0 6px 0;
            font-weight: bold;
            font-size: 10px;
            border-radius: 2px;
        }

        /* Compact Info Blocks */
        .info-block {
            background: #f9f9f9;
            padding: 10px;
            margin-bottom: 6px;
            border-left: 3px solid #1a5c3a;
        }

        .info-row {
            margin-bottom: 6px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: baseline;
        }

        .info-row:last-child {
            margin-bottom: 0;
        }

        .field {
            display: inline-flex;
            align-items: baseline;
            flex: 0 1 auto;
        }

        .field.full-width {
            flex: 1 1 100%;
        }

        .label {
            font-weight: bold;
            color: #1a5c3a;
            font-size: 8px;
            text-transform: uppercase;
            white-space: nowrap;
            margin-right: 6px;
        }

        .value {
            color: #333;
            font-size: 9px;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th {
            background-color: #1a5c3a;
            color: white;
            padding: 5px;
            text-align: left;
            font-weight: bold;
            font-size: 8px;
        }

        td {
            border: 1px solid #ddd;
            padding: 5px;
            font-size: 9px;
            vertical-align: top;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Cover Letter */
        .cover-letter {
            background: #f9f9f9;
            padding: 10px;
            border-left: 4px solid #1a5c3a;
            font-style: italic;
            margin-bottom: 10px;
            line-height: 1.5;
            font-size: 9px;
        }

        /* Footer */
        .footer {
            border-top: 1px solid #ddd;
            margin-top: 15px;
            padding-top: 8px;
            text-align: center;
            font-size: 7px;
            color: #999;
        }
    </style>
</head>

<body>
    <div class="pdf-container">
        <!-- Header -->
        <div class="header">
            <div class="candidate-header">
                <div class="header-title">
                    <h1 style="text-align: center;">JOB APPLICATION FORM</h1>
                    @php
                        $photoPath = storage_path('app/' . $application->photo_path ?? '');
                        $photoBase64 = null;

                        if ($application->photo_path && file_exists($photoPath)) {
                            $extension = pathinfo($photoPath, PATHINFO_EXTENSION);
                            $photoBase64 =
                                'data:image/' . $extension . ';base64,' . base64_encode(file_get_contents($photoPath));
                        }
                    @endphp

                    @if ($photoBase64)
                        <img src="{{ $photoBase64 }}"
                            alt="{{ $application->first_name }} {{ $application->last_name }} Photo"
                            class="candidate-photo"
                            style="width: 120px; height: 120px; object-fit: cover; border-radius: 8px;">
                    @else
                        <div class="photo-placeholder">No Photo</div>
                    @endif
                    <h2 class="candidate-name">{{ StringHelpers::capitalCase($application->first_name) }}
                        {{ StringHelpers::capitalCase($application->last_name) }}</h2>
                </div>
            </div>
            <div class="header-info">
                <strong>Application ID:</strong> {{ $application->id }}<br>
                <strong>Date:</strong> {{ \Carbon\Carbon::parse($application->created_at)->format('d M Y') }}
            </div>
        </div>

        <!-- Section 1: Personal Information -->
        <div class="section-header">1. PERSONAL INFORMATION</div>

        <div class="info-block">
            <div class="info-row">
                <span class="field">
                    <span class="label">Full Name:</span>
                    <span class="value">{{ StringHelpers::capitalCase($application->first_name) }}
                        {{ StringHelpers::capitalCase($application->last_name) }}</span>
                </span>
                <span class="field">
                    <span class="label">Gender:</span>
                    <span class="value">{{ StringHelpers::capitalCase($application->gender) }}</span>
                </span>
                <span class="field">
                    <span class="label">Blood Type:</span>
                    <span class="value">{{ $application->blood_type ?? '-' }}</span>
                </span>
                <span class="field">
                    <span class="label">Marital Status:</span>
                    <span class="value">{{ StringHelpers::capitalCase($application->marital_status) }}</span>
                </span>
            </div>
            <div class="info-row">
                <span class="field">
                    <span class="label">Date of Birth:</span>
                    <span class="value">{{ \Carbon\Carbon::parse($application->birth_date)->format('d M Y') }}</span>
                </span>
                <span class="field">
                    <span class="label">Place of Birth:</span>
                    <span class="value">{{ StringHelpers::capitalCase($application->birth_place) }}</span>
                </span>
                <span class="field">
                    <span class="label">Religion:</span>
                    <span class="value">{{ StringHelpers::capitalCase($application->religion) }}</span>
                </span>
            </div>
            <div class="info-row">
                <span class="field">
                    <span class="label">Email:</span>
                    <span class="value">{{ $application->email }}</span>
                </span>
                <span class="field">
                    <span class="label">Phone:</span>
                    <span class="value">{{ $application->phone }}</span>
                </span>
                <span class="field">
                    <span class="label">Home Phone:</span>
                    <span class="value">{{ $application->home_phone ?? '-' }}</span>
                </span>
            </div>
            <div class="info-row">
                <span class="field">
                    <span class="label">National ID (KTP):</span>
                    <span class="value">{{ $application->national_id }}</span>
                </span>
            </div>
        </div>

        <!-- Section 2: Address Information -->
        <div class="section-header">2. ADDRESS INFORMATION</div>

        <div class="info-block">
            <div class="info-row">
                <span class="field full-width">
                    <span class="label">Domicile Address (KTP):</span>
                    <span class="value">{{ $application->domicile_address }}</span>
                </span>
            </div>
            <div class="info-row">
                <span class="field full-width">
                    <span class="label">Current Address:</span>
                    <span class="value">{{ $application->current_address }}</span>
                </span>
            </div>
            <div class="info-row">
                <span class="field">
                    <span class="label">Housing Type:</span>
                    <span class="value">{{ ucfirst($application->housing_type) }}</span>
                </span>
                <span class="field">
                    <span class="label">Vehicle Type:</span>
                    <span
                        class="value">{{ ucfirst($application->vehicle_type) }}{{ $application->vehicle_owner ? ' (' . ucfirst($application->vehicle_owner) . ', ' . ($application->vehicle_year ?? '-') . ')' : '' }}</span>
                </span>
            </div>
        </div>

        <!-- Section 3: Family Members -->
        @if ($application->family_members && count(json_decode($application->family_members, true)) > 0)
            <div class="section-header">3. FAMILY MEMBERS</div>
            <table>
                <thead>
                    <tr>
                        <th width="15%">Relation</th>
                        <th width="25%">Name</th>
                        <th width="10%">Age</th>
                        <th width="30%">Occupation</th>
                        <th width="20%">Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (json_decode($application->family_members, true) as $member)
                        <tr>
                            <td>{{ ucfirst($member['relation'] ?? '-') }}</td>
                            <td>{{ $member['name'] ?? '-' }}</td>
                            <td>{{ $member['age'] ?? '-' }}</td>
                            <td>{{ $member['occupation'] ?? '-' }}</td>
                            <td>{{ $member['phone'] ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Spouse/Children -->
        @if ($application->spouse_children && count(json_decode($application->spouse_children, true)) > 0)
            <div class="section-header">4. SPOUSE/CHILDREN</div>
            <table>
                <thead>
                    <tr>
                        <th width="15%">Relation</th>
                        <th width="25%">Name</th>
                        <th width="10%">Age</th>
                        <th width="30%">Occupation</th>
                        <th width="20%">Education</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (json_decode($application->spouse_children, true) as $sp_child)
                        <tr>
                            <td>{{ ucfirst($sp_child['relation'] ?? '-') }}</td>
                            <td>{{ $sp_child['name'] ?? '-' }}</td>
                            <td>{{ $sp_child['age'] ?? '-' }}</td>
                            <td>{{ $sp_child['occupation'] ?? '-' }}</td>
                            <td>{{ $sp_child['education'] ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Section 4: Education -->
        @if ($application->education && count(json_decode($application->education, true)) > 0)
            <div class="section-header">5. EDUCATION</div>
            <table>
                <thead>
                    <tr>
                        <th width="35%">Institution</th>
                        <th width="30%">Field of Study</th>
                        <th width="20%">Year</th>
                        <th width="15%">GPA/Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (json_decode($application->education, true) as $edu)
                        <tr>
                            <td>{{ $edu['name'] ?? '-' }}</td>
                            <td>{{ $edu['major_or_topic'] ?? '-' }}</td>
                            <td>{{ $edu['start_year'] ?? '-' }} - {{ $edu['end_year'] ?? 'Present' }}</td>
                            <td>{{ $edu['grade'] ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Organizations -->
        @if ($application->organizations && count(json_decode($application->organizations, true)) > 0)
            <div class="section-header">6. ORGANIZATIONS</div>
            <table>
                <thead>
                    <tr>
                        <th width="45%">Organization Name</th>
                        <th width="30%">Position</th>
                        <th width="25%">Year</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (json_decode($application->organizations, true) as $org)
                        <tr>
                            <td>{{ $org['name'] ?? '-' }}</td>
                            <td>{{ $org['position'] ?? '-' }}</td>
                            <td>{{ $org['start_year'] ?? '-' }} - {{ $org['end_year'] ?? 'Present' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Seminars -->
        @if ($application->seminars && count(json_decode($application->seminars, true)) > 0)
            <div class="section-header">7. SEMINARS/TRAINING</div>
            <table>
                <thead>
                    <tr>
                        <th width="40%">Seminar Name</th>
                        <th width="45%">Topic</th>
                        <th width="15%">Year</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (json_decode($application->seminars, true) as $seminar)
                        <tr>
                            <td>{{ $seminar['name'] ?? '-' }}</td>
                            <td>{{ $seminar['major_or_topic'] ?? '-' }}</td>
                            <td>{{ $seminar['start_year'] ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Section 6: Work Experience -->
        @if ($application->work_experience && count(json_decode($application->work_experience, true)) > 0)
            <div class="section-header">8. WORK EXPERIENCE</div>
            <table>
                <thead>
                    <tr>
                        <th width="25%">Company</th>
                        <th width="20%">Position</th>
                        <th width="18%">Period</th>
                        <th width="15%">Last Salary</th>
                        <th width="22%">Resign Reason</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (json_decode($application->work_experience, true) as $work)
                        <tr>
                            <td>{{ $work['company_name'] ?? '-' }}</td>
                            <td>{{ $work['position'] ?? '-' }}</td>
                            <td>{{ $work['start_date'] ?? '-' }} to {{ $work['end_date'] ?? 'Present' }}</td>
                            <td>{{ $work['last_salary'] ? 'Rp ' . number_format($work['last_salary'], 0, ',', '.') : '-' }}
                            </td>
                            <td>{{ $work['resign_reason'] ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Section 6: Cover Letter -->
        @if ($application->cover_letter)
            <div class="section-header">9. COVER LETTER</div>
            <div class="cover-letter">
                {{ $application->cover_letter }}
            </div>
        @endif

        <!-- Footer -->
        <div class="footer">
            <p>This document was generated on {{ \Carbon\Carbon::now()->format('d M Y H:i') }}</p>
            <p>Job ID: {{ $job->id }} | Position: {{ $job->title }}</p>
        </div>
    </div>
</body>

</html>
