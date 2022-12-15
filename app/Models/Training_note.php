<?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
        
        class Training_note extends Model
        {
            use HasFactory;
            protected $fillable = [               
        'nip','tahun','event','date_start','date_end','note','nama_pegawai','create_by','update_by','pilihan'
        ];
    }