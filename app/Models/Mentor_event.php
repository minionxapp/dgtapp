<?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
        
        class Mentor_event extends Model
        {
            use HasFactory;
            protected $fillable = [               
        'no_surtug','nama_event','ket','tgl_mulai','tgl_selesai','create_by','update_by'
        ];
    }