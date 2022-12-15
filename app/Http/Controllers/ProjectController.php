<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Param;
use App\Models\Project;
use App\Helpers\Helper;
use Carbon\Carbon;
use App\Models\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisi_kodes = Helper::UserLoginDivisi();
        $departemen_kodes = Helper::UserLoginDepartemen();

        // return $departemen_kodes ;
        $projects = Project::all();
        $projects = Project::join('divisis','projects.divisi_kode','=','divisis.kode')
        ->leftjoin('departemens','projects.departemen_kode','=','departemens.kode')
        ->leftjoin('divisis as unit_req','projects.unit_req','=','unit_req.kode' )
        ->join('params','projects.jenis','=','params.kode')
        ->where('projects.departemen_kode','=', $departemen_kodes[0]->kode)
        ->where('projects.divisi_kode','=', $divisi_kodes[0]->kode)
        ->get(['projects.*','divisis.nama as nama_divisi',
        'departemens.nama as nama_departemen',
        'unit_req.nama as nama_unit_req',
        'params.desc as param_jenis'
    ]);

        // dd($projects);
        return view('projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jeniss = Param::where('nama', '=', 'JENIS')->get(['kode', 'desc']);
        // $divisi_kodes = Param::where('nama', '=', 'YESNO')->get(['kode', 'desc']);
        $divisi_kodes = Helper::UserLoginDivisi();
        $departemen_kodes = Helper::UserLoginDepartemen(); //Param::where('nama', '=', 'YESNO')->get(['kode', 'desc']);
        // $unit_reqs = Param::where('nama', '=', 'YESNO')->get(['kode', 'desc']);
        $unit_reqs = Divisi::all();
        $divisi_assigntos = Param::where('nama', '=', 'YESNO')->get(['kode', 'desc']);
        $dept_assigntos = Param::where('nama', '=', 'YESNO')->get(['kode', 'desc']);

        return view('projects.create', [
            'jeniss' => $jeniss,
            'divisi_kodes' => $divisi_kodes,
            'departemen_kodes' => $departemen_kodes,
            'unit_reqs' => $unit_reqs,
            'divisi_assigntos' => $divisi_assigntos,
            'dept_assigntos' => $dept_assigntos,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
        ]);
        $project = Project::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'divisi_kode' => $request->divisi_kode,
            'departemen_kode' => $request->departemen_kode,
            'unit_req' => $request->unit_req,
            'pic_req' => $request->pic_req,
            'keterangan' => $request->keterangan,
            'file01' => $request->file01,
            'file02' => $request->file02,
            'gambar' => $request->gambar,
            'start_plan' => $request->start_plan,
            'end_plan' => $request->end_plan,
            'divisi_assignto' => $request->divisi_assignto,
            'dept_assignto' => $request->dept_assignto,
            'file_desc01' => $request->file_desc01,
            'file_uri01' => $request->file_uri01,
            'file_desc02' => $request->file_desc02,
            'file_uri02' => $request->file_uri02,
            'pic_assignto' => $request->pic_assignto,

            'create_by' => Auth::user()->user_id
        ]);
        //$project = Project::create($array);    
        $project->save();


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
                $file_data->file_group = 'PROJECT';
                // $file_data->file_id = $coba->id.'-'.$i;
                $file_data->file_id = 'PROJECT'.$project->id;
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




        return redirect()->route('projects.index')->with('success_message', 'Berhasil menambah project baru');
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
        $user_id =(Auth::user()->id);
        $userloged = User::find($user_id);
        // $unit_reqs = Param::where('nama', '=', 'YESNO')->get(['kode', 'desc']);
        // $divisi_assigntos = Param::where('nama', '=', 'YESNO')->get(['kode', 'desc']);
        // $dept_assigntos = Param::where('nama', '=', 'YESNO')->get(['kode', 'desc']);


        $jeniss = Param::where('nama', '=', 'JENIS')->get(['kode', 'desc']);
        $divisi_kodes = Helper::UserLoginDivisi();
        $departemen_kodes = Helper::UserLoginDepartemen();
        $unit_reqs = Divisi::all();

        $files = File::where('file_id','=','PROJECT'.$id)->get();
        $divisi_assigntos = Param::where('nama', '=', 'YESNO')->get(['kode', 'desc']);
        $dept_assigntos = Param::where('nama', '=', 'YESNO')->get(['kode', 'desc']);



        $project = Project::find($id);
        //if($project->create_by == Auth::user()->id ||$userloged->hasRole(['Super-Admin']) == 1){
        if (!$project) return redirect()->route('projects.index')
            ->with('error_message', 'Project dengan id' . $id . ' tidak ditemukan');
        return view('projects.edit', [
            'project' => $project, 'jeniss' => $jeniss,
            'divisi_kodes' => $divisi_kodes,
            'departemen_kodes' => $departemen_kodes,
            'unit_reqs' => $unit_reqs,
            'files'=>$files,
            'divisi_assigntos' => $divisi_assigntos,
            'dept_assigntos' => $dept_assigntos,
        ]);
        //}else{
        //    return redirect()->route('projects.index')
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
            'kode' => 'required',
            'nama' => 'required',
        ]);
        $project = Project::find($id);
        $project->kode = $request->kode;
        $project->nama = $request->nama;
        $project->jenis = $request->jenis;
        $project->divisi_kode = $request->divisi_kode;
        $project->departemen_kode = $request->departemen_kode;
        $project->unit_req = $request->unit_req;
        $project->pic_req = $request->pic_req;
        $project->keterangan = $request->keterangan;
        $project->file01 = $request->file01;
        $project->file02 = $request->file02;
        $project->gambar = $request->gambar;
        $project->start_plan = $request->start_plan;
        $project->end_plan = $request->end_plan;
        $project->divisi_assignto = $request->divisi_assignto;
        $project->dept_assignto = $request->dept_assignto;
        $project->file_desc01 = $request->file_desc01;
        $project->file_uri01 = $request->file_uri01;
        $project->file_desc02 = $request->file_desc02;
        $project->file_uri02 = $request->file_uri02;
        $project->pic_assignto = $request->pic_assignto;
        $project->update_by = Auth::user()->user_id;
        $project->save();



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
                $file_data->file_group = 'PROJECT';
                // $file_data->file_id = $coba->id.'-'.$i;
                $file_data->file_id = 'PROJECT'.$project->id;
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



        return redirect()->route('projects.index')
            ->with('success_message', 'Berhasil mengubah project');
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

        $project = Project::find($id);
        if ($project) $project->delete();
        return redirect()->route('projects.index')
            ->with('success_message', 'Berhasil menghapus project');
    }
}
