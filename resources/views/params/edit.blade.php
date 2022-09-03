@extends('adminlte::page')

@section('title', 'Edit Param')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Param</h1>
@stop

@section('content')
    <form action="{{route('params.update', $param)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
  {{-- ["nama","kode","desc","aktif","urut","create_by","update_by"] --}}
                    <div class="form-group">
                        <label for="exampleInputName">Kode</label>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" id="Kode" placeholder="Kode" name="kode" value="{{$param->kode ?? old('kode')}}">
                        @error('kode') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Nama Param</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Param" name="nama" value="{{$param->nama ?? old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Deskripsi</label>
                        <input type="text" class="form-control" id="desc" placeholder="desc" name="desc" value="{{$param->desc ?? old('desc')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Aktif</label>
                        <input type="text" class="form-control @error('aktif') is-invalid @enderror" id="aktif" placeholder="aktif" name="aktif" value="{{$param->aktif ?? old('aktif')}}">
                        @error('aktif') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Urut</label>
                        <input type="text" class="form-control @error('urut') is-invalid @enderror" id="urut" placeholder="urut" name="urut" value="{{$param->urut ?? old('urut')}}">
                        @error('urut') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('params.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop