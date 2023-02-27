@extends('adminlte::page')

@section('title', 'List Mentor_mentor')

@section('content_header')
    <h1 class="m-0 text-dark">Daftar Mentor</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('mentor_mentors.create')
                        <a href="{{ route('mentor_mentors.create', $surtug) }}" class="btn btn-primary mb-2">
                            Tambah
                        </a>
                        <a href="{{ route('mentor_surtugs.index', $surtug) }}" class="btn btn-primary mb-2">
                            Kembali
                        </a>
                    @endcan
                    {{-- table-responsive --}}
                    <table class="table table-hover table-bordered table-stripped " id="datalist">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>No Surat Tugas</th>
                                <th>Uraian</th>
                                <th>Nik</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($mentor_mentors as $key => $mentor_mentor)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $mentor_mentor->nomor_surtug }}</td>
                                    <td>{{ $mentor_mentor->uraian }}</td>
                                    
                                    <td>{{ $mentor_mentor->nik }}</td>
                                    <td>{{ $mentor_mentor->nama_pegawai }}</td>
                                    <td>{{ $mentor_mentor->mentor_ket }}</td>

                                    <td>
                                        @can('mentor_mentors.edit')
                                            {{-- <a href="{{ route('mentor_mentors.edit', Crypt::encrypt($mentor_mentor->id)) }}"
                                                class="btn btn-primary btn-xs">
                                                Edit
                                            </a> --}}
                                        @endcan
                                        @can('mentor_mentors.delete')
                                            <a href="{{ route('mentor_mentors.destroy', Crypt::encrypt($mentor_mentor->id)) }}"
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
