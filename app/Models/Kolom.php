<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kolom extends Model
{
    use HasFactory;
    protected $fillable = [
     'nama','tipedata','null_','key_','default_','create_by','update_by','nama_tabel','urut'];
}
