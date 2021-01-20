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

        <a class="btn btn-primary btn" href=""><i class="far fa-clipboard"></i> Calificaciones</i></a>


        <a class="btn btn-success btn" href="{{route('Alumnos', $materia->id)}}"><i class="fas fa-users"></i>
            Participantes</i></a>
        <a class="btn btn-info btn" href="{{ route('contenido.talleres', $materia->id) }}"><i
                class="fas fa-book-open"></i>
            Talleres</i></a>

        <br>
        <br>
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="font-weight-light"> <strong>{{$materia->nombre}}</strong></h3>
            </div>
            <div class="row">
                <div class="card-body">
                    <h4>Unidades</h4>
                    @foreach($cons as $c)
                    <p> <a class="btn btn-info btn" href="{{route('Contenido.docente', $c->id)}}">{{$c->nombre}}</a></p>
                    @endforeach
                    <div class="row justify-content-center mt-3"> {{ $cons->links() }}
                    </div>
                </div>
            </div>
        </div>
        <h2>Talleres Por Calificar</h2>
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
                        <td>@if ($taller->plantilla_id == 37)
                                                    Taller de Modulos Contable
                                                    @else
                                                     {!!$taller->enunciado!!}
                                                @endif</td>
                        <td class="table-button ">
                            <a class="btn btn-info"
                                href="{{route('taller.docente',['plant'=>$taller->plantilla_id,'id'=>$taller->taller_id, 'user'=>$taller->user_id])}}"><i
                                    class="fas fa-eye"></i></a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $users->links() }} --}}


        </div>

        <h2>Talleres Calificados</h2>
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
                        <td>@if ($taller->plantilla_id == 37)
                                                    Taller de Modulos Contable
                                                    @else
                                                     {!!$taller->enunciado!!}
                                                @endif</td>
                        <td class="table-button ">
                            <a class="btn btn-info"
                                href="{{route('taller.docente',['plant'=>$taller->plantilla_id,'id'=>$taller->taller_id, 'user'=>$taller->user_id])}}"><i
                                    class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $calificado->links() }} --}}
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
    });
});
</script>

@stop