@extends('adminlte::page')

@section('title', 'List Lsp_sertifikat')

@section('content_header')
    <h1 class="m-0 text-dark">List Lsp_sertifikat</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('lsp_sertifikats.create')
                        <a href="{{ route('lsp_sertifikats.create') }}" class="btn btn-primary mb-2">
                            Tambah
                        </a>


                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('carinama') is-invalid @enderror" id="carinama"
                                        placeholder="carinama" name="carinama"
                                        value="">                                   
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">                                    
                                    <button class="btn btn-default" type="button" id="add_file">
                                        Cari
                                    </button>
                                </div>
                            </div>
                        </div>




                        
                    @endcan
                    {{-- table-responsive --}}
                    <table class="table table-hover table-bordered table-stripped " id="datalist">
                        <thead>
                            <tr>
                                <th>No.</th>
                                {{-- <th>no</th>
                                <th>noreg1</th>
                                <th>noreg2</th>
                                <th>noreg3</th> --}}
                                <th>nama</th>
                                <th>NIK</th>
                                {{-- <th>noser1</th>
                                <th>noser2</th>
                                <th>noser3</th>
                                <th>noser4</th>
                                <th>noser5</th>
                                <th>no_blanko</th>
                                <th>email</th>
                                <th>hp</th>
                                <th>kode_skema</th>
                                <th>nama_skema</th>
                                <th>provinsi</th>
                                <th>th_lapor</th> --}}
                                <th>no_sertifikat</th>
                                <th>no_register</th>
                                {{-- <th>tipe</th> --}}
                                <th>Provinsi</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($lsp_sertifikats as $key => $lsp_sertifikat)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    {{-- <td>{{ $lsp_sertifikat->no }}</td>
                                    <td>{{ $lsp_sertifikat->noreg1 }}</td>
                                    <td>{{ $lsp_sertifikat->noreg2 }}</td>
                                    <td>{{ $lsp_sertifikat->noreg3 }}</td> --}}
                                    <td>{{ $lsp_sertifikat->nama }}</td>
                                    {{-- <td>{{ $lsp_sertifikat->noser1 }}</td>
                                    <td>{{ $lsp_sertifikat->noser2 }}</td>
                                    <td>{{ $lsp_sertifikat->noser3 }}</td>
                                    <td>{{ $lsp_sertifikat->noser4 }}</td>
                                    <td>{{ $lsp_sertifikat->noser5 }}</td>
                                    <td>{{ $lsp_sertifikat->no_blanko }}</td>
                                    <td>{{ $lsp_sertifikat->email }}</td>
                                    <td>{{ $lsp_sertifikat->hp }}</td>
                                    <td>{{ $lsp_sertifikat->kode_skema }}</td>
                                    <td>{{ $lsp_sertifikat->nama_skema }}</td>
                                    <td>{{ $lsp_sertifikat->provinsi }}</td>
                                    <td>{{ $lsp_sertifikat->th_lapor }}</td> --}}
                                    <td>{{ $lsp_sertifikat->no_sertifikat }}</td>
                                    <td>{{ $lsp_sertifikat->no_register }}</td>
                                    {{-- <td>{{ $lsp_sertifikat->tipe }}</td> --}}

                                    <td>
                                        @can('lsp_sertifikats.edit')
                                            <a href="{{ route('lsp_sertifikats.edit', Crypt::encrypt($lsp_sertifikat->id)) }}"
                                                class="btn btn-primary btn-xs">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('lsp_sertifikats.delete')
                                            <a href="{{ route('lsp_sertifikats.destroy', Crypt::encrypt($lsp_sertifikat->id)) }}"
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
        $(document).ready(function() {
            // dataSertifikat();
            // awal();
            // $('#nama').attr('readonly', true);
            // $('#email').attr('readonly', true);
        });

        $('#datalist').DataTable({
            "responsive": true,
            "pageLength": 10,
            "searching": false,
            "processing": true,
        });

        $('#add_file').on('click', function(e) {
           var table = $('#datalist').DataTable(); 
           table.destroy();
            table.clear().draw();
            dataSertifikat();

           
            
        });

        function dataSertifikat() {
            $('#datalist').DataTable({
                // rowReorder: {
                //     selector: 'td:nth-child(2)'
                // },
                ajax: '/sertifikats/'+$('#carinama').val(),
                columns: [
                    {data: 'no',
                    render: function (data, type, row, meta) {
                            return meta.row + 1;
                    }
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'nip',
                        name: 'nip'
                    },
                    {
                        data: 'no_sertifikat',
                        name: 'no_sertifikat'
                    },   
                    {
                        data: 'no_register',
                        name: 'no_register'
                    }, 
                    {
                        data: 'provinsi',
                        name: 'provinsi'
                    },                 
                    {
                        data: 'idx',
                        render: function (data, type, row, meta) {
                       return  '<a href= http://localhost:8000/lsp_sertifikats/edit/'+ data+' class=\"btn btn-primary btn-xs\">Editxx</a>'  ;
                    }
                    }
                ]
            });
        }

        

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
