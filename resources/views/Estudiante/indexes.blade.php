@extends('layouts.estapp')

@section('title', 'Dashboard | SmartMoodle')

@section('encabezado')


@stop

@section('content')

<h1>
    Estudiante
</h1>
<section class="content">

    <div class="container">
        <!-- Small boxes (Stat box) -->
        <h1>Cursos</h1>
        <div class="row">

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-warning">
                    <div class="inner">
                        <h3> <i class="far fa-bookmark"></i></h3>
                        <p>Fisica</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-bookmark"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Acceder <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-danger">
                    <div class="inner">
                        <h3> <i class="far fa-bookmark"></i></h3>
                        <p>Matematica</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-bookmark"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Acceder <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-primary">
                    <div class="inner">
                        <h3> <i class="far fa-bookmark"></i></h3>
                        <p>Ciencias Naturales</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-bookmark"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Acceder <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-success">
                    <div class="inner">
                        <h3> <i class="far fa-bookmark"></i></h3>
                        <p>Calculo</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-bookmark"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Acceder <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>





@stop
@section('css')
@stop
@section('js')

@stop