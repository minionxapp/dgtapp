@extends('adminlte::page')

@section('title', 'Tambah Kolom')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Kolom {{ $tabels->id }} - {{ $tabels->nama }}</h1>
@stop

@section('content')
    <form action="{{route('koloms.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                {{-- 'nama','tipedata','null_','key_','default_','create_by','update_by',nama_tabel --}}
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail">Nama Kolom</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Kolom" name="nama" value="{{old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="exampleInputPassword">tipedata</label>
                        <input type="text" class="form-control @error('desc1') is-invalid @enderror" id="tipedata" placeholder="tipedata" name="tipedata" value="{{old('tipedata')}}">
                        @error('tipedata') <span class="text-danger">{{$message}}</span> @enderror
                    </div> --}}


                    <div class="form-group">
                        <label for="exampleInputPassword">tipedata</label>
                        <select name="tipedata" class="form-control" id="tipedata">
                            <option value="">tipedata</option>
                            @foreach ($tipedatas as $tipedata)
                                <option value={{$tipedata->kode}}>{{$tipedata->desc}}</option>
                            @endforeach
                        </select>
                    </div>




                    {{-- <div class="form-group">
                        <label for="exampleInputPassword">null_</label>
                        <input type="text" class="form-control @error('null_') is-invalid @enderror" id="null_" placeholder="null_" name="null_" value="{{old('null_')}}">
                        @error('null_') <span class="text-danger">{{$message}}</span> @enderror
                    </div> --}}

                    <div class="form-group">
                        <label for="exampleInputPassword">null_</label>
                        <select name="tipedata" class="form-control" id="null_">
                            <option value="">Null</option>
                            @foreach ($null_s as $null_)
                                <option value={{$null_->kode}}>{{$null_->desc}}</option>
                            @endforeach
                        </select>
                    </div>


{{-- 
                    <div class="form-group">
                        <label for="exampleInputPassword">key_</label>
                        <input type="text" class="form-control @error('key_') is-invalid @enderror" id="key_" placeholder="key_" name="key_" value="{{old('key_')}}">
                        @error('key_') <span class="text-danger">{{$message}}</span> @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="exampleInputPassword">key_</label>
                        <select name="key_" class="form-control" id="key_">
                            <option value="">Null</option>
                            @foreach ($null_s as $key_)
                                <option value={{$key_->kode}}>{{$key_->desc}}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="exampleInputPassword">default_</label>
                        <input type="text" class="form-control @error('default_') is-invalid @enderror" id="default_" placeholder="default_" name="default_" value="{{old('default_')}}">
                        @error('default_') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">nama_tabel</label>
                        <input readonly type="text" class="form-control @error('nama_tabel') is-invalid @enderror" id="nama_tabel" placeholder="{{ $tabels->nama }}" name="nama_tabel" value="{{ $tabels->nama }}">
                        @error('nama_tabel') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    {{-- 
                        <a href="{{route('koloms.detail', $tabels)}}" class="btn btn-primary btn-xs">
                                        Detail
                                    </a> --}}
                    <a href="{{route('koloms.detail', $tabels)}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    
@stop