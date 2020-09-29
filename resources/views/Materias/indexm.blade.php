@extends('layouts.nav')

@section('title', 'Materias')

@section('encabezado')
<h1>Materia</h1>

<br> <a class="btn btn-info float-right" href="{{route('materias.create')}}"><i
        class="fas fa-user-plus"></i>Materias</a> <br>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="row">
            <!-- left column -->
            <div class="col-md-13">
                <!-- general form elements -->
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Información de Materias </h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Estado</th>
                                    <th></th>
                                    <th scope="col">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($materias as $materia)
                                    <th scope="row">{{ $materia['id']}}</th>
                                    <td>{{ $materia['nombre']}}</td>
                                    <td>{{ $materia['slug']}}</td>
                                    <td>{{ $materia['descripcion']}}</td>
                                    <td>{{ $materia['estado']}}</td>
                                    <td> </td>


                                    <td class="table-button ">
                                        <a class="btn btn-info " href="{{route('materias.show', $materia->id)}}"><i
                                                class="fas fa-eye"></i></a>

                                    </td>
                                    <td class="table-button ">
                                        <a class="btn btn-success btn"
                                            href="{{route('materias.edit', $materia->id)}}"><i
                                                class=" fas fa-pencil-alt"></i></a>
                                    </td>
                                    <td class="table-button ">
                                        <!--metodo delete funciona pero hay que almacenar la variable array en una variable temporal-->
                                        <form method="POST" action="{{route('materias.destroy', $materia->id)}}}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger "><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <!--Table body-->

                        </table>
                        {{$materias->links()}}
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
    <script> console.log('Hi!'); </script>
@stop