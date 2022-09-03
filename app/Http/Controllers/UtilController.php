<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Param;
use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function departemenByDivisi($divisi){
        $departemens = Departemen::where('divisi_kode','=',$divisi)->get(['departemens.kode','departemens.nama']);
        return $departemens;
    }

    public function paramByNama($nmParam){
        $params = Param::where('nama','=',$nmParam)->get(['kode','desc']);
        return $params;
    }
}
