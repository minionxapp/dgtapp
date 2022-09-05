<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $departemens = Departemen::join('divisis','departemens.divisi_kode','=','divisis.kode')->get(['departemens.*', 'divisis.nama as nama_divisi']);

        return view('departemens.index',
         [            'departemens' => $departemens        ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisis = Divisi::all();
        return view('departemens.create',['divisis' => $divisis]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //            {{--  'kode','nama','nik_kadept','nama_kadept','divisi_kode','create_by','update_by','folder --}}
        // divisi_kode
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'divisi_kode' => 'required'
        ]);
        $array = $request->only([
            'kode','nama','nik_kadept','nama_kadept','divisi_kode','create_by','update_by'
        ]);


        $divisi = Departemen::create([
            'kode'=>$request->kode ,
            'nama'=>$request->nama ,
            'nik_kadept'=>$request->nik_kadept ,
            'nama_kadept'=>$request->nama_kadept ,
            'divisi_kode'=>$request->divisi_kode ,
            'create_by'=>Auth::user()->id.'' ,
            'folder'=>$request->nama,
            
             
        ]);




        // $smp = Departemen::create($divisi);
        $divisi->save();
        return redirect()->route('departemens.index')
            ->with('success_message', 'Berhasil menambah Departemen baru');
               
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function show(Departemen $departemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $divisis = Divisi::all();
        $departemen = Departemen::find($id);
        if (!$departemen) return redirect()->route('departemens.index')
            ->with('error_message', 'Departemen dengan id'.$id.' tidak ditemukan');
        return view('departemens.edit', ['departemen' => $departemen,'divisis' => $divisis]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 'kode','nama','nik_kadept','nama_kadept','divisi_kode','create_by','update_by','folder'
        $request->validate([
            'kode' => 'required',
            'nama' => 'required|'
            
        ]);
        $departemen = Departemen::find($id);
        $departemen->kode = $request->kode;
        $departemen->nama = $request->nama;
        $departemen->nik_kadept = $request->nik_kadept;
        $departemen->nama_kadept = $request->nama_kadept;
        $departemen->save();
        return redirect()->route('departemens.index')
            ->with('success_message', 'Berhasil mengubah Depertemen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $departemen = Departemen::find($id);
       
        if ($departemen) $departemen->delete();
        return redirect()->route('departemens.index')
            ->with('success_message', 'Berhasil menghapus departemen');
    }
}
