{{-- INGRESOS --}}
<div class="modal fade" id="ingreso" tabindex="-1"  role="dialog" aria-labelledby="ingresoLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h5 class="modal-title" id="ingresoLabel">AGREGAR INGRESO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div v-if="movimientos.length > 0">
                  <h2 class="text-center">Ultimas Existencias</h2>
                <table  class="table table-bordered">
                    <thead class="bg-warning"> 
                      <tr class="text-center">
                        <th style="vertical-align:middle" rowspan="2">FECHA</th>
                        <th style="vertical-align:middle" rowspan="2">MOVIMIENTOS</th>
                        <th colspan="3">INGRESOS</th>
                        <th colspan="3">EGRESOS</th>
                        <th colspan="3">EXISTENCIA</th>
                      </tr>
                      <tr class="text-center">
                        <td>CANT.</td>
                        <td>PREC. UNIT</td>
                        <td>TOTAL</td>
                        <td>CANT.</td>
                        <td>PREC. UNIT</td>
                        <td>TOTAL</td>
                        <td>CANT</td>
                        <td>PREC. UNIT</td>
                        <td>TOTAL</td>
                      </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(transa, id) in movimientos">
                          <td>@{{ transa.fecha }}</td>
                          <td>@{{ transa.movimiento }}</td>
                          <td>@{{ transa.ingreso_cantidad }}</td>
                          <td>@{{ transa.ingreso_precio }} </td>
                          <td>@{{ transa.ingreso_total }}</td>
                          {{-- <td><input type="text" v-if="transa.ingreso_total" class="form-control-sm form-control-plaintext" v-model=" transa.ingreso_total"></td> --}}
                          <td>@{{ transa.egreso_cantidad }}</td>
                          <td>@{{ transa.egreso_precio }}</td>
                          {{-- <td><input type="text" v-if="transa.egreso_total" class="form-control-sm form-control-plaintext" v-model=" transa.egreso_total"></td> --}}
                          <td>@{{ transa.egreso_total }}</td>
                          <td>@{{ transa.existencia_cantidad }}</td>
                          <td>@{{ transa.existencia_precio }}</td>
                          {{-- <td><input type="text" v-if="transa.existencia_total" class="form-control-sm form-control-plaintext" v-model=" transa.existencia_total"></td> --}}
                          <td >@{{ transa.existencia_total }}</td>
                          
                        </tr>
                      </tbody>
                  </table>

                </div>
                        <h2>Bajar Existencias</h2>
                <div class="row justify-content-center">
                    <div class="col-12">
                      <table class="table table-bordered table-sm">
                          <thead class="thead-dark">
                        <tr>
                          <th width="75"  align="center" class="text-center">Cantidad</th>    
                          <th width="125" align="center" class="text-center">Precio Unit</th>    
                        </tr>
                       </thead>
                        <tbody >  
                          <tr>
                              <td>
                                <input type="numeric" v-model="exis.cantidad"   name="cantidad" class="form-control" required>
                              </td>  
                              <td>
                                <input type="numeric"  v-model="exis.precio"  name="precio" class="form-control" required>
                              </td>          
                            </tr>
                      </tbody>
                    </table>
                       <div  class="row justify-content-center">
                          <a href="#" class="btn btn-light" @click.prevent="bajarExis()">Agregar Existencia</a>
                      </div>
                  </div>
                </div>
              <h2>Agregar el Ingreso</h2>
                <div class="row justify-content-center">
                    <div class="col-12">
                      <table class="table table-bordered table-sm">
                          <thead class="thead-dark">
                        <tr>
                          <th width="125"  align="center" class="text-center">Fecha</th>
                          <th  align="center" class="text-center">Movimiento</th>    
                          <th width="75"  align="center" class="text-center">Cantidad</th>    
                          <th width="125" align="center" class="text-center">Precio Unit</th>    
                        </tr>
                       </thead>
                        <tbody >  
                          <tr>
                            <td>
                              <input type="date" v-model="transaccion.fecha"  name="fecha" class="form-control" required>
                            </td>
                              <td>
                                <input type="text"  v-model="transaccion.movimiento"  name="movimiento" class="form-control" required>
                              </td> 
                              <td>
                                <input type="numeric" v-model="transaccion.ingreso.cantidad"   name="cantidad" class="form-control" required>
                              </td>  
                              <td>
                                <input type="numeric"  v-model="transaccion.ingreso.precio"  name="precio" class="form-control" required>
                              </td>          
                            </tr>
                      </tbody>
                    </table>
                       <div  class="row justify-content-center">
                          <a href="#" class="btn btn-light" @click.prevent="agregarIngreso()">Agregar Ingreso</a>
                      </div>
                  </div>
                </div>
            </div>
           <div class="modal-footer">
          </div>
        </div>
    </div>
