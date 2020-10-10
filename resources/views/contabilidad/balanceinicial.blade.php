 {{-- BALANCE HORIZONTAL --}}
 <div class="tab-pane fade show active" id="b_horizontal" role="tabpanel" aria-labelledby="b_horizontal-tab">
<div class="row mb-2 p-sm-2">
  <div class="col-12">
    <table class="table table-sm ">
      <tbody>
        <tr>
          <td>
            <button type="button" class="btn btn-sm  btn-outline-primary" data-toggle="modal" data-target="#a_corriente"   @click="limpiar()">   
               Activo Corriente
          </button>
          </td>
          <td>
            <button type="button" class="btn  btn-sm btn-outline-primary" data-toggle="modal" data-target="#a_nocorriente"  @click="limpiar()">   
           Activo No Corriente
          </button>
          </td>
          <td>
            <button type="button" class="btn  btn-sm btn-outline-success" data-toggle="modal" data-target="#p_corriente" @click="limpiar()">   
             Pasivo Corriente
          </button>
          </td>
          <td>
            <button type="button" class="btn btn-sm  btn-outline-success" data-toggle="modal" data-target="#p_nocorriente" @click="limpiar()">   
             Pasivo No Corriente
          </button>
          </td>
          <td>
            <button type="button" class="btn btn-sm  btn-outline-secondary" data-toggle="modal" data-target="#patrimonio" @click="limpiar()">   
            Patrimonio
          </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
    <div class="row p-3  mb-2 justify-content-center ">
      <div class="col-6">
          <h2 align="center">Balance Inicial</h2>
    </div> 
    <div class="col-8 mb-3">
          <input class="form-control" type="text" v-model="balance_inicial.nombre" placeholder="Nombre del balance inicial" name="" >
        </div>
        <div class="col-5">
          <input class="form-control" type="date" v-model="balance_inicial.fecha" placeholder="Agrega la fecha" name="" >
        </div>
      
      </div>
       <div class="row justify-content-between">
        <div class="col-5  ">
          <h3 class="text-danger">ACTIVOS</h3>
          <h3 class="text-primary">CORRIENTE</h3><br>
            <draggable class="list-group list-group-flush" :list="a_corrientes" group="people" @change="cambioActivo">
                   <div v-for="(element, index) in a_corrientes" :key="element.name">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
              @{{ element.nom_cuenta }}
              <span class="badge-pill">@{{ element.saldo }} <a @click="editAcorriente(index)" class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a><a @click="deleteAcCooriente(index)" class="btn btn-danger btn-sm re_diario"><i class="fas fa-trash-alt"></i></a></span>
          </li> 
                </div>   
                </draggable>
                <table>
              <tbody>
                <tr>
                  <td width="250">TOTAL ACT. CORR.</td>
                  <td class="badge-danger badge">@{{ b_initotal.t_a_corriente }}</td>
                </tr>
              </tbody>
            </table>
            
        <br><br>
                  <h3 class="text-primary">NO CORRIENTE</h3><br>
            <draggable class="list-group list-group-flush" :list="a_nocorrientes" group="people" @change="cambioActivoNo()">
                   <div v-for="(element, index) in a_nocorrientes" :key="element.name">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
              @{{ element.nom_cuenta }}
              <span class="badge-pill">@{{ element.saldo }} <a @click="editANocorriente(index)" class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a><a @click="deleteAcNoCooriente(index)" class="btn btn-danger btn-sm re_diario"><i class="fas fa-trash-alt"></i></a></span>
          </li> 
                </div>   
                </draggable>
            <table>
              <tbody>
                <tr>
                  <td width="250">TOTAL ACT. NO CORR.</td>
                  <td class="badge-danger badge">@{{ b_initotal.t_a_nocorriente }}</td>
                </tr>
              </tbody>
            </table>
            </div>
        <div class="col-5 ">
      <h3 class="text-danger">PASIVO</h3>
          <h3 class="text-primary">CORRIENTE</h3>
          <draggable class="list-group list-group-flush" :list="p_corrientes" group="people" @change="cambioPasivo()">
               <div v-for="(element, index) in p_corrientes" :key="element.name">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
              @{{ element.nom_cuenta }}
              <span class=" badge-pill">@{{ element.saldo }} <a @click="editPcorriente(index)" class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a><a @click="deletePaCooriente(index)" class="btn btn-danger btn-sm re_diario"><i class="fas fa-trash-alt"></i></a></span>
          </li> 
                </div>     
            </draggable> 
            <table>
              <tbody>
                <tr>
                  <td width="250">TOTAL PAS. CORR.</td>
                  <td class="badge-danger badge">@{{ b_initotal.t_p_corriente }}</td>
                </tr>
              </tbody>
            </table>
        <br><br>
           

          <h3 class="text-primary">NO CORRIENTE</h3>
          <draggable class="list-group list-group-flush" :list="p_nocorrientes" group="people" @change="cambioPasivoNo()">
               <div v-for="(element, index) in p_nocorrientes" :key="element.name">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
              @{{ element.nom_cuenta }}
              <span class=" badge-pill">@{{ element.saldo }} <a @click="editPNocorriente(index)" class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a><a @click="deletePaNoCooriente(index)" class="btn btn-danger btn-sm re_diario"><i class="fas fa-trash-alt"></i></a></span>
          </li> 
                </div>     
            </draggable> 
   
            <table>
              <tbody>
                <tr>
                  <td width="250">TOTAL PAS. CORR.</td>
                  <td class="badge-danger badge">@{{ b_initotal.t_p_no_corriente }}</td>
                </tr>
              </tbody>
            </table>
        <br><br>
         <table>
              <tbody>
                <tr>
                  <td class="font-weight-bold" width="250">TOTAL PASIVO</td>
                  <td class="badge-danger badge">@{{ total_balance_inicial.t_pasivo }}</td>
                </tr>
              </tbody>
            </table>
        <br><br>

        <h3 class="text-danger">PATRIMONIO</h3><br>
            <draggable class="list-group list-group-flush" :list="patrimonios" group="people" @change="cambioPatrimonio()">
                    <div v-for="(element, index) in patrimonios" :key="element.name">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    @{{ element.nom_cuenta }}
                    <span class="badge-pill">@{{ element.saldo }} <a @click="editPatrimonio(index)" class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a><a @click="deletePatrimonio(index)" class="btn btn-danger btn-sm re_diario"><i class="fas fa-trash-alt"></i></a></span>
                    </li> 
                    </div>   
              </draggable>
             <table>
              <tbody>
                <tr>
                  <td width="250">TOTAL PATRIMONIO.</td>
                  <td class="badge-danger badge">@{{ b_initotal.t_patrimonio }}</td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
      <div class="row justify-content-between">
        <div class="col-5">
           <table>
              <tbody>
                <tr>
                  <td class="font-weight-bold" style="font-size: 20px;" width="250">TOTAL ACTIVO.</td>
                  <td class="badge-danger badge">@{{ total_balance_inicial.t_activo }}</td>
                </tr>
              </tbody>
            </table>
        </div>
        <div class="col-5">
           <table>
              <tbody>
                <tr>
                  <td class="font-weight-bold" style="font-size: 20px;" width="250">TOT. PAS. Y PATRI.</td>
                  <td class="badge-danger badge">@{{ total_balance_inicial.t_patrimonio_pasivo }}</td>
                </tr>
              </tbody>
            </table>
          <button type="button" class="btn btn-sm  btn-block btn-outline-secondary" data-toggle="modal" data-target="#pasivo_patrimonio">   
          TOTAL
        </button>
        </div>
      </div>

        <div class="row justify-content-center">
          <a class="btn p-2 mt-3 btn-outline-info" @click.prevent="guardarBalanceInicial()">Guardar Balance Inicial</a>
     </div>
      @include ('contabilidad.modalbhorizontal')

 </div>

