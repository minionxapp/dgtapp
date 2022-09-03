@extends('adminlte::page')

@section('title', 'Tambah Divisi')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah UserRole</h1>
@stop

@section('content')
    <form action="{{ route('userroles.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="form-group">
                            <label for="role_id">Role</label>

                            <select name="role_id" class="form-control" id="role_id">
                                <option value="">Role Name</option>
                                @foreach ($roles as $role)
                                    <option value={{$role->id}}>{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label for="model_type">Model Type</label>

                            <input type="text" class="form-control @error('model_type') is-invalid @enderror"
                                id="model_type" placeholder="model_type" name="model_type" value="{{ old('model_type') }}">
                            @error('model_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        <div class="form-group">
                            <label for="model_id">User Name</label>

                            <select name="model_id" class="form-control" id="model_id">
                                <option value="">User</option>
                                @foreach ($users as $user)
                                    <option value={{$user->id}}>{{$user->user_id}}</option>
                                @endforeach
                            </select>

                            {{-- <input type="text" class="form-control @error('model_id') is-invalid @enderror"
                                id="model_id" placeholder="model_id" name="model_id" value="{{ old('model_id') }}">
                            @error('model_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                        </div>

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
