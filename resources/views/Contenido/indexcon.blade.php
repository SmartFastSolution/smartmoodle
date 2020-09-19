@extends('layouts.master')
@section('title')
@endsection
@section('contenido')


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-10">
                <h1>Sección Administrador</h1>
            </div>
            <div class="card-tools">
                <!-- la referencia que hace este boton es al Rolecontroller en el 
                       cual esta llamando al metodo create y nos redirecciona al crud Roles.createroler...-->
                <a class="btn btn-info float-right btn-xs" href="{{route('contenidos.create')}}"><i
                        class="fas fa-user-plus"></i> Contenido</a>
            </div>
        </div>
    </div><!-- container-fluid -->
</section>



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
                        <h3 class="card-title">Información de Contenido </h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- .card-header -->
                    <div class="card-body">
                        <table id="dataTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Materia</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Documento(s)</th>
                                    <th scope="col">Estado</th>
                                    <th></th>
                                    <th scope="col">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($contenidos as $contenido)
                                    <th scope="row">{{ $contenido['id']}}</th>
                                    <td>{{ $contenido['nombre']}}</td>
                                    <td>{{ $contenido->materia->nombre}}</td>
                                    <td>{{ $contenido['descripcion']}}</td>
                                    <td>
                                        <a target="_blank"
                                            href="{{Storage::url($contenido['documentod'])}}">{{ $contenido['nombre']}}</a>
                                    </td>

                                    <td>{{ $contenido['estado']}}</td>
                                    <td> </td>
                                    <td class="table-button ">
                                        <a class="btn btn-info btn-xs"
                                            href="{{route('contenidos.show', $contenido->id)}}"><i
                                                class="fas fa-eye"></i></a>
                                    </td>
                                    <td class="table-button ">
                                        <a class="btn btn-success btn-xs"
                                            href="{{route('contenidos.edit', $contenido->id)}}"><i
                                                class=" fas fa-pencil-alt"></i></a>
                                    </td>
                                    <td class="table-button ">
                                        <!--metodo delete funciona pero hay que almacenar la variable array en una variable temporal-->
                                        <form method="POST" action="{{route('contenidos.destroy', $contenido->id)}}}">
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
                        {{$contenidos->links()}}
                        <!--Table-->
                    </div>
                </div>
            </div>
        </div>
</section>



@endsection
@section('script')
@endsection