@extends('adminlte::page')

@section('title', 'List Training_plan_peserta')

@section('content_header')
    <h1 class="m-0 text-dark">List Training_plan_peserta</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('training_plans.index',) }}" >
                       Back
                    </a><br>
                    <h3>{{ $nama_training }}</h3><br>
                    @can('training_plan_pesertas.create')
                        <a href="{{ route('training_plan_pesertas.create', $training_plan) }}" class="btn btn-primary mb-2">
                            Tambah
                        </a>

                        <a href="#"
                            onclick="CekPeserta()" class="btn btn-primary mb-2">
                            Cek Peserta
                        </a>
                       
                    @endcan
                    <table class="table table-hover table-bordered table-stripped {{-- table-responsive --}} " id="datalist">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tr Id</th>
                                {{-- <th>Nama Training</th> --}}
                                <th>Nik</th>
                                <th>Nama Peserta</th>
                                <th>status_peserta</th>
                                <th>keterangan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($training_plan_pesertas as $key => $training_plan_peserta)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $training_plan_peserta->training_plan_id }}</td>
                                    {{-- <td>{{ $training_plan_peserta->nama_training }}</td> --}}
                                    <td>{{ $training_plan_peserta->nik }}</td>
                                    <td>{{ $training_plan_peserta->nama_pegawai }}</td>
                                    <td>{{ $training_plan_peserta->status_peserta }}</td>
                                    <td>{{ $training_plan_peserta->keterangan }}</td>

                                    <td>
                                        @can('training_plan_pesertas.edit')
                                            <a href="{{ route('training_plan_pesertas.edit', Crypt::encrypt($training_plan_peserta->id)) }}"
                                                class="btn btn-primary btn-xs">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('training_plan_pesertas.delete')
                                            <a href="{{ route('training_plan_pesertas.destroy', Crypt::encrypt($training_plan_peserta->id)) }}"
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

        function CekPeserta(){
            var table = $('#datalist').DataTable();
 
            var data = table
                .rows()
                .data();
            
            alert( 'The table has '+data.length+' records' );
            for (var i = 0; i < data.length; i++) {
                rowData = data[i];
                alert(rowData[2]);
            }
        }
    </script>
@endpush
