@extends('adminlte::page')

@section('title', 'Tambah Training_plan_peserta ')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Training_plan_peserta</h1>
@stop

@section('content')
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
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('nik') is-invalid @enderror" id="nik"
                                        placeholder="nik" name="nik" value="{{ old('nik') }}" onblur="cariNik()">
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
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
    function cariNik(){
        $.ajax({
                url:'/pegawai/pegawainik/'+$('#nik').val(),
                type:"GET",
                success:function(response){
                    if(response != ""){
                        $('#nama').val(response.nama_pegawai);
                    }else{
                        alert('Pegawai tidak ditemukan');
                        // document.getElementById("nik").focus();
                    }

                    // lanjut untuk cek apakah sudah di lock atau bukan
                }

            });




    }
</script>
@endpush