@extends('adminlte::page')

@section('title', 'Edit Project')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Project</h1>
@stop

@section('content')
    <form action="{{ route('projects.update', $project) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="kode">Kode</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('kode') is-invalid @enderror" id="kode"
                                        placeholder="kode" name="kode" value="{{ $project->kode ?? old('kode') }}" readonly>
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
                                        placeholder="nama" name="nama" value="{{ $project->nama ?? old('nama') }}">
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
                                            @if ($jenis->kode == $project->jenis)
                                                <option selected="selected" value={{ $jenis->kode }}>{{ $jenis->desc }}
                                                </option>
                                            @else
                                                <option value={{ $jenis->kode }}>{{ $jenis->desc }}</option>
                                            @endif
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
                                    <select name="divisi_kode" class="form-control" id="divisi_kode">
                                        <option value="XXX">Divisi</option>
                                        @foreach ($divisi_kodes as $divisi_kode)
                                            @if ($divisi_kode->kode == $project->divisi_kode)
                                                <option selected="selected" value={{ $divisi_kode->kode }}>
                                                    {{ $divisi_kode->nama }}</option>
                                            @else
                                                <option value={{ $divisi_kode->kode }}>{{ $divisi_kode->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('divisi_kode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        {{-- </div>

                        <div class="row"> --}}
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="departemen_kode">Departemen PIC</label>
                                    <select name="departemen_kode" class="form-control" id="departemen_kode">
                                        <option value="XXX">Departemen</option>
                                        @foreach ($departemen_kodes as $departemen_kode)
                                            @if ($departemen_kode->kode == $project->departemen_kode)
                                                <option selected="selected" value={{ $departemen_kode->kode }}>
                                                    {{ $departemen_kode->nama }}</option>
                                            @else
                                                <option value={{ $departemen_kode->kode }}>{{ $departemen_kode->nama }}
                                                </option>
                                            @endif
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
                                        value="{{ $project->pic_assignto ?? old('pic_assignto') }}">
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
                                        <option value="XXX">Jenis</option>
                                        @foreach ($unit_reqs as $unit_req)
                                            @if ($unit_req->kode == $project->unit_req)
                                                <option selected="selected" value={{ $unit_req->kode }}>
                                                    {{ $unit_req->nama }}</option>
                                            @else
                                                <option value={{ $unit_req->kode }}>{{ $unit_req->nama }}</option>
                                            @endif
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
                                        placeholder="pic_req" name="pic_req"
                                        value="{{ $project->pic_req ?? old('pic_req') }}">
                                    @error('pic_req')
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
                                        placeholder="file01" name="file01"
                                        value="{{ $project->file01 ?? old('file01') }}">
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
                                        placeholder="file02" name="file02"
                                        value="{{ $project->file02 ?? old('file02') }}">
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
                                        placeholder="gambar" name="gambar"
                                        value="{{ $project->gambar ?? old('gambar') }}">
                                    @error('gambar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="start_plan">Rencana Mulai</label>
                                    <input type="date" autocomplete="off"
                                        class="form-control @error('start_plan') is-invalid @enderror" id="start_plan"
                                        placeholder="start_plan" name="start_plan"
                                        value="{{ $project->start_plan ?? old('start_plan') }}">
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
                                        placeholder="end_plan" name="end_plan"
                                        value="{{ $project->end_plan ?? old('end_plan') }}">
                                    @error('end_plan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="keterangan">keterangan</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                        placeholder="keterangan" name="keterangan"
                                        value="{{ $project->keterangan ?? old('keterangan') }}">
                                    @error('keterangan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @php
                            $i = 0;
                        @endphp
                        <div class="form-group" id="input_file">                            
                            @foreach ($files as $file)
                                @php     
                                    $i++;     
                                @endphp
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example" id="file{{ $file->id }}">
                                     <a href="/upload/task/{{ $file->file_name }}" class="btn btn-primary">{{ $file->file_real_name }}</a>
                                    <button onclick="cobaHapusFile('{{ Crypt::encrypt($file->id)}}')" type="button" class="btn btn-warning">X</button>
                                </div>
                            @endforeach
                        </div>
                        
                        <button class="btn btn-default" type="button" id="add_file">Add File
                            <span class="mdi mdi-plus-circle"></span>
                        </button>
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


        function cobaHapusFile(id){
            // event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $.ajax({
                            url: '../../hapusfile/'+id,
                            type: 'get',
                            // method: 'DELETE',
                            // data: [],
                            // contentType: false,
                            // processData: false,
                            success: function(response) {
                                // alert(response);
                                $('#file'+response).hide();
                                // if (response != 0) {
                                //     alert('file uploaded');
                                // } else {
                                //     alert('file not uploaded');
                                // }
                                // $('#formUpload').modal('hide');
                            },
                        });
                // $("#delete-form").attr('action', $(el).attr('href'));
                // $("#delete-form").submit();
            }else{
                alert("Gak Jadi....");
            }
        }
    </script>
@endpush