@extends('layouts.nav')


@section('titulo', $datos->taller->nombre)
@section('content')


	 <div class="container">
	 	<h1 class="text-center  mt-5">{{ $datos->taller->nombre }}</h1>
        <h3 class="text-center mt-3">{{ $datos->enunciado }}</h3>

        <div class="row justify-content-center">
            @foreach ($datos->partidaDobleEnn as $key =>$element)
                  <div class="col-6">
                    <div class="card border border-info mb-3">
                  <div class="card-header">Enunciado {{ $key +1 }}</div>
                  <div class="card-body text-info">
                    <p class="card-text">{{ $element->enunciados }}</p>
                  </div>
                </div>
                </div>
            @endforeach
        </div>

              <h2 class="text-center">Ejercicio</h2> 
              <div id="partida">
                <div class="row justify-content-between" > 
                  <div class="col-5">
                    <table class="table">
                        <thead>
                                <tr>
                                  <th colspan="2" scope="col">
                                      <div class="row justify-content-around">
                                          <div class="col-2">D</div>
                                          <div class="col-8 text-center" contenteditable="true">CAJA</div>
                                          <div class="col-2 text-right">H</div>
                                      </div>
                                  </th>
                                </tr>
                        </thead>
                        <tbody>
                             <tr>
                                <td width="225" class="border-left-0 border-bottom-0 border-top-0 border">
                                    <div class="row justify-content-end">
                                        <div class="col-12">
                                          <div v-for="(dato, index) in partida_array">
                                            <div v-for="(haber, id) in partida_array[index].haber">
                                                <p  class="text-right">@{{ haber.valor }}</p>
                                            </div>
                                        </div>
                                         <p v-if="caja.total_haber != 0" class="border border-bottom-0 border-left-0 border-right-0 border-danger text-right">$ @{{ caja.total_haber }}</p>
                                            
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row justify-content-end">
                                          <div class="col-12">
                                          <div v-for="(dato, index) in partida_array">
                                            <div v-for="(debe, id) in partida_array[index].debe">
                                                <p  class="text-right">@{{ debe.valor }}</p>
                                            </div>
                                        </div>
                                         <p v-if="caja.total_debe != 0" class="border border-bottom-0 border-left-0 border-right-0 border-danger text-right">$ @{{ caja.total_debe }}</p>
                                            
                                        </div>
                                    </div>
                                </td>
                             </tr>
                        </tbody>
                    </table>
                  </div>
             
             {{--  @for ($i = 0; $i < $datos->partidaDobleEnn->count(); $i++) --}}
           
                <div v-for="(item, index) in partida_array" class="col-5">
                    <table class="table">
                        <thead>
                                <tr>
                                  <th colspan="2" scope="col">
                                      <div class="row justify-content-around">
                                          <div class="col-2">D</div>
                                          <div class="col-8 text-center"><input value="" v-model="partida_array[index].cuenta" type="text" class="form-control-sm form-control text-center"></div>
                                          <div class="col-2 text-right">H</div>
                                      </div>
                                  </th>
                                </tr>
                        </thead>
                        <tbody>
                             <tr>
                                <td width="225" class="border-left-0 border-bottom-0 border-top-0 border">
                                    <div class="row justify-content-end">
                                        <div class="col-12 align-self-end">
                                            <div v-for="(debe, id) in partida_array[index].debe">
                                                 <p  class="text-right">@{{ debe.valor }} <a href="" @click.prevent="eliminarDebe(index, id)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></p>

                                            </div>
                                        <p v-if="partida_array[index].debe.length > 1" class="border border-bottom-0 border-left-0 border-right-0 border-danger text-right">$ @{{ partida_array[index].total_debe }}</p>
                                        <a v-if="partida_array[index].haber.length == 0 " href="" @click.prevent="agregarDebe(index)" class="btn btn-sm btn-danger">Agregar</a>
                                        </div>
                                     
                                    </div>
                                </td>
                                <td>
                                    <div class="row justify-content-end">
                                     <div class="col-12">
                                        <div v-for="(haber, id) in partida_array[index].haber">
                                                 <p  class="text-right">@{{ haber.valor }} <a href="" @click.prevent="eliminarHaber(index, id)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></p>

                                            </div>
                                            <p v-if="partida_array[index].haber.length > 1" class=" text-right border border-bottom-0 border-left-0 border-right-0 border-danger">$ @{{ partida_array[index].total_haber }}</p>
                                            <a v-if="partida_array[index].debe.length == 0" href=""  @click.prevent="agregarHaber(index)"  class="btn btn-sm btn-success float-right">Agregar</a>

                                        </div>
                                    </div>
                                </td>
                             </tr>

                        </tbody>
                    </table>

                  </div>
                  <div class="modal fade" id="valores" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-sm">
                        <div class="modal-content bg-primary">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Debe</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-center">
                            <input type="text" v-model="reco[crear].debe" class="form-control mb-2" placeholder="Ingrese un valor" name="">
                            <a href="" @click.prevent="insertarDebe()" class="btn btn-sm btn-light">Guardar</a>
                          </div>
                          <div class="modal-footer">
                           
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal fade" id="haber" tabindex="-1" aria-labelledby="haberLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-sm">
                        <div class="modal-content bg-success">
                          <div class="modal-header">
                            <h5 class="modal-title" id="haberLabel">Agregar Haber</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-center">
                            <input type="text" v-model="reco[crear].haber" class="form-control mb-2" placeholder="Ingrese un valor" name="">
                            <a href="" @click.prevent="insertarHaber()" class="btn btn-sm btn-light">Guardar</a>
                          </div>
                          <div class="modal-footer">
                           
                          </div>
                        </div>
                      </div>
                    </div>
                      
                 </div>
                 <div class="row justify-content-center mb-2">
                        <a  @click.prevent="guardarTaller" class="btn p-2 mt-3 btn-danger">Enviar Respuesta</a>
                     </div>
             </div>
          
           {{--    @endfor --}}
              
   
 </div>

