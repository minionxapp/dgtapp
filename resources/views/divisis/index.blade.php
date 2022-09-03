@extends('adminlte::page')

@section('title', 'List Divisi')

@section('content_header')
    <h1 class="m-0 text-dark">List Divisi</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('divisis.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Nik Kadiv</th>
                            <th>Nama Kadiv</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($divisis as $key => $divisi)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$divisi->kode}}</td>
                                <td>{{$divisi->nama}}</td>
                                <td>{{$divisi->nik_kadiv}}</td>
                                <td>{{$divisi->nama_kadiv}}</td>                                
                                <td>
                                    <a href="{{route('divisis.edit', $divisi)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('divisis.destroy', $divisi)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush