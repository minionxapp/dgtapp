@extends('adminlte::page')

@section('title', 'List Departemen')

@section('content_header')
    <h1 class="m-0 text-dark">List Departemen</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('departemens.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            {{--  'kode','nama','nik_kadept','nama_kadept','divisi_kode','create_by','update_by','folder --}}
                        <tr>
                            <th>No.</th>
                            <th>Divisi</th>
                            <th>Kode Departemen</th>
                            <th>Nama</th>
                            <th>Nik Kadept</th>
                            <th>Nama Kadept</th>                            
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($departemens as $key => $departemen)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$departemen->nama_divisi}}</td>
                                <td>{{$departemen->kode}}</td>
                                <td>{{$departemen->nama}}</td>
                                <td>{{$departemen->nik_kadept}}</td> 
                                <td>{{$departemen->nama_kadept}}</td>                               
                                <td>
                                    <a href="{{route('departemens.edit', $departemen)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('departemens.destroy', $departemen)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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