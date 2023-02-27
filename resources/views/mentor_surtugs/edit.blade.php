@extends('adminlte::page')

@section('title', 'Edit Mentor_surtug')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Mentor_surtug</h1>
@stop

@section('content')
    <form action="{{ route('mentor_surtugs.update', $mentor_surtug) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="no_surtug">No Surat Tugas</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('no_surtug') is-invalid @enderror" id="no_surtug"
                                        placeholder="no_surtug" name="no_surtug"
                                        value="{{ $mentor_surtug->no_surtug ?? old('no_surtug') }}">
                                    @error('no_surtug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="uraian">Uraian</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('uraian') is-invalid @enderror" id="uraian"
                                        placeholder="uraian" name="uraian"
                                        value="{{ $mentor_surtug->uraian ?? old('uraian') }}">
                                    @error('uraian')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="tgl_mulai">Tgl Mulai</label>
                                    <input type="date" autocomplete="off"
                                        class="form-control @error('tgl_mulai') is-invalid @enderror" id="tgl_mulai"
                                        placeholder="tgl_mulai" name="tgl_mulai"
                                        value="{{ $mentor_surtug->tgl_mulai ?? old('tgl_mulai') }}">
                                    @error('tgl_mulai')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        {{-- </div>

                        <div class="row"> --}}
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="tgl_selesai">Tgl Selesai</label>
                                    <input type="date" autocomplete="off"
                                        class="form-control @error('tgl_selesai') is-invalid @enderror" id="tgl_selesai"
                                        placeholder="tgl_selesai" name="tgl_selesai"
                                        value="{{ $mentor_surtug->tgl_selesai ?? old('tgl_selesai') }}">
                                    @error('tgl_selesai')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="nama_dokumen">Nama Dokumen</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('nama_dokumen') is-invalid @enderror" id="nama_dokumen"
                                        placeholder="nama_dokumen" name="nama_dokumen"
                                        value="{{ $mentor_surtug->nama_dokumen ?? old('nama_dokumen') }}">
                                    @error('nama_dokumen')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        {{-- </div>
                        <div class="row"> --}}
                            {{-- <div class="col-8">
                                <div class="form-group">
                                    <label for="link_dokumen">Link Dokumen</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('link_dokumen') is-invalid @enderror" id="link_dokumen"
                                        placeholder="link_dokumen" name="link_dokumen"
                                        value="{{ $mentor_surtug->link_dokumen ?? old('link_dokumen') }}">
                                    @error('link_dokumen')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>  --}}
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example" id="file">
                            <a href="/upload/mentor/{{ $dokumen_link->file_name }}" class="btn btn-primary">{{ $dokumen_link->file_real_name }}</a>
                           {{-- <button onclick="cobaHapusFile('{{ Crypt::encrypt($file->id)}}')" type="button" class="btn btn-warning">X</button> --}}
                       </div>


                       <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">File Upload</label>
                        <input class="form-control" type="file" id="file" name="file">
                    </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('mentor_surtugs.index') }}" class="btn btn-default">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
