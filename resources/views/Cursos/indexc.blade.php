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
                <a class="btn btn-info float-right btn-xs" href="{{route('cursos.create')}}"><i
                        class="fas fa-user-plus"></i> Cursos</a>
            </div>
        </div>
    </div><!-- /.container-fluid -->
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
                        <h3 class="card-title">Información de Cursos </h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nivel</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Paralelo</th>
                                    <th scope="col">Estado</th>
                                    <th></th>
                                    <th scope="col">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($cursos as $curso)
                                    <th scope="row">{{ $curso['id']}}</th>                                   
                                    <td>{{ $curso['nivel_id']}}</td>
                                    <td>{{ $curso['nombre']}}</td>
                                    <td>{{ $curso['paralelo']}}</td>
                                    <td>{{ $curso['estado']}}</td>

                                    <td> </td>


                                    <td class="table-button ">
                                        <a class="btn btn-info btn-xs" href="{{route('cursos.show', $curso->id)}}"><i
                                                class="fas fa-eye"></i></a>

                                    </td>
                                    <td class="table-button ">
                                        <a class="btn btn-success btn-xs" href="{{route('cursos.edit', $curso->id)}}"><i
                                                class=" fas fa-pencil-alt"></i></a>
                                    </td>
                                    <td class="table-button ">
                                        <!--metodo delete funciona pero hay que almacenar la variable array en una variable temporal-->
                                        <form method="POST" action="{{route('cursos.destroy', $curso->id)}}}">
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
                        {{$cursos->links()}}
                        <!--Table-->
                    </div>
                </div>
            </div>
        </div>
</section>



@endsection
@section('script')
@endsection