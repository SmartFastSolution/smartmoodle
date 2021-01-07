<!-- Arqueo Caja Correción  -->

<div id="arqueo_caja" class="border border-danger p-4">
    <h2 class="text-center display-4 font-weight-bold text-danger">Anexos de Control Interno</h2>
    <h2 class="text-center display-4 font-weight-bold text-danger">Arqueo de Caja</h2>

    <br>
    <!-- @if ($rol === 'estudiante')
        <a href="#" class="addDiario btn btn-outline-info " @click.prevent="abrirArqueo()">Agregar Detalle</a>
        <a href="#" class="addDiario btn btn-outline-success ml-1 " @click.prevent="guardaArqueo()">Guardar Arqueo Caja</a>
@endif -->
    <div style=" height:400px; overflow-y: scroll; overflow-x: hidden;">
        <table style="border: hidden" class="table table-bordered table-sm mt-2 mb-2">
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
                        <a @click.prevent="editSaldoFuera(index)" class="btn btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td style="border: hidden" align="center" width="50">
                        <a @click.prevent="WarningEliminarSaldo(index)" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
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
                        <a @click.prevent="editExisFuera(index)" class="btn btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td style="border: hidden" align="center" width="50">
                        <a @click.prevent="WarningEliminarExis(index)" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
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

    </div>

    @if ($rol === 'estudiante')
    <div class="row justify-content-center mb-2">
        <a href="#" class="addDiario btn btn-outline-info " @click.prevent="abrirArqueo()">Agregar Detalle</a>
    </div>

    <div class="row justify-content-center">
        <a href="#" class="addDiario btn btn-outline-success " @click.prevent="guardaArqueo()">Guardar Arqueo Caja</a>
    </div>
    <br>
    @endif

    @include ('contabilidad.modalarqueocaja')
</div>