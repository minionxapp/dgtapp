
        @extends('adminlte::page')

        @section('title', 'Edit Mentor_mentor')

        @section('content_header')
            <h1 class="m-0 text-dark">Edit Mentor_mentor</h1>
        @stop

        @section('content')
            <form action="{{route('mentor_mentors.update', $mentor_mentor)}}" method="post">
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
                             <input type="text" autocomplete="off" class="form-control @error('no_surtug') is-invalid @enderror" id="no_surtug" placeholder="no_surtug" name="no_surtug" value="{{$mentor_mentor->no_surtug ?? old('no_surtug')}}">
                             @error('no_surtug') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="nik">nik</label>
                             <input type="text" autocomplete="off" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="nik" name="nik" value="{{$mentor_mentor->nik ?? old('nik')}}">
                             @error('nik') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="Mentor_ket">Mentor_ket</label>
                             <input type="text" autocomplete="off" class="form-control @error('Mentor_ket') is-invalid @enderror" id="Mentor_ket" placeholder="Mentor_ket" name="Mentor_ket" value="{{$mentor_mentor->Mentor_ket ?? old('Mentor_ket')}}">
                             @error('Mentor_ket') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{route('mentor_mentors.index')}}" class="btn btn-default">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        @stop
        
        