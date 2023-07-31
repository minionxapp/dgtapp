<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Param;
use App\Models\Training_intrainer;
use App\Models\Training_plan;
class Training_intrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $training_intrainers = Training_intrainer::all();
        return view('training_intrainers.index', ['training_intrainers' => $training_intrainers]);
    }

    public function index_trainingid($training_id)
    {
        $id = Crypt::decrypt($training_id);
        $nm_training = Training_plan::find($id);
        $training_intrainers = Training_intrainer::where('training_plan_id','=',$id)->get();;
        $id = Crypt::decrypt($training_id);
        return view('training_intrainers.index', 
        ['training_intrainers' => $training_intrainers,
        'training_plan_id'=>$training_id,
        'training_id'=>$training_id,
        'training_plan'=>$training_id,
        'nm_training'=>$nm_training->nama_training]);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($training_id)
    {
        $internals = Param::where('nama', '=', 'YESNO')->get(['kode', 'desc']);
        $id = Crypt::decrypt($training_id);
        $training_plans = Training_plan::where('id','=',$id)->get();
        return view('training_intrainers.create', [
            'internals' => $internals,
            'training_plan_id'=>$training_id,
            'training_plans'=>$training_plans
        ]);
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
            'training_plan_id' => 'required',
        ]);
        $training_intrainer = Training_intrainer::create([
            'nip' => $request->nip,
            'nama_trainer' => $request->nama_trainer,
            'training_plan_id' => $request->training_plan_id,
            'materi' => $request->materi,
            'catatan' => $request->catatan,
            'internal' => $request->internal,

            'create_by' => Auth::user()->user_id
        ]);
        //$training_intrainer = Training_intrainer::create($array);    

        $training_intrainer->save();
        // return redirect()->route('training_intrainers.index')->with('success_message', 'Berhasil menambah training_intrainer baru');
        return redirect()->route('training_intrainers_index.index',Crypt::encrypt($request->training_plan_id))->with('success_message', 'Berhasil menambah training_cost baru');
 
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
        $internals = Param::where('nama', '=', 'YESNO')->get(['kode', 'desc']);
        $training_intrainer = Training_intrainer::find($id);
        //if($training_intrainer->create_by == Auth::user()->id ||$userloged->hasRole(['Super-Admin']) == 1){
        if (!$training_intrainer) return redirect()->route('training_intrainers.index')
            ->with('error_message', 'Training_intrainer dengan id' . $id . ' tidak ditemukan');
        return view('training_intrainers.edit', [
            'training_intrainer' => $training_intrainer, 'internals' => $internals,
        ]);
        //}else{
        //    return redirect()->route('training_intrainers.index')
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
            'training_plan_id' => 'required',
        ]);
        $training_intrainer = Training_intrainer::find($id);
        $training_intrainer->nip = $request->nip;
        $training_intrainer->nama_trainer = $request->nama_trainer;
        $training_intrainer->training_plan_id = $request->training_plan_id;
        $training_intrainer->materi = $request->materi;
        $training_intrainer->catatan = $request->catatan;
        $training_intrainer->internal = $request->internal;
        $training_intrainer->update_by = Auth::user()->user_id;
        $training_intrainer->save();
        return redirect()->route('training_intrainers.index')
            ->with('success_message', 'Berhasil mengubah training_intrainer');
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

        $training_intrainer = Training_intrainer::find($id);
        if ($training_intrainer) $training_intrainer->delete();
        // return redirect()->route('training_intrainers.index')
        //     ->with('success_message', 'Berhasil menghapus training_intrainer');
        return redirect()->route('training_intrainers_index.index',Crypt::encrypt($training_intrainer->training_plan_id))
        ->with('success_message', 'Berhasil menghapus training_cost baru');
    


    }
}
