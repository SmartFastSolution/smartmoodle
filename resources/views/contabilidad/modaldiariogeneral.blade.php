{{-- PASIVOS --}}
<div class="modal fade" id="haber" tabindex="-1"  role="dialog" aria-labelledby="haberLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h5 class="modal-title" id="haberLabel">AGREGAR PASIVOS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                      <table class="table table-bordered table-sm">
                          <thead class="thead-dark">
                          <tr>
                          <th  align="center" class="text-center">Cuentas</th>
                          <th  align="center" class="text-center">Saldo</th>    
                        </tr>
                       </thead>
                        <tbody >  
                          <tr>

                              <td>
                              <select name="n_cuenta" v-model="diario.haber.nom_cuenta" class="custom-select">
                                <option value="" disabled>ELIGE UNA CUENTA</option>
                                <option value="Banco">Bancos</option>
                                <option value="Muebles">Muebles</option>
                                <option value="Caja">Caja</option>
                                <option value="Vehiculo">Vehiculo</option>
                                <option value="Inv. Mercaderías">Inv. Mercaderías</option>
                                <option value="Doc. por Cob">Doc. por Cob</option>
                                <option value="Doc. por Pagar">Doc. por Pagar</option>
                                <option value="Muebles Oficina">Muebles Oficina</option>
                                <option value="Equipo Oficina">Equipo Oficina</option>
                                <option value="Eq. de Comp">Eq. de Comp</option>
                                <option value="Hip. por Pagar">Hip. por Pagar</option>
                                <option value="Capital">Capital</option>
                              </select>
                              </td>
                              <td width="125"><input type="numeric" v-model="diario.haber.saldo" name="haber" class="form-control" required></td>         
                        </tr>
                      </tbody>
                    </table>
                    <div v-if="edit.debe.length >= 1" class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="agregarEdit()">Agregar Pasivo</a>
                      </div>

                       <div v-else class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="agregarHaber()">Agregar Pasivo</a>
                      </div>
                  </div>
                </div>
            </div>
           <div class="modal-footer">
          </div>
        </div>
    </div>
</div>

{{-- Pasivos --}}
<div class="modal fade" id="debe" tabindex="-1"  role="dialog" aria-labelledby="debeLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h5 class="modal-title" id="debeLabel">AGREGAR ACTIVOS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                      <table class="table table-bordered table-sm">
                          <thead class="thead-dark">
                            <tr>
                              <th v-if="diarios.debe.length == 0 && edit.debe.length == 0" width="50" >Fecha</th>
                              <th  align="center" class="text-center">Cuentas</th>
                              <th  align="center" class="text-center">Saldo</th>    
                            </tr>
                       </thead>
                        <tbody >  
                          <tr>
                              <td v-if="diarios.debe.length == 0 && edit.debe.length == 0" width="50" > <input type="date" name="fecha" v-model="diario.debe.fecha" class="form-control" required></td>
                              <td>
                              <select name="n_cuenta" v-model="diario.debe.nom_cuenta" class="custom-select">
                                <option value="" disabled>ELIGE UNA CUENTA</option>
                                <option value="Banco">Bancos</option>
                                <option value="Muebles">Muebles</option>
                                <option value="Caja">Caja</option>
                                <option value="Vehiculo">Vehiculo</option>
                                <option value="Inv. Mercaderías">Inv. Mercaderías</option>
                                <option value="Doc. por Cob">Doc. por Cob</option>
                                <option value="Doc. por Pagar">Doc. por Pagar</option>
                                <option value="Muebles Oficina">Muebles Oficina</option>
                                <option value="Equipo Oficina">Equipo Oficina</option>
                                <option value="Eq. de Comp">Eq. de Comp</option>
                                <option value="Hip. por Pagar">Hip. por Pagar</option>
                                <option value="Capital">Capital</option>
                              </select>
                              </td>
                              <td width="125"><input type="numeric" v-model="diario.debe.saldo" name="debe" class="form-control"></td>         
                        </tr>
                      </tbody>
                    </table>
                    <div v-if="edit.debe.length >= 1" class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="agregarEditPasivo()">Agregar Activos</a>
                      </div>
                       <div v-else class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="agregarDebe()">Agregar Activos</a>
                      </div>
                  </div>
                </div>
            </div>
           <div class="modal-footer">
          </div>
        </div>
    </div>
</div>

{{-- AGREGAR COMENTARIO --}}
<div class="modal fade" id="comentario" tabindex="-1"  role="dialog" aria-labelledby="haberLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h5 class="modal-title" id="haberLabel">COMENTARIO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                      <table class="table table-bordered table-sm">
                        <thead class="thead-dark">
                        <tr>
                          <th  align="center" class="text-center">Comentario</th>    
                        </tr>
                       </thead>
                        <tbody >  
                          <tr>
                            <td width="125"><input type="text" v-model="diario.comentario" name="comentario" class="form-control" required></td>         
                          </tr>
                      </tbody>
                    </table>
                    <div v-if="edit.debe.length >= 1" class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="comentarioUpdate()">Editar Comentario</a>
                      </div>
                       <div v-else class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="agregarComentario()">Agregar Comentario</a>
                      </div>
                  </div>
                </div>
            </div>
           <div class="modal-footer">
          </div>
        </div>
    </div>
