@extends('adminlte::page')

@section('title', 'Edit Training_note')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Trainee Info</h1>
@stop

@section('content')
    <form action="{{ route('training_notes.update', $training_note) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="nip">Nik</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('nip') is-invalid @enderror" id="nip"
                                        placeholder="nip" name="nip" value="{{ $training_note->nip ?? old('nip') }}" readonly>
                                    @error('nip')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="form-group">
                                    <label for="nama_pegawai">Nama Pegawai</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('nama_pegawai') is-invalid @enderror" id="nama_pegawai"
                                        placeholder="nama_pegawai" name="nama_pegawai"
                                        value="{{ $training_note->nama_pegawai ?? old('nama_pegawai') }}" readonly>
                                    @error('nama_pegawai')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pilihan">pilihan</label>
                                    <select name="pilihan" class="form-control" id="pilihan">
                                        <option value="XXX">Jenis</option>
                                        @foreach ($pilihans as $pilihan)
                                            @if ($pilihan->kode == $training_note->pilihan)
                                                <option selected="selected" value={{ $pilihan->kode }}>{{ $pilihan->desc }}</option>
                                            @else
                                                <option value={{ $pilihan->kode }}>{{ $pilihan->desc }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('pilihan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tahun">tahun</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('tahun') is-invalid @enderror" id="tahun"
                                        placeholder="tahun" name="tahun"
                                        value="{{ $training_note->tahun ?? old('tahun') }}">
                                    @error('tahun')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="event">event</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('event') is-invalid @enderror" id="event"
                                        placeholder="event" name="event"
                                        value="{{ $training_note->event ?? old('event') }}">
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
                                        placeholder="date_start" name="date_start"
                                        value="{{ $training_note->date_start ?? old('date_start') }}">
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
                                        placeholder="date_end" name="date_end"
                                        value="{{ $training_note->date_end ?? old('date_end') }}">
                                    @error('date_end')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="note">note</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('note') is-invalid @enderror" id="note"
                                        placeholder="note" name="note"
                                        value="{{ $training_note->note ?? old('note') }}">
                                    @error('note')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
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
