<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vm_perusahaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'alamat', 'telp', 'email', 'ttd_spk', 'jabat_ttd', 'negosiator', 'jabat_negosiator', 'telp_negosiator', 'sts_padi', 'sts_drm', 'sts_smap', 'sts_pajak', 'link_file', 'rating', 'create_by', 'update_by'
    ];
}
