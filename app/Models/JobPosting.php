<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'department_id',
        'location',
        'employment_type',
        'salary_range',
        'skills_required',
        'experience_required',
        'posted_date',
        'application_deadline',
        'status',
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}

