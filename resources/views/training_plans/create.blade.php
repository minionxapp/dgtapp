@extends('adminlte::page')

@section('title', 'Tambah Training_plan ')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Training Plan</h1>
@stop

@section('content')
    <form action="{{ route('training_plans.store') }}" method="post" {{-- enctype="multipart/form-data" --}}>
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama_training">Nama Training</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('nama_training') is-invalid @enderror" id="nama_training"
                                        placeholder="nama_training" name="nama_training" value="{{ old('nama_training') }}">
                                    @error('nama_training')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="keterangan">Deskripsi</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                        placeholder="keterangan" name="keterangan" value="{{ old('keterangan') }}">
                                    @error('keterangan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="jenis">Jenis</label>
                                    <select name="jenis" class="form-control" id="jenis">
                                        @foreach ($jeniss as $jenis)
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
                                    <label for="pic_akademi">Ketegori</label>
                                    <select name="kategori" class="form-control" id="kategori">
                                        @foreach ($kategoris as $kategori)
                                            <option value={{ $kategori->kode }}>{{ $kategori->desc }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="pelaksanaan">Pelaksanaan</label>
                                    <select name="pelaksanaan" class="form-control" id="pelaksanaan">
                                        {{-- <option value="XXX">Jenis</option> --}}
                                        @foreach ($pelaksanaans as $pelaksanaan)
                                            <option value={{ $pelaksanaan->kode }}>{{ $pelaksanaan->desc }}</option>
                                        @endforeach
                                    </select>
                                    @error('pelaksanaan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="jml_peserta">Jml Peserta</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('jml_peserta') is-invalid @enderror" id="jml_peserta"
                                        placeholder="jml_peserta" name="jml_peserta" value="{{ old('jml_peserta') }}">
                                    @error('jml_peserta')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-6">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('lokasi') is-invalid @enderror" id="lokasi"
                                        placeholder="lokasi" name="lokasi" value="{{ old('lokasi') }}">
                                    @error('lokasi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <select name="lokasi" class="form-control" id="lokasi">
                                        @foreach ($lokasis as $lokasi)
                                            <option value={{ $lokasi->kode }}>{{ $lokasi->desc }}</option>
                                        @endforeach
                                    </select>
                                    @error('lokasi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                       


                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="jml_kelas">Jumlah Kelas</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('jml_kelas') is-invalid @enderror" id="jml_kelas"
                                        placeholder="jml_kelas" name="jml_kelas" value="{{ old('jml_kelas') }}">
                                    @error('jml_kelas')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="biaya">Biaya</label>
                                    <input type="text" autocomplete="off" 
                                        class="form-control @error('biaya') is-invalid @enderror" id="biaya"
                                        placeholder="biaya" name="biaya" value="{{ old('biaya') }}">
                                    @error('biaya')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="durasi">Durasi (Jamlat)</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('durasi') is-invalid @enderror" id="durasi"
                                        placeholder="durasi" name="durasi" value="{{ old('durasi') }}">
                                    @error('durasi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="tgl_mulai">Mulai</label>
                                    <input type="date" autocomplete="off"
                                        class="form-control @error('tgl_mulai') is-invalid @enderror" id="tgl_mulai"
                                        placeholder="tgl_mulai" name="tgl_mulai" value="{{ old('tgl_mulai') }}">
                                    @error('tgl_mulai')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="tgl_selesai">Selesai</label>
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="unit_usul">Unit Pengusul</label>
                                    <select name="unit_usul" class="form-control" id="unit_usul">
                                        @foreach ($unit_usuls as $unit_usul)
                                            <option value={{ $unit_usul->kode }}>{{ $unit_usul->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('unit_usul')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pic_akademi">PIC Akademi</label>
                                    <select name="pic_akademi" class="form-control" id="pic_akademi">
                                        @foreach ($pic_akademis as $pic_akademi)
                                            <option value={{ $pic_akademi->kode }}>{{ $pic_akademi->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('pic_akademi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="lokasi">Status</label>
                                <select name="status" class="form-control" id="status">
                                    @foreach ($statuss as $status)
                                        <option value={{ $status->kode }}>{{ $status->desc }}</option>
                                    @endforeach
                                </select>
                                @error('lokasi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('training_plans.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
@stop