</div>

{{-- EGRESOS --}}
<div class="modal fade" id="egreso" tabindex="-1"  role="dialog" aria-labelledby="haberLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h5 class="modal-title" id="haberLabel">AGREGAR EGRESO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div v-if="movimientos.length > 0">
                  <h2 class="text-center">Ultimas Existencias</h2>
                <table  class="table table-bordered">
                    <thead class="bg-warning"> 
                      <tr class="text-center">
                        <th style="vertical-align:middle" rowspan="2">FECHA</th>
                        <th style="vertical-align:middle" rowspan="2">MOVIMIENTOS</th>
                        <th colspan="3">INGRESOS</th>
                        <th colspan="3">EGRESOS</th>
                        <th colspan="3">EXISTENCIA</th>
                      </tr>
                      <tr class="text-center">
                        <td>CANT.</td>
                        <td>PREC. UNIT</td>
                        <td>TOTAL</td>
                        <td>CANT.</td>
                        <td>PREC. UNIT</td>
                        <td>TOTAL</td>
                        <td>CANT</td>
                        <td>PREC. UNIT</td>
                        <td>TOTAL</td>
                      </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(transa, id) in movimientos">
                          <td>@{{ transa.fecha }}</td>
                          <td>@{{ transa.movimiento }}</td>
                          <td>@{{ transa.ingreso_cantidad }}</td>
                          <td>@{{ transa.ingreso_precio }} </td>
                          <td>@{{ transa.ingreso_total }}</td>
                          {{-- <td><input type="text" v-if="transa.ingreso_total" class="form-control-sm form-control-plaintext" v-model=" transa.ingreso_total"></td> --}}
                          <td>@{{ transa.egreso_cantidad }}</td>
                          <td>@{{ transa.egreso_precio }}</td>
                          {{-- <td><input type="text" v-if="transa.egreso_total" class="form-control-sm form-control-plaintext" v-model=" transa.egreso_total"></td> --}}
                          <td>@{{ transa.egreso_total }}</td>
                          <td>@{{ transa.existencia_cantidad }}</td>
                          <td>@{{ transa.existencia_precio }}</td>
                          {{-- <td><input type="text" v-if="transa.existencia_total" class="form-control-sm form-control-plaintext" v-model=" transa.existencia_total"></td> --}}
                          <td >@{{ transa.existencia_total }}</td>
                          
                        </tr>
                      </tbody>
                  </table>

                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                      <table class="table table-bordered table-sm">
                          <thead class="thead-dark">
                        <tr>
                          <th width="125"  align="center" class="text-center">Fecha</th>
                          <th  align="center" class="text-center">Movimiento</th>    
                          <th width="75"  align="center" class="text-center">Cantidad</th>    
                          <th width="125" align="center" class="text-center">Precio Unit</th>    
                          <th width="75" align="center" class="text-center">Existencia Cantidad</th>    
                          <th width="125" align="center" class="text-center">Existencia Precio Unit</th>    
                        </tr>
                       </thead>
                        <tbody >  
                          <tr>
                            <td>
                              <input type="date" v-model="transaccion.fecha"  name="fecha" class="form-control" required>
                            </td>
                              <td>
                                <input type="text"  v-model="transaccion.movimiento"  name="movimiento" class="form-control" required>
                              </td> 
                              <td>
                                <input type="numeric" v-model="transaccion.egreso.cantidad"   name="cantidad" class="form-control" required>
                              </td>  
                              <td>
                                <input type="numeric"  v-model="transaccion.egreso.precio"  name="precio" class="form-control" required>
                              </td>
                              <td>
                                <input type="numeric"  v-model="transaccion.existencia.cantidad"  name="precio" class="form-control" required>
                              </td>  
                              <td>
                                <input type="numeric"  v-model="transaccion.existencia.precio"  name="precio" class="form-control" required>
                              </td>            
                            </tr>
                      </tbody>
                    </table>
                       <div  class="row justify-content-center">
                          <a href="#" class="btn btn-light" @click.prevent="agregarEgreso()">Agregar Egreso</a>
                      </div>
                    <div v-if="egresos.length >= 1">
                       <h2>Agregar Existencias</h2>
                    <table  class="table table-bordered table-sm">
                          <thead class="thead-dark">
                        <tr>
                          <th width="75"  align="center" class="text-center">Cantidad</th>    
                          <th width="125" align="center" class="text-center">Precio Unit</th>    
                        </tr>
                       </thead>
                        <tbody >  
                          <tr>
                              <td>
                                <input type="numeric" v-model="exis.cantidad"   name="cantidad" class="form-control" required>
                              </td>  
                              <td>
                                <input type="numeric"  v-model="exis.precio"  name="precio" class="form-control" required>
                              </td>          
                            </tr>
                      </tbody>
                    </table>

                    <div  class="row justify-content-center">
                          <a href="#" class="btn btn-light" @click.prevent="existenciaEgreso()">Agregar Existencia</a>
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


