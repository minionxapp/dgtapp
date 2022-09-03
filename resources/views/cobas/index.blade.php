@extends('adminlte::page')

@section('title', 'List Coba')

@section('content_header')
    <h1 class="m-0 text-dark">List Coba</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('cobas.create')
                        <a href="{{ route('cobas.create') }}" class="btn btn-primary mb-2">
                            Tambah
                        </a>
                    @endcan
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>nama</th>
                                <th>alamat</th>

                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($cobas as $key => $coba)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $coba->nama }}</td>
                                    <td>{{ $coba->alamat }}</td>

                                    <td>
                                        @can('cobas.edit')
                                            <a href="{{ route('cobas.edit', $coba) }}" class="btn btn-primary btn-xs">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('cobas.delete')
                                            <a href="{{ route('cobas.destroy', $coba) }}"
                                                onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                                Delete
                                            </a>
                                        @endcan
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
