@extends('adminlte::page')

@section('title', 'Tambah Divisi')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Kendaraan</h1>
@stop

@section('content')
    <form action="{{ route('kendaraans.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="form-group">
                            <label for="nopol">Kode</label>
                            <input type="text" class="form-control @error('nopol') is-invalid @enderror" id="nopol"
                                placeholder="nopol" name="nopol" value="{{ old('nopol') }}">
                            @error('nopol')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="merk">Kode</label>
                            <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk"
                                placeholder="merk" name="merk" value="{{ old('merk') }}">
                            @error('merk')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="roda">Kode</label>
                            <input type="text" class="form-control @error('roda') is-invalid @enderror" id="roda"
                                placeholder="roda" name="roda" value="{{ old('roda') }}">
                            @error('roda')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kendaraans.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @stop
