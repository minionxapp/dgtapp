<?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
        
        class Project extends Model
        {
            use HasFactory;
            protected $fillable = [               
        'kode','nama','jenis','divisi_kode','departemen_kode','unit_req','pic_req','keterangan','file01','file02','gambar','start_plan','end_plan','divisi_assignto','dept_assignto','file_desc01','file_uri01','file_desc02','file_uri02','pic_assignto','create_by','update_by'
        ];
    }