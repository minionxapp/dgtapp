<?php

namespace App\Http\Controllers;

use App\Models\Kolom;
use App\Models\Param;
use App\Models\Tabel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KolomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // 'nama','tipedata','null_','key_','default_','create_by','update_by',nama_tabel
        $tabel = Tabel::find($id);
        $koloms = Kolom::where('nama_tabel','=',$tabel->nama)->get();
        return view('koloms.index',['koloms'=>$koloms,'tabel'=>$tabel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {  
        
        $tipedatas = Param::where('nama','=','TIPEDATA')->get(['kode','desc']);
        $null_s = Param::where('nama','=','YESNO')->get(['kode','desc']);
        $tabels = Tabel::find($id);
        $koloms = Kolom::where('nama_tabel','=',$tabels->nama)->get();
        return view('koloms.create',[   'koloms'=>$koloms,
                                        'tabels'=>$tabels,'tipedatas'=>$tipedatas,
                                        'null_s'=>$null_s]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tabel = Tabel::where('nama','=',$request->nama_tabel)->first();
        $koloms = Kolom::where('nama_tabel','=',$tabel->nama)->get();
        
        $request->validate([
               'nama' => 'required'
        ]);
        // {{-- 'nama','tipedata','null_','key_','default_','create_by','update_by',nama_tabel --}}
        $kolom = Kolom::create([
            'nama'=>$request->nama ,
            'tipedata'=>$request->tipedata ,
            'null_'=>$request->null_ ,   
            'key_'=>$request->key_ ,
            'default_'=>$request->default_ ,
            'nama_tabel'=>$request->nama_tabel ,
            'create_by'=>Auth::user()->id.'' 
        ]);
        $kolom->save();
        return redirect('/kolom/'.$tabel->id)
        // ->route('koloms.index',['tabel'=>$tabel->id])
            ->with('success_message', 'Berhasil menambah Kolom baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kolom  $kolom
     * @return \Illuminate\Http\Response
     */
    public function show(Kolom $kolom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kolom  $kolom
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $kolom = Kolom::find($id);
    //     if (!$kolom) return redirect()->route('koloms.index')
    //         ->with('error_message', 'Kolom dengan id'.$id.' tidak ditemukan');
    //     return view('koloms.edit', ['kolom' => $kolom]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Kolom  $kolom
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $request->validate([            
    //         'nama' => 'required|'            
    //     ]);
    //     $kolom = Kolom::find($id);
    //     $kolom->nama = $request->nama;
    //     $kolom->desc1 = $request->desc1;
    //     $kolom->desc2 = $request->desc2;
    //     $kolom->save();
    //     return redirect()->route('koloms.index')
    //         ->with('success_message', 'Berhasil mengubah user');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kolom  $kolom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $kolom = Kolom::find($id);
        $tabel = Tabel::where('nama','=',$kolom->nama_tabel)->first();
        

        if ($kolom) $kolom->delete();
            return redirect('/kolom/'.$tabel->id)
            ->with('success_message', 'Berhasil hapus Kolom baru');
    }




}
