@extends('adminlte::page')

@section('title', 'Edit Permission')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Permission</h1>
@stop

@section('content')
    <form action="{{ route('permissions.update', $permission) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id">id</label>
                            <input type="text" class="form-control @error('id') is-invalid @enderror" id="id"
                                placeholder="id" name="id" value="{{ $permission->id ?? old('id') }}">
                            @error('id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="name" name="name" value="{{ $permission->name ?? old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="guard_name">guard_name</label>
                            <input type="text" class="form-control @error('guard_name') is-invalid @enderror"
                                id="guard_name" placeholder="guard_name" name="guard_name"
                                value="{{ $permission->guard_name ?? old('guard_name') }}">
                            @error('guard_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('permissions.index') }}" class="btn btn-default">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @stop
