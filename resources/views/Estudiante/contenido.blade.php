{{-- @extends('layouts.estapp') --}}

@extends('layouts.nav')
@section('title', 'Perfil | SmartMoodle')



@section('content')

<section class="content">
    <div class="container">


        <h1 class="font-weight-light" style="color:red;"> {{ auth()->user()->instituto->nombre}}</h1>
        <h2 class="font-weight-light"> <strong> {{auth()->user()->curso->nombre}} </strong></h2>

        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="font-weight-light"> <strong>{{$materia->nombre}}</strong></h3>

                @foreach($materia->distribuciondos as $doc)
                <h3 class="font-weight-light"> <strong>Docente: {{$doc->user->name}} {{$doc->user->apellido}}</strong>
                </h3>
                @endforeach

                <a class="btn btn-primary btn" href=""><i class="far fa-clipboard"></i> Calificaciones</i></a>
                <a class="btn btn-success btn" href=""><i class="fas fa-users"></i> Participantes</i></a>
            </div>
            <div class="row">
                <div class="card-body">
                    <h4>Unidades</h4>
                    @foreach($cons as $c)
                    <!-- ./col -->
                    <p> <a class="btn btn-info btn" href="{{route('Contenido.alumno', $c->id)}}">{{$c->nombre}}</a></p>
                    @endforeach
                    <div class="row justify-content-center mt-3"> {{ $cons->links() }}
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="font-weight-light"> <strong>Talleres</strong></h3>
                </div>
                <div class="row">
                    <div class="card-body">
                        @foreach($contenidos->where('materia_id', $materia->id) as $contenido)
                        <!-- Inicio de Talleres -->
                        <div class="card card-gray-dark">
                            <div>
                                <h3 class="card-title"> {{$contenido->nombre}}</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="100">Unidad</th>
                                            <th scope="col" width="100">Taller </th>
                                            <th scope="col">Enunciado </th>
                                            <th scope="col">Fecha Entrega </th>
                                            <th scope="col">Vista Taller</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tallers->where('contenido_id', $contenido->id)->where('estado', 1) as
                                        $taller)
                                        <tr>
                                            <td>{{$taller->contenido->nombre}}</td>
                                            <td>{{$taller['nombre']}}</td>
                                            <td>{{$taller->enunciado}}</td>
                                            <td class="text-center">
                                                {{Carbon\Carbon::parse($taller->fecha_entrega)->formatLocalized('%d, %B %Y ') }}
                                            </td>
                                            <td class="table-button ">
                                                <a class="btn btn-info"
                                                    href="{{route('taller',['plant'=>$taller->plantilla_id,'id'=>$taller->id])}}"><i
                                                        class="fas fa-eye"></i></a>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- fin de talleres -->
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="font-weight-light"> <strong>Talleres Completados</strong></h3>
                </div>
                <div class="row">
                    <div class="card-body">

                        @foreach($contenidos->where('materia_id', $materia->id) as $contenido)
                        <!-- Inicio de Talleres -->
                        <div class="card card-gray-dark">
                            <div>
                                <h3 class="card-title"> {{$contenido->nombre}}</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="50">#</th>
                                            <th scope="col" width="100">Unidad</th>
                                            <th scope="col" width="80"> Taller </th>
                                            <th scope="col">Enunciado </th>
                                            <th scope="col">Estado </th>
                                            <th scope="col">Calificacion </th>

                                            {{-- <th scope="col">Vista Taller</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(auth()->user()->tallers->where('contenido_id', $contenido->id) as
                                        $taller)
                                        <tr>
                                            <th scope="row">{{-- {{$taller->materia['id']}} --}}</th>
                                            <td>{{$taller->contenido->nombre}}</td>
                                            <td>{{$taller['nombre']}}</td>
                                            <td>{{$taller->enunciado}}</td>
                                            <td align="center"> <span
                                                    class="badge @if($taller->pivot->status =='completado')badge-warning @elseif($taller->pivot->status == 'calificado') badge-success @endif ">{{$taller->pivot->status}}</span>
                                            </td>

                                            <td class="text-center"> <span
                                                    class="badge @isset($taller->pivot->calificacion) @elsebadge-danger  @endisset">@isset($taller->pivot->calificacion)
                                                    <a class="btn btn-info"
                                                        href="{{route('vista.taller',['plant'=>$taller->plantilla_id,'id'=>$taller->id])}}"><i
                                                            class="fas fa-eye"></i></a> @else pendiente
                                                    @endisset</span>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- fin de talleres -->
                        @endforeach

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