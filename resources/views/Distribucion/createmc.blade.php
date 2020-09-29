@extends('layouts.nav')


@section('title', 'Crear Asignación')


@section('encabezado')
<h1>Crear Asignación Materia/Curso</h1>
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

                </div>
                <div class="card-body">

                    <form method="POST" action="{{route('distribucionmacus.index')}} ">

                        @csrf

                        <div class=" card-body">

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion"
                                    value="{{ old('descripcion') }}" placeholder="Añadir Descripcion">
                            </div>     
                            <div class="form-group">
                                <label>Seleccionar Curso</label>
                                <select class="form-control select" name="cursos" style="width: 99%;">
                                    <option selected disabled>Elija el Curso...</option>
                                    @foreach($cursos as $curso)
                                    <option value="{{$curso->id}}">
                                    {{$curso->nombre}}
                                   -    
                                   {{$curso->paralelo}}      
                                    </option>
                                    @endforeach

                                </select>
                            </div>    
                            <div class="form-group">
                                <label>Materias</label>
                                <select class="select2" multiple="multiple" name="materia[]"
                                    data-placeholder="Select a State" style="width: 100%;">
                                    @foreach($materias as $materia)
                                    <option value="{{$materia->id}}">{{$materia->nombre}}
                                        
                                    </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Estado </label>
                                <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="estadoon" name="estado" class="custom-control-input"
                                        value="on" @if(old('estado')=="on" ) checked @endif>
                                    <label class="custom-control-label" for="estadoon">Activo</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="estadooff" name="estado" class="custom-control-input"
                                        value="off" @if(old('estado')=="off" ) checked @endif>
                                    <label class="custom-control-label" for="estadooff">No Activo</label>
                                </div>
                            </div>
                            <br>
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
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script>
$(function() {
    //Initialize Select2 Elements
    $(".select2").select2({
 
});

})

</script>

@stop