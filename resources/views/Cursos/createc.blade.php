@extends('layouts.master')
@section('title')
@endsection
@section('contenido')


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Añadir Cursos</h1>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>



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
                    <h3 class="card-title">Formulario de Cursos</h3>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{route('cursos.index')}} ">

                        @csrf

                        <div class=" card-body">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre"
                                    value="{{ old('nombre') }}" placeholder="Añadir Curso">
                            </div>

                            <div class="form-group">
                                <label for="paralelo">Paralelo</label>
                                <input type="text" class="form-control" name="paralelo" id="paralelo"
                                    value="{{ old('paralelo') }}" placeholder="Añadir Paralelo">
                            </div>

                            <div class="form-group">
                                <label>Añadir Nivel</label>
                                <select class="form-control select" name="nivel" style="width: 99%;">
                                    <option selected disabled>Elija el Nivel...</option>
                                    @foreach($nivels as $nivel)
                                    <option value="{{$nivel->id}}">{{$nivel->nombre}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Multiple</label>
                                <select class="select2" multiple="multiple" data-placeholder="Select a State"
                                    style="width: 100%;">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
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

<script>
$(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })  
})
</script>
@endsection