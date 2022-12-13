<?php

namespace App\Http\Controllers;

use App\Models\Lsp_sertifikat;
use Illuminate\Http\Request;

class Lsp_dasboardController extends Controller
{
    public function index()
    {
        // $my_task = Task::where('departemen_kode','=',$user->departemen_kode)
        // ->where('status','<>','FNS')        
        // ->count();
        $identified_jml = number_format(Lsp_sertifikat::where('nip','like','P%')->count());
        $identified = (Lsp_sertifikat::where('nip','like','P%')->count())/Lsp_sertifikat::all()->count()*100;
        $identified = number_format($identified, 2, '.', '');

        $doble_jml = number_format(Lsp_sertifikat::where('nip','like','do%')->count());
        $doble = number_format(((Lsp_sertifikat::where('nip','like','do%')->count())/Lsp_sertifikat::all()->count()*100), 2, '.', '');

        $notFound_jml = number_format(Lsp_sertifikat::where('nip','like','Not%')->count());
        $notFound = number_format(((Lsp_sertifikat::where('nip','like','Not%')->count())/Lsp_sertifikat::all()->count()*100), 2, '.', '');

        $eksternal_jml = number_format(Lsp_sertifikat::where('nip','like','Eks%')->count());
        $eksternal = number_format(((Lsp_sertifikat::where('nip','like','Eks%')->count())/Lsp_sertifikat::all()->count()*100), 2, '.', '');


        return view('lsp_dashboard.index',['identified'=>$identified,'identified_jml'=>$identified_jml,
                'doble_jml'=>$doble_jml,'doble'=>$doble,
                'notFound_jml'=>$notFound_jml,'notFound'=>$notFound,
                'eksternal_jml'=>$eksternal_jml,'eksternal'=>$eksternal,
            ]);
    }
}
