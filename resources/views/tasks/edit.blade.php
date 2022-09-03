@extends('adminlte::page')

@section('title', 'Edit Task')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Task</h1>
@stop

@section('content')
    <form action="{{route('tasks.update', $task)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="exampleInputName">Kode</label>
                                    <input type="text" class="form-control @error('kode') is-invalid @enderror" id="exampleInputName" placeholder="Kode Task" name="kode" value="{{$task->kode ?? old('kode')}}" readonly>
                                    @error('kode') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="form-group">
                                    <label for="exampleInputName">Task/Project</label>
                                    <input type="text" class="form-control @error('kode') is-invalid @enderror" id="nm_project" placeholder="nm_project" name="nm_project" value="{{$task->nm_project ??old('nm_project')}}">
                                    @error('nm_project') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                        </div>
    
    
                        <div class="form-group">
                            <label for="exampleInputName">Deskripsi</label>
                            <input type="text" class="form-control @error('descripsi') is-invalid @enderror" id="descripsi" placeholder="descripsi" name="descripsi" value="{{$task->descripsi ?? old('descripsi')}}">
                            @error('descripsi') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword">Divisi</label>
                                    <select name="divisi_kode" class="form-control" id="divisi_kode">
                                        <option value="">Divisi</option>
                                        @foreach ($divisis as $divisi)
                                        @if ($divisi->kode ==$task->divisi_kode)
                                            <option value={{$divisi->kode}} selected="selected">{{$divisi->nama}}</option>
                                        @else
                                            <option value={{$divisi->kode}}>{{$divisi->nama}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword">Departemen</label>
                                    <select name="departemen_kode" class="form-control" id="departemen_kode">
                                        <option value="">Departemen</option>
                                        @foreach ($departemens as $departemen)
                                        @if ($departemen->kode ==$task->departemen_kode)
                                            <option value={{$departemen->kode}} selected="selected">{{$departemen->nama}}</option>
                                        @else
                                        <option value={{$departemen->kode}}>{{$departemen->nama}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputName">Mulai</label>
                                    <input type="date" class="form-control @error('mulai') is-invalid @enderror" id="mulai" placeholder="mulai" name="mulai" value="{{$task->mulai ?? old('mulai')}}">
                                    @error('mulai') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputName">Selesai</label>
                                    <input type="date" class="form-control @error('selesai') is-invalid @enderror" id="selesai" placeholder="selesai" name="selesai" value="{{$task->selesai ?? old('selesai')}}">
                                    @error('selesai') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputName">Jenis</label>
                                    <select name="jenis" class="form-control" id="jenis">
                                        <option value="">Jenis</option>
                                        @foreach ($paramjenis as $jenis)
                                            @if ($task->jenis ==$jenis->kode)
                                                <option value={{$jenis->kode}}  selected="selected">{{$jenis->desc}}</option>
                                            @else
                                                <option value={{$jenis->kode}}  >{{$jenis->desc}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputName">PIC</label>
                                    <input type="text" class="form-control @error('pic') is-invalid @enderror" id="pic" placeholder="pic" name="pic" value="{{$task->pic ?? old('pic')}}">
                                    @error('pic') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputName">Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="">Status</option>
                                        @foreach ($params as $param)
                                            @if ($task->status ==$param->kode)
                                                <option value={{$param->kode}} selected="selected">{{$param->desc}}</option>
                                            @else
                                                <option value={{$param->kode}} >{{$param->desc}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                            <input class="form-control" type="file" id="file"  name="file">
                            @foreach ($files as $file)
                                <a href="/upload/task/{{ $file->file_name }}">{{ $file->file_real_name }}</a>
                            @endforeach

                        </div>
                       
    
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{route('tasks.index')}}" class="btn btn-default">
                                Batal
                            </a>
                        </div>
                </div>
            </div>
        </div>
@stop