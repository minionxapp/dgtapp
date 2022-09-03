@extends('adminlte::page')

@section('title', 'Tambah Departemen')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Departemen</h1>
@stop

@section('content')
    <form action="{{route('departemens.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- ---------- --}}
                    <div class="form-group">
                        <select name="divisi_kode" class="form-control" id="divisi_kode">
                            <option value="">Divisi</option>
                            @foreach ($divisis as $divisi)
                                <option value={{$divisi->kode}}>{{$divisi->nama}}</option>
                            @endforeach
                        </select>
                    </div>


                     {{--  'kode','nama','nik_kadept','nama_kadept','divisi_kode','create_by','update_by','folder --}}

                    <div class="form-group">
                        <label for="exampleInputName">Kode</label>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" id="exampleInputName" placeholder="Kode Departemen" name="kode" value="{{old('kode')}}">
                        @error('kode') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Nama Departemen</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail" placeholder="MNama Departemen" name="nama" value="{{old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Nik Kadept</label>
                        <input type="text" class="form-control @error('nik_kadept') is-invalid @enderror" id="exampleInputPassword" placeholder="nik_kadept" name="nik_kadept" value="{{old('nik_kadept')}}">
                        @error('nik_kadept') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Nama Kadept</label>
                        <input type="text" class="form-control" id="exampleInputPassword" placeholder="Nama Kadept" name="nama_kadept" value="{{old('nama_kadept')}}">
                        @error('nama_kadept') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('departemens.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop