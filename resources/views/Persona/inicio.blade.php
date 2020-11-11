@extends('layouts.nav')
@section('title', 'Usuarios | SmartMoodle')

@section('content')

<section class="content">
    <div class="container">

        <div class="btn-group float-right" role="group" aria-label="Basic example">

            <a class="btn btn-info float-right btn" href="{{route('users.create')}}"><i
                    class="fas fa-user-plus"></i> Añadir Usuario</a>
        </div>
        <h1 class="font-weight-light">Gestión de Usuarios</h1>

        <div class="row justify-content-center">
            <div class="col-md-13">


                <div class="card-body">
                    <table id="myTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre y Apellido</th>
                                <th scope="col">Email</th>
                                <th scope="col">Unidad Educativa</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Tools</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}} {{$user->apellido}}</td>

                                <td>{{$user->email}}</td>

                                <td>{{$user->instituto->nombre}}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                    <span class="badge badge-danger"> {{$role->name}}
                                    </span>
                                    @endforeach
                                </td>
                                <td>{{$user->estado}}</td>
                                <td class="table-button ">
                                    <form method="POST" action="{{route('users.destroy', $user->id)}}}">
                                        @csrf
                                        @method('DELETE')

                                        <a class="btn btn-info " href="users/{{ $user['id']}}"><i
                                                class="fas fa-eye"></i></a>
                                        <a class="btn btn-success" href="users/{{ $user['id']}}/edit"><i
                                                class=" fas fa-pencil-alt"></i></a>
                                        <button type="submit" class="btn btn-danger "><i
                                                class="fas fa-trash"></i></button>


                                    </form>
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
$(function() {
    $(document).ready(function() {
        $('#myTable').DataTable({
                "info": false,
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