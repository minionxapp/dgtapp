<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Param;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // set_time_limit(600);
        $pegawais = Pegawai::take(10)->get();
        // $pegawais = Pegawai::all();//nggak kuat panggil seluruh pegawai
        // $listings=Listing::take(10)->get();
        return view('pegawais.index', compact('pegawais'));
        // return view('pegawais.index',['pegawais' => $pegawais]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pegawais.create', []);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
        ]);
        $pegawai = Pegawai::create([
            'nip' => $request->nip,
            'nip_lengkap' => $request->nip_lengkap,
            'nama_pegawai' => $request->nama_pegawai,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_aktif' => $request->status_aktif,
            'kode_unit' => $request->kode_unit,
            'nama_unit' => $request->nama_unit,
            'unit_tk_1' => $request->unit_tk_1,
            'unit_tk_2' => $request->unit_tk_2,
            'unit_tk_3' => $request->unit_tk_3,
            'jenis_kantor' => $request->jenis_kantor,

            'create_by' => Auth::user()->user_id
        ]);
        //$pegawai = Pegawai::create($array);    

        $pegawai->save();
        return redirect()->route('pegawais.index')->with('success_message', 'Berhasil menambah pegawai baru');
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
        $pegawai = Pegawai::find($id);
        //if($pegawai->create_by == Auth::user()->id ||$userloged->hasRole(['Super-Admin']) == 1){
        if (!$pegawai) return redirect()->route('pegawais.index')
            ->with('error_message', 'Pegawai dengan id' . $id . ' tidak ditemukan');
        return view('pegawais.edit', ['pegawai' => $pegawai,]);
        //}else{
        //    return redirect()->route('pegawais.index')
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
            'nip' => 'required',
        ]);
        $pegawai = Pegawai::find($id);
        $pegawai->nip = $request->nip;
        $pegawai->nip_lengkap = $request->nip_lengkap;
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->status_aktif = $request->status_aktif;
        $pegawai->kode_unit = $request->kode_unit;
        $pegawai->nama_unit = $request->nama_unit;
        $pegawai->unit_tk_1 = $request->unit_tk_1;
        $pegawai->unit_tk_2 = $request->unit_tk_2;
        $pegawai->unit_tk_3 = $request->unit_tk_3;
        $pegawai->jenis_kantor = $request->jenis_kantor;
        $pegawai->update_by = Auth::user()->user_id;
        $pegawai->save();
        return redirect()->route('pegawais.index')
            ->with('success_message', 'Berhasil mengubah pegawai');
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

        $pegawai = Pegawai::find($id);
        if ($pegawai) $pegawai->delete();
        return redirect()->route('pegawais.index')
            ->with('success_message', 'Berhasil menghapus pegawai');
    }





    public function pegawai($nama)
    {
        $pegawais = Pegawai::where('nama_pegawai', 'like', $nama)
            // ->orWhere('nip', 'like', $nama)
            // ->orWhere('nip', '=', $nama)
            ->orderBy('nama_pegawai', 'ASC')->get(['nama_pegawai', 'nip', 'nama_unit', 'id', 'jenis_kantor', 'kode_unit']);
            // dd($pegawais);
        $i = 0;
        $pegawais_new = array();
        foreach ($pegawais as $sertipikat) {
            $pegawais_new[$i]["nama_pegawai"] = $sertipikat->nama_pegawai;
            $pegawais_new[$i]["nip"] = $sertipikat->nip;
            $pegawais_new[$i]["nama_unit"] = $sertipikat->nama_unit;
            $pegawais_new[$i]["id"] = $sertipikat->id;
            $pegawais_new[$i]["jenis_kantor"] = $sertipikat->jenis_kantor;
            $pegawais_new[$i]["kode_unit"] = $sertipikat->kode_unit;
            $pegawais_new[$i]["idx"] = Crypt::encrypt($sertipikat->id);
            // $pegawais_new[$i]["id"] = ($sertipikat->id);
            $i++;
        }
        return json_encode(array('data' => $pegawais_new));
    }
}
