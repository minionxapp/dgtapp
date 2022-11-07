<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coba extends Model
{
    use HasFactory;
    protected $fillable = [
        'teks', 'tanggal', 'pilihan', 'create_by', 'update_by'
    ];
}
