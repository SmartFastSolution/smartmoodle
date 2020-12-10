<div id="librocaja" class="border border-danger p-4">
    <h2 class="text-center display-4 font-weight-bold text-danger">Anexos de Control Interno</h2>
    <h2 class="text-center display-4 font-weight-bold text-danger">Libro Caja</h2>
    <div class="row p-3  mb-2 justify-content-center ">
        <div class="col-5">
            <input class="form-control" type="text" v-model="nombre" placeholder="Nombre del Anexo" name="">
        </div>
    </div>
    <div class="form-row mb-3 justify-content-center">
        <div class="col-xl col-sm-12 mb-sm-1">
            <input type="date" name="fecha" v-model="caja.fecha" class="form-control" required>
        </div>
        <div class="col-xl col-sm-12 mb-sm-1">
            <input type="text" class="form-control" v-model="caja.detalle" placeholder="Detalle">
        </div>
        <div class="col-xl col-sm-12 mb-sm-1">
            <input type="text" class="form-control" v-model="caja.debe" placeholder="Debe">
        </div>
        <div class="col-xl col-sm-12 mb-sm-1">
            <input type="text" class="form-control" v-model="caja.haber" placeholder="Haber">
        </div>
        <div class="col-xl col-sm-12 mb-sm-1">
            <input type="text" class="form-control" v-model="caja.saldo" placeholder="Saldo">
        </div>

        <a  v-if="!update" href="#" class="btn btn-outline-danger  " @click.prevent="agregarRegistro()">Agregar Registro</a>
        <a  v-if="update" href="#" class="btn btn-outline-danger  " @click.prevent="actualizarLibroCaja()">Actualizar Registro</a>
    </div>
    <table class="table table-bordered table-sm mb-2">
        <thead>
            <tr class="text-center bg-dark">
                <th width="100">Fecha</th>
                <th width="300">Detalle</th>
                <th>Debe</th>
                <th>Haber</th>
                <th>Saldo</th>
                <th class="text-center" v-if="libros_caja.length >=1" colspan="2">ACCIONES</th>
            </tr>
        </thead>
        <tbody is="draggable" group="people" :list="libros_caja" tag="tbody">
            <tr v-for="(caja, index) in libros_caja">
                <td align="center">@{{ caja.fecha}}</td>
                <td align="center">@{{ caja.detalle}}</td>
                <td align="center">@{{ caja.debe}}</td>
                <td align="center">@{{ caja.haber}}</td>
                <td align="center">@{{ caja.saldo}}</td>
                <td align="center" width="50">
                    <a @click.prevent="deleteLibroCaja(index)" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
                <td align="center" width="50">
                    <a @click.prevent="editLibroCaja(index)" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>

            <tr class="bg-secondary">
                <td class="text-left font-weight-bold">SUMAN</td>
                <td class="text-left font-weight-bold"></td>
                <td class="text-center">@{{ suman.debe }}</td>
                <td class="text-center">@{{ suman.haber }}</td>
            </tr>
        </tbody>
    </table>
    <div class="row justify-content-center">
        <a href="#" class="addDiario btn btn-outline-info " @click.prevent="guardarLibro()">Guardar Libro Caja</a>

    </div>
</div>