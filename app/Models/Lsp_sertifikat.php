<?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
        
        class Lsp_sertifikat extends Model
        {
            use HasFactory;
            protected $fillable = [               
        'no','noreg1','noreg2','noreg3','nama','noser1','noser2','noser3','noser4','noser5','no_blanko','email','hp','kode_skema','nama_skema',
        'provinsi','th_lapor','create_by','update_by','nip'
        ];
    }