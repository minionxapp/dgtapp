@extends('adminlte::page')

@section('title', 'List Training_note')

@section('content_header')
    <h1 class="m-0 text-dark">List Training Note</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('training_notes.create')
                        <a href="{{ route('training_notes.create') }}" class="btn btn-primary mb-2">
                            Tambah
                        </a>
                    @endcan
                    <table class="table table-hover table-bordered table-stripped {{-- table-responsive --}}" id="datalist">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Event</th>
                                <th>Tahun</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Note</th>

                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($training_notes as $key => $training_note)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $training_note->nip }}</td>
                                    <td>{{ $training_note->nama_pegawai }}</td>
                                    <td>{{ $training_note->event }}</td>
                                    <td>{{ $training_note->tahun }}</td>
                                    <td>{{ $training_note->date_start }}</td>
                                    <td>{{ $training_note->date_end }}</td>
                                    <td>{{ $training_note->note }}</td>

                                    <td>
                                        @can('training_notes.edit')
                                            <a href="{{ route('training_notes.edit', Crypt::encrypt($training_note->id)) }}"
                                                class="btn btn-primary btn-xs">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('training_notes.delete')
                                            <a href="{{ route('training_notes.destroy', Crypt::encrypt($training_note->id)) }}"
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
