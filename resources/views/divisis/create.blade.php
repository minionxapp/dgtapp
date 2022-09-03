@extends('adminlte::page')

@section('title', 'Tambah Divisi')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Divisi</h1>
@stop

@section('content')
    <form action="{{route('divisis.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputName">Kode</label>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" id="exampleInputName" placeholder="NKode Divisi" name="kode" value="{{old('kode')}}">
                        @error('kode') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Nama Divisi</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail" placeholder="MNama Divisi" name="nama" value="{{old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Nik Kadiv</label>
                        <input type="text" class="form-control @error('nik_kadiv') is-invalid @enderror" id="exampleInputPassword" placeholder="nik_kadiv" name="nik_kadiv" value="{{old('nik_kadiv')}}">
                        @error('nik_kadiv') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Nama Kadiv</label>
                        <input type="text" class="form-control" id="exampleInputPassword" placeholder="Nama Kadiv" name="nama_kadiv" value="{{old('nama_kadiv')}}">
                        @error('nama_kadiv') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('divisis.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop