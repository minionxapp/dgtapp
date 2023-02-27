@extends('adminlte::page')

@section('title', 'Tambah Mentor_mente ')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Mentor_mente</h1>
@stop

@section('content')
    <form action="{{ route('mentor_mentes.store') }}" method="post" {{-- enctype="multipart/form-data" --}}>
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="no_surtug">No Surat Tugas</label>
                                    <select name="no_surtug" class="form-control" id="no_surtug">
                                        @foreach ($no_surtugs as $no_surtug)
                                            <option value={{ $no_surtug->id }}>{{ $no_surtug->no_surtug }} |
                                                {{ $no_surtug->uraian }}</option>
                                        @endforeach
                                    </select>
                                    @error('no_surtug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nik">nik</label>
                            <input type="text" autocomplete="off" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="nik" name="nik" value="{{old('nik')}}">
                            @error('nik') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div> --}}
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="nik">nik</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('nik') is-invalid @enderror" id="nik"
                                        placeholder="nik" name="nik" value="{{ old('nik') }}" onblur="cariPegawai()">
                                    @error('nik')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-1">
                                <label for="nik">&nbsp;</label>
                                <div class="form-group">
                                    <button type="button" onclick="cariPegawai()" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                            <div class="col-9">
                                <label for="Nama">&nbsp;</label>
                                <div class="form-group">
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('nama_pegawai') is-invalid @enderror" id="nama_pegawai"
                                        placeholder="nama" name="nama_pegawai" value="{{ old('nik') }}" readonly>
                                    @error('niknama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="ket">ket</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('ket') is-invalid @enderror" id="ket"
                                        placeholder="ket" name="ket" value="{{ old('ket') }}">
                                    @error('ket')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('mentor_mentes.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
@stop
<script>
    function carinik() {
        alert('cari nikkkkk....' + $('#nik').val());
    }


    function cariPegawai() {
        $('#nama_pegawai').val('');
        $.ajax({
            url: '/pegawai/pegawainik/' + $('#nik').val(),
            type: "GET",
            async: false,
            dataType: "json",
            success: function(data) {
                $('#nama_pegawai').val(data['nama_pegawai']);
            },
            error: function(errorThrown) {
                alert("Nik Tidak ditemukan ...... !");
                $('#nama_pegawai').val('');
                $('#nik').val('');
            }

        });
    }
</script>
