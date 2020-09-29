@extends('layouts.nav')

@section('title', 'Editar Nivel')

@section('encabezado')
    <h1>Editar Nivel</h1>
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
                    <h3 class="card-title">Formulario Nivel</h3>
                </div>
                <div class="card-body">

                  
                    <form method="POST" action="{{route('nivels.update', $nivel->id)}} ">
                    @method('PUT')
                        @csrf
                        <div class=" card-body">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre"  value="{{$nivel->nombre}}" placeholder="Edición del Nivel"
                                    >
                            </div>                                                                                       
                            <h3>Estado del Nivel</h3>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="estadoon" name="estado" class="custom-control-input"
                                    value="on" @if($nivel['estado']=="on" ) checked
                                    @elseif(old('estado')=="on" ) checked @endif>
                                <label class="custom-control-label" for="estadoon">Activo</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="estadooff" name="estado" class="custom-control-input"
                                    value="off" @if($nivel['estado']=="off" ) checked
                                    @elseif(old('estado')=="off" ) checked @endif>
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
    <script> console.log('Hi!'); </script>
@stop