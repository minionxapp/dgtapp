
        @extends('adminlte::page')

        @section('title', 'Tambah Lsp_skema ')

        @section('content_header')
            <h1 class="m-0 text-dark">Tambah Lsp_skema</h1>
        @stop

        @section('content')
            <form action="{{route('lsp_skemas.store')}}" method="post" {{--enctype="multipart/form-data"--}}>
                @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

        
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
                            <label for="jenis_skema">jenis_skema</label>
                            <input type="text" autocomplete="off" class="form-control @error('jenis_skema') is-invalid @enderror" id="jenis_skema" placeholder="jenis_skema" name="jenis_skema" value="{{old('jenis_skema')}}">
                            @error('jenis_skema') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="jumlah_unit">jumlah_unit</label>
                            <input type="text" autocomplete="off" class="form-control @error('jumlah_unit') is-invalid @enderror" id="jumlah_unit" placeholder="jumlah_unit" name="jumlah_unit" value="{{old('jumlah_unit')}}">
                            @error('jumlah_unit') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="sektor">sektor</label>
                            <input type="text" autocomplete="off" class="form-control @error('sektor') is-invalid @enderror" id="sektor" placeholder="sektor" name="sektor" value="{{old('sektor')}}">
                            @error('sektor') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="bidang">bidang</label>
                            <input type="text" autocomplete="off" class="form-control @error('bidang') is-invalid @enderror" id="bidang" placeholder="bidang" name="bidang" value="{{old('bidang')}}">
                            @error('bidang') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="kode_unit">kode_unit</label>
                            <input type="text" autocomplete="off" class="form-control @error('kode_unit') is-invalid @enderror" id="kode_unit" placeholder="kode_unit" name="kode_unit" value="{{old('kode_unit')}}">
                            @error('kode_unit') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="unit_kompetensi">unit_kompetensi</label>
                            <input type="text" autocomplete="off" class="form-control @error('unit_kompetensi') is-invalid @enderror" id="unit_kompetensi" placeholder="unit_kompetensi" name="unit_kompetensi" value="{{old('unit_kompetensi')}}">
                            @error('unit_kompetensi') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
        </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('lsp_skemas.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </form>
        @stop
         