</div>




{{-- ACTUALIZAR UN REGISTRO --}}
<div class="modal fade" id="haber_a" tabindex="-1"  role="dialog" aria-labelledby="haberLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h5 class="modal-title" id="haberLabel">ACTUALIZAR PASIVO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                      <table class="table table-bordered table-sm">
                          <thead class="thead-dark">
                          <tr>
                          <th  align="center" class="text-center">Cuentas</th>
                          <th  align="center" class="text-center">Saldo</th>    
                        </tr>
                       </thead>
                        <tbody >  
                          <tr>
                              <td>
                              <select name="n_cuenta" v-model="diario.haber.nom_cuenta" class="custom-select">
                                <option value="" disabled>ELIGE UNA CUENTA</option>
                                <option value="Banco">Bancos</option>
                                <option value="Muebles">Muebles</option>
                                <option value="Caja">Caja</option>
                                <option value="Vehiculo">Vehiculo</option>
                                <option value="Inv. Mercaderías">Inv. Mercaderías</option>
                                <option value="Doc. por Cob">Doc. por Cob</option>
                                <option value="Doc. por Pagar">Doc. por Pagar</option>
                                <option value="Muebles Oficina">Muebles Oficina</option>
                                <option value="Equipo Oficina">Equipo Oficina</option>
                                <option value="Eq. de Comp">Eq. de Comp</option>
                                <option value="Hip. por Pagar">Hip. por Pagar</option>
                                <option value="Capital">Capital</option>
                              </select>
                              </td>
                              <td width="125"><input type="numeric" v-model="diario.haber.saldo" name="haber" class="form-control" required></td>         
                        </tr>
                      </tbody>
                    </table>

                       <div class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="updateHaber()">Actualizar Pasivo</a>
                      </div>
                  </div>
                </div>
            </div>
           <div class="modal-footer">
          </div>
        </div>
    </div>
</div>

{{-- Activo --}}
<div class="modal fade" id="debe_a" tabindex="-1"  role="dialog" aria-labelledby="debeLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h5 class="modal-title" id="debeLabel">ACTUALIZAR ACTIVO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                      <table class="table table-bordered table-sm">
                          <thead class="thead-dark">
                            <tr>
                              <th v-if="diario.fecha != ''" width="50" >Fecha</th>
                              <th  align="center" class="text-center">Cuentas</th>
                              <th  align="center" class="text-center">Saldo</th>    
                            </tr>
                       </thead>
                        <tbody >  
                          <tr>
                              <td v-if="diario.fecha != ''" width="50" > <input type="date" name="fecha" v-model="diario.debe.fecha" class="form-control" required></td>
                              <td>
                              <select name="n_cuenta" v-model="diario.debe.nom_cuenta" class="custom-select">
                                <option value="" disabled>ELIGE UNA CUENTA</option>
                                <option value="Banco">Bancos</option>
                                <option value="Muebles">Muebles</option>
                                <option value="Caja">Caja</option>
                                <option value="Vehiculo">Vehiculo</option>
                                <option value="Inv. Mercaderías">Inv. Mercaderías</option>
                                <option value="Doc. por Cob">Doc. por Cob</option>
                                <option value="Doc. por Pagar">Doc. por Pagar</option>
                                <option value="Muebles Oficina">Muebles Oficina</option>
                                <option value="Equipo Oficina">Equipo Oficina</option>
                                <option value="Eq. de Comp">Eq. de Comp</option>
                                <option value="Hip. por Pagar">Hip. por Pagar</option>
                                <option value="Capital">Capital</option>
                              </select>
                              </td>
                              <td width="125"><input type="numeric" v-model="diario.debe.saldo" name="debe" class="form-control"></td>         
                        </tr>
                      </tbody>
                    </table>
                       <div class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="updateDebe()">Actualizar Activo</a>
                      </div>
                  </div>
                </div>
            </div>
           <div class="modal-footer">
          </div>
        </div>
    </div>
</div>





