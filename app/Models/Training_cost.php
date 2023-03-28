<?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
        
        class Training_cost extends Model
        {
            use HasFactory;
            protected $fillable = [               
        'training_plan_id','ket_biaya','biaya','kategori_biaya','create_by','update_by'
        ];
    }