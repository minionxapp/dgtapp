@extends('adminlte::page')

@section('title', 'List Jajal')

@section('content_header')
    <h1 class="m-0 text-dark">List Jajal</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('jajals.create')
                        <a href="{{ route('jajals.create') }}" class="btn btn-primary mb-2">
                            Tambah
                        </a>
                    @endcan
                    <table class="table table-hover table-bordered table-stripped " id="datalist">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>kode</th>
                                <th>nama</th>
                                <th>jumlah</th>
                                <th>divisi</th>
                                <th>mulai</th>

                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($jajals as $key => $jajal)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $jajal->kode }}</td>
                                    <td>{{ $jajal->nama }}</td>
                                    <td>{{ $jajal->jumlah }}</td>
                                    <td>{{ $jajal->divisi }}</td>
                                    <td>{{ $jajal->mulai }}</td>

                                    <td>
                                        @can('jajals.edit')
                                            <a href="{{ route('jajals.edit', Crypt::encrypt($jajal->id)) }}"
                                                class="btn btn-primary btn-xs">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('jajals.delete')
                                            <a href="{{ route('jajals.destroy', Crypt::encrypt($jajal->id)) }}"
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
