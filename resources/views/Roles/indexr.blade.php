@extends('layouts.nav')

@section('title', 'Roles | SmartMoodle')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<section class="content">
    <div class="container">

        <a class="btn btn-info float-right" href="{{route('roles.create')}}"><i class="fas fa-plus"></i>
            ROLES</a>
        <h1 class="font-weight-light">Gestion de Roles</h1>


        <div class="row justify-content-center">
            <div class="col-md-13">
                <!-- table -->
                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Detalle</th>
                                <th scope="col">Acceso Completo</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Tools</th>
                            </tr>
                        </thead>
                        <!--Table head-->

                        <!--Table body-->
                        <tbody>
                        @foreach ($roles as $role)
                            <tr>
                              
                                <th scope="row">{{$role['id']}}</th>
                                <td>{{$role['name']}}</td>
                                <td>{{$role['descripcion']}}</td>
                                <td>{{ $role['full-access']}}</td>
                                <td>{{$role['estado']}}</td>
                                <td class="table-button ">
                                    <!--metodo delete funciona pero hay que almacenar la variable array en una variable temporal-->
                                    <form method="POST" action="{{route('roles.destroy', $role->id)}}}">
                                        @csrf
                                        @method('DELETE')

                                        <a class="btn btn-info" href="roles/{{ $role['id']}}"><i
                                                class="fas fa-eye"></i></a>
                                        <a class="btn btn-success " href="roles/{{ $role['id']}}/edit"><i
                                                class=" fas fa-pencil-alt"></i></a>

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