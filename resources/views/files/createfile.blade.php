@extends('adminlte::page')

@section('title', 'Tambah Divisi')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah File</h1>
@stop

@section('content')
    <form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1">
                                <div class="form-group">
                                    <label for="file_group">file_group</label>
                                    <input type="text" class="form-control @error('file_group') is-invalid @enderror" readonly
                                    id="file_group" placeholder="file_group" name="file_group" value="{{ $fileGroup }}">
                                    @error('file_group')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="col-1">
                                <div class="form-group">
                                    <label for="file_id">file_id</label>
                                    <input type="text" class="form-control @error('file_id') is-invalid @enderror" id="file_id" readonly
                                    placeholder="file_id" name="file_id" value="{{ $file_id}}">
                                    @error('file_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <label for="file_real_name">file_real_name</label>
                            <input type="text" class="form-control @error('file_real_name') is-invalid @enderror"
                                id="file_real_name" placeholder="file_real_name" name="file_real_name"
                                value="{{ old('file_real_name') }}">
                            @error('file_real_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        {{-- <div class="form-group">
                            <label for="file_name">file_name</label>
                            <input type="text" class="form-control @error('file_name') is-invalid @enderror"
                                id="file_name" placeholder="file_name" name="file_name" value="{{ old('file_name') }}">
                            @error('file_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        {{-- <div class="form-group">
                            <label for="file_path">file_path</label>
                            <input type="text" class="form-control @error('file_path') is-invalid @enderror"
                                id="file_path" placeholder="file_path" name="file_path" value="{{ old('file_path') }}">
                            @error('file_path')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        {{-- <div class="form-group">
                            <label for="file_size">file_size</label>
                            <input type="text" class="form-control @error('file_size') is-invalid @enderror"
                                id="file_size" placeholder="file_size" name="file_size" value="{{ old('file_size') }}">
                            @error('file_size')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        {{-- <div class="form-group">
                            <label for="file_type">file_type</label>
                            <input type="text" class="form-control @error('file_type') is-invalid @enderror"
                                id="file_type" placeholder="file_type" name="file_type" value="{{ old('file_type') }}">
                            @error('file_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        <div class="form-group">
                            <label for="file_desc">file_desc</label>
                            <input type="text" class="form-control @error('file_desc') is-invalid @enderror"
                                id="file_desc" placeholder="file_desc" name="file_desc" value="{{ old('file_desc') }}">
                            @error('file_desc')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Upload File</label>
                            <input class="form-control" type="file" id="file" name="file">
                        </div>
                        
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('files.indexfile', $training_id) }}" class="btn btn-default">
                            Batal
                        </a>


                        {{-- <a href="{{ route('training_costs_index.index', Crypt::encrypt($training_plan->id)) }}" class="btn btn-default">
                            Batal
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    @stop
