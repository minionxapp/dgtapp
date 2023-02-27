@extends('adminlte::page')

@section('title', 'Tambah Mentor_event ')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Kegiatan Mentor</h1>
@stop

@section('content')
    <form action="{{ route('mentor_events.store') }}" method="post" {{-- enctype="multipart/form-data" --}}>
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="no_surtug">Surat Tugas</label>
                                    <select name="no_surtug" class="form-control" id="no_surtug">
                                        <option value="">Surat Tugas</option>
                                        @foreach ($no_surtugs as $no_surtug)
                                            <option value={{ $no_surtug->id }}>{{ $no_surtug->no_surtug}} | {{ $no_surtug->uraian}}</option>
                                        @endforeach
                                    </select>
                                    @error('no_surtug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama_event">Nama Kegiatan</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('nama_event') is-invalid @enderror" id="nama_event"
                                        placeholder="Nama Kegiatan" name="nama_event" value="{{ old('nama_event') }}">
                                    @error('nama_event')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="ket">Keterangan</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('ket') is-invalid @enderror" id="ket"
                                        placeholder="Keterangan" name="ket" value="{{ old('ket') }}">
                                    @error('ket')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="tgl_mulai">Tanggal Mulai</label>
                                    <input type="date" autocomplete="off"
                                        class="form-control @error('tgl_mulai') is-invalid @enderror" id="tgl_mulai"
                                        placeholder="Tanggal Mulai" name="tgl_mulai" value="{{ old('tgl_mulai') }}">
                                    @error('tgl_mulai')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="tgl_selesai">Tanggal Selesai</label>
                                    <input type="date" autocomplete="off"
                                        class="form-control @error('tgl_selesai') is-invalid @enderror" id="tgl_selesai"
                                        placeholder="tgl_selesai" name="tgl_selesai" value="{{ old('tgl_selesai') }}">
                                    @error('tgl_selesai')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('mentor_events.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
@stop