{{-- BALANCE VERTICAL --}}
 <div class="tab-pane fade" id="b_vertical" role="tabpanel" aria-labelledby="b_vertical-tab">
      <div class="row mb-2 p-sm-2">
      <div class="col-12">
        <table class="table table-sm ">
          <tbody>
            <tr>
              <td>
                <button type="button" class="btn btn-sm  btn-outline-primary" data-toggle="modal" data-target="#a_corriente2"   @click="limpiar()">   
                   Activo Corriente
              </button>
              </td>
              <td>
                <button type="button" class="btn  btn-sm btn-outline-primary" data-toggle="modal" data-target="#a_nocorriente2"  @click="limpiar()">   
               Activo No Corriente
              </button>
              </td>
              <td>
                <button type="button" class="btn  btn-sm btn-outline-success" data-toggle="modal" data-target="#p_corriente2" @click="limpiar()">   
                 Pasivo Corriente
              </button>
              </td>
              <td>
                <button type="button" class="btn btn-sm  btn-outline-success" data-toggle="modal" data-target="#p_nocorriente2" @click="limpiar()">   
                 Pasivo No Corriente
              </button>
              </td>
              <td>
                <button type="button" class="btn btn-sm  btn-outline-secondary" data-toggle="modal" data-target="#patrimonio2" @click="limpiar()">   
                Patrimonio
              </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

       <div class="row p-3  mb-2 justify-content-center ">
        <div class="col-8 mb-3">
          <input class="form-control" type="text" v-model="balance_inicial.nombre" placeholder="Nombre del balance inicial" name="" >
        </div>
          <div class="col-8">
              <h2 align="center">Balance Inicial</h2>
          </div> 
        <div class="col-5">
          <input class="form-control" type="date" v-model="balance_inicial.fecha" placeholder="Agrega la fecha" name="" >
        </div>        
      </div>
      <h2 class="text-center font-weight-bold text-danger">ACTIVOS</h2>
      <div class="row">    
        <div class="col-7">             
          <h3 class="text-primary">ACTIVOS CORRIENTE</h3><br>
            <draggable class="list-group list-group-flush" :list="a_corrientes" group="people" @change="cambioActivo">
              <div v-for="(element, index) in a_corrientes" :key="element.name">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  @{{ element.nom_cuenta }}<span class="badge-pill">@{{ element.saldo }} <a @click="editAcorriente(index)" class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a><a @click="deleteAcCooriente(index)" class="btn btn-danger btn-sm re_diario"><i class="fas fa-trash-alt"></i></a></span>
                </li> 
              </div>   
            </draggable>
          </div>
            <div class="col-12"> 
            <table>
              <tbody>
                <tr>
                  <td class="font-weight-bold" style="font-size: 20px;" width="2000">TOTAL ACT. CORR.</td>
                  <td class="badge-danger badge">@{{ b_initotal.t_a_corriente }}</td>
                </tr>
              </tbody>
            </table>
          </div>
            <div class="col-7"> 
          <h3 class="text-primary">ACTIVOS NO CORRIENTE</h3><br>
            <draggable class="list-group list-group-flush" :list="a_nocorrientes" group="people" @change="cambioActivoNo()">
              <div v-for="(element, index) in a_nocorrientes" :key="element.name">
                <li class="list-group-item d-flex justify-content-between align-items-center">@{{ element.nom_cuenta }}
                  <span class="badge-pill">@{{ element.saldo }} <a @click="editANocorriente(index)" class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a><a @click="deleteAcNoCooriente(index)" class="btn btn-danger btn-sm re_diario"><i class="fas fa-trash-alt"></i></a></span>
                </li> 
              </div>   
            </draggable>
          </div>
           <div class="col-12"> 
            <table>
              <tbody>
                <tr>
                  <td class="font-weight-bold" style="font-size: 20px;" width="2000">TOTAL ACT. NO CORR.</td>
                  <td class="badge-danger badge">@{{ b_initotal.t_a_nocorriente }}</td>
                </tr>
              </tbody>
            </table>

              <table>
              <tbody>
                <tr>
                  <td class="font-weight-bold" style="font-size: 20px;" width="2000">TOTAL ACTIVO.</td>
                  <td class="badge-danger badge">@{{ total_balance_inicial.t_activo }}</td>
                </tr>
              </tbody>
            </table>

        </div>
      </div>
        <h2 class="text-center font-weight-bold text-danger">PASIVOS</h2>
      <div class="row">
    <div class="col-7 ">
          <h3 class="text-primary">PASIVOS CORRIENTE</h3>
          <draggable class="list-group list-group-flush" :list="p_corrientes" group="people" @change="cambioPasivo()">
               <div v-for="(element, index) in p_corrientes" :key="element.name">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      @{{ element.nom_cuenta }}
                      <span class=" badge-pill">@{{ element.saldo }} <a @click="editPcorriente(index)" class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a><a @click="deletePaCooriente(index)" class="btn btn-danger btn-sm re_diario"><i class="fas fa-trash-alt"></i></a></span>
                    </li> 
                </div>     
          </draggable> 
      </div>
      <div class="col-12">
            <table>
              <tbody>
                <tr>
                  <td class="font-weight-bold" style="font-size: 20px;" width="2000">TOTAL PAS. CORR.</td>
                  <td class="badge-danger badge">@{{ b_initotal.t_p_corriente }}</td>
                </tr>
              </tbody>
            </table>
        </div>
        <br><br>
        <div class="col-7 ">
          <h3 class="text-primary">NO CORRIENTE</h3>
          <draggable class="list-group list-group-flush" :list="p_nocorrientes" group="people" @change="cambioPasivoNo()">
               <div v-for="(element, index) in p_nocorrientes" :key="element.name">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
              @{{ element.nom_cuenta }}
              <span class=" badge-pill">@{{ element.saldo }} <a @click="editPNocorriente(index)" class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a><a @click="deletePaNoCooriente(index)" class="btn btn-danger btn-sm re_diario"><i class="fas fa-trash-alt"></i></a></span>
          </li> 
                </div>     
            </draggable> 
   </div>
   <div class="col-12">
            <table>
              <tbody>
                <tr>
                  <td class="font-weight-bold" style="font-size: 20px;" width="2000">TOTAL PAS. CORR.</td>
                  <td class="badge-danger badge">@{{ b_initotal.t_p_no_corriente }}</td>
                </tr>
              </tbody>
            </table>
    </div>
        <br><br>
      <div class="col-12">
         <table>
              <tbody>
                <tr>
                  <td class="font-weight-bold" style="font-size: 20px;" width="2000">TOTAL PASIVO</td>
                  <td class="badge-danger badge">@{{ total_balance_inicial.t_pasivo }}</td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
        <h2 class="text-center font-weight-bold text-danger">PATRIMONIO</h2>
       
