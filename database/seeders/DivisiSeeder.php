<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Divisi;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //10005	Corporate University	P11111	Kepala Divisi
        //  'kode','nama','nik_kadiv','nama_kadiv','create_by','update_by'
        Divisi::create([
            'kode' => '10005',
            'nama' => 'Corporate University',
            'nik_kadiv' => 'P81011',
            'nama_kadiv'=>'Semar Mesem'
        ]);
    }
}
