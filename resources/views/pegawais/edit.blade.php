
        @extends('adminlte::page')

        @section('title', 'Edit Pegawai')

        @section('content_header')
            <h1 class="m-0 text-dark">Edit Pegawai</h1>
        @stop

        @section('content')
            <form action="{{route('pegawais.update', $pegawai)}}" method="post">
                @method('PUT')
                @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">               
         
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="nip">nip</label>
                             <input type="text" autocomplete="off" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="nip" name="nip" value="{{$pegawai->nip ?? old('nip')}}">
                             @error('nip') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="nip_lengkap">nip_lengkap</label>
                             <input type="text" autocomplete="off" class="form-control @error('nip_lengkap') is-invalid @enderror" id="nip_lengkap" placeholder="nip_lengkap" name="nip_lengkap" value="{{$pegawai->nip_lengkap ?? old('nip_lengkap')}}">
                             @error('nip_lengkap') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="nama_pegawai">nama_pegawai</label>
                             <input type="text" autocomplete="off" class="form-control @error('nama_pegawai') is-invalid @enderror" id="nama_pegawai" placeholder="nama_pegawai" name="nama_pegawai" value="{{$pegawai->nama_pegawai ?? old('nama_pegawai')}}">
                             @error('nama_pegawai') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="jenis_kelamin">jenis_kelamin</label>
                             <input type="text" autocomplete="off" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" placeholder="jenis_kelamin" name="jenis_kelamin" value="{{$pegawai->jenis_kelamin ?? old('jenis_kelamin')}}">
                             @error('jenis_kelamin') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="status_aktif">status_aktif</label>
                             <input type="text" autocomplete="off" class="form-control @error('status_aktif') is-invalid @enderror" id="status_aktif" placeholder="status_aktif" name="status_aktif" value="{{$pegawai->status_aktif ?? old('status_aktif')}}">
                             @error('status_aktif') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="kode_unit">kode_unit</label>
                             <input type="text" autocomplete="off" class="form-control @error('kode_unit') is-invalid @enderror" id="kode_unit" placeholder="kode_unit" name="kode_unit" value="{{$pegawai->kode_unit ?? old('kode_unit')}}">
                             @error('kode_unit') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="nama_unit">nama_unit</label>
                             <input type="text" autocomplete="off" class="form-control @error('nama_unit') is-invalid @enderror" id="nama_unit" placeholder="nama_unit" name="nama_unit" value="{{$pegawai->nama_unit ?? old('nama_unit')}}">
                             @error('nama_unit') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="unit_tk_1">unit_tk_1</label>
                             <input type="text" autocomplete="off" class="form-control @error('unit_tk_1') is-invalid @enderror" id="unit_tk_1" placeholder="unit_tk_1" name="unit_tk_1" value="{{$pegawai->unit_tk_1 ?? old('unit_tk_1')}}">
                             @error('unit_tk_1') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="unit_tk_2">unit_tk_2</label>
                             <input type="text" autocomplete="off" class="form-control @error('unit_tk_2') is-invalid @enderror" id="unit_tk_2" placeholder="unit_tk_2" name="unit_tk_2" value="{{$pegawai->unit_tk_2 ?? old('unit_tk_2')}}">
                             @error('unit_tk_2') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="unit_tk_3">unit_tk_3</label>
                             <input type="text" autocomplete="off" class="form-control @error('unit_tk_3') is-invalid @enderror" id="unit_tk_3" placeholder="unit_tk_3" name="unit_tk_3" value="{{$pegawai->unit_tk_3 ?? old('unit_tk_3')}}">
                             @error('unit_tk_3') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="jenis_kantor">jenis_kantor</label>
                             <input type="text" autocomplete="off" class="form-control @error('jenis_kantor') is-invalid @enderror" id="jenis_kantor" placeholder="jenis_kantor" name="jenis_kantor" value="{{$pegawai->jenis_kantor ?? old('jenis_kantor')}}">
                             @error('jenis_kantor') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{route('pegawais.index')}}" class="btn btn-default">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        @stop
        
        