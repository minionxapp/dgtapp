<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Param;
use App\Models\Mentor_event_member;
use App\Models\Mentor_event;
use App\Models\Mentor_mente;
use App\Models\Mentor_mentor;

class Mentor_event_memberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentor_event_members = Mentor_event_member::all();
        return view('mentor_event_members.index', ['mentor_event_members' => $mentor_event_members]);
    }

    public function indexevent($evenid)
    {
     $mentor_event_members = Mentor_event_member::
        join('mentor_events','mentor_event_members.event_id','=','mentor_events.id')
        ->join('pegawais', 'mentor_event_members.nik_mentor', '=', 'pegawais.nip')
        ->join('pegawais as peg_mente', 'mentor_event_members.nik_mente', '=', 'peg_mente.nip')
        ->where('event_id','=',decrypt($evenid))
        ->get(['mentor_event_members.*','mentor_events.nama_event','pegawais.nama_pegawai as nama_mentor','peg_mente.nama_pegawai as nama_mente']);
        // return $mentor_event_members .'||'.decrypt($evenid);
        return view('mentor_event_members.index', ['mentor_event_members' => $mentor_event_members, 'event' => $evenid]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($event_id)
    {
        $eventid = Crypt::decrypt($event_id);
        $event = Mentor_event::find($eventid);
        $events = Mentor_event::where('id','=',$eventid)->get();
        $mentors = Mentor_mentor::
        join('pegawais', 'mentor_mentors.nik', '=', 'pegawais.nip')
        -> where('no_surtug','=',$event->no_surtug)->get(['mentor_mentors.*','pegawais.nama_pegawai']);

        $mentes = Mentor_mente::
        join('pegawais', 'mentor_mentes.nik', '=', 'pegawais.nip')
        -> where('no_surtug','=',$event->no_surtug)->get(['mentor_mentes.*','pegawais.nama_pegawai']);
        return view('mentor_event_members.create', [
            'events' => $events,'mentors'=>$mentors,'mentes'=>$mentes,'surtug'=>$event_id
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
        $mentor_event_member = Mentor_event_member::create([
            'event_id' => $request->event_id,
            'nik_mentor' => $request->nik_mentor,
            'nik_mente' => $request->nik_mente,
            'ket' => $request->ket,

            'create_by' => Auth::user()->user_id
        ]);
        //$mentor_event_member = Mentor_event_member::create($array);    

        $mentor_event_member->save();
        // return redirect()->route('mentor_event_members.index')->with('success_message', 'Berhasil menambah mentor_event_member baru');
        return redirect()->route('mentor_event_members_index.index', Crypt::encrypt($request->event_id))->with('success_message', 'Berhasil menghapus mentor_event_member');
 
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
        // $user_id =(Auth::user()->id);
        // $userloged = User::find($user_id);
        $event_ids = Param::where('nama', '=', 'YESNO')->get(['kode', 'desc']);
        $mentor_event_member = Mentor_event_member::find($id);
        //if($mentor_event_member->create_by == Auth::user()->id ||$userloged->hasRole(['Super-Admin']) == 1){
        if (!$mentor_event_member) return redirect()->route('mentor_event_members.index')
            ->with('error_message', 'Mentor_event_member dengan id' . $id . ' tidak ditemukan');
        return view('mentor_event_members.edit', [
            'mentor_event_member' => $mentor_event_member, 'event_ids' => $event_ids,
        ]);
        //}else{
        //    return redirect()->route('mentor_event_members.index')
        //    ->with('error_message', 'And tidak berhak untuk meng edit data ini');
        //}
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
        $mentor_event_member = Mentor_event_member::find($id);
        $mentor_event_member->event_id = $request->event_id;
        $mentor_event_member->nik_mentor = $request->nik_mentor;
        $mentor_event_member->nik_mente = $request->nik_mente;
        $mentor_event_member->ket = $request->ket;
        $mentor_event_member->update_by = Auth::user()->user_id;
        $mentor_event_member->save();
        return redirect()->route('mentor_event_members.index')
            ->with('success_message', 'Berhasil mengubah mentor_event_member');
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

        $mentor_event_member = Mentor_event_member::find($id);
        if ($mentor_event_member) $mentor_event_member->delete();
        // return redirect()->route('mentor_event_members.index')->with('success_message', 'Berhasil menghapus mentor_event_member');
        return redirect()->route('mentor_event_members_index.index', Crypt::encrypt( $mentor_event_member->event_id))->with('success_message', 'Berhasil menghapus mentor_event_member');
    }
}
