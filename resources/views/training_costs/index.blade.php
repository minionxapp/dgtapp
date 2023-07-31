@extends('adminlte::page')

@section('title', 'List Training_cost')

@section('content_header')
    <h1 class="m-0 text-dark">Biaya Training :: {{ $nm_training }}</h1>
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
    <a href="{{ route('files.indexfile', Crypt::encrypt($training_plan_id)) }}">
        Files  ||  
    </a> --}}
    @include('include.trmenu') 
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   
                    @can('training_costs.create')
                        <a href="{{ route('training_costs.create', $training_plan_id) }}" class="btn btn-primary mb-2">
                            Tambah
                        </a>
                        {{-- <a href="{{ route('training_plans.index') }}" class="btn btn-primary mb-2">
                            Kembali
                        </a> --}}
                    @endcan
                    {{-- table-responsive --}}
                    <table class="table table-hover table-bordered table-stripped " id="datalist">
                        <thead>
                            <tr>
                                <th>No.</th>
                                {{-- <th>training_plan_id</th> --}}
                                <th>ket_biaya</th>
                                <th>biaya</th>
                                <th>kategori_biaya</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($training_costs as $key => $training_cost)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    {{-- <td>{{ $training_cost->training_plan_id }}</td> --}}
                                    <td>{{ $training_cost->ket_biaya }}</td>
                                    <td style="text-align:right">{{ number_format($training_cost->biaya) }}</td>
                                    <td>{{ $training_cost->kategori_biaya }}</td>

                                    <td>
                                        @can('training_costs.edit')
                                            {{-- <a href="{{ route('training_costs.edit', Crypt::encrypt($training_cost->id)) }}"
                                                class="btn btn-primary btn-xs">
                                                Edit
                                            </a> --}}
                                        @endcan
                                        @can('training_costs.delete')
                                            <a href="{{ route('training_costs.destroy', Crypt::encrypt($training_cost->id)) }}"
                                                onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                                Delete
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                {{-- <th></th> --}}
                                <th style="text-align:right">Total:</th>
                                <th style="text-align:right"></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
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
            $('#datalist').DataTable({
                footerCallback: function(row, data, start, end, display) {

                    var api = this.api();


                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i ===
                            'number' ? i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column(2)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    // pageTotal = api
                    //     .column(2, {
                    //         page: 'current'
                    //     })
                    //     .data()
                    //     .reduce(function(a, b) {
                    //         return intVal(a) + intVal(b);
                    //     }, 0);

                    // // Update footer
                    $(api.column(2).footer()).html(total.toLocaleString('en-US'));
                },
                // "processing": true,
                // "serverSide": true,
            });
        });









        // $('#datalist').DataTable({
        //     "responsive": true,
        // });
        function numberFormat(number) {
            return number.toLocaleString('en-US');
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
