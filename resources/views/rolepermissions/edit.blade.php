@extends('adminlte::page')

@section('title', 'Edit RolePermission')

@section('content_header')
    <h1 class="m-0 text-dark">Edit RolePermission</h1>
@stop

@section('content')
    <form action="{{ route('rolepermissions.update', $rolepermission) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="permission_id">permission_id</label>
                            <input type="text" class="form-control @error('permission_id') is-invalid @enderror"
                                id="permission_id" placeholder="permission_id" name="permission_id"
                                value="{{ $rolepermission->permission_id ?? old('permission_id') }}">
                            @error('permission_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role_id">role_id</label>
                            <input type="text" class="form-control @error('role_id') is-invalid @enderror" id="role_id"
                                placeholder="role_id" name="role_id"
                                value="{{ $rolepermission->role_id ?? old('role_id') }}">
                            @error('role_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('rolepermissions.index') }}" class="btn btn-default">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @stop
