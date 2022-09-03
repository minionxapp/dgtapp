@extends('adminlte::page')

@section('title', 'Tambah User')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah User</h1>
@stop

@section('content')
    <form action="{{route('users.store')}}" method="post" autocomplete="off">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputUSerName">User Id</label>
                        <input type="text"  autocomplete="off" class="form-control @error('user_id') is-invalid @enderror" id="user_id" placeholder="User ID" name="user_id">
                        @error('user_id') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama lengkap" name="name">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Email address</label>
                        <input type="email" autocomplete="off" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email" >
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="Password" placeholder="Password" name="password">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword" placeholder="Konfirmasi Password" name="password_confirmation">
                    </div>

                    <div class="form-group">
                        <select name="divisi_kode" class="form-control" id="divisi_kode">
                            <option value="">Divisi</option>
                            @foreach ($divisis as $divisi)
                                <option value={{$divisi->kode}}>{{$divisi->nama}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <select name="departemen_kode" class="form-control" id="departemen_kode">
                            <option value="">Departemen</option>
                            @foreach ($departemens as $departemen)
                                <option value={{$departemen->kode}}>{{$departemen->nama}}</option>
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
            // $('#user_id').val('');     

            // $('select[name="' + 'divisi_kode' + '"]').on('change', function() {
            //     createSelect('depertemen_kode', 'kode', 'nama', '/departemens_divisi/'+$(this).val() );
            // });
        })


        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
        
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