<div class="row">
        <div class="col-7">
            <draggable class="list-group list-group-flush" :list="patrimonios" group="people" @change="cambioPatrimonio()">
                    <div v-for="(element, index) in patrimonios" :key="element.name">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    @{{ element.nom_cuenta }}
                    <span class="badge-pill">@{{ element.saldo }} <a @click="editPatrimonio(index)" class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a><a @click="deletePatrimonio(index)" class="btn btn-danger btn-sm re_diario"><i class="fas fa-trash-alt"></i></a></span>
                    </li> 
                    </div>   
              </draggable>
      </div>
      <div class="col-12">
             <table>
              <tbody>
                <tr>
                  <td class="font-weight-bold" style="font-size: 20px;" width="2000">TOTAL PATRIMONIO.</td>
                  <td class="badge-danger badge">@{{ b_initotal.t_patrimonio }}</td>
                </tr>
              </tbody>
            </table>
        </div>
            <div class="col-12">
           <table>
              <tbody>
                <tr>
                  <td class="font-weight-bold" style="font-size: 20px;" width="2000">TOT. PAS. Y PATRI.</td>
                  <td class="badge-danger badge">@{{ total_balance_inicial.t_patrimonio_pasivo }}</td>
                </tr>
              </tbody>
            </table>
          <button type="button" class="btn btn-sm  btn-block btn-outline-secondary" data-toggle="modal" data-target="#pasivo_patrimonio2">   
          TOTAL
        </button>
        </div>
</div>
        <div class="row justify-content-center">
            <a class="btn p-2 mt-3 btn-outline-info" @click.prevent="guardarBalanceInicial()">Guardar Balance Inicial</a>
       </div>
@include ('contabilidad.modalbvertical')
      </div>


