{{-- @extends('layouts.docapp') --}}

@extends('layouts.nav')
@section('title', 'Unidades | SmartMoodle')

@section('content')

<section class="content">
    <div class="container">
        <h1 class="font-weight-light" style="color:red;"> @isset ( auth()->user()->instituto->nombre)
            {{ auth()->user()->instituto->nombre}}

            @endisset</h1>
        <h2 class="font-weight-light" style="color:blue;"> {{ auth()->user()->name, }} {{ auth()->user()->apellido, }}
        </h2>

        <!-- <a class="btn btn-primary btn" href=""><i class="far fa-clipboard"></i> Calificaciones</i></a> -->


        <a class="btn btn-dark btn" href="{{route('Alumnos', $materia->id)}}"><i class="fas fa-users"></i>
            Estudiantes</i></a>
        <a class="btn btn-info btn" href="{{ route('contenido.talleres', $materia->id) }}"><i
                class="fas fa-book-open"></i>
            Talleres</i></a>

    </div>
</section>

<br>
<div class="container">
    <div class="card gedf-card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="ml-2">
                        <div class="h5 m-0">{{$materia->nombre}}</div>
                        <div class="h7 text-muted"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h1 class="font-weight-light"> Unidades</h1>

            <table id="myTable3" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Materia</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col" coldspan="1">Ver Documento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cons as $c)
                    <tr>
                        <td> {{$c->nombre}}</td>
                        <td> {{$c->descripcion}}</td>
                        <td><a class="btn btn-dark btn" href="{{route('Contenido.docente', $c->id)}}"><i
                                    class="fas fa-eye"></i></a>
                        </td>

                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



<div class="container">
    <div class="card gedf-card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="ml-2">
                        <div class="h5 m-0">Talleres Por Calificar</div>
                        <div class="h7 text-muted"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="myTable" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Curso</th>
                        <th scope="col">Materia</th>
                        <th scope="col" width="100"> Taller </th>
                        <th scope="col">Alumno </th>
                        <th scope="col">Enunciado </th>
                        <th scope="col">Vista Taller</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $taller)
                    <tr>
                        <td>{{$taller->cur_nombre}} - {{ $taller->nivel_nombre }}</td>
                        <td>{{$taller->mate_nombre}}</td>
                        <td>{{$taller->nombre}}</td>
                        <td>{{$taller->alumno}}</td>
                        <td>{{$taller->enunciado}}</td>
                        <td class="table-button ">
                            <a class="btn btn-info"
                                href="{{route('taller.docente',['plant'=>$taller->plantilla_id,'id'=>$taller->taller_id, 'user'=>$taller->user_id])}}"><i
                                    class="fas fa-eye"></i></a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>



<div class="container">
    <div class="card gedf-card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="ml-2">
                        <div class="h5 m-0">Talleres Calificados</div>
                        <div class="h7 text-muted"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="myTable2" class="table table-hover">

                <thead>
                    <tr>
                        <th scope="col">Curso</th>
                        <th scope="col">Materia</th>
                        <th scope="col" width="100"> Taller </th>
                        <th scope="col">Alumno </th>
                        <th scope="col">Enunciado </th>
                        <th scope="col">Vista Taller</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($calificado as $taller)
                    <tr>
                        <td>{{$taller->cur_nombre}} - {{ $taller->nivel_nombre }}</td>
                        <td>{{$taller->mate_nombre}}</td>
                        <td>{{$taller->nombre}}</td>
                        <td>{{$taller->alumno}}</td>
                        <td>{{$taller->enunciado}}</td>
                        <td class="table-button ">
                            <a class="btn btn-info"
                                href="{{route('taller.docente',['plant'=>$taller->plantilla_id,'id'=>$taller->taller_id, 'user'=>$taller->user_id])}}"><i
                                    class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>






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
        });

        $('#myTable2').DataTable({
            "info": true,
            "autoWidth": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });

        $('#myTable3').DataTable({
            "info": true,
            "autoWidth": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
});
</script>

@stop