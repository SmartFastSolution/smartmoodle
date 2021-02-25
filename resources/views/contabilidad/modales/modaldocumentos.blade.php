<!-- CHEQUE -->
<div class="modal fade" id="m_cheque" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="m_chequeLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-xl ">
    <div class="modal-content bg-light">
      <div class="modal-header">
        <h5 class="modal-title" id="m_chequeLabel">CHEQUE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="resetCheque()">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3 class="text-center font-weight-bold">LLENAR CHEQUE</h3>
        {{--     <div class="form-group row">
          <label for="inputEmail3" class="col-sm-1 col-form-label">MODULO</label>
          <div class="col-sm-4">
            <input type="text" class="form-control mb-2" placeholder="Modulo al que pertenece el cheque" v-model="modulo">
            
          </div>
        </div> --}}
        <div class=" border p-2" style="box-shadow: 5px 5px 15px 0px  #27B8F4">
          <div class="row ">
            <div class="col-6 mb-2">
              <input type="text" v-model="cheque.tipo_cheque" class="form-control mt-2" >
              <input type="text" v-model="cheque.banco" class="form-control mt-2" >
            </div>
            <div class="col-2 align-self-center">
              <p>16457 <br>
                152
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-2">
              <label class="text-capitalize"  for="">PAGUESE A LA ORDEN DE:</label>
              
            </div>
            <div class="col-8">
              <input type="text" v-model="cheque.girador" class="form-control" >
            </div>
            <div class="col-2">
              <label for="">
                CHEQUE <input type="number" v-model="cheque.n_cheque" size="1" class="form-control form-control-sm text-right" name="">
              </label><br>
              <div class="row">
                <div class="col-2"><label for="">
                  US
                </label></div>
                <div class="col-8"><input type="number" name="cantidad" v-model="cheque.cantidad" class="form-control text-right" size="2" ></div>
              </div>
              
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-2">
              <label for="">LA SUMA DE</label>
            </div>
            <div class="col-8">
              <input type="text" v-model="cheque.cantidad_letra" class="form-control" >
            </div>
            <div class="col-2">
              DOLARES
            </div>
          </div>
          <div class="row">
            <div class="col-6 align-self-start pb-5">
              <div class="row">
                <div class="col-6"><input name="lugar" v-model="cheque.ciudad" class="form-control" type="text" ></div>
                <div class="col-6"><input name="fecha" v-model="cheque.fecha" class="form-control" type="date" ></div>
              </div>
              <div class="row">
                <div class="col-6"> <label for="">CIUDAD</label> </div>
                <div class="col-6 text-center"> <label for="">FECHA</label> </div>
              </div>
            </div>
            <div class="col-6 col align-self-end text-center">
              <input name="firma" v-model="cheque.firma" class="form-control" type="text" >
              <label class="" for="">FIRMA</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
        <button v-if="!cheque.update" type="button" class="btn btn-primary" @click.prevent="guardarCheque()">Guardar Cheque</button>
        <button v-if="cheque.update" type="button" class="btn btn-info" @click.prevent="updateCheque()">Actualizar Cheque</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="m_credito" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="m_creditoLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="m_creditoLabel">NOTA DE CREDITO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="resetNota()">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3 class="text-center font-weight-bold">LLENAR NOTA DE CREDITO</h3>
        {{--          <div class="form-group row">
          <label for="inputEmail3" class="col-sm-1 col-form-label">MODULO</label>
          <div class="col-sm-4">
            <input type="text" class="form-control mb-2" placeholder="Modulo al que pertenece la nota de credito" v-model="modulo">
            
          </div>
        </div> --}}
        <div class="" style="box-shadow: 5px 5px 15px 0px  #F42787">
          <div class="row p-3 justify-content-between">
            <div class="col-lg-5 col-sm-12 mb-sm-3">
              <img class="img-fluid" src="{{ asset('img/nota-credito.png') }}" alt="">
              <div class="row">
                <div class="col-12 rounded border-success border text-left">
                  <h5>Distribuidora de Libros</h5>
                  <h6>Dirección Matriz :  Av. 17 de Septiembre</h6>
                  <h6>Dirección  Sucursal :  Juan  Montalvo  y  24  de  Mayo</h6>
                  <h6>Contribuyente Especial N°        25489</h6>
                  <h6>OBLIGADO  A  LLEVAR  CONTABILIDAD   SI</h6>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12 rounded border-success border text-left p-2">
              <h6>R.U.C.  0925487699001</h6>
              <h5>NOTA DE CREDITO</h5>
              <h6>No. 001-001-000000002</h6>
              <h6>NÚMERO DE AUTORIZACIÓN: <br> 2101201710240109254876990011045896723</h6>
              <h6>FECHA Y HORA DE AUTORIZACIÓN <br>
              21/01/2017    10:24:01  a.m.</h6>
              <h6>AMBIENTE :  PRODUCCIÓN</h6>
              <h6>EMISIÓN :  NORMAL</h6>
              <h6>CLAVE DE ACCESO :</h6>
            </div>
          </div>
          <div class="row p-3 m-0 mb-2 border border-info">
            <div class="col-lg-7 col-sm-12">
              <div class="row mb-1">
                <div class="col-lg-6 col-sm-12"> <label>RAZÓN SOCIAL/NOMBRES Y APELLIDOS</label></div>
                <div class="col-lg-6 col-sm-12"><input  name="nombre" type="text " v-model="nota_credito.razon_social" class="form-control"></div>
              </div>
              <div class="row  mb-1">
                <div class="col-lg-6 col-sm-12 "><label for="">FECHA EMISIÓN :</label></div>
                <div class="col-lg-6 col-sm-12"><input  name="fecha_emision" type="text " v-model="nota_credito.fecha_emision" class="form-control"></div>
              </div>
            </div>
            <div class="col-lg-5 col-sm-12">
              <div class="row mb-3">
                <div class="col-lg-5 col-sm-12"><label class="col-form-label">R.U.C/C.I. :</label></div>
                <div class="col-lg-7 col-sm-12"><input  name="ruc" type="text " v-model="nota_credito.ruc" class="form-control"></div>
              </div>
              {{-- <div class="row">
                <div class="col-5"><label class="col-form-label" for="">GUÍA DE REMISIÓN :</label></div>
                <div class="col-7"><input  name="emision" type="text " v-model="nota_credito." class="form-control"></div>
              </div> --}}
            </div>
            <div class="col-12 mt-2 col-sm-12">
              <div class="row mb-1">
                <div class="col-lg-6 col-sm-12"><label for="">COMPROBANTE QUE MODIFICA</label></div>
                <div class="col-lg-6 col-sm-12"><input  name="nombre" type="text " v-model="nota_credito.comprobante" class="form-control"></div>
              </div>
              <div class="row  mb-1">
                <div class="col-lg-6 col-sm-12 "><label for="">FECHA EMISION(Comprobante a modificar) :</label></div>
                <div class="col-lg-6 col-sm-12"><input  type="text " v-model="nota_credito.emision" class="form-control"></div>
              </div>
              <div class="row  mb-1">
                <div class="col-lg-6 col-sm-12 "><label for="">RAZON DE MODIFICACION:</label></div>
                <div class="col-lg-6 col-sm-12"><input  type="text " v-model="nota_credito.razon_modificacion" class="form-control"></div>
              </div>
            </div>
          </div>
          <div class="row p-3  mb-2 table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr align="center">
                  <th scope="col">CÓDIGO</th>
                  <th scope="col">CÓD. AUXILIAR</th>
                  <th scope="col">CANT.</th>
                  <th scope="col">DESCRIPCION.</th>
                  <th>DESCUENTO</th>
                  <th scope="col">P. UNITARIO</th>
                  <th>VALOR VENTA</th>
                  <th width="50">BORRAR</th>
                </tr>
              </thead>
              <tbody class="prin">
                <tr v-for="(dato, index) in nota_credito.datos">
                  <td width="100"> <input type="number" v-model="dato.codigo" name="codigo[]" class="form-control text-right" ></td>
                  <td width="100"><input type="text" v-model="dato.cod_aux" name="cod_aux[]" class="form-control text-right" ></td>
                  <td width="100"><input type="number" v-model="dato.cantidad" name="cantidad[]" class="form-control text-right" ></td>
                  <td ><textarea  v-model="dato.descripcion" name="descripcion[]" class="form-control" ></textarea> </td>
                  <td width="50"><input type="number" v-model="dato.descuento" name="precio[]" class="form-control text-right" ></td>
                  <td width="50"><input type="number" v-model="dato.p_unitario" name="descuento[]" class="form-control text-right" ></td>
                  <td width="75" ><input type="number" v-model="dato.venta" name="valor[]" class="form-control text-right" ></td>
                  <td class="text-center"><a @click.prevent="eliminarDatoNota(index)" v-if="index != 0" href="#" class="btn btn-danger remove"><i class="fas fa-trash"></i></a></td>
                </tr>
                
              </tbody>
            </table>
            <a href="#" class=" btn btn-outline-danger" @click.prevent="aggDatoNota()">Agregar Columna</a>
          </div>
          <div class="row p-3  mb-2">
            <div class="col-lg-6 col-sm-12 mb-sm-3 border-danger border align-self-end">
              <h2 class="text-center">Informacion Adicional</h2>
              <div class="row mb-2">
                <div class="col-4"><label class="col-form-label" for="">Direccion</label></div>
                <div class="col-8">Av 17 de Septiembre y Rumichaca esquina</div>
              </div>
              <div class="row mb-2">
                <div class="col-4"><label class="col-form-label" for="">Telefono</label></div>
                <div class="col-8">2158674 - 21389472</div>
              </div>
              <div class="row mb-2">
                <div class="col-4"><label class="col-form-label" for="">Email</label></div>
                <div class="col-8">ediciones_palacios@hotmail.com</div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12">
              <table class="table table-bordered">
                
                <tbody>
                  <tr>
                    <th scope="row">SUBTOTAL 12%</th>
                    <td><input  type="number" v-model="nota_credito.totales.subtotal_12" name="subtotal_12" class="form-control text-right"></td>
                  </tr>
                  <tr>
                    <th scope="row">SUBTOTAL 0%</th>
                    <td><input  type="number" v-model="nota_credito.totales.subtotal_0" name="subtotal_0" class="form-control text-right"></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">SUBTOTAL No objeto de IVA</th>
                    <td><input  type="number" v-model="nota_credito.totales.subtotal_no_iva" name="subtotal_iva" class="form-control text-right"></td>
                  </tr>
                  <tr>
                    <th scope="row">SUBTOTAL Exento de IVA</th>
                    <td><input  type="number" v-model="nota_credito.totales.subtotal_exe_iva" name="subtotal_siniva" class="form-control text-right"></td>
                  </tr>
                  <tr>
                    <th scope="row">SUBTOTAL SIN IMPUESTOS</th>
                    <td><input  type="number" v-model="nota_credito.totales.subtotal_sin_va" name="subtotal_sin_imp" class="form-control text-right"></td>
                  </tr>
                  <tr>
                    <th scope="row">TOTAL DESCUENTO</th>
                    <td><input  type="number" v-model="nota_credito.totales.total_descuento" name="descuento_total" class="form-control text-right"></td>
                  </tr>
                  <tr>
                    <th scope="row">ICE</th>
                    <td><input  type="number" v-model="nota_credito.totales.ice" name="ice" class="form-control text-right"></td>
                  </tr>
                  <tr>
                    <th scope="row">IVA 12%</th>
                    <td><input  type="number" v-model="nota_credito.totales.iva_12" name="iva12" class="form-control text-right"></td>
                  </tr>
                  <tr>
                    <th scope="row">IRBPNR</th>
                    <td><input  type="number" v-model="nota_credito.totales.irbpnr" name="irbpnr" class="form-control text-right"></td>
                  </tr>
                  <tr>
                    <th scope="row">VALOR TOTAL</th>
                    <td><input  type="number" v-model="nota_credito.totales.total" name="valor_total" class="form-control text-right"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
        <button v-if="!nota_credito.update" type="button" class="btn btn-primary" @click.prevent="guardarNota()">Guardar Nota Credito</button>
        <button v-if="nota_credito.update" type="button" class="btn btn-info" @click.prevent="updateNota()">Actualizar Nota Credito</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="m_factura" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="m_facturaLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="m_facturaLabel">FACTURA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="resetFactura()">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3 class="text-center font-weight-bold">LLENAR FACTURA</h3>
      {{--   <div class="form-group row">
          <label for="inputEmail3" class="col-sm-1 col-form-label">MODULO</label>
          <div class="col-sm-4">
            <input type="text" class="form-control mb-2" placeholder="Modulo al que pertenece la factura" v-model="modulo">
            
          </div>
        </div> --}}
        <div class="" style="box-shadow: 5px 5px 15px 0px  #F42787">
          <div class="row p-3 justify-content-between">
            <div class="col-lg-5 col-sm-12 mb-sm-3">
              <img class="img-fluid" src="{{ asset('img/talleres/imagen-27.jpg') }}" alt="">
              <div class="row">
                <div class="col-12 rounded border-success border text-left">
                  <h5>Venta de materiales de construccion</h5>
                  <h6>Dirección Matriz :  Av. 17 de Septiembre</h6>
                  <h6>Dirección  Sucursal :  Juan  Montalvo  y  24  de  Mayo</h6>
                  <h6>Contribuyente Especial N°        25489</h6>
                  <h6>OBLIGADO  A  LLEVAR  CONTABILIDAD   SI</h6>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12 rounded border-success border text-left p-2">
              <h6>R.U.C.  0925487699001</h6>
              <h5>FACTURA</h5>
              <h6>No. 001-001-000000002</h6>
              <h6>NÚMERO DE AUTORIZACIÓN: <br> 2101201710240109254876990011045896723</h6>
              <h6>FECHA Y HORA DE AUTORIZACIÓN <br>
              21/01/2017    10:24:01  a.m.</h6>
              <h6>AMBIENTE :  PRODUCCIÓN</h6>
              <h6>EMISIÓN :  NORMAL</h6>
              <h6>CLAVE DE ACCESO :</h6>
            </div>
          </div>
          <div class="row p-3 m-0 mb-2 border border-info">
            <div class="col-lg-7 col-sm-12">
              <div class="row mb-3">
                <div class="col-lg-6 col-sm-12"><label class="col-form-label" for="">RAZÓN SOCIAL/NOMBRES Y APELLIDOS :</label></div>
                <div class="col-lg-6 col-sm-12"><input  name="nombre" type="text " v-model="factura.razon_social"  class="form-control"></div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-sm-12"><label class="col-form-label" for="">FECHA EMISIÓN :</label></div>
                <div class="col-lg-6 col-sm-12"><input  name="fecha_emision" type="text " v-model="factura.fecha_emision" class="form-control"></div>
              </div>
            </div>
            <div class="col-lg-5 col-sm-12">
              <div class="row mb-3">
                <div class="col-lg-5 col-sm-12"><label class="col-form-label">R.U.C/C.I. :</label></div>
                <div class="col-lg-7 col-sm-12"><input  name="ruc" type="text " v-model="factura.ruc" class="form-control"></div>
              </div>
              <div class="row">
                <div class="col-lg-5 col-sm-12"><label class="col-form-label" for="">GUÍA DE REMISIÓN :</label></div>
                <div class="col-lg-7 col-sm-12"><input  name="emision" type="text " v-model="factura.guia_remision" class="form-control"></div>
              </div>
            </div>
          </div>
          <div class="row p-3  mb-2 table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr align="center">
                  <th scope="col">CÓDIGO</th>
                  <th scope="col">CÓD. AUXILIAR</th>
                  <th scope="col">CANT.</th>
                  <th scope="col">DESCRIPCION.</th>
                  <th scope="col">P. UNITARIO</th>
                  <th>DESCUENTO</th>
                  <th>VALOR VENTA</th>
                  <th width="50">BORRAR</th>
                </tr>
              </thead>
              <tbody class="prin">
                <tr v-for="(dato, index) in factura.datos">
                  <td width="100"> <input type="number" v-model="dato.codigo" name="codigo[]" class="form-control text-right" ></td>
                  <td width="100"><input type="text" v-model="dato.cod_aux" name="cod_aux[]" class="form-control text-right" ></td>
                  <td width="100"><input type="number" v-model="dato.cantidad" name="cantidad[]" class="form-control text-right" ></td>
                  <td ><textarea  v-model="dato.descripcion" name="descripcion[]" class="form-control" ></textarea> </td>
                  <td width="50"><input type="number" v-model="dato.p_unitario" name="precio[]" class="form-control text-right" ></td>
                  <td width="50"><input type="number" v-model="dato.descuento" name="descuento[]" class="form-control text-right" ></td>
                  <td width="75" ><input type="number" v-model="dato.venta" name="valor[]" class="form-control text-right" ></td>
                  <td class="text-center"><a @click.prevent="eliminarDatoFactura(index)" v-if="index != 0" href="#" class="btn btn-danger remove"><i class="fas fa-trash"></i></a></td>
                </tr>
              </tbody>
            </table>
            <a href="#" class="addRow btn btn-outline-danger" @click.prevent="aggDatoFactura()">Agregar Columna</a>
          </div>
          <div class="row p-3  mb-2">
            <div class="col-lg-6 col-sm-12 mb-sm-3 border-danger border align-self-end">
              <h2 class="text-center">Informacion Adicional</h2>
              <div class="row mb-2">
                <div class="col-4"><label class="col-form-label" for="">Direccion</label></div>
                <div class="col-8">Av 17 de Septiembre y Rumichaca esquina</div>
              </div>
              <div class="row mb-2">
                <div class="col-4"><label class="col-form-label" for="">Telefono</label></div>
                <div class="col-8">2158674 - 21389472</div>
              </div>
              <div class="row mb-2">
                <div class="col-4"><label class="col-form-label" for="">Email</label></div>
                <div class="col-8">ediciones_palacios@hotmail.com</div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12 mb-sm-3 ">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th scope="row">SUBTOTAL 12%</th>
                    <td><input  type="number" v-model="factura.totales.subtotal_12" name="subtotal_12" class="form-control text-right"></td>
                  </tr>
                  <tr>
                    <th scope="row">SUBTOTAL 0%</th>
                    <td><input  type="number" v-model="factura.totales.subtotal_0" name="subtotal_0" class="form-control text-right"></td>
                  </tr>
                  <tr>
                    <th scope="row">SUBTOTAL No objeto de IVA</th>
                    <td><input  type="number" v-model="factura.totales.subtotal_no_iva" name="subtotal_iva" class="form-control text-right"></td>
                  </tr>
                  <tr>
                    <th scope="row">SUBTOTAL Exento de IVA</th>
                    <td><input  type="number" v-model="factura.totales.subtotal_exe_iva" name="subtotal_siniva" class="form-control text-right"></td>
                  </tr>
                  <tr>
                    <th scope="row">SUBTOTAL SIN IMPUESTOS</th>
                    <td><input  type="number" v-model="factura.totales.subtotal_sin_va" name="subtotal_sin_imp" class="form-control text-right"></td>
                  </tr>
                  <tr>
                    <th scope="row">TOTAL DESCUENTO</th>
                    <td><input  type="number" v-model="factura.totales.total_descuento" name="descuento_total" class="form-control text-right"></td>
                  </tr>
                  <tr>
                    <th scope="row">ICE</th>
                    <td><input  type="number" v-model="factura.totales.ice" name="ice" class="form-control text-right"></td>
                  </tr>
                  <tr>
                    <th scope="row">IVA 12%</th>
                    <td><input  type="number" v-model="factura.totales.iva_12" name="iva12" class="form-control text-right"></td>
                  </tr>
                  <tr>
                    <th scope="row">IRBPNR</th>
                    <td><input  type="number" v-model="factura.totales.irbpnr" name="irbpnr" class="form-control text-right"></td>
                  </tr>
                  <tr>
                    <th scope="row">VALOR TOTAL</th>
                    <td><input  type="number" v-model="factura.totales.total" name="valor_total" class="form-control text-right"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
        <button v-if="!factura.update" type="button" class="btn btn-primary" @click.prevent="guardarFactura()">Guardar Factura</button>
        <button v-if="factura.update" type="button" class="btn btn-info" @click.prevent="updateFactura()">Actualizar Factura</button>
      </div>
    </div>
  </div>
</div>