@extends('adminlte::page')

@section('title', 'Edit Kolom')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Kolom</h1>
@stop

@section('content')
    <form action="{{ route('koloms.update', $kolom) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        {{-- <div class="form-group">
                            <label for="exampleInputEmail">Nama Kolom</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                placeholder="Nama Kolom" name="nama" value="{{ $kolom->nama ?? old('nama') }}">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label for="exampleInputEmail">Nama Kolom</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" 
                            placeholder="Nama Kolom" name="nama" value="{{ $kolom->nama ?? old('nama') }}">
                            @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword">tipedata</label>
                            <select name="tipedata" class="form-control" id="tipedata">
                                @foreach ($tipedatas as $tipedata)
                                    @if ($tipedata->kode == $kolom->tipedata)
                                        <option selected="selected" value={{$tipedata->kode}}>{{$tipedata->desc}}</option>
                                    @else
                                        <option  value={{$tipedata->kode}}>{{$tipedata->desc}}</option>
                                    @endif

                                @endforeach
                            </select>


                            {{-- <select name="divisi_kode" class="form-control" id="divisi_kode">
                                <option value="">Divisi</option>
                                @foreach ($divisis as $divisi)
                                @if ($divisi->kode == $departemen->divisi_kode)
                                    <option selected="selected" value={{$divisi->kode}}>{{$divisi->nama}}</option>   
                                @else
                                    <option value={{$divisi->kode}}>{{$divisi->nama}}</option>                                
                                    
                                @endif
    
                                @endforeach
                            </select> --}}



                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword">null_</label>
                            <select name="null_" class="form-control" id="null_">
                                {{-- <option value="">Null</option> --}}
                                @foreach ($null_s as $null_)
                                @if ($null_->kode == $kolom->null_)
                                    <option selected="selected" value={{$null_->kode}}>{{$null_->desc}}</option>
                                @else
                                    <option value={{$null_->kode}}>{{$null_->desc}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword">key_</label>
                            <select name="key_" class="form-control" id="key_">
                                {{-- <option value="">Null</option> --}}
                                @foreach ($null_s as $key_)
                                @if ($null_->kode == $kolom->key_)
                                    <option selected="selected" value={{$key_->kode}}>{{$key_->desc}}</option>
                                @else
                                    <option  value={{$key_->kode}}>{{$key_->desc}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
    
                        <div class="form-group">
                            <label for="exampleInputEmail">Urut</label>
                            <input type="text" class="form-control @error('urut') is-invalid @enderror" id="urut" placeholder="urut" name="urut" value="{{$kolom->urut ?? old('urut')}}">
                            @error('urut') <span class="text-danger">{{$message}}</span> @enderror
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

                        {{-- <div class="form-group">
                            <label for="exampleInputPassword">Desc 1</label>
                            <input type="text" class="form-control" id="exampleInputPassword" placeholder="Desc1"
                                name="desc1" value="{{ $kolom->desc1 ?? old('desc1') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword">Desc 2</label>
                            <input type="text" class="form-control @error('desc1') is-invalid @enderror" id="desc1"
                                placeholder="desc2" name="desc2" value="{{ $kolom->desc2 ?? old('desc2') }}">
                            @error('desc1')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        {{-- <a href="{{ route('koloms.index') }}" class="btn btn-default">
                            Batal
                        </a> --}}
                        <a href="{{route('koloms.detail', $tabels)}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @stop
