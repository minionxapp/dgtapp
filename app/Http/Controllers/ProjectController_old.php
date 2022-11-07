<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Param;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jeniss = Param::where('nama','=','JENIS')->get();
        $divisi_kodes = [];
        $departemen_kodes = [];
        $unit_reqs = [];
        $divisi_assigntos = [];
        $dept_assigntos = [];

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
            'jenis' => 'required',
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
        // $user_id =(Auth::user()->id);
        // $userloged = User::find($user_id);
        $jeniss =  Param::where('nama','=','JENIS')->get();;
        $divisi_kodes = Divisi::all();
        $departemen_kodes = [];
        $unit_reqs = [];
        $divisi_assigntos = [];
        $dept_assigntos = [];
        $project = Project::find($id);
        //if($project->create_by == Auth::user()->id ||$userloged->hasRole(['Super-Admin']) == 1){
        if (!$project) return redirect()->route('projects.index')
            ->with('error_message', 'Project dengan id' . $id . ' tidak ditemukan');
        return view('projects.edit', [
            'project' => $project, 'jeniss' => $jeniss,
            'divisi_kodes' => $divisi_kodes,
            'departemen_kodes' => $departemen_kodes,
            'unit_reqs' => $unit_reqs,
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
            'jenis' => 'required',
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
