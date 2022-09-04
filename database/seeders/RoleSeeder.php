<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // \Spatie\Permission\Models\Role::factory()->create([
        //     'name' => 'admin',
        //     'guard_name' => 'web',
        // ]);
        $role = Role::create(['name' => 'admin','guard_name' => 'web']);
        $role = Role::create(['name' => 'user','guard_name' => 'web']);
        $role = Role::create(['name' => 'Super-Admin','guard_name' => 'web']);
        

        
    }
}
