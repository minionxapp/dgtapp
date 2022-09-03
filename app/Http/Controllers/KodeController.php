<?php

namespace App\Http\Controllers;

use App\Models\Kode;
use App\Models\Kolom;
use App\Models\Tabel;
use Illuminate\Http\Request;

class KodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $tabel = Tabel::find($id);
        $koloms = KodeController::makeController($tabel);
        return $koloms;
    }


    public  function makeController($id)
    {
        $tabel = Tabel::find($id);
        $koloms = Kolom::where('nama_tabel', '=', $tabel->nama)->get();
        $x = '<?php

        namespace App\Http\Controllers;
        
        use Illuminate\Http\Request;
        use Illuminate\Support\Facades\Auth;
        use App\Models\User;
        use Illuminate\Support\Facades\Crypt;
        ';
        $x = $x . 'use App\Models\\' . $tabel->nama . ';
        class ' . $tabel->nama . 'Controller extends Controller
        {
            /**
             * Display a listing of the resource.
             *
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
                $' . strtolower($tabel->nama) . 's = ' . $tabel->nama . '::all();
                return view(\'' . strtolower($tabel->nama) . 's.index\',[\'' . strtolower($tabel->nama) . 's\' => $' . strtolower($tabel->nama) . 's]);
            }
              
            /**
             * Show the form for creating a new resource.
             *
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
                return view(\'' . strtolower($tabel->nama) . 's.create\');
            }

            /**
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
            public function store(Request $request)
            {
                $request->validate([
        ';

        foreach ($koloms as $key => $value) {
            $x = $x . '\'' . $value['nama'] . '\'=> \'required\',' . "\n";
        }
        $x = $x . ']);
        $' . strtolower($tabel->nama) . ' = ' . ($tabel->nama) . '::create([
        ';

        $tabel->save();
        foreach ($koloms as $key => $value) {
            $x = $x . '\'' . $value['nama'] . '\'=> $request->' . $value['nama'] . ",\n";
        }

        $x = $x . '
            \'create_by\'=>Auth::user()->user_id
        ]);
        //$' . strtolower($tabel->nama) . ' = ' . $tabel->nama . '::create($array);    
        
        $' . strtolower($tabel->nama) . '->save();
        return redirect()->route(\'' . strtolower($tabel->nama) . 's.index\')->with(\'success_message\', \'Berhasil menambah ' . strtolower($tabel->nama) . ' baru\');
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

            $' . strtolower($tabel->nama) . ' = ' . $tabel->nama . '::find($id);
            //if($'.strtolower($tabel->nama).'->create_by == Auth::user()->id ||$userloged->hasRole([\'Super-Admin\']) == 1){
                if (!$' . strtolower($tabel->nama) . ') return redirect()->route(\'' . strtolower($tabel->nama) . 's.index\')
                    ->with(\'error_message\', \'' . ($tabel->nama) . ' dengan id\'.$id.\' tidak ditemukan\');
                return view(\'' . strtolower($tabel->nama) . 's.edit\', [\'' . strtolower($tabel->nama) . '\' => $' . strtolower($tabel->nama) . ']);
            //}else{
            //    return redirect()->route(\''.strtolower($tabel->nama).'s.index\')
            //    ->with(\'error_message\', \'And tidak berhak untuk meng edit data ini\');
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
        ';
        foreach ($koloms as $key => $value) {
            $x = $x . '\'' . $value['nama'] . '\'=> \'required\',' . "\n";
        }
        $x = $x . ']);
        $' . strtolower($tabel->nama) . ' = ' . ($tabel->nama) . '::find($id);' . "\n";

        foreach ($koloms as $key => $value) {
            $x = $x . '$' . strtolower($tabel->nama) . '->' . strtolower($value['nama']) . '=$request->' . strtolower($value['nama']) . ";\n";
        }
        $x = $x . ' $'.strtolower($tabel->nama).'->update_by = Auth::user()->user_id;
            $' . strtolower($tabel->nama) . '->save();
            return redirect()->route(\'' . strtolower($tabel->nama) . 's.index\')
            ->with(\'success_message\', \'Berhasil mengubah ' . strtolower($tabel->nama) . '\');
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

            $' . strtolower($tabel->nama) . ' = ' . ($tabel->nama) . '::find($id);
            if ($' . strtolower($tabel->nama) . ') $' . strtolower($tabel->nama) . '->delete();
            return redirect()->route(\'' . strtolower($tabel->nama) . 's.index\')
                ->with(\'success_message\', \'Berhasil menghapus ' . strtolower($tabel->nama) . '\');
        }
        }
    
        ';
        return $x;
    }

    public  function makeModel($id)
    {
        $tabel = Tabel::find($id);
        $koloms = Kolom::where('nama_tabel', '=', $tabel->nama)->get();
        $x = '<?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
        
        class ' . $tabel->nama . ' extends Model
        {
            use HasFactory;
            protected $fillable = [               
        ';

        foreach ($koloms as $key => $value) {
            $x = $x . '\'' . $value['nama'] . '\',';
        }

        $x = $x . '\'create_by\',\'update_by\'
        ];
    }';
        return $x;
    }

    public  function makeVIndex($id)
    {
        $tabel = Tabel::find($id);
        $koloms = Kolom::where('nama_tabel', '=', $tabel->nama)->get();
        $x = '
        @extends(\'adminlte::page\')

        @section(\'title\', \'List ' . $tabel->nama . '\')

        @section(\'content_header\')
            <h1 class="m-0 text-dark">List ' . $tabel->nama . '</h1>
        @stop

        @section(\'content\')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @can(\''.strtolower($tabel->nama).'s.create\')
                                <a href="{{route(\'' . strtolower($tabel->nama) . 's.create\')}}" class="btn btn-primary mb-2">
                                    Tambah
                                </a>
                            @endcan
                            <table class="table table-hover table-bordered table-stripped" id="example2">
                            <thead>
                            <tr>
                            <th>No.</th> 
        ';
        foreach ($koloms as $key => $value) {
            $x = $x . '<th>' . $value['nama'] . '</th>' . "\n";
        }
        $x = $x . '
            <th>Opsi</th>
            </tr>
            </thead>
            <tbody>

            @foreach($' . strtolower($tabel->nama) . 's as $key => $' . strtolower($tabel->nama) . ')
            <tr>
                <td>{{$key+1}}</td>                        
                        ';
        //  <td>{{$koloms->nama}}</td>
        foreach ($koloms as $key => $value) {
            $x = $x . '<td>{{$'.strtolower($tabel->nama).'->' . $value['nama'] . '}}</td>' . "\n";
        }

        $x = $x . '
            <td>
                        @can(\''.strtolower($tabel->nama).'s.edit\')
                            <a href="{{route(\''.strtolower($tabel->nama).'s.edit\', Crypt::encrypt($'.strtolower($tabel->nama).'->id))}}" class="btn btn-primary btn-xs">
                                Edit
                            </a>
                        @endcan
                        @can(\''.strtolower($tabel->nama).'s.delete\')
                            <a href="{{route(\''.strtolower($tabel->nama).'s.destroy\', Crypt::encrypt($'.strtolower($tabel->nama).'->id))}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                            Delete
                            </a>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
            
            
            </div>
            </div>
        </div>
        </div>
        @stop

        @push(\'js\')
            <form action="" id="delete-form" method="post">
                @method(\'delete\')
                @csrf
            </form>
            <script>
                $(\'#example2\').DataTable({
                    "responsive": true,
                });

                function notificationBeforeDelete(event, el) {
                    event.preventDefault();
                    if (confirm(\'Apakah anda yakin akan menghapus data ? \')) {
                        $("#delete-form").attr(\'action\', $(el).attr(\'href\'));
                        $("#delete-form").submit();
                    }
                }

            </script>
        @endpush';
        return $x;
    }


    public  function makeVCreate($id)
    {
        $tabel = Tabel::find($id);
        $koloms = Kolom::where('nama_tabel', '=', $tabel->nama)->get();
        $x = '
        @extends(\'adminlte::page\')

        @section(\'title\', \'Tambah Divisi\')

        @section(\'content_header\')
            <h1 class="m-0 text-dark">Tambah '. $tabel->nama.'</h1>
        @stop

        @section(\'content\')
            <form action="{{route(\''. strtolower($tabel->nama).'s.store\')}}" method="post">
                @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

        ';


        foreach ($koloms as $key => $value) {
            $x = $x . '
            <div class="form-group">
                <label for="'.strtolower($value['nama']).'">'.($value['nama']).'</label>
                <input type="text" class="form-control @error(\''.$value['nama'].'\') is-invalid @enderror" id="'.$value['nama'].'" placeholder="'.($value['nama']).'" name="'.strtolower($value['nama']).'" value="{{old(\''.strtolower($value['nama']).'\')}}">
                @error(\''.$value['nama'].'\') <span class="text-danger">{{$message}}</span> @enderror
            </div>
                '
            ;
        }

        $x = $x .'
        </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route(\''.strtolower($tabel->nama).'s.index\')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </form>
        @stop
         ';
        return $x;
    }






    public  function makeVEdit($id)
    {
        $tabel = Tabel::find($id);
        $koloms = Kolom::where('nama_tabel', '=', $tabel->nama)->get();
        $x = '
        @extends(\'adminlte::page\')

        @section(\'title\', \'Edit '.$tabel->nama.'\')

        @section(\'content_header\')
            <h1 class="m-0 text-dark">Edit '.$tabel->nama.'</h1>
        @stop

        @section(\'content\')
            <form action="{{route(\''.strtolower($tabel->nama).'s.update\', $'.strtolower($tabel->nama).')}}" method="post">
                @method(\'PUT\')
                @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">               
         ';
         foreach ($koloms as $key => $value) {
            $x = $x .'<div class="form-group">
                             <label for="'.$value['nama'].'">'.$value['nama'].'</label>
                             <input type="text" class="form-control @error(\''.$value['nama'].'\') is-invalid @enderror" id="'.$value['nama'].'" placeholder="'.$value['nama'].'" name="'.$value['nama'].'" value="{{$'.strtolower($tabel->nama).'->'.$value['nama'].' ?? old(\''.$value['nama'].'\')}}">
                             @error(\''.$value['nama'].'\') <span class="text-danger">{{$message}}</span> @enderror
                        </div>';
        };
        $x = $x.'
                <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{route(\''.strtolower($tabel->nama).'s.index\')}}" class="btn btn-default">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        @stop
        
        ';
         return $x;
    }


    public  function makeMigrate($id){
        $tabel = Tabel::find($id);
        $koloms = Kolom::where('nama_tabel', '=', $tabel->nama)->get();
        $x = '
        
        <?php

        use Illuminate\Database\Migrations\Migration;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Support\Facades\Schema;

        return new class extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create(\''.strtolower($tabel->nama).'s\', function (Blueprint $table) {
                    $table->id();                    
              ';
              foreach ($koloms as $key => $value) {
                $x = $x .' $table->string(\''.strtolower($value['nama']).'\');'."\n";
            };

              $x = $x.'      
                    $table->string(\'create_by\')->nullable();
                    $table->string(\'update_by\')->nullable();
                    $table->timestamps();
                });
            }

            /**
             * Reverse the migrations.
             *
             * @return void
             */
            public function down()
            {
                Schema::dropIfExists(\''.strtolower($tabel->nama).'s\');
            }
        };
                
        
        
        ';
        return $x;
    }




    public  function makeRoute($id)
    {
        $tabel = Tabel::find($id);
        $koloms = Kolom::where('nama_tabel', '=', $tabel->nama)->get();
        $nm_tabel = strtolower($tabel->nama);
        $nm_controler = $tabel->nama.'Controller';
        $x = '//make route

        Route::get(\'/'.$nm_tabel.'s\', [App\Http\Controllers\\'. $nm_controler.'::class, \'index\'])->name(\''.$nm_tabel.'s.index\')->middleware([\'auth\',\'permission:'.$nm_tabel.'s.index\']);
        Route::get(\''.$nm_tabel.'s/create\', [App\Http\Controllers\\'. $nm_controler.'::class, \'create\'])->name(\''.$nm_tabel.'s.create\')->middleware([\'auth\',\'permission:'.$nm_tabel.'s.create\']);
        Route::post(\''.$nm_tabel.'s/store\', [App\Http\Controllers\\'. $nm_controler.'::class, \'store\'])->name(\''.$nm_tabel.'s.store\')->middleware([\'auth\',\'permission:'.$nm_tabel.'s.create\']);
        Route::get(\''.$nm_tabel.'s/edit/{id}\', [App\Http\Controllers\\'. $nm_controler.'::class, \'edit\'])->name(\''.$nm_tabel.'s.edit\')->middleware([\'auth\',\'permission:'.$nm_tabel.'s.edit\']);
        Route::put(\''.$nm_tabel.'s/update/{id}\', [App\Http\Controllers\\'. $nm_controler.'::class, \'update\'])->name(\''.$nm_tabel.'s.update\')->middleware([\'auth\',\'permission:'.$nm_tabel.'s.edit\']);
        Route::delete(\''.$nm_tabel.'s/destroy/{id}\', [App\Http\Controllers\\'. $nm_controler.'::class, \'destroy\'])->name(\''.$nm_tabel.'s.destroy\')->middleware([\'auth\',\'permission:'.$nm_tabel.'s.delete\']);
        
        

        //make seeder
        $model =\''.$nm_tabel.'s\';
        $role->givePermissionTo(Permission::create([\'name\' => $model.\'.index\']));
        $role->givePermissionTo(Permission::create([\'name\' => $model.\'.create\']));
        $role->givePermissionTo(Permission::create([\'name\' => $model.\'.edit\']));
        $role->givePermissionTo(Permission::create([\'name\' => $model.\'.delete\']));


        ';
        return $x;
    }











    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kode  $kode
     * @return \Illuminate\Http\Response
     */
    public function show(Kode $kode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kode  $kode
     * @return \Illuminate\Http\Response
     */
    public function edit(Kode $kode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kode  $kode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kode $kode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kode  $kode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kode $kode)
    {
        //
    }
}
