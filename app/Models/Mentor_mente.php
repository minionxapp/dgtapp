<?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
        
        class Mentor_mente extends Model
        {
            use HasFactory;
            protected $fillable = [               
        'no_surtug','nik','ket','create_by','update_by'
        ];
    }