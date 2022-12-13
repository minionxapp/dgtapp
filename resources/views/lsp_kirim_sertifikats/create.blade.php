
        @extends('adminlte::page')

        @section('title', 'Tambah Lsp_kirim_sertifikat ')

        @section('content_header')
            <h1 class="m-0 text-dark">Tambah Lsp_kirim_sertifikat</h1>
        @stop

        @section('content')
            <form action="{{route('lsp_kirim_sertifikats.store')}}" method="post" {{--enctype="multipart/form-data"--}}>
                @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

        
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nama">nama</label>
                            <input type="text" autocomplete="off" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="nama" name="nama" value="{{old('nama')}}">
                            @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nip">nip</label>
                            <input type="text" autocomplete="off" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="nip" name="nip" value="{{old('nip')}}">
                            @error('nip') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
        </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('lsp_kirim_sertifikats.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </form>
        @stop
         