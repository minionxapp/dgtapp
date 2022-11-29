@extends('adminlte::page')

@section('title', 'Tambah Project ')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Project</h1>
@stop

@section('content')
    <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="kode">Kode Project</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('kode') is-invalid @enderror" id="kode"
                                        placeholder="kode" name="kode" value="{{ old('kode') }}">
                                    @error('kode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama">Nama Project</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        placeholder="nama" name="nama" value="{{ old('nama') }}">
                                    @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="jenis">Jenis</label>
                                    <select name="jenis" class="form-control" id="jenis">
                                        <option value="XXX">Jenis</option>
                                        @foreach ($jeniss as $jenis)
                                            <option value={{ $jenis->kode }}>{{ $jenis->desc }}</option>
                                        @endforeach
                                    </select>
                                    @error('jenis')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="divisi_kode">Divisi PIC</label>
                                    <select name="divisi_kode" class="form-control" id="divisi_kode" >
                                        {{-- <option value="">Divisi</option> --}}
                                        @foreach ($divisi_kodes as $divisi_kode)
                                            <option value={{ $divisi_kode->kode }}>{{ $divisi_kode->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('divisi_kode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        {{-- </div> --}}

                        {{-- <div class="row"> --}}
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="departemen_kode">Departemen PIC</label>
                                    <select name="departemen_kode" class="form-control" id="departemen_kode">
                                        {{-- <option value="">Departemen</option> --}}
                                        @foreach ($departemen_kodes as $departemen_kode)
                                            <option value={{ $departemen_kode->kode }}>{{ $departemen_kode->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('departemen_kode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="pic_assignto">PIC</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('pic_assignto') is-invalid @enderror"
                                        id="pic_assignto" placeholder="pic_assignto" name="pic_assignto"
                                        value="{{ old('pic_assignto') }}">
                                    @error('pic_assignto')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="unit_req">Unit Request</label>
                                    <select name="unit_req" class="form-control" id="unit_req">
                                        <option value="">Unit</option>
                                        @foreach ($unit_reqs as $unit_req)
                                            <option value={{ $unit_req->kode }}>{{ $unit_req->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('unit_req')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        {{-- </div>
                        <div class="row"> --}}
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pic_req">PIC Request</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('pic_req') is-invalid @enderror" id="pic_req"
                                        placeholder="pic_req" name="pic_req" value="{{ old('pic_req') }}">
                                    @error('pic_req')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="start_plan">Rencana Mulai</label>
                                    <input type="date" autocomplete="off"
                                        class="form-control @error('start_plan') is-invalid @enderror" id="start_plan"
                                        placeholder="start_plan" name="start_plan" value="{{ old('start_plan') }}">
                                    @error('start_plan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        {{-- </div>
                        <div class="row"> --}}
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="end_plan">Rencana Selesai</label>
                                    <input type="date" autocomplete="off"
                                        class="form-control @error('end_plan') is-invalid @enderror" id="end_plan"
                                        placeholder="end_plan" name="end_plan" value="{{ old('end_plan') }}">
                                    @error('end_plan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                        placeholder="keterangan" name="keterangan" value="{{ old('keterangan') }}">
                                    @error('keterangan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="file01">file01</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('file01') is-invalid @enderror" id="file01"
                                        placeholder="file01" name="file01" value="{{ old('file01') }}">
                                    @error('file01')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="file02">file02</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('file02') is-invalid @enderror" id="file02"
                                        placeholder="file02" name="file02" value="{{ old('file02') }}">
                                    @error('file02')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="gambar">gambar</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                                        placeholder="gambar" name="gambar" value="{{ old('gambar') }}">
                                    @error('gambar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}

                       

                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="divisi_assignto">divisi_assignto</label>
                                    <select name="divisi_assignto" class="form-control" id="divisi_assignto">
                                        <option value="XXX">Jenis</option>
                                        @foreach ($divisi_assigntos as $divisi_assignto)
                                            <option value={{ $divisi_assignto->kode }}>{{ $divisi_assignto->desc }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('divisi_assignto')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="dept_assignto">dept_assignto</label>
                                    <select name="dept_assignto" class="form-control" id="dept_assignto">
                                        <option value="XXX">Jenis</option>
                                        @foreach ($dept_assigntos as $dept_assignto)
                                            <option value={{ $dept_assignto->kode }}>{{ $dept_assignto->desc }}</option>
                                        @endforeach
                                    </select>
                                    @error('dept_assignto')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="file_desc01">file_desc01</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('file_desc01') is-invalid @enderror" id="file_desc01"
                                        placeholder="file_desc01" name="file_desc01" value="{{ old('file_desc01') }}">
                                    @error('file_desc01')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="file_uri01">file_uri01</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('file_uri01') is-invalid @enderror" id="file_uri01"
                                        placeholder="file_uri01" name="file_uri01" value="{{ old('file_uri01') }}">
                                    @error('file_uri01')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="file_desc02">file_desc02</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('file_desc02') is-invalid @enderror" id="file_desc02"
                                        placeholder="file_desc02" name="file_desc02" value="{{ old('file_desc02') }}">
                                    @error('file_desc02')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="file_uri02">file_uri02</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('file_uri02') is-invalid @enderror" id="file_uri02"
                                        placeholder="file_uri02" name="file_uri02" value="{{ old('file_uri02') }}">
                                    @error('file_uri02')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}
                        <div class="form-group" id="input_file">
                        </div>
                        <button class="btn btn-default" type="button" id="add_file">
                            Upload File
                        </button>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('projects.index') }}" class="btn btn-default">
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
        $('#add_file').on('click', function(e) {
            var x = '<div class="mb-3"> <label for="formFile" class="form-label">File Upload</label>  <input class="form-control" type="file" name="files[]" id="formFile"></div>'
            $('#input_file').append(x);

        });
    </script>
@endpush