<?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
        
        class Lsp_skema extends Model
        {
            use HasFactory;
            protected $fillable = [               
        'kode_skema','nama_skema','jenis_skema','jumlah_unit','sektor','bidang','kode_unit','unit_kompetensi','create_by','update_by'
        ];
    }