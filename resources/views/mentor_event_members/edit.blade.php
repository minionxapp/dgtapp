
        @extends('adminlte::page')

        @section('title', 'Edit Mentor_event_member')

        @section('content_header')
            <h1 class="m-0 text-dark">Edit Mentor_event_member</h1>
        @stop

        @section('content')
            <form action="{{route('mentor_event_members.update', $mentor_event_member)}}" method="post">
                @method('PUT')
                @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">               
         
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="event_id">event_id</label>
                            <select name="event_id" class="form-control" id="event_id">
                                <option value="XXX">Jenis</option>
                                @foreach ($event_ids as $event_id)
                                    @if ($event_id->kode == $mentor_event_member->kode)
                                        <option selected="selected" value={{ $event_id->kode }}>{{ $event_id->desc }}</option>
                                    @else
                                        <option value={{ $event_id->kode }}>{{ $event_id->desc }}</option>
                                    @endif

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
                             <label for="nik_mentor">nik_mentor</label>
                             <input type="text" autocomplete="off" class="form-control @error('nik_mentor') is-invalid @enderror" id="nik_mentor" placeholder="nik_mentor" name="nik_mentor" value="{{$mentor_event_member->nik_mentor ?? old('nik_mentor')}}">
                             @error('nik_mentor') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="nik_mente">nik_mente</label>
                             <input type="text" autocomplete="off" class="form-control @error('nik_mente') is-invalid @enderror" id="nik_mente" placeholder="nik_mente" name="nik_mente" value="{{$mentor_event_member->nik_mente ?? old('nik_mente')}}">
                             @error('nik_mente') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="ket">ket</label>
                             <input type="text" autocomplete="off" class="form-control @error('ket') is-invalid @enderror" id="ket" placeholder="ket" name="ket" value="{{$mentor_event_member->ket ?? old('ket')}}">
                             @error('ket') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{route('mentor_event_members.index')}}" class="btn btn-default">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        @stop
        
        