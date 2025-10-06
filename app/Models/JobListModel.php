<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobListModel extends Model
{
    use HasFactory, SoftDeletes;

    const ACTIVE = 'Active';
    const CLOSED = 'Closed';

    protected $table = 'jobs_list';

    protected $fillable = [
        'title',
        'company_name',
        'location',
        'job_type',
        'salary',
        'description',
        'requirements',
        'benefits',
        'application_deadline',
        'status',
        'posted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function applications()
    {
        return $this->hasMany(JobApplicationModel::class, 'job_id', 'id');
    }

    protected $dates = ['application_deadline'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucwords(strtolower($value));
    }

    public function setLocationAttribute($value)
    {
        $this->attributes['location'] = ucwords(strtolower($value));
    }

    public function setJobTypeAttribute($value)
    {
        $this->attributes['job_type'] = ucwords(strtolower($value));
    }
}
