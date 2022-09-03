<?php

namespace App\Http\Controllers;

use App\Models\Tabel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabels = Tabel::all();
        return view('tabels.index', ['tabels' => $tabels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tabels.create');
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
               'nama' => 'required'
        ]);
        $tabel = Tabel::create([
            'nama'=>$request->nama ,
            'desc1'=>$request->desc1 ,
            'desc2'=>$request->desc2 ,           
            'create_by'=>Auth::user()->id.'' 
        ]);
        $tabel->save();
        return redirect()->route('tabels.index')
            ->with('success_message', 'Berhasil menambah Tabel baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tabel  $tabel
     * @return \Illuminate\Http\Response
     */
    public function show(Tabel $tabel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tabel  $tabel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tabel = Tabel::find($id);
        if (!$tabel) return redirect()->route('tabels.index')
            ->with('error_message', 'Tabel dengan id'.$id.' tidak ditemukan');
        return view('tabels.edit', ['tabel' => $tabel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tabel  $tabel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([            
            'nama' => 'required'            
        ]);
        $tabel = Tabel::find($id);
        $tabel->nama = $request->nama;
        $tabel->desc1 = $request->desc1;
        $tabel->desc2 = $request->desc2;
        $tabel->create_by = 'kkk';
        $tabel->update_by='lll';

        $tabel->save();
        return redirect()->route('tabels.index')
            ->with('success_message', 'Berhasil mengubah user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tabel  $tabel
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $tabel = Tabel::find($id);
       
        if ($tabel) $tabel->delete();
        return redirect()->route('tabels.index')
            ->with('success_message', 'Berhasil menghapus tabel');
    }


 
}
