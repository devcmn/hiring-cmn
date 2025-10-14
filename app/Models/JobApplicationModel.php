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
        'applied_position',
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

    // Family members (parents & siblings)
    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class, 'job_application_id');
    }

    // Spouse & children
    public function spouseChildren()
    {
        return $this->hasMany(SpouseChild::class, 'job_application_id');
    }

    // Education, seminar, organizational activities
    public function educationAndActivities()
    {
        return $this->hasMany(EducationAndActivity::class, 'job_application_id');
    }

    // Job experiences
    public function jobExperiences()
    {
        return $this->hasMany(JobExperience::class, 'job_application_id');
    }
}