{{-- Devolucion Compra --}}
<div class="modal fade" id="devolucion_compra" tabindex="-1"  role="dialog" aria-labelledby="haberLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
        <div class="modal-content bg-success">
            <div class="modal-header">
                <h5 class="modal-title" id="haberLabel">DEVOLUCION COMPRA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div v-if="movimientos.length > 0">
                  <h2 class="text-center">Ultimas Existencias</h2>
                <table  class="table table-bordered">
                    <thead class="bg-warning"> 
                      <tr class="text-center">
                        <th style="vertical-align:middle" rowspan="2">FECHA</th>
                        <th style="vertical-align:middle" rowspan="2">MOVIMIENTOS</th>
                        <th colspan="3">INGRESOS</th>
                        <th colspan="3">EGRESOS</th>
                        <th colspan="3">EXISTENCIA</th>
                      </tr>
                      <tr class="text-center">
                        <td>CANT.</td>
                        <td>PREC. UNIT</td>
                        <td>TOTAL</td>
                        <td>CANT.</td>
                        <td>PREC. UNIT</td>
                        <td>TOTAL</td>
                        <td>CANT</td>
                        <td>PREC. UNIT</td>
                        <td>TOTAL</td>
                      </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(transa, id) in movimientos">
                          <td>@{{ transa.fecha }}</td>
                          <td>@{{ transa.movimiento }}</td>
                          <td>@{{ transa.ingreso_cantidad }}</td>
                          <td>@{{ transa.ingreso_precio }} </td>
                          <td>@{{ transa.ingreso_total }}</td>
                          {{-- <td><input type="text" v-if="transa.ingreso_total" class="form-control-sm form-control-plaintext" v-model=" transa.ingreso_total"></td> --}}
                          <td>@{{ transa.egreso_cantidad }}</td>
                          <td>@{{ transa.egreso_precio }}</td>
                          {{-- <td><input type="text" v-if="transa.egreso_total" class="form-control-sm form-control-plaintext" v-model=" transa.egreso_total"></td> --}}
                          <td>@{{ transa.egreso_total }}</td>
                          <td>@{{ transa.existencia_cantidad }}</td>
                          <td>@{{ transa.existencia_precio }}</td>
                          {{-- <td><input type="text" v-if="transa.existencia_total" class="form-control-sm form-control-plaintext" v-model=" transa.existencia_total"></td> --}}
                          <td >@{{ transa.existencia_total }}</td>
                          
                        </tr>
                      </tbody>
                  </table>

                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                      <div >
                       <h2>Agregar Existencias</h2>
                        <table  class="table table-bordered table-sm">
                          <thead class="thead-dark">
                        <tr>
                          <th width="75"  align="center" class="text-center">Cantidad</th>    
                          <th width="125" align="center" class="text-center">Precio Unit</th>    
                        </tr>
                       </thead>
                        <tbody >  
                          <tr>
                              <td>
                                <input type="numeric" v-model="exis.cantidad"   name="cantidad" class="form-control" required>
                              </td>  
                              <td>
                                <input type="numeric"  v-model="exis.precio"  name="precio" class="form-control" required>
                              </td>          
                            </tr>
                      </tbody>
                    </table>
                    <div  class="row justify-content-center">
                          <a href="#" class="btn btn-light" @click.prevent="existenciaEgreso()">Agregar Existencia</a>
                      </div>
                    </div>
                      <table class="table table-bordered table-sm">
                          <thead class="thead-dark">
                        <tr>
                          <th width="125"  align="center" class="text-center">Fecha</th>
                          <th  align="center" class="text-center">Movimiento</th>    
                          <th width="75"  align="center" class="text-center">Cantidad</th>    
                          <th width="125" align="center" class="text-center">Precio Unit</th>    
                          <th width="75" align="center" class="text-center">Existencia Cantidad</th>    
                          <th width="125" align="center" class="text-center">Existencia Precio Unit</th>    
                        </tr>
                       </thead>
                        <tbody >  
                          <tr>
                            <td>
                              <input type="date" v-model="transaccion.fecha"  name="fecha" class="form-control" required>
                            </td>
                              <td>
                                <input type="text"  v-model="transaccion.movimiento"  name="movimiento" class="form-control" required>
                              </td> 
                              <td>
                                <input type="numeric" v-model="transaccion.egreso.cantidad"   name="cantidad" class="form-control" required>
                              </td>  
                              <td>
                                <input type="numeric"  v-model="transaccion.egreso.precio"  name="precio" class="form-control" required>
                              </td>
                              <td>
                                <input type="numeric"  v-model="transaccion.existencia.cantidad"  name="precio" class="form-control" required>
                              </td>  
                              <td>
                                <input type="numeric"  v-model="transaccion.existencia.precio"  name="precio" class="form-control" required>
                              </td>            
                            </tr>
                      </tbody>
                    </table>
                       <div  class="row justify-content-center">
                          <a href="#" class="btn btn-light" @click.prevent="agregarEgreso()">Agregar Egreso</a>
                      </div>
          
                  </div>
                </div>
            </div>
           <div class="modal-footer">
          </div>
        </div>
    </div>
