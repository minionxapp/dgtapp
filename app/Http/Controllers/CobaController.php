<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Param;
use App\Models\Coba;
use Carbon\Carbon;
use App\Models\File;

class CobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cobas = Coba::all();
        return view('cobas.index', ['cobas' => $cobas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pilihans = Param::where('nama', '=', 'STATUS')->get(['kode', 'desc']);

        return view('cobas.create', [
            'pilihans' => $pilihans,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'tanggal' => 'required',
        ]);
        $coba = Coba::create([
            'teks' => $request->teks,
            'tanggal' => $request->tanggal,
            'pilihan' => $request->pilihan,

            'create_by' => Auth::user()->user_id
        ]);
        //$coba = Coba::create($array);  
        
        // SIMPAN FILE
         // for file
          $tujuan_upload = env('TASK_UPLOAD');
         $current_timestamp = Carbon::now()->timestamp; 
        $i=0;
         if($request->hasfile('files'))
         {
            foreach($request->file('files') as $file)
            {
                $i++;
                $name = time().'.'.$file->extension();
                $file->move($tujuan_upload,$current_timestamp."___".$file->getClientOriginalName());
                
                $file_data = new File();
                $file_data->file_group = 'COBA';
                // $file_data->file_id = $coba->id.'-'.$i;
                $file_data->file_id = 'COBA'.$coba->id;
                $file_data->file_real_name = $file->getClientOriginalName();
                $file_data->file_name = $current_timestamp."___".$file->getClientOriginalName();
                $file_data->file_path = $tujuan_upload;
                $file_data->file_size = '0';
                $file_data->file_type = '';
                $file_data->create_by = Auth::user()->user_id;
                // $file_data->update_by = Auth::user()->user_id;
                $file_data->save();
            }
         }



        //  $file = $request->file('files');

        //  dd($file);
        //  $file->move($tujuan_upload,$current_timestamp."___".$file->getClientOriginalName());
         
        // $file_data = new File();
        // $file_data->file_group = 'TASK';
        // $file_data->file_id = $kode;
        // $file_data->file_real_name = $file->getClientOriginalName();
        // $file_data->file_name = $current_timestamp."___".$file->getClientOriginalName();
        // $file_data->file_path = $tujuan_upload;
        // $file_data->file_size = '0';
        // $file_data->file_type = '';
        // $file_data->update_by = Auth::user()->user_id;
        // $file_data->save();

        // $coba->save();
        return redirect()->route('cobas.index')->with('success_message', 'Berhasil menambah coba baru');
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
        $pilihans = Param::where('nama', '=', 'STATUS')->get(['kode', 'desc']);
        $coba = Coba::find($id);
        $files = File::where('file_id','=','COBA'.$coba->id)->get();
        //if($coba->create_by == Auth::user()->id ||$userloged->hasRole(['Super-Admin']) == 1){
        if (!$coba) return redirect()->route('cobas.index')
            ->with('error_message', 'Coba dengan id' . $id . ' tidak ditemukan');
        return view('cobas.edit', [
            'coba' => $coba, 'pilihans' => $pilihans,'files'=>$files
        ]);
        //}else{
        //    return redirect()->route('cobas.index')
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
        $request->validate([
            'tanggal' => 'required',
        ]);
        $coba = Coba::find($id);
        $coba->teks = $request->teks;
        $coba->tanggal = $request->tanggal;
        $coba->pilihan = $request->pilihan;
        $coba->update_by = Auth::user()->user_id;
        $coba->save();
        return redirect()->route('cobas.index')
            ->with('success_message', 'Berhasil mengubah coba');
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

        $coba = Coba::find($id);
        if ($coba) $coba->delete();
        return redirect()->route('cobas.index')
            ->with('success_message', 'Berhasil menghapus coba');
    }

    public function hapusfile($idx){
        // dd("qqqqqqqqqqqqqqqqqq".$idx);
        $id = Crypt::decrypt($idx);
        return('coba hapus file '.$id);
    }


}
