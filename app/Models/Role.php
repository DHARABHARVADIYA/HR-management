<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    use HasFactory;

    // Specify the fillable fields for mass assignment
    protected $fillable = ['name'];

    // app/Models/Role.php
public function users()
{
    return $this->belongsToMany(User::class);
}

}
