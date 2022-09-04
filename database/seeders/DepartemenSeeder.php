<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 10001	Ak. Digital	P81035	Mugi	10005	2022-07-18 08:05:58	2022-07-18 08:05:58	2
        \App\Models\Departemen::create([
            'kode' => '10001',
            'nama' => 'Ak Digital',
            'nik_kadept' => 'P81035',
            'nama_kadept'=>'Ronaldo',
            'divisi_kode'=>'10005',
            'create_by'=>'2',
            'folder'=>'',
        ]);
    }
}
