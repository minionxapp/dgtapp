<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Param;
use App\Models\File;
use App\Models\Mentor_mente;
use App\Models\Mentor_mentor;
use Illuminate\Http\File as DOK;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\Mentor_surtug;

class Mentor_surtugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentor_surtugs = Mentor_surtug::all();
        return view('mentor_surtugs.index', ['mentor_surtugs' => $mentor_surtugs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('mentor_surtugs.create', []);
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
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
        ]);
        $mentor_surtug = Mentor_surtug::create([
            'no_surtug' => $request->no_surtug,
            'uraian' => $request->uraian,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'nama_dokumen' => $request->nama_dokumen,
            'link_dokumen' => $request->link_dokumen,
            'create_by' => Auth::user()->user_id
        ]);
        $mentor_surtug->save();


        $file = $request->file('file');
        $current_timestamp = Carbon::now()->timestamp; 
        if($file){
           $tujuan_upload = env('MENTOR_UPLOAD');
            $file->move($tujuan_upload,$current_timestamp."___".$file->getClientOriginalName());
            $file_data = new File();
            $file_data->file_group = 'SURTUG';
            $file_data->file_id = $mentor_surtug->id;
            $file_data->file_real_name = $file->getClientOriginalName();
            $file_data->file_name = $current_timestamp."___".$file->getClientOriginalName();
            $file_data->file_path = $tujuan_upload;
            $file_data->file_size = '0';
            $file_data->file_type = '';
            $file_data->update_by = Auth::user()->user_id;
            $file_data->save();
       }





        return redirect()->route('mentor_surtugs.index')->with('success_message', 'Berhasil menambah mentor_surtug baru');
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
        $mentor_surtug = Mentor_surtug::find($id);
        $dokumen_link = File::where('file_group','=','SURTUG')
        ->where('file_id','=',$mentor_surtug->id)->first();
        //if($mentor_surtug->create_by == Auth::user()->id ||$userloged->hasRole(['Super-Admin']) == 1){
        if (!$mentor_surtug) return redirect()->route('mentor_surtugs.index')
            ->with('error_message', 'Mentor_surtug dengan id' . $id . ' tidak ditemukan');
        return view('mentor_surtugs.edit', ['mentor_surtug' => $mentor_surtug,'dokumen_link'=>$dokumen_link]);
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
            'no_surtug' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
        ]);
        $mentor_surtug = Mentor_surtug::find($id);
        $mentor_surtug->no_surtug = $request->no_surtug;
        $mentor_surtug->uraian = $request->uraian;
        $mentor_surtug->tgl_mulai = $request->tgl_mulai;
        $mentor_surtug->tgl_selesai = $request->tgl_selesai;
        $mentor_surtug->nama_dokumen = $request->nama_dokumen;
        $mentor_surtug->link_dokumen = $request->link_dokumen;
        $mentor_surtug->update_by = Auth::user()->user_id;
        $mentor_surtug->save();

        // ambil data file
        $current_timestamp = Carbon::now()->timestamp; 
        $file = $request->file('file');
        if($file){
            $fileold= File::where('file_id','=',$mentor_surtug->id)->where('file_group','=','SURTUG')->first();
            $fileoldold =$fileold->file_name;
            $file->move(env('MENTOR_UPLOAD'),$current_timestamp."___".$file->getClientOriginalName());
            

            $fileold->file_name = $current_timestamp."___".$file->getClientOriginalName();
            $fileold->file_real_name=  $file->getClientOriginalName();
            $fileold->update_by = Auth::user()->user_id;
            $fileold->save();
            rename(env('MENTOR_UPLOAD').'/'.$fileoldold, 
            env('MENTOR_UPLOAD').'/'.'deleted/'.$fileoldold .'__deleted__'.$fileold->file_id.'_'.$fileold->file_name);
          
        }

        return redirect()->route('mentor_surtugs.index')
            ->with('success_message', 'Berhasil mengubah mentor_surtug');
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
        $mentor_surtug = Mentor_surtug::find($id);

        // hapus file
        $fileold= File::where('file_id','=',$mentor_surtug->id)->where('file_group','=','SURTUG')->first();
        // Storage::delete($mentor_surtug->file_path.'/'.$mentor_surtug->file_name);
        // dd($fileold);

        // before delete, cek apakah surtug sudah ada member mente dan mentor
        $mentorSurtugs = Mentor_mentor::where('no_surtug','=',$id)->count();
        // dd($mentorSurtugs);
        if($mentorSurtugs >0){
            return redirect()->route('mentor_surtugs.index')
            ->with('success_message', 'Surat Tugas tidak bisa dihapus..... mentor');
        }

        $menteSurtugs = Mentor_mente::where('no_surtug','=',$id)->count();
        if($menteSurtugs > 0){
            return redirect()->route('mentor_surtugs.index')
            ->with('success_message', 'Surat Tugas tidak bisa dihapus..... mente');
        }
        if ($mentor_surtug) $mentor_surtug->delete();
        return redirect()->route('mentor_surtugs.index')
            ->with('success_message', 'Berhasil menghapus mentor_surtug');
    }
}
