<?php
namespace App\Helpers;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\Console\Output\ConsoleOutput;
use Illuminate\Support\Facades\Auth;

use App\Models\Departemen;
use App\Models\Divisi;
use App\Models\User;
use App\Models\File;
use App\Models\Lsp_kirim_sertifikat;
use App\Models\Lsp_sertifikat;
use App\Models\Pegawai;

 
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

    public static function HapusFile($idx)
    {
        $id = Crypt::decrypt($idx);
        $file = File::find($id);
    }

    // set nik sertifikat
    public static function SetNikSertifikat(){
        $serti = Lsp_sertifikat::all();
        // dd($sertifikats);
        $output = new ConsoleOutput();
        $i =0;
        // $sertifikats = Helper::SetNikSertifikat();
        foreach ($serti as $sertifikat ) {
            $i++;
            $niks = Pegawai::where('nama_pegawai','=',$sertifikat->nama)->get();
            if($niks->count()==1){
                foreach ($niks as $pegawai) {
                    // $serUpdate = Lsp_sertifikat::find($sertifikat->id);
                    $sertifikat->nip = $pegawai->nip;
                    $sertifikat->save();
                    $output->writeln($i.'= ada==='.$pegawai->nip);
                }
                // $output->writeln($i.'-'.$sertifikat->nama.' jumlah '.$niks->count().'='.$serUpdate->nip);
            }else if($niks->count() >1) {
                $sertifikat->nip = "doble";
                $sertifikat->save();
                $output->writeln($i.'='."                dobel");
                // $output->writeln($i.'-'.$sertifikat->nama.' jumlah '.$niks->count().'='.$serUpdate->nip);
            }else{
                $sertifikat->nip = "NotFound";
                $sertifikat->save();
                $output->writeln($i.'='."       NotFound         ");
            }
        }
        return "selesai";

    }

    public static function KirimSertifikat(){
        $serti = Lsp_sertifikat::where('nip','not like','P%')->get();
        $output = new ConsoleOutput();
        $i=0;
        foreach ($serti as $sertifikat ) {
            $niks = Lsp_kirim_sertifikat::where('nama','=',$sertifikat->nama)->get();
            if($niks->count() >1) {
                $output->writeln($i.'='.$sertifikat->nama.' - dobel');
            }if($niks->count() ==1) {
                $output->writeln($i.'='.$sertifikat->nama.' -       ada');
                foreach ($niks as $pegawai) {
                    // $serUpdate = Lsp_sertifikat::find($sertifikat->id);
                    $sertifikat->nip = $pegawai->nip;
                    $sertifikat->save();
                    $output->writeln($i.'= ada==='.$pegawai->nip);
                }
                // $sertifikat->nip = $niks->nip;
                // $sertifikat->save();
            }else{
                $output->writeln($i.'='.$sertifikat->nama.' -            Kosong');
            }

            $i++;
        }

    }

    
}