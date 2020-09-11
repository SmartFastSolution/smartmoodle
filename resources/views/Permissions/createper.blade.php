@extends('layouts.master')
@section('title')


@endsection
@section('contenido')



<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Crear Permisos</h1>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

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
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Formulario Menu</h3>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{route('permisos.store')}} ">
                        @csrf

                        <div class=" card-body">
                            <div class="form-group">
                                <label for="namep"> Nombre del Menú</label>
                                <input type="text" class="form-control" name="namep" id="namep" placeholder="Nombre"
                                    value="{{old('namep')}}">
                            </div>
                            <div class="form-group">
                                <label for="descripcionp">Detalle del Menú</label>
                                <input type="text" class="form-control" name="descripcionp" tag="descripcionp" id="descripcionp"
                                    placeholder="Descripcion" value="{{old('descripcionp')}}">
                            </div>
                            <h3>Estado del Menú</h3>
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
                                <br>
                                <br>
                                <br>
                            <input type="submit" class="btn btn-dark " value="Guardar">
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-6">

        </div>
    </div>
</section>





@endsection
@section('script')





@endsection