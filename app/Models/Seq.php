<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seq extends Model
{
    use HasFactory;
    protected $fillable = [
        'seqname', 'nilai', 'tahun', 'seqvalue', 'keterangan', 'create_by', 'update_by'
    ];
}
