<div id="balance_comp" class="border border-danger p-4">
    <h2 class="text-center display-4 font-weight-bold text-danger">Balance de Comprobacion</h2>
    <div class="row p-3  mb-2 justify-content-center ">
        <div class="col-8 mb-3">
            <input class="form-control" type="text" v-model="nombre" placeholder="Nombre de la empresa" name="">
        </div>
        <div class="col-5">
            <input class="form-control" type="date" v-model="fecha" placeholder="Agrega la fecha" name="">
        </div>

    </div>
    {{--         <h2 class="text-center">Agregar Sumas</h2>
    <div class="form-row mb-2 justify-content-center">
        <div class="col">
           <select name="n_cuenta" id="" v-model="balance.cuenta" class="custom-select">
            <option value="" disabled>ELIGE UNA CUENTA</option>
            <option value="banco">BANCO</option>
            <option value="muebles">MUEBLES</option>
            <option value="caja">CAJA</option>
            <option value="vehiculo">VEHICULO</option>
            </select>
        </div>
        <div class="col">
          <input type="text" class="form-control" v-model="balance.suma_debe" placeholder="Debe">
        </div>
         <div class="col">
          <input type="text" class="form-control" v-model="balance.suma_haber"  placeholder="Haber">
        </div>

        <a v-if="!update" href="#" class="addDiario btn btn-outline-danger " @click.prevent="agregarRegistro()">Agregar Registro</a>
        <a v-if="update" href="#" class="addDiario btn btn-outline-danger " @click.prevent="actualizarBalance()">Actualizar Registro</a>

  </div> --}}
    <table class="table table-bordered table-sm mb-2">
        <thead>
            <tr class="bg-dark">
                <th rowspan="2" align="center" class="text-center">CUENTAS</th>
                <th colspan="2" align="center" class="text-center">SUMAS</th>
                <th colspan="2" align="center" class="text-center">SALDOS</th>
                {{-- <td  class="text-center" valign="center" v-if="balances.length >=1" colspan="2" rowspan="2">ACCIONES</td> --}}

            </tr>
            <tr class="bg-dark">
                <td align="center">Debe</td>
                <td align="center">Haber</td>
                <td align="center">Debe</td>
                <td align="center">Haber</td>
            </tr>
        </thead>
        <tbody is="draggable" group="people" :list="balances" tag="tbody" @change="mover">
            <tr v-for="(balan, index) in balances">
                <td align="center">@{{ balan.cuenta}}</td>
                <td class="text-right" align="center" width="125">@{{ decimales(balan.suma_debe)}}</td>
                <td class="text-right" align="center" width="125">@{{ decimales(balan.suma_haber) }}</td>
                <td class="text-right" align="center" width="125">@{{ decimales(balan.saldo_debe) }}</td>
                <td class="text-right" align="center" width="125">@{{ decimales(balan.saldo_haber) }}</td>
                {{--          <td align="center" width="50"><a @click.prevent="deleteBalance(index)"  class="btn btn-danger"><i
                            class="fas fa-trash-alt"></i></a></td>
                <td align="center"  width="50"><a @click.prevent="editBalance(index)" class="btn btn-warning"><i
                            class="fas fa-edit"></i></a></td> --}}

            </tr>
            <tr class="text-center bg-secondary">
                <td align="center" valign="middle">SUMAN</td>
                <td class="text-right">@{{ suman.sum_debe }}</td>
                <td class="text-right">@{{ suman.sum_haber }}</td>
                <td class="text-right">@{{ suman.sal_debe }}</td>
                <td class="text-right">@{{ suman.sal_haber }}</td>
            </tr>
        </tbody>
    </table>

    <div class="row justify-content-center mb-2">
        <a href="#" class="addDiario btn btn-outline-info " @click.prevent="abrirTransaccion()">Agregar Movimientos</a>
    </div>


    <div class="row justify-content-center">
        <a href="#" class="addDiario btn btn-outline-success " @click.prevent="guardarBalance()">Guardar Balance</a>
    </div>




    @include ('contabilidad.modales.modalbalancecomprobacion')
</div>