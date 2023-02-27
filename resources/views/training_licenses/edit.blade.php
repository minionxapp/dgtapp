@extends('adminlte::page')

@section('title', 'Edit Training_license')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Training_license</h1>
@stop

@section('content')
    <form action="{{ route('training_licenses.update', $training_license) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama_license">Nama License</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('nama_license') is-invalid @enderror" id="nama_license"
                                        placeholder="nama_license" name="nama_license"
                                        value="{{ $training_license->nama_license ?? old('nama_license') }}">
                                    @error('nama_license')
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
                                        placeholder="keterangan" name="keterangan"
                                        value="{{ $training_license->keterangan ?? old('keterangan') }}">
                                    @error('keterangan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="jml">Jumlah</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('jml') is-invalid @enderror" id="jml"
                                        placeholder="jml" name="jml" value="{{ $training_license->jml ?? old('jml') }}">
                                    @error('jml')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tgl_start">Mulai</label>
                                    <input type="date" autocomplete="off"
                                        class="form-control @error('tgl_start') is-invalid @enderror" id="tgl_start"
                                        placeholder="tgl_start" name="tgl_start"
                                        value="{{ $training_license->tgl_start ?? old('tgl_start') }}">
                                    @error('tgl_start')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        {{-- </div>

                        <div class="row"> --}}
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tgl_end">Selesai</label>
                                    <input type="date" autocomplete="off"
                                        class="form-control @error('tgl_end') is-invalid @enderror" id="tgl_end"
                                        placeholder="tgl_end" name="tgl_end"
                                        value="{{ $training_license->tgl_end ?? old('tgl_end') }}">
                                    @error('tgl_end')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pic">PIC</label>
                                    <select name="pic" class="form-control" id="pic">
                                        <option value="XXX">Jenis</option>
                                        @foreach ($pics as $pic)
                                            @if ($pic->kode == $training_license->pic)
                                                <option selected="selected" value={{ $pic->kode }}>{{ $pic->nama }}
                                                </option>
                                            @else
                                                <option value={{ $pic->kode }}>{{ $pic->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('pic')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        {{-- </div>

                        <div class="row"> --}}
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="status">Status Aktif</label>
                                    <select name="status" class="form-control" id="status">
                                        @foreach ($statuss as $status)
                                            @if ($status->kode == $training_license->kode)
                                                <option selected="selected" value={{ $status->kode }}>{{ $status->desc }}
                                                </option>
                                            @else
                                                <option value={{ $status->kode }}>{{ $status->desc }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="id_panjang">id_panjang</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('id_panjang') is-invalid @enderror" id="id_panjang"
                                        placeholder="id_panjang" name="id_panjang"
                                        value="{{ $training_license->id_panjang ?? old('id_panjang') }}" readonly>
                                    @error('id_panjang')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('training_licenses.index') }}" class="btn btn-default">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
