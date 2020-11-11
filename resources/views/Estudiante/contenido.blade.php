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

            </div>
            <div class="row">
                <div class="card-body">
                    <h4>Unidades</h4>
                    <a class="btn btn-primary btn" href=""><i class="far fa-clipboard"></i> Calificaciones</i></a>
                <a class="btn btn-success btn" href=""><i class="fas fa-users"></i> Participantes</i></a>
                    @foreach($contenidos->where('materia_id', $materia->id) as $contenido)
                    <!-- ./col -->
                    <p><a type="button" data-toggle="modal" data-target="#modalYT" class="text-primary"> <i
                                class="fas fa-file-pdf"></i>
                            {{$contenido->nombre}}</a></p>
                    <!-- inicio del modal para visualizacion del archivo de contenido -->
                    <div class="modal fade" id="modalYT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">

                            <!--Content-->

                            <div class="modal-content">

                                <!--Body-->

                                <div class="modal-body mb-0 p-0">

                                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                                    @isset ($contenido->archivo->url)
                                        <iframe style="object-fit: contain; width: 100%; height: 500px;"
                                            class="embed-responsive-item"
                                             src="{{$contenido->archivo->url}}"
                                            allowfullscreen></iframe>
                                    @endisset
                                        


                                    </div>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4"
                                    data-dismiss="modal">Close</button>

                            </div>

                        </div>
                        <!--/.Content-->

                    </div>
                    <!-- espacio -->
                    <!-- espacio para que no salga opciones de pdf  -->
                @endforeach
                </div>
                <!--fin del modal -->

                <!-- ./col -->
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
                                    <th scope="col">#</th>
                                    <th scope="col">Unidad</th>
                                    <th scope="col"> Taller </th>
                                    <th scope="col">Plantilla </th>
                                    <th scope="col">Vista Taller</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($tallers->where('contenido_id', $contenido->id) as $taller)
                                    <th scope="row">{{$taller->materia['id']}}</th>
                                    <td>{{$taller->contenido->nombre}}</td>
                                    <td>{{$taller['nombre']}}</td>
                                    <td>{{$taller->Plantilla->nombre}}</td>
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
                                @foreach(auth()->user()->tallers->where('contenido_id', $contenido->id) as $taller)
                                    <tr>
                                        <th scope="row">{{-- {{$taller->materia['id']}} --}}</th>
                                        <td>{{$taller->contenido->nombre}}</td>
                                        <td>{{$taller['nombre']}}</td>
                                        <td>{{$taller->enunciado}}</td>
                                        <td align="center"> <span class="badge @if ($taller->pivot->status == 'completado') badge-warning @elseif($taller->pivot->status == 'calificado') badge-success @endif ">{{$taller->pivot->status}}</span></td>

                                        <td class="text-center"> <span class="badge @isset ($taller->pivot->calificacion) @else badge-danger  @endisset">@isset ($taller->pivot->calificacion)
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
            }
        );
    });
});
</script>

@stop