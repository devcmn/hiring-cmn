<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyMember extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'family_members';
    protected $fillable = [
        'job_application_id',
        'relation',
        'name',
        'age',
        'phone',
        'address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
