<?php
namespace App\Helpers;
// use Illuminate\Foundation\Auth\User;

use App\Models\Departemen;
use App\Models\Divisi;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
 
class Helper {
        public static function jumlahUser()
    {
        return User::count();
    }

    public static function UserLogin()
    {
        $user_id =(Auth::user()->id);
        $userLog = User::where('id','=',$user_id)->get();
        return $userLog ;
    }

    public static function UserLoginDivisi()
    {
        $user_id =(Auth::user()->id);
        $userLog = User::where('id','=',$user_id)->first();
        $userLogDivisi = Divisi::where('kode','=',$userLog->divisi_kode)->get();
        return $userLogDivisi ;
    }

    public static function UserLoginDepartemen()
    {
        $user_id =(Auth::user()->id);
        $userLog = User::where('id','=',$user_id)->first();
        $userLogDepartemen = Departemen::where('kode','=',$userLog->departemen_kode)->get();
        // dd($userLogDepartemen);
        return $userLogDepartemen ;
    }
}