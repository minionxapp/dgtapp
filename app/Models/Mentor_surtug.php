<?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
        
        class Mentor_surtug extends Model
        {
            use HasFactory;
            protected $fillable = [               
        'no_surtug','uraian','tgl_mulai','tgl_selesai','nama_dokumen','link_dokumen','create_by','update_by'
        ];
    }