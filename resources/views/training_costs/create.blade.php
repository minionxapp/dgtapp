
        @extends('adminlte::page')

        @section('title', 'Tambah Training_cost ')

        @section('content_header')
            <h1 class="m-0 text-dark">Tambah Training_cost</h1>
        @stop

        @section('content')
            <form action="{{route('training_costs.store')}}" method="post" {{--enctype="multipart/form-data"--}}>
                @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

        
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="training_plan_id">training_plan_id</label>
                            <select name="training_plan_id" class="form-control" id="training_plan_id">
                                @foreach ($training_plans as $training_plan)
                                <option value={{ $training_plan->id }}>{{ $training_plan->nama_training }}</option>
                                @endforeach
                            </select>
                            @error('training_plan_id') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="ket_biaya">ket_biaya</label>
                            <input type="text" autocomplete="off" class="form-control @error('ket_biaya') is-invalid @enderror" id="ket_biaya" placeholder="ket_biaya" name="ket_biaya" value="{{old('ket_biaya')}}">
                            @error('ket_biaya') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="biaya">biaya</label>
                            <input type="text" autocomplete="off" class="form-control @error('biaya') is-invalid @enderror" id="biaya" placeholder="biaya" name="biaya" value="{{old('biaya')}}">
                            @error('biaya') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="kategori_biaya">kategori_biaya</label>
                            <select name="kategori_biaya" class="form-control" id="kategori_biaya">
                                <option value="XXX">Jenis</option>
                                @foreach ($kategori_biayas as $kategori_biaya)
                                    <option value={{ $kategori_biaya->kode }}>{{ $kategori_biaya->desc }}</option>
                                @endforeach
                            </select>
                            @error('kategori_biaya')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
        </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('training_costs_index.index', Crypt::encrypt($training_plan->id)) }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </form>
        @stop
         