@extends('adminlte::page')

@section('title', 'List Mentor_event_member')

@section('content_header')
    <h1 class="m-0 text-dark">List Mentor Event Anggota</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('mentor_event_members.create')
                        <a href="{{ route('mentor_event_members.create', $event) }}" class="btn btn-primary mb-2">
                            Tambah
                        </a>
                    @endcan
                    @can('mentor_event_members.create')
                        <a href="{{ route('mentor_events.index') }}" class="btn btn-primary mb-2">
                            Kembali
                        </a>
                    @endcan

                    <table class="table table-hover table-bordered table-stripped {{-- table-responsive --}}" id="datalist">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kegiatan</th>
                                <th>Mentor</th>
                                <th>Mente</th>
                                <th>Keterangan</th>

                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($mentor_event_members as $key => $mentor_event_member)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    {{-- <td>{{ $mentor_event_member->event_id }}</td> --}}
                                    <td>{{ $mentor_event_member->nama_event }}</td>
                                    
                                    <td>{{ $mentor_event_member->nik_mentor }}|{{ $mentor_event_member->nama_mentor }}</td>
                                    <td>{{ $mentor_event_member->nik_mente }}|{{ $mentor_event_member->nama_mente }}</td>
                                    <td>{{ $mentor_event_member->ket }}</td>

                                    <td>
                                        {{-- @can('mentor_event_members.edit')
                                            <a href="{{ route('mentor_event_members.edit', Crypt::encrypt($mentor_event_member->id)) }}"
                                                class="btn btn-primary btn-xs">
                                                Edit
                                            </a>
                                        @endcan --}}
                                        @can('mentor_event_members.delete')
                                            <a href="{{ route('mentor_event_members.destroy', Crypt::encrypt($mentor_event_member->id)) }}"
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
