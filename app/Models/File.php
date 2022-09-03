<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_group', 'file_id', 'file_real_name', 'file_name', 'file_path', 'file_size', 'file_type', 'create_by', 'update_by'
    ];
}
