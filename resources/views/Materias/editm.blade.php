@extends('layouts.nav')

@section('title', 'Editar Materias')


@section('content')







@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Parece que hay porblemas o Malas decisiones <br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<section class="content">
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">Editar Materias</h1>
                <div class="row">
                    <div class="col-md-8">
                        <form method="POST" action="{{route('materias.update', $materias->id)}} ">
                            @method('PUT')
                            @csrf
                            <div class=" card-body">
                                <div class="form-group">
                                    <label>Unidad Educativa</label>
                                    <select class="form-control select" name="instituto" style="width: 99%;">
                                        @foreach($institutomate as $instumate)
                                        <option selected disabled value="{{ $instumate->id }}">
                                            {{ $instumate->nombre }}
                                        </option>
                                        @endforeach
                                        @foreach($institutos as $instituto)
                                        <option value="{{$instituto->id}}">{{$instituto->nombre}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre"
                                        value="{{$materias->nombre}}" placeholder="Edición de Materia">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug Materia</label>
                                    <input type="text" class="form-control" name="slug" tag="slug" id="slug"
                                        placeholder="Slug Materia" value="{{$materias->slug}}">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" class="form-control" name="descripcion" id="descripcion"
                                        value="{{$materias->descripcion}}" placeholder="Descripción">
                                </div>
                                <label for="nombre">Estado</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="estadoon" name="estado" class="custom-control-input"
                                        value="on" @if($materias['estado']=="on" ) checked @elseif(old('estado')=="on" )
                                        checked @endif>
                                    <label class="custom-control-label" for="estadoon">Activo</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="estadooff" name="estado" class="custom-control-input"
                                        value="off" @if($materias['estado']=="off" ) checked
                                        @elseif(old('estado')=="off" ) checked @endif>
                                    <label class="custom-control-label" for="estadooff">No Activo</label>
                                </div>
                                <br><br><br>
                                <input type="submit" class="btn btn-dark " value="Guardar">
                                <a href="{{url()->previous()}}" class="btn btn-primary">Regesar</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- seccion contenido  inicio  -->

                <div class="col-md-10">

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                                aria-controls="nav-home" aria-selected="true">Unidades</a>


                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <br>

                            <div class="card card-gray-dark">
                                <div class="card-header">
                                    <h3 class="card-title">Unidades</h3>
                                </div>
                                <div class="card-body">
                                    <table id="dataTable" class="table table-hover-sm">

                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Materia</th>
                                                <th scope="col">Unidad</th>
                                                <th scope="col">Descripción </th>
                                                <th scope="col">Estado</th>
                                                <th></th>
                                                <th scope="col">Vista Unidad</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($contenidos->where('materia_id', $materias->id) as $contenido)
                                            <tr>

                                                <th scope="row">{{$contenido['id']}}</th>
                                                <td>{{$contenido->materia->nombre}}</td>
                                                <td>{{$contenido['nombre']}}</td>
                                                <td>{{$contenido['descripcion']}}</td>
                                                <td>{{$contenido['estado']}}</td>
                                                <td> </td>
                                                <td class="table-button ">
                                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                                        data-target="#modalYT"><i class="fas fa-eye"></i></button>

                                                </td>

                                            </tr>
                                            <!-- inicio del modal para visualizacion del archivo de contenido -->
                                            <div class="modal fade" id="modalYT" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">

                                                    <!--Content-->

                                                    <div class="modal-content">

                                                        <!--Body-->

                                                        <div class="modal-body mb-0 p-0">

                                                            <div
                                                                class="embed-responsive embed-responsive-16by9 z-depth-1-half">

                                                                <iframe
                                                                    style="object-fit: contain; width: 100%; height: 500px;"
                                                                    class="embed-responsive-item"
                                                                    src="{{$contenido->archivo->url}}"
                                                                    allowfullscreen></iframe>

                                                            </div>

                                                        </div>

                                                        <div class="modal-footer justify-content-center">
                                                            <span class="mr-4">{{$contenido['nombre']}}</span>

                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-rounded btn-md ml-4"
                                                                data-dismiss="modal">Close</button>

                                                        </div>

                                                    </div>
                                                    <!--/.Content-->

                                                </div>
                                                <!-- espacio -->
                                                <!-- espacio para que no salga opciones de pdf  -->

                                            </div>
                                            <!--fin del modal -->
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- fin de Contenidos -->
                        </div>

                    </div>
                </div>


                <!-- secccion contenido fin  -->




            </div>
        </div>
</section>





@stop

@section('css')

@stop

@section('js')

<script>
$(document).ready(function() {

    $('#nombre').keyup(function(e) {
        var str = $('#nombre').val();
        str = str.replace(/\W+(?!$)/g, '-').toLowerCase(); // remplazamos el estdo de dashe
        $('#slug').val(str);
        $('slug').attr('placeholder', str);
    });

});
</script>
@stop