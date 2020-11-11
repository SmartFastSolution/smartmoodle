@extends('layouts.nav')

@section('title', 'Contenido | SmartMoodle')


@section('encabezado')



<!-- la referencia que hace este boton es al Rolecontroller en el 
                       cual esta llamando al metodo create y nos redirecciona al crud Roles.createroler...-->



@stop

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<section class="content">
    <div class="container">
        <a class="btn btn-info float-right " href="{{route('contenidos.create')}}"><i class="fas fa-plus"></i>
            Crear</a>
        <h1 class="font-weight-light">Gestión de Unidades</h1>
        <div class="row justify-content-center">

            <div class="col-md-10">


                <!-- .card-header -->
                <div class="card-body">
                    <table id="myTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Materia</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Estado</th>
                                <th scope="col" coldspan="3">Tools</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contenidos as $contenido)
                            <tr>
                                <th scope="row">{{ $contenido['id']}}</th>
                                <td>{{ $contenido['nombre']}}</td>
                                <td>{{ $contenido->materia->nombre}}</td>
                                <td>{{ $contenido['descripcion']}}</td>
                                <td>{{ $contenido['estado']}}</td>
                                <td class="table-button ">
                                    <!--metodo delete funciona pero hay que almacenar la variable array en una variable temporal-->
                                    <form method="POST" action="{{route('contenidos.destroy',$contenido->id)}}}"
                                        enctype="multipart/form-data">
                                        @method('DELETE')
                                        @csrf

                                        <a class="btn btn-info btn"
                                            href="{{route('contenidos.show', $contenido->id)}}"><i
                                                class="fas fa-eye"></i></a>
                                        <a class="btn btn-success btn"
                                            href="{{route('contenidos.edit', $contenido->id)}}"><i
                                                class=" fas fa-pencil-alt"></i></a>
                                        <button type="submit" onclick="return confirm('¿Desea Borrar?');"
                                            class="btn btn-danger "><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <!--Table body-->
                    </table>

                    <!--Table-->
                </div>

            </div>
        </div>
</section>







@stop

@section('css')

@stop

@section('js')

<script>
$(function() {
    $(document).ready(function() {
        $('#myTable').DataTable({
                "info": true,
                "autoWidth": true,

                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            }

        );
    });

});
</script>


@stop