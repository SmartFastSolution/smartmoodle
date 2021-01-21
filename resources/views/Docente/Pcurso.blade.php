@extends('layouts.nav')

@section('title', 'Perfil | SmartMoodle')




@section('title', 'Administracion - Docente')

@section('content')

<section class="content">
    <div class="container">


        <h1 class="font-weight-light" style="color:red;"> @isset ( auth()->user()->instituto->nombre)
            {{ auth()->user()->instituto->nombre}}
            @endisset</h1>

        <h2 class="font-weight-light">
            @foreach(auth()->user()->roles as $role)
            {{$role->name}} | {{ auth()->user()->name, }}
            {{ auth()->user()->apellido, }}
            @endforeach</h2>
    </div>
</section>


<div class="container">
    <div class="card gedf-card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="ml-2">
                        <div class="h5 m-0">MATERIAS</div>
                        <div class="h7 text-muted"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">

            @isset ($au->materias)
            <div class="row">


                @forelse($au->materias as $materia)
                @foreach($materia->distribucionmacus as $curso)
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3> {{$materia->nombre}}</h3>
                            <p>{{$curso->curso->nombre}} </p>

                        </div>
                        <div class="icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <a href="{{route('Contenidos', $materia->id)}}" class="small-box-footer">
                            Acceder <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                @endforeach
                @empty
                <h1>No tienes cursos asignados</h1>

                @endforelse

            </div>
            @endisset
            @empty($au->materias)
            <h1>No tienes cursos Asignados</h1>
            @endempty

        </div>
    </div>
</div>
@isset($au->materias)
<!--  no lo quiten porq sino da error -->
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
                        <th>Curso</th>
                        <th>Materia</th>
                        <th width="100"> Taller </th>
                        <th>Alumno </th>
                        <th>Enunciado </th>
                        <th>Vista Taller</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $taller)

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
                    @empty

                    @endforelse
                </tbody>
            </table>
            @if ($users->count() >= 1)
            <div class="row justify-content-center">
               {{-- {{ $users->links() }}
--}} 
            </div>
            @endif
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
                        <th>Curso</th>
                        <th>Materia</th>
                        <th width="100"> Taller </th>
                        <th>Alumno </th>
                        <th>Enunciado </th>
                        <th>Vista Taller</th>
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
            <div class="row justify-content-center">
             {{--   {{ $calificado->links() }}--}}

            </div>
        </div>
    </div>
</div>

@endisset



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