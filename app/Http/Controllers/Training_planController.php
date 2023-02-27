<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Param;
use App\Models\Training_plan;

class Training_planController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $training_plans = Training_plan::
        join('divisis','training_plans.unit_usul','=','divisis.kode')
        ->join('departemens','training_plans.pic_akademi','=','departemens.kode')
        ->join('params','training_plans.pelaksanaan','=','params.kode')
        ->join('params as params2','training_plans.kategori','=','params2.kode')
        ->join('params as paramsLokasi','training_plans.lokasi','=','paramsLokasi.kode')
        ->join('params as paramsJenis','training_plans.jenis','=','paramsJenis.kode')
        ->join('params as paramsStatus','training_plans.status','=','paramsStatus.kode')
        ->where('params.nama', '=', 'TR-PELAKSANA')
        ->get(['training_plans.*','divisis.nama as nama_divisi',
                'departemens.nama as nama_departemen',
                'params.desc as pelaksanaan',
                'params2.desc as kategori',
                'paramsJenis.desc as jenis',
                'paramsLokasi.desc as namalokasi',
                'paramsStatus.desc as status',
            ]);
        return view('training_plans.index', ['training_plans' => $training_plans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelaksanaans = Param::where('nama', '=', 'TR-PELAKSANA')->get(['kode', 'desc']);
        $kategoris = Param::where('nama', '=', 'TR-KATEGORI')->get(['kode', 'desc']);
        $unit_usuls = Divisi::orderBy('kode')->get();;
        $pic_akademis = Departemen::where('divisi_kode', '=', Auth::user()->divisi_kode)->get(['kode', 'nama']);
        $lokasis = Param::where('nama', '=', 'TR-LOKASI')->get(['kode', 'desc']);
        $jeniss = Param::where('nama', '=', 'TR-JENIS')->get(['kode', 'desc']);
        $statuss = Param::where('nama', '=', 'STATUS')->get(['kode', 'desc']);
        
        // dd($pic_akademis);
        return view('training_plans.create', [
            'pelaksanaans' => $pelaksanaans,
            'unit_usuls' => $unit_usuls,
            'pic_akademis' => $pic_akademis,
            'kategoris'=>$kategoris,
            'lokasis'=>$lokasis,
            'jeniss'=>$jeniss,
            'statuss'=>$statuss,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([]);
        $training_plan = Training_plan::create([
            'nama_training' => $request->nama_training,
            'keterangan' => $request->keterangan,
            'pelaksanaan' => $request->pelaksanaan,
            'jml_peserta' => $request->jml_peserta,
            'lokasi' => $request->lokasi,
            'biaya' => trim($request->biaya),
            'jml_kelas' => $request->jml_kelas,
            'durasi' => $request->durasi,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'unit_usul' => $request->unit_usul,
            'jenis'=>$request->jenis,
            'pic_akademi' => $request->pic_akademi,
            'kategori'=>$request->kategori,
            'create_by' => Auth::user()->user_id,
            'status'=>$request->status,
        ]);
        //$training_plan = Training_plan::create($array);    

        $training_plan->save();
        return redirect()->route('training_plans.index')->with('success_message', 'Berhasil menambah training_plan baru');
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
        $kategoris = Param::where('nama', '=', 'TR-KATEGORI')->get(['kode', 'desc']);
        $pelaksanaans = Param::where('nama', '=', 'TR-PELAKSANA')->get(['kode', 'desc']);
        $unit_usuls = Divisi::orderBy('kode')->get();;
        $pic_akademis = Departemen::where('divisi_kode', '=', Auth::user()->divisi_kode)->get(['kode', 'nama']);
        $training_plan = Training_plan::find($id);
        $jeniss=Param::where('nama', '=', 'TR-JENIS')->get(['kode', 'desc']);
        $lokasis = Param::where('nama', '=', 'TR-LOKASI')->get(['kode', 'desc']);
        $statuss = Param::where('nama', '=', 'STATUS')->get(['kode', 'desc']);
        if (!$training_plan) return redirect()->route('training_plans.index')
            ->with('error_message', 'Training_plan dengan id' . $id . ' tidak ditemukan');
        return view('training_plans.edit', [
            'training_plan' => $training_plan, 'pelaksanaans' => $pelaksanaans,
            'unit_usuls' => $unit_usuls,
            'pic_akademis' => $pic_akademis,
            'kategoris'=>$kategoris,
            'lokasis'=>$lokasis,
            'jeniss'=>$jeniss,
            'statuss'=>$statuss,
        ]);
        //}else{
        //    return redirect()->route('training_plans.index')
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
        $request->validate([]);
        $training_plan = Training_plan::find($id);
        $training_plan->nama_training = $request->nama_training;
        $training_plan->keterangan = $request->keterangan;
        $training_plan->pelaksanaan = $request->pelaksanaan;
        $training_plan->jml_peserta = $request->jml_peserta;
        $training_plan->lokasi = $request->lokasi;
        $training_plan->biaya = str_replace(' ', '', trim($request->biaya));
        $training_plan->jml_kelas = $request->jml_kelas;
        $training_plan->durasi = $request->durasi;
        $training_plan->tgl_mulai = $request->tgl_mulai;
        $training_plan->tgl_selesai = $request->tgl_selesai;
        $training_plan->unit_usul = $request->unit_usul;
        $training_plan->pic_akademi = $request->pic_akademi;
        $training_plan->update_by = Auth::user()->user_id;
        $training_plan->kategori = $request->kategori;
        $training_plan->jenis = $request->jenis;
        $training_plan->status=$request->status;

        
        $training_plan->save();
        return redirect()->route('training_plans.index')
            ->with('success_message', 'Berhasil mengubah training_plan');
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

        $training_plan = Training_plan::find($id);
        if ($training_plan) $training_plan->delete();
        return redirect()->route('training_plans.index')
            ->with('success_message', 'Berhasil menghapus training_plan');
    }
}
