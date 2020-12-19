{{-- AGREGAR SALDO--}}
<div class="modal fade" id="ar_saldos" tabindex="-1" role="dialog" aria-labelledby="taller1Label" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-primary">
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
                                    <th align="center" class="text-center">Debe</th>
                                    <th align="center" class="text-center">Haber</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" v-model="saldo.detalle" name="detalle" class="form-control"
                                            required></td>
                                    <td width="125"><input type="number" v-model="saldo.s_debe" name="s_debe"
                                            class="form-control" required></td>
                                    <td width="125"><input type="number" v-model="saldo.s_haber" name="s_haber"
                                            class="form-control" required></td>
                                          
                                </tr>
                            </tbody>
                        </table>
                        <div class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="agregarsaldo()">Agregar
                               Saldo</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- AGREGAR EXISTENCIAS--}}

<div class="modal fade" id="ar_existencias" tabindex="-1" role="dialog" aria-labelledby="taller1Label" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h5 class="modal-title" id="taller1Label">EXISTENCIAS</h5>
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
                                    <th align="center" class="text-center">Debe</th>
                                    <th align="center" class="text-center">Haber</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" v-model="exis.detalle" name="detalle" class="form-control"
                                            required></td>
                                    <td width="125"><input type="number" v-model="exis.e_debe" name="e_debe"
                                            class="form-control" required></td>
                                    <td width="125"><input type="number" v-model="exis.e_haber" name="e_haber"
                                            class="form-control" required></td>

                                </tr>
                            </tbody>
                        </table>
                        <div class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="agregarExistencia()">Agregar
                                Existencias</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- EDITAR SALDO--}}
<div class="modal fade" id="ed_saldos" tabindex="-1" role="dialog" aria-labelledby="taller1Label" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-primary">
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
                                    <th align="center" class="text-center">Debe</th>
                                    <th align="center" class="text-center">Haber</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" v-model="saldo.detalle" name="detalle" class="form-control"
                                            required></td>
                                    <td width="125"><input type="number" v-model="saldo.s_debe" name="s_debe"
                                            class="form-control" required></td>
                                    <td width="125"><input type="number" v-model="saldo.s_haber" name="s_haber"
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


{{-- EDITAR EXISTENCIAS--}}

<div class="modal fade" id="ed_exis" tabindex="-1" role="dialog" aria-labelledby="taller1Label" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h5 class="modal-title" id="taller1Label">EXISTENCIAS</h5>
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
                                    <th align="center" class="text-center">Debe</th>
                                    <th align="center" class="text-center">Haber</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" v-model="exis.detalle" name="detalle" class="form-control"
                                            required></td>
                                    <td width="125"><input type="number" v-model="exis.e_debe" name="e_debe"
                                            class="form-control" required></td>
                                    <td width="125"><input type="number" v-model="exis.e_haber" name="e_haber"
                                            class="form-control" required></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row justify-content-center">
                            <a href="#" class="btn btn-light" @click.prevent="updateExis()">Actualizar
                                Existencias</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
