<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Param;
use App\Models\Jajal;

class JajalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jajals = Jajal::all();
        return view('jajals.index', ['jajals' => $jajals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisis = Param::where('nama', '=', 'YESNO')->get(['kode', 'desc']);

        return view('jajals.create', [
            'divisis' => $divisis,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'jumlah' => 'required',
            'divisi' => 'required',
            'mulai' => 'required',
        ]);
        $jajal = Jajal::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'divisi' => $request->divisi,
            'mulai' => $request->mulai,

            'create_by' => Auth::user()->user_id
        ]);
        //$jajal = Jajal::create($array);    

        $jajal->save();
        return redirect()->route('jajals.index')->with('success_message', 'Berhasil menambah jajal baru');
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
        $divisis = Param::where('nama', '=', 'YESNO')->get(['kode', 'desc']);
        $jajal = Jajal::find($id);
        // dd($jajal);
        //if($jajal->create_by == Auth::user()->id ||$userloged->hasRole(['Super-Admin']) == 1){
        if (!$jajal) return redirect()->route('jajals.index')
            ->with('error_message', 'Jajal dengan id' . $id . ' tidak ditemukan');
        return view('jajals.edit', [
            'jajal' => $jajal, 'divisis' => $divisis,
        ]);
        //}else{
        //    return redirect()->route('jajals.index')
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
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'jumlah' => 'required',
            'divisi' => 'required',
            'mulai' => 'required',
        ]);
        $jajal = Jajal::find($id);
        $jajal->kode = $request->kode;
        $jajal->nama = $request->nama;
        $jajal->jumlah = $request->jumlah;
        $jajal->divisi = $request->divisi;
        $jajal->mulai = $request->mulai;
        $jajal->update_by = Auth::user()->user_id;
        $jajal->save();
        return redirect()->route('jajals.index')
            ->with('success_message', 'Berhasil mengubah jajal');
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

        $jajal = Jajal::find($id);
        if ($jajal) $jajal->delete();
        return redirect()->route('jajals.index')
            ->with('success_message', 'Berhasil menghapus jajal');
    }
}
