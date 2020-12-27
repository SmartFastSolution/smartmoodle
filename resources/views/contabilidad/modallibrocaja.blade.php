<div class="modal fade" data-backdrop="static" data-keyboard="false" id="libro-caja" tabindex="-1" role="dialog"
    aria-labelledby="bc-transaccionLabel" aria-hidden="true">
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
                        <h2 class="text-center">AGREGAR TRANSACCIÓN</h2>
                        <table class="table table-bordered table-sm mb-2">
                            <thead class="bg-success">
                                <tr>
                                    <th width="50" align="center">fecha</th>
                                    <th width="250" align="center" class="text-center">Detalle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="date" name="fecha" v-model="caja.fecha"
                                            class="form-control text-center" required>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" v-model="caja.detalle"
                                            placeholder="Detalle">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered table-sm mb-2">
                            <thead class="bg-success">
                                <tr>
                                    <th width="50" align="center">Debe</th>
                                    <th width="50" align="center" class="text-center">Haber</th>
                                    <th width="50" align="center" class="text-center">Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="number" class="form-control" v-model="caja.debe"
                                            placeholder="Debe">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" v-model="caja.haber"
                                            placeholder="Haber">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" v-model="caja.saldo"
                                            placeholder="Saldo">
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div v-if="!caja.edit" class="row justify-content-center">
                            <a href="#" class="btn btn-success" @click.prevent="agregarRegistro()">Agregar</a>

                        </div>
                        <div v-else class="row justify-content-center">
                            <a href="#" class="btn btn-success" @click.prevent="actualizarLibroCaja()">Actualizar</a>
                            <a href="#" class="btn btn-danger ml-1" @click.prevent="cancelarEditlibro()"><i
                                    class="fa fa-window-close"></i></a>
                        </div>
                    </div>

                    <div class="col-6" style=" height:400px; overflow-y: scroll;">
                        <h2 class="text-center">TRANSACCIONES</h2>

                        <p>
                            Se compra s/fra. #040 a Importadora “ELMARY” (contribuyente especial) - doce
                            acondicionadores de aire en $ 550 c/u. Se cancela con ch/.# 050 Bco. Guayaquil. <br> <br>
                            Se cancela la Fra.#023 a “Publicitas” (No Obligada a llevar Contabilidad) por servicios de
                            publicidad $ 300 con ch/.#051 Bco. Guayaquil. <br> <br>

                            Se vende S/. Fra. # 010 - cincuenta acondicionadores de aire en $ 1.200 c/u a Comercial
                            “Felipao” (Obligado a llevar Contabilidad). Nos cancela con ch/. #082 Bco. Austro. <br> <br>

                            Se deposita en cta. cte.# 3050 Bco. Guayaquil $ 60.000 <br> <br>

                            Se cancela la Fra.#088 a “Servinet” (No Obligada a llevar Contabilidad) por servicios de
                            internet $ 60 con ch/.#052 Bco. Guayaquil. <br> <br>

                            Se compra s/fra. # 056 a Importadora “CASIRON” (contribuyente especial) - diez
                            acondicionadores de aire en $ 555 c/u. con ch/.# 053 Bco. Guayaquil. <br> <br>

                            De la última compra se devuelve dos acondicionadores de aire por no estar de acuerdo con el
                            pedido (Fra. # 011). <br> <br>

                            Se cancela a “CNT” la Fra. #073 por servicio telefónico $ 150 con ch/.# 054 Bco. Guayaquil.
                            <br> <br>

                            Se vende S/Fra. #012 - treinta acondicionadores de aire en $ 1.200 c/u a Comercial “INCOR”
                            (Obligado a llevar Contabilidad). Se recibe ch/. #101 Bco. del Austro. <br> <br>

                            De la última venta nos devuelven un acondicionador de aire por no estar de acuerdo con el
                            pedido. Se cancela con ch/.#055 Bco. Guayaquil. (Fra. # 057) <br> <br>
                        </p>
                    </div>
                    <div class="col-12 mt-2" v-if="libros_caja.length > 0">
                        <h2 class="text-center">REGISTROS</h2>

                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr class="text-center bg-dark">
                                    <th width="100">Fecha</th>
                                    <th width="300">Detalle</th>
                                    <th width="100">Debe</th>
                                    <th width="100">Haber</th>
                                    <th width="100">Saldo</th>
                                    <th class="text-center" v-if="libros_caja.length >=1" colspan="2">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody is="draggable" group="people" :list="libros_caja" tag="tbody">
                                <tr v-for="(caja, index) in libros_caja">
                                    <td align="left">@{{formatoFecha(caja.fecha)}}</td>
                                    <td align="left">@{{caja.detalle}}</td>
                                    <td align="right">@{{decimales( caja.debe)}}</td>
                                    <td align="right">@{{decimales(caja.haber)}}</td>
                                    <td align="right">@{{decimales(caja.saldo)}}</td>
                                    <td align="center" width="50">
                                        <a @click.prevent="WarningEliminarLibro(index)" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                    <td align="center" width="50">
                                        <a @click.prevent="editLibroCaja(index)" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="eliminar-libro" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="eliminar-libroLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminar-libroLabel">Eliminar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseas eliminar el registro  @{{ eliminar.nombre }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" @click="eliminarCompra()">Eliminar</button>
            </div>
        </div>
    </div>
</div>