<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserRole;
// use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userroles =UserRole:: join('roles','model_has_roles.role_id','=','roles.id')
        ->join('users','model_has_roles.model_id','=','users.id')
        ->orderBy('users.user_id', 'ASC')
        ->get(['model_has_roles.*','roles.name as role_name','users.user_id as user_id']);
        // $userroles = UserRole::all();
        return view('userroles.index', ['userroles' => $userroles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $roles = Role::all();
        $users = User::all();
        return view('userroles.create',['users'=>$users,'roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required',
            // 'model_type' => 'required',
            'model_id' => 'required',
        ]);
       
        //$userrole = UserRole::create($array); 
        $userrole_cek = UserRole::where('role_id','=',$request->role_id)   
                                    ->where('model_id','=', $request->model_id)->first();
        if  ($userrole_cek){
            return redirect()->route('userroles.create')->with('success_message', 'GAGAL menambah userrole baru');
        }else{
             $userrole = UserRole::create([
                'role_id' => $request->role_id,
                'model_type' => 'App\Models\User',
                'model_id' => $request->model_id,
                // 'create_by' => Auth::user()->user_id
            ]);
            $userrole->save();
            return redirect()->route('userroles.index')->with('success_message', 'Berhasil menambah userrole baru');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $userrole = UserRole::find($id);
        // if (!$userrole) return redirect()->route('userroles.index')
        //     ->with('error_message', 'UserRole dengan id' . $id . ' tidak ditemukan');
        // return view('userroles.edit', ['userrole' => $userrole]);
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
        // $request->validate([
        //     'role_id' => 'required',
        //     'model_type' => 'required',
        //     'model_id' => 'required',
        // ]);
        // $userrole = UserRole::find($id);
        // $userrole->role_id = $request->role_id;
        // $userrole->model_type = $request->model_type;
        // $userrole->model_id = $request->model_id;
        // $userrole->update_by = Auth::user()->user_id;
        // $userrole->save();
        // return redirect()->route('userroles.index')
            // ->with('success_message', 'Berhasil mengubah userrole');
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
        $userrole = UserRole:: where('role_id','=',$array[0])->where('model_id','=',$array[1])->first();
        $user = User::find($array[1]);
        $role = Role::find($array[0]);
        if ($userrole) $user->removeRole($role->name);
        // if ($userrole) $userrole->delete();
        return redirect()->route('userroles.index')
            ->with('success_message', 'Berhasil menghapus User Role');
    }
}
