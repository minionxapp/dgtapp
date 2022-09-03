<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kendaraan;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kendaraans = Kendaraan::all();
        return view('kendaraans.index', ['kendaraans' => $kendaraans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kendaraans.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nopol' => 'required',
            'merk' => 'required',
            'roda' => 'required',
        ]);
        $kendaraan = Kendaraan::create([
            'nopol' => $request->nopol,
            'merk' => $request->merk,
            'roda' => $request->roda,

            'create_by' => Auth::user()->user_id
        ]);
        //$kendaraan = Kendaraan::create($array);    

        $kendaraan->save();
        return redirect()->route('kendaraans.index')->with('success_message', 'Berhasil menambah kendaraan baru');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kendaraan = Kendaraan::find($id);
        if (!$kendaraan) return redirect()->route('kendaraans.index')
            ->with('error_message', 'Kendaraan dengan id' . $id . ' tidak ditemukan');
        return view('kendaraans.edit', ['kendaraan' => $kendaraan]);
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
            'nopol' => 'required',
            'merk' => 'required',
            'roda' => 'required',
        ]);
        $kendaraan = Kendaraan::find($id);
        $kendaraan->nopol = $request->nopol;
        $kendaraan->merk = $request->merk;
        $kendaraan->roda = $request->roda;
        $kendaraan->update_by = Auth::user()->user_id;
        $kendaraan->save();
        return redirect()->route('kendaraans.index')
            ->with('success_message', 'Berhasil mengubah kendaraan');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $kendaraan = Kendaraan::find($id);
        if ($kendaraan) $kendaraan->delete();
        return redirect()->route('kendaraans.index')
            ->with('success_message', 'Berhasil menghapus kendaraan');
    }
}
