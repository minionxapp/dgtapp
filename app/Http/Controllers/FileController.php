<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\File;
use Illuminate\Support\Facades\Crypt;
use App\Models\Training_plan;
use Carbon\Carbon;
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();
        return view('files.index', ['files' => $files]);
    }

    public function indexfile($idx)
    {
        $id = Crypt::decrypt($idx);        
        $fileGroup = 'TRFILE';
        $files = File::where('file_group','=',$fileGroup)
        ->where('file_id','=',$id)->get();
        $nm_training = Training_plan::find($id);
        return view('files.indexfile',
        ['files' => $files,
        'training_id'=>$idx,
        'training_plan'=>$id,
        'nama_training'=>$nm_training->nama_training]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
    }
    public function createfile($idx)
    {
        $id = Crypt::decrypt($idx);
        $fileGroup = 'TRFILE';
        return view('files.createfile',['fileGroup' => $fileGroup,'file_id'=>$id,'training_id'=>$idx]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file_group' => 'required',
            'file_id' => 'required',
            'file_desc' => 'required',
            
        ]);
        $current_timestamp = Carbon::now()->timestamp; 
        $file = $request->file('file');
        $tujuan_upload = env('TASK_UPLOAD');


// SIMPAN FILE
         // for file
         $file = $request->file('file');
         if($file){
            $tujuan_upload = env('FILE_UPLOAD').'/'.$request->file_group;
             $file->move($tujuan_upload,$current_timestamp."___".$file->getClientOriginalName());
             $file_data = new File();
             $file_data->file_group = $request->file_group;
             $file_data->file_id = $request->file_id;
             $file_data->file_real_name = $file->getClientOriginalName();
             $file_data->file_name = $current_timestamp."___".$file->getClientOriginalName();
             $file_data->file_path = $tujuan_upload;
             $file_data->file_size = '0';
             $file_data->file_type = '';
             $file_data->file_desc = $request->file_desc;
             $file_data->update_by = Auth::user()->user_id;
             $file_data->save();
        }
        return redirect()->route('files.indexfile',Crypt::encrypt($request->file_id))->with('success_message', 'Berhasil menambah training_cost baru');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = File::find($id);
        if (!$file) return redirect()->route('files.index')
            ->with('error_message', 'File dengan id' . $id . ' tidak ditemukan');
        return view('files.edit', ['file' => $file]);
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
            'file_group' => 'required',
            'file_id' => 'required',
            'file_real_name' => 'required',
            'file_name' => 'required',
            'file_path' => 'required',
            'file_size' => 'required',
            'file_type' => 'required',
        ]);
        $file = File::find($id);
        $file->file_group = $request->file_group;
        $file->file_id = $request->file_id;
        $file->file_real_name = $request->file_real_name;
        $file->file_name = $request->file_name;
        $file->file_path = $request->file_path;
        $file->file_size = $request->file_size;
        $file->file_type = $request->file_type;
        $file->update_by = Auth::user()->user_id;
        $file->save();
        return redirect()->route('files.index')
            ->with('success_message', 'Berhasil mengubah file');
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
        $file = File::find($id);
        // dd($file);
        if ($file) $file->delete();
        // return redirect()->route('files.index')
        //     ->with('success_message', 'Berhasil menghapus file');
        return redirect()->route('files.indexfile',Crypt::encrypt($file->file_id))->with('success_message', 'Berhasil menambah training_cost baru');

    }


    public function hapusfile($idx){
        $id = Crypt::decrypt($idx);
        $file = File::find($id);
        if ($file) $file->delete();
        return($id);
    }
}
