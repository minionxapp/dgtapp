<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Divisi;
use App\Models\Departemen;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::join('Divisis','users.divisi_kode','=','divisis.kode')
        ->join('Departemens','users.departemen_kode','=','departemens.kode')
        ->get(['users.*', 'divisis.nama as nama_divisi','departemens.nama as nama_departemen']);
     

        // $users = User::all();
        return view('users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisis = Divisi::all();
        $departemens = Departemen::all();
        return view('users.create',['divisis' => $divisis,'departemens'=>$departemens]);
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);
        $array = $request->only([
            'name', 'email', 'password','user_id','divisi_kode','departemen_kode'
        ]);
        $user = User::create([
            'name'=>$request->name, 
            'email'=>$request->email, 
            'password'=>bcrypt($request->password),
            'user_id'=>$request->user_id,
            'divisi_kode'=>$request->divisi_kode,
            'departemen_kode'=>$request->departemen_kode
        ]);
        $user->save();
        // $task = Task::create([
        //     'kode'=>$request->kode,
        //     'nm_project'=>$request->nm_project,
        //     'descripsi'=>$request->descripsi,
        //     'divisi_kode'=>$request->divisi_kode,
        //     'departemen_kode'=>$request->departemen_kode,
        //     'pic'=>$request->pic,
        //     'mulai'=>$request->mulai,
        //     'selesai'=>$request->selesai,
        //     'status'=>$request->status,
        //     'jenis'=>$request->jenis,
        //     'create_by'=>Auth::user()->id.''        
        // ]);
        // $task->save();

        // $array['password'] = bcrypt($array['password']);
        // $user = User::create($array);
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil menambah user baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $divisis = Divisi::all();
        $user = User::find($id);

        // departemens
        $departemens = Departemen::where('divisi_kode','=',$user->divisi_kode)->get(['departemens.kode','departemens.nama']);
        // dd($departemens);
        if (!$user) return redirect()->route('users.index')
            ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');
        return view('users.edit', ['user' => $user,'divisis' => $divisis,'departemens'=>$departemens]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'sometimes|nullable|confirmed'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->user_id = $request->user_id;
        $user->divisi_kode = $request->divisi_kode;
        $user->departemen_kode =$request->departemen_kode;
        if ($request->password) $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil mengubah user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        if ($id == $request->user()->id) return redirect()->route('users.index')
            ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
        if ($user) $user->delete();
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil menghapus user');
    }
}
