@extends('adminlte::page')

@section('title', 'Tambah Training_plan_peserta ')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Peserta Training ({{ $training->nama_training }})</h1>
    {{-- <style>
        .center {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        flex: 1 0 100%;
        height: 100%;
        }
        
    </style> --}}
@stop

@section('content')
{{-- <div class="center">
    <!-- Tuliskan teks atau elemen apapun yang ingin ditempatkan di tengah -->
    tetsttttttt
</div> --}}
    <form action="{{ route('training_plan_pesertas.store') }}" method="post" {{-- enctype="multipart/form-data" --}}>
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="training_plan_id">training_plan_id</label>
                                    <input type="text" autocomplete="off" readonly
                                        class="form-control @error('training_plan_id') is-invalid @enderror"
                                        id="training_plan_id" placeholder="training_plan_id" name="training_plan_id"
                                        value="{{ $training_plan_id }}">
                                    @error('training_plan_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-1">
                                <div class="form-group">
                                    <label for="nik">NIKs</label>
                                    <input type="checkbox"  class="form-control" id="niks" placeholder="niks" name="niks">                                    
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('nik') is-invalid @enderror" id="nik"
                                        placeholder="nik" name="nik" value="{{ old('nik') }}" onchange="cariNik()">
                                    @error('nik')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        placeholder="nama" name="nama" value="{{ old('nama') }}" readonly>
                                    @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="status_peserta">status_peserta</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('status_peserta') is-invalid @enderror"
                                        id="status_peserta" placeholder="status_peserta" name="status_peserta"
                                        value="{{ old('status_peserta') }}">
                                    @error('status_peserta')
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
                                        placeholder="keterangan" name="keterangan" value="{{ old('keterangan') }}">
                                    @error('keterangan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                        <a href="{{ route('training_plan_pesertas.index',Crypt::encrypt($training_plan_id) ) }}" class="btn btn-default">
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
    var nama_pegawai ='';
    var all_nama_pegawai ='';
    var jml_tidak_ada = 0;
    var nik_tidak_ada ='';
     function cariPegawai(nik){
          $.ajax({
                url:'/pegawai/pegawainik/'+nik,
                type:"GET",
                async: false,
                success:function(response){
                    if(response != ""){
                        // $('#nama').val(response.nama_pegawai);
                        nama_pegawai =response.nama_pegawai;
                        all_nama_pegawai =all_nama_pegawai+','+ nama_pegawai;
                    }else{
                        // alert('Pegawai tidak ditemukanssss');
                        jml_tidak_ada= jml_tidak_ada + 1;
                        nik_tidak_ada = nik_tidak_ada +' '+nik; 
                    }
                }
            });
    }


      function cariNik(){
        jml_tidak_ada = 0;
        nik_tidak_ada ='';
        all_nama_pegawai ='';
        $('#nama').val(null);
        if($('#niks').is(":checked")){
            var niks = $('#nik').val().split(',')
            var jmlNik = niks.length;
            for (var i = 0; i < jmlNik; i++) {
                cariPegawai(niks[i]);
            }
            if(jml_tidak_ada>0){
                document.getElementById("simpan").disabled = true;
                alert('data tidak ditemukan ::'+nik_tidak_ada);
            }else{
                alert('Semua NIK di temukan');
                document.getElementById("simpan").disabled = false;
                $('#nama').val(null);
                $('#nama').val(all_nama_pegawai.substring(1, all_nama_pegawai.length));
            }
        }else{
             cariPegawai($('#nik').val());
              $('#nama').val(nama_pegawai);
              if(jml_tidak_ada>0){
                alert('data tidak ditemukan');
                $('#nama').val('');
                document.getElementById("simpan").disabled = true;
            }
        }
    }
</script>
@endpush