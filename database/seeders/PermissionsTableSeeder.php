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

        Permission::create(['name' => 'View Subdepartment', 'module' => 'subdepartment']);
        Permission::create(['name' => 'Create Subdepartment', 'module' => 'subdepartment']);
        Permission::create(['name' => 'Update Subdepartment', 'module' => 'subdepartment']);
        Permission::create(['name' => 'Delete Subdepartment', 'module' => 'subdepartment']);
    }
}
