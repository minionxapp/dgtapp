@extends('adminlte::page')

@section('title', 'List RolePermission')

@section('content_header')
    <h1 class="m-0 text-dark">List RolePermission</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{ route('rolepermissions.create') }}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                {{-- <th>role_id</th> --}}
                                <th>role name</th>
                                {{-- <th>permission_id</th> --}}
                                <th>permission_name</th>

                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($rolepermissions as $key => $rolepermission)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    {{-- <td>{{ $rolepermission->role_id }}</td> --}}
                                    <td>{{ $rolepermission->role_name }}</td>
                                    {{-- <td>{{ $rolepermission->permission_id }}</td> --}}
                                    <td>{{ $rolepermission->permission_name }}</td>
                                    

                                    <td>
                                        {{-- <a href="{{ route('rolepermissions.edit', $rolepermission) }}"
                                            class="btn btn-primary btn-xs">
                                            Edit
                                        </a>--}}
                                        <a href="{{ route('rolepermissions.destroy', $rolepermission->permission_id.'|'.$rolepermission->role_id) }}"
                                            onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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
