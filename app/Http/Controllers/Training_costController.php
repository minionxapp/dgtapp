<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Param;
use App\Models\Training_cost;
use App\Models\Training_plan;

class Training_costController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $training_costs = Training_cost::all();
        return view('training_costs.index', ['training_costs' => $training_costs]);
    }
    public function index_trainingid($training_id)
    {
        $id = Crypt::decrypt($training_id);
        $nm_training = Training_plan::find($id);
        $training_costs = Training_cost::where('training_plan_id','=',$id)->get();
        
        return view('training_costs.index',
        ['training_costs' => $training_costs,
        'training_plan'=>$training_id,
        'training_id'=>$training_id,
        'training_plan_id'=>$training_id,
        'nm_training'=>$nm_training->nama_training]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($training_id)
    {
        $kategori_biayas = Param::where('nama', '=', 'YESNO')->get(['kode', 'desc']);
        $id = Crypt::decrypt($training_id);
        $training_plans = Training_plan::where('id','=',$id)->get();
        return view('training_costs.create', [
            'kategori_biayas' => $kategori_biayas,
            'training_plan_id'=>$training_id,'training_plans'=>$training_plans
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
        $training_cost = Training_cost::create([
            'training_plan_id' => $request->training_plan_id,
            'ket_biaya' => $request->ket_biaya,
            'biaya' => $request->biaya,
            'kategori_biaya' => $request->kategori_biaya,
            'create_by' => Auth::user()->user_id
        ]);
        $training_cost->save();
        return redirect()->route('training_costs_index.index',Crypt::encrypt($request->training_plan_id))->with('success_message', 'Berhasil menambah training_cost baru');
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
        $kategori_biayas = Param::where('nama', '=', 'YESNO')->get(['kode', 'desc']);
        $training_cost = Training_cost::find($id);
        //if($training_cost->create_by == Auth::user()->id ||$userloged->hasRole(['Super-Admin']) == 1){
        if (!$training_cost) return redirect()->route('training_costs.index')
            ->with('error_message', 'Training_cost dengan id' . $id . ' tidak ditemukan');
        return view('training_costs.edit', [
            'training_cost' => $training_cost, 'kategori_biayas' => $kategori_biayas,
        ]);
        //}else{
        //    return redirect()->route('training_costs.index')
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
        $training_cost = Training_cost::find($id);
        $training_cost->training_plan_id = $request->training_plan_id;
        $training_cost->ket_biaya = $request->ket_biaya;
        $training_cost->biaya = $request->biaya;
        $training_cost->kategori_biaya = $request->kategori_biaya;
        $training_cost->update_by = Auth::user()->user_id;
        $training_cost->save();
        // return redirect()->route('training_costs.index')
        //     ->with('success_message', 'Berhasil mengubah training_cost');

            return redirect()->route('training_costs_index.index',Crypt::encrypt($request->training_plan_id))->with('success_message', 'Berhasil menambah training_cost baru');

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
        // $userloged = User::find($user_id);

        $training_cost = Training_cost::find($id);
        if ($training_cost) $training_cost->delete();
        return redirect()->route('training_costs_index.index',Crypt::encrypt($training_cost->training_plan_id))->with('success_message', 'Berhasil menghapus training_cost baru');
    }
}
