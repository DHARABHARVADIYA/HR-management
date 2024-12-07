<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name', 'gstin', 'pancard_no', 'email', 'mobile_no', 
        'address', 'city', 'state', 'pincode', 'contact_person', 'status'
    ];
}
