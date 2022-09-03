<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisis = Divisi::all();
        return view('divisis.index',
         [            'divisis' => $divisis        ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('divisis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required'
        ]);
        $array = $request->only([
            'kode', 'nama', 'nik_kadiv','nama_kadiv'
        ]);
        $divisi = Divisi::create($array);
        return redirect()->route('divisis.index')
            ->with('success_message', 'Berhasil menambah divisi baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function show(Divisi $divisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $divisi = Divisi::find($id);
        if (!$divisi) return redirect()->route('divisis.index')
            ->with('error_message', 'Divisi dengan id'.$id.' tidak ditemukan');
        return view('divisis.edit', ['divisi' => $divisi]);
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
            'nama' => 'required|'
            
        ]);
        $divisi = Divisi::find($id);
        $divisi->kode = $request->kode;
        $divisi->nama = $request->nama;
        $divisi->nik_kadiv = $request->nik_kadiv;
        $divisi->nama_kadiv = $request->nama_kadiv;
        $divisi->save();
        return redirect()->route('divisis.index')
            ->with('success_message', 'Berhasil mengubah user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $divisi = Divisi::find($id);
        if ($divisi) $divisi->delete();
        return redirect()->route('divisis.index')
            ->with('success_message', 'Berhasil menghapus divisi');
    }


 


}
