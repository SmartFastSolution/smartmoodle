<div id="conciliacionb" class="border border-danger p-4">
    <h1 class="text-center text-danger font-weight-bold mt-2">Conciliación Bancaria</h1>
    <div class="row p-3  mb-2 justify-content-center ">
        <div class="col-8 mb-3">
            <input class="form-control" type="text" v-model="nombre" placeholder="Nombre de la empresa" name="">
        </div>
        <div class="col-5">
            <input class="form-control" type="date" v-model="fecha" placeholder="Agrega la fecha" name="">
        </div>

    </div>

    <br><br>
    <div class="row justify-content-around mb-2">
        <div class="col col-lg-5">
            <input type="text" class="form-control" v-model="n_banco" placeholder="Nombre Del Banco" align="center"
                required>
        </div>
    </div>
    <br>
    <h2></h2>
    <div class="row">
        <div class="col-7">
            <h3 class="text-left font-weight-bold text-danger">SALDO <a data-toggle="modal" data-target="#c_saldos"
                    @click="limpiar()" class="btn btn-sm btn-info text-light"><i class="fa fa-plus"></i></a> </h3>
            <draggable class="list-group list-group-flush" :list="c_saldos" group="people">
                <div v-for="(element, index) in c_saldos" :key="element.name">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="badge-pill"> @{{formatoFecha(element.fecha)}}</span> @{{ element.detalle }}<span
                            class="badge-pill">@{{ decimales(element.saldo) }} <a @click="editSaldo(index)"
                                class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a><a
                                @click="deleteSaldo(index)" class="btn btn-danger btn-sm re_diario"><i
                                    class="fas fa-trash-alt"></i></a></span>
                    </li>
                </div>
            </draggable>
        </div>
        <div class="col-12">
            <table>
                <tbody>
                    <tr v-for="(element, index) in c_saldos" :key="element.name">
                        <td class="font-weight-bold" style="font-size: 20px;" width="2000"></td>
                        <td style="font-size: 20px;" class="badge-success badge">@{{ decimales(element.saldo) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <h2></h2>
    <div class="row">
        <div class="col-7">
            <h3 class="text-left font-weight-bold text-danger"> + DÉBITOS BANCARIOS NO CONTABILIZADOS <a
                    data-toggle="modal" data-target="#c_debitos" @click="limpiar()"
                    class="btn btn-sm btn-info text-light"><i class="fa fa-plus"></i></a></h3>
            <draggable class="list-group list-group-flush" :list="c_debitos" group="people">
                <div v-for="(element, index) in c_debitos" :key="element.name">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="badge-pill"> @{{formatoFecha(element.fecha)}}</span> @{{ element.detalle }}<span
                            class="badge-pill">@{{ decimales(element.saldo) }} <a @click="editDebitos(index)"
                                class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a><a
                                @click="deleteDebito(index)" class="btn btn-danger btn-sm re_diario"><i
                                    class="fas fa-trash-alt"></i></a></span>
                    </li>
                </div>
            </draggable>
        </div>
        <div class="col-12">
            <table>
                <tbody>
                    <tr>
                        <td class="font-weight-bold" style="font-size: 20px;" width="2000">TOTAL DÉB. BANCARIOS</td>
                        <td style="font-size: 20px;" class="badge-success badge"> + @{{ decimales(suman.saldo_d) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <h2></h2>
    <div class="row">
        <div class="col-7">
            <h3 class="text-left font-weight-bold text-danger"> - CRÉDITOS BANCARIOS NO CONTABILIZADOS
                <a data-toggle="modal" data-target="#c_creditos" @click="limpiar()"
                    class="btn btn-sm btn-info text-light"><i class="fa fa-plus"></i></a>
            </h3>
            <draggable class="list-group list-group-flush" :list="c_creditos" group="people">
                <div v-for="(element, index) in c_creditos" :key="element.name">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="badge-pill"> @{{formatoFecha(element.fecha)}}</span> @{{ element.detalle }}<span
                            class="badge-pill">@{{ decimales(element.saldo) }} <a @click="editCreditos(index)"
                                class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a><a
                                @click="deleteCredito(index)" class="btn btn-danger btn-sm re_diario"><i
                                    class="fas fa-trash-alt"></i></a></span>
                    </li>
                </div>
            </draggable>
        </div>
        <div class="col-12">
            <table>
                <tbody>
                    <tr>
                        <td class="font-weight-bold" style="font-size: 20px;" width="2000">TOTAL CRÉD. BANCARIOS</td>
                        <td style="font-size: 20px;" class="badge-success badge">-@{{ decimales(suman.saldo_c) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <h2></h2>
    <div class="row">
        <div class="col-7">
            <h3 class="text-left font-weight-bold text-danger"> - CHEQUES GIRADOS Y NO COBRADOS
                <a data-toggle="modal" data-target="#c_cheques" @click="limpiar()"
                    class="btn btn-sm btn-info text-light"><i class="fa fa-plus"></i></a>
            </h3>
            <draggable class="list-group list-group-flush" :list="c_cheques" group="people">
                <div v-for="(element, index) in c_cheques" :key="element.name">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="badge-pill"> @{{formatoFecha(element.fecha)}}</span> @{{ element.detalle }}<span
                            class="badge-pill">@{{ decimales(element.saldo) }} <a @click="editCheques(index)"
                                class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a><a
                                @click="deleteCheque(index)" class="btn btn-danger btn-sm re_diario"><i
                                    class="fas fa-trash-alt"></i></a></span>
                    </li>
                </div>
            </draggable>
        </div>
        <div class="col-12">
            <table>
                <tbody>
                    <tr>
                        <td class="font-weight-bold" style="font-size: 20px;" width="2000">TOTAL CHEQ. BANCARIOS</td>
                        <td style="font-size: 20px;" class="badge-success badge">-@{{ decimales(suman.saldo_ch) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <h2></h2>
    <div class="row">

        <div class="col-12">
            <table>
                <tbody>
                    <tr>
                        <td class="font-weight-bold" style="font-size: 20px;" width="2000">SALDO EN LIBRO BANCO</td>
                        <td style="font-size: 20px;" class="badge-danger badge">@{{ decimales(suman.total) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>




    <div class="row justify-content-center">
        <a class="btn p-2 mt-3 btn-outline-info" @click.prevent="guardarConciliacionB()">Guardar Conciliación
            Bancaria</a>
    </div>






    @include('contabilidad.modalconciliacionbancaria')
</div>