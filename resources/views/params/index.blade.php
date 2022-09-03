@extends('adminlte::page')

@section('title', 'List Param')

@section('content_header')
    <h1 class="m-0 text-dark">List Param</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('params.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Desc</th>
                            <th>Status</th>
                            <th>Urut</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($params as $key => $param)
                            <tr>
                                {{-- ["nama","kode","desc","aktif","urut","create_by","update_by"] --}}
                                <td>{{$key+1}}</td>
                                <td>{{$param->kode}}</td>
                                <td>{{$param->nama}}</td>
                                <td>{{$param->desc}}</td>
                                <td>{{$param->aktif}}</td>     
                                <td>{{$param->urut}}</td>                            
                                <td>
                                    <a href="{{route('params.edit', $param)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('params.destroy', $param)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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