@extends('adminlte::page')

@section('title', 'List Task')

@section('content_header')
    <h1 class="m-0 text-dark">List Task</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('tasks.create')
                    <a href="{{route('tasks.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    @endcan
                    

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            {{-- 'kode','nm_project','descripsi','divisi_kode','departemen_kode','pic','mulai','selesai','status' --}}
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Divisi</th>
                            <th>Departemen</th>
                            <th>Status</th>
                            <th>Jenis</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $key => $tasks)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$tasks->kode}}</td>
                                <td>{{$tasks->nm_project}}</td>
                                <td>{{$tasks->nama_divisi}}</td>
                                <td>{{$tasks->nama_departemen}}</td>   
                                <td>{{$tasks->status_desc}}</td>  
                                <td>{{$tasks->jenis_desc}}</td>                              
                                <td>
                                    @can('tasks.edit')
                                    <a href="{{route('tasks.edit', Crypt::encrypt($tasks->id) )}}" class="btn btn-primary btn-xs">
                                        Edit 
                                    </a>
                                    @endcan
                                    @can('tasks.delete')
                                    <a href="{{route('tasks.destroy', Crypt::encrypt($tasks->id) )}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                    @endcan
                                    @can('tasks.edit')
                                     <button type="button" class="btn btn-primary btn-xs" onclick="showModal()">Open</button>
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

     {{-- MODAL --}}
            <div class="modal fade" id="formUpload" data-backdrop="static" tabindex="-1" role="dialog"
                aria-labelledby="addDataLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Data Divisi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="formuploadfile"name="formuploadfile"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="file" id="filez" name="filez" />
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-secondary" onclick="simpanFile();">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- END MODAL --}}
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

        function showModal() {
            $('#formUpload').modal('show');
            
        }

    </script>
@endpush