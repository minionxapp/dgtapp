<?php

namespace Database\Seeders;

use App\Models\Seq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 'seqname', 'nilai', 'tahun', 'seqvalue', 'keterangan', 'create_by', 'update_by'
        // TASK	39	2022	1661919367	untuk squence task	sa	(null)	2022-08-15 05:36:07
        Seq::create(['seqname' => 'TASK','nilai' => 1,'tahun' => '2022','seqvalue'=>0,'keterangan'=>'untuk squence task']);
    }
}
