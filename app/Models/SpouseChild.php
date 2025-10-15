<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpouseChild extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'spouse_children';
    protected $fillable = [
        'job_application_id',
        'relation',
        'name',
        'birth_date',
        'occupation',
        'education',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
