@extends('adminlte::page')

@section('title', 'Edit Departemen')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Departemen</h1>
@stop

@section('content')
    <form action="{{route('departemens.update', $departemen)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <select name="divisi_kode" class="form-control" id="divisi_kode">
                            <option value="">Divisi</option>
                            @foreach ($divisis as $divisi)
                            @if ($divisi->kode == $departemen->divisi_kode)
                                <option selected="selected" value={{$divisi->kode}}>{{$divisi->nama}}</option>   
                            @else
                                <option value={{$divisi->kode}}>{{$divisi->nama}}</option>                                
                                
                            @endif

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Kode</label>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" id="exampleInputName" placeholder="Kode" name="kode" value="{{$departemen->kode ?? old('kode')}}" readonly>
                        @error('kode') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Nama Departemen</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail" placeholder="Nama Departemen" name="nama" value="{{$departemen->nama ?? old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>



                    <div class="form-group">
                        <label for="exampleInputPassword">Nik Kadept</label>
                        <input type="text" class="form-control @error('nik_kadept') is-invalid @enderror" id="exampleInputPassword" placeholder="nik_kadept" name="nik_kadept" value="{{$departemen->nik_kadept ?? old('nik_kadept')}}">
                        @error('nik_kadept') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Nama Kadept</label>
                        <input type="text" class="form-control" id="exampleInputPassword" placeholder="Nama Kadept" name="nama_kadept" value="{{$departemen->nama_kadept ?? old('nama_kadept')}}">
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