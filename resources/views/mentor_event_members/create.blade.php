
        @extends('adminlte::page')

        @section('title', 'Tambah Mentor_event_member ')

        @section('content_header')
            <h1 class="m-0 text-dark">Tambah Mentor Kegiatan</h1>
        @stop

        @section('content')
            <form action="{{route('mentor_event_members.store')}}" method="post" {{--enctype="multipart/form-data"--}}>
                @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

        
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="event_id">Kegiatan Id</label>
                            <select name="event_id" class="form-control" id="event_id" readonly>
                                @foreach ($events as $event)
                                    <option value={{ $event->id }}>{{ $event->nama_event }}</option>
                                @endforeach
                            </select>
                            @error('event_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nik_mentor">Mentor</label>
                            <select name="nik_mentor" class="form-control" id="nik_mentor" >
                                <option value=''>Mentor</option>
                                @foreach ($mentors as $mentor)
                                    <option value={{ $mentor->nik }}>{{ $mentor->nik }} | {{ $mentor->nama_pegawai }}</option>
                                @endforeach
                            </select>
                            @error('nik_mentor') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nik_mente">Mente</label>
                            {{-- <input type="text" autocomplete="off" class="form-control @error('nik_mente') is-invalid @enderror" id="nik_mente" placeholder="nik_mente" name="nik_mente" value="{{old('nik_mente')}}"> --}}
                            <select name="nik_mente" class="form-control" id="nik_mente" >
                                <option value=''>Mente</option>
                                @foreach ($mentes as $mente)
                                    <option value={{ $mente->nik }}>{{ $mente->nik }} | {{ $mente->nama_pegawai }}</option>
                                @endforeach
                            </select>
                            @error('nik_mente') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="ket">ket</label>
                            <input type="text" autocomplete="off" class="form-control @error('ket') is-invalid @enderror" id="ket" placeholder="ket" name="ket" value="{{old('ket')}}">
                            @error('ket') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
        </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        
                        <a href="{{route('mentor_event_members_index.index',$surtug)}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </form>
        @stop
         