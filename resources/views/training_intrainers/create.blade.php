@extends('adminlte::page')

@section('title', 'Tambah Training_intrainer ')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Training_intrainer</h1>
@stop

@section('content')
    <form action="{{ route('training_intrainers.store') }}" method="post" {{-- enctype="multipart/form-data" --}}>
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="nik">NIP</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('nip') is-invalid @enderror" id="nip"
                                        placeholder="nip" name="nip" value="" onchange="cariNik()">
                                    @error('nik')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama_trainer">nama_trainer</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('nama_trainer') is-invalid @enderror" id="nama_trainer"
                                        placeholder="nama_trainer" name="nama_trainer" value="{{ old('nama_trainer') }}" readonly>
                                    @error('nama_trainer')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="training_plan_id">training_plan_id</label>
                                    <select name="training_plan_id" class="form-control" id="training_plan_id">
                                        @foreach ($training_plans as $training_plan)
                                            <option value={{ $training_plan->id }}>{{ $training_plan->nama_training }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('training_plan_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="materi">materi</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('materi') is-invalid @enderror" id="materi"
                                        placeholder="materi" name="materi" value="{{ old('materi') }}">
                                    @error('materi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="catatan">catatan</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('catatan') is-invalid @enderror" id="catatan"
                                        placeholder="catatan" name="catatan" value="{{ old('catatan') }}">
                                    @error('catatan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="internal">Internal</label>
                                    <select name="internal" class="form-control" id="internal">
                                        <option value="">--Internal--</option>
                                        @foreach ($internals as $internal)
                                            <option value={{ $internal->kode }}>{{ $internal->desc }}</option>
                                        @endforeach
                                    </select>
                                    @error('internal')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                        {{-- <a href="{{ route('training_intrainers_.index') }}" class="btn btn-default">
                            Batal
                        </a> --}}


                        <a href="{{ route('training_intrainers_index.index', Crypt::encrypt($training_plan->id)) }}" class="btn btn-default">
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
        document.getElementById("simpan").disabled = true;
        var nama_pegawai = '';
        var all_nama_pegawai = '';
        var jml_tidak_ada = 0;
        var nik_tidak_ada = '';
        $('#cek').hide();

        function cariPegawai(nik) {
            // $('#cek').show();
            $.ajax({
                url: '/pegawai/pegawainik/' + nik,
                type: "GET",
                async: false,
                success: function(response) {
                    // $('#cek').show();
                    if (response != "") {
                        nama_pegawai = response.nama_pegawai;
                        all_nama_pegawai = all_nama_pegawai + ',' + nama_pegawai;
                    } else {
                        jml_tidak_ada = jml_tidak_ada + 1;
                        nik_tidak_ada = nik_tidak_ada + ' ' + nik;
                    }
                }
            });
        }


        function cariNik() {
            document.getElementById("simpan").disabled = true;
            jml_tidak_ada = 0;
            nik_tidak_ada = '';
            all_nama_pegawai = '';
            $('#nama_trainer').val(null);
            // if($('#niks').is(":checked")){
            var niks = $('#nip').val().split(',')
            var jmlNik = niks.length;
            for (var i = 0; i < jmlNik; i++) {
                cariPegawai(niks[i]);
            }
            if (jml_tidak_ada > 0) {
                document.getElementById("simpan").disabled = true;
                alert('data tidak ditemukan ::' + nik_tidak_ada);
            } else {
                // alert('Semua NIK di temukan');
                document.getElementById("simpan").disabled = false;
                $('#nama_trainer').val(null);
                $('#nama_trainer').val(all_nama_pegawai.substring(1, all_nama_pegawai.length));
                // $('#cek').hide();
            }

        }
    </script>
@endpush
