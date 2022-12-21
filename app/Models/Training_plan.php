<?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
        
        class Training_plan extends Model
        {
            use HasFactory;
            protected $fillable = [               
        'nama_training','keterangan','pelaksanaan','jml_peserta','lokasi','biaya','jml_kelas','durasi','tgl_mulai','kategori',
        'tgl_selesai','unit_usul','pic_akademi','create_by','update_by'
        ];
    }