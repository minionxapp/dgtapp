{{-- Divisi --> Task
    divisis --> tasks --}}


@extends('adminlte::page')

@section('title', 'Tambah Task')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Task</h1>
@stop

@section('content')

    <form action="{{ route('tasks.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        {{-- <div class="form-group">
                        <label for="exampleInputName">Kode</label>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" id="exampleInputName" placeholder="Kode Task" name="kode" value="{{old('kode')}}" readonly>
                        @error('kode') <span class="text-danger">{{$message}}</span> @enderror
                    </div> --}}

                        <div class="form-group">
                            <label for="exampleInputName">Task/Project</label>
                            <input type="text" class="form-control @error('kode') is-invalid @enderror" id="nm_project"
                                placeholder="nm_project" name="nm_project" value="{{ old('nm_project') }}">
                            @error('nm_project')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName">Deskripsi</label>
                            <input type="text" class="form-control @error('descripsi') is-invalid @enderror"
                                id="descripsi" placeholder="descripsi" name="descripsi" value="{{ old('descripsi') }}">
                            @error('descripsi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword">Divisi</label>
                                    <select name="divisi_kode" class="form-control" id="divisi_kode">
                                        <option value="">Divisi</option>
                                        @foreach ($divisis as $divisi)
                                            @if ($divisi->kode == $user->divisi_kode)
                                                <option value={{ $divisi->kode }} selected="selected">{{ $divisi->nama }}
                                                </option>
                                            @else
                                                <option value={{ $divisi->kode }}>{{ $divisi->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('divisi_kode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword">Departemen</label>
                                    <select name="departemen_kode" class="form-control" id="departemen_kode">
                                        <option value="">Departemen</option>
                                        @foreach ($departemens as $departemen)
                                            @if ($departemen->kode == $user->departemen_kode)
                                                <option value={{ $departemen->kode }} selected="selected">
                                                    {{ $departemen->nama }}</option>
                                            @else
                                                <option value={{ $departemen->kode }}>{{ $departemen->nama }}</option>
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
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputName">Jenis</label>
                                    <select name="jenis" class="form-control" id="jenis">
                                        <option value="">Jenis</option>
                                        @foreach ($paramjenis as $jenis)
                                            <option value={{ $jenis->kode }}>{{ $jenis->desc }}</option>
                                        @endforeach
                                    </select>
                                    @error('jenis')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputName">Mulai</label>
                                    <input type="date" class="form-control @error('mulai') is-invalid @enderror"
                                        id="mulai" placeholder="mulai" name="mulai" value="{{ old('mulai') }}">
                                    @error('mulai')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputName">Selesai</label>
                                    <input type="date" class="form-control @error('selesai') is-invalid @enderror"
                                        id="selesai" placeholder="selesai" name="selesai" value="{{ old('selesai') }}">
                                    @error('selesai')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputName">PIC</label>
                                    <input type="text" class="form-control @error('pic') is-invalid @enderror"
                                        id="pic" placeholder="pic" name="pic" value="{{ old('pic') }}">
                                    @error('pic')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputName">Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="">Status</option>
                                        @foreach ($params as $param)
                                            <option value={{ $param->kode }}>{{ $param->desc }}</option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                            <input class="form-control" type="file" id="file" name="file">
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('tasks.index') }}" class="btn btn-default">
                                Batal
                            </a>
                        </div>

                        {{-- <button type="button" class="btn btn-primary" onclick="showModal()">showmodal</button> --}}
                        {{-- <button type="button" class="btn btn-primary btn-sm float-left" data-toggle="modal"
                            onclick="showModal();">Upload File
                        </button> --}}
                    </div>
                </div>
            </div>
        </div>
    </form>
    

            {{-- MODAL --}}
            {{-- <div class="modal fade" id="formUpload" data-backdrop="static" tabindex="-1" role="dialog"
                aria-labelledby="addDataLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Data Divisi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="formuploadfile"name="formuploadfile"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="file" id="filez" name="filez" />
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-secondary" onclick="simpanFile();">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- END MODAL --}}

        @stop


        @push('js')
            <script>
                var i = 0;
                $(document).ready(function() {
                    $('select[name="' + 'divisi_kode' + '"]').on('change', function() {
                        createSelect('departemen_kode', 'kode', 'nama', '/departemens_divisi/' + $(this).val());
                    });
                });

                function showModal() {
                    $('#formUpload').modal('show');
                }

                function simpanFile() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var fd = new FormData();
                    var files = $('#filez')[0].files[0];
                    fd.append('file', files);
                    // alert('formuploadfile ....... :' + files);
                    $.ajax({
                        url: '/simpanfile',
                        type: 'post',
                        data: fd,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response != 0) {
                                alert('file uploaded');
                            } else {
                                alert('file not uploaded');
                            }
                            $('#formUpload').modal('hide');
                        },
                    });
                }


                function createSelect(params, kode, nama, url) {
                    $('select[name="' + params + '"]').empty();
                    $.ajax({
                        url: url,
                        type: "GET",
                        async: false,
                        dataType: "json",
                        success: function(data) {
                            $('select[name="' + params + '"]').empty();
                            $('select[name="' + params + '"]').append('<option value="' +
                                '">' + '-Pilih-' + '</option>');
                            $.each(data, function(key, value) {
                                $('select[name="' + params + '"]').append('<option value="' +
                                    value[kode] + '">' + value[nama] + '</option>');
                            });
                        }
                    });
                }
            </script>
        @endpush
