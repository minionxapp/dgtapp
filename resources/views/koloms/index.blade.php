@extends('adminlte::page')

@section('title', 'List Kolom')

@section('content_header')
    <h1 class="m-0 text-dark">List Kolom {{ $tabel->id }} - {{ $tabel->nama }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('tabels.index')}}">
                        Tabel
                    </a><br>
                    <a href="#" class="btn btn-primary mb-2" onclick="showTabel({{ $tabel->id }})">
                        Detail Tabel
                    </a>
                    <a href="{{route('koloms.create',$tabel)}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <a href="#" class="btn btn-primary mb-2" onclick="generate({{ $tabel->id }})">
                        Controller
                    </a>
                    <a href="#" class="btn btn-primary mb-2" onclick="generate_model({{ $tabel->id }})">
                        Model
                    </a>
                    <a href="#" class="btn btn-primary mb-2" onclick="generate_vindex({{ $tabel->id }})">
                        VIndex
                    </a>
                    <a href="#" class="btn btn-primary mb-2" onclick="generate_vcreate({{ $tabel->id }})">
                        VCreate
                    </a>
                    <a href="#" class="btn btn-primary mb-2" onclick="generate_vedit({{ $tabel->id }})">
                        VEdit
                    </a>
                    <a href="#" class="btn btn-primary mb-2" onclick="generate_migrate({{ $tabel->id }})">
                        Migrate
                    </a>
                    <a href="#" class="btn btn-primary mb-2" onclick="generate_route({{ $tabel->id }})">
                        Route
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            {{-- 'nama','tipedata','null_','key_','default_','create_by','update_by',nama_tabel --}}
                        <tr>
                            <th>No.</th>
                            <th>nama_tabel</th>
                            <th>Nama</th>
                            <th>tipedata</th>
                            <th>null_</th>
                            <th>key_</th>
                            <th>default_</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($koloms as $key => $koloms)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$koloms->nama_tabel}}</td>
                                <td>{{$koloms->nama}}</td>
                                <td>{{$koloms->tipedata}}</td>
                                <td>{{$koloms->null_}}</td>
                                <td>{{$koloms->key_}}</td>
                                <td>{{$koloms->default_}}</td>
                                <td>
                                    {{-- <a href="{{route('koloms.edit', $koloms)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a> --}}
                                    <a href="{{route('koloms.destroy', $koloms)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                   
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="form-group" id='script'>
                <label for="exampleInputEmail">Script</label>
                <textarea rows="15" class="form-control @error('Script') is-invalid @enderror" id="Script" placeholder="Script" name="Script" value="{{old('Script')}}"></textarea>
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
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

        function showTabel($id){
            $('#example2').show();
            $('#script').hide();
            
        }
        function generate($id){
            $.ajax({
                url: "/kodescontroller/"+$id,
                type: "GET",
                async: false,
                dataType: "text",
                success: function(data) {
                    $('#example2').hide();
                    $('#script').show();
                    $("#Script").val(data);
                }
            });
        }

        function generate_model($id){
            $.ajax({
                url: "/kodesmodel/"+$id,
                type: "GET",
                async: false,
                dataType: "text",
                success: function(data) {
                    $('#example2').hide();
                    $('#script').show();
                    $("#Script").val(data);
                }
            });
        }

        function generate_vedit($id){
            alert('generate_vedit');
            $.ajax({
                url: "/kodesvedit/"+$id,
                type: "GET",
                async: false,
                dataType: "text",
                success: function(data) {
                    $('#example2').hide();
                    $('#script').show();
                    $("#Script").val(data);
                }
            });
        }

        function generate_vindex($id){
            $.ajax({
                url: "/kodesvindex/"+$id,
                type: "GET",
                async: false,
                dataType: "text",
                success: function(data) {
                    $('#example2').hide();
                    $('#script').show();
                    $("#Script").val(data);
                }
            });
        }

        function generate_vcreate($id){
            alert('generate_vcreate');
            $.ajax({
                url: "/kodesvcreate/"+$id,
                type: "GET",
                async: false,
                dataType: "text",
                success: function(data) {
                    $('#example2').hide();
                    $('#script').show();
                    $("#Script").val(data);
                }
            });
        }
        function generate_migrate($id){
            alert('generate_migrate');
            $.ajax({
                url: "/kodesmigrate/"+$id,
                type: "GET",
                async: false,
                dataType: "text",
                success: function(data) {
                    $('#example2').hide();
                    $('#script').show();
                    $("#Script").val(data);
                }
            });
        }
        function generate_route($id){
            alert('generate_route');
            $.ajax({
                url: "/kodesroute/"+$id,
                type: "GET",
                async: false,
                dataType: "text",
                success: function(data) {
                    $('#example2').hide();
                    $('#script').show();
                    $("#Script").val(data);
                }
            });
        }

        // generate_migrate
    </script>
@endpush