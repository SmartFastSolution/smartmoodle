{{-- @extends('layouts.docapp') --}}

@extends('layouts.nav')
@section('title', 'Unidades | SmartMoodle')

@section('content')

<section class="content">
    <div class="container">
        <h1 class="font-weight-light" style="color:red;"> {{ auth()->user()->instituto->nombre}}</h1>
        <h2 class="font-weight-light" style="color:blue;"> {{ auth()->user()->name, }} {{ auth()->user()->apellido, }}
        </h2>

        <a class="btn btn-primary btn" href=""><i class="far fa-clipboard"></i> Calificaciones</i></a>
       

        <a class="btn btn-success btn" href="{{route('Alumnos', $materia->id)}}"><i class="fas fa-users"></i>
            Participantes</i></a>
       


        <br>
        <br>
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="font-weight-light"> <strong>{{$materia->nombre}}</strong></h3>
            </div>
            <div class="row">
                <div class="card-body">
                    <h4>Unidades</h4>
                    @foreach($contenidos->where('materia_id', $materia->id) as $contenido)
                    <ul class="list-group">


                        <!-- ./col -->

                        <a type="button" data-toggle="modal" data-target="#modalYT" class="text-primary"> <i
                                class="fas fa-file-pdf"></i>
                            {{$contenido->nombre}}</a>
                        <!-- inicio del modal para visualizacion del archivo de contenido -->
                        <div class="modal fade" id="modalYT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">

                                <!--Content-->

                                <div class="modal-content">

                                    <!--Body-->

                                    <div class="modal-body mb-0 p-0">

                                        <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">

                                            <iframe style="object-fit: contain; width: 100%; height: 500px;"
                                                class="embed-responsive-item"
                                                src="{{asset(Storage::url($contenido['documentod']))}}"
                                                allowfullscreen></iframe>


                                        </div>

                                    </div>

                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4"
                                            data-dismiss="modal">Close</button>


                                    </div>
                                </div>


                            </div>
                            <!--/.Content-->

                        </div>
                        <!-- espacio -->
                        <!-- espacio para que no salga opciones de pdf  -->


                        <!--fin del modal -->

                    </ul>


                    @endforeach
                </div>


            </div>


        </div>
                 <h2>Talleres Por Calificar</h2>
                  <div class="card-body">
                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    <th scope="col">Materia</th>
                                    <th scope="col"> Taller </th>
                                    <th scope="col">Alumno </th>
                                    <th scope="col">Enunciado </th>
                                    <th scope="col">Vista Taller</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($users as $taller)
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
                        {{ $users->links() }}


                    </div>

                        <h2>Talleres Calificados</h2>
                     <div class="card-body">
                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    <th scope="col">Materia</th>
                                    <th scope="col"> Taller </th>
                                    <th scope="col">Alumno </th>
                                    <th scope="col">Enunciado </th>
                                    <th scope="col">Vista Taller</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($calificado as $taller)
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
                        {{ $calificado->links() }}
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