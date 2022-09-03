@extends('adminlte::page')

@section('title', 'Edit Kolom')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Kolom</h1>
@stop

@section('content')
    <form action="{{route('koloms.update', $kolom)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <div class="form-group">
                        <label for="exampleInputEmail">Nama Kolom</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Kolom" name="nama" value="{{$kolom->nama ?? old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Desc 1</label>
                        <input type="text" class="form-control" id="exampleInputPassword" placeholder="Desc1" name="desc1" value="{{$kolom->desc1 ?? old('desc1')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Desc 2</label>
                        <input type="text" class="form-control @error('desc1') is-invalid @enderror" id="desc1" placeholder="desc2" name="desc2" value="{{$kolom->desc2 ?? old('desc2')}}">
                        @error('desc1') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('koloms.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop