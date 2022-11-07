
        @extends('adminlte::page')

        @section('title', 'Tambah Jajal ')

        @section('content_header')
            <h1 class="m-0 text-dark">Tambah Jajal</h1>
        @stop

        @section('content')
            <form action="{{route('jajals.store')}}" method="post" {{--enctype="multipart/form-data"--}}>
                @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

        
                <div class="form-group">
                <label for="kode">kode</label>
                <input type="text" autocomplete="off" class="form-control @error('kode') is-invalid @enderror" id="kode" placeholder="kode" name="kode" value="{{old('kode')}}">
                @error('kode') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                
                <div class="form-group">
                <label for="nama">nama</label>
                <input type="text" autocomplete="off" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="nama" name="nama" value="{{old('nama')}}">
                @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                
                <div class="form-group">
                <label for="jumlah">jumlah</label>
                <input type="text" autocomplete="off" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="jumlah" name="jumlah" value="{{old('jumlah')}}">
                @error('jumlah') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                
                <div class="form-group">
                    <label for="divisi">divisi</label>
                    <select name="divisi" class="form-control" id="divisi">
                        <option value="XXX">Jenis</option>
                        @foreach ($divisis as $divisi)
                            <option value={{ $divisi->kode }}>{{ $divisi->desc }}</option>
                        @endforeach
                    </select>
                    @error('divisi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                <label for="mulai">mulai</label>
                <input type="date" autocomplete="off" class="form-control @error('mulai') is-invalid @enderror" id="mulai" placeholder="mulai" name="mulai" value="{{old('mulai')}}">
                @error('mulai') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                
        </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('jajals.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </form>
        @stop
         