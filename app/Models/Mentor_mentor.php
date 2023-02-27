<?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
        
        class Mentor_mentor extends Model
        {
            use HasFactory;
            protected $fillable = [               
        'no_surtug','nik','Mentor_ket','create_by','update_by'
        ];
    }