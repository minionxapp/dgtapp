@extends('adminlte::page')

@section('title', 'List Lsp_skema')

@section('content_header')
    <h1 class="m-0 text-dark">List Lsp_skema</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('lsp_skemas.create')
                        <a href="{{ route('lsp_skemas.create') }}" class="btn btn-primary mb-2">
                            Tambah
                        </a>
                    @endcan
                    <table class="table table-hover table-bordered table-stripped" id="datalist">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>kode_skema</th>
                                <th>nama_skema</th>
                                <th>jenis_skema</th>
                                <th>jumlah_unit</th>
                                <th>sektor</th>
                                <th>bidang</th>
                                <th>kode_unit</th>
                                <th>unit_kompetensi</th>

                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($lsp_skemas as $key => $lsp_skema)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $lsp_skema->kode_skema }}</td>
                                    <td>{{ $lsp_skema->nama_skema }}</td>
                                    <td>{{ $lsp_skema->jenis_skema }}</td>
                                    <td>{{ $lsp_skema->jumlah_unit }}</td>
                                    <td>{{ $lsp_skema->sektor }}</td>
                                    <td>{{ $lsp_skema->bidang }}</td>
                                    <td>{{ $lsp_skema->kode_unit }}</td>
                                    <td>{{ $lsp_skema->unit_kompetensi }}</td>

                                    <td>
                                        @can('lsp_skemas.edit')
                                            <a href="{{ route('lsp_skemas.edit', Crypt::encrypt($lsp_skema->id)) }}"
                                                class="btn btn-primary btn-xs">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('lsp_skemas.delete')
                                            <a href="{{ route('lsp_skemas.destroy', Crypt::encrypt($lsp_skema->id)) }}"
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
