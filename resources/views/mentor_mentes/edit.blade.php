
        @extends('adminlte::page')

        @section('title', 'Edit Mentor_mente')

        @section('content_header')
            <h1 class="m-0 text-dark">Edit Mentor_mente</h1>
        @stop

        @section('content')
            <form action="{{route('mentor_mentes.update', $mentor_mente)}}" method="post">
                @method('PUT')
                @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">               
         
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="no_surtug">no_surtug</label>
                            <select name="no_surtug" class="form-control" id="no_surtug">
                                <option value="XXX">Jenis</option>
                                @foreach ($no_surtugs as $no_surtug)
                                    @if ($no_surtug->kode == $mentor_mente->kode)
                                        <option selected="selected" value={{ $no_surtug->kode }}>{{ $no_surtug->desc }}</option>
                                    @else
                                        <option value={{ $no_surtug->kode }}>{{ $no_surtug->desc }}</option>
                                    @endif

                                @endforeach
                            </select>
                            @error('no_surtug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="nik">nik</label>
                             <input type="text" autocomplete="off" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="nik" name="nik" value="{{$mentor_mente->nik ?? old('nik')}}">
                             @error('nik') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="ket">ket</label>
                             <input type="text" autocomplete="off" class="form-control @error('ket') is-invalid @enderror" id="ket" placeholder="ket" name="ket" value="{{$mentor_mente->ket ?? old('ket')}}">
                             @error('ket') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{route('mentor_mentes.index')}}" class="btn btn-default">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        @stop
        
        