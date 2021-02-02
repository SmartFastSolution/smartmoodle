@extends('layouts.nav')

@section('title', 'Perfil | SmartMoodle')



@section('content')

<section class="content">
    <div class="container">


        <h1 class="font-weight-light" style="color:red;"> @isset ( auth()->user()->instituto->nombre)
            {{ auth()->user()->instituto->nombre}}

            @endisset</h1>

        <h2 class="font-weight-light" style="color:blue;"> {{ auth()->user()->name, }} {{ auth()->user()->apellido, }}
            @isset ($curso->curso->nombre)
            <h2 class="font-weight-light"> <strong> {{$curso->curso->nombre}} - ({{ auth()->user()->nivel->nombre }})</strong>
            </h2>
            @endisset

    </div>
</section>
<div class="container">
    <div class="card gedf-card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="ml-2">
                        <div class="h5 m-0">MATERIAS</div>
                        <div class="h7 text-muted"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
                <div class="row">
                @foreach($materias as $materia)
                          <div class="col-lg-4 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5 > <strong> {{$materia->nombre_materia}}</strong></h5>
                            <p> {{$materia->nombre_docente}} {{$materia->apellido_docente}} | {{$curso->curso->nombre}} </p>

                            
                        </div>
                        <div class="icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <a href="{{route('Unidades', $materia->materia_id)}}" class="small-box-footer">
                            Acceder <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
{{--             <div class="row">
                @foreach(auth()->user()->assignmets as $as)
                @foreach($as->materias as $materia)
                @foreach($materia->distribuciondos as $doc)
                @foreach($materia->distribucionmacus as $curso)
                <div class="col-lg-4 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5 > <strong> {{$materia->nombre}}</strong></h5>
                            <p> {{$doc->user->name}} {{$doc->user->apellido}} | {{$curso->curso->nombre}} </p>

                            
                        </div>
                        <div class="icon">
                            <i class="fas fa-newspaper"></i>
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
            </div> --}}

        </div>
    </div>
</div>

@stop
@section('css')
@stop
@section('js')

@stop