{{-- ACTUALIZAR UN REGISTRO --}}
<div class="modal fade" id="haber_d" tabindex="-1"  role="dialog" aria-labelledby="haberLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h5 class="modal-title" id="haberLabel">ACTUALIZAR PASIVO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                      <table class="table table-bordered table-sm">
                          <thead class="thead-dark">
                          <tr>
                          <th  align="center" class="text-center">Cuentas</th>
                          <th  align="center" class="text-center">Saldo</th>    
                        </tr>
                       </thead>
                        <tbody >  
                          <tr>
                              <td>
                              <select name="n_cuenta" v-model="diario.haber.nom_cuenta" class="custom-select">
                                <option value="" disabled>ELIGE UNA CUENTA</option>
                                <option value="Banco">Bancos</option>
                                <option value="Muebles">Muebles</option>
                                <option value="Caja">Caja</option>
                                <option value="Vehiculo">Vehiculo</option>
                                <option value="Inv. Mercaderías">Inv. Mercaderías</option>
                                <option value="Doc. por Cob">Doc. por Cob</option>
                                <option value="Doc. por Pagar">Doc. por Pagar</option>
                                <option value="Muebles Oficina">Muebles Oficina</option>
                                <option value="Equipo Oficina">Equipo Oficina</option>
                                <option value="Eq. de Comp">Eq. de Comp</option>
                                <option value="Hip. por Pagar">Hip. por Pagar</option>
                                <option value="Capital">Capital</option>
                              </select>
                              </td>
                              <td width="125"><input type="numeric" v-model="diario.haber.saldo" name="haber" class="form-control" required></td>         
                        </tr>
                      </tbody>
                    </table>
                    
                       <div class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="updateHaber1()">Actualizar Pasivo</a>
                      </div>
                  </div>
                </div>
            </div>
           <div class="modal-footer">
          </div>
        </div>
    </div>
</div>

{{-- Pasivos --}}
<div class="modal fade" id="debe_d" tabindex="-1"  role="dialog" aria-labelledby="debeLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h5 class="modal-title" id="debeLabel">ACTUALIZAR ACTIVO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                      <table class="table table-bordered table-sm">
                          <thead class="thead-dark">
                            <tr>
                              <th v-if="diario.debe.fecha != ''" width="50" >Fecha</th>
                              <th  align="center" class="text-center">Cuentas</th>
                              <th  align="center" class="text-center">Saldo</th>    
                            </tr>
                       </thead>
                        <tbody >  
                          <tr>
                              <td v-if="diario.debe.fecha != ''" width="50" > <input type="date" name="fecha" v-model="diario.debe.fecha" class="form-control" required></td>
                              <td>
                              <select name="n_cuenta" v-model="diario.debe.nom_cuenta" class="custom-select">
                                <option value="" disabled>ELIGE UNA CUENTA</option>
                                <option value="Banco">Bancos</option>
                                <option value="Muebles">Muebles</option>
                                <option value="Caja">Caja</option>
                                <option value="Vehiculo">Vehiculo</option>
                                <option value="Inv. Mercaderías">Inv. Mercaderías</option>
                                <option value="Doc. por Cob">Doc. por Cob</option>
                                <option value="Doc. por Pagar">Doc. por Pagar</option>
                                <option value="Muebles Oficina">Muebles Oficina</option>
                                <option value="Equipo Oficina">Equipo Oficina</option>
                                <option value="Eq. de Comp">Eq. de Comp</option>
                                <option value="Hip. por Pagar">Hip. por Pagar</option>
                                <option value="Capital">Capital</option>
                              </select>
                              </td>
                              <td width="125"><input type="numeric" v-model="diario.debe.saldo" name="debe" class="form-control"></td>         
                        </tr>
                      </tbody>
                    </table>
                       <div class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="updateDebe1()">Actualizar Activo</a>
                      </div>
                  </div>
                </div>
            </div>
           <div class="modal-footer">
          </div>
        </div>
    </div>
</div>


{{-- Porcentual --}}
<div class="modal fade" id="porcentajes" tabindex="-1"  role="dialog" aria-labelledby="debeLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h5 class="modal-title" id="debeLabel">Porcentajes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                      <table class="table table-bordered table-sm">
                          <thead class="thead-dark">
                            <tr>
                              <th v-if="diario.debe.fecha != ''" width="50" >Fecha</th>
                              <th  align="center" class="text-center">Cuentas</th>
                              <th  align="center" class="text-center">Tipo</th>    
                              <th  align="center" class="text-center">Cantidad</th>    
                            </tr>
                       </thead>
                        <tbody >  
                          <tr>
                            {{--   <td v-if="diario.debe.fecha != ''" width="50" > <input type="date" name="fecha" v-model="diario.debe.fecha" class="form-control" required>
                              </td> --}}
                              <td>
                              <select name="n_cuenta" v-model="porcentajes.index_cuenta" class="custom-select">
                                <option value="" disabled>ELIGE UNA CUENTA</option>
                                <option value="10">RET. IVA 10%</option>
                                <option value="20">RET. IVA 20%</option>
                                <option value="30">RET. IVA 30%</option>
                                <option value="70">RET. IVA 70%</option>
                                <option value="100">RET. IVA 100%</option>
                              </select>
                              </td>
                              <td>
                              <select v-model="porcentajes.tipo" class="custom-select">
                                <option value="" disabled>ELIGE UNA CUENTA</option>
                                <option value="debe">DEBE</option>
                                <option value="haber">HABER</option>
                                
                              </select>
                              </td>
                              <td width="125">
                                <input type="numeric" v-model="porcentajes.cantidad" name="debe" class="form-control">
                              </td>         
                        </tr>
                      </tbody>
                    </table>
                       <div class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="">Agregar Porcentaje</a>
                      </div>
                  </div>
                </div>
            </div>
           <div class="modal-footer">
          </div>
        </div>
    </div>
</div>