{{-- TRANSACCION --}}
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="bg-transaccion" tabindex="-1"  role="dialog" aria-labelledby="bg-transaccionLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl " role="document">
        <div class="modal-content bg-light">
            <div class="modal-header">
              <div v-if="update">
                <h5 class="modal-title" id="er-ingresoLabel">ACTUALIZAR CUENTAS</h5>
              </div>
              <div v-else="!update">
                <h5 class="modal-title" id="ba-transaccionLabel">AGREGAR CUENTAS</h5>
              </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">

                  <div class="col-12 mt-2 border border-top-0 border-left-0 border-right-0 border-danger" style=" height:400px; overflow-y: scroll;">
                     <h1 class="text-center font-weight-bold mt-2">Datos para elaborar estado de resultados</h1>
                     <h2 class="text-center font-weight-bold mt-2">HOJA DE TRABAJO</h2>
                    <h3 class="font-weight-bold text-danger text-center">@{{ nombre_hoja }}</h3>
                    <table class="table table-bordered table-sm">
                    <thead class="bg-dark">
                      <tr>
                        <th class="text-center " style="vertical-align: middle;"  rowspan="2">CUENTAS</th>
                        <th class="text-center" style="vertical-align: middle;" colspan="2">BALANCE DE COMPROBACION</th>
                        <th class="text-center" style="vertical-align: middle;" colspan="2">AJUSTES</th>
                        <th class="text-center" style="vertical-align: middle;" colspan="2">BALANCE AJUSTADO</th>
                        <th class="text-center" style="vertical-align: middle;" colspan="2">ESTADO DE RESULTADO</th>
                        <th class="text-center" style="vertical-align: middle;" colspan="2">BALANCE GENERAL</th>
                      </tr>
                      <tr>
                        <td class="text-center" width="125">DEBE</td>
                        <td class="text-center" width="125">HABER</td>
                        <td class="text-center" width="125">DEBE</td>
                        <td class="text-center" width="125">HABER</td>
                        <td class="text-center" width="125">DEBE</td>
                        <td class="text-center" width="125">HABER</td>
                        <td class="text-center" width="125">DEBE</td>
                        <td class="text-center" width="125">HABER</td>
                        <td class="text-center" width="125">DEBE</td>
                        <td class="text-center" width="125">HABER</td>
                      </tr>
                    </thead>
                    <tbody>
                         <tr v-for="(balan, index) in hojatrabajo" >
                                    <td align="center" width="200">@{{ balan.cuenta}}</td>
                                    <td class="text-right" align="center" width="125">@{{ decimales(balan.bc_debe)}}</td>
                                    <td class="text-right" align="center" width="125">@{{ decimales(balan.bc_haber) }}</td>
                                    <td class="text-right" align="center" width="125">@{{ decimales(balan.ajuste_debe) }}</td>
                                    <td  class="text-right"align="center" width="125">@{{ decimales(balan.ajuste_haber) }}</td>
                                    <td class="text-right" align="center" width="125">@{{ decimales(balan.ba_debe) }}</td>
                                    <td  class="text-right"align="center" width="125">@{{ decimales(balan.ba_haber) }}</td>
                                    <td class="text-right" align="center" width="125">@{{ decimales(balan.er_debe) }}</td>
                                    <td  class="text-right"align="center" width="125">@{{ decimales(balan.er_haber) }}</td>
                                    <td class="text-right" align="center" width="125">@{{ decimales(balan.bg_debe) }}</td>
                                    <td  class="text-right"align="center" width="125">@{{ decimales(balan.bg_haber) }}</td>     
                            </tr>

                    </tbody>
                    </table>
                  </div>

    <div class="col-12">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link active" id="nav-bg-activo-corrente-tab" data-toggle="tab" href="#nav-bg-activo-corrente" role="tab" aria-controls="nav-bg-activo-corrente" aria-selected="true">Activo Corriente</a>

            <a class="nav-link" id="nav-bg-activo-no-corriente-tab" data-toggle="tab" href="#nav-bg-activo-no-corriente" role="tab" aria-controls="nav-bg-activo-no-corriente" aria-selected="false">Activo No Corriente</a>

            <a class="nav-link" id="nav-bg-pasivo-corriente-tab" data-toggle="tab" href="#nav-bg-pasivo-corriente" role="tab" aria-controls="nav-bg-pasivo-corriente" aria-selected="false">Pasivo Corriente</a>

            <a class="nav-link" id="nav-bg-pasivo-no-corriente-tab" data-toggle="tab" href="#nav-bg-pasivo-no-corriente" role="tab" aria-controls="nav-bg-pasivo-no-corriente" aria-selected="false">Pasivo No Corriente</a>

            <a class="nav-link" id="nav-bg-patrimonio-tab" data-toggle="tab" href="#nav-bg-patrimonio" role="tab" aria-controls="nav-bg-patrimonio" aria-selected="false">Patrimonio</a>

          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-bg-activo-corrente" role="tabpanel" aria-labelledby="nav-bg-activo-corrente-tab">
             <div class="row">
                    <div class="col-6 border border-bottom-0 border-left-0 border-top-0 border-danger">
                        <h2 class="text-center">AGREGAR ACTIVO CORRIENTE</h2>
                        <table class="table">
                          <thead class="text-center">
                            <tr>
                              <th>Cuenta</th>
                              <th>Saldo</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                          <model-select :options="options" v-model="activo.a_corriente.cuenta_id" placeholder="ELEGIR CUENTA"></model-select>
                                
                              </td>
                              <td  width="200">
                              <input type="number" v-model="activo.a_corriente.saldo" class="form-control">
                                
                              </td>
                            </tr>
                          </tbody>
                        </table>
                   {{--         <div class="form-group row">
                            <label  class="col-sm-4 col-form-label">Selecciona la Cuenta</label>
                            <div class="col-sm-6">
                          <model-select :options="options" v-model="ingreso.cuenta_id" placeholder="ELEGIR CUENTA"></model-select>
                            </div>
                            <div class="col-2">
                              <input type="number" class="form-control">
                            </div>
                          </div> --}}
                    <div v-if="!activo.a_corriente.edit" class="row justify-content-center">
                          <a href="#" class="btn btn-success" @click.prevent="agregarIngreso()">Agregar</a>
                      </div>
                       <div v-else class="row justify-content-center">
                            <a href="#" class="btn btn-success" @click.prevent="actualizarIngreso()">Actualizar</a>
                            <a href="#" class="btn btn-danger ml-1" @click.prevent="cancelarEdicionIngreso()"><i class="fa fa-window-close"></i></a>
                      </div>              
                  </div>
               
                  <div class="col-6 mt-2 p-2"  style=" height:400px; overflow-y: scroll;">
                    <h2 class="text-center">Activos Corrientes</h2>
              <div class="row justify-content-around mb-2">
                <table class="table table-bordered table-sm mb-2 p-2">
                    <thead>
                      <tr class="text-center bg-dark">
                        <th>CUENTA</th>
                        <th width="200">SALDO</th>
                        <th class="text-center" colspan="2">ACCIONES</th>

                      </tr>
                    </thead>
                    <tbody is="draggable" group="people" :list="a_corrientes" tag="tbody">

                        <tr v-for="(balan, index) in a_corrientes">
                          <td align="center">@{{ balan.cuenta}}</td>
                          <td align="center">@{{ decimales(balan.saldo)}}</td>
                          <td align="center"  width="50">
                            <a @click.prevent="editIngreso(index)" class="btn btn-warning">
                              <i class="fas fa-edit"></i>
                            </a>
                          </td>
                            <td align="center" width="50">
                            <a @click.prevent="warningEliminarIngreso(index)" class="btn btn-danger">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </td>
                        </tr>
                      <tr class="bg-secondary">
                        <td class="text-left font-weight-bold">Total Ingresos</td>
                        {{-- <td class="text-center">@{{ totales.ingreso }}</td> --}}
                        <td></td>
                      </tr>
                    </tbody>
                    </table>
                  </div>
                  </div>
             </div>       
          </div>
          <div class="tab-pane fade" id="nav-bg-activo-no-corriente" role="tabpanel" aria-labelledby="nav-bg-activo-no-corriente-tab">
                  <div class="row">
                    <div class="col-6 border border-bottom-0 border-left-0 border-top-0 border-danger">
                        <h2 class="text-center">AGREGAR ACTIVO NO CORRIENTE</h2>
                        <table class="table">
                          <thead class="text-center">
                            <tr>
                              <th>Cuenta</th>
                              <th>Saldo</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                          <model-select :options="options" v-model="activo.a_nocorriente.cuenta_id" placeholder="ELEGIR CUENTA"></model-select>
                                
                              </td>
                              <td  width="200">
                              <input type="number" v-model="activo.a_nocorriente.saldo" class="form-control">
                                
                              </td>
                            </tr>
                          </tbody>
                        </table>
                    <div v-if="!activo.a_nocorriente.edit" class="row justify-content-center">
                          <a href="#" class="btn btn-success" @click.prevent="agregarGasto()">Agregar</a>
                      </div>
                       <div v-else class="row justify-content-center">
                            <a href="#" class="btn btn-success" @click.prevent="actualizarGasto()">Actualizar</a>
                            <a href="#" class="btn btn-danger ml-1" @click.prevent="cancelarEdicionGasto()"><i class="fa fa-window-close"></i></a>
                      </div>              
                  </div>
               
                  <div class="col-6 mt-2 p-2"  style=" height:400px; overflow-y: scroll;">
                    <h2 class="text-center">Activos no Corrientes</h2>
              <div class="row justify-content-around mb-2">
                <table class="table table-bordered table-sm mb-2 p-2">
                    <thead>
                      <tr class="text-center bg-dark">
                        <th>CUENTA</th>
                        <th width="200">SALDO</th>
                        <th class="text-center" colspan="2">ACCIONES</th>

                      </tr>
                    </thead>
                    <tbody is="draggable" group="people" :list="a_nocorrientes" tag="tbody">

                        <tr v-for="(balan, index) in a_nocorrientes">
                          <td align="center">@{{ balan.cuenta}}</td>
                          <td align="center">@{{ decimales(balan.saldo)}}</td>
                          <td align="center"  width="50">
                            <a @click.prevent="editGasto(index)" class="btn btn-warning">
                              <i class="fas fa-edit"></i>
                            </a>
                          </td>
                            <td align="center" width="50">
                            <a @click.prevent="warningEliminarGastos(index)" class="btn btn-danger">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </td>
                        </tr>
                      <tr class="bg-secondary">
                        <td class="text-left font-weight-bold">Total Gastos</td>
                        {{-- <td class="text-center">@{{ totales.gasto }}</td> --}}
                        <td></td>
                      </tr>
                    </tbody>
                    </table>
                  </div>
                  </div>
             </div>   
          </div>
        <div class="tab-pane fade" id="nav-bg-pasivo-corriente" role="tabpanel" aria-labelledby="nav-bg-pasivo-corriente-tab">
                  <div class="row">
                    <div class="col-6 border border-bottom-0 border-left-0 border-top-0 border-danger">
                        <h2 class="text-center">AGREGAR PASIVO CORRIENTE</h2>
                        <table class="table">
                          <thead class="text-center">
                            <tr>
                              <th>Cuenta</th>
                              <th>Saldo</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                          <model-select :options="options" v-model="pasivo.p_corriente.cuenta_id" placeholder="ELEGIR CUENTA"></model-select>
                                
                              </td>
                              <td  width="200">
                              <input type="number" v-model="pasivo.p_corriente.saldo" class="form-control">
                                
                              </td>
                            </tr>
                          </tbody>
                        </table>
                    <div v-if="!activo.a_nocorriente.edit" class="row justify-content-center">
                          <a href="#" class="btn btn-success" @click.prevent="agregarGasto()">Agregar</a>
                      </div>
                       <div v-else class="row justify-content-center">
                            <a href="#" class="btn btn-success" @click.prevent="actualizarGasto()">Actualizar</a>
                            <a href="#" class="btn btn-danger ml-1" @click.prevent="cancelarEdicionGasto()"><i class="fa fa-window-close"></i></a>
                      </div>              
                  </div>
               
                  <div class="col-6 mt-2 p-2"  style=" height:400px; overflow-y: scroll;">
                    <h2 class="text-center">Pasivos Corrientes</h2>
              <div class="row justify-content-around mb-2">
                <table class="table table-bordered table-sm mb-2 p-2">
                    <thead>
                      <tr class="text-center bg-dark">
                        <th>CUENTA</th>
                        <th width="200">SALDO</th>
                        <th class="text-center" colspan="2">ACCIONES</th>

                      </tr>
                    </thead>
                    <tbody is="draggable" group="people" :list="p_corrientes" tag="tbody">

                        <tr v-for="(balan, index) in p_corrientes">
                          <td align="center">@{{ balan.cuenta}}</td>
                          <td align="center">@{{ decimales(balan.saldo)}}</td>
                          <td align="center"  width="50">
                            <a @click.prevent="editGasto(index)" class="btn btn-warning">
                              <i class="fas fa-edit"></i>
                            </a>
                          </td>
                            <td align="center" width="50">
                            <a @click.prevent="warningEliminarGastos(index)" class="btn btn-danger">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </td>
                        </tr>
                      <tr class="bg-secondary">
                        <td class="text-left font-weight-bold">Total Gastos</td>
                        {{-- <td class="text-center">@{{ totales.gasto }}</td> --}}
                        <td></td>
                      </tr>
                    </tbody>
                    </table>
                  </div>
                  </div>
             </div> 

        </div>
                <div class="tab-pane fade" id="nav-bg-pasivo-no-corriente" role="tabpanel" aria-labelledby="nav-bg-pasivo-no-corriente-tab">
                  <div class="row">
                    <div class="col-6 border border-bottom-0 border-left-0 border-top-0 border-danger">
                        <h2 class="text-center">AGREGAR PASIVO NO CORRIENTE</h2>
                        <table class="table">
                          <thead class="text-center">
                            <tr>
                              <th>Cuenta</th>
                              <th>Saldo</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                          <model-select :options="options" v-model="pasivo.p_corriente.cuenta_id" placeholder="ELEGIR CUENTA"></model-select>
                                
                              </td>
                              <td  width="200">
                              <input type="number" v-model="pasivo.p_corriente.saldo" class="form-control">
                                
                              </td>
                            </tr>
                          </tbody>
                        </table>
                    <div v-if="!activo.a_nocorriente.edit" class="row justify-content-center">
                          <a href="#" class="btn btn-success" @click.prevent="agregarGasto()">Agregar</a>
                      </div>
                       <div v-else class="row justify-content-center">
                            <a href="#" class="btn btn-success" @click.prevent="actualizarGasto()">Actualizar</a>
                            <a href="#" class="btn btn-danger ml-1" @click.prevent="cancelarEdicionGasto()"><i class="fa fa-window-close"></i></a>
                      </div>              
                  </div>
               
                  <div class="col-6 mt-2 p-2"  style=" height:400px; overflow-y: scroll;">
                    <h2 class="text-center">Pasivos no Corriente</h2>
              <div class="row justify-content-around mb-2">
                <table class="table table-bordered table-sm mb-2 p-2">
                    <thead>
                      <tr class="text-center bg-dark">
                        <th>CUENTA</th>
                        <th width="200">SALDO</th>
                        <th class="text-center" colspan="2">ACCIONES</th>

                      </tr>
                    </thead>
                    <tbody is="draggable" group="people" :list="p_nocorrientes" tag="tbody">

                        <tr v-for="(balan, index) in p_nocorrientes">
                          <td align="center">@{{ balan.cuenta}}</td>
                          <td align="center">@{{ decimales(balan.saldo)}}</td>
                          <td align="center"  width="50">
                            <a @click.prevent="editGasto(index)" class="btn btn-warning">
                              <i class="fas fa-edit"></i>
                            </a>
                          </td>
                            <td align="center" width="50">
                            <a @click.prevent="warningEliminarGastos(index)" class="btn btn-danger">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </td>
                        </tr>
                      <tr class="bg-secondary">
                        <td class="text-left font-weight-bold">Total Gastos</td>
                        {{-- <td class="text-center">@{{ totales.gasto }}</td> --}}
                        <td></td>
                      </tr>
                    </tbody>
                    </table>
                  </div>
                  </div>
             </div> 

        </div>
                <div class="tab-pane fade" id="nav-bg-patrimonio" role="tabpanel" aria-labelledby="nav-bg-patrimonio-tab">
                  <div class="row">
                    <div class="col-6 border border-bottom-0 border-left-0 border-top-0 border-danger">
                        <h2 class="text-center">AGREGAR PATRIMONIO</h2>
                        <table class="table">
                          <thead class="text-center">
                            <tr>
                              <th>Cuenta</th>
                              <th>Saldo</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                          <model-select :options="options" v-model="pasivo.p_corriente.cuenta_id" placeholder="ELEGIR CUENTA"></model-select>
                                
                              </td>
                              <td  width="200">
                              <input type="number" v-model="pasivo.p_corriente.saldo" class="form-control">
                                
                              </td>
                            </tr>
                          </tbody>
                        </table>
                    <div v-if="!activo.a_nocorriente.edit" class="row justify-content-center">
                          <a href="#" class="btn btn-success" @click.prevent="agregarGasto()">Agregar</a>
                      </div>
                       <div v-else class="row justify-content-center">
                            <a href="#" class="btn btn-success" @click.prevent="actualizarGasto()">Actualizar</a>
                            <a href="#" class="btn btn-danger ml-1" @click.prevent="cancelarEdicionGasto()"><i class="fa fa-window-close"></i></a>
                      </div>              
                  </div>
               
                  <div class="col-6 mt-2 p-2"  style=" height:400px; overflow-y: scroll;">
                    <h2 class="text-center">Patrimonios</h2>
              <div class="row justify-content-around mb-2">
                <table class="table table-bordered table-sm mb-2 p-2">
                    <thead>
                      <tr class="text-center bg-dark">
                        <th>CUENTA</th>
                        <th width="200">SALDO</th>
                        <th class="text-center" colspan="2">ACCIONES</th>

                      </tr>
                    </thead>
                    <tbody is="draggable" group="people" :list="patrimonios" tag="tbody">

                        <tr v-for="(balan, index) in patrimonios">
                          <td align="center">@{{ balan.cuenta}}</td>
                          <td align="center">@{{ decimales(balan.saldo)}}</td>
                          <td align="center"  width="50">
                            <a @click.prevent="editGasto(index)" class="btn btn-warning">
                              <i class="fas fa-edit"></i>
                            </a>
                          </td>
                            <td align="center" width="50">
                            <a @click.prevent="warningEliminarGastos(index)" class="btn btn-danger">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </td>
                        </tr>
                      <tr class="bg-secondary">
                        <td class="text-left font-weight-bold">Total Gastos</td>
                        {{-- <td class="text-center">@{{ totales.gasto }}</td> --}}
                        <td></td>
                      </tr>
                    </tbody>
                    </table>
                  </div>
                  </div>
             </div> 

        </div>
        </div>
    </div>  

              
                </div>
            </div>
           <div class="modal-footer">
          </div>
        </div>
    </div>
</div>


