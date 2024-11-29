<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'View Department', 'module' => 'department']);
        Permission::create(['name' => 'Create Department', 'module' => 'department']);
        Permission::create(['name' => 'Update Department', 'module' => 'department']);
        Permission::create(['name' => 'Delete Department', 'module' => 'department']);
        // Add more permissions as needed
    }
}
