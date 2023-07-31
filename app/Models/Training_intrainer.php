<?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
        
        class Training_intrainer extends Model
        {
            use HasFactory;
            protected $fillable = [               
        'nip','nama_trainer','training_plan_id','materi','catatan','internal','create_by','update_by'
        ];
    }