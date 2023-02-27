<?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
        
        class Training_plan_peserta extends Model
        {
            use HasFactory;
            protected $fillable = [               
        'training_plan_id','nik','status_peserta','keterangan','create_by','update_by'
        ];
    }