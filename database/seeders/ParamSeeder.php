<?php

namespace Database\Seeders;

use App\Models\Param;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // TIPEDATA	VAR	Varchar	(null)	1
        // TIPEDATA	NUM	Numerik	(null)	2
        // TIPEDATA	DAT	Date	(null)	4
        // JENIS	JNS-04	Content Training	(null)	4

        Param::create(['nama' => 'JENIS','kode' => 'JNS-01','desc' => 'Training','aktif'=>'Y','urut'=>1]);
        Param::create(['nama' => 'JENIS','kode' => 'JNS-02','desc' => 'E-Training','aktif'=>'Y','urut'=>2]);
        Param::create(['nama' => 'JENIS','kode' => 'JNS-03','desc' => 'Learning Walet','aktif'=>'Y','urut'=>3]);
        Param::create(['nama' => 'YESNO','kode' => 'YES','desc' => 'YES','aktif'=>'Y','urut'=>1]);
        Param::create(['nama' => 'YESNO','kode' => 'NO','desc' => 'NO','aktif'=>'Y','urut'=>2]);
        Param::create(['nama' => 'STATUS','kode' => 'DRF','desc' => 'Draft','aktif'=>'Y','urut'=>1]);
        Param::create(['nama' => 'STATUS','kode' => 'PRG','desc' => 'Progress','aktif'=>'Y','urut'=>2]);
        Param::create(['nama' => 'STATUS','kode' => 'SUS','desc' => 'Suspend','aktif'=>'Y','urut'=>3]);
        Param::create(['nama' => 'STATUS','kode' => 'FNS','desc' => 'Finis','aktif'=>'Y','urut'=>4]);
        Param::create(['nama' => 'TIPEDATA','kode' => 'VAR','desc' => 'Varchar','aktif'=>'Y','urut'=>1]);
        Param::create(['nama' => 'TIPEDATA','kode' => 'NUM','desc' => 'Numeric','aktif'=>'Y','urut'=>2]);
        Param::create(['nama' => 'TIPEDATA','kode' => 'DAT','desc' => 'Date','aktif'=>'Y','urut'=>3]);
        Param::create(['nama' => 'JENIS','kode' => 'JNS-04','desc' => 'Video','aktif'=>'Y','urut'=>4]);
        // Param::create(['nama' => '','kode' => '','desc' => '','aktif'=>'','urut'=>]);
    }
}
