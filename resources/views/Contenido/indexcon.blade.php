@extends('layouts.nav')

@section('title', 'Contenido | SmartMoodle')


@section('encabezado')



<!-- la referencia que hace este boton es al Rolecontroller en el 
                       cual esta llamando al metodo create y nos redirecciona al crud Roles.createroler...-->



@stop

@section('content')

<section class="content">
    <div class="container">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="row justify-content-center">

            <div class="col-md-13">
                <a class="btn btn-info float-right " href="{{route('contenidos.create')}}"><i class="fas fa-plus"></i>
                    UNIDAD</a>
                <h1>Unidades</h1>
                <div class="card card-secondary">
                    <div class="card-header">

                        <div class="card-tools">
                        </div>
                    </div>
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
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th scope="col" coldspan="3">Tools</th>
                                    <th></th>
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
                                    <td> </td>
                                    <td> </td>
                                    <td class="table-button ">
                                        <a class="btn btn-info btn"
                                            href="{{route('contenidos.show', $contenido->id)}}"><i
                                                class="fas fa-eye"></i></a>
                                    </td>
                                
                                    <td class="table-button ">
                                        <a class="btn btn-success btn"
                                            href="{{route('contenidos.edit', $contenido->id)}}"><i
                                                class=" fas fa-pencil-alt"></i></a>
                                    </td>
                                    <td class="table-button ">
                                        <!--metodo delete funciona pero hay que almacenar la variable array en una variable temporal-->
                                        <form method="POST" action="{{route('contenidos.destroy',$contenido->id)}}}"
                                            enctype="multipart/form-data">
                                            @method('DELETE')
                                            @csrf
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