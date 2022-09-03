<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;
    protected $fillable = [
    'kode','nama','nik_kadept','nama_kadept','divisi_kode','create_by','update_by','folder'];


    public function divisi()
    {
        return $this->belongsTo('App\Models\Divisi','divisi_kode','kode');
    }
}
