<div id="arqueo_caja" class="border border-danger p-4">
<h2 class="text-center display-4 font-weight-bold text-danger">Anexos de Control Interno</h2>
    <h2 class="text-center display-4 font-weight-bold text-danger">Arqueo de Caja</h2>

    <div class="form-row mb-3 justify-content-center">

        <div class="col-xl col-sm-12 mb-sm-1">
            <input type="text" class="form-control" v-model="arqueo.cuenta" placeholder="Detalle">
        </div>
        <div class="col-xl col-sm-12 mb-sm-1">
            <input type="text" class="form-control" v-model="arqueo.debe" value="true" placeholder="Debe">
        </div>
        <div v-if="arqueo.debe" class="col-xl col-sm-12 mb-sm-1">
            <input type="text" class="form-control" v-model="arqueo.comentario" placeholder="Comentario">
        </div>
        <div class="col-xl col-sm-12 mb-sm-1">
            <input type="text" class="form-control" v-model="arqueo.haber" placeholder="Haber">
        </div>


        <a v-if="!update" href="#" class="btn btn-outline-danger" @click.prevent="agregarArqueo()">Agregar
            Registro</a>
        <a v-if="update" href="#" class="btn btn-outline-danger" @click.prevent="actualizarArqueo()">Actualizar
            Registro</a>
    </div>

    <table style="border: hidden" class="table table-bordered table-sm mb-2">
        <thead>
            <tr style="border: hidden" class="text-center bg-dark">
                <th style="border: hidden" width="300"></th>
                <th style="border: hidden">Debe</th>
                <th style="border: hidden">Haber</th>
                <th style="border: hidden" class="text-center" v-if="arqueos_caja.length >=1" colspan="2">ACCIONES</th>
            </tr>
        </thead>
        <tbody style="border: hidden" is="draggable" group="people" :list="arqueos_caja" tag="tbody">
            <tr v-for="(arqueo, index) in arqueos_caja">
                <td style="border: hidden" align="left">@{{arqueo.cuenta}}
                                        <br> <span> <em>@{{arqueo.comentario}}</em> </span>
                </td>
                <td style="border: hidden" align="center">@{{arqueo.debe}}</td>
                <td style="border: hidden" align="center">@{{arqueo.haber}}</td>

                <td style="border: hidden" align="center" width="50">
                    <a @click.prevent="deleteArqueo(index)" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>

                <td  align="center" width="50">
                    <a @click.prevent="editArqueo(index)" class="btn btn-warning">
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
        <a href="#" class="addDiario btn btn-outline-info " @click.prevent="guardarArqueo()">Guardar Arqueo de Caja</a>

    </div>






</div>