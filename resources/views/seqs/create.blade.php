@extends('adminlte::page')

@section('title', 'Tambah Divisi')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Seq</h1>
@stop

@section('content')
    <form action="{{ route('seqs.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="form-group">
                            <label for="seqname">seqname</label>
                            <input type="text" class="form-control @error('seqname') is-invalid @enderror" id="seqname"
                                placeholder="seqname" name="seqname" value="{{ old('seqname') }}">
                            @error('seqname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nilai">nilai</label>
                            <input type="text" class="form-control @error('nilai') is-invalid @enderror" id="nilai"
                                placeholder="nilai" name="nilai" value="{{ old('nilai') }}">
                            @error('nilai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tahun">tahun</label>
                            <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun"
                                placeholder="tahun" name="tahun" value="{{ old('tahun') }}">
                            @error('tahun')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="seqvalue">seqvalue</label>
                            <input type="text" class="form-control @error('seqvalue') is-invalid @enderror"
                                id="seqvalue" placeholder="seqvalue" name="seqvalue" value="{{ old('seqvalue') }}">
                            @error('seqvalue')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="keterangan">keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                id="keterangan" placeholder="keterangan" name="keterangan" value="{{ old('keterangan') }}">
                            @error('keterangan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('seqs.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @stop
