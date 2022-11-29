
        @extends('adminlte::page')

        @section('title', 'List Pegawai')

        @section('content_header')
            <h1 class="m-0 text-dark">List Pegawai</h1>
        @stop

        @section('content')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @can('pegawais.create')
                                <a href="{{route('pegawais.create')}}" class="btn btn-primary mb-2">
                                    Tambah
                                </a>
                            @endcan
                            <table class="table table-hover table-bordered table-stripped table-responsive" id="datalist">
                            <thead>
                            <tr>
                            <th>No.</th> 
        <th>nip</th>
<th>nip_lengkap</th>
<th>nama_pegawai</th>
<th>jenis_kelamin</th>
<th>status_aktif</th>
<th>kode_unit</th>
<th>nama_unit</th>
<th>unit_tk_1</th>
<th>unit_tk_2</th>
<th>unit_tk_3</th>
<th>jenis_kantor</th>

            <th>Opsi</th>
            </tr>
            </thead>
            <tbody>

            @foreach($pegawais as $key => $pegawai)
            <tr>
                <td>{{$key+1}}</td>                        
                        <td>{{$pegawai->nip}}</td>
<td>{{$pegawai->nip_lengkap}}</td>
<td>{{$pegawai->nama_pegawai}}</td>
<td>{{$pegawai->jenis_kelamin}}</td>
<td>{{$pegawai->status_aktif}}</td>
<td>{{$pegawai->kode_unit}}</td>
<td>{{$pegawai->nama_unit}}</td>
<td>{{$pegawai->unit_tk_1}}</td>
<td>{{$pegawai->unit_tk_2}}</td>
<td>{{$pegawai->unit_tk_3}}</td>
<td>{{$pegawai->jenis_kantor}}</td>

            <td>
                        @can('pegawais.edit')
                            <a href="{{route('pegawais.edit', Crypt::encrypt($pegawai->id))}}" class="btn btn-primary btn-xs">
                                Edit
                            </a>
                        @endcan
                        @can('pegawais.delete')
                            <a href="{{route('pegawais.destroy', Crypt::encrypt($pegawai->id))}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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