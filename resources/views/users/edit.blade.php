@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1 class="m-0 text-dark">Edit User</h1>
@stop

@section('content')
    <form action="{{route('users.update', $user)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputUSerName">User Id</label>
                        <input type="text" class="form-control @error('user_id') is-invalid @enderror" id="user_id" placeholder="User ID" name="user_id" value="{{$user->user_id ?? old('user_id')}}" readonly>
                        @error('user_id') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama lengkap" name="name" value="{{$user->name ?? old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{$user->email ?? old('email')}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword" placeholder="Konfirmasi Password" name="password_confirmation">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword">Divisi</label>
                        <select name="divisi_kode" class="form-control" id="divisi_kode">
                            <option value="">Divisi</option>
                            @foreach ($divisis as $divisi)
                            @if ($divisi->kode ==$user->divisi_kode)
                                <option value={{$divisi->kode}} selected="selected">{{$divisi->nama}}</option>
                            @else
                                <option value={{$divisi->kode}}>{{$divisi->nama}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword">Departemen</label>
                        <select name="departemen_kode" class="form-control" id="departemen_kode">
                            <option value="">Departemen</option>
                            @foreach ($departemens as $departemen)
                            @if ($departemen->kode ==$user->departemen_kode)
                                <option value={{$departemen->kode}} selected="selected">{{$departemen->nama}}</option>
                            @else
                            <option value={{$departemen->kode}}>{{$departemen->nama}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('users.index')}}" class="btn btn-default">
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
            $('select[name="' + 'divisi_kode' + '"]').on('change', function() {
                createSelect('departemen_kode', 'kode', 'nama', '/departemens_divisi/'+$(this).val() );
            });
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