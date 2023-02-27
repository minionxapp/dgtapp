@extends('adminlte::page')

@section('title', 'List Mentor_event')

@section('content_header')
    <h1 class="m-0 text-dark">List Mentor Kegiatan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('mentor_events.create')
                        <a href="{{ route('mentor_events.create') }}" class="btn btn-primary mb-2">
                            Tambah
                        </a>
                        {{-- table-responsive --}}
                    @endcan
                    <table class="table table-hover table-bordered table-stripped  "
                        id="datalist">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Surat Tugas</th>
                                <th>Uraian ST</th>
                                <th>Nama Kegiatan</th>
                                <th>Keterangan</th>
                                <th>Tgl Mulai</th>
                                <th>Tgl Selesai</th>

                                

                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($mentor_events as $key => $mentor_event)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $mentor_event->surtug }}</td>
                                    <td>{{ $mentor_event->surtug_uraian }}</td>
                                    <td>{{ $mentor_event->nama_event }}</td>
                                    <td>{{ $mentor_event->ket }}</td>
                                    <td>{{ $mentor_event->tgl_mulai }}</td>
                                    <td>{{ $mentor_event->tgl_selesai }}</td>

                                    

                                    <td>
                                        @can('mentor_events.edit')
                                            <a href="{{ route('mentor_events.edit', Crypt::encrypt($mentor_event->id)) }}"
                                                class="btn btn-primary btn-xs">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('mentor_events.delete')
                                            <a href="{{ route('mentor_events.destroy', Crypt::encrypt($mentor_event->id)) }}"
                                                onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                                Delete
                                            </a>
                                        @endcan
                                        @can('mentor_events.edit')
                                            <a href="{{ route('mentor_event_members_index.index', Crypt::encrypt($mentor_event->id)) }}"
                                                class="btn btn-primary btn-xs">
                                                Anggota
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
