{{-- <div id="arqueo_caja" class="border border-danger p-4">
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

<td align="center" width="50">
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
</div> --}}

<!-- Arqueo Caja Correción  -->

<div id="arqueo_caja" class="border border-danger p-4">
    <h2 class="text-center display-4 font-weight-bold text-danger">Anexos de Control Interno</h2>
    <h2 class="text-center display-4 font-weight-bold text-danger">Arqueo de Caja</h2>

    <div class="form-row mb-3 justify-content-center">

        <a data-toggle="modal" data-target="#ar_saldos" @click="limpiar()" class="btn btn-sm btn-info mr-2">Agregar
            Saldo</a>
        <a data-toggle="modal" data-target="#ar_existencias" @click="limpiar()" class="btn btn-sm btn-info mr-2">Agregar
            Existencias</a>

    </div>
    <br>
    <table style="border: hidden" class="table table-bordered table-sm mb-2">

        <thead>
            <tr style="border: hidden" class="text-center bg-dark">
                <th style="border: hidden; color:red" width="500"></th>
                <th style="border: hidden" align="right"><em>
                        <h5>Debe</h5>
                    </em></th>
                <th style="border: hidden" align="right"><em>
                        <h5>Haber</h5>
                    </em></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody group="people" :list="t_saldo" tag="tbody" style="border: hidden">
            <tr style="border: hidden" v-for="(s, index) in t_saldo">
                <td style="border: hidden;">@{{s.detalle}}</td>
                <td style="border: hidden" align="center">@{{decimales(s.s_debe)}}</td>
                <td style="border: hidden" align="center">@{{decimales(s.s_haber)}}</td>
                <td style="border: hidden" align="center" width="50">
                    <a @click.prevent="deleteSaldo(index)" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
                <td style="border: hidden" align="center" width="50">
                    <a @click.prevent="editSaldo(index)" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>

            </tr>
        </tbody>
        <td style="border: hidden"><em>Existencia física al momento del arqueo:</em></td>
        <td style="border: hidden"></td>
        <td style="border: hidden"></td>
        <td style="border: hidden"></td>
        <td style="border: hidden"></td>

        <tbody is="draggable" group="people" :list="t_exis" tag="tbody">
            <tr style="border: hidden" v-for="(e, index) in t_exis">
                <td style="padding-left:50px">@{{e.detalle}}</td>
                <td style="border: hidden" align="center">@{{decimales(e.e_debe)}}</td>
                <td style="border: hidden" align="center">@{{decimales(e.e_haber)}}</td>
                <td style="border: hidden" align="center" width="50">
                    <a @click.prevent="deleteExis(index)" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
                <td style="border: hidden" align="center" width="50">
                    <a @click.prevent="editExis(index)" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr class="bg-secondary">
                <td class="text-left font-weight-bold">SUMAN</td>
                <td class="text-right font-weight-bold">@{{sumas.td}}</td>
                <td class="text-right font-weight-bold">@{{sumas.th}}</td>
            </tr>

        </tbody>
    </table>


    <div class="row justify-content-center">
        <a class="btn p-2 mt-3 btn-outline-info" @click.prevent="guardaArqueo()">Guardar Arqueo</a>
    </div>




    @include ('contabilidad.modalarqueocaja')
</div>