<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'super admin',
            'user_id'=>'sa',
            'email' => 'sa@gmail.com',
            'password' => bcrypt('12345678'),
            'divisi_kode' => '10005',
            'departemen_kode' => '10001',

        ]);
        \App\Models\User::create([
            'name' => 'User Biasa',
            'user_id'=>'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678'),
            'divisi_kode' => '10005',
            'departemen_kode' => '10001',

        ]);
        \App\Models\User::create([
            'name' => 'Digital User',
            'user_id'=>'digital',
            'email' => 'digital@gmail.com',
            'password' => bcrypt('12345678'),
            'divisi_kode' => '10005',
            'departemen_kode' => '10001',

        ]);
       
    }
}
