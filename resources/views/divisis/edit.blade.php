@extends('adminlte::page')

@section('title', 'Edit Divisi')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Divisi</h1>
@stop

@section('content')
    <form action="{{route('divisis.update', $divisi)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputName">Kode</label>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" id="exampleInputName" placeholder="Kode" name="kode" value="{{$divisi->kode ?? old('kode')}}">
                        @error('kode') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Nama Divisi</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail" placeholder="Nama Divisi" name="nama" value="{{$divisi->nama ?? old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">NIK Kadiv</label>
                        <input type="text" class="form-control" id="exampleInputPassword" placeholder="Nik Kadiv" name="nik_kadiv" value="{{$divisi->nik_kadiv ?? old('nik_kadiv')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Nama Kadiv</label>
                        <input type="text" class="form-control @error('nama_kadiv') is-invalid @enderror" id="exampleInputPassword" placeholder="nama_kadiv" name="nama_kadiv" value="{{$divisi->nama_kadiv ?? old('nama_kadiv')}}">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
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