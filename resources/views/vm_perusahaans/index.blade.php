@extends('adminlte::page')

@section('title', 'List Vm_perusahaan')

@section('content_header')
    <h1 class="m-0 text-dark">List Vm_perusahaan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('vm_perusahaans.create')
                        <a href="{{ route('vm_perusahaans.create') }}" class="btn btn-primary mb-2">
                            Tambah
                        </a>
                    @endcan
                    <table class="table table-hover table-bordered table-stripped table-responsive" id="datalist">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>nama</th>
                                <th>alamat</th>
                                <th>telp</th>
                                <th>email</th>
                                <th>ttd_spk</th>
                                <th>jabat_ttd</th>
                                <th>negosiator</th>
                                <th>jabat_negosiator</th>
                                <th>telp_negosiator</th>
                                <th>sts_padi</th>
                                <th>sts_drm</th>
                                <th>sts_smap</th>
                                <th>sts_pajak</th>
                                <th>link_file</th>
                                <th>rating</th>

                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($vm_perusahaans as $key => $vm_perusahaan)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $vm_perusahaan->nama }}</td>
                                    <td>{{ $vm_perusahaan->alamat }}</td>
                                    <td>{{ $vm_perusahaan->telp }}</td>
                                    <td>{{ $vm_perusahaan->email }}</td>
                                    <td>{{ $vm_perusahaan->ttd_spk }}</td>
                                    <td>{{ $vm_perusahaan->jabat_ttd }}</td>
                                    <td>{{ $vm_perusahaan->negosiator }}</td>
                                    <td>{{ $vm_perusahaan->jabat_negosiator }}</td>
                                    <td>{{ $vm_perusahaan->telp_negosiator }}</td>
                                    <td>{{ $vm_perusahaan->nm_sts_padi }}</td>
                                    <td>{{ $vm_perusahaan->param_drm }}</td>
                                    <td>{{ $vm_perusahaan->param_smap }}</td>
                                    <td>{{ $vm_perusahaan->param_pajak }}</td>
                                    <td><a href={{ $vm_perusahaan->link_file }}>{{ $vm_perusahaan->link_file }}</a></td>
                                    <td>{{ $vm_perusahaan->rating }}</td>

                                    <td>
                                        @can('vm_perusahaans.edit')
                                            <a href="{{ route('vm_perusahaans.edit', Crypt::encrypt($vm_perusahaan->id)) }}"
                                                class="btn btn-primary btn-xs">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('vm_perusahaans.delete')
                                            <a href="{{ route('vm_perusahaans.destroy', Crypt::encrypt($vm_perusahaan->id)) }}"
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
