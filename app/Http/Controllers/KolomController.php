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
        $tabel = Tabel::find($id);
        $koloms = Kolom::where('nama_tabel','=',$tabel->nama)->orderBy('urut', 'ASC')->get();
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
            'urut'=>$request->urut ,
            'create_by'=>Auth::user()->id.'' 
        ]);
        $kolom->save();
        return redirect('/kolom/'.$tabel->id)
        ->with('success_message', 'Berhasil menambah Kolom baru');
        // ->route('koloms.index',['tabel'=>$tabel->id])
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
    public function edit($id)
    {
        $kolom = Kolom::find($id);
        // dd($kolom);
        if (!$kolom) return redirect()->route('koloms.index')
            ->with('error_message', 'Kolom dengan id'.$id.' tidak ditemukan');


            $tipedatas = Param::where('nama','=','TIPEDATA')->get(['kode','desc']);
            $null_s = Param::where('nama','=','YESNO')->get(['kode','desc']);
            $tabels = Tabel::where('nama','=',$kolom->nama_tabel)->first();
            // $koloms = Kolom::where('nama_tabel','=',$tabels->nama)->get();


        return view('koloms.edit', ['kolom' => $kolom,
        // 'koloms'=>$koloms,
        'tabels'=>$tabels,
        'tipedatas'=>$tipedatas,
        'null_s'=>$null_s]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kolom  $kolom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tabel = Tabel::where('nama','=',$request->nama_tabel)->first();
        $request->validate([            
            'nama' => 'required|'            
        ]);
        $kolom = Kolom::find($id);       
        $kolom->nama=$request->nama ;
        $kolom->tipedata=$request->tipedata ;
        $kolom->null_=$request->null_ ;   
        $kolom->key_=$request->key_ ;
        $kolom->default_=$request->default_ ;
        $kolom->nama_tabel=$request->nama_tabel ;
        $kolom->urut=$request->urut ;
        $kolom->update_by=Auth::user()->id.''; 
        $kolom->save();
        return redirect('/kolom/'.$tabel->id)
        ->with('success_message', 'Berhasil mengubah user');

           
    }

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
