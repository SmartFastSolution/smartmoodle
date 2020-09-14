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
                <a class="btn btn-info float-right btn-xs" href="{{route('roles.create')}}"><i
                        class="fas fa-user-plus"></i>ROLES</a>
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
                        <h3 class="card-title">Informacion de los Roles</h3>
                        <div class="card-tools">



                        </div>

                    </div>

                    <!--Table-->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Rol</th>
                                    <th scope="col">Detalle</th>
                                    <th scope="col">Acceso Completo</th>
                                    <th scope="col">Estado1</th>

                                    <th></th>
                                    <th></th>
                                    <th scope="col" coldspan="3">Tools</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <!--Table head-->

                            <!--Table body-->
                            <tbody>
                                <tr>
                                    @foreach ($roles as $role)
                                    <th scope="row">{{$role['id']}}</th>
                                    <td>{{$role['name']}}</td>
                                    <td>{{$role['descripcion']}}</td>
                                    <td>{{$role['fullacces']}}</td>
                                    <td>{{$role['estado']}}</td>
                                    <td> </td>
                                  

                                    <td class="table-button ">
                                        <a class="btn btn-info btn-xs" href="roles/{{ $role['id']}}"><i
                                                class="fas fa-eye"></i></a>

                                    </td>
                                    <td class="table-button ">
                                        <a class="btn btn-success btn-xs" href="roles/{{ $role['id']}}/edit"><i
                                                class=" fas fa-pencil-alt"></i></a>
                                    </td>
                                    <td class="table-button ">
                                        <!--metodo delete funciona pero hay que almacenar la variable array en una variable temporal-->
                                        <form method="POST" action="{{route('roles.destroy', $role->id)}}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger "><i
                                                    class="fas fa-trash"></i></button>
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
    </div>
</section>







@endsection
@section('script')
@endsection