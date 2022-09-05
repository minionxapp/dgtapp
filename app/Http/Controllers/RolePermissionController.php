<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RolePermission;
use Spatie\Permission\Models\Permission;

// use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rolepermissions = RolePermission::join('roles', 'role_has_permissions.role_id', '=', 'roles.id')
            ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->get(['role_has_permissions.*', 'roles.name as role_name', 'permissions.name as permission_name']);


        return view('rolepermissions.index', ['rolepermissions' => $rolepermissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $roles = Role::all();
        return view('rolepermissions.create', ['permissions' => $permissions, 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'permission_id' => 'required',
            'role_id' => 'required',
        ]);
        $role = Role::find($request->role_id);
        $role->givePermissionTo(Permission::find($request->permission_id)->name);
        return redirect()->route('rolepermissions.index')->with('success_message', 'Berhasil menambah rolepermission baru');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $string = $id;
        $array = explode('|', $string);;
        $rolepermission = RolePermission::where('permission_id', '=', $array[0])->where('role_id', '=', $array[1])->first();
        $role = Role::find(($array[1]));

        $permission = Permission::find(($array[0]));
        $role->revokePermissionTo($permission);

        return redirect()->route('rolepermissions.index')
            ->with('success_message', 'Berhasil menghapus rolepermission');
    }
}
