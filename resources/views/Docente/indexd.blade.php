@extends('layouts.nav')

@section('title', 'Perfil | SmartMoodle')




@section('title', 'Administracion - Docente')

@section('content')
<h1>Docente Perfil</h1>



<section class="content">
    <div class="container">


        <h1 class="font-weight-light" style="color:red;"> {{ auth()->user()->instituto->nombre}}</h1>
        <h2 class="font-weight-light" style="color:blue;"> {{ auth()->user()->name, }} {{ auth()->user()->apellido, }}</h2>
        <h2 class="font-weight-light">
            @foreach(auth()->user()->roles as $role)
            {{$role->name}}
            @endforeach</h2>


        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="font-weight-light"> <strong> Materias</strong></h3>
            </div>

            <div class="row">
                @foreach(auth()->user()->distribuciondos as $dis1)


                @foreach($dis1->materias as $materia)
                <!-- ./col -->
                <div class="col-lg-3 col-5">
                    <!-- small box -->
                    <div class="small-box bg-gradient-info">
                        <div class="inner">
                            <h3> <i class="far fa-bookmark"></i></h3>
                            <p> {{$materia->nombre}}</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-bookmark"></i>
                        </div>
                        <a href="{{route('Unidades', $materia->id)}}" class="small-box-footer">
                            Acceder <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                @endforeach

                @endforeach


            </div>
        </div>




    </div>
</section>







@stop
@section('css')
@stop
@section('js')

@stop