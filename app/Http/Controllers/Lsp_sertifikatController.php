<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Param;
use App\Models\Lsp_sertifikat;
use App\Helpers\Helper;

// use DataTables;
use JeroenNoten\LaravelAdminLte\View\Components\Tool\Datatable;

class Lsp_sertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pegawais = Pegawai::take(100)->get();
        // $lsp_sertifikats = Lsp_sertifikat::get(['nama','no_sertifikat','no_register']);
        $lsp_sertifikats =[] ;//Lsp_sertifikat::take(100)->get();//get(['nama','no_sertifikat','no_register']);
        return view('lsp_sertifikats.index', ['lsp_sertifikats' => $lsp_sertifikats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        set_time_limit(300);
        // return view('lsp_sertifikats.create', []);
        return (Helper::SetNikSertifikat());
        // return view('lsp_sertifikats.create', []);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([]);
        $lsp_sertifikat = Lsp_sertifikat::create([
            'no' => $request->no,
            'noreg1' => $request->noreg1,
            'noreg2' => $request->noreg2,
            'noreg3' => $request->noreg3,
            'nama' => $request->nama,
            'noser1' => $request->noser1,
            'noser2' => $request->noser2,
            'noser3' => $request->noser3,
            'noser4' => $request->noser4,
            'noser5' => $request->noser5,
            'no_blanko' => $request->no_blanko,
            'email' => $request->email,
            'hp' => $request->hp,
            'kode_skema' => $request->kode_skema,
            'nama_skema' => $request->nama_skema,
            'provinsi' => $request->provinsi,
            'th_lapor' => $request->th_lapor,
            'no_sertifikat' => $request->no_sertifikat,
            'no_register' => $request->no_register,
            'tipe' => $request->tipe,

            'create_by' => Auth::user()->user_id
        ]);
        //$lsp_sertifikat = Lsp_sertifikat::create($array);    

        $lsp_sertifikat->save();
        return redirect()->route('lsp_sertifikats.index')->with('success_message', 'Berhasil menambah lsp_sertifikat baru');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit($idx)
    {
        $id = Crypt::decrypt($idx);
        // $user_id =(Auth::user()->id);
        // $userloged = User::find($user_id);
        $lsp_sertifikat = Lsp_sertifikat::find($id);
        //if($lsp_sertifikat->create_by == Auth::user()->id ||$userloged->hasRole(['Super-Admin']) == 1){
        if (!$lsp_sertifikat) return redirect()->route('lsp_sertifikats.index')
            ->with('error_message', 'Lsp_sertifikat dengan id' . $id . ' tidak ditemukan');
        return view('lsp_sertifikats.edit', ['lsp_sertifikat' => $lsp_sertifikat,]);
        //}else{
        //    return redirect()->route('lsp_sertifikats.index')
        //    ->with('error_message', 'And tidak berhak untuk meng edit data ini');
        //}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([]);
        $lsp_sertifikat = Lsp_sertifikat::find($id);
        $lsp_sertifikat->no = $request->no;
        $lsp_sertifikat->noreg1 = $request->noreg1;
        $lsp_sertifikat->noreg2 = $request->noreg2;
        $lsp_sertifikat->noreg3 = $request->noreg3;
        $lsp_sertifikat->nama = $request->nama;
        $lsp_sertifikat->noser1 = $request->noser1;
        $lsp_sertifikat->noser2 = $request->noser2;
        $lsp_sertifikat->noser3 = $request->noser3;
        $lsp_sertifikat->noser4 = $request->noser4;
        $lsp_sertifikat->noser5 = $request->noser5;
        $lsp_sertifikat->no_blanko = $request->no_blanko;
        $lsp_sertifikat->email = $request->email;
        $lsp_sertifikat->hp = $request->hp;
        $lsp_sertifikat->kode_skema = $request->kode_skema;
        $lsp_sertifikat->nama_skema = $request->nama_skema;
        $lsp_sertifikat->provinsi = $request->provinsi;
        $lsp_sertifikat->th_lapor = $request->th_lapor;
        $lsp_sertifikat->no_sertifikat = $request->no_sertifikat;
        $lsp_sertifikat->no_register = $request->no_register;
        $lsp_sertifikat->tipe = $request->tipe;
        $lsp_sertifikat->update_by = Auth::user()->user_id;
        $lsp_sertifikat->save();
        return redirect()->route('lsp_sertifikats.index')
            ->with('success_message', 'Berhasil mengubah lsp_sertifikat');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $idx)
    {
        $id = Crypt::decrypt($idx);
        $user_id = (Auth::user()->id);
        $userloged = User::find($user_id);

        $lsp_sertifikat = Lsp_sertifikat::find($id);
        if ($lsp_sertifikat) $lsp_sertifikat->delete();
        return redirect()->route('lsp_sertifikats.index')
            ->with('success_message', 'Berhasil menghapus lsp_sertifikat');
    }



    public function sertifikat($nama)
    {
        // $lsp_sertifikats = Lsp_sertifikat::take(100)->get(['nama','no_sertifikat','no_register','id']);
        $lsp_sertifikats = Lsp_sertifikat::
            where('nama','like','%'.$nama.'%')
            ->orWhere('nip','=',$nama)
        ->orderBy('nama', 'ASC')->get(['nama','no_sertifikat','no_register','id','provinsi','nip']);
        $i=0;
        // $result_product = /*your mysql query here*/ 
        $lsp_sertifikats_new = array();
        foreach ($lsp_sertifikats as $sertipikat) {
            $lsp_sertifikats_new [$i]["nama"]= $sertipikat->nama;
            $lsp_sertifikats_new [$i]["id"]= $sertipikat->id;
            $lsp_sertifikats_new [$i]["no_sertifikat"]= $sertipikat->no_sertifikat;
            $lsp_sertifikats_new [$i]["no_register"]= $sertipikat->no_register;
            $lsp_sertifikats_new [$i]["provinsi"]= $sertipikat->provinsi;
            $lsp_sertifikats_new [$i]["nip"]= $sertipikat->nip;
            $lsp_sertifikats_new [$i]["idx"]= Crypt::encrypt($sertipikat->id);
            $i++;
        }
        return json_encode(array('data' => $lsp_sertifikats_new));
    }
}
