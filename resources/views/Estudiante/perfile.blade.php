{{-- @extends('layouts.estapp') --}}
@extends('layouts.nav')


@section('title', 'Perfil | SmartMoodle')



@section('content')



<section class="content">

    <div class="card-body">
        </div>
    <h2>UNIDAD EDUCATIVA: {{ auth()->user()->instituto->nombre}} </h2>
    <h2>ROL: @foreach(auth()->user()->roles as $role)
        {{$role->name}}
        @endforeach </h2>
    <h4> BIENVENIDO: {{ auth()->user()->name, }} {{ auth()->user()->apellido, }} </h4>

   

     @foreach(auth()->user()->distrimas as $distrimas)
       @foreach($distrimas->distribumacus as $dis1)

        <h2>Curso  {{$dis1->curso->nombre}}</h2>
         <h3>Paralelo {{$dis1->nivel->nombre}} </h3>
          <br>
          <h3>Materias</h3>
         @foreach($dis1->materias as $materia)
                   {{$materia->nombre}}
                   {{$materia->descripcion}}
                   
               <br>
                   @foreach($materia->contenidos as $contenido)
                   <h3>Contenido</h3>
                     {{$materia->nombre}} 
                    <h4> Nombre del contenido:{{$contenido->nombre}}</h4>
                    <h4> Descripcion del Contenido: {{$contenido->descripcion}} </h4>
                 
               
                  
                      @endforeach
                @endforeach
        @endforeach
    @endforeach

    <div>


    </div>
</section>




@stop
@section('css')
@stop
@section('js')

@stop