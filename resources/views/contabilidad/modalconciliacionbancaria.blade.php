<div class="modal fade" data-backdrop="static" data-keyboard="false" id="conciliacion-bancaria" tabindex="-1"
    role="dialog" aria-labelledby="bg-transaccionLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl " role="document">
        <div class="modal-content bg-light">
            <div class="modal-header">
                <div v-if="update">
                    <h5 class="modal-title" id="er-ingresoLabel">ACTUALIZAR CUENTAS</h5>
                </div>
                <div v-else="!update">
                    <h5 class="modal-title" id="ba-transaccionLabel">AGREGAR TRANSACCIONES</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">


                        <nav>
                            <div style="font-size: 15px" class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="nav-bih-conciliacion-saldo-tab" data-toggle="tab"
                                    href="#nav-bih-conciliacion-saldo" role="tab"
                                    aria-controls="nav-bih-conciliacion-saldo" aria-selected="true">SALDOS</a>

                                <a class="nav-link" id="nav-bih-conciliacion-debito-tab" data-toggle="tab"
                                    href="#nav-bih-conciliacion-debito" role="tab"
                                    aria-controls="nav-bih-conciliacion-debito" aria-selected="false">DÉBITOS</a>

                                <a class="nav-link" id="nav-bih-conciliacion-credito-tab" data-toggle="tab"
                                    href="#nav-bih-conciliacion-credito" role="tab"
                                    aria-controls="nav-bih-conciliacion-credito" aria-selected="false">CRÉDITOS</a>

                                <a class="nav-link" id="nav-bih-conciliacion-cheque-tab" data-toggle="tab"
                                    href="#nav-bih-conciliacion-cheque" role="tab"
                                    aria-controls="nav-bih-conciliacion-cheque" aria-selected="false">CHEQUES</a>
                                <a class="nav-link bg-dark mb-2" href="" @click.prevent="calculadora()">CALCULADORA</a>

                            </div>
                        </nav>

                        <div class="tab-content" id="nav-tabContent">

                            <!-- saldos -->
                            <div class="tab-pane fade show active" id="nav-bih-conciliacion-saldo" role="tabpanel"
                                aria-labelledby="nav-bih-conciliacion-saldo-tab">

                                <div class="row">
                                    <div class="col-6">
                                        <h2 class="text-center">AGREGAR SALDO</h2>
                                        <table class="table table-bordered table-sm">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th align="center" class="text-center" width="50">Fecha</th>
                                                    <th align="center" class="text-center">Detalle</th>
                                                    <th align="center" class="text-center">Valor</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input class="form-control" type="date" v-model="saldo.fecha"
                                                            placeholder="Agrega la fecha" name="">
                                                    </td>

                                                    <td><input type="text" v-model="saldo.detalle" name="detalle"
                                                            class="form-control" required></td>
                                                    <td width="125"><input type="number" v-model="saldo.saldo"
                                                            name="saldo" class="form-control" required></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div v-if="!saldo.edit" class="row justify-content-center">
                                            <a href="#" class="btn btn-success"
                                                @click.prevent="agregarSaldo()">Agregar</a>
                                        </div>
                                        <div v-else class="row justify-content-center">
                                            <a href="#" class="btn btn-success"
                                                @click.prevent="actualizarSaldo()">Actualizar</a>
                                            <a href="#" class="btn btn-danger ml-1"
                                                @click.prevent="cancelarEditSaldo()"><i
                                                    class="fa fa-window-close"></i></a>
                                        </div>


                                    </div>
                                    <!-- fin del div col-6 -->
                                    @if($datos->metodo == 'individual')
                                    <div class="col-6"
                                        style=" height:300px; overflow-y: scroll; overflow-x: hidden; border: double 4px red;">
                                        {!! $transacciones->transacciones !!}
                                    </div>
                                    @elseif($datos->metodo == 'concatenado')
                                    <div class="col-6 mt-2 "
                                        style=" height:400px; overflow-y: scroll; border: solid 3px red;">
                                        <h2 class="text-center  font-weight-bold text-danger">Anexos de Control Interno
                                        </h2>
                                        <h3 class="text-center font-weight-bold text-danger">Libro Banco</h3>

                                        <div class="row p-3  mb-2 justify-content-center ">
                                            <div class="col-5">
                                                <h5 class="font-weight-bold">@{{ lb_nombre }}</h5>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <h5 class="font-weight-bold">@{{ lb_n_banco }}</h5>
                                            </div>
                                            <div class="col">
                                                <h5 class="font-weight-bold">@{{ lb_c_banco }}</h5>
                                            </div>
                                        </div>
                                        <br>

                                        <table style="border: hidden" class="table table-bordered table-sm mb-2">
                                            <thead style="border: hidden">
                                                <tr style="border: hidden" class="text-center bg-dark">
                                                    <th width="100">Fecha</th>
                                                    <th width="300">Detalle</th>
                                                    <th width="50"><i>Ch/</i></th>
                                                    <th width="90">Debe</th>
                                                    <th width="90">Haber</th>
                                                    <th width="100">Saldo</th>
                                                </tr>
                                            </thead>
                                            <tbody style="border: hidden" is="draggable" group="people" :list="lb_banco"
                                                tag="tbody">
                                                <tr style="border: hidden" v-for="(banco, index) in lb_banco">
                                                    <td align="left">@{{formatoFecha(banco.fecha)}}</td>
                                                    <td align="left">@{{banco.detalle}}</td>
                                                    <td align="left">@{{banco.cheque}}</td>
                                                    <td align="right">@{{decimales(banco.debe)}}</td>
                                                    <td align="right">@{{decimales(banco.haber)}}</td>
                                                    <td align="right">@{{decimales(banco.saldo)}}</td>
                                                </tr>
                                                {{-- 
                    <tr style="border: hidden" class="bg-secondary">
                        <td class="text-center font-weight-bold">SUMAN</td>
                        <td class="text-left font-weight-bold"></td>
                        <td class="text-left font-weight-bold"></td>
                        <td class="text-right font-weight-bold">@{{ suman.debe }}</td>
                                                <td class="text-right font-weight-bold">@{{ suman.haber }}</td>
                                                </tr> --}}
                                            </tbody>
                                        </table>

                                    </div>
                                    @endif
                                    <!-- fin del div col-6 mt-2-->
                                    <div class="col-12 mt-2 p-2" style=" height:400px; overflow-y: scroll;">
                                        <h2 class="text-center">SALDO</h2>
                                        <div class="row justify-content-around mb-2">
                                            <table class="table table-bordered table-sm mb-2 p-2">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th align="center" class="text-center" width="150">Fecha</th>
                                                        <th align="center" class="text-center">Detalle</th>
                                                        <th align="center" class="text-center">Valor</th>

                                                    </tr>
                                                </thead>
                                                <tbody is="draggable" group="people" :list="c_saldos" tag="tbody">
                                                    <tr v-for="(s, index) in c_saldos">
                                                        <td align="center">@{{formatoFecha(s.fecha)}}</td>
                                                        <td align="center">@{{ s.detalle}}</td>
                                                        <td class="text-right">@{{ decimales(s.saldo)}}</td>
                                                        <td align="center" width="50">
                                                            <a @click.prevent="editSaldo(index)"
                                                                class="btn btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </td>
                                                        <td align="center" width="50">
                                                            <a @click.prevent="EliminarSaldo(index)"
                                                                class="btn btn-danger">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end saldos -->
                            <!-- debitos -->
                            <div class="tab-pane fade" id="nav-bih-conciliacion-debito" role="tabpanel"
                                aria-labelledby="nav-bih-conciliacion-debito-tab">
                                <div class="row">
                                    <div class="col-6">
                                        <h2 class="text-center">AGREGAR DÉBITOS</h2>
                                        <table class="table table-bordered table-sm">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th align="center" class="text-center" width="100">Fecha</th>
                                                    <th align="center" class="text-center">Detalle</th>
                                                    <th align="center" class="text-center">Valor</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input class="form-control" type="date" v-model="debito.fecha"
                                                            placeholder="Agrega la fecha" name="">
                                                    </td>
                                                    <td><input type="text" v-model="debito.detalle" name="detalle"
                                                            class="form-control" required></td>
                                                    <td width="125"><input type="number" v-model="debito.saldo"
                                                            name="saldo" class="form-control" required></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div v-if="!debito.edit" class="row justify-content-center">
                                            <a href="#" class="btn btn-success"
                                                @click.prevent="agregarDebitos()">Agregar</a>
                                        </div>
                                        <div v-else class="row justify-content-center">
                                            <a href="#" class="btn btn-success"
                                                @click.prevent="actualizarDebito()">Actualizar</a>
                                            <a href="#" class="btn btn-danger ml-1"
                                                @click.prevent="cancelarEditDebito()"><i
                                                    class="fa fa-window-close"></i></a>
                                        </div>
                                    </div>
                                    @if($datos->metodo == 'individual')
                                    <div class="col-6"
                                        style=" height:300px; overflow-y: scroll; overflow-x: hidden; border: double 4px red;">
                                        {!! $transacciones->transacciones !!}
                                    </div>
                                    @elseif($datos->metodo == 'concatenado')
                                    <div class="col-6 mt-2 "
                                        style=" height:400px; overflow-y: scroll; border: solid 3px red;">
                                        <h2 class="text-center  font-weight-bold text-danger">Anexos de Control Interno
                                        </h2>
                                        <h3 class="text-center font-weight-bold text-danger">Libro Banco</h3>

                                        <div class="row p-3  mb-2 justify-content-center ">
                                            <div class="col-5">
                                                <h5 class="font-weight-bold">@{{ lb_nombre }}</h5>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <h5 class="font-weight-bold">@{{ lb_n_banco }}</h5>
                                            </div>
                                            <div class="col">
                                                <h5 class="font-weight-bold">@{{ lb_c_banco }}</h5>
                                            </div>
                                        </div>
                                        <br>

                                        <table style="border: hidden" class="table table-bordered table-sm mb-2">
                                            <thead style="border: hidden">
                                                <tr style="border: hidden" class="text-center bg-dark">
                                                    <th width="100">Fecha</th>
                                                    <th width="300">Detalle</th>
                                                    <th width="50"><i>Ch/</i></th>
                                                    <th width="90">Debe</th>
                                                    <th width="90">Haber</th>
                                                    <th width="100">Saldo</th>
                                                </tr>
                                            </thead>
                                            <tbody style="border: hidden" is="draggable" group="people" :list="lb_banco"
                                                tag="tbody">
                                                <tr style="border: hidden" v-for="(banco, index) in lb_banco">
                                                    <td align="left">@{{formatoFecha(banco.fecha)}}</td>
                                                    <td align="left">@{{banco.detalle}}</td>
                                                    <td align="left">@{{banco.cheque}}</td>
                                                    <td align="right">@{{decimales(banco.debe)}}</td>
                                                    <td align="right">@{{decimales(banco.haber)}}</td>
                                                    <td align="right">@{{decimales(banco.saldo)}}</td>
                                                </tr>
                                                {{-- 
                    <tr style="border: hidden" class="bg-secondary">
                        <td class="text-center font-weight-bold">SUMAN</td>
                        <td class="text-left font-weight-bold"></td>
                        <td class="text-left font-weight-bold"></td>
                        <td class="text-right font-weight-bold">@{{ suman.debe }}</td>
                                                <td class="text-right font-weight-bold">@{{ suman.haber }}</td>
                                                </tr> --}}
                                            </tbody>
                                        </table>

                                    </div> @endif

                                    <div class="col-12 mt-2 p-2" style=" height:400px; overflow-y: scroll;">
                                        <h2 class="text-center">DÉBITOS</h2>
                                        <div class="row justify-content-around mb-2">
                                            <table class="table table-bordered table-sm mb-2 p-2">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th align="center" class="text-center" width="150">Fecha</th>
                                                        <th align="center" class="text-center">Detalle</th>
                                                        <th align="center" class="text-center">Valor</th>

                                                    </tr>
                                                </thead>
                                                <tbody is="draggable" group="people" :list="c_debitos" tag="tbody">
                                                    <tr v-for="(d, index) in c_debitos">
                                                        <td align="center">@{{formatoFecha(d.fecha)}}</td>
                                                        <td align="center">@{{ d.detalle}}</td>
                                                        <td class="text-right">@{{ decimales(d.saldo)}}</td>
                                                        <td align="center" width="50">
                                                            <a @click.prevent="editDebito(index)"
                                                                class="btn btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </td>
                                                        <td align="center" width="50">
                                                            <a @click.prevent="EliminarDebito(index)"
                                                                class="btn btn-danger">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end debitos -->
                            <!-- creditos -->
                            <div class="tab-pane fade " id="nav-bih-conciliacion-credito" role="tabpanel"
                                aria-labelledby="nav-bih-conciliacion-credito-tab">

                                <div class="row">
                                    <div class="col-6">
                                        <h2 class="text-center">AGREGAR CRÉDITO</h2>
                                        <table class="table table-bordered table-sm">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th align="center" class="text-center" width="50">Fecha</th>
                                                    <th align="center" class="text-center">Detalle</th>
                                                    <th align="center" class="text-center">Valor</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input class="form-control" type="date" v-model="credito.fecha"
                                                            placeholder="Agrega la fecha" name="">
                                                    </td>
                                                    <td><input type="text" v-model="credito.detalle" name="detalle"
                                                            class="form-control" required></td>
                                                    <td width="125"><input type="number" v-model="credito.saldo"
                                                            name="saldo" class="form-control" required></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div v-if="!credito.edit" class="row justify-content-center">
                                            <a href="#" class="btn btn-success"
                                                @click.prevent="agregarCreditos()">Agregar</a>
                                        </div>
                                        <div v-else class="row justify-content-center">
                                            <a href="#" class="btn btn-success"
                                                @click.prevent="actualizarCredito()">Actualizar</a>
                                            <a href="#" class="btn btn-danger ml-1"
                                                @click.prevent="cancelarEditCredito()"><i
                                                    class="fa fa-window-close"></i></a>
                                        </div>
                                    </div>

                                    @if($datos->metodo == 'individual')
                                    <div class="col-6"
                                        style=" height:300px; overflow-y: scroll; overflow-x: hidden; border: double 4px red;">
                                        {!! $transacciones->transacciones !!}
                                    </div>
                                    @elseif($datos->metodo == 'concatenado')
                                    <div class="col-6 mt-2 "
                                        style=" height:400px; overflow-y: scroll; border: solid 3px red;">
                                        <h2 class="text-center  font-weight-bold text-danger">Anexos de Control Interno
                                        </h2>
                                        <h3 class="text-center font-weight-bold text-danger">Libro Banco</h3>

                                        <div class="row p-3  mb-2 justify-content-center ">
                                            <div class="col-5">
                                                <h5 class="font-weight-bold">@{{ lb_nombre }}</h5>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <h5 class="font-weight-bold">@{{ lb_n_banco }}</h5>
                                            </div>
                                            <div class="col">
                                                <h5 class="font-weight-bold">@{{ lb_c_banco }}</h5>
                                            </div>
                                        </div>
                                        <br>

                                        <table style="border: hidden" class="table table-bordered table-sm mb-2">
                                            <thead style="border: hidden">
                                                <tr style="border: hidden" class="text-center bg-dark">
                                                    <th width="100">Fecha</th>
                                                    <th width="300">Detalle</th>
                                                    <th width="50"><i>Ch/</i></th>
                                                    <th width="90">Debe</th>
                                                    <th width="90">Haber</th>
                                                    <th width="100">Saldo</th>
                                                </tr>
                                            </thead>
                                            <tbody style="border: hidden" is="draggable" group="people" :list="lb_banco"
                                                tag="tbody">
                                                <tr style="border: hidden" v-for="(banco, index) in lb_banco">
                                                    <td align="left">@{{formatoFecha(banco.fecha)}}</td>
                                                    <td align="left">@{{banco.detalle}}</td>
                                                    <td align="left">@{{banco.cheque}}</td>
                                                    <td align="right">@{{decimales(banco.debe)}}</td>
                                                    <td align="right">@{{decimales(banco.haber)}}</td>
                                                    <td align="right">@{{decimales(banco.saldo)}}</td>
                                                </tr>
                                                {{-- 
                    <tr style="border: hidden" class="bg-secondary">
                        <td class="text-center font-weight-bold">SUMAN</td>
                        <td class="text-left font-weight-bold"></td>
                        <td class="text-left font-weight-bold"></td>
                        <td class="text-right font-weight-bold">@{{ suman.debe }}</td>
                                                <td class="text-right font-weight-bold">@{{ suman.haber }}</td>
                                                </tr> --}}
                                            </tbody>
                                        </table>

                                    </div> @endif
                                    <div class="col-12 mt-2 p-2" style=" height:400px; overflow-y: scroll;">
                                        <h2 class="text-center">CRÉDITOS</h2>
                                        <div class="row justify-content-around mb-2">
                                            <table class="table table-bordered table-sm mb-2 p-2">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th align="center" class="text-center" width="150">Fecha</th>
                                                        <th align="center" class="text-center">Detalle</th>
                                                        <th align="center" class="text-center">Valor</th>

                                                    </tr>
                                                </thead>
                                                <tbody is="draggable" group="people" :list="c_creditos" tag="tbody">
                                                    <tr v-for="(c, index) in c_creditos">
                                                        <td align="center">@{{formatoFecha(c.fecha)}}</td>
                                                        <td align="center">@{{ c.detalle}}</td>
                                                        <td class="text-right">@{{ decimales(c.saldo)}}</td>
                                                        <td align="center" width="50">
                                                            <a @click.prevent="editCredito(index)"
                                                                class="btn btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </td>
                                                        <td align="center" width="50">
                                                            <a @click.prevent="EliminarCredito(index)"
                                                                class="btn btn-danger">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end creditos -->
                            <!-- cheques -->
                            <div class="tab-pane fade " id="nav-bih-conciliacion-cheque" role="tabpanel"
                                aria-labelledby="nav-bih-conciliacion-cheque-tab">
                                <div class="row">
                                    <div class="col-6">
                                        <h2 class="text-center">AGREGAR CHEQUES</h2>

                                        <table class="table table-bordered table-sm">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th align="center" class="text-center" width="50">Fecha</th>
                                                    <th align="center" class="text-center">Detalle</th>
                                                    <th align="center" class="text-center">Valor</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input class="form-control" type="date" v-model="cheques.fecha"
                                                            placeholder="Agrega la fecha" name="">
                                                    </td>
                                                    <td><input type="text" v-model="cheques.detalle" name="detalle"
                                                            class="form-control" required></td>
                                                    <td width="125"><input type="number" v-model="cheques.saldo"
                                                            name="saldo" class="form-control" required></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div v-if="!cheques.edit" class="row justify-content-center">
                                            <a href="#" class="btn btn-success"
                                                @click.prevent="agregarCheques()">Agregar</a>
                                        </div>
                                        <div v-else class="row justify-content-center">
                                            <a href="#" class="btn btn-success"
                                                @click.prevent="actualizarCheque()">Actualizar</a>
                                            <a href="#" class="btn btn-danger ml-1"
                                                @click.prevent="cancelarEditCheque()"><i
                                                    class="fa fa-window-close"></i></a>
                                        </div>
                                    </div>
                                    @if($datos->metodo == 'individual')
                                    <div class="col-6"
                                        style=" height:300px; overflow-y: scroll; overflow-x: hidden; border: double 4px red;">
                                        {!! $transacciones->transacciones !!}
                                    </div>
                                    @elseif($datos->metodo == 'concatenado')
                                    <div class="col-6 mt-2 "
                                        style=" height:400px; overflow-y: scroll; border: solid 3px red;">
                                        <h2 class="text-center  font-weight-bold text-danger">Anexos de Control Interno
                                        </h2>
                                        <h3 class="text-center font-weight-bold text-danger">Libro Banco</h3>

                                        <div class="row p-3  mb-2 justify-content-center ">
                                            <div class="col-5">
                                                <h5 class="font-weight-bold">@{{ lb_nombre }}</h5>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <h5 class="font-weight-bold">@{{ lb_n_banco }}</h5>
                                            </div>
                                            <div class="col">
                                                <h5 class="font-weight-bold">@{{ lb_c_banco }}</h5>
                                            </div>
                                        </div>
                                        <br>

                                        <table style="border: hidden" class="table table-bordered table-sm mb-2">
                                            <thead style="border: hidden">
                                                <tr style="border: hidden" class="text-center bg-dark">
                                                    <th width="100">Fecha</th>
                                                    <th width="300">Detalle</th>
                                                    <th width="50"><i>Ch/</i></th>
                                                    <th width="90">Debe</th>
                                                    <th width="90">Haber</th>
                                                    <th width="100">Saldo</th>
                                                </tr>
                                            </thead>
                                            <tbody style="border: hidden" is="draggable" group="people" :list="lb_banco"
                                                tag="tbody">
                                                <tr style="border: hidden" v-for="(banco, index) in lb_banco">
                                                    <td align="left">@{{formatoFecha(banco.fecha)}}</td>
                                                    <td align="left">@{{banco.detalle}}</td>
                                                    <td align="left">@{{banco.cheque}}</td>
                                                    <td align="right">@{{decimales(banco.debe)}}</td>
                                                    <td align="right">@{{decimales(banco.haber)}}</td>
                                                    <td align="right">@{{decimales(banco.saldo)}}</td>
                                                </tr>
                                                {{-- 
                    <tr style="border: hidden" class="bg-secondary">
                        <td class="text-center font-weight-bold">SUMAN</td>
                        <td class="text-left font-weight-bold"></td>
                        <td class="text-left font-weight-bold"></td>
                        <td class="text-right font-weight-bold">@{{ suman.debe }}</td>
                                                <td class="text-right font-weight-bold">@{{ suman.haber }}</td>
                                                </tr> --}}
                                            </tbody>
                                        </table>

                                    </div> @endif

                                    <div class="col-12 mt-2 p-2" style=" height:400px; overflow-y: scroll;">
                                        <h2 class="text-center">CHEQUES</h2>
                                        <div class="row justify-content-around mb-2">
                                            <table class="table table-bordered table-sm mb-2 p-2">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th align="center" class="text-center" width="150">Fecha</th>
                                                        <th align="center" class="text-center">Detalle</th>
                                                        <th align="center" class="text-center">Valor</th>

                                                    </tr>
                                                </thead>
                                                <tbody is="draggable" group="people" :list="c_cheques" tag="tbody">
                                                    <tr v-for="(c, index) in c_cheques">
                                                        <td align="center">@{{formatoFecha(c.fecha)}}</td>
                                                        <td align="center">@{{ c.detalle}}</td>
                                                        <td class="text-right">@{{ decimales(c.saldo)}}</td>
                                                        <td align="center" width="50">
                                                            <a @click.prevent="editCheque(index)"
                                                                class="btn btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </td>
                                                        <td align="center" width="50">
                                                            <a @click.prevent="EliminarCheque(index)"
                                                                class="btn btn-danger">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end cheques -->
                        </div> <!-- cierre de modal tab-content -->
                    </div> <!-- col-12 -->
                </div> <!-- cierre de modal content center -->
            </div> <!-- cierre de modal body -->
        </div> <!-- cierre de modal content -->
    </div> <!-- cierre de modal document -->
</div> <!-- cierre de modal -->