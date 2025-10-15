<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationAndActivity extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'education_and_activities';
    protected $fillable = [
        'job_application_id',
        'type',
        'name',
        'major_or_topic',
        'position',
        'start_year',
        'end_year',
        'note',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
