<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    protected $table = 'awards';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'award_name',
        'award_description',
        'gift_item',
        'award_date',
        'employee_id'
    ];

    // Define the relationship with the Employee model
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
