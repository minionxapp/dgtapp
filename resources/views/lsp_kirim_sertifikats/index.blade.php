
        @extends('adminlte::page')

        @section('title', 'List Lsp_kirim_sertifikat')

        @section('content_header')
            <h1 class="m-0 text-dark">List Lsp_kirim_sertifikat</h1>
        @stop

        @section('content')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @can('lsp_kirim_sertifikats.create')
                                <a href="{{route('lsp_kirim_sertifikats.create')}}" class="btn btn-primary mb-2">
                                    Tambah
                                </a>
                            @endcan
                            <table class="table table-hover table-bordered table-stripped table-responsive" id="datalist">
                            <thead>
                            <tr>
                            <th>No.</th> 
        <th>nama</th>
<th>nip</th>

            <th>Opsi</th>
            </tr>
            </thead>
            <tbody>

            @foreach($lsp_kirim_sertifikats as $key => $lsp_kirim_sertifikat)
            <tr>
                <td>{{$key+1}}</td>                        
                        <td>{{$lsp_kirim_sertifikat->nama}}</td>
<td>{{$lsp_kirim_sertifikat->nip}}</td>

            <td>
                        @can('lsp_kirim_sertifikats.edit')
                            <a href="{{route('lsp_kirim_sertifikats.edit', Crypt::encrypt($lsp_kirim_sertifikat->id))}}" class="btn btn-primary btn-xs">
                                Edit
                            </a>
                        @endcan
                        @can('lsp_kirim_sertifikats.delete')
                            <a href="{{route('lsp_kirim_sertifikats.destroy', Crypt::encrypt($lsp_kirim_sertifikat->id))}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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