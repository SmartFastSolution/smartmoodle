<div id="balance_ajustado" class="border border-danger p-4">
        <h2 class="text-center display-4 font-weight-bold text-danger">Balance de Comprobacion Ajustado</h2>
        <h2 class="text-center">Agregar Cuenta</h2>
    <div class="form-row mb-2 justify-content-center">
        <div class="col-xl col-sm-12 mb-sm-1">
           <select name="n_cuenta" id="" v-model="balance.cuenta" class="custom-select">
            <option value="" disabled>ELIGE UNA CUENTA</option>
            <option value="banco">BANCO</option>
            <option value="muebles">MUEBLES</option>
            <option value="caja">CAJA</option>
            <option value="vehiculo">VEHICULO</option>
            </select>
        </div>
        <div class="col-xl col-sm-12 mb-sm-1">
          <input type="text" class="form-control" v-model="balance.debe" placeholder="Debe">
        </div>
         <div class="col-xl col-sm-12 mb-sm-1" >
          <input type="text" class="form-control" v-model="balance.haber"  placeholder="Haber">
        </div>

        <a  v-if="!update" href="#" class="addDiario btn btn-outline-danger  " @click.prevent="agregarRegistro()">Agregar Registro</a>
        <a  v-if="update" href="#" class="addDiario btn btn-outline-danger  " @click.prevent="actualizarBalance()">Actualizar Registro</a>

  </div>
  <table class="table table-bordered table-sm mb-2">
<thead>
  <tr class="text-center bg-dark">
    <th>CUENTAS</th>
    <th width="200">DEBE</th>
    <th width="200">HABER</th>
    <th class="text-center" v-if="balances_ajustados.length >=1" colspan="2">ACCIONES</th>

  </tr>
</thead>
<tbody>

    <tr v-for="(balan, index) in balances_ajustados">
      <td align="center">@{{ balan.cuenta}}</td>
      <td align="center">@{{ balan.debe}}</td>
      <td align="center" width="125">@{{ balan.haber }}</td>
      <td align="center" width="50">
        <a @click.prevent="deleteBalance(index)" class="btn btn-danger">
          <i class="fas fa-trash-alt"></i>
        </a>
      </td>
      <td align="center"  width="50">
        <a @click.prevent="editBalance(index)" class="btn btn-warning">
          <i class="fas fa-edit"></i>
        </a>
      </td>
    </tr>
  <tr class="bg-secondary">
    <td class="text-left font-weight-bold">SUMAN</td>
    <td class="text-center">@{{ suman.debe }}</td>
    <td class="text-center">@{{ suman.haber }}</td>
  </tr>
</tbody>
</table>
    <div class="row justify-content-center">
        <a  href="#" class="addDiario btn btn-outline-info " @click.prevent="guardarBalance()">Guardar Balance</a>
        
    </div>
</div>