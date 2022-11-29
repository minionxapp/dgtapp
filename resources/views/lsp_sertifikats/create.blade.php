
        @extends('adminlte::page')

        @section('title', 'Tambah Lsp_sertifikat ')

        @section('content_header')
            <h1 class="m-0 text-dark">Tambah Lsp_sertifikat</h1>
        @stop

        @section('content')
            <form action="{{route('lsp_sertifikats.store')}}" method="post" {{--enctype="multipart/form-data"--}}>
                @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

        
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="no">no</label>
                            <input type="text" autocomplete="off" class="form-control @error('no') is-invalid @enderror" id="no" placeholder="no" name="no" value="{{old('no')}}">
                            @error('no') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="noreg1">noreg1</label>
                            <input type="text" autocomplete="off" class="form-control @error('noreg1') is-invalid @enderror" id="noreg1" placeholder="noreg1" name="noreg1" value="{{old('noreg1')}}">
                            @error('noreg1') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="noreg2">noreg2</label>
                            <input type="text" autocomplete="off" class="form-control @error('noreg2') is-invalid @enderror" id="noreg2" placeholder="noreg2" name="noreg2" value="{{old('noreg2')}}">
                            @error('noreg2') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="noreg3">noreg3</label>
                            <input type="text" autocomplete="off" class="form-control @error('noreg3') is-invalid @enderror" id="noreg3" placeholder="noreg3" name="noreg3" value="{{old('noreg3')}}">
                            @error('noreg3') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
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
                            <label for="noser1">noser1</label>
                            <input type="text" autocomplete="off" class="form-control @error('noser1') is-invalid @enderror" id="noser1" placeholder="noser1" name="noser1" value="{{old('noser1')}}">
                            @error('noser1') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="noser2">noser2</label>
                            <input type="text" autocomplete="off" class="form-control @error('noser2') is-invalid @enderror" id="noser2" placeholder="noser2" name="noser2" value="{{old('noser2')}}">
                            @error('noser2') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="noser3">noser3</label>
                            <input type="text" autocomplete="off" class="form-control @error('noser3') is-invalid @enderror" id="noser3" placeholder="noser3" name="noser3" value="{{old('noser3')}}">
                            @error('noser3') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="noser4">noser4</label>
                            <input type="text" autocomplete="off" class="form-control @error('noser4') is-invalid @enderror" id="noser4" placeholder="noser4" name="noser4" value="{{old('noser4')}}">
                            @error('noser4') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="noser5">noser5</label>
                            <input type="text" autocomplete="off" class="form-control @error('noser5') is-invalid @enderror" id="noser5" placeholder="noser5" name="noser5" value="{{old('noser5')}}">
                            @error('noser5') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="no_blanko">no_blanko</label>
                            <input type="text" autocomplete="off" class="form-control @error('no_blanko') is-invalid @enderror" id="no_blanko" placeholder="no_blanko" name="no_blanko" value="{{old('no_blanko')}}">
                            @error('no_blanko') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" autocomplete="off" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email" name="email" value="{{old('email')}}">
                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="hp">hp</label>
                            <input type="text" autocomplete="off" class="form-control @error('hp') is-invalid @enderror" id="hp" placeholder="hp" name="hp" value="{{old('hp')}}">
                            @error('hp') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="kode_skema">kode_skema</label>
                            <input type="text" autocomplete="off" class="form-control @error('kode_skema') is-invalid @enderror" id="kode_skema" placeholder="kode_skema" name="kode_skema" value="{{old('kode_skema')}}">
                            @error('kode_skema') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nama_skema">nama_skema</label>
                            <input type="text" autocomplete="off" class="form-control @error('nama_skema') is-invalid @enderror" id="nama_skema" placeholder="nama_skema" name="nama_skema" value="{{old('nama_skema')}}">
                            @error('nama_skema') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="provinsi">provinsi</label>
                            <input type="text" autocomplete="off" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" placeholder="provinsi" name="provinsi" value="{{old('provinsi')}}">
                            @error('provinsi') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="th_lapor">th_lapor</label>
                            <input type="text" autocomplete="off" class="form-control @error('th_lapor') is-invalid @enderror" id="th_lapor" placeholder="th_lapor" name="th_lapor" value="{{old('th_lapor')}}">
                            @error('th_lapor') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
        </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('lsp_sertifikats.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </form>
        @stop
         