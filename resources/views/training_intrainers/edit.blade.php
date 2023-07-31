
        @extends('adminlte::page')

        @section('title', 'Edit Training_intrainer')

        @section('content_header')
            <h1 class="m-0 text-dark">Edit Training_intrainer</h1>
        @stop

        @section('content')
            <form action="{{route('training_intrainers.update', $training_intrainer)}}" method="post">
                @method('PUT')
                @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">               
         
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="nip">nip</label>
                             <input type="text" autocomplete="off" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="nip" name="nip" value="{{$training_intrainer->nip ?? old('nip')}}">
                             @error('nip') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="nama_trainer">nama_trainer</label>
                             <input type="text" autocomplete="off" class="form-control @error('nama_trainer') is-invalid @enderror" id="nama_trainer" placeholder="nama_trainer" name="nama_trainer" value="{{$training_intrainer->nama_trainer ?? old('nama_trainer')}}">
                             @error('nama_trainer') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="training_plan_id">training_plan_id</label>
                             <input type="text" autocomplete="off" class="form-control @error('training_plan_id') is-invalid @enderror" id="training_plan_id" placeholder="training_plan_id" name="training_plan_id" value="{{$training_intrainer->training_plan_id ?? old('training_plan_id')}}">
                             @error('training_plan_id') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="materi">materi</label>
                             <input type="text" autocomplete="off" class="form-control @error('materi') is-invalid @enderror" id="materi" placeholder="materi" name="materi" value="{{$training_intrainer->materi ?? old('materi')}}">
                             @error('materi') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="catatan">catatan</label>
                             <input type="text" autocomplete="off" class="form-control @error('catatan') is-invalid @enderror" id="catatan" placeholder="catatan" name="catatan" value="{{$training_intrainer->catatan ?? old('catatan')}}">
                             @error('catatan') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="internal">internal</label>
                            <select name="internal" class="form-control" id="internal">
                                <option value="XXX">Jenis</option>
                                @foreach ($internals as $internal)
                                    @if ($internal->kode == $training_intrainer->kode)
                                        <option selected="selected" value={{ $internal->kode }}>{{ $internal->desc }}</option>
                                    @else
                                        <option value={{ $internal->kode }}>{{ $internal->desc }}</option>
                                    @endif

                                @endforeach
                            </select>
                            @error('internal')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{route('training_intrainers.index')}}" class="btn btn-default">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        @stop
        
        