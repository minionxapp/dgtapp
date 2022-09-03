@extends('adminlte::page')

@section('title', 'Tambah Divisi')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Coba</h1>
@stop

@section('content')
    <form action="{{ route('cobas.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="form-group">
                            <label for="nama">Kode</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                placeholder="nama" name="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alamat">Kode</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                placeholder="alamat" name="alamat" value="{{ old('alamat') }}">
                            @error('alamat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('cobas.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @stop
