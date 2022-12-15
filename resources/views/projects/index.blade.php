@extends('adminlte::page')

@section('title', 'List Project')

@section('content_header')
    <h1 class="m-0 text-dark">List Project</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('projects.create')
                        <a href="{{ route('projects.create') }}" class="btn btn-primary mb-2">
                            Tambah
                        </a>
                    @endcan
                    <table class="table table-hover table-bordered table-stripped table-responsive" id="datalist">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>jenis</th>
                                <th>Divisi  </th>
                                <th>Departemen</th>
                                <th>Unit req</th>
                                <th>Pic req</th>
                                {{-- <th>Keterangan</th> --}}
                                {{-- <th>file01</th>
                                <th>file02</th>
                                <th>gambar</th> --}}
                                <th>Mulai</th>
                                <th>Selesai</th>
                                {{-- <th>Divisi assignto</th> --}}
                                {{-- <th>Dept assignto</th> --}}
                                {{-- <th>file_desc01</th>
                                <th>file_uri01</th>
                                <th>file_desc02</th>
                                <th>file_uri02</th> --}}
                                {{-- <th>pic_assignto</th> --}}

                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($projects as $key => $project)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $project->kode }}</td>
                                    <td>{{ $project->nama }}</td>
                                    <td>{{ $project->param_jenis }}</td>
                                    <td>{{ $project->nama_divisi }}</td>
                                    <td>{{ $project->nama_departemen }}</td>
                                    <td>{{ $project->nama_unit_req }}</td>
                                    <td>{{ $project->pic_req }}</td>
                                    {{-- <td>{{ $project->keterangan }}</td> --}}
                                    {{-- <td>{{ $project->file01 }}</td>
                                    <td>{{ $project->file02 }}</td>
                                    <td>{{ $project->gambar }}</td> --}}
                                    <td>{{ $project->start_plan }}</td>
                                    <td>{{ $project->end_plan }}</td>
                                    {{-- <td>{{ $project->divisi_assignto }}</td> --}}
                                    {{-- <td>{{ $project->dept_assignto }}</td> --}}
                                    {{-- <td>{{ $project->file_desc01 }}</td> --}}
                                    {{-- <td>{{ $project->file_uri01 }}</td>
                                    <td>{{ $project->file_desc02 }}</td>
                                    <td>{{ $project->file_uri02 }}</td> --}}
                                    {{-- <td>{{ $project->pic_assignto }}</td> --}}

                                    <td>
                                        @can('projects.edit')
                                            <a href="{{ route('projects.edit', Crypt::encrypt($project->id)) }}"
                                                class="btn btn-primary btn-xs">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('projects.delete')
                                            <a href="{{ route('projects.destroy', Crypt::encrypt($project->id)) }}"
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
        $('#datalist').DataTable({
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
