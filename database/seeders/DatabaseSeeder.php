<?php

namespace Database\Seeders;

use App\Models\Departemen;
use App\Models\Divisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(UsersTableSeeder::class);
        $this->call(RoleSeeder::class);
    $this->call(RolesAndPermissionsSeeder::class);
        $this->call(DivisiSeeder::class);
        $this->call(DepartemenSeeder::class);
        $this->call(ParamSeeder::class);
        $this->call(SeqSeeder::class);
    }
}
