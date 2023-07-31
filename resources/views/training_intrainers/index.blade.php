@extends('adminlte::page')

@section('title', 'List Training_intrainer')

@section('content_header')
    <h1 class="m-0 text-dark">List Training_intrainer :: {{ $nm_training }}</h1>
    {{-- <a href="{{ route('training_plans.index') }}" >
        List ||  
    </a>
    <a href="{{ route('training_plans.edit', $training_plan_id) }}">
        Training  ||  
    </a>
    <a href="{{ route('training_plan_pesertas.index', $training_plan_id) }}" >
        Peserta  ||
     </a>
     <a href="{{ route('training_costs_index.index', $training_plan_id)  }}" >
        Biaya  ||
     </a> 
     <a href="{{ route('training_intrainers_index.index', $training_plan_id) }}">
        Trainer  ||  
    </a>
    <a href="{{ route('files.indexfile', $training_plan_id) }}">
        Files  ||  
    </a> --}}
    @include('include.trmenu') 
    <br>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('training_intrainers.create')
                        <a href="{{ route('training_intrainers.create', $training_plan_id) }}" class="btn btn-primary mb-2">
                            Tambah
                        </a>
                    @endcan
                    <table class="table table-hover table-bordered table-stripped " id="datalist">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                {{-- <th>training_plan_id</th> --}}
                                <th>Materi</th>
                                <th>Catatan</th>
                                <th>Internal</th>

                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($training_intrainers as $key => $training_intrainer)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $training_intrainer->nip }}</td>
                                    <td>{{ $training_intrainer->nama_trainer }}</td>
                                    {{-- <td>{{ $training_intrainer->training_plan_id }}</td> --}}
                                    <td>{{ $training_intrainer->materi }}</td>
                                    <td>{{ $training_intrainer->catatan }}</td>
                                    <td>{{ $training_intrainer->internal }}</td>

                                    <td>
                                        @can('training_intrainers.edit')
                                            {{-- <a href="{{ route('training_intrainers.edit', Crypt::encrypt($training_intrainer->id)) }}"
                                                class="btn btn-primary btn-xs">
                                                Edit
                                            </a> --}}
                                        @endcan
                                        @can('training_intrainers.delete')
                                            <a href="{{ route('training_intrainers.destroy', Crypt::encrypt($training_intrainer->id)) }}"
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