@endsection
@section('js')
<script type="text/javascript">
    let taller = @json($d);
    let dobles = @json($array);
    let recorrido = @json($recorrido);

    const partida = new Vue({
        el: "#partida",
        data:{
            partida_array: dobles,
            caja:{
                valor_haber:[],
                valor_debe:[],
                total_debe:0,
                total_haber:0,
            },
            reco: recorrido,
            crear:0,
            id_editar:0,
        
        },
        methods:{
            agregarDebe:function(index){
                this.crear = index
                $('#valores').modal('show');
        },
        insertarDebe(){
             //      let array =   this.partida_array[index]
             // console.log(array);
             let id= this.crear;
                 if(this.reco[id].debe.trim() ===''){
                  toastr.error("El valor es obligatorio", "Smarmoddle", {
                    "timeOut": "3000"
                });
                 }else {
                  var debe ={ valor:this.reco[id].debe}
                  this.partida_array[id].debe.push(debe);
                  toastr.success("Valor agregado correctamente", "Smarmoddle", {
                    "timeOut": "3000"
                });
                  this.reco[id].debe = '';
                  $('#valores').modal('hide')
                  this.cambioDebe(id);
                  this.totaldebe();
                 

            }
        },
        agregarHaber:function(index){
                this.crear = index
                $('#haber').modal('show');
        },
        insertarHaber(){
             //      let array =   this.partida_array[index]
             // console.log(array);
             let id= this.crear;
                 if(this.reco[id].haber.trim() ===''){
                  toastr.error("El valor es obligatorio", "Smarmoddle", {
                    "timeOut": "3000"
                });
                 }else {
                  var haber ={ valor:this.reco[id].haber}
                  this.partida_array[id].haber.push(haber);
                  toastr.success("Valor agregado correctamente", "Smarmoddle", {
                    "timeOut": "3000"
                });
                  this.reco[id].haber = '';
                  $('#haber').modal('hide')
                  this.cambioHaber(id);
                   this.totalhaber();
            }
        },
           cambioDebe(index){
              let t_debe = this.partida_array[index].debe;           //CARGAR EL ARRAY DE LOS ACTIVOS
              let total = 0;
              t_debe.forEach(function(obj){           //RECORRER ESE ARRAY
                total += Number(obj.valor);           //SUMAR EL SALDO DE CADA CUENTA EN EL ARRAY UNA Y OTRA VEZ
              });
            console.log(total);
              this.partida_array[index].total_debe = total;          //IGUALAR LA VARIABLE QUE CONTIENE LA SUMA TOTAL CON LA SUMA REALIZADA
             },
            cambioHaber(index){
              let t_haber = this.partida_array[index].haber;           //CARGAR EL ARRAY DE LOS ACTIVOS
              let total = 0;
              t_haber.forEach(function(obj){           //RECORRER ESE ARRAY
                total += Number(obj.valor);           //SUMAR EL SALDO DE CADA CUENTA EN EL ARRAY UNA Y OTRA VEZ
              });
            console.log(total);
              this.partida_array[index].total_haber = total;          //IGUALAR LA VARIABLE QUE CONTIENE LA SUMA TOTAL CON LA SUMA REALIZADA
             },
             eliminarDebe(index, id){
            this.partida_array[index].debe.splice(id, 1);
            this.cambioDebe(index);
            this.totaldebe();
            
             },
              eliminarHaber(index, id){
            this.partida_array[index].haber.splice(id, 1);
            this.cambioHaber(index)
            this.totalhaber();
   
             },
             totaldebe(){
            let t_haber = this.partida_array;           
              let total = 0;
              t_haber.forEach(function(obj, id){
               t_haber[id].debe.forEach(function(ob){            
                total += Number(ob.valor); 
                
                });
              });
              this.caja.total_debe = total
             },
               totalhaber(){
            let t_haber = this.partida_array;           
              let total = 0;
              t_haber.forEach(function(obj, id){
               t_haber[id].haber.forEach(function(ob){            
                total += Number(ob.valor); 
                
                });
              });
              this.caja.total_haber = total
             },
                guardarTaller: function(){
                        let t_haber = this.partida_array;   
                        let t_debe = this.partida_array;   
                        let _this = this;
                        let url = '/sistema/admin/taller2/'+taller;
                
                        t_haber.forEach(function(obj, id){
                           t_haber[id].haber.forEach(function(ob){  
                           _this.caja.valor_debe.push(ob.valor);  
                            });
                          });
                         t_debe.forEach(function(obj, id){
                           t_debe[id].debe.forEach(function(ob){  
                           _this.caja.valor_haber.push(ob.valor);  
                            });
                          });
                         
                       console.log('activado') 
                        axios.post(url,{
                        id: taller,
                        datos: _this.partida_array,
                        caja: _this.caja,
                    }).then(response => {
                        window.location = "/sistema/homees";   
                    }).catch(function(error){

                    });
                },
    
        }
    })
</script>
@endsection
