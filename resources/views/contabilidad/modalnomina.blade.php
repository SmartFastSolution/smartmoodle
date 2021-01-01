<div class="modal fade" data-backdrop="static" data-keyboard="false" id="modal_nomina" tabindex="-1" role="dialog"
    aria-labelledby="bc-transaccionLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl " role="document">
        <div class="modal-content bg-light">

            <div class="modal-header">
                <div v-if="update">
                    <h5 class="modal-title" id="haberLabel">ACTUALIZAR NÓMINA</h5>
                </div>
                <div v-else="!update">
                    <h5 class="modal-title" id="haberLabel">AGREGAR NÓMINA</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <a class="btn btn-dark mb-2" href="" @click.prevent="calculadora()">CALCULADORA</a>

                <div class="row justify-content-center">
                    <h2 class="text-center font-weight-bold mt-2">Datos para elaborar la Nómina de Empleados</h2>

                    <div class="col-7 border border-bottom-0 border-left-0 border-top-0 border-danger">
                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="font-size: 12px;">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="mn-sobretiempo-tab" data-toggle="tab"
                                    href="#mn-sobretiempo" role="tab" aria-controls="mn-sobretiempo"
                                    aria-selected="true">SOBRE TIEMPOS</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link " id="mn-calculo-hipotecario-tab" data-toggle="tab"
                                    href="#mn-calculo-hipotecario" role="tab" aria-controls="mn-calculo-hipotecario"
                                    aria-selected="true">CALCULO HIPOTECARIO</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="mn-calculo-quirografario-tab" data-toggle="tab"
                                    href="#mn-calculo-quirografario" role="tab" aria-controls="mn-calculo-quirografario"
                                    aria-selected="false">CALCULO QUIROGRAFARIO</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="mn-retencion-iva-tab" data-toggle="tab" href="#mn-retencion-iva"
                                    role="tab" aria-controls="mn-retencion-iva" aria-selected="false">RETENCION IVA</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="mn-sobretiempo" role="tabpanel"
                                aria-labelledby="mn-sobretiempo-tab">
                                <h4 class="text-center text-success font-weight-bold mt-2">Calculo Sobre Tiempo</h4>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-5 col-form-label">HORA DE TRABAJO</label>
                                    <div class="col-2">
                                        <input type="number" class="form-control text-right form-control-sm"
                                            v-model="sobretiempo.sueldo" placeholder="Sueldo">
                                    </div>
                                    <div class="col-2">
                                        <a href="#" class=" btn btn-outline-success  btm-block btn-sm"
                                            @click.prevent="calculoHora()">Calculo</a>
                                    </div>
                                    <div class="col-2">
                                        <a href="#" class=" btn btn-outline-warning btm-block   btn-sm"
                                            @click.prevent="limpiarSobre()">Limpiar</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-5 col-form-label">TOTAL HORAS
                                        SUPLEMENTARIAS</label>
                                    <div class="col-2">
                                        <input type="number" class="form-control text-right form-control-sm"
                                            v-model="sobretiempo.total_suple" placeholder="Horas">
                                    </div>
                                    <div class="col-2 text-center">
                                        X <span class="badge badge-success">@{{ sobretiempo.hora_trabajo }}</span>
                                    </div>
                                    <div class="col-1">
                                        X 1.5
                                    </div>
                                    <div class="col-2 text-right">
                                        <span class="badge badge-info">@{{ sobretiempo.suma_suple }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-5 col-form-label">TOTAL HORAS
                                        EXTRAORDINARIAS</label>
                                    <div class="col-2">
                                        <input type="number" class="form-control text-right form-control-sm"
                                            v-model="sobretiempo.total_extra" placeholder="Horas">
                                    </div>
                                    <div class="col-2 text-center">
                                        X <span class="badge badge-success">@{{ sobretiempo.hora_trabajo }}</span>
                                    </div>
                                    <div class="col-1">
                                        X 2
                                    </div>
                                    <div class="col-2 text-right">
                                        <span class="badge badge-info">@{{ sobretiempo.suma_extra }}</span>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-2 text-right">
                                        <a @click.prevent="calculoSobre()" href=""
                                            class="btn btn-success btn-sm">CALCULAR SOBRETIEMPO</a>
                                    </div>
                                </div>
                                <h2 class="text-danger font-weight-bold">TOTAL SOBRETIEMPO: <strong
                                        class="text-dark">@{{ sobretiempo.total }}</strong></h2>
                            </div>
                            <div class="tab-pane fade" id="mn-calculo-hipotecario" role="tabpanel"
                                aria-labelledby="mn-calculo-hipotecario-tab">
                                <h4 class="text-center text-success font-weight-bold mt-2">Calculo Préstamo Hipotecario
                                </h4>
                                <div class="row">
                                    <div class="col">
                                        <td width="100">
                                            <input type="number" class="form-control form-control-sm"
                                                v-model="calculo.valor" placeholder="Valor ">
                                        </td>

                                    </div>
                                    <div class="col">
                                        <td width="100">
                                            <input type="number" class="form-control form-control-sm"
                                                v-model="calculo.tiempo" placeholder="Tiempo ">
                                        </td>
                                    </div>
                                    <div class="col">
                                        <td width="100">
                                            <input type="number" class="form-control form-control-sm"
                                                v-model="calculo.interes" placeholder="Interes">
                                        </td>
                                    </div>
                                    <div class="col">
                                        <td width="100">
                                            <a href="#" class="addDiario btn btn-outline-success  btn-sm"
                                                @click.prevent="calculoHipo()">Calculo</a>
                                        </td>
                                    </div>
                                    <div class="col">
                                        <td width="150">
                                            <input type="number" v-model="calculo.total"
                                                class="form-control form-control-sm" placeholder="Resultado">
                                        </td>
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane fade" id="mn-calculo-quirografario" role="tabpanel"
                                aria-labelledby="mn-calculo-quirografario-tab">
                                <h4 class="text-center text-success font-weight-bold mt-2">Calculo Préstamo
                                    Quirografario
                                </h4>
                                <div class="row">
                                    <div class="col">
                                        <td width="100">
                                            <input type="number" class="form-control form-control-sm"
                                                v-model="calculo1.valor" placeholder="valor ">
                                        </td>

                                    </div>
                                    <div class="col">
                                        <td width="100">
                                            <input type="number" class="form-control form-control-sm"
                                                v-model="calculo1.mes" placeholder="Mes">
                                        </td>
                                    </div>
                                    <div class="col">
                                        <td width="100">
                                            <input type="number" class="form-control form-control-sm"
                                                v-model="calculo1.interes" placeholder="Interes">
                                        </td>
                                    </div>
                                    <div class="col">
                                        <td width="100">
                                            <a href="#" class="addDiario btn btn-outline-success btn-sm"
                                                @click.prevent="calculoquiro()">Calculo</a>
                                        </td>
                                    </div>
                                    <div class="col">
                                        <td width="150">
                                            <input type="number" v-model="calculo1.total"
                                                class="form-control form-control-sm" placeholder="Resultado">
                                        </td>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="mn-retencion-iva" role="tabpanel"
                                aria-labelledby="mn-retencion-iva-tab"
                                style=" height:300px; overflow-y: scroll; overflow-x: hidden;">
                                <h4 class="text-center text-success font-weight-bold mt-2">Impuesto a La Renta
                                </h4>
                                <div class="p-2" style="border: double 4px red;">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-9 col-form-label">Sueldo</label>
                                        <div class="col-sm-3">
                                            <input type="number" v-model="impuesto.sueldo"
                                                class="form-control  form-control-sm text-right"
                                                placeholder="Agregar Sueldo">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-9 col-form-label">Comisiones y
                                            Sobretiempos</label>
                                        <div class="col-sm-3">
                                            <input type="number" v-model="impuesto.comisiones"
                                                class="form-control  form-control-sm text-right"
                                                placeholder="Agregar Comision(Opcional)">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-9 col-form-label"></label>
                                        <div class="col-sm-3">
                                            <a href="" class="btn btn-danger  btn-sm"
                                                @click.prevent="impuestoAgregado('ingresos')">Calcular</a>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3"
                                            class="col-sm-9 col-form-label font-weight-bold text-danger">Total Ingreso
                                            Grabable</label>
                                        <div class="col-sm-3 text-right">
                                            <span class="badge badge-info text-right"
                                                style="font-size: 18px">@{{ impuesto.ingreso_gravable }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-9">- IIESS 9.45%</label>
                                        <div class="col-3 text-right">
                                            <span class="badge badge-info text-right"
                                                style="font-size: 18px">@{{ impuesto.iies }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3"
                                            class="col-sm-9 col-form-label font-weight-bold text-danger">Ingreso Liquido
                                            Mensual</label>
                                        <div class="col-sm-3 text-right">
                                            <span class="badge badge-info text-right"
                                                style="font-size: 18px">@{{ impuesto.ingreso_liquido }}</span>
                                        </div>
                                    </div>
                                    {{--         <div class="row">
                                    <div class="col">
                                        <input type="number" v-model="impuesto.sueldo"
                                            class="form-control  form-control-sm" placeholder="Agregar Sueldo">
                                    </div>
                                    <div class="col">
                                        <input type="number" v-model="impuesto.comisiones"
                                            class="form-control  form-control-sm"
                                            placeholder="Agregar Comision(Opcional)">
                                    </div>
                                </div> --}}

                                    <div class="row mt-4 justify-content-start">
                                        <div class="col-3">
                                            <h5 class="text-center text-success font-weight-bold mt-2">Deducciones:
                                            </h5>
                                        </div>
                                        <div class="col-3">
                                            <input type="text" v-model="deduccion.descripcion"
                                                class="form-control  form-control-sm" placeholder="Descripcion">
                                        </div>
                                        <div class="col-3">
                                            <input type="number" v-model="deduccion.valor"
                                                class="form-control  form-control-sm" placeholder="Valor">
                                        </div>
                                        <div class="col-3">
                                            <a href="" class="btn btn-danger  btn-sm"
                                                @click.prevent="agregardeduccion()">Agregar</a>
                                        </div>
                                    </div>
                                    <div class="row mt-3 justify-content-center">
                                        <div class="col-12">
                                            <table class="table table-bordered table-sm mt-2"
                                                v-if="deducciones.length >= 1">
                                                <thead class="bg-info">
                                                    <tr>
                                                        <th class="text-center" width="300">Descripcion</th>
                                                        <th class="text-center" width="300">Valor</th>
                                                        <th class="text-center">Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(valore, index) in deducciones">
                                                        <td class="text-left">
                                                            <input type="text" v-model="valore.descripcion" name=""
                                                                class="form-control form-control-sm">
                                                        </td>

                                                        <td class="text-left">
                                                            <input type="number" v-model="valore.valor" name=""
                                                                class="form-control form-control-sm">
                                                        </td>
                                                        <td align="center">
                                                            <a href="" class="btn btn-sm btn-danger"
                                                                @click.prevent="borrarDeduccion(index)">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3"
                                            class="col-sm-9 col-form-label font-weight-bold text-danger">Ingreso
                                            Mensual</label>
                                        <div class="col-sm-3 text-right">
                                            <span class="badge badge-info text-right"
                                                style="font-size: 18px">@{{ impuesto.ingreso_mensual }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3"
                                            class="col-sm-9 col-form-label font-weight-bold text-danger">Ingreso
                                            Anual</label>
                                        <div class="col-sm-3 text-right">
                                            <span class="badge badge-info text-right"
                                                style="font-size: 18px">@{{ impuesto.ingreso_anual }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row border p-1">
                                        <label for="inputEmail3"
                                            class="col-sm-9 col-form-label font-weight-bold text-danger">BASE
                                            IMPONIBLE</label>
                                        <div class="col-sm-3 text-right">
                                            <span class="badge badge-success text-right"
                                                style="font-size: 18px">@{{ impuesto.base_imponible }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <input type="number" v-model="impuesto.fraccion"
                                                class="form-control  form-control-sm" placeholder="Fraccion Basica">
                                        </div>
                                        <div class="col">
                                            <input type="number" v-model="impuesto.impuesto_fraccion"
                                                class="form-control  form-control-sm"
                                                placeholder="Impuesto Fraccion Basica">
                                        </div>
                                        <div class="col-2">
                                            <input type="number" v-model="impuesto.interes"
                                                class="form-control form-control-sm" placeholder="%">
                                        </div>
                                    </div>
                                    <div class="row justify-content-center mb-3">
                                        <a href="" class="btn btn-info btn-sm" @click.prevent="impuestoRenta()">Calcular
                                            Impuesto a
                                            la Renta</a>
                                    </div>
                                    {{--     <div class="form-group row border p-1">
                                    <label for="inputEmail3" class="col-sm-9 col-form-label">(-)Fraccion Basica</label>
                                    <div class="col-sm-3">
                                      <input type="number" v-model="impuesto.fraccion"
                                            class="form-control  form-control-sm" placeholder="Fraccion Basica">
                                    </div>
                                  </div> --}}
                                    <div class="form-group row border p-1">
                                        <label for="inputEmail3"
                                            class="col-sm-9 col-form-label font-weight-bold text-primary">FRACCION
                                            EXCEDENTE</label>
                                        <div class="col-sm-3 text-right">
                                            <span class="badge badge-info text-right"
                                                style="font-size: 18px">@{{ impuesto.fraccion_excedente }}</span>
                                        </div>
                                    </div>
                                    <h3 class="font-weight-bold">IMPUESTOS</h3>
                                    <div class="form-group row border p-1">
                                        <label for="inputEmail3"
                                            class="col-sm-9 col-form-label font-weight-bold text-primary">FRACCION
                                            EXCEDENTE @{{impuesto.iva }} %</label>
                                        <div class="col-sm-3 text-right">
                                            <span class="badge badge-info text-right"
                                                style="font-size: 18px">@{{ impuesto.fraccion_excedente_iva }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row border p-1">
                                        <label for="inputEmail3"
                                            class="col-sm-9 col-form-label font-weight-bold text-primary">TOTAL
                                            IMPUESTO</label>
                                        <div class="col-sm-3 text-right">
                                            <span class="badge badge-info text-right"
                                                style="font-size: 18px">@{{ impuesto.total_impuesto }}</span>
                                        </div>
                                    </div>
                                    <h2 class="text-danger font-weight-bold">RETENCION MENSUAL: <strong
                                            class="text-dark">@{{ impuesto.total }}</strong></h2><a
                                        @click.prevent="limpiar()" href="" class="btn btn-success btn-sm">Limpiar</a>



                                </div>
                            </div>
                        </div>
                        {{--  <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active text-dark font-weight-bold" id="desarollo-nomina-tab"
                                    style="font-size: 15px" data-toggle="tab" href="#desarollo-nomina" role="tab"
                                    aria-controls="desarollo-nomina" aria-selected="false">Desarrollo Nómina</a>
                            </li>

                        </ul> --}}

                        {{--         <div class="tab-content" id="myTabContent"
                            style=" height:300px; overflow-y: scroll; overflow-x: hidden;">
                            <div class="tab-pane fade " id="desarollo-nomina" role="tabpanel"
                                aria-labelledby="desarollo-nomina-tab">
                                <h1 class="text-center text-danger font-weight-bold mt-2">DESARROLLO DE NÓMINA</h1>
                            </div>
                  
                            <br>

                     
                            <br>
                       


                        </div> --}}
                    </div>

                    <div class="col-5" style=" height:300px; overflow-y: scroll; overflow-x: hidden;">

                        <h3 class="text-center text-danger font-weight-bold mt-2">ENUNCIADOS</h3>

                        <p>
                            Se compra s/fra. #040 a Importadora “ELMARY” (contribuyente especial) - doce
                            acondicionadores de aire en $ 550 c/u. Se cancela con ch/.# 050 Bco. Guayaquil. <br>
                            <br>
                            Se cancela la Fra.#023 a “Publicitas” (No Obligada a llevar Contabilidad) por
                            servicios de publicidad $ 300 con ch/.#051 Bco. Guayaquil. <br> <br>

                            Se vende S/. Fra. # 010 - cincuenta acondicionadores de aire en $ 1.200 c/u a
                            Comercial “Felipao” (Obligado a llevar Contabilidad). Nos cancela con ch/. #082 Bco.
                            Austro. <br> <br>

                            Se deposita en cta. cte.# 3050 Bco. Guayaquil $ 60.000 <br> <br>

                            Se cancela la Fra.#088 a “Servinet” (No Obligada a llevar Contabilidad) por
                            servicios de internet $ 60 con ch/.#052 Bco. Guayaquil. <br> <br>

                            Se compra s/fra. # 056 a Importadora “CASIRON” (contribuyente especial) - diez
                            acondicionadores de aire en $ 555 c/u. con ch/.# 053 Bco. Guayaquil. <br> <br>

                            De la última compra se devuelve dos acondicionadores de aire por no estar de acuerdo
                            con el pedido (Fra. # 011). <br> <br>

                            Se cancela a “CNT” la Fra. #073 por servicio telefónico $ 150 con ch/.# 054 Bco.
                            Guayaquil. <br> <br>

                            Se vende S/Fra. #012 - treinta acondicionadores de aire en $ 1.200 c/u a Comercial
                            “INCOR” (Obligado a llevar Contabilidad). Se recibe ch/. #101 Bco. del Austro. <br>
                            <br>

                            De la última venta nos devuelven un acondicionador de aire por no estar de acuerdo
                            con el pedido. Se cancela con ch/.#055 Bco. Guayaquil. (Fra. # 057) <br> <br>
                        </p>
                    </div>
                    <br>

                    <div class="col-12 mt-2 border border-bottom-0 border-left-0 border-right-0 border-danger">
                        <h2 class="text-center">AGREGAR NÓMINA</h2>

                        <table class="table table-bordered table-sm">
                            <thead class="bg-dark">
                                <tr>
                                    <th class="text-center " style="vertical-align: middle;">NOMBRE DEL EMPLEADOS</th>
                                    <th class="text-center" style="vertical-align: middle;">CARGO</th>
                                    <th class="text-center" style="vertical-align: middle;">SUELDO</th>
                                    <th class="text-center" style="vertical-align: middle;">SOBRE TIEMPO</th>
                                    <th class="text-center" style="vertical-align: middle;">TOTAL INGRESOS</th>
                                    <th class="text-center" style="vertical-align: middle;">IESS 9.45%</th>
                                    <th class="text-center" style="vertical-align: middle;">PREST. IESS</th>
                                    <th class="text-center" style="vertical-align: middle;">PREST. CIA</th>
                                    <th class="text-center" style="vertical-align: middle;">ANTICIPO</th>
                                    <th class="text-center" style="vertical-align: middle;">IMP. RENTA</th>
                                    <th class="text-center" style="vertical-align: middle;">TOTAL EGRESOS</th>
                                    <th class="text-center" style="vertical-align: middle;">VALOR NETO A PAGAR</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td class="text-right" align="center" width="300"><input v-model="nomina.nombre_e"
                                            type="text" class="form-control form-control-sm"></td>
                                    <td class="text-right" align="center" width="100"><input v-model="nomina.cargo"
                                            type="text" class="form-control form-control-sm"></td>
                                    <td class="text-right" align="center" width="125"><input v-model="nomina.sueldo"
                                            type="number" class="form-control form-control-sm"></td>
                                    <td class="text-right" align="center" width="50"><input v-model="nomina.s_tiempo"
                                            type="text" class="form-control form-control-sm"></td>
                                    <td class="text-right" align="center" width="150"><input v-model="nomina.ingresos"
                                            type="number" class="form-control form-control-sm"></td>
                                    <td class="text-right" align="center" width="150"><input v-model="nomina.iees"
                                            type="number" class="form-control form-control-sm"></td>
                                    <td class="text-right" align="center" width="150"><input v-model="nomina.pres_iees"
                                            type="number" class="form-control form-control-sm"></td>
                                    <td class="text-right" align="center" width="150"><input v-model="nomina.pres_cia"
                                            type="number" class="form-control form-control-sm"></td>
                                    <td class="text-right" align="center" width="150"><input v-model="nomina.anticipo"
                                            type="number" class="form-control form-control-sm"></td>
                                    <td class="text-right" align="center" width="150"><input v-model="nomina.imp_renta"
                                            type="number" class="form-control form-control-sm"></td>
                                    <td class="text-right" align="center" width="150"><input v-model="nomina.egresos"
                                            type="number" class="form-control form-control-sm"></td>
                                    <td class="text-right" align="center" width="150"><input v-model="nomina.neto_pagar"
                                            type="number" class="form-control form-control-sm"></td>

                                </tr>
                            </tbody>

                        </table>

                        <div v-if="!nomina.edit" class="row justify-content-center">
                            <a href="#" class="btn btn-success" @click.prevent="agregarNomina()">Agregar
                                Nómina</a>

                        </div>

                        <div v-else class="row justify-content-center">
                            <a href="#" class="btn btn-success" @click.prevent="actualizarNomina()">Actualizar
                                Nómina</a>
                            <a href="#" class="btn btn-danger ml-1" @click.prevent="cancelarEditNomina()"><i
                                    class="fa fa-window-close"></i></a>
                        </div>

                        <br>
                        <div class="col-12 mt-2" v-if="t_nomina.length > 0"
                            style=" height:300px; overflow-y: scroll; overflow-x: hidden;">
                            <br>
                            <h2 class="text-center">REGISTRO DE NÓMINA</h2>

                            <table class="table table-bordered table-sm">
                                <thead class="bg-dark">
                                    <tr>
                                        <th class="text-center " style="vertical-align: middle;">NOMBRE DEL EMPLEADOS
                                        </th>
                                        <th class="text-center" style="vertical-align: middle;">CARGO</th>
                                        <th class="text-center" style="vertical-align: middle;">SUELDO</th>
                                        <th class="text-center" style="vertical-align: middle;">SOBRE TIEMPO</th>
                                        <th class="text-center" style="vertical-align: middle;">TOTAL INGRESOS</th>
                                        <th class="text-center" style="vertical-align: middle;">IESS 9.45%</th>
                                        <th class="text-center" style="vertical-align: middle;">PREST. IESS</th>
                                        <th class="text-center" style="vertical-align: middle;">PREST. CIA</th>
                                        <th class="text-center" style="vertical-align: middle;">ANTICIPO</th>
                                        <th class="text-center" style="vertical-align: middle;">IMP. RENTA</th>
                                        <th class="text-center" style="vertical-align: middle;">TOTAL EGRESOS</th>
                                        <th class="text-center" style="vertical-align: middle;">VALOR NETO A PAGAR</th>
                                        <th class="text-center" valign="center" v-if="t_nomina.length >=1" colspan="2"
                                            rowspan="2">ACCIONES
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="(n, index) in t_nomina">
                                        <td align="center" width="300">@{{ n.nombre_e}}</td>
                                        <td align="center" width="125">@{{ n.cargo}}</td>
                                        <td class="text-right" align="center" width="100">@{{ decimales(n.sueldo)}}</td>
                                        <td class="text-right" align="center" width="100">@{{ decimales(n.s_tiempo)}}
                                        </td>
                                        <td class="text-right" align="center" width="100">@{{ decimales(n.ingresos)}}
                                        </td>
                                        <td class="text-right" align="center" width="100">@{{ decimales(n.iees)}}</td>
                                        <td class="text-right" align="center" width="100">@{{ decimales(n.pres_iees)}}
                                        </td>
                                        <td class="text-right" align="center" width="100">@{{ decimales(n.pres_cia)}}
                                        </td>
                                        <td class="text-right" align="center" width="100">@{{ decimales(n.anticipo)}}
                                        </td>
                                        <td class="text-right" align="center" width="100">@{{ decimales(n.imp_renta)}}
                                        </td>
                                        <td class="text-right" align="center" width="100">@{{ decimales(n.egresos)}}
                                        </td>
                                        <td class="text-right" align="center" width="100">@{{ decimales(n.neto_pagar)}}
                                        </td>
                                        <td align="center" width="50"><a @click.prevent="editNomina(index)"
                                                class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
                                        <td align="center" width="50"><a @click.prevent="WarningEliminarNomina(index)"
                                                class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>

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

{{--Nomina eliminar--}}

<div class="modal fade" id="eliminar_nomina" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="eliminar_nominaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminar_nominaLabel">Eliminar Nómina</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseas eliminar el registro de @{{ eliminar.nombre }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" @click="eliminarNomina()">Eliminar</button>
            </div>
        </div>
    </div>
</div>