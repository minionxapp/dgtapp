<?php

namespace App\Http\Controllers;

use App\Exports\PesertaExport;
use App\Imports\PesertaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Param;
use App\Models\Training_plan_peserta;
use App\Models\Training_plan;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class Training_plan_pesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idx)

    {
        $id = Crypt::decrypt($idx);
        $nama_training = Training_plan::find($id);
        $training_plan_pesertas = Training_plan_peserta::join('pegawais', 'training_plan_pesertas.nik', '=', 'pegawais.nip')
            // ->join('training_plans','training_plan_pesertas.training_plan_id','=','training_plans.id')
            ->where('training_plan_id', '=', $id)
            ->get([
                'training_plan_pesertas.*',
                'pegawais.nama_pegawai as nama_pegawai',
                //   'training_plans.nama_training as nama_training'
            ]);
        return view(
            'training_plan_pesertas.index',
            [
                'training_plan' => $idx,
                'training_id'=>$idx,
                'training_plan_pesertas' => $training_plan_pesertas,
                'nama_training' => $nama_training->nama_training
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idx)
    {
        $id = Crypt::decrypt($idx);
        $training = Training_plan::find($id);
        return view('training_plan_pesertas.create', ['training_plan_id' => $id, 'idx' => $idx, 'training' => $training]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'training_plan_id' => 'required',
            'nik' => 'required',
        ]);
        // $training_plan_peserta = Training_plan_peserta::create([
        //     'training_plan_id' => $request->training_plan_id,
        //     'nik' => $request->nik,
        //     'status_peserta' => $request->status_peserta,
        //     'keterangan' => $request->keterangan,
        //     'create_by' => Auth::user()->user_id,
        //     'niks' => $request->niks,
        // ]);

        // if ($request->niks =='on'){
        $arr = explode(',', $request->nik);
        // return $arr[0].'-'.$arr[1];
        $arrx = '';
        for ($i = 0; $i < count($arr); $i++) {

            $arrx = $arrx . ',' . $arr[$i];
            $peserta_cek = Training_plan_peserta::where('training_plan_id', '=', $request->training_plan_id)
                ->Where('nik', '=', $arr[$i])->first();
            // dd($peserta_cek);
            if ($peserta_cek === null) {
                $training_plan_peserta = Training_plan_peserta::create([
                    'training_plan_id' => $request->training_plan_id,
                    'nik' => strtoupper($arr[$i]),
                    'status_peserta' => $request->status_peserta,
                    'keterangan' => $request->keterangan,
                    'create_by' => Auth::user()->user_id,
                    'niks' => $request->niks,
                ]);
                $training_plan_peserta->save();
            }
        }

        // return $arrx;
        // }
        // else {
        //     // Cek peserta sudah dalam daftar atau belum
        //     $training_plan_peserta->save();
        // }
        return redirect()->route('training_plan_pesertas.index', Crypt::encrypt($request->training_plan_id))->with('success_message', 'Berhasil menambah training_plan_peserta baru');
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
        $training_plan_peserta = Training_plan_peserta::find($id);
        //if($training_plan_peserta->create_by == Auth::user()->id ||$userloged->hasRole(['Super-Admin']) == 1){
        if (!$training_plan_peserta) return redirect()->route('training_plan_pesertas.index')
            ->with('error_message', 'Training_plan_peserta dengan id' . $id . ' tidak ditemukan');
        return view('training_plan_pesertas.edit', ['training_plan_peserta' => $training_plan_peserta,]);
        //}else{
        //    return redirect()->route('training_plan_pesertas.index')
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
            'training_plan_id' => 'required',
            'nik' => 'required',
        ]);
        $training_plan_peserta = Training_plan_peserta::find($id);
        $training_plan_peserta->training_plan_id = $request->training_plan_id;
        $training_plan_peserta->nik = $request->nik;
        $training_plan_peserta->status_peserta = $request->status_peserta;
        $training_plan_peserta->keterangan = $request->keterangan;
        $training_plan_peserta->update_by = Auth::user()->user_id;
        $training_plan_peserta->save();
        return redirect()->route('training_plan_pesertas.index')
            ->with('success_message', 'Berhasil mengubah training_plan_peserta');
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

        $training_plan_peserta = Training_plan_peserta::find($id);
        if ($training_plan_peserta) $training_plan_peserta->delete();
        // return redirect()->route('training_plan_pesertas.index')
        //     ->with('success_message', 'Berhasil menghapus training_plan_peserta');

        return redirect()->route('training_plan_pesertas.index', Crypt::encrypt($training_plan_peserta->training_plan_id))
            ->with('success_message', 'Berhasil menghapus');
    }

    public function CekPeserta($nik, $idTraining)
    {
        DB::enableQueryLog();
        $arr = explode(',', $nik);
        $usulTraining = Training_plan::find(Crypt::decrypt($idTraining));
        // training yang telah diambil
        // $lastTraining  = Training_plan_peserta::
        // leftjoin('training_plans','training_plan_pesertas.training_plan_id','=','training_plans.id')
        // ->whereIn('nik',$arr)
        // ->whereDate('training_plans.tgl_selesai','<',''.$usulTraining->tgl_mulai.'')
        // ->get(['training_plan_pesertas.*','training_plans.*']);
        // return $nik."================".$lastTraining;

        $hasil = [];
        for ($i = 0; $i < count($arr); $i++) {
            $lastTraining  = Training_plan_peserta::leftjoin('training_plans', 'training_plan_pesertas.training_plan_id', '=', 'training_plans.id')
            ->where('nik','=',$arr[$i])
            ->whereDate('training_plans.tgl_selesai', '<', '' . $usulTraining->tgl_mulai . '')
            ->orderBy('training_plans.tgl_selesai', 'DESC')
            ->first(['training_plan_pesertas.training_plan_id','training_plan_pesertas.nik',
             'training_plans.nama_training','training_plans.tgl_mulai',
             'training_plans.tgl_selesai']);
            //  if ($lastTraining) {
            //      $hasil[$i]='{"'.$arr[$i].'":'.$lastTraining .'}';
            //     # code...
            //  }else{
            //     $hasil[$i]=$arr[$i].':{}' ;
            //  }
        }

        return $hasil;
    }
    
    public function ExportPeserta($idTraining)
    {
        return Excel::download(new PesertaExport($idTraining), 'peserta_training.xlsx');
    }

    public function ImportPeserta(Request $request,$idTraining) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_siswa',$nama_file);
 
		// import data
		Excel::import(new PesertaImport($idTraining), public_path('/file_siswa/'.$nama_file));
		// notifikasi dengan session
		Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
        return redirect()->route('training_plan_pesertas.index', 
        $idTraining)->with('success_message', 'Berhasil menambah peserta baru');



	}
}
