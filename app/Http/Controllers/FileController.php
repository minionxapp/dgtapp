<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\File;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
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
            'file_real_name' => 'required',
            'file_name' => 'required',
            'file_path' => 'required',
            'file_size' => 'required',
            'file_type' => 'required',
        ]);
        $file = File::create([
            'file_group' => $request->file_group,
            'file_id' => $request->file_id,
            'file_real_name' => $request->file_real_name,
            'file_name' => $request->file_name,
            'file_path' => $request->file_path,
            'file_size' => $request->file_size,
            'file_type' => $request->file_type,

            'create_by' => Auth::user()->user_id
        ]);
        //$file = File::create($array);    

        $file->save();
        return redirect()->route('files.index')->with('success_message', 'Berhasil menambah file baru');
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
    public function destroy(Request $request, $id)
    {
        $file = File::find($id);
        if ($file) $file->delete();
        return redirect()->route('files.index')
            ->with('success_message', 'Berhasil menghapus file');
    }
}
