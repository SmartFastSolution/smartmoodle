@extends('layouts.nav')

@section('title', 'Perfil | SmartMoodle')



@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Parece que hay porblemas o Malas decisiones <br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<section class="content">
    <div class="container">


        <h1 class="font-weight-light" style="color:red;"> @isset ( auth()->user()->instituto->nombre)
            {{ auth()->user()->instituto->nombre}}
                
            @endisset</h1>

        <h2 class="font-weight-light" style="color:blue;"> {{ auth()->user()->name, }} {{ auth()->user()->apellido, }}
            @isset (auth()->user()->curso->nombre)
            <h2 class="font-weight-light"> <strong> {{auth()->user()->curso->nombre}} </strong>
            </h2>
            @endisset


            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="font-weight-light"> <strong> Materias</strong></h3>
                </div>
                <div class="row">
                    @foreach(auth()->user()->assignmets as $as)
                    @foreach($as->materias as $materia)
                    @foreach($materia->distribuciondos as $doc)
                    @foreach($materia->distribucionmacus as $curso)
                    <div class="col-lg-3 col-5">

                        <div class="small-box bg-gradient-info">
                            <div class="inner">
                                <h3> <i class="far fa-bookmark"></i></h3>
                                <p>Curso:{{$curso->curso->nombre}} </p>
                                <p> {{$materia->nombre}} </p>
                                <p> Docente: {{$doc->user->name}} {{$doc->user->apellido}}</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-bookmark"></i>
                            </div>
                            <a href="{{route('Unidades', $materia->id)}}" class="small-box-footer">
                                Acceder <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @endforeach
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