<table class="table table-bordered table-sm">
    <thead>
        <tr>
            <th rowspan="2" align="center" class="text-center">Cuentas</th>
            <th colspan="2" align="center" class="text-center">SUMAS</th>
            <th colspan="2" align="center" class="text-center">SALDOS</th>
            <th></th>
        </tr>
        <tr>
            <td align="center">Debe</td>
            <td align="center">Haber</td>
            <td align="center">Debe</td>
            <td align="center">Haber</td>
        </tr>
    </thead>
    <tbody>
        <tr v-for="(balan, index) in balances">
            <td align="center">@{{ balan.cuenta}}</td>
            <td align="center">@{{ balan.suma_debe}}</td>
            <td align="center" width="125">@{{ balan.suma_haber }}</td>
            <td align="center" width="125">@{{ balan.saldo_debe }}</td>
            <td align="center" width="125">@{{ balan.saldo_haber }}</td>
            <td align="center" width="50"><a @click="deleteBalance(index)" class="btn btn-danger"><i
                        class="fas fa-trash-alt"></i></a></td>
        </tr>
        <tr>
            <td>
                <select name="n_cuenta" id="" v-model="balance.cuenta" class="custom-select">
                    <option value="" disabled>ELIGE UNA CUENTA</option>
                    <option value="banco">BANCO</option>
                    <option value="muebles">MUEBLES</option>
                    <option value="caja">CAJA</option>
                    <option value="vehiculo">VEHICULO</option>
                </select>
            </td>
            <td width="125"><input type="text" v-model="balance.suma_debe" name="debe" class="form-control" required>
            </td>
            <td width="125"><input type="text" v-model="balance.suma_haber" name="haber" class="form-control" required>
            </td>
            <td width="125"><input type="text" v-model="balance.saldo_debe" name="debe" class="form-control" required>
            </td>
            <td width="125"><input type="text" v-model="balance.saldo_haber" name="debe" class="form-control" required>
            </td>
            <td align="center" width="50"></td>
        </tr>
        <tr>
            <td align="center" valign="middle">SUMAN</td>
            <td><input type="text" name="p_debe" class="form-control" v-model="suman.sum_debe" required></td>
            <td><input type="text" name="p_haber" class="form-control" v-model="suman.sum_haber" required></td>
            <td><input type="text" name="p_haber" class="form-control" v-model="suman.sal_debe" required></td>
            <td><input type="text" name="p_haber" class="form-control" v-model="suman.sal_haber" required></td>
        </tr>
    </tbody>
</table>
<a href="#" class="addDiario btn btn-outline-danger" @click="agregarBalance()">Agregar Registro</a>