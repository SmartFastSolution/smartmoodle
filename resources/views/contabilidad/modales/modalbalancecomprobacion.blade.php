{{-- TRANSACCION --}}
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="bc-transaccion" tabindex="-1"  role="dialog" aria-labelledby="bc-transaccionLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl " role="document">
        <div class="modal-content bg-light">
            <div class="modal-header">
              <div v-if="update">
                <h5 class="modal-title" id="bg-transaccionLabel">ACTUALIZAR TRANSACCION</h5>
              </div>
              <div v-else="!update">
                <h5 class="modal-title" id="bg-transaccionLabel">AGREGAR TRANSACCION</h5>
              </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                   <div class="col-6 border border-bottom-0 border-left-0 border-top-0 border-danger">
                        <h2 class="text-center">AGREGAR MOVIMIENTOS</h2>
                           <div class="form-group row">
                            <label  class="col-sm-4 col-form-label">Selecciona la Cuenta</label>
                            <div class="col-sm-7">
                            {{--   <multiselect v-model="mayor.seleccion" :options="options"  placeholder="Elige Una Cuenta" label="text" track-by="value" @input="onSelect()"></multiselect> --}}
                          <model-select :options="options" v-model="balance.cuenta" placeholder="ELEGIR CUENTA"></model-select>
                            </div>
                            {{-- <div class="col-sm-2">
                            <a href="" class="btn btn-danger" @click.prevent="onSelect">Seleccionar</a>
                          </div> --}}
                          </div>
                          
                          <h2 class="text-center font-weight-bold text-info">SUMAS</h2>
                    <table class="table table-bordered table-sm mb-2">
                          <thead class="bg-success">
                            <tr>
                              <th  width="50" align="center" >Debe</th>
                              <th width="50" align="center" class="text-center">Haber</th>
                            </tr>
                       </thead>
                        <tbody >  
                          <tr>
                            <td>
                              <input type="number" v-model="balance.suma_debe" name="fecha" class="form-control">
                            </td>
                             <td>
                              <input type="number" v-model="balance.suma_haber" name="fecha" class="form-control">
                            </td>     
                        </tr>
                      </tbody>
                    </table>
                      <h2 class="text-center font-weight-bold text-info">SALDOS</h2>
                    <table class="table table-bordered table-sm mb-2">

                             <thead class="bg-success">
                            <tr>
                              <th  width="50" align="center" >Debe</th>
                              <th width="50" align="center" class="text-center">Haber</th>
                            </tr>
                       </thead>
                        <tbody >  
                          <tr>
                            <td>
                              <input type="number" v-model="balance.saldo_debe" name="fecha" class="form-control">
                            </td>
                             <td>
                              <input type="number" v-model="balance.saldo_haber" name="fecha" class="form-control">
                            </td>     
                        </tr>
                      </tbody>
                    </table>
                    <div v-if="!balance.edit" class="row justify-content-center">
                          <a href="#" class="btn btn-success" @click.prevent="agregarRegistro()">Agregar</a>

                      </div>
                       <div v-else class="row justify-content-center">
                            <a href="#" class="btn btn-success" @click.prevent="actualizarBalance()">Actualizar</a>
                            <a href="#" class="btn btn-danger ml-1" @click.prevent="cancelarEdicion()"><i class="fa fa-window-close"></i></a>
                      </div>              
                  </div>
                  <div class="col-6" style=" height:400px; overflow-y: scroll;">
                               <h1 class="text-center text-danger font-weight-bold mt-2">MAYOR GENERAL</h1>
     <div class="row justify-content-center">
         <div class="col-3 mb-2">
          <h3 class="text-center">@{{ nombre_mayor }}</h3>
         </div>
     </div>
     <div class="row justify-content-center">
      <div v-for="(cuenta, index) in mayorgeneral" class="col-11">
        <h3 class="text-center font-weight-bold text-danger">@{{ cuenta.cuenta }} </h3>
          <table class="table table-bordered table-sm">
                 <thead class="thead-dark">
                     <tr align="center">
                        <th scope="col" width="200">FECHA</th>
                        <th scope="col" width="450">DETALLE</th>
                        <th scope="col" width="125">DEBE</th>
                        <th scope="col">HABER</th>
                        <th scope="col">SALDO</th>
                         {{-- <th width="75" colspan="2" v-if="registros.length > 0">ACCION</th> --}}
                     </tr>
                 </thead>

                   <tbody>
                     <tr v-for="(diar, index) in cuenta.registros">
                        <td align="center" width="50">@{{ formatoFecha(diar.fecha)}}</td>
                        <td align="rigth">@{{ diar.detalle}}</td>
                        <td class="text-right" width="125">@{{ decimales(diar.debe) }}</td>
                        <td class="text-right" width="125">@{{ decimales(diar.haber) }}</td>
                        <td class="text-right" width="125">@{{ decimales(diar.saldo) }}</td>
                     </tr>
                       <tr>
                        <td></td>
                        <td class="font-weight-bold text-gray-dark">SUMAN</td>
                        <td class="text-right font-weight-bold text-gray-dark">@{{ decimales(cuenta.total_debe )}}</td>
                        <td class="text-right font-weight-bold text-gray-dark">@{{ decimales(cuenta.total_haber) }}</td>
                        <td class="text-right font-weight-bold text-gray-dark">{{-- @{{ decimales(cuenta.total_saldo) }} --}}</td>
                     </tr>
                     <tr v-for="(diar, index) in cuenta.cierres">
                        <td align="center" width="50">@{{ formatoFecha(diar.fecha)}}</td>
                        <td align="rigth">@{{ diar.detalle}}</td>
                        <td class="text-right" width="125">@{{ decimales(diar.debe) }}</td>
                        <td class="text-right" width="125">@{{ decimales(diar.haber) }}</td>
                        <td class="text-right" width="125">@{{ decimales(diar.saldo) }}</td>
                     </tr>
                 </tbody>
             </table>
      </div>
     </div>
                  </div>
                  <div class="col-12 mt-2" v-if="balances.length > 0">
                    <h2 class="text-center">REGISTROS</h2>
              <div class="row justify-content-around mb-2">
                <table class="table table-bordered table-sm mb-2">
        <thead>
            <tr class="bg-dark">
                <th rowspan="2" align="center" class="text-center">CUENTAS</th>
                <th colspan="2" align="center" class="text-center" width="100">SUMAS</th>
                <th colspan="2" align="center" class="text-center" width="100">SALDOS</th>
                <td  class="text-center" valign="center" v-if="balances.length >=1" colspan="2" rowspan="2">ACCIONES</td>

            </tr>
            <tr class="bg-dark">
                <td align="center">Debe</td>
                <td align="center">Haber</td>
                <td align="center">Debe</td>
                <td align="center">Haber</td>
            </tr>
        </thead>
        <tbody is="draggable" group="people" :list="balances" tag="tbody" @change="mover">
            <tr v-for="(balan, index) in balances" >
                <td align="center">@{{ balan.cuenta}}</td>
                <td class="text-right"  width="125">@{{ decimales(balan.suma_debe)}}</td>
                <td class="text-right" width="125">@{{ decimales(balan.suma_haber) }}</td>
                <td class="text-right" width="125">@{{ decimales(balan.saldo_debe) }}</td>
                <td class="text-right" width="125">@{{ decimales(balan.saldo_haber) }}</td>
                <td align="center"  width="50"><a @click.prevent="editBalance(index)" class="btn btn-warning"><i
                            class="fas fa-edit"></i></a></td>
                <td align="center" width="50"><a @click.prevent="deleteBalance(index)"  class="btn btn-danger"><i
                            class="fas fa-trash-alt"></i></a></td>
                

            </tr>
            <tr class="text-center bg-secondary">
                <td align="center" valign="middle">SUMAN</td>
                <td class="text-right">@{{ suman.sum_debe }}</td>
                <td class="text-right">@{{ suman.sum_haber }}</td>
                <td class="text-right">@{{ suman.sal_debe }}</td>
                <td class="text-right">@{{ suman.sal_haber }}</td>
            </tr>
        </tbody>
    </table>
              {{-- <a v-if="update" href="#" class="addDiario btn btn-success" @click.prevent="updaterRegister()">Actualizar Transaccion</a>  --}}
              {{-- <a v-if="!update" href="#" class="addDiario btn btn-success" @click.prevent="guardarRegistro()">Agregar Transaccion</a>  --}}
                  </div>
                  </div>
                </div>
            </div>
           <div class="modal-footer">
          </div>
        </div>
    </div>
</div>



<!-- Modal -->
{{-- <div class="modal fade" id="eliminar-mg" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="eliminar-mgLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminar-mgLabel">Eliminar Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseas eliminar el registro de @{{ eliminar.nombre }}?   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" @click="eliminarRegistro()">Eliminar</button>
      </div>
    </div>
  </div>
</div>
 --}}