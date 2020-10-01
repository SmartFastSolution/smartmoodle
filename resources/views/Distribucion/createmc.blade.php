@extends('layouts.nav')


@section('title', 'Crear Asignación')

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
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">Añadir Asignación Materia/Paralelo</h1>
                <div class="row">
                    <div class="col-md-10">

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
                                            value="on" @if(old('estado')=="on" ) checked @endif
                                            @if(old('estado')===null) checked @endif>
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
                                <a href="{{url()->previous()}}" class="btn btn-primary">Regesar</a>
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