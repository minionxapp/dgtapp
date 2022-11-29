<?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
        
        class Pegawai extends Model
        {
            use HasFactory;
            protected $fillable = [               
        'nip','nip_lengkap','nama_pegawai','jenis_kelamin','status_aktif','kode_unit','nama_unit','unit_tk_1','unit_tk_2','unit_tk_3','jenis_kantor','create_by','update_by'
        ];
    }