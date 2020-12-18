<div id="librosbanco" class="border border-danger p-4">

    <h2 class="text-center display-4 font-weight-bold text-danger">Anexos de Control Interno</h2>
    <h3 class="text-center display-4 font-weight-bold text-danger">Libro Banco</h3>

    <div class="row p-3  mb-2 justify-content-center ">
        <div class="col-5">
            <input class="form-control text-center" type="text" v-model="nombre" placeholder="Nombre de la Empresa"
                name="" required>
        </div>
    </div>

    <div class="form-row mb-8 justify-content-center">

        <div class="col col-lg-3">
            <input type="date"  v-model="banco.fecha" class="form-control"  required>
        </div>
        <div class="col col-lg-5">
            <input type="text" class="form-control" v-model="banco.detalle" placeholder="Detalle">
        </div>
        <div class="col col-lg-1">
            <input type="text" class="form-control" v-model="banco.cheque" placeholder="ch/">
        </div>
        <div class="col col-lg-1">
            <input type="text" class="form-control" v-model="banco.debe" placeholder="Debe">
        </div>
        <div class="col col-lg-1">
            <input type="text" class="form-control text-center" v-model="banco.haber" placeholder="Haber">
        </div>
        <div class="col col-lg-1">
            <input type="text" class="form-control" v-model="banco.saldo" placeholder="Saldo">
            <br>
        </div>
        <a v-if="!update" href="#" class="btn btn-outline-danger  " @click.prevent="agregarBanco()">Agregar Registro</a>
        <a v-if="update" href="#" class="btn btn-outline-danger  " @click.prevent="actualizarLibroBanco()">Actualizar Registro</a>

    </div>

    <br>
    
    <table  style="border: hidden" class="table table-bordered table-sm mb-2">
        <thead style="border: hidden">
            <tr  style="border: hidden" class="text-center bg-dark">
                <th width="100">Fecha</th>
                <th width="300">Detalle</th>
                <th width="50"><i>Ch/</i></th>
                <th width="90">Debe</th>
                <th width="90">Haber</th>
                <th width="100">Saldo</th>
                <th class="text-center" v-if="lb_banco.length >=1" colspan="2">ACCIONES</th>
            </tr>
        </thead>
        <tbody  style="border: hidden" is="draggable" group="people" :list="lb_banco" tag="tbody">
            <tr style="border: hidden" v-for="(banco, index) in lb_banco">
                <td align="left">@{{banco.fecha}}</td>
                <td align="left">@{{banco.detalle}}</td>
                <td align="center">@{{banco.cheque}}</td>
                <td align="right">@{{banco.debe}}</td>
                <td align="right">@{{banco.haber}}</td>
                <td align="right">@{{banco.saldo}}</td>
                <td align="center" width="50">
                    <a @click.prevent="deleteLibroBanco(index)" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
                <td align="center" width="50">
                    <a @click.prevent="editLibroBanco(index)" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>

            <tr  style="border: hidden" class="bg-secondary">
                <td class="text-center font-weight-bold">SUMAN</td>
                <td class="text-left font-weight-bold"></td>
                <td class="text-left font-weight-bold"></td>
                <td class="text-center">@{{ suman.debe }}</td>
                <td class="text-center">@{{ suman.haber }}</td>
            </tr>
        </tbody>
    </table>
    <div class="row justify-content-center">
        <a href="#" class="addDiario btn btn-outline-info " @click.prevent="guardarlbBAnco()">Guardar Libro Caja</a>

    </div>


</div>