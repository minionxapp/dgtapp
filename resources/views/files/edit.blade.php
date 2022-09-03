@extends('adminlte::page')

@section('title', 'Edit File')

@section('content_header')
    <h1 class="m-0 text-dark">Edit File</h1>
@stop

@section('content')
    <form action="{{ route('files.update', $file) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="file_group">file_group</label>
                            <input type="text" class="form-control @error('file_group') is-invalid @enderror"
                                id="file_group" placeholder="file_group" name="file_group"
                                value="{{ $file->file_group ?? old('file_group') }}">
                            @error('file_group')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file_id">file_id</label>
                            <input type="text" class="form-control @error('file_id') is-invalid @enderror" id="file_id"
                                placeholder="file_id" name="file_id" value="{{ $file->file_id ?? old('file_id') }}">
                            @error('file_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file_real_name">file_real_name</label>
                            <input type="text" class="form-control @error('file_real_name') is-invalid @enderror"
                                id="file_real_name" placeholder="file_real_name" name="file_real_name"
                                value="{{ $file->file_real_name ?? old('file_real_name') }}">
                            @error('file_real_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file_name">file_name</label>
                            <input type="text" class="form-control @error('file_name') is-invalid @enderror"
                                id="file_name" placeholder="file_name" name="file_name"
                                value="{{ $file->file_name ?? old('file_name') }}">
                            @error('file_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file_path">file_path</label>
                            <input type="text" class="form-control @error('file_path') is-invalid @enderror"
                                id="file_path" placeholder="file_path" name="file_path"
                                value="{{ $file->file_path ?? old('file_path') }}">
                            @error('file_path')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file_size">file_size</label>
                            <input type="text" class="form-control @error('file_size') is-invalid @enderror"
                                id="file_size" placeholder="file_size" name="file_size"
                                value="{{ $file->file_size ?? old('file_size') }}">
                            @error('file_size')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file_type">file_type</label>
                            <input type="text" class="form-control @error('file_type') is-invalid @enderror"
                                id="file_type" placeholder="file_type" name="file_type"
                                value="{{ $file->file_type ?? old('file_type') }}">
                            @error('file_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('files.index') }}" class="btn btn-default">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @stop
