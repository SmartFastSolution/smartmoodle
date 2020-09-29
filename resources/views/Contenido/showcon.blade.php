@extends('layouts.nav')

@section('title', 'Dashboard')

@section('encabezado')
<h1>Editar Contenidos</h1>
@stop

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
<div class="row">
    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Formulario Contenidos</h3>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('contenidos.update', $contenido->id)}} "
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class=" card-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                value="{{$contenido->nombre}}" placeholder="Añadir nombre del contenido" readonly>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion"
                                value="{{$contenido->descripcion}}" placeholder="Añadir una Descripción" readonly>
                        </div>

                        <div class="form-group">
                            <label>Editar Materia</label>
                            <select class="form-control select" name="materia" style="width: 99%;" disabled>
                                @foreach($materiacontenido as $materiac)
                                <option selected disabled value="{{ $materiac->id }}">{{ $materiac->nombre }}
                                </option>
                                @endforeach
                                @foreach($materias as $materia)
                                <option value="{{$materia->id}}">{{$materia->nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- subir imagen en laravel prueba 1 -->
                        <div class="form-group">
                            <label for="documentod">
                                <!-- <br>
                                    {{$contenido->documentod}}
                                    <br> -->
                                <!-- <a target="_blank"
                                        href="{{Storage::url($contenido['documentod'])}}">{{ $contenido['nombre']}}</a>
                                    <br> -->
                                Vizualizar Documento
                                <br>
                                <button type="button"  class="btn btn-secondary" data-toggle="modal"
                                    data-target="#modalYT">{{ $contenido['nombre']}}</button>
                            </label>
                        </div>


                        <!-- fin de la prueba imagen en laravel  -->

                        <div class="form-group">
                            <label for="nombre">Estado </label>
                            <br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="estadoon" name="estado" class="custom-control-input" value="on"
                                    @if($contenido['estado']=="on" ) checked @elseif(old('estado')=="on" ) checked
                                    @endif disabled>
                                <label class="custom-control-label" for="estadoon">Activo</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="estadooff" name="estado" class="custom-control-input"
                                    value="off" @if($contenido['estado']=="off" ) checked @elseif(old('estado')=="off" )
                                    checked @endif disabled>
                                <label class="custom-control-label" for="estadooff">No Activo</label>
                            </div>
                            <br><br><br>

                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>



<!--Modal: Name-->
<div class="modal fade" id="modalYT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

        <!--Content-->
        <div class="modal-content">

            <!--Body-->
            <div class="modal-body mb-0 p-0">

                <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                    <iframe class="embed-responsive-item" width="1000" height="1000" src="{{Storage::url($contenido['documentod'])}}"
                        allowfullscreen></iframe>
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
<!--Modal: Name-->





@stop

@section ('css')
@stop

@section('js')

@stop