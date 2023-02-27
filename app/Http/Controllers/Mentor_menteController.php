<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Param;
use App\Models\Mentor_mente;
use App\Models\Mentor_surtug;

class Mentor_menteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentor_mentes = Mentor_mente::all();
        return view('mentor_mentes.index', ['mentor_mentes' => $mentor_mentes]);
    }
    public function menteIndex($surtug)
    {
        $dec_surtug = Crypt::decrypt($surtug);
        $mentor_mentes = Mentor_mente::
        join('mentor_surtugs', 'mentor_mentes.no_surtug', '=', 'mentor_surtugs.id')
        ->join('pegawais','mentor_mentes.nik','=','pegawais.nip')
            ->where('mentor_mentes.no_surtug', '=', $dec_surtug)
            ->get(['mentor_mentes.*', 'mentor_surtugs.no_surtug as nomor_surtug','mentor_surtugs.uraian as uraian','pegawais.nama_pegawai as nama_pegawai']);
        return view('mentor_mentes.index', ['mentor_mentes' => $mentor_mentes, 'surtug' => $surtug]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($surtug)
    {

        $dec_surtug = Crypt::decrypt($surtug);
        $no_surtugs = Mentor_surtug::where('id', '=', $dec_surtug)->get();
        // return ($no_surtugs);
        return view('mentor_mentes.create', ['no_surtugs' => $no_surtugs, 'surtug' => $surtug]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([]);
        $mentor_mente = Mentor_mente::create([
            'no_surtug' => $request->no_surtug,
            'nik' => $request->nik,
            'ket' => $request->ket,
            'create_by' => Auth::user()->user_id
        ]);
        //$mentor_mente = Mentor_mente::create($array);    

        $mentor_mente->save();
        return redirect()->route('mentor_mentes_surtug.index',Crypt::encrypt($request->no_surtug))->with('success_message', 'Berhasil menambah mentor_mentor baru');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    // public function edit($idx)
    // {
    //     $id = Crypt::decrypt($idx);
    //     // $user_id =(Auth::user()->id);
    //     // $userloged = User::find($user_id);
    //     $no_surtugs = Param::where('nama', '=', 'YESNO')->get(['kode', 'desc']);
    //     $mentor_mente = Mentor_mente::find($id);
    //     //if($mentor_mente->create_by == Auth::user()->id ||$userloged->hasRole(['Super-Admin']) == 1){
    //     if (!$mentor_mente) return redirect()->route('mentor_mentes.index')
    //         ->with('error_message', 'Mentor_mente dengan id' . $id . ' tidak ditemukan');
    //     return view('mentor_mentes.edit', [
    //         'mentor_mente' => $mentor_mente, 'no_surtugs' => $no_surtugs,
    //     ]);
    //     //}else{
    //     //    return redirect()->route('mentor_mentes.index')
    //     //    ->with('error_message', 'And tidak berhak untuk meng edit data ini');
    //     //}
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $request->validate([]);
    //     $mentor_mente = Mentor_mente::find($id);
    //     $mentor_mente->no_surtug = $request->no_surtug;
    //     $mentor_mente->nik = $request->nik;
    //     $mentor_mente->ket = $request->ket;
    //     $mentor_mente->update_by = Auth::user()->user_id;
    //     $mentor_mente->save();
    //     return redirect()->route('mentor_mentes.index')
    //         ->with('success_message', 'Berhasil mengubah mentor_mente');
    // }


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

        $mentor_mente = Mentor_mente::find($id);
        if ($mentor_mente) $mentor_mente->delete();
        return redirect()->route('mentor_mentes_surtug.index',Crypt::encrypt($mentor_mente->no_surtug))->with('success_message', 'Berhasil hapus mentor_mentor baru');


            
    }
}
