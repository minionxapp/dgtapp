@extends('adminlte::page')

@section('title', 'Edit Training_plan')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Training_plan</h1>
@stop

@section('content')
    <form action="{{ route('training_plans.update', $training_plan) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="nama_training">Nama Training</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('nama_training') is-invalid @enderror" id="nama_training"
                                        placeholder="nama_training" name="nama_training"
                                        value="{{ $training_plan->nama_training ?? old('nama_training') }}">
                                    @error('nama_training')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="keterangan">Deskripsi</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                        placeholder="keterangan" name="keterangan"
                                        value="{{ $training_plan->keterangan ?? old('keterangan') }}">
                                    @error('keterangan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="kategori">kategori</label>
                                    <select name="kategori" class="form-control" id="kategori">
                                        <option value="XXX">Jenis</option>
                                        @foreach ($kategoris as $kategori)
                                            @if ($training_plan->kategori == $kategori->kode)
                                                <option selected="selected" value={{ $kategori->kode }}>
                                                    {{ $kategori->desc }}</option>
                                            @else
                                                <option value={{ $kategori->kode }}>{{ $kategori->desc }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('pelaksanaan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pelaksanaan">pelaksanaan</label>
                                    <select name="pelaksanaan" class="form-control" id="pelaksanaan">
                                        <option value="XXX">Jenis</option>
                                        @foreach ($pelaksanaans as $pelaksanaan)
                                            @if ($training_plan->pelaksanaan == $pelaksanaan->kode)
                                                <option selected="selected" value={{ $pelaksanaan->kode }}>
                                                    {{ $pelaksanaan->desc }}</option>
                                            @else
                                                <option value={{ $pelaksanaan->kode }}>{{ $pelaksanaan->desc }}</option>
                                            @endif
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
                                    <label for="jml_peserta">Jumlah Peserta</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('jml_peserta') is-invalid @enderror" id="jml_peserta"
                                        placeholder="jml_peserta" name="jml_peserta"
                                        value="{{ $training_plan->jml_peserta ?? old('jml_peserta') }}">
                                    @error('jml_peserta')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <select name="lokasi" class="form-control" id="lokasi">
                                        {{-- <option value="XXX">Jenis</option> --}}
                                        @foreach ($lokasis as $lokasi)
                                            @if ($lokasi->kode == $training_plan->lokasi)
                                                <option selected="selected" value={{ $lokasi->kode }}>
                                                    {{ $lokasi->desc }}</option>
                                            @else
                                                <option value={{ $lokasi->kode }}>{{ $lokasi->desc }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('unit_usul')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="jml_kelas">Jumlah Kelas/Batch</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('jml_kelas') is-invalid @enderror" id="jml_kelas"
                                        placeholder="jml_kelas" name="jml_kelas"
                                        value="{{ $training_plan->jml_kelas ?? old('jml_kelas') }}">
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
                                        placeholder="biaya" name="biaya"
                                        value="{{ $training_plan->biaya ?? old('biaya') }}">
                                    @error('biaya')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="durasi">Durasi</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('durasi') is-invalid @enderror" id="durasi"
                                        placeholder="durasi" name="durasi"
                                        value="{{ $training_plan->durasi ?? old('durasi') }}">
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
                                        placeholder="tgl_mulai" name="tgl_mulai"
                                        value="{{ $training_plan->tgl_mulai ?? old('tgl_mulai') }}">
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
                                        placeholder="tgl_selesai" name="tgl_selesai"
                                        value="{{ $training_plan->tgl_selesai ?? old('tgl_selesai') }}">
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
                                        <option value="XXX">Jenis</option>
                                        @foreach ($unit_usuls as $unit_usul)
                                            @if ($unit_usul->kode == $training_plan->unit_usul)
                                                <option selected="selected" value={{ $unit_usul->kode }}>
                                                    {{ $unit_usul->nama }}</option>
                                            @else
                                                <option value={{ $unit_usul->kode }}>{{ $unit_usul->nama }}</option>
                                            @endif
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
                                        <option value="XXX">Jenis</option>
                                        @foreach ($pic_akademis as $pic_akademi)
                                            @if ($pic_akademi->kode == $training_plan->pic_akademi)
                                                <option selected="selected" value={{ $pic_akademi->kode }}>
                                                    {{ $pic_akademi->nama }}</option>
                                            @else
                                                <option value={{ $pic_akademi->kode }}>{{ $pic_akademi->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('pic_akademi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
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
