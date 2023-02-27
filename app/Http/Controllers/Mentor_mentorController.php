<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Param;
use App\Models\Mentor_mentor;
use App\Models\Mentor_surtug;

class Mentor_mentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($surtug)
    {
        $mentor_mentors = Mentor_mentor::all();
        return view('mentor_mentors.index', ['mentor_mentors' => $mentor_mentors,'surtug'=>$surtug]);
    }
    public function mentorIndex($surtug)
    {
        $dec_surtug = Crypt::decrypt($surtug);
        $mentor_mentors = Mentor_mentor::
        join('mentor_surtugs','mentor_mentors.no_surtug','=','mentor_surtugs.id')
        ->join('pegawais','mentor_mentors.nik','=','pegawais.nip')
        ->where('mentor_mentors.no_surtug','=',$dec_surtug)
        ->get(['mentor_mentors.*','mentor_surtugs.no_surtug as nomor_surtug','mentor_surtugs.uraian as uraian','pegawais.nama_pegawai as nama_pegawai']);
        // return $mentor_mentors;
        return view('mentor_mentors.index', ['mentor_mentors' => $mentor_mentors,'surtug'=>$surtug]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($surtug)
    {
        $dec_surtug = Crypt::decrypt($surtug);
        $surtugs = Mentor_surtug::where('id','=',$dec_surtug)->get();
        return view('mentor_mentors.create', ['surtugs'=>$surtugs,'surtug'=>$surtug]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_surtug' => 'required',
            'nik' => 'required',
            'Mentor_ket' => 'required',
        ]);
        $mentor_mentor = Mentor_mentor::create([
            'no_surtug' => $request->no_surtug,
            'nik' => $request->nik,
            'Mentor_ket' => $request->Mentor_ket,
            'create_by' => Auth::user()->user_id
        ]);

        $mentor_mentor->save();
        // return redirect()->route('mentor_mentors.index')->with('success_message', 'Berhasil menambah mentor_mentor baru');
        return redirect()->route('mentor_mentors_surtug.index',Crypt::encrypt($request->no_surtug))->with('success_message', 'Berhasil menambah mentor_mentor baru');

       
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
    //     $mentor_mentor = Mentor_mentor::find($id);
    //     if (!$mentor_mentor) return redirect()->route('mentor_mentors.index')
    //         ->with('error_message', 'Mentor_mentor dengan id' . $id . ' tidak ditemukan');
    //     return view('mentor_mentors.edit', ['mentor_mentor' => $mentor_mentor,]);
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
    //     $request->validate([
    //         'no_surtug' => 'required',
    //         'nik' => 'required',
    //         'Mentor_ket' => 'required',
    //     ]);
    //     $mentor_mentor = Mentor_mentor::find($id);
    //     $mentor_mentor->no_surtug = $request->no_surtug;
    //     $mentor_mentor->nik = $request->nik;
    //     $mentor_mentor->mentor_ket = $request->mentor_ket;
    //     $mentor_mentor->update_by = Auth::user()->user_id;
    //     $mentor_mentor->save();
    //     return redirect()->route('mentor_mentors.index')
    //         ->with('success_message', 'Berhasil mengubah mentor_mentor');
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
        $mentor_mentor = Mentor_mentor::find($id);
        if ($mentor_mentor) $mentor_mentor->delete();

        return redirect()->route('mentor_mentors_surtug.index',Crypt::encrypt($mentor_mentor->no_surtug))->with('success_message', 'Berhasil hapus mentor_mentor baru');
    }
}
