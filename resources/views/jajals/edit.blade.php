@extends('adminlte::page')

@section('title', 'Edit Jajal')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Jajal</h1>
@stop

@section('content')
    <form action="{{ route('jajals.update', $jajal) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kode">kode</label>
                            <input type="text" autocomplete="off" class="form-control @error('kode') is-invalid @enderror"
                                id="kode" placeholder="kode" name="kode" value="{{ $jajal->kode ?? old('kode') }}">
                            @error('kode')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">nama</label>
                            <input type="text" autocomplete="off"
                                class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="nama"
                                name="nama" value="{{ $jajal->nama ?? old('nama') }}">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jumlah">jumlah</label>
                            <input type="text" autocomplete="off"
                                class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                                placeholder="jumlah" name="jumlah" value="{{ $jajal->jumlah ?? old('jumlah') }}">
                            @error('jumlah')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="divisi">divisi</label>
                            <select name="divisi" class="form-control" id="divisi">
                                <option value="XXX">Jenis</option>
                                @foreach ($divisis as $divisi)
                                    @if ($divisi->kode == $jajal->kode)
                                        <option selected="selected" value={{ $divisi->kode }}>{{ $divisi->desc }}</option>
                                    @else
                                        <option value={{ $divisi->kode }}>{{ $divisi->desc }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('divisi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mulai">mulai</label>
                            <input type="date" autocomplete="off"
                                class="form-control @error('mulai') is-invalid @enderror" id="mulai" placeholder="mulai"
                                name="mulai" value="{{ $jajal->mulai ?? old('mulai') }}">
                            @error('mulai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('jajals.index') }}" class="btn btn-default">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
