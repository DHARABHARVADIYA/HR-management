<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'priority',
        'budget',
        'deadline',
        'department_id',
        'status',
        'created_by',
    ];

    // Relationship with Department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // Relationship with Admin/User
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
