<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Coba;

class CobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cobas = Coba::all();
        return view('cobas.index', ['cobas' => $cobas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cobas.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);
        $coba = Coba::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,

            'create_by' => Auth::user()->user_id
        ]);
        //$coba = Coba::create($array);    

        $coba->save();
        return redirect()->route('cobas.index')->with('success_message', 'Berhasil menambah coba baru');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coba = Coba::find($id);
        if (!$coba) return redirect()->route('cobas.index')
            ->with('error_message', 'Coba dengan id' . $id . ' tidak ditemukan');
        return view('cobas.edit', ['coba' => $coba]);
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
            'nama' => 'required',
            'alamat' => 'required',
        ]);
        $coba = Coba::find($id);
        $coba->nama = $request->nama;
        $coba->alamat = $request->alamat;
        $coba->update_by = Auth::user()->user_id;
        $coba->save();
        return redirect()->route('cobas.index')
            ->with('success_message', 'Berhasil mengubah coba');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $coba = Coba::find($id);
        if ($coba) $coba->delete();
        return redirect()->route('cobas.index')
            ->with('success_message', 'Berhasil menghapus coba');
    }
}
