@extends('layouts.nav')

@section('title', 'Editar Unidad Educativa')

@section('encabezado')
<h1>Editar Unidad Educativa</h1>
<br>
<br>
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
                    <h3 class="card-title">Formulario Unidad Educativa</h3>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{route('institutos.update', $instituto->id)}} ">
                        @method('PUT')
                        @csrf

                        <div class=" card-body">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre"
                                    value="{{$instituto->nombre}}" placeholder="Unidad Educativa">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" name="descripcion"
                                    value="{{$instituto->descripcion}}" id="descripcion" placeholder="Descripcion">
                            </div>
                            <div class="form-group">
                                <label for="provincia">Provincia</label>
                                <input type="text" class="form-control" name="provincia" id="provincia"
                                    value="{{$instituto->provincia}}" placeholder="Provincia">
                            </div>
                            <div class="form-group">
                                <label for="canton">Cantón</label>
                                <input type="text" class="form-control" name="canton" value="{{$instituto->canton}}"
                                    id="canton" placeholder="Cantón">
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" name="direccion" id="direccion"
                                    value="{{$instituto->direccion}}" placeholder="Dirección">
                            </div>

                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono"
                                    value="{{$instituto->telefono}}" placeholder="Télefono">
                            </div>

                            <div class="form-group">
                                <label for="email">Correo Electrónico </label>
                                <input type="text" class="form-control" name="email" value="{{$instituto->email}}"
                                    id="email" placeholder="Email">
                            </div>

                            <h3>Estado de La Unidad Educativa</h3>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="estadoon" name="estado" class="custom-control-input" value="on"
                                    @if($instituto['estado']=="on" ) checked @elseif(old('estado')=="on" ) checked
                                    @endif>
                                <label class="custom-control-label" for="estadoon">Activo</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="estadooff" name="estado" class="custom-control-input"
                                    value="off" @if($instituto['estado']=="off" ) checked @elseif(old('estado')=="off" )
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

@sto