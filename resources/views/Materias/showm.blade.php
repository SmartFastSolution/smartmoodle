@extends('layouts.nav')

@section('title', ' Materias')

@section('encabezado')
<h1> Materias</h1>
<br> <a class="btn btn-info float-right" href="{{route('admin.create')}}"><i class="fas fa-plus"> Crear Talleres</i></a>
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
            <div class="card card-gray-dark">
                <div class="card-header">
                    <h3 class="card-title">Formulario Materias</h3>
                </div>
                <form method="POST" action="{{route('materias.update', $materia->id)}} ">

                    <div class="card-body">
                        <div class=" card-body">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre"
                                    value="{{$materia->nombre}}" placeholder="Edición de Materia" readonly>
                            </div>
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                value="{{$materia->descripcion}}" placeholder="Descripción" readonly>
                        </div>
                        <label for="nombre">Estado</label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="estadoon" name="estado" class="custom-control-input" value="on"
                                @if($materia['estado']=="on" ) checked @elseif(old('estado')=="on" ) checked @endif
                                disabled>
                            <label class="custom-control-label" for="estadoon">Activo</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="estadooff" name="estado" class="custom-control-input" value="off"
                                @if($materia['estado']=="off" ) checked @elseif(old('estado')=="off" ) checked @endif
                                disabled>
                            <label class="custom-control-label" for="estadooff">No Activo</label>
                        </div>
                        <br><br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<section class="content">


    <div class="col-md-10">


        <div class="card card-gray-dark">
            <div class="card-header">
                <h3 class="card-title">Talleres</h3>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-hover">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Materia</th>
                            <th scope="col">Nombre del Taller </th>
                            <th scope="col">Nombre de la Plantilla </th>
                            <th scope="col">Estado</th>
                            <th></th>
                            <th scope="col">Vista Taller</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($tallers->where('materia_id', $materia->id) as $taller)
                            <th scope="row">{{$taller->materia['id']}}</th>
                            <td>{{$taller->materia->nombre}}</td>
                            <td>{{$taller['nombre']}}</td>
                            <td>{{$taller->Plantilla->nombre}}</td>
                            <td>{{$taller['estado']}}</td>
                            <td> </td>
                            <td class="table-button ">
                                <a class="btn btn-info"
                                    href="{{route('taller',['plant'=>$taller->plantilla_id,'id'=>$taller->id])}}"><i
                                        class="fas fa-eye"></i></a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@stop

@section('css')

@stop

@section('js')
<script>
console.log('Hi!');
</script>
@stop