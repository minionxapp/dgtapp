<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Param;
use App\Models\Training_license;

class Training_licenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $training_licenses = Training_license::
        join('departemens','training_licenses.pic','=','departemens.kode')
        ->get(['training_licenses.*','departemens.nama as depnama']);

        // :join('divisis','projects.divisi_kode','=','divisis.kode')
        return view('training_licenses.index', ['training_licenses' => $training_licenses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $pics = Departemen::where('divisi_kode','=',$user->divisi_kode)->get();
        $statuss = Param::where('nama', '=', 'YESNO')->get(['kode', 'desc']);

        return view('training_licenses.create', [
            'pics' => $pics,
            'statuss' => $statuss,
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
        $training_license = Training_license::create([
            'nama_license' => $request->nama_license,
            'keterangan' => $request->keterangan,
            'jml' => $request->jml,
            'tgl_start' => $request->tgl_start,
            'tgl_end' => $request->tgl_end,
            'pic' => $request->pic,
            'status' => $request->status,
            'id_panjang' => $request->id_panjang,
            'create_by' => Auth::user()->user_id
        ]);
        //$training_license = Training_license::create($array);    

        $training_license->save();
        return redirect()->route('training_licenses.index')->with('success_message', 'Berhasil menambah training_license baru');
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
        $user = Auth::user();
        $pics = Departemen::where('divisi_kode','=',$user->divisi_kode)->get();
        $statuss = Param::where('nama', '=', 'YESNO')->get(['kode', 'desc']);
        $training_license = Training_license::find($id);
        //if($training_license->create_by == Auth::user()->id ||$userloged->hasRole(['Super-Admin']) == 1){
        if (!$training_license) return redirect()->route('training_licenses.index')
            ->with('error_message', 'Training_license dengan id' . $id . ' tidak ditemukan');
        return view('training_licenses.edit', [
            'training_license' => $training_license, 'pics' => $pics,
            'statuss' => $statuss,
        ]);
        //}else{
        //    return redirect()->route('training_licenses.index')
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
        $training_license = Training_license::find($id);
        $training_license->nama_license = $request->nama_license;
        $training_license->keterangan = $request->keterangan;
        $training_license->jml = $request->jml;
        $training_license->tgl_start = $request->tgl_start;
        $training_license->tgl_end = $request->tgl_end;
        $training_license->pic = $request->pic;
        $training_license->status = $request->status;
        $training_license->id_panjang = $request->id_panjang;
        $training_license->update_by = Auth::user()->user_id;
        $training_license->save();
        return redirect()->route('training_licenses.index')
            ->with('success_message', 'Berhasil mengubah training_license');
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

        $training_license = Training_license::find($id);
        if ($training_license) $training_license->delete();
        return redirect()->route('training_licenses.index')
            ->with('success_message', 'Berhasil menghapus training_license');
    }
}
