@extends('layouts.nav')

@section('title', 'Contenido | SmartMoodle')

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
            <a class="btn btn-info float-right" href="{{route('admin.create')}}"><i class="fas fa-plus"> Crear
                        Talleres</i></a>
                <h1 class="font-weight-light">Show Unidad</h1>
                <div class="row">
                    <div class="col-md-10">

                        <form method="POST" action="{{route('contenidos.update', $contenido->id)}} "
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class=" card-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre"
                                        value="{{$contenido->nombre}}" placeholder="Añadir nombre del contenido"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" class="form-control" name="descripcion" id="descripcion"
                                        value="{{$contenido->descripcion}}" placeholder="Añadir una Descripción"
                                        readonly>
                                </div>

                                <div class="form-group">
                                    <label>Editar Materia</label>
                                    <select class="form-control select" name="materia" style="width: 99%;" disabled>
                                        @foreach($materiacontenido as $materiac)
                                        <option selected disabled value="{{ $materiac->id }}">{{ $materiac->nombre }}
                                        </option>
                                        @endforeach
                                        @foreach($materias as $materia)
                                        <option value="{{$materia->id}}">{{$materia->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- subir imagen en laravel prueba 1 -->
                                <div class="form-group">
                                    <label for="documentod">
                                        Vizualizar Documento
                                        <br>
                                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                                            data-target="#modalYT">{{ $contenido['nombre']}}</button>
                                    </label>
                                </div>


                                <!-- fin de la prueba imagen en laravel  -->

                                <div class="form-group">
                                    <label for="nombre">Estado </label>
                                    <br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="estadoon" name="estado" class="custom-control-input"
                                            value="on" @if($contenido['estado']=="on" ) checked
                                            @elseif(old('estado')=="on" ) checked @endif disabled>
                                        <label class="custom-control-label" for="estadoon">Activo</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="estadooff" name="estado" class="custom-control-input"
                                            value="off" @if($contenido['estado']=="off" ) checked
                                            @elseif(old('estado')=="off" ) checked @endif disabled>
                                        <label class="custom-control-label" for="estadooff">No Activo</label>
                                    </div>
                                
                                
                                </div>
                        </form>
                    </div>
                </div>


                <div class="col-md-12">

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                                aria-controls="nav-home" aria-selected="true">Talleres</a>


                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <br>

                            <!-- Inicio de Talleres -->
                            <div class="card card-gray-dark">
                                <div class="card-header">
                                    <h3 class="card-title">Talleres</h3>
                                </div>
                                <div class="card-body">
                                    <table id="dataTable" class="table table-hover">

                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Unidad</th>
                                                <th scope="col"> Taller </th>
                                                <th scope="col">Plantilla </th>
                                                <th scope="col">Estado</th>
                                                <th></th>
                                                <th scope="col">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($tallers as $taller)
                                            <tr>
                                            {{-- <tr v-for="(taller, index) in tallers"> --}}
                                          {{--       <th scope="row"></th>
                                                <td>@{{taller.contenido.nombre}}</td>
                                                <td>@{{taller.nombre}}</td>
                                                <td>@{{taller.plantilla.nombre}}</td>
                                                <td><input type="checkbox" name="toggle" v-bind:checked="taller.estado"></td> --}}
                                                {{-- <td>{{$taller['estado']}}</td> --}}
                                            {{--     <td> </td>
                                                <td class="table-button ">
                                                    <a class="btn btn-info" :href="'/sistema/taller/' + taller.plantilla.id +'/'+ taller.id"><i class="fas fa-eye"></i></a>
                                                </td>
                                            </tr>--}}                                                
                                           
                                                <th scope="row"></th>
                                                <td>{{$taller->contenido->nombre}}</td>
                                                <td>{{$taller['nombre']}}</td>
                                                <td>{{$taller->Plantilla->nombre}}</td>
                                                <td>
                                                    <div class="onoffswitch">
                                                        <input type="checkbox" name="onoffswitch" @change="Cambiar({{ $taller->id }})" class="onoffswitch-checkbox" id="myonoffswitch.{{ $taller->id }}" tabindex="0" @if ($taller['estado'] == 1)
                                                             checked 
                                                        @endif >
                                                        <label class="onoffswitch-label" for="myonoffswitch.{{ $taller->id }}">
                                                            <span class="onoffswitch-inner"></span>
                                                            <span class="onoffswitch-switch"></span>
                                                        </label>
                                                    </div>
                                                    {{-- <input type="checkbox" name="toggle" value="{{ $taller->id }}" @if ($taller['estado'] == 1)
                                                    checked 
                                                @endif> --}}
                                                </td>
                                                {{-- <td>{{$taller['estado']}}</td> --}}
                                                <td> </td>
                                                <td class="table-button ">
                                                    <a class="btn btn-info"
                                                        href="{{route('taller',['plant'=>$taller->plantilla_id,'id'=>$taller->id])}}"><i
                                                            class="fas fa-eye"></i></a>

                                                </td>
                                            </tr>
                                            @endforeach
                                        
                                        </tbody>
                                    </table>
                                     <div class="row justify-content-center mt-3"> {{ $tallers->links() }}</div>

                                </div>
                            </div>
                            <!-- fin de talleres -->
                        </div>

                    </div>
                </div>

            </div>
            <a href="{{url()->previous()}}" class="btn btn-primary">Regesar</a>
        </div>
    </div>
</section>



<!--Modal: Name-->
<div class="modal fade" id="modalYT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

        <!--Content-->
        <div class="modal-content">

            <!--Body-->
            <div class="modal-body mb-0 p-0">

                <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                    <iframe class="embed-responsive-item" width="1000" height="1000"
                        src="{{Storage::url($contenido['documentod'])}}" allowfullscreen></iframe>
                </div>

            </div>

            <div class="modal-footer justify-content-center">
                <span class="mr-4">{{ $contenido['nombre']}}</span>

                <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4"
                    data-dismiss="modal">Close</button>

            </div>

        </div>
        <!--/.Content-->

    </div>
</div>
<!--Modal: Name-->





@stop

@section ('css')
@stop

@section('js')
<script type="text/javascript">
    let talleres = @json($tallers);
    const taller = new Vue({
        el: "#dataTable",
        data:{
            tallers: talleres
        },
        mounted: function (){
           
          
        },
        methods:{
             Cambiar: function(id){
                let taller = id;
                var _this = this;
                var url = '/sistema/admin/cambiarestado';
                    axios.post(url,{
                      id: taller,
                }).then(response => {
                     toastr.success(response.data.message, "Smarmoddle", {
                "timeOut": "3000"
                });
                }).catch(function(error){

                });

            }
    }
    
        
    });
</script>
@stop