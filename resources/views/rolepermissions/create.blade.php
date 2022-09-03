@extends('adminlte::page')

@section('title', 'Tambah Divisi')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah RolePermission</h1>
@stop

@section('content')
    <form action="{{ route('rolepermissions.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="form-group">
                            <label for="permission_id">permission_id</label>
                            {{-- <input type="text" class="form-control @error('permission_id') is-invalid @enderror"
                                id="permission_id" placeholder="permission_id" name="permission_id"
                                value="{{ old('permission_id') }}">
                            @error('permission_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}




                            <select name="permission_id" class="form-control" id="permission_id">
                                <option value="">Permission Name</option>
                                @foreach ($permissions as $permission)
                                    <option value={{$permission->id}}>{{$permission->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="role_id">Role Name</label>
                            {{-- <input type="text" class="form-control @error('role_id') is-invalid @enderror" id="role_id"
                                placeholder="role_id" name="role_id" value="{{ old('role_id') }}">
                            @error('role_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                            <select name="role_id" class="form-control" id="role_id">
                                <option value="">role_id</option>
                                @foreach ($roles as $role)
                                    <option value={{$role->id}}>{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>

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
