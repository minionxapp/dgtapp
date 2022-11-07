<?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
        
        class Jajal extends Model
        {
            use HasFactory;
            protected $fillable = [               
        'kode','nama','jumlah','divisi','mulai','create_by','update_by'
        ];
    }