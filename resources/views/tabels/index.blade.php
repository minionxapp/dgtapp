@extends('adminlte::page')

@section('title', 'List Tabel')

@section('content_header')
    <h1 class="m-0 text-dark">List Tabel</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- @can('tabels.create') --}}
                    <a href="{{route('tabels.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    {{-- @endcan --}}
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Desc1</th>
                            <th>Desc2</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tabels as $key => $tabels)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$tabels->nama}}</td>
                                <td>{{$tabels->desc1}}</td>
                                <td>{{$tabels->desc2}}</td>
                                <td>
                                    <a href="{{route('tabels.edit', $tabels)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('tabels.destroy', $tabels)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                    <a href="{{route('koloms.detail', $tabels)}}" class="btn btn-primary btn-xs">
                                        Detail
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
            // "paging": false
            // "iDisplayLength": 100,
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