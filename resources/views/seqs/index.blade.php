@extends('adminlte::page')

@section('title', 'List Seq')

@section('content_header')
    <h1 class="m-0 text-dark">List Seq</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('seqs.create')
                        <a href="{{ route('seqs.create') }}" class="btn btn-primary mb-2">
                            Tambah
                        </a>
                    @endcan
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>seqname</th>
                                <th>nilai</th>
                                <th>tahun</th>
                                <th>seqvalue</th>
                                <th>keterangan</th>

                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($seqs as $key => $seq)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $seq->seqname }}</td>
                                    <td>{{ $seq->nilai }}</td>
                                    <td>{{ $seq->tahun }}</td>
                                    <td>{{ $seq->seqvalue }}</td>
                                    <td>{{ $seq->keterangan }}</td>

                                    <td>
                                        @can('seqs.edit')
                                            <a href="{{ route('seqs.edit', $seq) }}" class="btn btn-primary btn-xs">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('seqs.delete')
                                            <a href="{{ route('seqs.destroy', $seq) }}"
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
