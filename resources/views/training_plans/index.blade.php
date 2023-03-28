@extends('adminlte::page')

@section('title', 'List Training_plan')

@section('content_header')
    <h1 class="m-0 text-dark">List Training Plan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('training_plans.create')
                        <a href="{{ route('training_plans.create') }}" class="btn btn-primary mb-2">
                            Tambah
                        </a>
                    @endcan
                    
                    <table class="table table-hover table-bordered table-stripped table-responsive" id="datalist">
                    {{-- <table class="display responsive nowrap" id="datalist"> --}}
                        
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Training</th>
                                <th>Jenis</th>
                                <th>Kategori</th>
                                <th>Akademi</th>
                                {{-- <th>keterangan</th> --}}
                                <th>Pelaksana</th>
                                <th>Peserta</th>
                                <th>Lokasi</th>
                                <th>Biaya</th>
                                <th>Batch</th>
                                <th>Durasi</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>unit_usul</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($training_plans as $key => $training_plan)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $training_plan->nama_training }}</td>
                                    <td>{{ $training_plan->jenis }}</td>
                                    <td>{{ $training_plan->kategori }}</td>
                                    <td>{{ $training_plan->nama_departemen }}</td>
                                    {{-- <td>{{ $training_plan->keterangan }}</td> --}}
                                    <td>{{ $training_plan->pelaksanaan }}</td>
                                    <td class="text-right">{{ $training_plan->jml_peserta }}</td>
                                    <td>{{ $training_plan->namalokasi }}</td>
                                    <td class="text-right">{{ number_format(intval($training_plan->biaya),0) }}</td>
                                    <td class="text-right">{{ $training_plan->jml_kelas }}</td>
                                    <td class="text-right">{{ $training_plan->durasi }}</td>
                                    <td>{{ $training_plan->tgl_mulai }}</td>
                                    <td>{{ $training_plan->tgl_selesai }}</td>
                                    <td>{{ $training_plan->nama_divisi }}</td>
                                    <td>{{ $training_plan->status }}</td>
                                    <td>
                                        @can('training_plans.edit')
                                            <a href="{{ route('training_plans.edit', Crypt::encrypt($training_plan->id)) }}"
                                                class="btn btn-primary btn-xs">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('training_plans.delete')
                                            <a href="{{ route('training_plans.destroy', Crypt::encrypt($training_plan->id)) }}"
                                                onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                                Delete
                                            </a>
                                        @endcan
                                        {{-- training_plan_pesertas/xx --}}
                                        <a href="{{ route('training_plan_pesertas.index', Crypt::encrypt($training_plan->id)) }}"
                                            class="btn btn-primary btn-xs">
                                            Peserta
                                        </a>
                                        <a href="{{ route('training_costs_index.index', Crypt::encrypt($training_plan->id)) }}"
                                            class="btn btn-primary btn-xs">
                                            Biaya
                                        </a>
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
