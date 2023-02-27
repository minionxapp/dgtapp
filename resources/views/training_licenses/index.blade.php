@extends('adminlte::page')

@section('title', 'List Training_license')

@section('content_header')
    <h1 class="m-0 text-dark">List Training_license</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('training_licenses.create')
                        <a href="{{ route('training_licenses.create') }}" class="btn btn-primary mb-2">
                            Tambah
                        </a>
                    @endcan
                    
                    <table class="table table-hover table-bordered table-stripped {{-- table-responsive --}}" id="datalist">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama License</th>
                                <th>Keterangan</th>
                                <th>Jumlah</th>
                                <th>Tgl Mulai</th>
                                <th>Tgl selesai</th>
                                <th>Dept/Ak PIC</th>
                                <th>Status</th>
                                <th>Id Perpanjang</th>

                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($training_licenses as $key => $training_license)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $training_license->nama_license }}</td>
                                    <td>{{ $training_license->keterangan }}</td>
                                    <td>{{ $training_license->jml }}</td>
                                    <td>{{ $training_license->tgl_start }}</td>
                                    <td>{{ $training_license->tgl_end }}</td>
                                    <td>{{ $training_license->depnama }}</td>
                                    <td>{{ $training_license->status }}</td>
                                    <td>{{ $training_license->id_panjang }}</td>

                                    <td>
                                        @can('training_licenses.edit')
                                            <a href="{{ route('training_licenses.edit', Crypt::encrypt($training_license->id)) }}"
                                                class="btn btn-primary btn-xs">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('training_licenses.delete')
                                            <a href="{{ route('training_licenses.destroy', Crypt::encrypt($training_license->id)) }}"
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
