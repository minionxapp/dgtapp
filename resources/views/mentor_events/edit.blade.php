@extends('adminlte::page')

@section('title', 'Edit Mentor_event')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Mentor_event</h1>
@stop

@section('content')
    <form action="{{ route('mentor_events.update', $mentor_event) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="no_surtug">no_surtug</label>
                                    <select name="no_surtug" class="form-control" id="no_surtug">
                                        <option value="">Surat Tugas</option>
                                        @foreach ($no_surtugs as $no_surtug)
                                            @if ($no_surtug->kode == $mentor_event->kode)
                                                <option selected="selected" value={{ $no_surtug->id }}>
                                                    {{ $no_surtug->no_surtug}} | {{ $no_surtug->uraian}}</option>
                                            @else
                                                <option value={{ $no_surtug->id }}>{{ $no_surtug->no_surtug}} | {{ $no_surtug->uraian}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('no_surtug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama_event">nama_event</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('nama_event') is-invalid @enderror" id="nama_event"
                                        placeholder="nama_event" name="nama_event"
                                        value="{{ $mentor_event->nama_event ?? old('nama_event') }}">
                                    @error('nama_event')
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
                                        placeholder="ket" name="ket" value="{{ $mentor_event->ket ?? old('ket') }}">
                                    @error('ket')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="tgl_mulai">tgl_mulai</label>
                                    <input type="date" autocomplete="off"
                                        class="form-control @error('tgl_mulai') is-invalid @enderror" id="tgl_mulai"
                                        placeholder="tgl_mulai" name="tgl_mulai"
                                        value="{{ $mentor_event->tgl_mulai ?? old('tgl_mulai') }}">
                                    @error('tgl_mulai')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="tgl_selesai">tgl_selesai</label>
                                    <input type="date" autocomplete="off"
                                        class="form-control @error('tgl_selesai') is-invalid @enderror" id="tgl_selesai"
                                        placeholder="tgl_selesai" name="tgl_selesai"
                                        value="{{ $mentor_event->tgl_selesai ?? old('tgl_selesai') }}">
                                    @error('tgl_selesai')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('mentor_events.index') }}" class="btn btn-default">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
