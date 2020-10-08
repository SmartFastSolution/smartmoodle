@extends('layouts.nav')


@section('title', 'Crear Asignación')

@section('content')

<section class="content" id="materias">
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">Editar Asignación de Alumno</h1>
                <div class="row">
                    <div class="col-md-10">
                        <form method="POST" action="{{route('distrimas.update', $distrima->id)}} ">
                            @method('PUT')
                            @csrf
                            <div class=" card-body">

                            </div>
                            <label for="nombre">Estado</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="estadoon" name="estado" class="custom-control-input"
                                        value="on" @if($distrima['estado']=="on" ) checked
                                        @elseif(old('estado')=="on" ) checked @endif>
                                    <label class="custom-control-label" for="estadoon">Activo</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="estadooff" name="estado" class="custom-control-input"
                                        value="off" @if($distrima['estado']=="off" ) checked
                                        @elseif(old('estado')=="off" ) checked @endif>
                                    <label class="custom-control-label" for="estadooff">No Activo</label>
                                </div>
                                <br><br><br>
                               
                                <a href="{{url()->previous()}}" class="btn btn-primary">Regesar</a>
                                <input type="submit" class="btn btn-dark " value="Guardar">

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
@stop