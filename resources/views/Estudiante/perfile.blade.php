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

    <h2>Curso {{$dis1->curso->nombre}}</h2>
    
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
    <h4> Documento del Contenido: {{$contenido->documentod}} </h4>

    <button type="button" class="btn btn-secondary" data-toggle="modal"
        data-target="#modalYT">{{ $contenido['nombre']}}</button>


    <div class="modal fade" id="modalYT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            <!--Content-->
            <div class="modal-content">

                <!--Body-->
                <div class="modal-body mb-0 p-0">

                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                        <iframe class="embed-responsive-item" width="1000" height="1000"
                            src="{{Storage::url($contenido['documentod'])}}" allowfullscreen></iframe>
                    </div>

                </div>

                <div class="modal-footer justify-content-center">
                    <span class="mr-4">{{ $contenido['nombre']}}</span>

                    <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4"
                        data-dismiss="modal">Close</button>

                </div>

            </div>
            <!--/.Content-->

        </div>
    </div>

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