<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Param;
use App\Models\Mentor_event;
use App\Models\Mentor_event_member;
use App\Models\Mentor_surtug;

class Mentor_eventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentor_events = Mentor_event::
        join('mentor_surtugs','mentor_events.no_surtug','=','mentor_surtugs.id')
        ->get(['mentor_events.*','mentor_surtugs.no_surtug as surtug','mentor_surtugs.uraian as surtug_uraian']);
        return view('mentor_events.index', ['mentor_events' => $mentor_events]);
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $no_surtugs = Mentor_surtug::all();

        return view('mentor_events.create', [
            'no_surtugs' => $no_surtugs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([]);
        $mentor_event = Mentor_event::create([
            'no_surtug' => $request->no_surtug,
            'nama_event' => $request->nama_event,
            'ket' => $request->ket,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,

            'create_by' => Auth::user()->user_id
        ]);
        //$mentor_event = Mentor_event::create($array);    

        $mentor_event->save();
        return redirect()->route('mentor_events.index')->with('success_message', 'Berhasil menambah mentor_event baru');
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
        $no_surtugs = $no_surtugs = Mentor_surtug::all();
        $mentor_event = Mentor_event::find($id);
        if (!$mentor_event) return redirect()->route('mentor_events.index')
            ->with('error_message', 'Mentor_event dengan id' . $id . ' tidak ditemukan');
        return view('mentor_events.edit', [
            'mentor_event' => $mentor_event, 'no_surtugs' => $no_surtugs,
        ]);
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
        $mentor_event = Mentor_event::find($id);
        $mentor_event->no_surtug = $request->no_surtug;
        $mentor_event->nama_event = $request->nama_event;
        $mentor_event->ket = $request->ket;
        $mentor_event->tgl_mulai = $request->tgl_mulai;
        $mentor_event->tgl_selesai = $request->tgl_selesai;
        $mentor_event->update_by = Auth::user()->user_id;
        $mentor_event->save();
        return redirect()->route('mentor_events.index')
            ->with('success_message', 'Berhasil mengubah mentor_event');
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

        $mentor_event = Mentor_event::find($id);

        // cek event sudah ada membernya
        $mentorEvents = Mentor_event_member::where('event_id','=',$id)->count();
        if($mentorEvents > 0){
            return redirect()->route('mentor_events.index')
            ->with('success_message', 'GAGAL menghapus kegiatan............');
        }

        if ($mentor_event) $mentor_event->delete();
        return redirect()->route('mentor_events.index')
            ->with('success_message', 'Berhasil menghapus mentor_event');
    }
}
