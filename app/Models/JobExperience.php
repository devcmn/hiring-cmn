<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobExperience extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'job_experiences';
    protected $fillable = [
        'job_application_id',
        'company_name',
        'position',
        'start_date',
        'end_date',
        'last_salary',
        'resign_reason',
        'job_description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
