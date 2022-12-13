@extends('adminlte::page')

@section('title', 'LSP Dashboard')

@section('content_header')
    <h1>LSP-Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $identified }}<sup style="font-size: 20px">%</sup></h3>
                    <p>Identified :: {{ $identified_jml }}</p>
                     {{-- <p>Task :: {{ $departemen_name }}</p> --}}
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('tasks.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $doble }}<sup style="font-size: 20px">%</sup></h3>
                    <p>Double :: {{ $doble_jml }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

      

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $eksternal }}<sup style="font-size: 20px">%</sup></h3>
                    <p>Eksternal :: {{ $eksternal_jml }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $notFound }}<sup style="font-size: 20px">%</sup></h3>
                    <p>Not Found ::{{ $notFound_jml }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="/users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>


    {{-- <div class="card card-primary">...</div> --}}

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Default Card Example</h3>
            <div class="card-tools">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <span class="badge badge-primary">Label</span>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            The body of the card
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            The footer of the card
        </div>
        <!-- /.card-footer -->
    </div>






@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
