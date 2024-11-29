<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdepartment extends Model
{
    use HasFactory;

    protected $fillable = ['subdepartment_name', 'department_id', 'status'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
