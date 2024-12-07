<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department_id',
        'designation',
        'joining_date',
        'monthly_salary',
        'work_hours',
        'allowed_paid_leaves',
        'status',
        'address',       
        'birthdate',    
        'company_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);  
    }
   
public function leaves()
{
    return $this->hasMany(Leave::class);
}
public function attendances()
{
    return $this->hasMany(Attendance::class);
}
public function salaries()
{
    return $this->hasMany(Salary::class);
}
}
