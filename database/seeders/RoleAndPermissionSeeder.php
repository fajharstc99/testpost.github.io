<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::where('name','admin')->first();
        $role->givePermissionTo('manage admin');
        
        $role = Role::where('name','super-admin')->first();
        $role->givePermissionTo('manage super-admin');
    }
}
