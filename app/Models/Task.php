<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode','nm_project','descripsi','divisi_kode','departemen_kode','pic','mulai','selesai','status','jenis','create_by','update_by'
    ];
    // 
}
