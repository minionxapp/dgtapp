@extends('adminlte::page')

@section('title', 'List Training_plan_peserta')

@section('content_header')
    <h1 class="m-0 text-dark">List Peserta Training :: {{ $nama_training }}</h1>
    @include('include.trmenu') 
    
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   


                    @can('training_plan_pesertas.create')
                        <a href="{{ route('training_plan_pesertas.create', $training_plan) }}" class="btn btn-primary mb-2">
                            Tambah
                        </a>

                        <a href="#"
                            onclick="CekPeserta()" class="btn btn-primary mb-2">
                            Cek Peserta
                        </a>
                        <a href="{{ route('training_plan_pesertas.export', $training_plan) }}"
                             class="btn btn-primary mb-2">
                            Export
                        </a>
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#importExcel">
                            IMPORT EXCEL
                        </button>
                       
                    @endcan

<!-- Import Excel -->
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/training_plan_pesertas_import/{{ $training_plan }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}

                    <label>Pilih file excel</label>
                    <div class="form-group">
                        <input type="file" name="file" required="required">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>





                    <table class="table table-hover table-bordered table-stripped {{-- table-responsive --}} " id="datalist">
                        <thead>
                            <tr>
                                <th>No.</th>
                                {{-- <th>Tr Id</th> --}}
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
                                    {{-- <td>{{ $training_plan_peserta->training_plan_id }}</td> --}}
                                    {{-- <td>{{ $training_plan_peserta->nama_training }}</td> --}}
                                    <td>{{ $training_plan_peserta->nik }}</td>
                                    <td>{{ $training_plan_peserta->nama_pegawai }}</td>
                                    <td>{{ $training_plan_peserta->status_peserta }}</td>
                                    <td>{{ $training_plan_peserta->keterangan }}</td>

                                    <td>
                                        @can('training_plan_pesertas.edit')
                                            {{-- <a href="{{ route('training_plan_pesertas.edit', Crypt::encrypt($training_plan_peserta->id)) }}"
                                                class="btn btn-primary btn-xs">
                                                Edit
                                            </a> --}}
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
            
            var niks =[];
            for (var i = 0; i < data.length; i++) {
                rowData = data[i];
                niks[i] = rowData[1];
            }

            $.ajax({
                url: '/training_plan_pesertas_cek/' + niks+'/'+"{{ $training_plan }}",
                type: "GET",
                async: false,
                success: function(response) {
                    alert(response);
                } 
            });
        }

        function ExportPeserta() {
            $.ajax({
                url: '/training_plan_pesertas_export/' +"{{ $training_plan }}",
                type: "GET",
                async: false,
                success: function(response) {
                    // alert(response);
                } 
            });
        }
    </script>
@endpush