</div>

{{-- DEVOLUCION VENTA --}}
<div class="modal fade" id="devolucion_venta" tabindex="-1"  role="dialog" aria-labelledby="haberLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
        <div class="modal-content bg-warning">
            <div class="modal-header">
                <h5 class="modal-title" id="haberLabel">DEVOLUCION VENTA </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div v-if="movimientos.length > 0">
                  <h2 class="text-center">Ultimas Existencias</h2>
                <table  class="table table-bordered">
                    <thead class="bg-info"> 
                      <tr class="text-center">
                        <th style="vertical-align:middle" rowspan="2">FECHA</th>
                        <th style="vertical-align:middle" rowspan="2">MOVIMIENTOS</th>
                        <th colspan="3">INGRESOS</th>
                        <th colspan="3">EGRESOS</th>
                        <th colspan="3">EXISTENCIA</th>
                      </tr>
                      <tr class="text-center">
                        <td>CANT.</td>
                        <td>PREC. UNIT</td>
                        <td>TOTAL</td>
                        <td>CANT.</td>
                        <td>PREC. UNIT</td>
                        <td>TOTAL</td>
                        <td>CANT</td>
                        <td>PREC. UNIT</td>
                        <td>TOTAL</td>
                      </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(transa, id) in movimientos">
                          <td>@{{ transa.fecha }}</td>
                          <td>@{{ transa.movimiento }}</td>
                          <td>@{{ transa.ingreso_cantidad }}</td>
                          <td>@{{ transa.ingreso_precio }} </td>
                          <td>@{{ transa.ingreso_total }}</td>
                          {{-- <td><input type="text" v-if="transa.ingreso_total" class="form-control-sm form-control-plaintext" v-model=" transa.ingreso_total"></td> --}}
                          <td>@{{ transa.egreso_cantidad }}</td>
                          <td>@{{ transa.egreso_precio }}</td>
                          {{-- <td><input type="text" v-if="transa.egreso_total" class="form-control-sm form-control-plaintext" v-model=" transa.egreso_total"></td> --}}
                          <td>@{{ transa.egreso_total }}</td>
                          <td>@{{ transa.existencia_cantidad }}</td>
                          <td>@{{ transa.existencia_precio }}</td>
                          {{-- <td><input type="text" v-if="transa.existencia_total" class="form-control-sm form-control-plaintext" v-model=" transa.existencia_total"></td> --}}
                          <td >@{{ transa.existencia_total }}</td>
                          
                        </tr>
                      </tbody>
                  </table>

                </div>
                  <h2>DEVOLUCION</h2>
                <div class="row justify-content-center">
                    <div class="col-12">
                      <table class="table table-bordered table-sm table-responsive">
                          <thead class="thead-dark">
                        <tr>
                          <th width="125"  align="center" class="text-center">Fecha</th>
                          <th  align="center" class="text-center">Movimiento</th>    
                          <th width="75"  align="center" class="text-center">Cantidad</th>    
                          <th width="125" align="center" class="text-center">Precio Unit</th>
                          <th width="75" align="center" class="text-center">Existencia Cantidad</th>    
                          <th width="125" align="center" class="text-center">Existencia Precio Unit</th>     
                        </tr>
                       </thead>
                        <tbody >  
                            <tr>
                            <td>
                              <input type="date" v-model="transaccion.fecha"  name="fecha" class="form-control" required>
                            </td>
                              <td>
                                <input type="text"  v-model="transaccion.movimiento"  name="movimiento" class="form-control" required>
                              </td> 
                              <td>
                                <input type="numeric" v-model="transaccion.ingreso.cantidad"   name="cantidad" class="form-control" required>
                              </td>  
                              <td>
                                <input type="numeric"  v-model="transaccion.ingreso.precio"  name="precio" class="form-control" required>
                              </td>
                              <td>
                                <input type="numeric"  v-model="transaccion.existencia.cantidad"  name="exis_cantidad" class="form-control" required>
                              </td>  
                              <td>
                                <input type="numeric"  v-model="transaccion.existencia.precio"  name="exis_precio" class="form-control" required>
                              </td>            
                            </tr>
                      </tbody>
                    </table>
                       <div  class="row justify-content-center">
                          <a href="#" class="btn btn-light" @click.prevent="agregarDevolucion()">Agregar Devolucion</a>
                      </div>
                  </div>
                </div>
                        
                <div v-if="ejercicio.length >= 1" class="row justify-content-center">
                  <h2>Bajar Existencias</h2>
                    <div class="col-12">
                      <table class="table table-bordered table-sm">
                          <thead class="thead-dark">
                        <tr>
                          <th width="75"  align="center" class="text-center">Cantidad</th>    
                          <th width="125" align="center" class="text-center">Precio Unit</th>    
                        </tr>
                       </thead>
                        <tbody >  
                          <tr>
                              <td>
                                <input type="numeric" v-model="exis.cantidad"   name="cantidad" class="form-control" required>
                              </td>  
                              <td>
                                <input type="numeric"  v-model="exis.precio"  name="precio" class="form-control" required>
                              </td>          
                            </tr>
                      </tbody>
                    </table>
                       <div  class="row justify-content-center">
                          <a href="#" class="btn btn-light" @click.prevent="existenciaVenta()">Agregar Existencia</a>
                      </div>
                  </div>
                </div>
          
            </div>
           <div class="modal-footer">
          </div>
        </div>
    </div>
</div>
