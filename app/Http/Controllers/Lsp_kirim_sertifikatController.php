<?php

        namespace App\Http\Controllers;
        
        use Illuminate\Http\Request;
        use Illuminate\Support\Facades\Auth;
        use App\Models\User;
        use Illuminate\Support\Facades\Crypt;
        use App\Models\Param;
        use App\Models\Lsp_kirim_sertifikat;
        class Lsp_kirim_sertifikatController extends Controller
        {
            /**
             * Display a listing of the resource.
             *
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
                $lsp_kirim_sertifikats = Lsp_kirim_sertifikat::all();
                return view('lsp_kirim_sertifikats.index',['lsp_kirim_sertifikats' => $lsp_kirim_sertifikats]);
            }
              
            /**
             * Show the form for creating a new resource.
             *
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
                
                return view('lsp_kirim_sertifikats.create',[]);
            }

            /**
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
            public function store(Request $request)
            {
                $request->validate([
        ]);
        $lsp_kirim_sertifikat = Lsp_kirim_sertifikat::create([
        'nama'=> $request->nama,
'nip'=> $request->nip,

            'create_by'=>Auth::user()->user_id
        ]);
        //$lsp_kirim_sertifikat = Lsp_kirim_sertifikat::create($array);    
        
        $lsp_kirim_sertifikat->save();
        return redirect()->route('lsp_kirim_sertifikats.index')->with('success_message', 'Berhasil menambah lsp_kirim_sertifikat baru');
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
           $lsp_kirim_sertifikat = Lsp_kirim_sertifikat::find($id);
            //if($lsp_kirim_sertifikat->create_by == Auth::user()->id ||$userloged->hasRole(['Super-Admin']) == 1){
                if (!$lsp_kirim_sertifikat) return redirect()->route('lsp_kirim_sertifikats.index')
                    ->with('error_message', 'Lsp_kirim_sertifikat dengan id'.$id.' tidak ditemukan');
                return view('lsp_kirim_sertifikats.edit', ['lsp_kirim_sertifikat' => $lsp_kirim_sertifikat,]);
            //}else{
            //    return redirect()->route('lsp_kirim_sertifikats.index')
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
        ]);
        $lsp_kirim_sertifikat = Lsp_kirim_sertifikat::find($id);
$lsp_kirim_sertifikat->nama=$request->nama;
$lsp_kirim_sertifikat->nip=$request->nip;
 $lsp_kirim_sertifikat->update_by = Auth::user()->user_id;
            $lsp_kirim_sertifikat->save();
            return redirect()->route('lsp_kirim_sertifikats.index')
            ->with('success_message', 'Berhasil mengubah lsp_kirim_sertifikat');
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

            $lsp_kirim_sertifikat = Lsp_kirim_sertifikat::find($id);
            if ($lsp_kirim_sertifikat) $lsp_kirim_sertifikat->delete();
            return redirect()->route('lsp_kirim_sertifikats.index')
                ->with('success_message', 'Berhasil menghapus lsp_kirim_sertifikat');
        }
        }
    
        