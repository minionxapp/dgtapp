@extends('adminlte::page')

@section('title', 'Edit UserRole')

@section('content_header')
    <h1 class="m-0 text-dark">Edit UserRole</h1>
@stop

@section('content')
    <form action="{{ route('userroles.update', $userrole) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="role_id">role_id</label>
                            <input type="text" class="form-control @error('role_id') is-invalid @enderror" id="role_id"
                                placeholder="role_id" name="role_id" value="{{ $userrole->role_id ?? old('role_id') }}">
                            @error('role_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="model_type">model_type</label>
                            <input type="text" class="form-control @error('model_type') is-invalid @enderror"
                                id="model_type" placeholder="model_type" name="model_type"
                                value="{{ $userrole->model_type ?? old('model_type') }}">
                            @error('model_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="model_id">model_id</label>
                            <input type="text" class="form-control @error('model_id') is-invalid @enderror"
                                id="model_id" placeholder="model_id" name="model_id"
                                value="{{ $userrole->model_id ?? old('model_id') }}">
                            @error('model_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('userroles.index') }}" class="btn btn-default">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @stop
