{{-- TRANSACCION --}}
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="as-transaccion" tabindex="-1" role="dialog"
    aria-labelledby="dg-transaccionLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl " role="document">
        <div class="modal-content bg-light">
            <div class="modal-header">
                <div v-if="update">
                    <h5 class="modal-title" id="haberLabel">ACTUALIZAR TRANSACCION</h5>
                </div>
                <div v-else="!update">
                    <h5 class="modal-title" id="haberLabel">AGREGAR TRANSACCION</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a class="btn btn-dark mb-2" href="" @click.prevent="calculadora()">CALCULADORA</a>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active text-dark font-weight-bold" id="comentario-asiento-tab"
                                    style="font-size: 15px" data-toggle="tab" href="#comentario-asiento" role="tab"
                                    aria-controls="comentario-asiento" aria-selected="false">DETALLE MOVIMIENTO</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link  text-dark font-weight-bold" id="debe-asiento-tab"
                                    style="font-size: 15px" data-toggle="tab" href="#debe-asiento" role="tab"
                                    aria-controls="debe-asiento" aria-selected="true">CUENTAS DEUDORAS</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-dark font-weight-bold" id="haber-asiento-tab"
                                    style="font-size: 15px" data-toggle="tab" href="#haber-asiento" role="tab"
                                    aria-controls="haber-asiento" aria-selected="false">CUENTAS ACREEDORAS</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade " id="debe-asiento" role="tabpanel"
                                aria-labelledby="debe-asiento-tab">
                                <h2 class="text-center">AGREGAR CUENTAS DEUDORAS</h2>
                                <table class="table table-bordered table-sm">
                                    <thead class="bg-success">
                                        <tr>
                                            {{-- <th v-if="diarios.debe.length == 0 || diario.debe.fecha !== ''" width="50" >Fecha</th> --}}
                                            <th align="center" class="text-center">Cuentas</th>
                                            <th align="center" class="text-center">Saldo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            {{-- <td v-if="diarios.debe.length == 0 || diario.debe.fecha !== ''" width="50" ><input autocomplete="ÑÖcompletes" type="date" name="fecha" v-model="diario.debe.fecha" class="form-control" required></td> --}}
                                            <td>
                                                <model-select :options="options" v-model="diario.debe.nom_cuenta"
                                                    placeholder="ELEGIR CUENTA">
                                                </model-select>
                                                {{--  <select name="n_cuenta" v-model="diario.debe.nom_cuenta" class="custom-select">
                          <option value="" disabled>ELIGE UNA CUENTA</option>
                          <option v-for="(cuenta, index) in cuentas" :value="cuenta.id">@{{ cuenta.nombre }} </option>
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
                                                </select> --}}
                                            </td>
                                            <td width="125"><input autocomplete="ÑÖcompletes" type="number"
                                                    v-model="diario.debe.saldo" name="debe" class="form-control"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div v-if="!diario.debe.edit" class="row justify-content-center">
                                    <a href="#" class="btn btn-success" @click.prevent="agregarDebe()">Agregar</a>
                                    {{-- <a href=""data-toggle="modal" data-target="#kardex-diairo" class="btn btn-dark ml-1">KARDEX</a> --}}
                                </div>
                                <div v-else class="row justify-content-center">
                                    <a href="#" class="btn btn-success" @click.prevent="updateDebe()">Actualizar</a>
                                    <a href="#" class="btn btn-danger ml-1" @click.prevent="cancelarEdicion('debe')"><i
                                            class="fa fa-window-close"></i></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="haber-asiento" role="tabpanel"
                                aria-labelledby="haber-asiento-tab">
                                <h2 class="text-center">AGREGAR CUENTAS ACREEDORAS</h2>
                                <table class="table table-bordered table-sm">
                                    <thead class="bg-danger">
                                        <tr>
                                            <th align="center" class="text-center">Cuentas</th>
                                            <th align="center" class="text-center">Saldo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <model-select :options="options" v-model="diario.haber.nom_cuenta"
                                                    placeholder="ELEGIR CUENTA">
                                                </model-select>
                                                {{-- <select name="n_cuenta" v-model="diario.haber.nom_cuenta" class="custom-select">
                          <option value="" disabled>ELIGE UNA CUENTA</option>
                          <option v-for="(cuenta, index) in cuentas" :value="cuenta.id">@{{ cuenta.nombre }}
                                                </option>
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
                                                </select> --}}
                                            </td>
                                            <td width="125"><input autocomplete="ÑÖcompletes" type="number"
                                                    v-model="diario.haber.saldo" name="haber" class="form-control"
                                                    required></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div v-if="!diario.haber.edit" class="row justify-content-center">
                                    <a href="#" class="btn btn-info" @click.prevent="agregarHaber()">Agregar</a>
                                    {{-- <a href="" data-toggle="modal" data-target="#kardex-diairo" class="btn btn-dark ml-1">KARDEX</a> --}}
                                </div>
                                <div v-else class="row justify-content-center">
                                    <a href="#" class="btn btn-info" @click.prevent="updateHaber()">Actualizar</a>
                                    <a href="#" class="btn btn-danger ml-1" @click.prevent="cancelarEdicion('haber')"><i
                                            class="fa fa-window-close"></i></a>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="comentario-asiento" role="tabpanel"
                                aria-labelledby="comentario-asiento-tab">
                                <h2 class="text-center">AGREGAR DETALLES DE MOVIMIENTO</h2>
                                <table class="table table-bordered table-sm">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th align="center" class="text-center">Fecha</th>
                                            <th align="center" class="text-center">Descripción del Asiento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td width="25"><input autocomplete="ÑÖcompletes" type="date"
                                                    v-model="diarios.fecha" name="fecha" class="form-control" required>
                                            </td>
                                            <td><input autocomplete="ÑÖcompletes" type="text"
                                                    v-model="diarios.comentario" name="comentario" class="form-control"
                                                    required></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-6">
                                        {{-- <h3>Asiento de ajustes: <input autocomplete="ÑÖcompletes" v-model="diarios.ajustado" type="checkbox" class="custom-checkbox"></h3> --}}

                                    </div>
                                    <div class="col-6">
                                        {{-- <a href="" data-toggle="modal" data-target="#kardex-diairo" class="btn btn-sm btn-dark">KARDEX</a> --}}
                                    </div>
                                </div>
                                {{--  <div v-if="edit.debe.length >= 1" class="row justify-content-center">
                  <a href="#" class="btn btn-light" @click.prevent="comentarioUpdate()">Editar Comentario</a>
                </div>
                <div v-else class="row justify-content-center">
                  <a href="#" class="btn btn-light" @click.prevent="agregarComentario()">Agregar Comentario</a>
                </div> --}}
                            </div>
                        </div>
                    </div>
                    @if($datos->metodo == 'individual')
                    <div class="col-6"
                        style=" height:300px; overflow-y: scroll; overflow-x: hidden; border: double 8px #E71822;">
                        {!! $transacciones->transacciones !!}
                    </div>
                    @elseif($datos->metodo == 'concatenado')
                    <div class="col-6"
                        style=" height:300px; overflow-y: scroll; overflow-x: hidden; border: double 8px #E71822;">
                        <h3 class="text-center font-weight-bold">Datos para realizar los Asientos de Cierre</h3>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="as-estado-resultado-tab" data-toggle="tab"
                                    href="#as-estado-resultado" role="tab" aria-controls="as-estado-resultado"
                                    aria-selected="true">Estado de Resultado</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="as-balance-general-tab" data-toggle="tab"
                                    href="#as-balance-general" role="tab" aria-controls="as-balance-general"
                                    aria-selected="false">Balance General</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="as-estado-resultado" role="tabpanel"
                                aria-labelledby="as-estado-resultado-tab">
                                <h2 class="text-center display-4 font-weight-bold text-danger">Estado de Resultado</h2>
                                <div class="row p-3  mb-2 justify-content-center ">
                                    <div class="col-5 mb-3">
                                        <h3 class="text-center font-weight-bold">
                                            @{{ estadoresultado.nombre_e_resultado }}</h3>
                                        <h3 class="text-center font-weight-bold">
                                            @{{ estadoresultado.fecha_e_resultado }}</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <h5>Ventas</h5>
                                    </div>
                                    <div class="col-2 text-right">
                                        <span>@{{ decimales(estadoresultado.venta_e_resultado) }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <h5>- Costos de Ventas</h5>
                                    </div>
                                    <div class="col-2 border-danger text-right" style="border-bottom: solid; 2px">
                                        @{{ decimales(estadoresultado.costo_venta_e_resultado) }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-10">
                                        <h4 class="font-weight-bold text-info">Utilidad Bruta en Ventas</h4>
                                    </div>
                                    <div class="col-2 text-right"><span class="badge badge-danger"
                                            style="font-size: 20px;">@{{ decimales(estadoresultado.totales.utilidad_bruta_ventas_e_resultado) }}</span>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <h2 class="font-weight-bold pl-3">INGRESOS</h2>
                                    </div>
                                    <div class="col-12">
                                        <table>
                                            <tbody is="draggable" group="ingresos" :list="estadoresultado.ingresos"
                                                tag="tbody">
                                                <tr v-for="(balan, index) in estadoresultado.ingresos">
                                                    <td class="text-left" width="300">@{{ balan.cuenta}}</td>
                                                    <td align="center">@{{ decimales(balan.saldo)}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-10">
                                        <h4 class="font-weight-bold text-info">Total de ingresos</h4>
                                    </div>
                                    <div class="col-2 text-right"><span class="badge badge-danger"
                                            style="font-size: 20px;">@{{ estadoresultado.totales.ingreso }}</span></div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-10">
                                        <h4 class="font-weight-bold text-info">Utilidad Neta en Operaciones</h4>
                                    </div>
                                    <div class="col-2 text-right"><span class="badge badge-danger"
                                            style="font-size: 20px;">@{{ estadoresultado.totales.utilidad_neta_o }}</span>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <h2 class="font-weight-bold pl-3">GASTOS</h2>
                                    </div>
                                    <div class="col-12">
                                        <table>
                                            <tbody is="draggable" group="gastos" :list="estadoresultado.gastos"
                                                tag="tbody">
                                                <tr v-for="(balan, index) in estadoresultado.gastos">
                                                    <td class="text-left" width="300">@{{ balan.cuenta}}</td>
                                                    <td align="center">@{{ decimales(balan.saldo)}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row justify-content-between mb-2">
                                    <div class="col-10">
                                        <h4 class="font-weight-bold text-info">Total de gastos</h4>
                                    </div>
                                    <div class="col-2 text-right border-danger" style="border-bottom: solid 2px;"><span
                                            class="badge badge-danger"
                                            style="font-size: 20px; ">@{{ estadoresultado.totales.gasto }}</span></div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-7">
                                        <h4 v-if="estadoresultado.utilidad == 'utilidad_neta'" class="font-weight-bold">
                                            UTILIDAD NETA DEL EJERCICIO</h4>
                                        <h4 v-else class="font-weight-bold">PERDIDA DEL EJERCICIO</h4>
                                    </div>
                                    <div class="col-3"><span class="badge badge-danger"
                                            style="font-size: 20px; ">@{{ estadoresultado.totales.utilidad_ejercicio_e_resultado }}</span>
                                    </div>
                                </div>
                                <div class="mt-2 row justify-content-between"
                                    v-if="estadoresultado.utilidad == 'utilidad_neta'">
                                    <div class="col-12">
                                        <table>
                                            <tbody is="draggable" group="people" :list="estadoresultado.utilidades"
                                                tag="tbody">
                                                <tr v-for="(balan, index) in estadoresultado.utilidades">
                                                    <td class="text-left" width="750">@{{ balan.cuenta}}</td>
                                                    <td align="center">@{{ decimales(balan.saldo)}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12">
                                        <div class="row mt-2 justify-content-between">
                                            <div class="col-10">
                                                <h3 class="font-weight-bold">UTILIDAD LIQUIDA DEL EJERCICIO</h3>
                                            </div>
                                            <div class="col-2"><span class="badge badge-danger"
                                                    style="font-size: 20px; ">@{{ estadoresultado.totales.utilidad_liquida_e_resultado }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="as-balance-general" role="tabpanel"
                                aria-labelledby="as-balance-general-tab">
                                <h2 class="text-center display-4 font-weight-bold text-danger">Balance General</h2>
                                <div class="row p-3 justify-content-center ">
                                    <div class="col-5 mb-3">
                                        <h3 class="text-center">
                                            @{{ balance_general.nombre }}
                                        </h3>
                                        <h3 class="text-center">
                                            @{{ balance_general.fecha }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="row p-3  mb-2 justify-content-center ">
                                </div>
                                <h2 class="text-center font-weight-bold text-danger">ACTIVOS</h2>
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="text-primary">ACTIVOS CORRIENTE</h3><br>
                                        <draggable class="list-group list-group-flush"
                                            :list="balance_general.a_corrientes" group="people">
                                            <div v-for="(element, index) in balance_general.a_corrientes"
                                                :key="element.name">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    @{{ element.cuenta }}<span
                                                        class="badge-pill">@{{ decimales(element.saldo) }}</span>
                                                </li>
                                            </div>
                                        </draggable>
                                    </div>
                                    <div class="col-12">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="font-weight-bold" style="font-size: 20px;" width="2000">
                                                        TOTAL ACT. CORR.</td>
                                                    <td style="font-size: 20px;" class="badge-danger badge">
                                                        @{{ decimales(b_initotal.t_a_corriente )}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-9">
                                        <h3 class="text-primary">ACTIVOS NO CORRIENTE</h3><br>
                                        <table class="table table-borderless">
                                            <tbody v-for="(element, index) in balance_general.a_nocorrientes"
                                                :key="element.name">
                                                <tr>
                                                    <td width="400">@{{ element.cuenta }}</td>
                                                    <td class="text-right">@{{ decimales(element.saldo) }}</td>
                                                    <td class="text-right">@{{ decimales(element.total_saldo) }}</td>
                                                </tr>
                                                <tr
                                                    v-if="element.cuenta2 !== '' && element.saldo2 !== '' && element.total_saldo2 !=='' && element.cuenta2 !== null">
                                                    <td>(-)@{{ element.cuenta2 }}</td>
                                                    <td style="border-bottom: solid 2px"
                                                        class="text-right border-danger">
                                                        @{{ decimales(element.saldo2) }}</td>
                                                    <td class="text-right">@{{ decimales(element.total_saldo2) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="font-weight-bold" style="font-size: 20px;" width="2000">
                                                        TOTAL ACT. NO CORR.</td>
                                                    <td style="font-size: 20px;" class="badge-danger badge">
                                                        @{{ decimales(b_initotal.t_a_nocorriente) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="font-weight-bold" style="font-size: 20px;" width="2000">
                                                        TOTAL ACTIVO.</td>
                                                    <td style="font-size: 20px;" class="badge-danger badge">
                                                        @{{ decimales(balance_general.total_balance_inicial.t_activo) }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <h2 class="text-center font-weight-bold text-danger">PASIVOS</h2>
                                <div class="row">
                                    <div class="col-7 ">
                                        <h3 class="text-primary">PASIVOS CORRIENTE</h3>
                                        <draggable class="list-group list-group-flush"
                                            :list="balance_general.p_corrientes" group="people">
                                            <div v-for="(element, index) in balance_general.p_corrientes"
                                                :key="element.name">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    @{{ element.cuenta }}
                                                    <span class=" badge-pill">@{{ decimales(element.saldo) }}</span>
                                                </li>
                                            </div>
                                        </draggable>
                                    </div>
                                    <div class="col-12">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="font-weight-bold" style="font-size: 20px;" width="2000">
                                                        TOTAL PAS. CORR.</td>
                                                    <td style="font-size: 20px;" class="badge-danger badge">
                                                        @{{ decimales(b_initotal.t_p_corriente) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br><br>
                                    <div class="col-7 ">
                                        <h3 class="text-primary">NO CORRIENTE </h3>
                                        <draggable class="list-group list-group-flush"
                                            :list="balance_general.p_nocorrientes" group="people">
                                            <div v-for="(element, index) in balance_general.p_nocorrientes"
                                                :key="element.name">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    @{{ element.cuenta }}
                                                    <span class=" badge-pill">@{{ decimales(element.saldo) }}</span>
                                                </li>
                                            </div>
                                        </draggable>
                                    </div>
                                    <div class="col-12">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="font-weight-bold" style="font-size: 20px;" width="2000">
                                                        TOTAL PAS. CORR.</td>
                                                    <td style="font-size: 20px;" class="badge-danger badge">
                                                        @{{ decimales(b_initotal.t_p_no_corriente) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br><br>
                                    <div class="col-12">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="font-weight-bold" style="font-size: 20px;" width="2000">
                                                        TOTAL PASIVO</td>
                                                    <td style="font-size: 20px;" class="badge-danger badge">
                                                        @{{ decimales(balance_general.total_balance_inicial.t_pasivo) }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <h2 class="text-center font-weight-bold text-danger">PATRIMONIO </h2>
                                <div class="row">
                                    <div class="col-7">
                                        <draggable class="list-group list-group-flush"
                                            :list="balance_general.patrimonios" group="people">
                                            <div v-for="(element, index) in balance_general.patrimonios"
                                                :key="element.name">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    @{{ element.cuenta }}
                                                    <span class="badge-pill">@{{ decimales(element.saldo) }}</span>
                                                </li>
                                            </div>
                                        </draggable>
                                    </div>
                                    <div class="col-12">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="font-weight-bold" style="font-size: 20px;" width="2000">
                                                        TOTAL PATRIMONIO.</td>
                                                    <td style="font-size: 20px;" class="badge-danger badge">
                                                        @{{ decimales(b_initotal.t_patrimonio) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="font-weight-bold" style="font-size: 20px;" width="750">
                                                        TOT. PAS. Y PATRI.</td>
                                                    <td style="font-size: 20px;" class="badge-danger badge">
                                                        @{{ decimales(balance_general.total_balance_inicial.t_patrimonio_pasivo) }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-12 mt-2" v-if="diarios.debe.length > 0 || diarios.haber.length > 0"
                        style=" height:300px; overflow-y: scroll;">
                        <h2 class="text-center">ACTUALIZAR REGISTROS</h2>
                        <div class="row justify-content-end mb-2">
                            <a v-if="update" href="#" class="addDiario btn btn-success"
                                @click.prevent="updaterRegister()">Actualizar Transaccion</a>
                            <a v-if="!update" href="#" class="addDiario btn btn-success"
                                @click.prevent="guardarRegistro()">Agregar Transaccion</a>
                        </div>
                        <table class="table table-bordered table-sm">
                            <thead class="thead-dark">
                                <tr align="center">
                                    {{-- <th scope="col" width="200">FECHA</th> --}}
                                    <th scope="col" width="450">NOMBRE DE CUENTAS</th>
                                    <th scope="col " width="125">DEBE</th>
                                    <th scope="col">HABER</th>
                                    <th width="200" colspan="2"
                                        v-if="diarios.debe.length > 0 || diarios.haber.length > 0">ACCION</th>
                                </tr>
                            </thead>
                            <tbody is="draggable" group="people" :list="diarios.debe" tag="tbody" class="bg-light">
                                <tr v-for="(diar, index) in diarios.debe">
                                    {{-- <td align="center" width="100">@{{ diar.fecha}}</td> --}}
                                    <td>@{{ diar.nom_cuenta}}</td>
                                    <td class="text-right" width="125">@{{ decimales(diar.saldo) }}</td>
                                    <td class="text-right" width="125"></td>
                                    <td class="text-right" width="25">
                                        <a @click="debediairoEdit(index)" class="btn btn-warning btn-sm"><i
                                                class="fas fas fa-edit"></i></a>
                                    </td>
                                    <td align="center" width="25">
                                        <a @click="deleteDebe(index)" class="btn btn-danger btn-sm"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody is="draggable" group="people" :list="diarios.haber" tag="tbody" class="bg-light">
                                <tr v-for="(diar, index) in diarios.haber">
                                    {{-- <td align="center" width="50"></td> --}}
                                    <td style="padding-left:50px">@{{ diar.nom_cuenta}}</td>
                                    <td class="text-right" width="125"></td>
                                    <td class="text-right" width="125">@{{ decimales(diar.saldo) }}</td>
                                    <td class="text-right">
                                        <a @click="habediarioEdit(index)" class="btn btn-warning btn-sm"><i
                                                class="fas fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td align="center" width="25"><a @click="deleteHaber(index)"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a></td>
                                </tr>
                                <tr v-if="diarios.comentario !== ''" class="text-muted">
                                    {{-- <td></td> --}}
                                    <td>@{{ diarios.comentario }}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row justify-content-around mb-2">
                            <a v-if="update" href="#" class="addDiario btn btn-success"
                                @click.prevent="updaterRegister()">Actualizar Transaccion</a>
                            <a v-if="!update" href="#" class="addDiario btn btn-success"
                                @click.prevent="guardarRegistro()">Agregar Transaccion</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
{{-- KARDEX --}}
<div class="modal fade" id="kardex-diairo" tabindex="-1" role="dialog" aria-labelledby="kardex-diairo"
    aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h5 class="modal-title" id="kardex-diairo">KARDEX</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="float-left">
                    <select v-model="producto_id" class="custom-select" name="" id="" @change="obtenerKardexFifo()">
                        <option disabled selected value="">ELIGE UN PRODUCTO</option>
                        <option :value="1">COCINAS</option>
                        <option :value="2">AIRE ACONDICIONADO</option>
                        <option :value="3">MESA</option>
                    </select>
                </div><br><br>
                <h1 class="text-center font-weight-bold text-danger">KARDEX</h1>
                <h5 class="text-center font-weight-bold text-dark">METODO FIFO</h5>
                <h3 class="text-center font-weight-bold text-dark">@{{ nombre_kardex }}</h3><br>
                <h3 class="text-center font-weight-bold text-dark">@{{ producto_kardex }}</h3><br>
                <table class="table table-bordered table-responsive table-sm">
                    <thead class="bg-warning">
                        <tr class="text-center">
                            <th style="vertical-align:middle" rowspan="2" width="200">FECHA</th>
                            <th width="300" style="vertical-align:middle" rowspan="2">MOVIMIENTOS</th>
                            <th width="300" colspan="3">INGRESOS</th>
                            <th width="300" colspan="3">EGRESOS</th>
                            <th width="300" colspan="3">EXISTENCIA</th>
                            {{-- <th v-if="kardex.length >= 1" style="vertical-align:middle" rowspan="2" colspan="2">ACCIONES</th> --}}
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
                    <tbody v-for="(transa, index) in kardex" style="border-bottom: solid 3px #0F0101;">
                        <tr v-for="(exist, id) in transa">
                            <td style="vertical-align:middle">@{{ formatoFecha(exist.fecha) }}</td>
                            <td style="vertical-align:middle">@{{ exist.movimiento }}</td>
                            <td style="vertical-align:middle">@{{ exist.ingreso_cantidad }}</td>
                            <td style="vertical-align:middle">@{{ exist.ingreso_precio }}</td>
                            <td style="vertical-align:middle" class="text-right">@{{ exist.ingreso_total }}</td>
                            <td style="vertical-align:middle">@{{ exist.egreso_cantidad }}</td>
                            <td style="vertical-align:middle">@{{ exist.egreso_precio }}</td>
                            <td style="vertical-align:middle" class="text-right">@{{ exist.egreso_total }}</td>
                            <td style="vertical-align:middle">@{{ exist.existencia_cantidad }}</td>
                            <td style="vertical-align:middle">@{{ exist.existencia_precio }}</td>
                            <td style="vertical-align:middle" class="text-right">@{{ exist.existencia_total }}</td>
                            {{-- <td style="vertical-align:middle"  v-if="kardex.length >= 1 && kardex[index][id].tipo == 'ingreso' || kardex[index][id].tipo == 'inicial' || kardex[index][id].tipo == 'egreso' || kardex[index][id].tipo == 'ingreso_venta' || kardex[index][id].tipo == 'egreso_compra'"><a class="btn btn-sm btn-warning" href="" @click.prevent="editarTransaccion(index, id)"><i class="fas fa-edit"></i></a></td>
        <td style="vertical-align:middle"  v-if="kardex.length >= 1 && kardex[index][id].tipo == 'ingreso'  || kardex[index][id].tipo == 'egreso' || kardex[index][id].tipo == 'inicial'||  kardex[index][id].tipo == 'ingreso_venta' || kardex[index][id].tipo == 'egreso_compra'"><a class="btn btn-sm btn-danger" href="" @click.prevent="borrarTransaccion(index, id)"><i class="fas fa-trash"></i></a></td>
        <td style="vertical-align:middle"  v-else colspan="2"></td> --}}
                        </tr>
                    </tbody>
                    {{--     <tbody>
      <tr class="bg-secondary">
        <td></td>
        <td class="font-weight-bold text-danger">SUMAN</td>
        <td>@{{ suman.ingreso_cantidad }}</td>
                    <td></td>
                    <td class="text-right">@{{ suman.ingreso_total }}</td>
                    <td>@{{ suman.egreso_cantidad }}</td>
                    <td></td>
                    <td class="text-right">@{{ suman.egreso_total }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>
                    </tbody> --}}
                </table>
            </div>
        </div>
    </div>
</div>
{{-- PASIVOS --}}
<div class="modal fade" id="haber" tabindex="-1" role="dialog" aria-labelledby="haberLabel" aria-hidden="true">
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
                                    <th align="center" class="text-center">Cuentas</th>
                                    <th align="center" class="text-center">Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                    <td width="125"><input autocomplete="ÑÖcompletes" type="number"
                                            v-model="diario.haber.saldo" name="haber" class="form-control" required>
                                    </td>
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
<div class="modal fade" id="debe" tabindex="-1" role="dialog" aria-labelledby="debeLabel" aria-hidden="true">
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
                                    <th v-if="diarios.debe.length == 0 && edit.debe.length == 0" width="50">Fecha</th>
                                    <th align="center" class="text-center">Cuentas</th>
                                    <th align="center" class="text-center">Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td v-if="diarios.debe.length == 0 && edit.debe.length == 0" width="50"> <input
                                            autocomplete="ÑÖcompletes" type="date" name="fecha"
                                            v-model="diario.debe.fecha" class="form-control" required></td>
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
                                    <td width="125"><input autocomplete="ÑÖcompletes" type="number"
                                            v-model="diario.debe.saldo" name="debe" class="form-control"></td>
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
<div class="modal fade" id="comentario" tabindex="-1" role="dialog" aria-labelledby="haberLabel" aria-hidden="true">
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
                                    <th align="center" class="text-center">Comentario</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="125"><input autocomplete="ÑÖcompletes" type="text"
                                            v-model="diario.comentario" name="comentario" class="form-control" required>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div v-if="edit.debe.length >= 1" class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="comentarioUpdate()">Editar Comentario</a>
                        </div>
                        <div v-else class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="agregarComentario()">Agregar
                                Comentario</a>
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
<div class="modal fade" id="haber_a" tabindex="-1" role="dialog" aria-labelledby="haberLabel" aria-hidden="true">
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
                                    <th align="center" class="text-center">Cuentas</th>
                                    <th align="center" class="text-center">Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                    <td width="125"><input autocomplete="ÑÖcompletes" type="number"
                                            v-model="diario.haber.saldo" name="haber" class="form-control" required>
                                    </td>
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
<div class="modal fade" id="debe_a" tabindex="-1" role="dialog" aria-labelledby="debeLabel" aria-hidden="true">
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
                                    <th v-if="diario.fecha != ''" width="50">Fecha</th>
                                    <th align="center" class="text-center">Cuentas</th>
                                    <th align="center" class="text-center">Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td v-if="diario.fecha != ''" width="50"> <input autocomplete="ÑÖcompletes"
                                            type="date" name="fecha" v-model="diario.debe.fecha" class="form-control"
                                            required></td>
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
                                    <td width="125"><input autocomplete="ÑÖcompletes" type="number"
                                            v-model="diario.debe.saldo" name="debe" class="form-control"></td>
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
<div class="modal fade" id="haber_d" tabindex="-1" role="dialog" aria-labelledby="haberLabel" aria-hidden="true">
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
                                    <th align="center" class="text-center">Cuentas</th>
                                    <th align="center" class="text-center">Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                    <td width="125"><input autocomplete="ÑÖcompletes" type="number"
                                            v-model="diario.haber.saldo" name="haber" class="form-control" required>
                                    </td>
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
<div class="modal fade" id="debe_d" tabindex="-1" role="dialog" aria-labelledby="debeLabel" aria-hidden="true">
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
                                    <th v-if="diario.debe.fecha != ''" width="50">Fecha</th>
                                    <th align="center" class="text-center">Cuentas</th>
                                    <th align="center" class="text-center">Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td v-if="diario.debe.fecha != ''" width="50"> <input autocomplete="ÑÖcompletes"
                                            type="date" name="fecha" v-model="diario.debe.fecha" class="form-control"
                                            required></td>
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
                                    <td width="125"><input autocomplete="ÑÖcompletes" type="number"
                                            v-model="diario.debe.saldo" name="debe" class="form-control"></td>
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
<div class="modal fade" id="porcentajes" tabindex="-1" role="dialog" aria-labelledby="debeLabel" aria-hidden="true">
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
                                    <th v-if="diario.debe.fecha != ''" width="50">Fecha</th>
                                    <th align="center" class="text-center">Cuentas</th>
                                    <th align="center" class="text-center">Tipo</th>
                                    <th align="center" class="text-center">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{--   <td v-if="diario.debe.fecha != ''" width="50" > <input autocomplete="ÑÖcompletes" type="date" name="fecha" v-model="diario.debe.fecha" class="form-control" required>
            </td> --}}
                                    <td>
                                        <select name="n_cuenta" v-model="porcentajes.index_cuenta"
                                            class="custom-select">
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
                                        <input autocomplete="ÑÖcompletes" type="number" v-model="porcentajes.cantidad"
                                            name="debe" class="form-control">
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