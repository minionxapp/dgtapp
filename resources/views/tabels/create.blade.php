@extends('adminlte::page')

@section('title', 'Tambah Tabel')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Tabel</h1>
@stop

@section('content')
    <form action="{{route('tabels.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail">Nama Tabel</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Tabel" name="nama" value="{{old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Desc 1</label>
                        <input type="text" class="form-control @error('desc1') is-invalid @enderror" id="desc1" placeholder="desc1" name="desc1" value="{{old('desc1')}}">
                        @error('desc1') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Desc 2</label>
                        <input type="text" class="form-control" id="desc2" placeholder="desc2" name="desc2" value="{{old('desc2')}}">
                        @error('desc2') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('tabels.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop