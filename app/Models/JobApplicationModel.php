<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobApplicationModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'job_applications';

    protected $fillable = [
        'user_id',
        'job_id',
        'cv_path',
        'other_path',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
