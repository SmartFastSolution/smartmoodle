{{-- @extends('layouts.docapp') --}}

@extends('layouts.nav')
@section('title', 'Unidades | SmartMoodle')

@section('content')

<section class="content">
    <div class="container">
        <h1 class="font-weight-light" style="color:red;"> {{ auth()->user()->instituto->nombre}}</h1>
        <h2 class="font-weight-light" style="color:blue;"> {{ auth()->user()->name, }} {{ auth()->user()->apellido, }}
            <h2 class="text-center display-2 font-weight-bold text-primary">Administrador de Talleres</h2>
        </h2>  
        <br>
        <br>
<ul class="nav nav-tabs" id="myTab" role="tablist">
@foreach ($contenidos as $c => $contenido)

  <li class="nav-item">
    <a class="nav-link @if ($c== 0) active @endif " id="contenido{{ $contenido->id }}-tab" data-toggle="tab" href="#contenido{{ $contenido->id }}" role="tab" aria-controls="contenido{{ $contenido->id }}" aria-selected="true">{{ $contenido->nombre }}</a>
  </li>

@endforeach

</ul>

<div class="tab-content" id="myTabContent">
@foreach ($contenidos as $c => $contenido)
  <div class="tab-pane fade show @if ($c== 0) active @endif " id="contenido{{ $contenido->id }}" role="tabpanel" aria-labelledby="contenido{{ $contenido->id }}-tab">
      <div class="row justify-content-center">
          <div class="col-12">
                          <!-- Inicio de Talleres -->
                            <div class="card card-gray-dark mt-2">
                                <div class="card-header">
                                    <h3 class="card-title">Talleres</h3>
                                </div>
                                <div class="card-body">
                                    <table  class="table table-hover">

                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col" width="100">Unidad</th>
                                                <th scope="col" width="100"> Taller </th>
                                                <th scope="col">Enunciado </th>
                                                <th scope="col">Estado</th>
                                                <th scope="col">Fecha Entrega</th>
                                                <th scope="col" colspan="2">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             {{-- @foreach($contenido->tallers as $t => $taller) --}}
                                            <tr v-for="(taller, index) in talleres[{{ $c }}].talleres">
                                                <td>{{$contenido->nombre}}</td>
                                                <td>@{{taller.nombre}}</td>
                                                <td>@{{taller.enunciado}}</td>
                                                <td>                        
                                                        <span v-if="taller.estado == 1" class="badge-success badge">activo</span>

                                                        <span v-else class="badge-danger badge">desactivado</span>
                                        
                                                  
                                                </td>
                                                <td>@{{ taller.fecha_entrega }}</td>
                                                <td class="table-button ">
                                                    <a class="btn btn-info"
                                                        :href="ruta+taller.plantilla_id+'/'+taller.id"><i
                                                            class="fas fa-eye"></i>
                                                    </a>
                                                    
                                                </td>
                                                <td>
                                                   <a class="btn btn-warning" href="" @click.prevent="Cambiar({{ $c }}, index)"> <i class="fas fa-edit"></i></a> 
                                                </td>
                                   {{--              <th scope="row"></th>
                                                <td>{{$taller->contenido->nombre}}</td>
                                                <td>{{$taller['nombre']}}</td>
                                                <td>{{$taller->enunciado}}</td>
                                                <td>
                                                    @if ($taller['estado'] == 1)
                                                        <span class="badge-success badge">activo</span>
                                                    @else
                                                        <span class="badge-danger badge">desactivado</span>

                                                    @endif
                                                    <div class="onoffswitch">
                                                        <input type="checkbox" name="onoffswitch" @change="Cambiar({{ $taller->id }})" class="onoffswitch-checkbox" id="myonoffswitch.{{ $taller->id }}" tabindex="0" @if ($taller['estado'] == 1)
                                                             checked 
                                                        @endif >
                                                        <label class="onoffswitch-label" for="myonoffswitch.{{ $taller->id }}">
                                                            <span class="onoffswitch-inner"></span>
                                                            <span class="onoffswitch-switch"></span>
                                                        </label>
                                                    </div>
                                                  
                                                </td>
                                                <td></td>
                                                <td class="table-button ">
                                                    <a class="btn btn-info"
                                                        href="{{route('taller',['plant'=>$taller->plantilla_id,'id'=>$taller->id])}}"><i
                                                            class="fas fa-eye"></i>
                                                    </a>
                                                    
                                                </td>
                                                <td>
                                                   <a class="btn btn-warning" href="#" @click="Cambiar({{ $c }},{{ $t }})"> <i class="fas fa-edit"></i></a> 
                                                </td> --}}
                                            </tr>
                                            {{-- @endforeach --}}
                                        
                                        </tbody>   
                                    </table>

                                     <div class="row justify-content-center mt-3"> {{ $tallers->links() }}</div>

                                </div>
                            </div>
          </div>
      </div>
    </div>
@endforeach
  <div class="modal fade" id="fecha" tabindex="-1" aria-labelledby="fechaLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="fechaLabel">Opciones</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                    <div class="form-row justify-content-center">
                                                        <div class="form-group col-4">
                                                            <label for="" class="col-form-label">Estado :</label>
                                                             <div class="onoffswitch" v-if="">
                                                        <input type="checkbox" v-model="estado" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" tabindex="0">
                                                        <label class="onoffswitch-label" for="myonoffswitch">
                                                            <span class="onoffswitch-inner"></span>
                                                            <span class="onoffswitch-switch"></span>
                                                        </label>
                                                    </div>
                                                        </div>
                                                        <div class="form-group col-8">
                                                            <label for="" class="col-form-label">Fecha de entrega:</label>
                                                <input type="date" class="form-control" v-model="fecha_entrega">
                                                         
                                                        </div>
                                                        <a href="#" class="btn btn-danger text-center" @click.prevent="Enviar">Enviar</a>

                                                    </div>
                                            
                                              </div>
                                              <div class="modal-footer">
                                               
                                              </div>
                                            </div>
                                          </div>
                                        </div>
</div>

</section>



@stop
@section('css')
@stop
@section('js')
<script type="text/javascript">
    let talleres = @json($tallers);
    let talleress = @json($talleres);
    let materia = @json($id);
console.log(talleress)
    const taller = new Vue({
        el: "#myTabContent",
        data:{
            materia_id: materia,
            tallers: talleres,
            talleres:talleress,
            taller_id:'',
            fecha_entrega:'',
            estado:'',
            ruta:'/sistema/taller/'
        },
        mounted: function (){
           
          
        },
        methods:{
             Cambiar(index, id){
                let taller_id = id;
                // console.log(index)
                let estado = this.talleres[index].talleres[id].estado;
                let fecha = this.talleres[index].talleres[id].fecha_entrega;
                this.taller_id = this.talleres[index].talleres[id].id;
                this.estado = estado;
                this.fecha_entrega = fecha
                $('#fecha').modal('show');
            },
            Enviar: function () {
                // let taller = id;
                var set = this;
                var url = '/sistema/admin/registro';
                    axios.post(url,{
                        materia:set.materia_id,
                      taller_id: set.taller_id,
                      estado: set.estado,
                      fecha: set.fecha_entrega
                }).then(response => {
                     toastr.success(response.data.message, "Smarmoddle", {
                "timeOut": "3000"

                });
                     set.talleres = [];
                set.talleres = response.data.talleres;
                    $('#fecha').modal('hide')
                // location.reload();
                }).catch(function(error){

                });

            }
    }      
    });
</script>
@stop