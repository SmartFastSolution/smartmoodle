{{-- AGREGAR SALDO--}}
<div class="modal fade" id="c_saldos" tabindex="-1" role="dialog" aria-labelledby="taller1Label" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="taller1Label">SALDO</h5>
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
                                    <th align="center" class="text-center">Detalle</th>
                                    <th align="center" class="text-center">Valor</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" v-model="saldo.detalle" name="detalle" class="form-control"
                                            required></td>
                                    <td width="125"><input type="number" v-model="saldo.saldo" name="saldo"
                                            class="form-control" required></td>                                     
                                </tr>
                            </tbody>
                        </table>
                        <div class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="agregarSaldo()">Agregar
                               Saldo</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- AGREGAR DEBITO--}}
<div class="modal fade" id="c_debitos" tabindex="-1" role="dialog" aria-labelledby="taller1Label" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="taller1Label">DEBITO</h5>
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
                                    <th align="center" class="text-center">Detalle</th>
                                    <th align="center" class="text-center">Valor</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" v-model="debito.detalle" name="detalle" class="form-control"
                                            required></td>
                                    <td width="125"><input type="number" v-model="debito.saldo" name="saldo"
                                            class="form-control" required></td>                                     
                                </tr>
                            </tbody>
                        </table>
                        <div class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="agregarDebitos()">Agregar
                               Debito</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- AGREGAR CREDITO--}}
<div class="modal fade" id="c_creditos" tabindex="-1" role="dialog" aria-labelledby="taller1Label" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="taller1Label">CREDITO</h5>
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
                                    <th align="center" class="text-center">Detalle</th>
                                    <th align="center" class="text-center">Valor</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" v-model="credito.detalle" name="detalle" class="form-control"
                                            required></td>
                                    <td width="125"><input type="number" v-model="credito.saldo" name="saldo"
                                            class="form-control" required></td>                                     
                                </tr>
                            </tbody>
                        </table>
                        <div class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="agregarCreditos()">Agregar
                               Credito</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- AGREGAR CHEQUE--}}
<div class="modal fade" id="c_cheques" tabindex="-1" role="dialog" aria-labelledby="taller1Label" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="taller1Label">CHEQUE</h5>
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
                                    <th align="center" class="text-center">Detalle</th>
                                    <th align="center" class="text-center">Valor</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" v-model="cheques.detalle" name="detalle" class="form-control"
                                            required></td>
                                    <td width="125"><input type="number" v-model="cheques.saldo" name="saldo"
                                            class="form-control" required></td>                                     
                                </tr>
                            </tbody>
                        </table>
                        <div class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="agregarCheques()">Agregar
                               Cheque</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- /////////////////////////////////////////////////////////////////////EDITAR CONCILIACION BANCARIA//////////////////////////////////////////////////////// -->

{{-- EDITAR SALDO--}}
<div class="modal fade" id="conciliacion_saldos" tabindex="-1" role="dialog" aria-labelledby="taller1Label" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="taller1Label">SALDO</h5>
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
                                    <th align="center" class="text-center">Detalle</th>
                                    <th align="center" class="text-center">Valor</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" v-model="saldo.detalle" name="detalle" class="form-control"
                                            required></td>
                                    <td width="125"><input type="number" v-model="saldo.saldo" name="saldo"
                                            class="form-control" required></td>                                     
                                </tr>
                            </tbody>
                        </table>
                        <div class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="updateSaldo()">Actualizar
                               Saldo</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- EDITAR DEBITO--}}
<div class="modal fade" id="conciliacion_debitos" tabindex="-1" role="dialog" aria-labelledby="taller1Label" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h5 class="modal-title" id="taller1Label">DEBITO</h5>
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
                                    <th align="center" class="text-center">Detalle</th>
                                    <th align="center" class="text-center">Valor</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" v-model="debito.detalle" name="detalle" class="form-control"
                                            required></td>
                                    <td width="125"><input type="number" v-model="debito.saldo" name="saldo"
                                            class="form-control" required></td>                                     
                                </tr>
                            </tbody>
                        </table>
                        <div class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="updateDebitos()">Actualizar
                               Debito</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- EDITAR CREDITO--}}
<div class="modal fade" id="conciliacion_creditos" tabindex="-1" role="dialog" aria-labelledby="taller1Label" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="taller1Label">CREDITO</h5>
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
                                    <th align="center" class="text-center">Detalle</th>
                                    <th align="center" class="text-center">Valor</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" v-model="credito.detalle" name="detalle" class="form-control"
                                            required></td>
                                    <td width="125"><input type="number" v-model="credito.saldo" name="saldo"
                                            class="form-control" required></td>                                     
                                </tr>
                            </tbody>
                        </table>
                        <div class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="updateCreditos()">Actualizar
                               Credito</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- EDITAR CHEQUE--}}
<div class="modal fade" id="conciliacion_cheques" tabindex="-1" role="dialog" aria-labelledby="taller1Label" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="taller1Label">CHEQUE</h5>
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
                                    <th align="center" class="text-center">Detalle</th>
                                    <th align="center" class="text-center">Valor</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" v-model="cheques.detalle" name="detalle" class="form-control"
                                            required></td>
                                    <td width="125"><input type="number" v-model="cheques.saldo" name="saldo"
                                            class="form-control" required></td>                                     
                                </tr>
                            </tbody>
                        </table>
                        <div class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="updateCheques()">Actualizar
                               Cheque</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
