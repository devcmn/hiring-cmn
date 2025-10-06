<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobListModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jobs_list';

    protected $fillable = [
        'title',
        'location',
        'job_type',
        'salary',
        'description',
        'requirements',
        'benefits',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
