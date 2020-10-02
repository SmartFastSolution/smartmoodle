@extends('layouts.nav')

@section('title', 'Editar Materias')
@section('encabezado')
<h1>Editar Materias</h1>
@stop

@section('content')





<section class="content">

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
                    <h3 class="card-title">Formulario Materias</h3>
                </div>
                <div class="card-body">


                    <form method="POST" action="{{route('materias.update', $materias->id)}} ">
                        @method('PUT')
                        @csrf
                        <div class=" card-body">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre"
                                    value="{{$materias->nombre}}" placeholder="Edición de Materia">
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug Materia</label>
                                <input type="text" class="form-control" name="slug" tag="slug"
                                    id="slug" placeholder="Slug Materia" value="{{$materias->slug}}">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion"
                                    value="{{$materias->descripcion}}" placeholder="Descripción">
                            </div>
                            <label for="nombre">Estado</label><br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="estadoon" name="estado" class="custom-control-input" value="on"
                                    @if($materias['estado']=="on" ) checked @elseif(old('estado')=="on" ) checked
                                    @endif>
                                <label class="custom-control-label" for="estadoon">Activo</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="estadooff" name="estado" class="custom-control-input"
                                    value="off" @if($materias['estado']=="off" ) checked @elseif(old('estado')=="off" )
                                    checked @endif>
                                <label class="custom-control-label" for="estadooff">No Activo</label>
                            </div>
                            <br><br><br>
                            <input type="submit" class="btn btn-dark " value="Guardar">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@stop

@section('css')
    
@stop

@section('js')
   
<script>
$(document).ready(function() {

    $('#nombre').keyup(function(e) {
        var str = $('#nombre').val();
        str = str.replace(/\W+(?!$)/g, '-').toLowerCase(); // remplazamos el estdo de dashe
        $('#slug').val(str);
        $('slug').attr('placeholder', str);
    });

});
</script>
@stop