@extends('layouts.nav')

@section('title', 'Usuarios')

@section('content')

<section class="content">
    <div class="container">

  
        <div class="row justify-content-center">
            <div class="col-md-13">
                <a class="btn btn-info float-right btn" href="{{route('users.create')}}"><i
                        class="fas fa-user-plus"></i>USUARIO</a>
                <h1>Usuarios</h1>
                <div class="card card-secondary">
                    <div class="card-header">

                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Unidad Educativa</th>
                                    <th scope="col">Rol</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th scope="col" coldspan="3">Tools</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($users as $user)
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->cedula}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->apellido}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->instituto->nombre}}</td>
                                 
                                    <td>
                                        @foreach($user->roles as $role)
                                        <span class="badge badge-danger"> {{$role->name}}
                                        </span>
                                        @endforeach
                                    </td>

                                    <td> </td>
                                    <td> </td>
                                    <td class="table-button ">
                                        <a class="btn btn-info " href="users/{{ $user['id']}}"><i
                                                class="fas fa-eye"></i></a>

                                    </td>
                                    <td class="table-button ">
                                        <a class="btn btn-success" href="users/{{ $user['id']}}/edit"><i
                                                class=" fas fa-pencil-alt"></i></a>
                                    </td>
                                    <td class="table-button ">
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
                        </table>
                        {{$users->links()}}
                    </div>
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
console.log('Hi!');
</script>
@stop