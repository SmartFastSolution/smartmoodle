 <div id="diario" class="border border-danger">
     <h1 class="text-center text-danger font-weight-bold mt-2">DIARIO GENERAL</h1>
     <div class="row justify-content-center">
         <div class="col-3">
     <input autocomplete="ÑÖcompletes" type="text" v-model="nombre" class="form-control form-control-sm" placeholder="Nombre de la Empresa">
             
         </div>
     </div>

     {{-- <h4 class="text-center text-primary font-weight-bold mt-2">@{{ nombre }}</h4> --}}
     <div class="row p-3  mb-2 ">
        @if ($datos->metodo == 'concatenado')
        <div class="col-3 mb-2">
        <a class="btn btn-sm btn-danger" href="" @click.prevent="obtenerBalanceInicial()">Obtener Balance Inicial</a>
        </div>
            {{-- expr --}}
        @endif
          <div class="col-3 mb-2">
        <a href="#" class="btn btn-sm btn-outline-primary" @click.prevent="abrirTransaccion()">Crear Transaccion</a>  
        </div>
         <div class="col-12">
             <table class="table table-bordered table-sm">
                 <thead class="thead-dark">
                     <tr align="center">
                         <th scope="col" width="200">FECHA</th>
                         <th scope="col" width="450">NOMBRE DE CUENTAS</th>
                         <th scope="col " width="125">DEBE</th>
                         <th scope="col">HABER</th>
                         <th width="75" colspan="2" v-if="registros.length > 0">ACCION</th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr v-for="(diar, index) in balanceInicial.debe">
                         <td v-if="index == 0" align="center" width="100">@{{ fechabalance }} </td>
                         <td v-else align="center"></td>
                         <td align="rigth">@{{ diar.nom_cuenta}}</td>
                         <td align="center" width="125">@{{ diar.saldo }}</td>
                         <td align="center" width="125"></td>
                     </tr>
                     <tr v-for="(diar, index) in balanceInicial.haber">
                         <td align="center" width="50"></td>
                         <td style="padding-left:50px">@{{ diar.nom_cuenta}}</td>
                         <td align="center" width="125"></td>
                         <td align="center" width="125">@{{ diar.saldo }}</td>
                     </tr>

                 </tbody>

                 <tbody v-for="(registro, id) in registros" @change="totalDebe()">
                     <tr v-for="(diardebe, index) in registro.debe">
                         <td align="center" width="50">@{{ formatoFecha(diardebe.fecha)}}</td>
                         <td align="rigth">@{{ diardebe.nom_cuenta}}</td>
                         <td class="text-right" width="125">@{{ decimales(diardebe.saldo) }}</td>
                         <td class="text-right" width="125"></td>
                         <td v-if="diardebe.fecha !== '' && diardebe.fecha !== null && registro.tipo !== 'inicial'" align="center" width="50"><a
                                 @click="debeEditRegister(id)" class="btn btn-warning btn-sm"><i
                                     class="fas fas fa-edit"></i></a></td>
                                     <td v-if="registro.tipo == 'inicial' && diardebe.fecha !== '' && diardebe.fecha !== null"></td>
                         <td  v-if="diardebe.fecha != '' && diardebe.fecha !== null" align="center" width="50"><a
                                 @click="deleteRegistro(id)" class="btn btn-danger btn-sm"><i
                                     class="fas fa-trash-alt"></i></a></td>
                         <td colspan="2" v-else></td>
                     </tr>
                     <tr v-for="(diar, index) in registro.haber">
                         <td align="center" width="50"></td>
                         <td style="padding-left:50px">@{{ diar.nom_cuenta}}</td>
                         <td class="text-right" width="125"></td>
                         <td class="text-right" width="125">@{{ decimales(diar.saldo) }}</td>
                         <td colspan="2"></td>

                     </tr>
                     <tr class="text-muted">
                         <td></td>
                         <td>@{{ registro.comentario }}</td>
                         <td></td>
                         <td></td>
                         <td colspan="2"></td>

                     </tr>

                 </tbody>
                 <tbody>
                     <tr>
                         <td class="bg-dark" align="center" colspan="2" width="450" valign="middle">SUMAN</td>
                         <td class="bg-dark text-right" width="125">
                             @{{ decimales(pasan.debe) }}
                         </td>
                         <td class="bg-dark text-right" width="125">
                             @{{ decimales(pasan.haber) }}
                         </td>
                         <td v-if="registros.length > 0" width="90" style="border: none;"></td>

                     </tr>
                 </tbody>
             </table>

             <div v-if="ajustes.length > 0">
                 <h2 class="font-weight-bold text-center">Asientos de ajustes </h2>
                 <table class="table table-bordered table-sm">
                     {{--     <thead class="thead-dark">
                     <tr align="center">
                         <th scope="col" width="200">FECHA</th>
                         <th scope="col" width="450">NOMBRE DE CUENTAS</th>
                         <th scope="col " width="125">DEBE</th>
                         <th scope="col">HABER</th>
                         <th colspan="2" v-if="ajustes.length > 0">ACCION</th>
                     </tr>
                 </thead> --}}
                 <tbody v-for="(registro, id) in ajustes" @change="totalDebe()">
                     <tr v-for="(diardebe, index) in registro.debe">
                         <td align="center"width="200">@{{ formatoFecha(diardebe.fecha)}}</td>
                         <td align="rigth" width="450">@{{ diardebe.nom_cuenta}}</td>
                         <td align="center" width="125">@{{ decimales(diardebe.saldo) }}</td>
                         <td align="center" width="125"></td>
                         <td v-if="diardebe.fecha !== '' && diardebe.fecha !== null" align="center" width="50"><a
                                 @click="debeEditAjustado(id)" class="btn btn-warning btn-sm"><i
                                     class="fas fas fa-edit"></i></a></td>
                         <td v-if="diardebe.fecha != '' && diardebe.fecha !== null" align="center" width="50"><a
                                 @click="deleteAjuste(id)" class="btn btn-danger btn-sm"><i
                                     class="fas fa-trash-alt"></i></a></td>
                                     <td colspan="2" v-else></td>
                     </tr>
                     <tr v-for="(diar, index) in registro.haber">
                         <td align="center" width="50"></td>
                         <td style="padding-left:50px">@{{ diar.nom_cuenta}}</td>
                         <td align="center" width="125"></td>
                         <td align="center" width="125">@{{ decimales(diar.saldo) }}</td>
                        <td colspan="2"></td>
                     </tr>
                     <tr class="text-muted">
                         <td></td>
                         <td>@{{ registro.comentario }}</td>
                         <td></td>
                         <td></td>
                        <td colspan="2"></td>
                     </tr>
                 </tbody>
                 <tbody>
                         <tr >
                         <td class="bg-dark" align="center" colspan="2" width="450" valign="middle">TOTAL</td>
                         <td class="bg-dark text-right"  width="125">
                             @{{ decimales(total.debe) }}
                         </td>
                         <td class="bg-dark text-right"  width="125">
                             @{{ decimales(total.haber) }}
                         </td>
                         <td v-if="registros.length > 0" width="90" style="border: none;"></td>

                         </tr>
                     </tbody>
                 </table>


             </div>
             {{-- <table class="table table-bordered table-sm">
                 <tbody is="draggable" group="people" :list="diarios.debe" tag="tbody">
                     <tr v-for="(diar, index) in diarios.debe">
                         <td align="center" width="100">@{{ diar.fecha}}</td>
             <td>@{{ diar.nom_cuenta}}</td>
             <td align="center" width="125">@{{ diar.saldo }}</td>
             <td align="center" width="125"></td>
             <td align="center" width="25">
                 <a @click="debediairoEdit(index)" class="btn btn-warning btn-sm"><i class="fas fas fa-edit"></i></a>
             </td>
             <td align="center" width="25">
                 <a @click="deleteDebe(index)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
             </td>
             </tr>
             </tbody>
             <tbody is="draggable" group="people" :list="diarios.haber" tag="tbody">
                 <tr v-for="(diar, index) in diarios.haber">
                     <td align="center" width="50"></td>
                     <td style="padding-left:50px">@{{ diar.nom_cuenta}}</td>
                     <td align="center" width="125"></td>
                     <td align="center" width="125">@{{ diar.saldo }}</td>
                     <td>
                         <a @click="habediarioEdit(index)" class="btn btn-warning btn-sm"><i
                                 class="fas fas fa-edit"></i></a>
                     </td>
                     <td align="center" width="25"><a @click="deleteHaber(index)" class="btn btn-danger btn-sm"><i
                                 class="fas fa-trash-alt"></i></a></td>
                 </tr>
                 <tr v-if="diarios.comentario !== ''" class="text-muted">
                     <td></td>
                     <td>@{{ diarios.comentario }}</td>
                     <td></td>
                     <td></td>
                 </tr>
             </tbody>

             </table>
             <table class="table table-bordered table-sm">
                 <tbody is="draggable" group="people" :list="edit.debe" tag="tbody">
                     <tr v-for="(diar, index) in edit.debe">
                         <td align="center" width="100">@{{ diar.fecha}}</td>
                         <td>@{{ diar.nom_cuenta}}</td>
                         <td align="center" width="125">@{{ diar.saldo }}</td>
                         <td align="center" width="125"></td>
                         <td align="center" width="25">
                             <a @click="debeEdit(index)" class="btn btn-warning btn-sm"><i
                                     class="fas fas fa-edit"></i></a>
                         </td>
                         <td v-if="diar.fecha === ''" align="center" width="25">
                             <a @click="debeDelete(index)" class="btn btn-danger btn-sm"><i
                                     class="fas fa-trash-alt"></i></a>
                         </td>
                     </tr>
                 </tbody>
                 <tbody is="draggable" group="people" :list="edit.haber" tag="tbody">
                     <tr v-for="(diar, index) in edit.haber">
                         <td align="center" width="50"></td>
                         <td style="padding-left:50px">@{{ diar.nom_cuenta}}</td>
                         <td align="center" width="125"></td>
                         <td align="center" width="125">@{{ diar.saldo }}</td>
                         <td>
                             <a @click="haberEdit(index)" class="btn btn-warning btn-sm"><i
                                     class="fas fas fa-edit"></i></a>
                         </td>
                         <td align="center" width="25"><a @click="haberDelete(index)" class="btn btn-danger btn-sm"><i
                                     class="fas fa-trash-alt"></i></a></td>
                     </tr>
                     <tr v-if="edit.comentario !== ''">
                         <td></td>
                         <td class="text-muted">@{{ edit.comentario }}</td>
                         <td></td>
                         <td></td>
                         <td><a @click="comentarioEdit" class="btn btn-warning btn-sm"><i
                                     class="fas fas fa-edit"></i></a></td>
                     </tr>
                 </tbody>
             </table> --}}
             {{--      <table class="table table-bordered table-sm">
                 <tbody>
                     <tr >
                         <td class="bg-dark" align="center" colspan="2" width="450" valign="middle">PASAN</td>
                         <td class="bg-dark" align="center" width="125">
                             @{{ pasan.debe }}
             </td>
             <td class="bg-dark" align="center" width="125">
                 @{{ pasan.haber }}
             </td>
             <td v-if="registros.length > 0" width="90" style="border: none;"></td>

             </tr>
             </tbody>
             </table> --}}
             <form action="">

                 @csrf
                 {{--   <div v-if="edit.debe.length >= 1" class="row justify-content-around mb-2">
                     <a href="#" class="btn btn-outline-secondary" data-toggle="modal" data-target="#debe">Agregar
                         Debe</a>
                     <a href="#" class=" btn btn-outline-secondary" data-toggle="modal" data-target="#haber">Agregar
                         Haber</a>
                     <a href="#" v-if="edit.comentario == ''" class=" btn btn-outline-primary" data-toggle="modal"
                         data-target="#comentario">Agregar Comentario</a>
                     <a href="#" class="addDiario btn btn-outline-warning" @click.prevent="updaterRegister()">Actualizar
                         Transaccion</a>
                 </div> --}}
                 <div class="row justify-content-around mb-2">
                     <a href="#" class="btn btn-outline-primary" @click.prevent="abrirTransaccion()">Crear
                         Transaccion</a>
                     {{-- <a href="#" v-if="diarios.debe.length > 0" class="btn btn-outline-primary" data-toggle="modal" data-target="#porcentajes">Agregar Porcentaje</a>
                <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#debe">Agregar
                         Debe</a>
                     <a href="#" class=" btn btn-outline-primary" data-toggle="modal" data-target="#haber">Agregar
                         Haber</a>
                     <a href="#" class=" btn btn-outline-primary" data-toggle="modal" data-target="#comentario">Agregar
                         Comentario</a>
                     <a href="#" class="addDiario btn btn-outline-success" @click.prevent="guardarRegistro()">Agregar
                         Transaccion</a> --}}
                 </div>
                 <div class="row justify-content-center">
                     <a href="#" class="addDiario btn btn-danger" @click.prevent="guardarDiario()">Completar Diario
                         General</a>
                 </div>
             </form>
             <div class="row justify-content-center">
             </div>

         </div>
         @include ('contabilidad.modaldiariogeneral')

     </div>
 </div>