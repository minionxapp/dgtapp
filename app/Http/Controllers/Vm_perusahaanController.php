<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Param;
use App\Models\Vm_perusahaan;

class Vm_perusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vm_perusahaans = Vm_perusahaan::
        leftjoin('params','vm_perusahaans.sts_padi','=','params.kode')
        ->leftjoin('params as param_pajak','vm_perusahaans.sts_pajak','=','param_pajak.kode')
        ->leftjoin('params as param_smap','vm_perusahaans.sts_smap','=','param_smap.kode')
        ->leftjoin('params as param_drm','vm_perusahaans.sts_drm','=','param_drm.kode')
        ->where('params.nama', '=', 'STS-PADI')
        ->where('param_pajak.nama', '=', 'STS-PAJAK')
        ->where('param_drm.nama', '=', 'STS-DRM')
        ->where('param_smap.nama', '=', 'STS-SMAP')
        ->get(['vm_perusahaans.*',
        'params.desc as nm_sts_padi',
        'param_pajak.desc as param_pajak',
        'params.desc as param_drm',
        'param_smap.desc as param_smap']);
        return view('vm_perusahaans.index', ['vm_perusahaans' => $vm_perusahaans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sts_padis = Param::where('nama', '=', 'STS-PADI')->get(['kode', 'desc']);
        $sts_drms = Param::where('nama', '=', 'STS-DRM')->get(['kode', 'desc']);
        $sts_smaps = Param::where('nama', '=', 'STS-SMAP')->get(['kode', 'desc']);
        $sts_pajaks = Param::where('nama', '=', 'STS-PAJAK')->get(['kode', 'desc']);

        return view('vm_perusahaans.create', [
            'sts_padis' => $sts_padis,
            'sts_drms' => $sts_drms,
            'sts_smaps' => $sts_smaps,
            'sts_pajaks' => $sts_pajaks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([]);
        $vm_perusahaan = Vm_perusahaan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'email' => $request->email,
            'ttd_spk' => $request->ttd_spk,
            'jabat_ttd' => $request->jabat_ttd,
            'negosiator' => $request->negosiator,
            'jabat_negosiator' => $request->jabat_negosiator,
            'telp_negosiator' => $request->telp_negosiator,
            'sts_padi' => $request->sts_padi,
            'sts_drm' => $request->sts_drm,
            'sts_smap' => $request->sts_smap,
            'sts_pajak' => $request->sts_pajak,
            'link_file' => $request->link_file,
            'rating' => $request->rating,

            'create_by' => Auth::user()->user_id
        ]);
        //$vm_perusahaan = Vm_perusahaan::create($array);    

        $vm_perusahaan->save();
        return redirect()->route('vm_perusahaans.index')->with('success_message', 'Berhasil menambah vm_perusahaan baru');
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
        $sts_padis = Param::where('nama', '=', 'STS-PADI')->get(['kode', 'desc']);
        $sts_drms = Param::where('nama', '=', 'STS-DRM')->get(['kode', 'desc']);
        $sts_smaps = Param::where('nama', '=', 'STS-SMAP')->get(['kode', 'desc']);
        $sts_pajaks = Param::where('nama', '=', 'STS-PAJAK')->get(['kode', 'desc']);
        $vm_perusahaan = Vm_perusahaan::find($id);
        //if($vm_perusahaan->create_by == Auth::user()->id ||$userloged->hasRole(['Super-Admin']) == 1){
        if (!$vm_perusahaan) return redirect()->route('vm_perusahaans.index')
            ->with('error_message', 'Vm_perusahaan dengan id' . $id . ' tidak ditemukan');
        return view('vm_perusahaans.edit', [
            'vm_perusahaan' => $vm_perusahaan, 'sts_padis' => $sts_padis,
            'sts_drms' => $sts_drms,
            'sts_smaps' => $sts_smaps,
            'sts_pajaks' => $sts_pajaks,
        ]);
        //}else{
        //    return redirect()->route('vm_perusahaans.index')
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
        $vm_perusahaan = Vm_perusahaan::find($id);
        $vm_perusahaan->nama = $request->nama;
        $vm_perusahaan->alamat = $request->alamat;
        $vm_perusahaan->telp = $request->telp;
        $vm_perusahaan->email = $request->email;
        $vm_perusahaan->ttd_spk = $request->ttd_spk;
        $vm_perusahaan->jabat_ttd = $request->jabat_ttd;
        $vm_perusahaan->negosiator = $request->negosiator;
        $vm_perusahaan->jabat_negosiator = $request->jabat_negosiator;
        $vm_perusahaan->telp_negosiator = $request->telp_negosiator;
        $vm_perusahaan->sts_padi = $request->sts_padi;
        $vm_perusahaan->sts_drm = $request->sts_drm;
        $vm_perusahaan->sts_smap = $request->sts_smap;
        $vm_perusahaan->sts_pajak = $request->sts_pajak;
        $vm_perusahaan->link_file = $request->link_file;
        $vm_perusahaan->rating = $request->rating;
        $vm_perusahaan->update_by = Auth::user()->user_id;
        $vm_perusahaan->save();
        return redirect()->route('vm_perusahaans.index')
            ->with('success_message', 'Berhasil mengubah vm_perusahaan');
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

        $vm_perusahaan = Vm_perusahaan::find($id);
        if ($vm_perusahaan) $vm_perusahaan->delete();
        return redirect()->route('vm_perusahaans.index')
            ->with('success_message', 'Berhasil menghapus vm_perusahaan');
    }
}
