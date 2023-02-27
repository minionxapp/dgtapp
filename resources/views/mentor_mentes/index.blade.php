@extends('adminlte::page')

@section('title', 'List Mentor_mente')

@section('content_header')
    <h1 class="m-0 text-dark">List Mentor_mente</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('mentor_mentes.create')
                        <a href="{{ route('mentor_mentes.create', $surtug) }}" class="btn btn-primary mb-2">
                            Tambah
                        </a>
                        <a href="{{ route('mentor_surtugs.index', $surtug) }}" class="btn btn-primary mb-2">
                            Kembali
                        </a>
                    @endcan

                    <table class="table table-hover table-bordered table-stripped {{-- table-responsive --}}" id="datalist">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>No Surat Tugas</th>
                                <th>uraian</th>
                                <th>Nik</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($mentor_mentes as $key => $mentor_mente)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $mentor_mente->nomor_surtug }}</td>
                                    <td>{{ $mentor_mente->uraian }}</td>                                    
                                    <td>{{ $mentor_mente->nik }}</td>
                                    <td>{{ $mentor_mente->nama_pegawai }}</td>                                    
                                    <td>{{ $mentor_mente->ket }}</td>

                                    <td>
                                        {{-- @can('mentor_mentes.edit')
                                            <a href="{{ route('mentor_mentes.edit', Crypt::encrypt($mentor_mente->id)) }}"
                                                class="btn btn-primary btn-xs">
                                                Edit
                                            </a>
                                        @endcan --}}
                                        @can('mentor_mentes.delete')
                                            <a href="{{ route('mentor_mentes.destroy', Crypt::encrypt($mentor_mente->id)) }}"
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
