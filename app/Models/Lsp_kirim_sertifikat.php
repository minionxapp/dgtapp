<?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
        
        class Lsp_kirim_sertifikat extends Model
        {
            use HasFactory;
            protected $table = 'lsp_kirim_sertifikats_1';
            protected $fillable = [               
        'nama','nip','create_by','update_by'
        ];
    }