@extends('layouts.nav')



@section('title', 'Crear Unidad Educativa')

@section('encabezado')
    <h1>Añadir Unidad Educativa</h1>
    <br><br>
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

                    <form method="POST" action="{{route('institutos.index')}} ">

                        @csrf

                        <div class=" card-body">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Unidad Educativa"
                                    >
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion"
                                    placeholder="Descripcion" >
                            </div>
                            <div class="form-group">
                                <label for="provincia">Provincia</label>
                                <input type="text" class="form-control" name="provincia" id="provincia"
                                    placeholder="Provincia" >
                            </div>
                            <div class="form-group">
                                <label for="canton">Cantón</label>
                                <input type="text" class="form-control" name="canton" id="canton"
                                    placeholder="Cantón" >
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" name="direccion" id="direccion"
                                    placeholder="Dirección" >
                            </div>
                          
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono"
                                    placeholder="Télefono" >
                            </div>
                           
                            <div class="form-group">
                                <label for="email">Correo Electrónico </label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                            </div>

                            <div class="form-group">
                            <h3>Estado del Instituto</h3>
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
    
@stop