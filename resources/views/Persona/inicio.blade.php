@extends('layouts.master')

@section('title')


 


@endsection


@section('contenido')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-10">
                <h1>Sección Administrador</h1>
            </div>
            <div class="card-tools">
                <a class="btn btn-info float-right btn-xs" href="{{route('users.create')}}"><i
                        class="fas fa-user-plus"></i>USUARIO</a>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-13">
                <!-- general form elements -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Informacion de los Usuario</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <!--Table-->
                    <div class="card">
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Cedula</th>
                                        <th scope="col">Primer Nombre</th>
                                        <th scope="col">Primer Apellido</th>
                                        <th scope="col">Domicilio</th>
                                        <th scope="col">Teléfono</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Estado</th>
                                        <th></th>
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
                                        @foreach ($users as $user)
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->cedula}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->apellido}}</td>
                                        <td>{{$user->domicilio}}</td>
                                        <td>{{$user->telefono}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->estado}}</td>
                                        <td> </td>
                                        <td> </td>


                                        <td class="table-button ">
                                            <a class="btn btn-info btn-xs" href="users/users/{{ $user['id']}}"><i
                                                    class="fas fa-eye"></i></a>

                                        </td>
                                        <td class="table-button ">
                                            <a class="btn btn-success btn-xs"
                                                href="users/users/{{ $user['id']}}/edit"><i
                                                    class=" fas fa-pencil-alt"></i></a>
                                        </td>
                                        <td class="table-button ">
                                            <!--metodo delete funciona pero hay que almacenar la variable array en una variable temporal-->
                                            <form method="POST" action="{{route('users.destroy', $user->id)}}}">
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