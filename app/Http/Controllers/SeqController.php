<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Seq;
use Carbon\Carbon;

class SeqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seqs = Seq::all();
        return view('seqs.index', ['seqs' => $seqs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seqs.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'seqname' => 'required',
            'nilai' => 'required',
            'tahun' => 'required',
            'seqvalue' => 'required',
            'keterangan' => 'required',
        ]);
        $seq = Seq::create([
            'seqname' => $request->seqname,
            'nilai' => $request->nilai,
            'tahun' => $request->tahun,
            'seqvalue' => $request->seqvalue,
            'keterangan' => $request->keterangan,

            'create_by' => Auth::user()->user_id
        ]);
        //$seq = Seq::create($array);    

        $seq->save();
        return redirect()->route('seqs.index')->with('success_message', 'Berhasil menambah seq baru');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seq = Seq::find($id);
        if (!$seq) return redirect()->route('seqs.index')
            ->with('error_message', 'Seq dengan id' . $id . ' tidak ditemukan');
        return view('seqs.edit', ['seq' => $seq]);
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
            'seqname' => 'required',
            'nilai' => 'required',
            'tahun' => 'required',
            'seqvalue' => 'required',
            'keterangan' => 'required',
        ]);
        $seq = Seq::find($id);
        $seq->seqname = $request->seqname;
        $seq->nilai = $request->nilai;
        $seq->tahun = $request->tahun;
        $seq->seqvalue = $request->seqvalue;
        $seq->keterangan = $request->keterangan;
        $seq->update_by = Auth::user()->user_id;
        $seq->save();
        return redirect()->route('seqs.index')
            ->with('success_message', 'Berhasil mengubah seq');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $seq = Seq::find($id);
        if ($seq) $seq->delete();
        return redirect()->route('seqs.index')
            ->with('success_message', 'Berhasil menghapus seq');
    }



    // get and update seq
    public function noseq()
    {
        return Helper::setSequence('Test','2022');
       
    }
}
