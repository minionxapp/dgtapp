@extends('adminlte::page')

@section('title', 'Tambah Training_note ')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Trainee Info</h1>
@stop

@section('content')
    <form action="{{ route('training_notes.store') }}" method="post" {{-- enctype="multipart/form-data" --}}>
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('nip') is-invalid @enderror" id="nip"
                                        placeholder="NIK Pegawai" name="nip" value="{{ old('nip') }}">
                                    @error('nip')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="form-group">
                                    <button type="button" onclick="cariPegawai()" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('nama_pegawai') is-invalid @enderror" id="nama_pegawai"
                                        placeholder="Nama Pegawai" name="nama_pegawai" value="{{ old('nama_pegawai') }}" readonly>
                                    @error('nama_pegawai')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pilihan">Jenis Note</label>
                                    <select name="pilihan" class="form-control" id="pilihan">
                                        @foreach ($pilihans as $pilihan)
                                            <option value={{ $pilihan->kode }}>{{ $pilihan->desc }}</option>
                                        @endforeach
                                    </select>
                                    @error('pilihan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('tahun') is-invalid @enderror" id="tahun"
                                        placeholder="tahun" name="tahun" value="{{ old('tahun') }}">
                                    @error('tahun')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="event">Event</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('event') is-invalid @enderror" id="event"
                                        placeholder="event" name="event" value="{{ old('event') }}">
                                    @error('event')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="date_start">Mulai</label>
                                    <input type="date" autocomplete="off"
                                        class="form-control @error('date_start') is-invalid @enderror" id="date_start"
                                        placeholder="date_start" name="date_start" value="{{ old('date_start') }}">
                                    @error('date_start')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="date_end">Selesai</label>
                                    <input type="date" autocomplete="off"
                                        class="form-control @error('date_end') is-invalid @enderror" id="date_end"
                                        placeholder="date_end" name="date_end" value="{{ old('date_end') }}">
                                    @error('date_end')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="note">note</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('note') is-invalid @enderror" id="note"
                                        placeholder="note" name="note" value="{{ old('note') }}">
                                    @error('note')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            
                        </div> --}}

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('training_notes.index') }}" class="btn btn-default">
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
    function cariPegawai() {
        $('#nama_pegawai').val('');
        $.ajax({
                url: '/pegawai/pegawainik/'+$('#nip').val(),
                type: "GET",
                async: false,
                dataType: "json",
                success: function(data) {
                        $('#nama_pegawai').val(data['nama_pegawai']);
                        $('#tahun').val(new Date().getFullYear() );
                },
                error: function(errorThrown){
                    alert("Nik Tidak ditemukan ...... !");
                    $('#nama_pegawai').val('');
                    $('#tahun').val('');
                }  
                
            });
    } 









    
</script>