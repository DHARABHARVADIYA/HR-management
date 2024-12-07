<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'month', 'calculated_salary'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function attendances()
{
    return $this->hasMany(Attendance::class);
}
}
