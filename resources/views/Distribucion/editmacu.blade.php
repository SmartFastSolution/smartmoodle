@extends('layouts.nav')

@section('title', 'Editar')

@section('encabezado')
<h1>Editar Asignación</h1>
@stop

@section('content')



<section class="content">
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{route('distribucionmacus.update', $distribucionmacu->id)}} ">
                @method('PUT')
                @csrf
                <div class="card card-dark">
                    <div class="card-header">

                        <div class="card-tools">
                        </div>
                    </div>
                    <div class=" card-body">

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion"
                                value="{{$distribucionmacu->descripcion}}" placeholder="Descripción">
                        </div>

                        <div class="form-group">
                            <label>Curso</label>
                            <select class="form-control select" name="curso" style="width: 99%;">
                                @foreach($distcursos as $distcurso)
                                <option selected disabled value="{{ $distcurso->id }}">
                                    {{ $distcurso->nombre }}
                                    -
                                    {{$distcurso->paralelo}}
                                </option>
                                @endforeach
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
                            <label>Seleccione Materias</label>
                            <select class="select2" multiple="multiple" name="materia[]"
                                data-placeholder="Select a State" style="width: 100%;">

                                @foreach($materias as $materia)
                                <option value="{{$materia->id}}" @isset( $distribucionmacu->materias[0]->nombre)
                                    @if($materia->nombre == $distribucionmacu->materias[0]->nombre)
                                    selected
                                    @endif
                                    @endisset

                                    >{{$materia->nombre}}</option>

                                @endforeach
                            </select>
                        </div>


                        <label for="nombre">Estado</label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="estadoon" name="estado" class="custom-control-input" value="on"
                                @if($distribucionmacu['estado']=="on" ) checked @elseif(old('estado')=="on" ) checked
                                @endif>
                            <label class="custom-control-label" for="estadoon">Activo</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="estadooff" name="estado" class="custom-control-input" value="off"
                                @if($distribucionmacu['estado']=="off" ) checked @elseif(old('estado')=="off" ) checked
                                @endif>
                            <label class="custom-control-label" for="estadooff">No Activo</label>
                        </div>
                        <br><br><br>
                        <input type="submit" class="btn btn-dark " value="Guardar">


                    </div>
                </div>
            </form>
        </div>
    </div>
</section>








@stop

@section('css')
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