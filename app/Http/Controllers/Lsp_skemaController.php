<?php

        namespace App\Http\Controllers;
        
        use Illuminate\Http\Request;
        use Illuminate\Support\Facades\Auth;
        use App\Models\User;
        use Illuminate\Support\Facades\Crypt;
        use App\Models\Param;
        use App\Models\Lsp_skema;
        class Lsp_skemaController extends Controller
        {
            /**
             * Display a listing of the resource.
             *
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
                $lsp_skemas = Lsp_skema::all();
                return view('lsp_skemas.index',['lsp_skemas' => $lsp_skemas]);
            }
              
            /**
             * Show the form for creating a new resource.
             *
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
                
                return view('lsp_skemas.create',[]);
            }

            /**
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
            public function store(Request $request)
            {
                $request->validate([
        'kode_skema'=> 'required',
'nama_skema'=> 'required',
]);
        $lsp_skema = Lsp_skema::create([
        'kode_skema'=> $request->kode_skema,
'nama_skema'=> $request->nama_skema,
'jenis_skema'=> $request->jenis_skema,
'jumlah_unit'=> $request->jumlah_unit,
'sektor'=> $request->sektor,
'bidang'=> $request->bidang,
'kode_unit'=> $request->kode_unit,
'unit_kompetensi'=> $request->unit_kompetensi,

            'create_by'=>Auth::user()->user_id
        ]);
        //$lsp_skema = Lsp_skema::create($array);    
        
        $lsp_skema->save();
        return redirect()->route('lsp_skemas.index')->with('success_message', 'Berhasil menambah lsp_skema baru');
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
           $lsp_skema = Lsp_skema::find($id);
            //if($lsp_skema->create_by == Auth::user()->id ||$userloged->hasRole(['Super-Admin']) == 1){
                if (!$lsp_skema) return redirect()->route('lsp_skemas.index')
                    ->with('error_message', 'Lsp_skema dengan id'.$id.' tidak ditemukan');
                return view('lsp_skemas.edit', ['lsp_skema' => $lsp_skema,]);
            //}else{
            //    return redirect()->route('lsp_skemas.index')
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
        'kode_skema'=> 'required',
'nama_skema'=> 'required',
]);
        $lsp_skema = Lsp_skema::find($id);
$lsp_skema->kode_skema=$request->kode_skema;
$lsp_skema->nama_skema=$request->nama_skema;
$lsp_skema->jenis_skema=$request->jenis_skema;
$lsp_skema->jumlah_unit=$request->jumlah_unit;
$lsp_skema->sektor=$request->sektor;
$lsp_skema->bidang=$request->bidang;
$lsp_skema->kode_unit=$request->kode_unit;
$lsp_skema->unit_kompetensi=$request->unit_kompetensi;
 $lsp_skema->update_by = Auth::user()->user_id;
            $lsp_skema->save();
            return redirect()->route('lsp_skemas.index')
            ->with('success_message', 'Berhasil mengubah lsp_skema');
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
            $user_id =(Auth::user()->id);
            $userloged = User::find($user_id);

            $lsp_skema = Lsp_skema::find($id);
            if ($lsp_skema) $lsp_skema->delete();
            return redirect()->route('lsp_skemas.index')
                ->with('success_message', 'Berhasil menghapus lsp_skema');
        }
        }
    
        