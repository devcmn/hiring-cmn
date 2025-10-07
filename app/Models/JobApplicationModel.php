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
        'cover_letter',
        'cv_path',
        'other_path',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function job()
    {
        return $this->belongsTo(JobListModel::class, 'job_id');
    }
}
