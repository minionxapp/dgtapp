
        @extends('adminlte::page')

        @section('title', 'Edit Training_plan_peserta')

        @section('content_header')
            {{-- <h1 class="m-0 text-dark">Edit Training_plan_peserta</h1><br>
            <a href="{{ route('training_plans.index') }}" >
                List ||  
            </a>
            <a href="{{ route('training_plans.edit', Crypt::encrypt($training_plan->id)) }}"  >
                Training  ||   
            </a>
            <a href="{{ route('training_plan_pesertas.index', Crypt::encrypt($training_plan->id)) }}" >
                Peserta  ||  
            </a>
            <a href="{{ route('training_costs_index.index', Crypt::encrypt($training_plan->id)) }}" >
                Biaya  ||  
            </a> --}}
        @stop

        @section('content')
            <form action="{{route('training_plan_pesertas.update', $training_plan_peserta)}}" method="post">
                @method('PUT')
                @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">               
         
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="training_plan_id">training_plan_id</label>
                             <input type="text" autocomplete="off" class="form-control @error('training_plan_id') is-invalid @enderror" id="training_plan_id" placeholder="training_plan_id" name="training_plan_id" value="{{$training_plan_peserta->training_plan_id ?? old('training_plan_id')}}">
                             @error('training_plan_id') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="nik">nik</label>
                             <input type="text" autocomplete="off" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="nik" name="nik" value="{{$training_plan_peserta->nik ?? old('nik')}}">
                             @error('nik') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="status_peserta">status_peserta</label>
                             <input type="text" autocomplete="off" class="form-control @error('status_peserta') is-invalid @enderror" id="status_peserta" placeholder="status_peserta" name="status_peserta" value="{{$training_plan_peserta->status_peserta ?? old('status_peserta')}}">
                             @error('status_peserta') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                             <label for="keterangan">keterangan</label>
                             <input type="text" autocomplete="off" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="keterangan" name="keterangan" value="{{$training_plan_peserta->keterangan ?? old('keterangan')}}">
                             @error('keterangan') <span class="text-danger">{{$message}}</span> @enderror
                        </div>                        
                    </div>
                </div>
                <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{route('training_plan_pesertas.index')}}" class="btn btn-default">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        @stop
        
        