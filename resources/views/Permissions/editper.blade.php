@extends('layouts.master')
@section('title')


@endsection
@section('contenido')



<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar Menú</h1>
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
                    <h3 class="card-title">Formulario Permisos</h3>
                </div>
                <div class="card-body">

                <form method="POST" action="permisos/{$permission->['id']}" >
                        @method('PUT')
                        @csrf

                    

                        <div class=" card-body">
                            <div class="form-group">
                                <label for="namep"> Nombre del Menu</label>
                                <input type="text" class="form-control"  value="{{$permission->namep}}" name="namep" id="namep" placeholder="Menu"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="descripcionp"> descripcionp</label>
                                <input type="text" class="form-control"  value="{{$permission->descripcionp}}" name="descripcionp" tag="descripcionp" id="descripcionp"
                                    placeholder="Descripción">
                            </div>   

                              <h3>Estado del Menú</h3>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="estadoon" name="estado" class="custom-control-input"
                                    value="on" @if($permission['estado']=="on" ) checked
                                    @elseif(old('estado')=="on" ) checked @endif>
                                <label class="custom-control-label" for="estadoon">Activo</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="estadooff" name="estado" class="custom-control-input"
                                    value="off" @if($permission['estado']=="off" ) checked
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
@endsection
@section('script')






@endsection