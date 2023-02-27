@extends('adminlte::page')

@section('title', 'Tambah Mentor_surtug ')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Mentor_surtug</h1>
@stop

@section('content')
    <form action="{{ route('mentor_surtugs.store') }}" method="post" enctype="multipart/form-data">
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
                                        placeholder="no_surtug" name="no_surtug" value="{{ old('no_surtug') }}">
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
                                        placeholder="uraian" name="uraian" value="{{ old('uraian') }}">
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
                                        placeholder="tgl_mulai" name="tgl_mulai" value="{{ old('tgl_mulai') }}">
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
                                        placeholder="tgl_selesai" name="tgl_selesai" value="{{ old('tgl_selesai') }}">
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
                                        placeholder="nama_dokumen" name="nama_dokumen" value="{{ old('nama_dokumen') }}">
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
                                        placeholder="link_dokumen" name="link_dokumen" value="{{ old('link_dokumen') }}" readonly>
                                    @error('link_dokumen')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
                        </div>

                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">File Upload</label>
                            <input class="form-control" type="file" id="file" name="file">
                        </div>
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

@push('js')
    <script>
        
    </script>
@endpush
