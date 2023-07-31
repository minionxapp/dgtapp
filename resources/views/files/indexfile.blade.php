@extends('adminlte::page')

@section('title', 'List File')

@section('content_header')
    <h1 class="m-0 text-dark">File :: {{ $nama_training }}</h1></p>
    @include('include.trmenu') 
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('files.create')
                        <a href="{{ route('files.createfile', $training_id) }}" class="btn btn-primary mb-2">
                            Tambah
                        </a>
                    @endcan
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                {{-- <th>file_group</th> --}}
                                {{-- <th>file_id</th> --}}
                                <th>file_real_name</th>
                                <th>file_desc</th>
                                {{-- <th>file_name</th> --}}
                                {{-- <th>file_path</th> --}}
                                <th>file_size</th>
                                {{-- <th>file_type</th> --}}

                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($files as $key => $file)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    {{-- <td>{{ $file->file_group }}</td> --}}
                                    {{-- <td>{{ $file->file_id }}</td> --}}
                                    <td>{{ $file->file_real_name }}</td>
                                    <td>{{ $file->file_desc }}</td>
                                    {{-- <td>{{ $file->file_name }}</td> --}}
                                    {{-- <td>{{ $file->file_path }}</td> --}}
                                    <td>{{ $file->file_size }}</td>
                                    {{-- <td>{{ $file->file_type }}</td> --}}

                                    <td>
                                        @can('files.edit')
                                            <a href="{{ route('files.edit', $file) }}" class="btn btn-primary btn-xs">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('files.delete')
                                            <a href="{{ route('files.destroy', Crypt::encrypt($file->id)) }}"
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
