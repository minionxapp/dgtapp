<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'id' => 'required',
            'name' => 'required',
            'guard_name' => 'required',
        ]);
        $permission = Permission::create([
            // 'id' => $request->id,
            'name' => $request->name,
            'guard_name' => $request->guard_name,

            'create_by' => Auth::user()->user_id
        ]);
        //$permission = Permission::create($array);    

        $permission->save();
        return redirect()->route('permissions.index')->with('success_message', 'Berhasil menambah permission baru');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        if (!$permission) return redirect()->route('permissions.index')
            ->with('error_message', 'Permission dengan id' . $id . ' tidak ditemukan');
        return view('permissions.edit', ['permission' => $permission]);
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
            'id' => 'required',
            'name' => 'required',
            'guard_name' => 'required',
        ]);
        $permission = Permission::find($id);
        $permission->id = $request->id;
        $permission->name = $request->name;
        $permission->guard_name = $request->guard_name;
        $permission->update_by = Auth::user()->user_id;
        $permission->save();
        return redirect()->route('permissions.index')
            ->with('success_message', 'Berhasil mengubah permission');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $permission = Permission::find($id);
        if ($permission) $permission->delete();
        return redirect()->route('permissions.index')
            ->with('success_message', 'Berhasil menghapus permission');
    }
}
