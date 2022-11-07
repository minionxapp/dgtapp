
        @extends('adminlte::page')

        @section('title', 'Edit Project')

        @section('content_header')
            <h1 class="m-0 text-dark">Edit Project</h1>
        @stop

        @section('content')
            <form action="{{route('projects.update', $project)}}" method="post">
                @method('PUT')
                @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">               
         
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="kode">kode</label>
                             <input type="text" autocomplete="off" class="form-control @error('kode') is-invalid @enderror" id="kode" placeholder="kode" name="kode" value="{{$project->kode ?? old('kode')}}">
                             @error('kode') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                <div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="nama">nama</label>
                             <input type="text" autocomplete="off" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="nama" name="nama" value="{{$project->nama ?? old('nama')}}">
                             @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                <div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="jenis">jenis</label>
                            <select name="jenis" class="form-control" id="jenis">
                                <option value="XXX">Jenis</option>
                                @foreach ($jeniss as $jenis)
                                    @if ($jenis->kode == $project->kode)
                                        <option selected="selected" value={{ $jenis->kode }}>{{ $jenis->desc }}</option>
                                    @else
                                        <option value={{ $jenis->kode }}>{{ $jenis->desc }}</option>
                                    @endif

                                @endforeach
                            </select>
                            @error('jenis')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="divisi_kode">divisi_kode</label>
                            <select name="divisi_kode" class="form-control" id="divisi_kode">
                                <option value="XXX">Jenis</option>
                                @foreach ($divisi_kodes as $divisi_kode)
                                    @if ($divisi_kode->kode == $project->kode)
                                        <option selected="selected" value={{ $divisi_kode->kode }}>{{ $divisi_kode->desc }}</option>
                                    @else
                                        <option value={{ $divisi_kode->kode }}>{{ $divisi_kode->desc }}</option>
                                    @endif

                                @endforeach
                            </select>
                            @error('divisi_kode')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="departemen_kode">departemen_kode</label>
                            <select name="departemen_kode" class="form-control" id="departemen_kode">
                                <option value="XXX">Jenis</option>
                                @foreach ($departemen_kodes as $departemen_kode)
                                    @if ($departemen_kode->kode == $project->kode)
                                        <option selected="selected" value={{ $departemen_kode->kode }}>{{ $departemen_kode->desc }}</option>
                                    @else
                                        <option value={{ $departemen_kode->kode }}>{{ $departemen_kode->desc }}</option>
                                    @endif

                                @endforeach
                            </select>
                            @error('departemen_kode')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="unit_req">unit_req</label>
                            <select name="unit_req" class="form-control" id="unit_req">
                                <option value="XXX">Jenis</option>
                                @foreach ($unit_reqs as $unit_req)
                                    @if ($unit_req->kode == $project->kode)
                                        <option selected="selected" value={{ $unit_req->kode }}>{{ $unit_req->desc }}</option>
                                    @else
                                        <option value={{ $unit_req->kode }}>{{ $unit_req->desc }}</option>
                                    @endif

                                @endforeach
                            </select>
                            @error('unit_req')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="pic_req">pic_req</label>
                             <input type="text" autocomplete="off" class="form-control @error('pic_req') is-invalid @enderror" id="pic_req" placeholder="pic_req" name="pic_req" value="{{$project->pic_req ?? old('pic_req')}}">
                             @error('pic_req') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                <div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="keterangan">keterangan</label>
                             <input type="text" autocomplete="off" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="keterangan" name="keterangan" value="{{$project->keterangan ?? old('keterangan')}}">
                             @error('keterangan') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                <div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="file01">file01</label>
                             <input type="text" autocomplete="off" class="form-control @error('file01') is-invalid @enderror" id="file01" placeholder="file01" name="file01" value="{{$project->file01 ?? old('file01')}}">
                             @error('file01') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                <div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="file02">file02</label>
                             <input type="text" autocomplete="off" class="form-control @error('file02') is-invalid @enderror" id="file02" placeholder="file02" name="file02" value="{{$project->file02 ?? old('file02')}}">
                             @error('file02') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                <div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="gambar">gambar</label>
                             <input type="text" autocomplete="off" class="form-control @error('gambar') is-invalid @enderror" id="gambar" placeholder="gambar" name="gambar" value="{{$project->gambar ?? old('gambar')}}">
                             @error('gambar') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                <div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="start_plan">start_plan</label>
                            <input type="date" autocomplete="off" class="form-control @error('start_plan') is-invalid @enderror" id="start_plan" placeholder="start_plan" name="start_plan" value="{{$project->start_plan ?? old('start_plan')}}">
                            @error('start_plan') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="end_plan">end_plan</label>
                            <input type="date" autocomplete="off" class="form-control @error('end_plan') is-invalid @enderror" id="end_plan" placeholder="end_plan" name="end_plan" value="{{$project->end_plan ?? old('end_plan')}}">
                            @error('end_plan') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="divisi_assignto">divisi_assignto</label>
                            <select name="divisi_assignto" class="form-control" id="divisi_assignto">
                                <option value="XXX">Jenis</option>
                                @foreach ($divisi_assigntos as $divisi_assignto)
                                    @if ($divisi_assignto->kode == $project->kode)
                                        <option selected="selected" value={{ $divisi_assignto->kode }}>{{ $divisi_assignto->desc }}</option>
                                    @else
                                        <option value={{ $divisi_assignto->kode }}>{{ $divisi_assignto->desc }}</option>
                                    @endif

                                @endforeach
                            </select>
                            @error('divisi_assignto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="dept_assignto">dept_assignto</label>
                            <select name="dept_assignto" class="form-control" id="dept_assignto">
                                <option value="XXX">Jenis</option>
                                @foreach ($dept_assigntos as $dept_assignto)
                                    @if ($dept_assignto->kode == $project->kode)
                                        <option selected="selected" value={{ $dept_assignto->kode }}>{{ $dept_assignto->desc }}</option>
                                    @else
                                        <option value={{ $dept_assignto->kode }}>{{ $dept_assignto->desc }}</option>
                                    @endif

                                @endforeach
                            </select>
                            @error('dept_assignto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="file_desc01">file_desc01</label>
                             <input type="text" autocomplete="off" class="form-control @error('file_desc01') is-invalid @enderror" id="file_desc01" placeholder="file_desc01" name="file_desc01" value="{{$project->file_desc01 ?? old('file_desc01')}}">
                             @error('file_desc01') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                <div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="file_uri01">file_uri01</label>
                             <input type="text" autocomplete="off" class="form-control @error('file_uri01') is-invalid @enderror" id="file_uri01" placeholder="file_uri01" name="file_uri01" value="{{$project->file_uri01 ?? old('file_uri01')}}">
                             @error('file_uri01') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                <div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="file_desc02">file_desc02</label>
                             <input type="text" autocomplete="off" class="form-control @error('file_desc02') is-invalid @enderror" id="file_desc02" placeholder="file_desc02" name="file_desc02" value="{{$project->file_desc02 ?? old('file_desc02')}}">
                             @error('file_desc02') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                <div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="file_uri02">file_uri02</label>
                             <input type="text" autocomplete="off" class="form-control @error('file_uri02') is-invalid @enderror" id="file_uri02" placeholder="file_uri02" name="file_uri02" value="{{$project->file_uri02 ?? old('file_uri02')}}">
                             @error('file_uri02') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                <div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="pic_assignto">pic_assignto</label>
                             <input type="text" autocomplete="off" class="form-control @error('pic_assignto') is-invalid @enderror" id="pic_assignto" placeholder="pic_assignto" name="pic_assignto" value="{{$project->pic_assignto ?? old('pic_assignto')}}">
                             @error('pic_assignto') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                <div>
                <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{route('projects.index')}}" class="btn btn-default">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        @stop
        
        