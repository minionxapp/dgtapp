<?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
        
        class Training_license extends Model
        {
            use HasFactory;
            protected $fillable = [               
        'nama_license','keterangan','jml','tgl_start','tgl_end','pic','status','id_panjang','create_by','update_by'
        ];
    }