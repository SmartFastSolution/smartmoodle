 <div id="diario">
     <h3 class="text-center text-danger font-weight-bold mt-2">DIARIO GENERAL</h3>
     <h4 class="text-center text-primary font-weight-bold mt-2">@{{ nombre }}</h4>
     <div class="row p-3  mb-2 ">
         <div class="col-12">
             <table class="table table-bordered table-sm">
                 <thead class="thead-dark">
                     <tr align="center">
                         <th scope="col" width="200">FECHA</th>
                         <th scope="col" width="450">NOMBRE DE CUENTAS</th>
                         <th scope="col " width="125">DEBE</th>
                         <th scope="col">HABER</th>
                         <th colspan="2" v-if="registros.length > 0">ACCION</th>
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
                     <tr v-for="(diar, index) in registro.debe">
                         <td align="center" width="50">@{{ diar.fecha}}</td>
                         <td align="rigth">@{{ diar.nom_cuenta}}</td>
                         <td align="center" width="125">@{{ diar.saldo }}</td>
                         <td align="center" width="125"></td>
                         <td v-if="diar.fecha !== '' && diar.fecha !== null" align="center" width="50"><a
                                 @click="debeEditRegister(id)" class="btn btn-warning btn-sm"><i
                                     class="fas fas fa-edit"></i></a></td>
                         <td v-if="diar.fecha != '' && diar.fecha !== null" align="center" width="50"><a
                                 @click="deleteRegistro(id)" class="btn btn-danger btn-sm"><i
                                     class="fas fa-trash-alt"></i></a></td>
                     </tr>
                     <tr v-for="(diar, index) in registro.haber">
                         <td align="center" width="50"></td>
                         <td style="padding-left:50px">@{{ diar.nom_cuenta}}</td>
                         <td align="center" width="125"></td>
                         <td align="center" width="125">@{{ diar.saldo }}</td>
                     </tr>
                     <tr class="text-muted">
                         <td></td>
                         <td>@{{ registro.comentario }}</td>
                         <td></td>
                         <td></td>
                     </tr>
                 </tbody>
             </table>
             <table class="table table-bordered table-sm">
                 <tbody is="draggable" group="people" :list="diarios.debe" tag="tbody">
                     <tr v-for="(diar, index) in diarios.debe">
                         <td align="center" width="100">@{{ diar.fecha}}</td>
                         <td>@{{ diar.nom_cuenta}}</td>
                         <td align="center" width="125">@{{ diar.saldo }}</td>
                         <td align="center" width="125"></td>
                         <td align="center" width="25">
                             <a @click="debediairoEdit(index)" class="btn btn-warning btn-sm"><i
                                     class="fas fas fa-edit"></i></a>
                         </td>
                         <td align="center" width="25">
                             <a @click="deleteDebe(index)" class="btn btn-danger btn-sm"><i
                                     class="fas fa-trash-alt"></i></a>
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
             </table>
             <table class="table table-bordered table-sm">
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
             </table>
             <form action="">

                 @csrf
                 <div v-if="edit.debe.length >= 1" class="row justify-content-around mb-2">
                     <a href="#" class="btn btn-outline-secondary" data-toggle="modal" data-target="#debe">Agregar
                         Debe</a>
                     <a href="#" class=" btn btn-outline-secondary" data-toggle="modal" data-target="#haber">Agregar
                         Haber</a>
                     <a href="#" v-if="edit.comentario == ''" class=" btn btn-outline-primary" data-toggle="modal"
                         data-target="#comentario">Agregar Comentario</a>
                     <a href="#" class="addDiario btn btn-outline-warning" @click.prevent="updaterRegister()">Actualizar
                         Transaccion</a>
                 </div>
                 <div v-else class="row justify-content-around mb-2">
                     {{-- <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#dg-transaccion">Crear Transaccion</a> --}}
                <a href="#" v-if="diarios.debe.length > 0" class="btn btn-outline-primary" data-toggle="modal" data-target="#porcentajes">Agregar Porcentaje</a>
                <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#debe">Agregar
                         Debe</a>
                     <a href="#" class=" btn btn-outline-primary" data-toggle="modal" data-target="#haber">Agregar
                         Haber</a>
                     <a href="#" class=" btn btn-outline-primary" data-toggle="modal" data-target="#comentario">Agregar
                         Comentario</a>
                     <a href="#" class="addDiario btn btn-outline-success" @click.prevent="guardarRegistro()">Agregar
                         Transaccion</a>
                 </div>
              {{--    <div class="row justify-content-center">
                     <a href="#" class="addDiario btn btn-danger" @click.prevent="guardarDiario()">Completar Diario
                         General</a>
                 </div> --}}
             </form>
             <div class="row justify-content-center">
             </div>

         </div>
         @include ('contabilidad.modaldiariogeneral')

     </div>
 </div>