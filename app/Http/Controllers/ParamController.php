<?php

namespace App\Http\Controllers;

use App\Models\Param;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params=Param::all();
        return view('params.index',['params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $params = Param::where('nama','=','YESNO')->get(['kode','desc']);
        return view('params.create',['params'=>$params]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // {{-- "nama","kode","desc","aktif","urut","create_by","update_by" --}}
        $request->validate([
            'kode' => 'required',
            'nama' => 'required'
        ]);

        $param = Param::create([
            'kode'=>$request->kode,
            'nama'=>$request->nama,
            'desc'=>$request->desc,
            'aktif'=>$request->aktif,
            'urut'=>$request->urut,           
            'create_by'=>Auth::user()->id.''        
        ]);
        $param->save();
        // dd($param->toSql());
        return redirect()->route('params.index')
            ->with('success_message', 'Berhasil menambah Departemen baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Param  $param
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Param  $param
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $param = Param::find($id);
        if (!$param) return redirect()->route('params.index')
            ->with('error_message', 'Param dengan id'.$id.' tidak ditemukan');
        return view('params.edit', ['param' => $param]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Param  $param
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required|'
            
        ]);
        // {{-- "nama","kode","desc","aktif","urut","create_by","update_by" --}}
        $param = Param::find($id);
        $param->kode = $request->kode;
        $param->nama = $request->nama;
        $param->desc = $request->desc;
        $param->aktif = $request->aktif;
        $param->urut = $request->urut;
        $param->save();
        return redirect()->route('params.index')
            ->with('success_message', 'Berhasil mengubah user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Param  $param
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $param = Param::find($id);
        //     ->with('error_message', 'Anda tidak dapat menghapus param sendiri.');
        if ($param) $param->delete();
        return redirect()->route('params.index')
            ->with('success_message', 'Berhasil menghapus param');
    }
}
