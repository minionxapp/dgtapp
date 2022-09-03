<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jml_user = User::all()->count();
        $user = User::find(Auth::user()->id);
        $my_task = Task::where('departemen_kode','=',$user->departemen_kode)
        ->where('status','<>','FNS')        
        ->count();
        $departemen_name = Departemen:: where('kode','=',$user->departemen_kode)->first();
        return view('home',['jml_user'=>$jml_user,'my_task'=>$my_task,'departemen_name'=>$departemen_name->nama]);
    }
}
