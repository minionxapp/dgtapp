<?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
        
        class Mentor_event_member extends Model
        {
            use HasFactory;
            protected $fillable = [               
        'event_id','nik_mentor','nik_mente','ket','create_by','update_by'
        ];
    }