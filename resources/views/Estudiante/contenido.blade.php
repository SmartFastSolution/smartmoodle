{{-- @extends('layouts.estapp') --}}

@extends('layouts.nav')
@section('title', 'Perfil | SmartMoodle')



@section('content')

<section class="content">
    <div class="container">
        <h1 class="font-weight-light" style="color:red;"> @isset ( auth()->user()->instituto->nombre)
        {{ auth()->user()->instituto->nombre}}
        @endisset</h1>
        <h2 class="font-weight-light"> <strong> {{auth()->user()->curso->nombre}} </strong></h2>
        @foreach($materia->distribuciondos as $doc)
        <h3 class="font-weight-light"> <strong>Docente|{{$doc->user->name}} {{$doc->user->apellido}}</strong>
        </h3>
        @endforeach
        <!-- <a class="btn btn-primary btn" href=""><i class="far fa-clipboard"></i> Calificaciones</i></a> -->
    </div>
</section>
<br>
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
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="font-size: 20px;">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="mn-documentos-generales-tab" data-toggle="tab"
                        href="#mn-documentos-generales" role="tab" aria-controls="mn-documentos-generales"
                    aria-selected="true">Documentos Generales</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link " id="mn-documentos-profesor-tab" data-toggle="tab"
                        href="#mn-documentos-profesor" role="tab" aria-controls="mn-documentos-profesor"
                    aria-selected="true">Documentos Profesor</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="mn-documentos-generales" role="tabpanel"
                    aria-labelledby="mn-documentos-generales-tab">
                    <table id="myTable3" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nombre del Documento</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Acción</th>
                                <th scope="col" coldspan="1">Ver Documento</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cons as $c)
                            <tr>
                                <td> {{$c->nombre}}</td>
                                <td> {{$c->descripcion}}</td>
                                <td>@if($c['accion']== '1')
                                    <span class="badge-success badge">Descargable</span>
                                    @else
                                    <span v-else class="badge-info badge">No Descargable</span>
                                    @endif
                                </td>
                                <td>
                                    @if($c['accion']== '1')
                                    <!-- descarganle -->
                                    <a class="btn btn-dark btn" href="{{route('Contenido3.alumno', $c->id)}}"><i
                                            class="fas fa-eye"></i></a>

                                    @else
                                    <!-- no descarganle -->
                                    <a class="btn btn-dark btn" href="{{route('Contenido.alumno', $c->id)}}"><i
                                            class="fas fa-eye"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade " id="mn-documentos-profesor" role="tabpanel"
                    aria-labelledby="mn-documentos-profesor-tab">
                    <table id="myTable4" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nombre del Documento</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col" coldspan="1">Ver Documento</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cons2 as $c2)
                            <tr>
                                <td> {{$c2->nombre}}</td>
                                <td> {{$c2->descripcion}}</td>
                                <td><a class="btn btn-dark btn" href="{{route('Contenido2.alumno', $c2->id)}}"><i
                                class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container accordion"  id="talleres_pendientes">
<div class="card gedf-card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <div class="ml-2">
                    <div class="h5 m-0"> <strong>Talleres</strong></div>
                    <div class="h7 text-muted"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        @foreach($contenidos->where('materia_id', $materia->id) as $key => $contenido)
        <!-- Inicio de Talleres -->
        <div class="card card-gray-dark">
            <div>
                <button class="btn btn-link btn-block text-left text-danger font-weight-bold" type="button" data-toggle="collapse" data-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
                {{$contenido->nombre}}
                </button>
                {{-- <h3 class="card-title"></h3> --}}
            </div>
            <div id="collapse{{ $key }}" class="collapse @if ($key == 0)
                show
                @endif " aria-labelledby="headingOne" data-parent="#talleres_pendientes">
                <div class="card-body">
                    <table class="table table-hover myTable">
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
                                
                                <td>@if ($taller->plantilla_id == 37)
                                    Taller de Modulos Contable
                                    @else
                                    {!!$taller->enunciado!!}
                                    @endif
                                </td>
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
            
        </div>
        <!-- fin de talleres -->
        @endforeach
    </div>
</div>
</div>
<div class="container accordion"  id="talleres_calificados">
<div class="card gedf-card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <div class="ml-2">
                    <div class="h5 m-0"> <strong>Talleres Completados</strong></div>
                    <div class="h7 text-muted"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        @foreach($contenidos->where('materia_id', $materia->id) as  $key1 => $contenido)
        <!-- Inicio de Talleres -->
        <div class="card card-gray-dark">
            <div>
                <button class="btn btn-link btn-block text-left text-info font-weight-bold" type="button" data-toggle="collapse" data-target="#collapse{{ $key1 }}calificados" aria-expanded="true" aria-controls="collapse{{ $key1 }}calificados">
                {{$contenido->nombre}}
                </button>
            </div>
            <div id="collapse{{ $key1 }}calificados" class="collapse @if ($key1 == 0)
                show
                @endif " aria-labelledby="headingOne" data-parent="#talleres_calificados">
                <div class="card-body">
                    <table class="table table-hover myTable">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col" width="100">Unidad</th>
                                <th class="text-center" scope="col" width="80"> Taller </th>
                                <th class="text-center" scope="col">Enunciado </th>
                                <th class="text-center" scope="col">Estado </th>
                                <th class="text-center" scope="col">Calificacion </th>
                                {{-- <th class="text-center" scope="col">Vista Taller</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(auth()->user()->tallers->where('contenido_id', $contenido->id) as
                            $taller)
                            <tr>
                                <td>{{$taller->contenido->nombre}}</td>
                                <td>{{$taller['nombre']}}</td>
                                <td>@if ($taller->plantilla_id == 37)
                                    Taller de Modulos Contable
                                    @else
                                    {!!$taller->enunciado!!}
                                @endif</td>
                                <td align="center"> <span
                                class="badge @if($taller->pivot->status =='completado')badge-warning @elseif($taller->pivot->status == 'calificado') badge-success @endif ">{{$taller->pivot->status}}</span>
                            </td>
                            <td class="text-center"> <span
                                class="badge @isset($taller->pivot->calificacion) @else badge-danger  @endisset">@isset($taller->pivot->calificacion)
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
</div>
<!-- fin de talleres -->
@endforeach
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
        $('.myTable').DataTable({
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
        $('#myTable4').DataTable({
            "info": true,
            "autoWidth": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });


        $('#myTable3 thead tr').clone(true).appendTo('#myTable3 thead');
        $('#myTable3 thead tr:eq(1) th').each(function(i) {

            var title = $(this).text(); //es el nombre de la columna
            $(this).html('<input type="text" placeholder="Buscar..." />');

            $('input', this).on('keyup change', function() {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });

        $('#myTable4 thead tr').clone(true).appendTo('#myTable4 thead');
        $('#myTable4 thead tr:eq(1) th').each(function(i) {

            var title = $(this).text(); //es el nombre de la columna
            $(this).html('<input type="text" placeholder="Buscar..." />');

            $('input', this).on('keyup change', function() {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });

    });
});
</script>

@stop