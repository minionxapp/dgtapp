<?php


namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Divisi;
use App\Models\File;
use App\Models\Param;
use App\Models\Seq;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
// use Illuminate\Foundation\Auth\User;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Log\Logger;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id =(Auth::user()->id);
        $userloged = User::find($user_id);
        if($userloged->hasRole(['Admin', 'Super-Admin'])){
            $tasks = Task::join('Divisis','tasks.divisi_kode','=','divisis.kode')
            ->join('Departemens','tasks.departemen_kode','=','departemens.kode')
            ->join('Params','tasks.status','=','params.kode')
            ->join('Params as jns','tasks.jenis','=','jns.kode')
            ->get(['tasks.*', 'divisis.nama as nama_divisi','departemens.nama as nama_departemen',
            'params.desc as status_desc','jns.desc as jenis_desc']);

        }else{
            $tasks = Task::join('Divisis','tasks.divisi_kode','=','divisis.kode')
            ->join('Departemens','tasks.departemen_kode','=','departemens.kode')
            ->join('Params','tasks.status','=','params.kode')
            ->join('Params as jns','tasks.jenis','=','jns.kode')
            ->where('tasks.departemen_kode','=',$userloged->departemen_kode)
            ->get(['tasks.*', 'divisis.nama as nama_divisi','departemens.nama as nama_departemen',
            'params.desc as status_desc','jns.desc as jenis_desc']);
        }
        // $userloged->hasRole(['Super-Admin']) 


        return view('tasks.index',['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id =(Auth::user()->id);
        $userloged = User::find($user_id);

        $tasks = Task::all();
        $user = Auth::user();
        
        
        if($userloged->hasRole(['Admin', 'Super-Admin'])){
            $divisis = Divisi::All();
            $departemens = Departemen::all();
        }else{
            $divisis =Divisi::where('kode','=',$userloged->divisi_kode)->get();
            $departemens = Departemen::where('kode','=',$userloged->departemen_kode)->get();
        }
        
        $params = Param::where('nama','=','STATUS')->get(['kode','desc']);
        $paramjenis= Param::where('nama','=','JENIS')->get(['kode','desc']);



        return view('tasks.create',['tasks' => $tasks,'divisis'=>$divisis,
        'departemens'=>$departemens,'user'=>$user,'params'=>$params,'paramjenis'=>$paramjenis]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'kode' => 'required',
            'nm_project' => 'required',
            'divisi_kode' => 'required',
            'departemen_kode'=>'required',
            'status'=>'required',
            'jenis'=>'required'
        ]);

        $seq = Seq::where('seqname','=','TASK')->where('tahun','=', date("Y"))->first();
        $current_timestamp = Carbon::now()->timestamp; 
        $seq2= Seq::where('seqvalue','=',$seq->seqvalue)->first();
        // return $seq2;
        if($seq2) {
            $seq2->seqvalue = $current_timestamp;
            $seq2->nilai = $seq->nilai+1;
            $seq2->save();
        }
        $kode = $request->departemen_kode.'-'.$seq2->tahun.'-'.$seq2->nilai;
        $task = Task::create([
            'kode'=>$kode,//$request->kode,
            'nm_project'=>$request->nm_project,
            'descripsi'=>$request->descripsi,
            'divisi_kode'=>$request->divisi_kode,
            'departemen_kode'=>$request->departemen_kode,
            'pic'=>$request->pic,
            'mulai'=>$request->mulai,
            'selesai'=>$request->selesai,
            'status'=>$request->status,
            'jenis'=>$request->jenis,
            'create_by'=>Auth::user()->id.''        
        ]);
        $task->save();

        // SIMPAN FILE
         // for file
         $file = $request->file('file');
         $tujuan_upload = env('TASK_UPLOAD');
         $file->move($tujuan_upload,$current_timestamp."___".$file->getClientOriginalName());
         
        $file_data = new File();
        $file_data->file_group = 'TASK';
        $file_data->file_id = $kode;
        $file_data->file_real_name = $file->getClientOriginalName();
        $file_data->file_name = $current_timestamp."___".$file->getClientOriginalName();
        $file_data->file_path = $tujuan_upload;
        $file_data->file_size = '0';
        $file_data->file_type = '';
        $file_data->update_by = Auth::user()->user_id;
        $file_data->save();
        return redirect()->route('tasks.index')
            ->with('success_message', 'Berhasil menambah Task  baru :'.$kode);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($idx)
    {
        $id = Crypt::decrypt($idx);
        $user_id =(Auth::user()->id);
        $userloged = User::find($user_id);

        if($userloged->hasRole(['Admin', 'Super-Admin'])){
            $divisis = Divisi::All();
            $departemens = Departemen::all();
        }else{
            $divisis =Divisi::where('kode','=',$userloged->divisi_kode)->get();
            $departemens = Departemen::where('kode','=',$userloged->departemen_kode)->get();
        }
        
        $user = Auth::user();
        $params = Param::where('nama','=','STATUS')->get(['kode','desc']);
        $paramjenis= Param::where('nama','=','JENIS')->get(['kode','desc']);
        $task = Task::find($id);

        // edit hanya untuk user yang buat dan super-admin
        if($task->create_by == Auth::user()->id ||$userloged->hasRole(['Super-Admin']) == 1){
            if (!$task) return redirect()->route('tasks.index')
                ->with('error_message', 'Divisi dengan id'.$id.' tidak ditemukan');
            // files
            $files = File::where('file_id','=',$task->kode)->get();
            return view('tasks.edit', ['task' => $task,'departemens'=>$departemens,'divisis'=>$divisis,'task'=>$task,
            'user'=>$user,'params'=>$params,'paramjenis'=>$paramjenis,'files'=>$files]);

        }else{
            return redirect()->route('tasks.index')
            ->with('error_message', 'And tidak berhak untuk meng edit data ini');

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'kode' => 'required',
            'nm_project' => 'required',
            'divisi_kode' => 'required',
            'departemen_kode'=>'required',
            'status'=>'required',
            'jenis'=>'required'
            
        ]);
        //cek jika sudah ada file nya
        $filed= File::where('file_id','=',$request->kode)->first();
        if($filed){
            // $file->move($tujuan_upload env('TASK_UPLOAD');
            rename(env('TASK_UPLOAD').'/'.$filed->file_name, env('TASK_UPLOAD').'/'.'deleted/'.'_deleted_'.$filed->file_id.'_'.$filed->file_name);
            
            // $bb=  Storage::rename( $destination, $newdestination ); 
            $filed->delete();
        }
        
        $current_timestamp = Carbon::now()->timestamp; 
        $file = $request->file('file');
        if ($file){
            // $tujuan_upload = 'upload/task';
            $file->move(env('TASK_UPLOAD'),$current_timestamp."___".$file->getClientOriginalName());
            
            $file_data = new File();
            $file_data->file_group = 'TASK';
            $file_data->file_id = $request->kode;
            $file_data->file_real_name = $file->getClientOriginalName();
            $file_data->file_name = $current_timestamp."___".$file->getClientOriginalName();
            $file_data->file_path = env('TASK_UPLOAD');
            $file_data->file_size = '0';
            $file_data->file_type = '';
            $file_data->update_by = Auth::user()->user_id;
            $file_data->save();

        }

        $task = Task::find($id);
        $task->kode = $request->kode;
        $task->nm_project = $request->nm_project;
        $task->descripsi = $request->descripsi;
        $task->divisi_kode = $request->divisi_kode;
        $task->departemen_kode = $request->departemen_kode;
        $task->pic = $request->pic;
        $task->mulai = $request->mulai;
        $task->selesai = $request->selesai;
        $task->status = $request->status;
        $task->jenis = $request->jenis;
        $task->update_by = Auth::user()->id.'';
        $task->save();
        return redirect()->route('tasks.index')
            ->with('success_message', 'Berhasil mengubah user');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $idx)
    {
        $id = Crypt::decrypt($idx);
        // yang bisa delete yang buat atau super-admin
        $task = Task::find($id);
        $user_id =(Auth::user()->id);
        $userloged = User::find($user_id);
        if($task->create_by == Auth::user()->id ||$userloged->hasRole(['Super-Admin']) == 1){
                    if ($task) $task->delete();
                    return redirect()->route('tasks.index')
                        ->with('success_message', 'Berhasil menghapus task');
        }
        else{
            return redirect()->route('tasks.index')
            ->with('error_message', 'And tidak berhak untuk meng hapus data ini');

        }
    }

    public function simpanFile(Request $request){
        // dd($request);
        // Log::info('ddddd'.$request);
        $file = $request->file('file');
        //  $file->getClientOriginalExtension();
        //  $file->getRealPath();
        //  $file->getSize();
        //  $file->getMimeType();
         // // isi dengan nama folder tempat kemana file diupload
         $tujuan_upload = env('TASK_UPLOAD').'/';
         $current_timestamp = Carbon::now()->timestamp; 
         $file->move($tujuan_upload,$current_timestamp."___".$file->getClientOriginalName());
         
        return 'sssssss';
    }
}
