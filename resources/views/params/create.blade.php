@extends('adminlte::page')

@section('title', 'Tambah Param')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Param</h1>
@stop

@section('content')
    <form action="{{route('params.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
{{-- "nama","kode","desc","aktif","urut","create_by","update_by" --}}
                    <div class="form-group">
                        <label for="exampleInputName">Kode</label>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" id="exampleInputName" placeholder="Kode Param" name="kode" value="{{old('kode')}}">
                        @error('kode') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Nama Paramenter</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail" placeholder="Nama Param" name="nama" value="{{old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword">Deskripsi</label>
                        <input type="text" class="form-control @error('desc') is-invalid @enderror" id="desc" placeholder="desc" name="desc" value="{{old('desc')}}">
                        @error('desc') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="exampleInputPassword">Aktif</label>
                        <input type="text" class="form-control" id="aktif" placeholder="aktif" name="aktif" value="{{old('aktif')}}">
                        @error('aktif') <span class="text-danger">{{$message}}</span> @enderror
                    </div> --}}


                    <select name="aktif" class="form-control" id="aktif">
                        <option value="">Aktif</option>
                        @foreach ($params as $param)
                            <option value={{$param->kode}}>{{$param->desc}}</option>
                        @endforeach
                    </select>



                    <div class="form-group">
                        <label for="exampleInputPassword">Urut</label>
                        <input type="text" class="form-control" id="urut" placeholder="urut" name="urut" value="{{old('urut')}}">
                        @error('urut') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('params.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
   
    <script>
    $(document).ready(function() {            
        // $('select[name="' + 'divisi_kode' + '"]').on('change', function() {
            // createSelect('aktif', 'kode', 'desc', '/param_nama/'+'YESNO' );
        // });
    })

    function createSelect(params, kode, nama, url) {
            $('select[name="' + params + '"]').empty();
            $.ajax({
                url: url,
                type: "GET",
                async: false,
                dataType: "json",
                success: function(data) {
                    $('select[name="' + params + '"]').empty();
                    $('select[name="' + params + '"]').append('<option value="' +
                        '">' + '-Pilih-' + '</option>');
                    $.each(data, function(key, value) {
                        $('select[name="' + params + '"]').append('<option value="' +
                            value[kode] + '">' + value[nama] + '</option>');
                    });
                }
            });
        }

    </script>
@endpush