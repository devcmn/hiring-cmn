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
            font-size: 9px;
            line-height: 1.4;
            color: #333;
            background: #fff;
            padding: 20px;
        }

        .pdf-container {
            max-width: 800px;
            margin: 0 auto;
        }

        /* Header */
        .header {
            text-align: center;
            border-bottom: 2px solid #1a5c3a;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 18px;
            font-weight: bold;
            color: #1a5c3a;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .header-info {
            font-size: 8px;
            color: #555;
        }

        .header-info span {
            margin: 0 15px;
        }

        /* Section Headers */
        .section-header {
            background-color: #1a5c3a;
            color: white;
            padding: 6px 12px;
            margin: 15px 0 10px 0;
            font-weight: bold;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Personal Information Layout */
        .personal-section {
            display: table;
            width: 100%;
            border: 1px solid #ddd;
        }

        .personal-row {
            display: table-row;
        }

        .photo-cell {
            display: table-cell;
            width: 100px;
            padding: 15px;
            border-right: 1px solid #ddd;
            vertical-align: top;
        }

        .candidate-photo {
            width: 85px;
            height: 110px;
            object-fit: cover;
            border: 1px solid #333;
            display: block;
        }

        .photo-placeholder {
            width: 85px;
            height: 110px;
            background: #f5f5f5;
            border: 1px solid #333;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 7px;
            color: #999;
            text-align: center;
        }

        .info-cell {
            display: table-cell;
            padding: 15px;
            vertical-align: top;
        }

        .candidate-name {
            font-size: 14px;
            font-weight: bold;
            color: #000;
            margin-bottom: 12px;
            text-transform: uppercase;
        }

        /* Info Grid */
        .info-grid {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }

        .info-row {
            display: table-row;
        }

        .info-item {
            display: table-cell;
            padding: 5px 10px 5px 0;
            width: 33.33%;
        }

        .info-item .label {
            font-size: 7px;
            font-weight: bold;
            color: #000;
            text-transform: uppercase;
            display: block;
            margin-bottom: 2px;
        }

        .info-item .value {
            font-size: 9px;
            color: #333;
        }

        /* Address Section */
        .address-block {
            border: 1px solid #ddd;
            padding: 12px;
            margin-bottom: 10px;
        }

        .address-item {
            margin-bottom: 8px;
        }

        .address-item:last-child {
            margin-bottom: 0;
        }

        .address-item .label {
            font-size: 7px;
            font-weight: bold;
            color: #000;
            text-transform: uppercase;
            display: block;
            margin-bottom: 2px;
        }

        .address-item .value {
            font-size: 9px;
            color: #333;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #e8f5e9;
            color: #1a5c3a;
            padding: 6px 8px;
            text-align: left;
            font-weight: bold;
            font-size: 8px;
            text-transform: uppercase;
            border: 1px solid #ddd;
        }

        td {
            border: 1px solid #ddd;
            padding: 6px 8px;
            font-size: 8px;
            vertical-align: top;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Cover Letter */
        .cover-letter {
            border: 1px solid #ddd;
            padding: 12px;
            font-size: 8px;
            line-height: 1.5;
            margin-bottom: 10px;
            text-align: justify;
        }

        /* Footer */
        .footer {
            border-top: 1px solid #000;
            margin-top: 20px;
            padding-top: 10px;
            text-align: center;
            font-size: 7px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="pdf-container">
        <!-- Header -->
        <div class="header">
            <h1>JOB APPLICATION FORM</h1>
            <div class="header-info">
                <span><strong>Position:</strong> {{ $application->job->title }}</span>
                <span><strong>Date:</strong>
                    {{ \Carbon\Carbon::parse($application->created_at)->format('d M Y') }}</span>
                <span><strong>ID:</strong> #{{ $application->id }}</span>
            </div>
        </div>

        <!-- Section 1: Personal Information -->
        <div class="section-header">1. Personal Information</div>

        <div class="personal-section">
            <div class="personal-row">
                <div class="photo-cell">
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
                            alt="{{ $application->first_name }} {{ $application->last_name }}" class="candidate-photo">
                    @else
                        <div class="photo-placeholder">No Photo</div>
                    @endif
                </div>
                <div class="info-cell">
                    <div class="candidate-name">
                        {{ StringHelpers::capitalCase($application->first_name) }}
                        {{ StringHelpers::capitalCase($application->last_name) }}
                    </div>

                    <div class="info-grid">
                        <div class="info-row">
                            <div class="info-item">
                                <span class="label">Gender</span>
                                <span class="value">{{ StringHelpers::capitalCase($application->gender) }}</span>
                            </div>
                            <div class="info-item">
                                <span class="label">Blood Type</span>
                                <span class="value">{{ $application->blood_type ?? '-' }}</span>
                            </div>
                            <div class="info-item">
                                <span class="label">Marital Status</span>
                                <span
                                    class="value">{{ StringHelpers::capitalCase($application->marital_status) }}</span>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-item">
                                <span class="label">Date of Birth</span>
                                <span
                                    class="value">{{ \Carbon\Carbon::parse($application->birth_date)->format('d M Y') }}</span>
                            </div>
                            <div class="info-item">
                                <span class="label">Place of Birth</span>
                                <span class="value">{{ StringHelpers::capitalCase($application->birth_place) }}</span>
                            </div>
                            <div class="info-item">
                                <span class="label">Religion</span>
                                <span class="value">{{ StringHelpers::capitalCase($application->religion) }}</span>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-item">
                                <span class="label">Email Address</span>
                                <span class="value">{{ $application->email }}</span>
                            </div>
                            <div class="info-item">
                                <span class="label">Mobile Phone</span>
                                <span class="value">{{ $application->phone }}</span>
                            </div>
                            <div class="info-item">
                                <span class="label">Home Phone</span>
                                <span class="value">{{ $application->home_phone ?? '-' }}</span>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-item">
                                <span class="label">National ID (KTP)</span>
                                <span class="value">{{ $application->national_id }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 2: Address Information -->
        <div class="section-header">2. Address Information</div>

        <div class="address-block">
            <div class="address-item">
                <span class="label">Domicile Address (KTP)</span>
                <span class="value">{{ $application->domicile_address }}</span>
            </div>
            <div class="address-item">
                <span class="label">Current Address</span>
                <span class="value">{{ $application->current_address }}</span>
            </div>
            <div class="info-grid" style="margin-top: 8px;">
                <div class="info-row">
                    <div class="info-item">
                        <span class="label">Housing Type</span>
                        <span class="value">{{ ucfirst($application->housing_type) }}</span>
                    </div>
                    <div class="info-item">
                        <span class="label">Vehicle Type</span>
                        <span class="value">{{ ucfirst($application->vehicle_type) }}</span>
                    </div>
                    <div class="info-item">
                        <span class="label">Vehicle Owner</span>
                        <span
                            class="value">{{ $application->vehicle_owner ? ucfirst($application->vehicle_owner) . ' (' . ($application->vehicle_year ?? '-') . ')' : '-' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 3: Family Members -->
        @if ($application->family_members && count(json_decode($application->family_members, true)) > 0)
            <div class="section-header">3. Family Members</div>
            <table>
                <thead>
                    <tr>
                        <th width="15%">Relation</th>
                        <th width="27%">Name</th>
                        <th width="8%">Age</th>
                        <th width="10%">Gender</th>
                        <th width="25%">Occupation</th>
                        <th width="15%">Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (json_decode($application->family_members, true) as $member)
                        <tr>
                            <td>{{ ucfirst($member['relation'] ?? '-') }}</td>
                            <td>{{ $member['name'] ?? '-' }}</td>
                            <td>{{ $member['age'] ?? '-' }}</td>
                            <td>{{ $member['gender'] ?? '-' }}</td>
                            <td>{{ $member['occupation'] ?? '-' }}</td>
                            <td>{{ $member['phone'] ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Spouse/Children -->
        @if ($application->spouse_children && count(json_decode($application->spouse_children, true)) > 0)
            <div class="section-header">4. Spouse & Children</div>
            <table>
                <thead>
                    <tr>
                        <th width="15%">Relation</th>
                        <th width="27%">Name</th>
                        <th width="8%">Age</th>
                        <th width="10%">Gender</th>
                        <th width="25%">Occupation</th>
                        <th width="15%">Education</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (json_decode($application->spouse_children, true) as $sp_child)
                        <tr>
                            <td>{{ ucfirst($sp_child['relation'] ?? '-') }}</td>
                            <td>{{ $sp_child['name'] ?? '-' }}</td>
                            <td>{{ $sp_child['age'] ?? '-' }}</td>
                            <td>{{ $sp_child['gender'] ?? '-' }}</td>
                            <td>{{ $sp_child['occupation'] ?? '-' }}</td>
                            <td>{{ $sp_child['education'] ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Section 5: Education -->
        @if ($application->education && count(json_decode($application->education, true)) > 0)
            <div class="section-header">5. Education Background</div>
            <table>
                <thead>
                    <tr>
                        <th width="35%">Institution</th>
                        <th width="30%">Field of Study</th>
                        <th width="20%">Period</th>
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
            <div class="section-header">6. Organizational Experience</div>
            <table>
                <thead>
                    <tr>
                        <th width="45%">Organization Name</th>
                        <th width="30%">Position</th>
                        <th width="25%">Period</th>
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
            <div class="section-header">7. Seminars & Training</div>
            <table>
                <thead>
                    <tr>
                        <th width="40%">Seminar/Training Name</th>
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

        <!-- Section 8: Work Experience -->
        @if ($application->work_experience && count(json_decode($application->work_experience, true)) > 0)
            <div class="section-header">8. Work Experience</div>
            <table>
                <thead>
                    <tr>
                        <th width="25%">Company</th>
                        <th width="20%">Position</th>
                        <th width="18%">Period</th>
                        <th width="15%">Last Salary</th>
                        <th width="22%">Reason</th>
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

        <!-- Section 9: Cover Letter -->
        @if ($application->cover_letter)
            <div class="section-header">9. Cover Letter</div>
            <div class="cover-letter">
                {{ $application->cover_letter }}
            </div>
        @endif

        <!-- Footer -->
        <div class="footer">
            <p>Generated on {{ \Carbon\Carbon::now()->format('d M Y H:i') }} | Job ID: {{ $job->id }} | Position:
                {{ $job->title }}</p>
        </div>
    </div>
</body>

</html>
