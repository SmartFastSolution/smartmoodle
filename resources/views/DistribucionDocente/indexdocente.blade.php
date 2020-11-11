@extends('layouts.nav')


@section('title', ' SmartMoodle')



@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<section class="content">
    <div class="container">
        <a class="btn btn-info float-right" href="{{route('distribuciondos.create')}}"><i class="fas fa-plus"></i>
            Asignar Docente</a>
        <h1 class="font-weight-light">Gestión de Asignación de Docentes</h1>
        <div class="row justify-content-center">
            <div class="col-md-13">


                <!-- /.card-header -->
                <div class="card-body">
                    <table id="myTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Unidad Educativa</th>
                                <th scope="col">Docente</th>
                                <th scope="col">Materia(s)</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($distribucions as $dis)
                                <th scope="row">{{$dis['id']}}</th>
                                <td>{{$dis->instituto->nombre}} </td>
                                <td>
                                    {{$dis->user->name}}
                                    {{$dis->user->apellido}}
                                </td>
                                <td>
                                    @if($dis->materias != null)
                                    @foreach($dis->materias as $dismacu)
                                    <span class="badge badge-success">
                                        {{$dismacu->nombre}}
                                    </span>

                                    @endforeach
                                    @endif
                                </td>
                                <td>{{ $dis['estado']}}</td>
                                <td class="table-button ">
                                    <!--metodo delete funciona pero hay que almacenar la variable array en una variable temporal-->
                                    <form method="POST" action="{{route('distribuciondos.destroy', $dis->id)}}}">
                                        @method('DELETE')
                                        @csrf

                                        <a class="btn btn-info " href="{{route('distribuciondos.show', $dis->id)}}"><i
                                            class="fas fa-eye"></i></a>
                                            <a class="btn btn-success btn"
                                        href="{{route('distribuciondos.edit',  $dis->id)}}"><i
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