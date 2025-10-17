<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobApplicationModel extends Model
{
    use HasFactory, SoftDeletes;

    const PENDING = 'pending';
    const ACCEPTED = 'accepted';
    const INTERVIEW = 'interview';
    const REJECTED = 'rejected';

    protected $table = 'job_applications';

    protected $fillable = [
        'user_id',
        'job_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'home_phone',
        'domicile_address',
        'current_address',
        'birth_place',
        'birth_date',
        'religion',
        'gender',
        'marital_status',
        'blood_type',
        'national_id',
        'photo_path',
        'housing_type',
        'vehicle_type',
        'vehicle_owner',
        'vehicle_year',
        'cover_letter',
        'cv_path',
        'other_path',
        'family_members',
        'spouse_children',
        'education',
        'seminars',
        'organizations',
        'work_experience',
        'other_info',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // Job applied for
    public function job()
    {
        return $this->belongsTo(JobListModel::class, 'job_id');
    }

    // Applicant (user)
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
