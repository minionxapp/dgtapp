<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Param;
use App\Models\Training_note;

class Training_noteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $training_notes = Training_note::all();
        return view('training_notes.index', ['training_notes' => $training_notes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pilihans = Param::where('nama', '=', 'TR-NOTE')->get(['kode', 'desc']);
        return view('training_notes.create', ['pilihans'=>$pilihans]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([]);
        $training_note = Training_note::create([
            'nip' => $request->nip,
            'tahun' => $request->tahun,
            'event' => $request->event,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'note' => $request->note,
            'nama_pegawai' => $request->nama_pegawai,
            'pilihan' => $request->pilihan,

            'create_by' => Auth::user()->user_id
        ]);
        //$training_note = Training_note::create($array);    

        $training_note->save();
        return redirect()->route('training_notes.index')->with('success_message', 'Berhasil menambah training_note baru');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit($idx)
    {
        $id = Crypt::decrypt($idx);
        $training_note = Training_note::find($id);
        $pilihans = Param::where('nama', '=', 'TR-NOTE')->get(['kode', 'desc']);
        if (!$training_note) return redirect()->route('training_notes.index')
            ->with('error_message', 'Training_note dengan id' . $id . ' tidak ditemukan');
        return view('training_notes.edit', ['training_note' => $training_note,'pilihans'=>$pilihans]);
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
        $request->validate([]);
        $training_note = Training_note::find($id);
        $training_note->nip = $request->nip;
        $training_note->tahun = $request->tahun;
        $training_note->event = $request->event;
        $training_note->date_start = $request->date_start;
        $training_note->date_end = $request->date_end;
        $training_note->note = $request->note;
        $training_note->nama_pegawai = $request->nama_pegawai;
        $training_note->update_by = Auth::user()->user_id;
        $training_note->pilihan = $request->pilihan;
        $training_note->save();
        return redirect()->route('training_notes.index')
            ->with('success_message', 'Berhasil mengubah training_note');
    }


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

        $training_note = Training_note::find($id);
        if ($training_note) $training_note->delete();
        return redirect()->route('training_notes.index')
            ->with('success_message', 'Berhasil menghapus training_note');
    }
}
