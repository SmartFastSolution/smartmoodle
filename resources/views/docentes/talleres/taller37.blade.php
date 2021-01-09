@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<form action="{{ route('taller1.docente', ['idtaller' => $d]) }}" method="POST">
    @csrf
  <div class="container-fluid p-3">
 
        <div class="card border border-danger mb-3" >
          <div class="card-header "> 
            <div class="row">
              <div class="col-7" style="font-size: 25px;">
            <h1 class="display-3 font-weight-bold">{{ $user->name }} {{ $user->apellido }}</h1>
              </div>
              <div class="col-5">
                <table>
                  <tr>
                    <td width="200" class="font-weight-bold text-danger">Fecha de Entrega:</td>
                    <td>{{Carbon\Carbon::parse($datos->taller->fecha_entrega)->formatLocalized('%d de %B %Y ') }}</td>
                  </tr>
                  <tr>
                    <td width="200" class="font-weight-bold text-primary">Entregado:</td>
                    <td>{{Carbon\Carbon::parse($update_imei->pivot->fecha_entregado)->formatLocalized('%d de %B %Y ') }}</td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold text-info">Estado de entrega:</td>
                    <td > @if ($update_imei->pivot->fecha_entregado <= $datos->taller->fecha_entrega)
                      <span class="badge badge-success">PUNTUAL</span>
                      @else
                      <span class="badge badge-danger">ATRASADO</span>
                    @endif </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div id="admin" class="hidden"></div>
            <h2 class="font-weight-bold "><span class="badge badge-danger">#</span>{{ $datos->enunciado }}</h2>
        @if ($datos->metodo == 'concatenado')
        <div class="row justify-content-md-center">
        <div class="col-12 col-sm-12 col-md-2 mb-3">
            <div class="list-group" id="list-tab" role="tablist">
                @foreach ($modulo as $key => $element)
                  <a class="list-group-item list-group-item-action @if ($key == 0) active @endif" id="list-{{ $element->code }}-list" data-toggle="list"
                    href="#list-{{ $element->code }}" role="tab" aria-controls="{{ $element->code }}">{{ $element->name }}</a>
               @endforeach 
          {{--       <a class="list-group-item list-group-item-action active" id="list-kardex-list" data-toggle="list"
                    href="#list-kardex" role="tab" aria-controls="kardex">Kardex</a>
                <a class="list-group-item list-group-item-action " id="list-kardex-promedio-list" data-toggle="list"
                    href="#list-kardex-promedio" role="tab" aria-controls="kardex-promedio">Kardex Promedio</a>
                <a class="list-group-item list-group-item-action " id="list-diario-list" data-toggle="list"
                    href="#list-diario" role="tab" aria-controls="home">Balance Inicial</a>
                <a class="list-group-item list-group-item-action" id="list-balance_comp-list" data-toggle="list"
                    href="#list-balance_comp" role="tab" aria-controls="profile">Balance de Comprobacion</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
                    href="#list-messages" role="tab" aria-controls="messages">Diario General</a>
                <a class="list-group-item list-group-item-action" id="list-balance-ajustado-list" data-toggle="list"
                    href="#list-balance-ajustado" role="tab" aria-controls="balance-ajustado">Balance Ajustado</a>
                <a class="list-group-item list-group-item-action" id="list-mayor-general-list" data-toggle="list"
                    href="#list-mayor-general" role="tab" aria-controls="mayor-general">Mayor General</a>
                <a class="list-group-item list-group-item-action" id="list-hoja-trabajo-list" data-toggle="list"
                    href="#list-hoja-trabajo" role="tab" aria-controls="hoja-trabajo">Hoja de Trabajo</a>
                <a class="list-group-item list-group-item-action" id="list-estado-resultado-list" data-toggle="list"
                    href="#list-estado-resultado" role="tab" aria-controls="estado-resultado">Estado de
                    Resultado</a>
                <a class="list-group-item list-group-item-action" id="list-balance-general-list" data-toggle="list"
                    href="#list-balance-general" role="tab" aria-controls="balance-general">Balance General</a>
                <a class="list-group-item list-group-item-action" id="list-asento-cierre-list" data-toggle="list"
                    href="#list-asento-cierre" role="tab" aria-controls="asento-cierre">Asientos de Cierre</a>
                <a class="list-group-item list-group-item-action" id="list-libro-caja-list" data-toggle="list"
                    href="#list-libro-caja" role="tab" aria-controls="libro-caja">Libro Caja</a>
                <a class="list-group-item list-group-item-action" id="list-arqueo-caja-list" data-toggle="list"
                    href="#list-arqueo-caja" role="tab" aria-controls="arqueo-caja">Arqueo Caja</a>
                <a class="list-group-item list-group-item-action" id="list-libro-banco-list" data-toggle="list"
                    href="#list-libro-banco" role="tab" aria-controls="libro-banco">Libro Banco</a>
                <a class="list-group-item list-group-item-action" id="list-conciliacion-bancaria-list"
                    data-toggle="list" href="#list-conciliacion-bancaria" role="tab"
                    aria-controls="conciliacion-bancaria">Conciliación Bancaria</a>
                <a class="list-group-item list-group-item-action" id="list-retencion-iva-list" data-toggle="list"
                    href="#list-retencion-iva" role="tab" aria-controls="retencion-iva">Retencion del IVA</a>
                <a class="list-group-item list-group-item-action" id="list-nomina-empleado-list" data-toggle="list"
                    href="#list-nomina-empleado" role="tab" aria-controls="nomina-empleado">Nomina Empleados</a>
                <a class="list-group-item list-group-item-action" id="list-provision-beneficio-list" data-toggle="list"
                    href="#list-provision-beneficio" role="tab" aria-controls="provision-beneficio">Provisión de
                    Benficios</a> --}}
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-10">
            <div class="tab-content" id="nav-tabContent">
              
                {{--ARREGLADOS--}}

                <div class="tab-pane @if ($modulo[0]->code == 'kardex' )show active @endif  fade" id="list-kardex" role="tabpanel"
                    aria-labelledby="list-kardex-list">
                    @include('docentes.contabilidad.kardex')
                </div>

                <div class="tab-pane fade @if ($modulo[0]->code == 'kardex-promedio' )show active @endif " id="list-kardex-promedio" role="tabpanel"
                    aria-labelledby="list-kardex-promedio-list">
                    @include('docentes.contabilidad.kardex_promedio')
                </div>


                <div class="tab-pane fade @if ($modulo[0]->code == 'balance_comp' )show active @endif " id="list-balance_comp" role="tabpanel"
                    aria-labelledby="list-balance_comp-list">
                    @include('docentes.contabilidad.balancecomprobacion')
                </div>

             
                <div class="tab-pane fade @if ($modulo[0]->code == 'messages' )show active @endif  border border-danger " id="list-messages" role="tabpanel"
                    aria-labelledby="list-messages-list">
                    @include('docentes.contabilidad.diariogeneral')
                </div>

                <div class="tab-pane fade @if ($modulo[0]->code == 'balance-ajustado' )show active @endif " id="list-balance-ajustado" role="tabpanel"
                    aria-labelledby="list-balance-ajustado-list">
                    @include('docentes.contabilidad.balanceajustado')
                </div>

                <div class="tab-pane fade @if ($modulo[0]->code == 'mayor-general' )show active @endif  border border-danger " id="list-mayor-general" role="tabpanel"
                    aria-labelledby="list-mayor-general-list">
                    @include('docentes.contabilidad.mayorgeneral')
                </div>

                <div class="tab-pane fade @if ($modulo[0]->code == 'hoja-trabajo' )show active @endif " id="list-hoja-trabajo" role="tabpanel"
                    aria-labelledby="list-hoja-trabajo-list">
                    @include('docentes.contabilidad.hojatrabajo')
                </div>      

                <div class="tab-pane fade @if ($modulo[0]->code == 'diario' )show active @endif  border border-danger p-4" id="list-diario" role="tabpanel"
                    aria-labelledby="list-diario-list">

                    <ul class="nav nav-tabs" id="bInicial" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#b_horizontal" role="tab"
                                aria-controls="b_horizontal" aria-selected="true">Balance Inicial Horizontal</a>
                        </li>
                        @if ($datos->metodo == 'individual')

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#b_vertical" role="tab"
                                aria-controls="b_vertical" aria-selected="false">Balance Inicial Vertical</a>
                        </li>

                        @endif
                    </ul>
                    <div class="tab-content" id="bInicialContent">
                        @include('docentes.contabilidad.balanceinicial')
                    </div>
                </div>

                <div class="tab-pane fade @if ($modulo[0]->code == 'estado-resultado' )show active @endif " id="list-estado-resultado" role="tabpanel"
                    aria-labelledby="list-estado-resultado-list">
                    @include('docentes.contabilidad.estadoresultado')
                </div>

                
                <div class="tab-pane fade @if ($modulo[0]->code == 'balance-general' )show active @endif " id="list-balance-general" role="tabpanel"
                    aria-labelledby="list-balance-general-list">
                    @include('docentes.contabilidad.balancegeneral')
                </div>

                <div class="tab-pane fade @if ($modulo[0]->code == 'asento-cierre' )show active @endif " id="list-asento-cierre" role="tabpanel"
                    aria-labelledby="list-asento-cierre-list">
                    @include('docentes.contabilidad.asientosdecierre')
                </div>
                {{--ARREGLADOS--}}

                {{--parte anexos arreglado--}}

                <div class="tab-pane fade @if ($modulo[0]->code == 'libro-caja' )show active @endif " id="list-libro-caja" role="tabpanel" aria-labelledby="list-libro-caja-list">
                    @include('docentes.contabilidad.librocaja')
                </div>

                <div class="tab-pane fade @if ($modulo[0]->code == 'conciliacion-bancaria' )show active @endif " id="list-conciliacion-bancaria" role="tabpanel"
                    aria-labelledby="list-conciliacion-bancaria-list">
                    @include('docentes.contabilidad.conciliacionbancaria')

                </div>

                <div class="tab-pane fade @if ($modulo[0]->code == 'arqueo-caja' )show active @endif " id="list-arqueo-caja" role="tabpanel"
                    aria-labelledby="list-arqueo-caja-list">
                    @include('docentes.contabilidad.arqueocaja')

                </div>

                <div class="tab-pane fade @if ($modulo[0]->code == 'libro-banco' )show active @endif " id="list-libro-banco" role="tabpanel"
                    aria-labelledby="list-libro-banco-list">
                    @include('docentes.contabilidad.librobanco')
                </div>

                <div class="tab-pane fade @if ($modulo[0]->code == 'retencion-iva' )show active @endif " id="list-retencion-iva" role="tabpanel"
                    aria-labelledby="list-retencion-iva-list">
                    @include('docentes.contabilidad.retencioniva')
                </div>

                <div class="tab-pane fade @if ($modulo[0]->code == 'nomina-empleado' )show active @endif " id="list-nomina-empleado" role="tabpanel"
                    aria-labelledby="list-nomina-empleado-list">
                    @include('docentes.contabilidad.nominaempleados')
                </div>
                <div class="tab-pane fade @if ($modulo[0]->code == 'provision-beneficio' )show active @endif " id="list-provision-beneficio" role="tabpanel"
                    aria-labelledby="list-provision-beneficio-list">
                    @include('docentes.contabilidad.provisiondebeneficio')
                </div>
                {{--parte anexos arreglados--}}
            </div>
        </div>
    </div>
      @elseif($datos->metodo == 'individual')
            <div class="row">
        <div class="col-12">
            @if ($datos->balance_inicial_vertical == 1)
             {{--    <ul class="nav nav-tabs" id="bInicial" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#b_vertical" role="tab"
                                aria-controls="b_vertical" aria-selected="false">Balance Inicial Vertical</a>
                        </li>
                    </ul> --}}
                    <div class="tab-content" id="bInicialContent">
                        @include('docentes.contabilidad.balanceinicial')
                    </div>

            @elseif ($datos->balance_inicial_horizontal == 1)
        {{--     <ul class="nav nav-tabs" id="bInicial" role="tablist">
                    <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#b_horizontal" role="tab"
                                aria-controls="b_horizontal" aria-selected="true">Balance Inicial Horizontal</a>
                        </li>
                    </ul> --}}
                    <div class="tab-content" id="bInicialContent">
                        @include('docentes.contabilidad.balanceinicial')
                    </div>
            @elseif ($datos->kardex_fifo == 1)
                    @include('docentes.contabilidad.kardex')
                @elseif ($datos->kardex_promedio == 1)
                    @include('docentes.contabilidad.kardex_promedio')
                
                @elseif ($datos->balance_comprobacion== 1)
                    @include('docentes.contabilidad.balancecomprobacion')
                
                @elseif ($datos->diario_general == 1)
                    @include('docentes.contabilidad.diariogeneral')
                
                @elseif ($datos->balance_comprobacion_ajustado == 1)
                    @include('docentes.contabilidad.balanceajustado')
                
                @elseif ($datos->mayor_general == 1)
                    @include('docentes.contabilidad.mayorgeneral')
                
                @elseif ($datos->hoja_trabajo == 1)
                    @include('docentes.contabilidad.hojatrabajo')
                
                @elseif ($datos->estado_resultado == 1)
                    @include('docentes.contabilidad.estadoresultado')
                
                @elseif ($datos->balance_general == 1)
                    @include('docentes.contabilidad.balancegeneral')
                
                @elseif ($datos->asientos_cierre == 1)
                    @include('docentes.contabilidad.asientosdecierre')
                
                @elseif ($datos->librocaja == 1)
                
                    @include('docentes.contabilidad.librocaja')
                
                @elseif ($datos->conciliacionbancaria == 1)
                    @include('docentes.contabilidad.conciliacionbancaria')
                
                @elseif ($datos->arqueocaja == 1)
                    @include('docentes.contabilidad.arqueocaja')
                
                @elseif ($datos->librobanco == 1)
                    @include('docentes.contabilidad.librobanco')
                
                @elseif ($datos->retencioniva == 1)
                    @include('docentes.contabilidad.retencioniva')
                
                @elseif ($datos->nominaempleados == 1)
                    @include('docentes.contabilidad.nominaempleados')
                
                @elseif ($datos->provisiondebeneficio == 1)
                    @include('docentes.contabilidad.provisiondebeneficio')

            @endif
        </div>
    </div>

      @endif
          </div>
            <div class="row justify-content-center">
            <div class="col-5">
              <div class="form-group">
                <label for="exampleFormControlInput1">Calificacion</label>
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="text" value="{{ $update_imei->pivot->calificacion }}" class="form-control" name="calificacion" placeholder="Añada una nota al estudiante">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Retroalimentacion</label>
                <textarea class="form-control" name="retroalimentacion" rows="3" placeholder="Agregue una retroalimentacion">{{ $update_imei->pivot->retroalimentacion }}</textarea>
              </div>   
               <div class="row justify-content-center mb-5">
                <input type="submit" value="Calificar" class="btn p-2 mt-3 btn-danger">
             </div>
            </div>
        </div>
        </div>  
  </div>
</form>

@section('js')
<script>
  let taller = @json($d);
  let user = @json($user->id);
  let datos = @json($datos);
console.log(datos)
  let administrador = new Vue({
    el: '#admin',
    data:{

    },
    mounted: function () {
    },
    methods:{

    }
  
  })
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////BALANCE INICIAL HORIZONTAL/////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(document.getElementById('b_horizontal')){
const b_hori = new Vue({
        el: '#b_horizontal',
        
        data:{
        id_taller: taller,
        user_id:user,
        tipo: 'horizontal',
        balance_inicial:{ 
          nombre:'',
          fecha:''
        },
        total_balance_inicial:{ 
          t_activo:'',
          t_pasivo:'',
          t_patrimonio_pasivo:''
        },
        b_initotal:{
            t_a_corriente:'', 
            t_a_nocorriente:'', 
            t_p_corriente:'', 
            t_p_no_corriente:'', 
            t_patrimonio:'' 
        },
        a_corrientes:[], 
        a_nocorrientes:[], 
        p_corrientes:[], 
        p_nocorrientes:[], 
        patrimonios:[], 

 
  },
  mounted: function () {
    this.obtenerBalance();
  },
  methods:{
           decimales(saldo){
      if (saldo !== null && saldo !== '' && saldo !== 0) {
         let total = Number(saldo).toFixed(2);
      return total;
    }else{
      return
    }
     
    },
        formatoFecha(fecha){
      if (fecha !== null) {
         let date = fecha.split('-').reverse().join('-');
      return date;
    }else{
      return
    }
     
    },
      obtenerBalance:function(){
    var _this = this;
      var url = '/sistema/admin/docente/obtenerbalance';
          axios.post(url,{
          id: _this.id_taller,
          tipo: _this.tipo,
          user: _this.user_id,
      }).then(response => {
        if (response.data.tipo == _this.tipo || response.data.datos == true ) {
          _this.balance_inicial.nombre = response.data.nombre
          _this.balance_inicial.fecha = response.data.fecha
          _this.a_corrientes = response.data.a_corriente;
          _this.a_nocorrientes = response.data.a_nocorriente;
          _this.p_corrientes = response.data.p_corriente;
          _this.p_nocorrientes = response.data.p_nocorriente;
          _this.patrimonios = response.data.patrimonios;
          _this.total_balance_inicial.t_patrimonio_pasivo = response.data.total_pasivo_patrimonio;
          _this.total_balance_inicial.t_activo = response.data.completo.total_activo_corriente
          _this.total_balance_inicial.t_pasivo = response.data.completo.total_activo_nocorriente
          _this.b_initotal.t_a_corriente = response.data.completo.total_pasivo_corriente
          _this.b_initotal.t_a_nocorriente = response.data.completo.total_pasivo_nocorriente
          _this.b_initotal.t_p_corriente = response.data.completo.total_activo
          _this.b_initotal.t_p_no_corriente = response.data.completo.total_pasivo
          _this.b_initotal.t_patrimonio = response.data.completo.total_patrimonio

        } else {

        }
      }).catch(function(error){
      
      });

  }
  }
});
}


if(document.getElementById('b_vertical')){
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////BALANCE INICIAL HORIZONTAL/////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
const b_ver = new Vue({
        el: '#b_vertical',
        

        data:{
        user_id:user,
        id_taller: taller,
        tipo: 'vertical',
        balance_inicial:{ 
          nombre:'',
          fecha:''
        },
        total_balance_inicial:{ 
          t_activo:'',
          t_pasivo:'',
          t_patrimonio_pasivo:''
        },
        b_initotal:{
            t_a_corriente:'', 
            t_a_nocorriente:'', 
            t_p_corriente:'', 
            t_p_no_corriente:'', 
            t_patrimonio:'' 
        },
        a_corrientes:[], 
        a_nocorrientes:[], 
        p_corrientes:[], 
        p_nocorrientes:[], 
        patrimonios:[], 

 
  },
    mounted: function () {
    this.obtenerBalance();
  },
  methods:{
           decimales(saldo){
      if (saldo !== null && saldo !== '' && saldo !== 0) {
         let total = Number(saldo).toFixed(2);
      return total;
    }else{
      return
    }
     
    },
        formatoFecha(fecha){
      if (fecha !== null) {
         let date = fecha.split('-').reverse().join('-');
      return date;
    }else{
      return
    }
     
    },
      obtenerBalance:function(){
    var _this = this;
      var url = '/sistema/admin/docente/obtenerbalance';
          axios.post(url,{
          id: _this.id_taller,
          tipo: _this.tipo,
          user: _this.user_id,
      }).then(response => {
        if (response.data.tipo == _this.tipo || response.data.datos == true ) {
            toastr.success(response.data.message, "Smarmoddle", {
          "timeOut": "3000"
         });
          _this.balance_inicial.nombre = response.data.nombre
          _this.balance_inicial.fecha = response.data.fecha
          _this.a_corrientes = response.data.a_corriente;
          _this.a_nocorrientes = response.data.a_nocorriente;
          _this.p_corrientes = response.data.p_corriente;
          _this.p_nocorrientes = response.data.p_nocorriente;
          _this.patrimonios = response.data.patrimonios;
          _this.total_balance_inicial.t_patrimonio_pasivo = response.data.total_pasivo_patrimonio;       
        } else {

        }
      }).catch(function(error){
      
      });

  }
  }
});
}


if(document.getElementById('asientos_cierre')){

const asientos_cierre = new Vue({
 el: '#asientos_cierre',
    data:{
      id_taller: taller,
      user_id: user,
      nombre:'',
      fechabalance:'',
       registros:[
       ],
       eliminar:{
        index:''
       },
        pasan:{ 
          debe:0, 
          haber:0
        },
        total:{
          debe:0,
          haber:0,
        },
        dato:[],
        b_initotal:{}
    },
    mounted: function () {
    this.obtenerAsientoCierre();
  },
    methods:{
             decimales(saldo){
      if (saldo !== null && saldo !== '' && saldo !== 0) {
         let total = Number(saldo).toFixed(2);
      return total;
    }else{
      return
    }
     
    },
        formatoFecha(fecha){
      if (fecha !== null) {
         let date = fecha.split('-').reverse().join('-');
      return date;
    }else{
      return
    }
     
    },
        totalDebe: function(){
            this.pasan.debe = 0;
            let regis = this.registros;
            let total = 0;        
            regis.forEach(function(obj, index){
              obj.debe.forEach(function(sal, id){
                total += Number(sal.saldo);
              })
            });
            // console.log(total);
            this.pasan.debe =  total;
          },
    totalHaber: function(){
            this.pasan.haber = 0;
            let regis = this.registros;
            let total = 0;
            
            regis.forEach(function(obj, index){
              obj.haber.forEach(function(sal, id){
                total += Number(sal.saldo);
              })
            });
            // console.log(total);  
            this.pasan.haber =   total;
          }, 
        obtenerAsientoCierre: function(){
        let _this = this;
        let url = '/sistema/admin/docente/asiento-cierre-obtener';
            axios.post(url,{
              id: _this.id_taller,
              user: _this.user_id,

        }).then(response => {
          if (response.data.datos == true) {
          _this.registros = response.data.registros;
          _this.nombre = response.data.nombre;
           toastr.success("Diairo General cargado Correctamente", "Smarmoddle", {
                "timeOut": "3000"
                });
           this.totalDebe()
           this.totalHaber()
            }          
        }).catch(function(error){

        }); 
    }

    }
});

}

if(document.getElementById('kardex')){
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////KARDEX ///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

const kardex = new Vue({
  el: "#kardex",
  data:{
    id_taller: taller,
    user_id: user,
      user_id: user,
    producto:'',
    producto_id:'',
    productos:[],
    nombre:'',
    suman:{
      ingreso_cantidad:0,
      ingreso_total:0,
      egreso_cantidad:0,
      egreso_total:0,
      muestra:0
    },
    datos_transacciones:'',
    totales:{
      cantidad:'',
      precio:'',
      subtotal:'',
      total:''
    },
      prueba:{
      cantidad:{
        inventario_inicial:'',
        adquicisiones:'',
        ventas:'',
        inventario_final:''
      },
      precio:{
        inventario_inicial:'',
        adquicisiones:'',
        ventas:'',
        inventario_final:''
      }
    },
    ejercicio:[],
    transacciones:[
    ],
    movimientos:[],
  },
      mounted: function () {
    this.obtenerKardexFifo();
  },
methods:{
  
           decimales(saldo){
      if (saldo !== null && saldo !== '' && saldo !== 0) {
         let total = Number(saldo).toFixed(2);
      return total;
    }else{
      return
    }
     
    },
        formatoFecha(fecha){
      if (fecha !== null) {
         let date = fecha.split('-').reverse().join('-');
      return date;
    }else{
      return
    }
     
    },
        sumasTotales(){
      let transacciones = this.transacciones;
      let in_cantidad = 0;
      let in_total    = 0;
      let eg_cantidad = 0;
      let eg_total    = 0;

        //INGRESO CANTIDAD
       transacciones.forEach(function(transaccion, i){
              transaccion.forEach(function(ingreso_cantidad, id){
                let temp = ingreso_cantidad.ingreso_cantidad;

                if (temp != null && temp !=='') {
                    in_cantidad += parseInt(temp)
                  // console.log(temp);
                } 
              })
            });
       this.suman.ingreso_cantidad = in_cantidad;

        //INGRESO TOTAL

        transacciones.forEach(function(transaccion, i){
              transaccion.forEach(function(ingreso_total, id){
                let temp1 = ingreso_total.ingreso_total;

                if (temp1 != null && temp1 !=='') {
                    in_total += Number(temp1)
                  // console.log(temp1);
                } 
              })
            });
       this.suman.ingreso_total = in_total.toFixed(2);

       console.log(in_total)


        //EGRESO CANTIDAD
       transacciones.forEach(function(transaccion, i){
              transaccion.forEach(function(egreso_cantidad, id){
                let temp = egreso_cantidad.egreso_cantidad;

                if (temp != null && temp !=='') {
                    eg_cantidad += parseInt(temp)
                  // console.log(temp);
                } 
              })
            });
       this.suman.egreso_cantidad = eg_cantidad;

        //EGRESO TOTAL

        transacciones.forEach(function(transaccion, i){
              transaccion.forEach(function(egreso_total, id){
                let temp1 = egreso_total.egreso_total;

                if (temp1 != null && temp1 !=='') {
                    eg_total += Number(temp1)
                  // console.log(temp1);
                } 
              })
            });
       this.suman.egreso_total = eg_total.toFixed(2);

       console.log(in_total)

    },
     obtenerKardexFifo: function() {
        let _this = this;
        let url = '/sistema/admin/docente/kardex-obtener-fifo';
            axios.post(url,{
              id: _this.id_taller,
              producto_id: _this.producto_id,
              user: _this.user_id,

        }).then(response => {
          if (response.data.datos == true) {
              toastr.info("Kardex Promedio cargado correctamente", "Smarmoddle", {
            "timeOut": "3000"
            });
              _this.transacciones = response.data.kardex_fifo;
              _this.nombre =  response.data.informacion.nombre;
              _this.producto = response.data.informacion.producto;
               _this.prueba.cantidad.inventario_inicial = response.data.informacion.inv_inicial_cantidad;
               _this.prueba.cantidad.adquicisiones      = response.data.informacion.adquisicion_cantidad;
               _this.prueba.cantidad.ventas             = response.data.informacion.ventas_cantidad;
               _this.prueba.cantidad.inventario_final   = response.data.informacion.inv_final_cantidad;
               _this.prueba.precio.inventario_inicial = response.data.informacion.inv_inicial_precio;
               _this.prueba.precio.adquicisiones      = response.data.informacion.adquisicion_precio;
               _this.prueba.precio.ventas             = response.data.informacion.ventas_precio;
               _this.prueba.precio.inventario_final   = response.data.informacion.inv_final_precio;

              let datos = this.productos.filter(x => x.id == _this.producto_id);
              _this.datos_transacciones =  datos[0].transacciones  
              this.sumasTotales();
            }else{
                 _this.transacciones = [];
              _this.nombre =  '';
              _this.producto = '';
               _this.prueba.cantidad.inventario_inicial = '';
               _this.prueba.cantidad.adquicisiones      = '' ;
               _this.prueba.cantidad.ventas             = '' ;
               _this.prueba.cantidad.inventario_final   = '' ;
               _this.prueba.precio.inventario_inicial = '' ;
               _this.prueba.precio.adquicisiones      = '' ;
               _this.prueba.precio.ventas             = '' ;
               _this.prueba.precio.inventario_final   = '' ;
                let datos = this.productos.filter(x => x.id == _this.producto_id);
              _this.datos_transacciones =  datos[0].transacciones 
              this.sumasTotales();
                
            }        
        }).catch(function(error){

        }); 
     },
}

  });
}

if(document.getElementById('kardex_promedio')){
const kardex_promedio = new Vue({

  el: "#kardex_promedio",
  data:{
    id_taller: taller,
    user_id: user,
    kardex_id:'',
    producto:'',
    producto_id:'',
    nombre:'',
    transacciones:[],
    prueba:{
      cantidad:{
        inventario_inicial:'',
        adquicisiones:'',
        ventas:'',
        inventario_final:''
      },
      precio:{
        inventario_inicial:'',
        adquicisiones:'',
        ventas:'',
        inventario_final:''
      }
    },
    suman:{
      ingreso_cantidad:0,
      ingreso_total:0,
      egreso_cantidad:0,
      egreso_total:0,
      muestra:0
    },
  },
  mounted: function() {
   this.obtenerKardexPromedio();
  },
  methods:{
           decimales(saldo){
      if (saldo !== null && saldo !== '' && saldo !== 0) {
         let total = Number(saldo).toFixed(2);
      return total;
    }else{
      return
    }
     
    },
        formatoFecha(fecha){
      if (fecha !== null) {
         let date = fecha.split('-').reverse().join('-');
      return date;
    }else{
      return
    }
     
    },
         sumasTotales(){
      let transacciones = this.transacciones;
      let in_cantidad = 0;
      let in_total    = 0;
      let eg_cantidad = 0;
      let eg_total    = 0;
      let conteo = transacciones.length;
      if (conteo == 0 ) {
         this.suman.ingreso_cantidad = 0;
         this.suman.ingreso_total = 0;
        this.suman.egreso_cantidad = 0;
         this.suman.egreso_total = 0;
         return
      }
        //INGRESO CANTIDAD
            transacciones.forEach(function(ingreso_cantidad, id){
                let temp = ingreso_cantidad.ingreso_cantidad;

                if (temp != null && temp !=='') {
                    in_cantidad += parseInt(temp)
                  // console.log(temp);
                } 
            });
       this.suman.ingreso_cantidad = in_cantidad;

        //INGRESO TOTAL

              transacciones.forEach(function(ingreso_total, id){
                let temp1 = ingreso_total.ingreso_total;

                if (temp1 != null && temp1 !=='') {
                    in_total += Number(temp1)
                  // console.log(temp1);
                } 
            });
       this.suman.ingreso_total = in_total.toFixed(2)

       console.log(in_total)


        //EGRESO CANTIDAD
              transacciones.forEach(function(egreso_cantidad, id){
                let temp = egreso_cantidad.egreso_cantidad;

                if (temp != null && temp !=='') {
                    eg_cantidad += parseInt(temp)
                  // console.log(temp);
                } 
            });
       this.suman.egreso_cantidad = eg_cantidad;

        //EGRESO TOTAL

              transacciones.forEach(function(egreso_total, id){
                let temp1 = egreso_total.egreso_total;

                if (temp1 != null && temp1 !=='') {
                    eg_total += Number(temp1)
                  // console.log(temp1);
                } 
            });
       this.suman.egreso_total = eg_total.toFixed(2)

       console.log(in_total)

    },
            obtenerKardexPromedio: function() {
        let _this = this;
        let url = '/sistema/admin/docente/kardex-obtener-promedio';
            axios.post(url,{
              id: _this.id_taller,
              producto_id: _this.producto_id,
              user:_this.user_id
        }).then(response => {
          if (response.data.datos == true) {
              toastr.info("Kardex Promedio cargado correctamente", "Smarmoddle", {
            "timeOut": "3000"
            });
              _this.transacciones = response.data.kardex_promedio;
              _this.nombre =  response.data.informacion.nombre;
              _this.producto = response.data.informacion.producto;
               _this.prueba.cantidad.inventario_inicial = response.data.informacion.inv_inicial_cantidad;
               _this.prueba.cantidad.adquicisiones      = response.data.informacion.adquisicion_cantidad;
               _this.prueba.cantidad.ventas             = response.data.informacion.ventas_cantidad;
               _this.prueba.cantidad.inventario_final   = response.data.informacion.inv_final_cantidad;
               _this.prueba.precio.inventario_inicial = response.data.informacion.inv_inicial_precio;
               _this.prueba.precio.adquicisiones      = response.data.informacion.adquisicion_precio;
               _this.prueba.precio.ventas             = response.data.informacion.ventas_precio;
               _this.prueba.precio.inventario_final   = response.data.informacion.inv_final_precio;
               this.sumasTotales();
            }else{
               _this.transacciones                      = [];
               _this.nombre                             =  '';
               _this.producto                           = '';
               _this.prueba.cantidad.inventario_inicial = '';
               _this.prueba.cantidad.adquicisiones      = '';
               _this.prueba.cantidad.ventas             = '';
               _this.prueba.cantidad.inventario_final   = '';
               _this.prueba.precio.inventario_inicial   = '';
               _this.prueba.precio.adquicisiones        = '';
               _this.prueba.precio.ventas               = '';
               _this.prueba.precio.inventario_final     = '';
               this.sumasTotales();

            }         
        }).catch(function(error){

        }); 
     } 
  }

});

}

if(document.getElementById('diario')){

const diario = new Vue({
 el: '#diario',
    data:{
      id_taller: taller,
      user_id: user,
      datos_diario: '',
      producto_id: 1,
      nombre:'',
      fechabalance:'',
transacciones:'',
       registros:[
       ],
       eliminar:{
        index:''
       },
       ajustes:[],
        pasan:{ 
          debe:0, 
          haber:0
        },
        total:{
          debe:0,
          haber:0,
        },
        dato:[]
    },
      mounted: function() {
   this.obtenerDiarioGeneral();
  },
    methods:{
          totalDebe: function(){
            this.pasan.debe = 0;
            let regis = this.registros;
            let total = 0;        
            regis.forEach(function(obj, index){
              obj.debe.forEach(function(sal, id){
                total += Number(sal.saldo);
              })
            });
            // console.log(total);
            this.pasan.debe =  total;
          },
        totalHaber: function(){
            this.pasan.haber = 0;
            let regis = this.registros;
            let total = 0;
            
            regis.forEach(function(obj, index){
              obj.haber.forEach(function(sal, id){
                total += Number(sal.saldo);
              })
            });
            // console.log(total);  
            this.pasan.haber =  total;
          }, 
             decimales(saldo){
      if (saldo !== null && saldo !== '' && saldo !== 0) {
         let total = Number(saldo).toFixed(2);
      return total;
    }else{
      return
    }
     
    },
        formatoFecha(fecha){
      if (fecha !== null) {
         let date = fecha.split('-').reverse().join('-');
      return date;
    }else{
      return
    }
     
    },
          obtenerDiarioGeneral: function(){
        let _this = this;
        let url = '/sistema/admin/docente/diariogeneral';
            axios.post(url,{
              id: _this.id_taller,
              user:_this.user_id
        }).then(response => {
          if (response.data.datos == true) {
          _this.registros = response.data.registros;
          _this.ajustes = response.data.ajustes;
          _this.nombre = response.data.nombre;
          _this.total.debe = Number(response.data.t_haber);
          _this.total.haber  = Number(response.data.t_debe);
       
          if ( response.data.tieneinicial == true) {
            let inicial = response.data.inicial;
            _this.registros.unshift(inicial);
          }
             this.totalDebe();
          this.totalHaber();
            }          
        }).catch(function(error){

        }); 
      }
    }
  });


}

if(document.getElementById('mayor_general')){

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////MAYOR GENERAL//////// /////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
let mayor_general = new Vue({
  el: "#mayor_general",
  data:{
     id_taller: taller,
     user_id: user,
      nombre:'',
      nombre_dgral:'',
      fechabalance:'',
      complete:false,
      options: '',
      
       dgeneral:[],
        nombre_kardex:'',
        producto_kardex:'',
        registros:[],
       ajustes:[],
  },
  mounted: function() {
   this.obtenerMayorGeneral();
  },
methods:{
         decimales(saldo){
      if (saldo !== null && saldo !== '' && saldo !== 0) {
         let total = Number(saldo).toFixed(2);
      return total;
    }else{
      return
    }
     
    },
        formatoFecha(fecha){
      if (fecha !== null) {
         let date = fecha.split('-').reverse().join('-');
      return date;
    }else{
      return
    }
     
    },
      obtenerMayorGeneral: function(){
        var _this = this;
        var url = '/sistema/admin/docente/mayorgeneral';
            axios.post(url,{
              id: _this.id_taller,
              user: _this.user_id
        }).then(response => {
          if (response.data.datos == true) {
          _this.registros = response.data.registros;
          _this.nombre = response.data.nombre;
            }          
        }).catch(function(error){

        }); 
    }
}

});

}


if(document.getElementById('balance_comp')){
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////BALANCE DE COMPROBACION /////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

const balance_comp = new Vue({
  el: '#balance_comp',
  data:{
    nombre:'',
    fecha:'',
    enunciados: ``,
    id_taller: taller,
    user_id: user,
    balances:[], 
    mayorgeneral:[],
    suman:{ 
      sum_debe:0,
      sum_haber:0,
      sal_debe:0,
      sal_haber:0,
    }
  },
   mounted: function() {
   this.obtenerBalanceCom();
  },
  methods:{
           decimales(saldo){
      if (saldo !== null && saldo !== '' && saldo !== 0) {
         let total = Number(saldo).toFixed(2);
      return total;
    }else{
      return
    }
     
    },
        formatoFecha(fecha){
      if (fecha !== null) {
         let date = fecha.split('-').reverse().join('-');
      return date;
    }else{
      return
    }
     
    },
        obtenerBalanceCom: function() {
        let _this = this;
        let url = '/sistema/admin/docente/balance-obtener-comprobacion';
            axios.post(url,{
              id: _this.id_taller,
              user: _this.user_id
        }).then(response => {
          if (response.data.datos == true) {
              toastr.info("Balance de Comprobacion cargado correctamente", "Smarmoddle", {
            "timeOut": "3000"
            });
              this.balances = response.data.bcomprobacion;
              this.nombre = response.data.nombre;
              this.fecha = response.data.fecha;
              _this.suman.sum_debe = response.data.balanceCompro.sum_debe
              _this.suman.sum_haber = response.data.balanceCompro.sum_haber
              _this.suman.sal_debe = response.data.balanceCompro.sal_debe
              _this.suman.sal_haber = response.data.balanceCompro.sal_haber
            }          
        }).catch(function(error){

        }); 
     } 
  }

  });

}


if(document.getElementById('hoja_trabajo')){

let hoja_trabajo = new Vue({
  el: "#hoja_trabajo",
  data:{
    id_taller: taller,
    user_id: user,
    nombre:'',
    balances:[],
    registros:[],
    suman:{
      balance_comp:{
        total_debe:0,
        total_haber:0
      },
       ajustes:{
        total_debe:0,
        total_haber:0
      },
       balance_ajustado:{
        total_debe:0,
        total_haber:0
      },
       estado_resultado:{
        total_debe:0,
        total_haber:0
      },
       balance_general:{
        total_debe:0,
        total_haber:0
      },
    },

  },
    mounted: function() {
   this.obtenerHojita();
  },

  methods:{
           decimales(saldo){
      if (saldo !== null && saldo !== '' && saldo !== 0) {
         let total = Number(saldo).toFixed(2);
      return total;
    }else{
      return
    }
     
    },
        formatoFecha(fecha){
      if (fecha !== null) {
         let date = fecha.split('-').reverse().join('-');
      return date;
    }else{
      return
    }
     
    },
      obtenerHojita: function() {
        let _this = this;
        let url = '/sistema/admin/docente/hoja-obtener-trabajo';
            axios.post(url,{
              id: _this.id_taller,
              user: _this.user_id
        }).then(response => {
          if (response.data.datos == true) {
              _this.registros                          = response.data.hojatrabajo;
              _this.nombre                             = response.data.nombre;
              _this.suman.balance_comp.total_debe      = response.data.totales.bc_total_debe;
              _this.suman.balance_comp.total_haber     = response.data.totales.bc_total_haber;
              _this.suman.ajustes.total_debe           = response.data.totales.ajuste_total_debe;
              _this.suman.ajustes.total_haber          = response.data.totales.ajuste_total_haber;
              _this.suman.balance_ajustado.total_debe  = response.data.totales.ba_total_debe;
              _this.suman.balance_ajustado.total_haber = response.data.totales.ba_total_haber;
              _this.suman.estado_resultado.total_debe  = response.data.totales.er_total_debe;
              _this.suman.estado_resultado.total_haber = response.data.totales.er_total_haber;
              _this.suman.balance_general.total_debe   = response.data.totales.bg_total_debe;
              _this.suman.balance_general.total_haber  = response.data.totales.bg_total_haber;
            }          
        }).catch(function(error){

        }); 
     } 
  }

});
}


if(document.getElementById('balance_ajustado')){
const balance_ajustado = new Vue({
  el: "#balance_ajustado",
  data:{
      id_taller: taller,
      user_id: user,
      hojatrabajo:[],
      nombre_hoja:'',
      nombre:'',
    balances_ajustados:[],
    suman:{ 
      debe:0,
      haber:0,
    },
  },
     mounted: function() {
   this.obtenerBalanceAjus();
  },

  methods:{
           decimales(saldo){
      if (saldo !== null && saldo !== '' && saldo !== 0) {
         let total = Number(saldo).toFixed(2);
      return total;
    }else{
      return
    }
     
    },
        formatoFecha(fecha){
      if (fecha !== null) {
         let date = fecha.split('-').reverse().join('-');
      return date;
    }else{
      return
    }
     
    },
    obtenerBalanceAjus: function() {
        let _this = this;
        let url = '/sistema/admin/docente/balance-obtener-ajustado';
            axios.post(url,{
              id: _this.id_taller,
              user:_this.user_id
        }).then(response => {
          if (response.data.datos == true) {
          this.balances_ajustados = response.data.bcomprobacionAjustado;
          this.suman.debe = response.data.t_debe;
          this.suman.haber = response.data.t_haber;
            }          
        }).catch(function(error){

        }); 
     } 
  }
});
}


if(document.getElementById('estado_resultado')){
const estado_resultado = new Vue({

  el: "#estado_resultado",
   data:{
    id_taller: taller,
    user_id: user,
    nombre_hoja:'',
    venta:'',
    costo_venta:'',
    producto:'',
    nombre:'',
    fecha:'',
    ingresos:[],
    gastos:[],
    utilidad:'',
    utilidad_bruta:{
      costo:'',
      costo_venta:'',
    },
    utilidades:[],
    totales:{
      ingreso:0,
      gasto:0,
      utilidad_bruta_ventas:'',
      utilidad_neta_o:0,
      utilidad_ejercicio:'',
      utilidad_liquida:''
    }
  },
  mounted: function() {
   this.obtenerEstadoResultado();
  },
  methods:{
           decimales(saldo){
      if (saldo !== null && saldo !== '' && saldo !== 0) {
         let total = Number(saldo).toFixed(2);
      return total;
    }else{
      return
    }
     
    },
        formatoFecha(fecha){
      if (fecha !== null) {
         let date = fecha.split('-').reverse().join('-');
      return date;
    }else{
      return
    }
     
    },
        obtenerEstadoResultado: function() {
    let _this = this;
    let url = '/sistema/admin/docente/estado-obtener-resultado';
        axios.post(url,{
          id: _this.id_taller,
              user:_this.user_id

    }).then(response => {
      if (response.data.datos == true) {
           _this.nombre                        = response.data.estadoresultado.nombre
                    _this.fecha                         = response.data.estadoresultado.fecha
                    _this.ingresos                      = response.data.ingresos;
                    _this.gastos                        = response.data.gastos;
                    _this.utilidades                    = response.data.utilidades;
                    _this.utilidad                      = response.data.estadoresultado.utilidad;
                    _this.venta                         = response.data.estadoresultado.venta
                    _this.costo_venta                   = response.data.estadoresultado.costo_venta
                    _this.totales.utilidad_bruta_ventas = response.data.estadoresultado.utilidad_bruta_ventas
                    _this.utilidad_bruta.venta          = response.data.estadoresultado.venta
                    _this.utilidad_bruta.costo_venta    = response.data.estadoresultado.costo_venta
                    _this.totales.utilidad_ejercicio    = response.data.estadoresultado.utilidad_ejercicio
                    _this.totales.utilidad_liquida      = response.data.estadoresultado.utilidad_liquida
                    _this.totales.utilidad_neta_o      = response.data.estadoresultado.utilidad_neta_o
                    _this.totales.gasto      = response.data.estadoresultado.total_gastos
                _this.totales.ingreso      = response.data.estadoresultado.total_ingresos
             
        }          
    }).catch(function(error){

    }); 
    } 
  }

  });

}


if(document.getElementById('balance_general')){
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////BALANCE GENERAL ///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

const balance_general = new Vue({

  el: "#balance_general",
  data:{
    nombre:'',
    fecha:'',
        id_taller: taller,
        user_id: user,
        balance_general:{ //Nombre y fecha del balance inicial
          nombre:'',
          fecha:''
        },
        total_balance_inicial:{ //Totales de activo, pasivo y patrimonio
          t_activo:'',
          t_pasivo:'',
          t_patrimonio_pasivo:''
        },
        b_initotal:{
            t_a_corriente:'', //Total de activo corriente
            t_a_nocorriente:'', //Total de activo no corriente
            t_p_corriente:'', //Total de pasivo corriente
            t_p_no_corriente:'', //Total de pasivo no corriente
            t_patrimonio:'' //Total de patrimonio
        },
        a_corrientes:[], //Array de activos corrientes
        a_nocorrientes:[], //Array de activos no corrientes
        p_corrientes:[], //Array de pasivos corrientes
        p_nocorrientes:[], //Array de pasivos no corrientes
        patrimonios:[], //Array de patrimonios
        
  
  },
    mounted: function () {
    this.obtenerBalance();
  },
  methods:{
    decimales(saldo){
      if (saldo !== null && saldo !== '' && saldo !== 0) {
         let total = Number(saldo).toFixed(2);
      return total;
    }else{
      return
    }
     
    },
        formatoFecha(fecha){
      if (fecha !== null) {
         let date = fecha.split('-').reverse().join('-');
      return date;
    }else{
      return
    }
     
    },
      obtenerBalance:function(){
      var _this = this;
        var url = '/sistema/admin/docente/obtener-balance-general';
            axios.post(url,{
            id: _this.id_taller,
            user: _this.user_id
        }).then(response => {
          if ( response.data.datos == true ) {
              toastr.success(response.data.message, "Smarmoddle", {
            "timeOut": "3000"
           });
            _this.balance_general.nombre                    = response.data.nombre
            _this.balance_general.fecha                     = response.data.fecha
            _this.a_corrientes                              = response.data.a_corriente;
            _this.a_nocorrientes                            = response.data.a_nocorriente;
            _this.p_corrientes                              = response.data.p_corriente;
            _this.p_nocorrientes                            = response.data.p_nocorriente;
            _this.patrimonios                               = response.data.patrimonios;
            _this.total_balance_inicial.t_activo            = response.data.t_activo;                
            _this.total_balance_inicial.t_pasivo            = response.data.t_pasivo;                
            _this.total_balance_inicial.t_patrimonio_pasivo = response.data.total_pasivo_patrimonio;                
            _this.b_initotal.t_a_corriente                  = response.data.t_a_corriente;                
            _this.b_initotal.t_a_nocorriente                = response.data.t_a_nocorriente;                
            _this.b_initotal.t_p_corriente                  = response.data.t_p_corriente;                
            _this.b_initotal.t_p_no_corriente               = response.data.t_p_no_corriente;                
            _this.b_initotal.t_patrimonio                   = response.data.t_patrimonio;                
          } else {

          }
        }).catch(function(error){
        
        });

    }

  }
});
}

if(document.getElementById('librocaja')){
const librocaja = new Vue({
  el: "#librocaja",
  data:{
    id_taller: taller,
    user_id: user,
    nombre:'',
    user_id:user,
    libros_caja:[], 
    suman:{ 
      debe:0,
      haber:0,
    },
  },
  mounted: function () {
    this.obtenerLibroCaja();
  },
  methods:{
     formatoFecha(fecha){
      if (fecha !== null) {
         let date = fecha.split('-').reverse().join('-');
      return date;
    }else{
      return
    }
  },
    decimales(saldo){
      if (saldo !== null && saldo !== '' && saldo !== 0) {
         let total = Number(saldo).toFixed(2);
      return total;
    }else{
      return
    }
  },
   obtenerLibroCaja: function(){
    let _this = this;
    let url ='/sistema/admin/docente/anexo-obtener-caja';
          axios.post(url,{
            id: _this.id_taller,
            user:_this.user_id
            }).then(response =>{
              if(response.data.datos == true){
                toastr.info("Anexo Libro Caja cargado correctamente", "Smarmoddle", {
                  "timeOut": "3000"
                  });
                  this.libros_caja = response.data.banexocaja;
                  this.nombre = response.data.nombre;
                  this.suman.debe = response.data.totaldebe;
                  this.suman.haber = response.data.totalhaber;
                  this.totales();
              }
            }).catch(function(error){

            });
  },
}

  });

}


if(document.getElementById('arqueo_caja')){

const arqueo_caja = new Vue ({
  el: "#arqueo_caja",
 
  data:{
    id_taller : taller,
    user_id: user,
    libros_caja:[],
    nombre_lb:'',
    t_saldo:[], // array de saldos 
    t_exis:[], // array de existencias

    sumas:{  // totales de Saldo debe y haber
      td:0,
      th:0,
    },  
  },
    mounted: function () {
    this.obtenerArqueo();
  },
  methods:{
    formatoFecha(fecha){
      if (fecha !== null) {
         let date = fecha.split('-').reverse().join('-');
      return date;
    }else{
      return
    }
     
    },// fin fecha
    decimales(saldo){
      if (saldo !== null && saldo !== '' && saldo !== 0) {
         let total = Number(saldo).toFixed(2);
      return total;
    }else{
      return
    }
  },
     obtenerArqueo: function(){
    let _this = this;
    let  url = '/sistema/admin/docente/arqueo-obtener-caja';
   
    axios.post(url,{
      id: _this.id_taller,
      user: _this.user_id,
    }).then(response =>{
      if(response.data.datos == true){
        toastr.info("Anexo Arqueo Caja cargado correctamente", "Smarmoddle", {
          "timeOut": "3000"
          });
          this.t_saldo = response.data.saldo;
          this.t_exis = response.data.exis;
          this.sumas.td = response.data.totaldebe;
          this.sumas.th = response.data.totalhaber;
          // this.totales_s();
      }
    }).catch(function(error){

    });
   }  //fin function obtener
}
});

}

if(document.getElementById('librosbanco')){
const librosbanco = new Vue({
  el: "#librosbanco",

  data:{
    id_taller: taller,
    user_id: user,
    nombre:'',
    n_banco:'',
    c_banco:'',
     lb_banco:[],
    suman:{ //suma total del libro CAJA
      debe:0,
      haber:0,
    },
  },
  mounted: function () {
    this.obtenerLibroBanco();
  },
  methods:{
    decimales(saldo){
      if (saldo !== null && saldo !== '' && saldo !== 0) {
         let total = Number(saldo).toFixed(2);
      return total;
    }else{
      return
    }
  },
  formatoFecha(fecha){
    if (fecha !== null) {
       let date = fecha.split('-').reverse().join('-');
    return date;
  }else{
    return
  }
   
  },
       obtenerLibroBanco: function (){
       let _this = this;
       let   url = '/sistema/admin/docente/libro-obtener-banco';
       axios.post(url,{
         id: _this.id_taller,
         user: _this.user_id
       }).then(response=>{
        if(response.data.datos == true){
          toastr.info("Anexo Libro Banco cargado correctamente", "Smarmoddle", {
            "timeOut": "3000"
            });
             this.lb_banco    = response.data.mb;
             this.nombre      = response.data.nombre;
             this.n_banco     = response.data.n_banco;
             this.c_banco     = response.data.c_banco;
             this.suman.debe  = response.data.totaldebe;
             this.suman.haber = response.data.totalhaber;
             this.totales();
        }
      }).catch(function(error){

      });

     } //fin obtener libro banco
}
  });
}


if(document.getElementById('conciliacionb')){
const conciliacionb = new Vue({
   el: "#conciliacionb",
   data:{
    id_taller: taller,
    user_id: user,
     nombre:'',
     n_banco:'',
     fecha : '',
     c_saldos:[],
     c_debitos:[],
     c_creditos:[],
     c_cheques:[],
     suman:{
       saldo_c :0,
       saldo_ch:0,
       saldo_d :0,
       total   :0,
     },
   },
     mounted: function () {
    this.obtenerConciliacionBancaria();
  },
      methods:{

    decimales(saldo){
      if (saldo !== null && saldo !== '' && saldo !== 0) {
         let total = Number(saldo).toFixed(2);
      return total;
    }else{
      return
    }
  }, //fin metodo decimal 
  formatoFecha(fecha){
    if (fecha !== null) {
       let date = fecha.split('-').reverse().join('-');
    return date;
  }else{
    return
  }
   
  },// fin fecha
      totales: function(){
       this.suman.saldo_c =0;
       this.suman.saldo_ch =0;
       this.suman.saldo_d =0;
       this.suman.total =0;
       let r1 = this.c_saldos;
       let r2 = this.c_debitos;
       let r3 = this.c_creditos;
       let r4 = this.c_cheques;
       let t1 =0;
       let t2 =0;
       let t3 =0;
       let t4 =0;
       r1.forEach(function(obj, index){
          t1 +=Number(obj.saldo);
       });
       r2.forEach(function(obj, index){
        t2 +=Number(obj.saldo);
       });
      r3.forEach(function(obj, index){
       t3 +=Number(obj.saldo);
      });
      r4.forEach(function(obj, index){
        t4 +=Number(obj.saldo);
     });
      var tsd  = t1 + t2;
      var tsdc = tsd - t3;
      var tch  = tsdc - t4;

      this.suman.saldo_d   = t2.toFixed(2);
      this.suman.saldo_c   = t3.toFixed(2);
      this.suman.saldo_ch  = t4.toFixed(2);
      this.suman.total     = tch.toFixed(2);
      
       
    }, //fin function totales
         obtenerConciliacionBancaria : function(){
         let _this = this;
         let   url = '/sistema/admin/docente/conciliacion-obtener-bancaria';
         axios.post(url,{
          id: _this.id_taller,
          user:_this.user_id
        }).then(response=>{
          if(response.data.datos == true){
            toastr.info("Anexo Conciliación Bancaria cargado correctamente", "Smarmoddle", {
              "timeOut": "3000"
              });
              this.c_saldos   = response.data.saldo;
              this.c_debitos  = response.data.debito;
              this.c_creditos = response.data.credito;
              this.c_cheques  = response.data.cheque;
              this.nombre     = response.data.nombre;
              this.n_banco    = response.data.n_banco;
              this.fecha      = response.data.fecha;
              this.totales();
          }
        }).catch(function(error){
  
        });
  

       }//fin metodo obtener conciliacion bancaria

}
});

}

if(document.getElementById('retencion_iva')){

let reten_iva = new Vue({
    el:"#retencion_iva",
  data:{
    id_taller: taller,
    user_id: user,
    nombre_c:'', 
    fecha:'',
    ruc:'',
    dgeneral:[],

    t_ventas:[],
    t_compras:[],
      suma_c:{
          suma_base:0,
          suma_reten:0,
          suma_ivac:0,
          suma_10:0,
          suma_20:0,
          suma_30:0,
          suma_70:0,
          suma_100:0,
      },
      suma_v:{
          suma_base:0,
          suma_reten:0,
          suma_ivav:0,
          suma_10:0,
          suma_20:0,
          suma_30:0,
          suma_70:0,
          suma_100:0,
      },
      total:{
        t_ivacompra:'',
        t_ivaventa:'',
        total_pagar:'',
        result_iva:'',
        t_reten:'',
        
      }, 
  }, //fin del data
      mounted: function () {
    this.obtenerRetencionIva();
  },

      methods:{
        formatoFecha(fecha){
          if (fecha !== null ) {
             let date = fecha.split('-').reverse().join('-');
          return date;
        }else{
          return
        }
         
        }, //fin metodo formatofecha

        decimales(saldo){
          if (saldo !== null && saldo !== '' && saldo !== 0) {
             let total = Number(saldo).toFixed(2);
          return total;
        }else{
          return
        }
         
        }, //fin metodo decimales
           Totales(){
         let r1 =this.t_compras;
         let r2 = this.t_ventas;
         
         let c1 = 0;
         let c2 = 0;
         let c3 = 0;
         let c4 = 0;
         let c5 = 0;
         let c6 = 0;
         let c7 = 0;
         let c8 = 0;
       
         let v1 = 0;
         let v2 = 0;
         let v3 = 0;
         let v4 = 0;
         let v5 = 0;
         let v6 = 0;
         let v7 = 0
         let v8 = 0;

         //suma compras
 
         r1.forEach(function(r1,i){
          let temp = r1.base_im;
          if(temp != null && temp !==''){
            c1 += Number(temp);
          }
         });
         this.suma_c.suma_base = c1.toFixed(2);
        
         r1.forEach(function(r1,i){
          let temp = r1.v_retenido;
          if(temp != null && temp !==''){
            c2 += Number(temp);
          }
         });
         this.suma_c.suma_reten = c2.toFixed(2);
        
         r1.forEach(function(r1,i){
          let temp = r1.iva;
          if(temp != null && temp !==''){
            c3 += Number(temp);
          }
         });
         this.suma_c.suma_ivac = c3.toFixed(2);

         r1.forEach(function(r1,i){
          let temp = r1.ret_10;
          if(temp != null && temp !==''){
            c4 += Number(temp);
          }
         });
         this.suma_c.suma_10 = c4.toFixed(2);

         r1.forEach(function(r1,i){
          let temp = r1.ret_20;
          if(temp != null && temp !==''){
            c5 += Number(temp);
          }
         });
         this.suma_c.suma_20 = c5.toFixed(2);

         r1.forEach(function(r1,i){
          let temp = r1.ret_30;
          if(temp != null && temp !==''){
            c6 += Number(temp);
          }
         });
         this.suma_c.suma_30 = c6.toFixed(2);

         r1.forEach(function(r1,i){
          let temp = r1.ret_70;
          if(temp != null && temp !==''){
            c7 += Number(temp);
          }
         });
         this.suma_c.suma_70 = c7.toFixed(2);

         r1.forEach(function(r1,i){
          let temp = r1.ret_100;
          if(temp != null && temp !==''){
            c8 += Number(temp);
          }
         });
         this.suma_c.suma_100 = c8.toFixed(2);
         //
         //sumas ventas
         //

         r2.forEach(function(r2,i){
          let temp = r2.base_im;
          if(temp != null && temp !==''){
            v1 += Number(temp);
          }
         });
         this.suma_v.suma_base = v1.toFixed(2);

         r2.forEach(function(r2,i){
          let temp = r2.v_retenido;
          if(temp != null && temp !==''){
            v2 += Number(temp);
          }
         });
         this.suma_v.suma_reten = v2.toFixed(2);

         r2.forEach(function(r2,i){
          let temp = r2.iva;
          if(temp != null && temp !==''){
            v3 += Number(temp);
          }
         });
         this.suma_v.suma_ivav = v3.toFixed(2);

         r2.forEach(function(r2,i){
          let temp = r2.ret_10;
          if(temp != null && temp !==''){
            v4 += Number(temp);
          }
         });
         this.suma_v.suma_10 = v4.toFixed(2);

         r2.forEach(function(r2,i){
          let temp = r2.ret_20;
          if(temp != null && temp !==''){
            v5 += Number(temp);
          }
         });
         this.suma_v.suma_20 = v5.toFixed(2);

         r2.forEach(function(r2,i){
          let temp = r2.ret_30;
          if(temp != null && temp !==''){
            v6 += Number(temp);
          }
         });
         this.suma_v.suma_30 = v6.toFixed(2);

         r2.forEach(function(r2,i){
          let temp = r2.ret_70;
          if(temp != null && temp !==''){
            v7 += Number(temp);
          }
         });
         this.suma_v.suma_70 = v7.toFixed(2);

         r2.forEach(function(r2,i){
          let temp = r2.ret_100;
          if(temp != null && temp !==''){
            v8 += Number(temp);
          }
         });
         this.suma_v.suma_100 = v8.toFixed(2);
        
        }, //fin de sumatotales
      obtenerRetencionIva: function(){
        let _this = this;
        let url   = '/sistema/admin/docente/retencion-obtener-iva';
        axios.post(url,{
          id: _this.id_taller,  
          user:_this.user_id
        }).then(response=>{
           if(response.data.datos == true){
            toastr.info("Anexo Retencion del Iva cargado correctamente", "Smarmoddle", {
              "timeOut": "3000"
              });
              this.t_compras    = response.data.compra;
              this.t_ventas     = response.data.venta;
              this.nombre_c     = response.data.nombre;
              this.ruc          = response.data.ruc;
              this.fecha        = response.data.fecha;
              this.total.t_ivacompra  = response.data.t_ivacompra;
              this.total.t_ivaventa   = response.data.t_ivaventa;
              this.total.t_reten      = response.data.t_reten;
              this.total.result_iva   = response.data.result_iva;
              this.total.total_pagar        = response.data.total;
              this.Totales();
           }

        }).catch(function(error){
          });
        
      }, //fin metodo obtener retencion del iva
        }
      });
}

if(document.getElementById('nomina_empleado')){
const nomina_em = new Vue({
 el: '#nomina_empleado',
 data:{
  id_taller: taller,
  user_id: user,
  fecha:'',
  nombre:'',
  t_nomina:[],
 suma:{
      s_sueldo:0,
      s_sobretiempo:0,
      s_tingreso:0,
      s_iess:0,
      s_piess:0,
      s_pcias:0,
      s_anticipo:0,
      s_impr:0,
      s_tegresos:0,
      s_netopagar:0,
    },

    deducciones:[],
 },
  mounted: function () {
    this.obtenerNomina();
  },

methods:{
          obtenerNomina : function(){
          let _this = this;
          let   url = '/sistema/admin/docente/nomina-obtener-empleado';
          axios.post(url,{
            id: _this.id_taller,
            user:_this.user_id
          }).then(response =>{
            if(response.data.datos == true){
              toastr.info("Anexo Nómina de Empleado cargado correctamente", "Smarmoddle", {
                "timeOut": "3000"
                });
                this.nombre       = response.data.nombre;
                this.fecha        = response.data.fecha;
                this.t_nomina     = response.data.nomina;
                this.totales();
            }
          }).catch(function(error){
          });
        }, //fin metodo obtener nomina
           totales :function(){

        let r1 = this.t_nomina;
        let c1 = 0;
        let c2 = 0;
        let c3 = 0;
        let c4 = 0;
        let c5 = 0;
        let c6 = 0;
        let c7 = 0;
        let c8 = 0;
        let c9 = 0;
        let c10 = 0;

        r1.forEach(function(r1,i){
          let temp = r1.sueldo;
          if(temp != null && temp !==''){
            c1 += Number(temp);
          }
        });
        this.suma.s_sueldo = c1.toFixed(2);

        r1.forEach(function(r1,i){
          let temp = r1.s_tiempo;
          if(temp != null && temp !==''){
            c2 += Number(temp);
          }
        });
        this.suma.s_sobretiempo = c2.toFixed(2);

        r1.forEach(function(r1,i){
          let temp = r1.ingresos;
          if(temp != null && temp !==''){
            c3 += Number(temp);
          }
        });
        this.suma.s_tingreso = c3.toFixed(2);

        r1.forEach(function(r1,i){
          let temp = r1.iees;
          if(temp != null && temp !==''){
            c4 += Number(temp);
          }
        });
        this.suma.s_iess = c4.toFixed(2);

        r1.forEach(function(r1,i){
          let temp = r1.pres_iees;
          if(temp != null && temp !==''){
            c5 += Number(temp);
          }
        });
        this.suma.s_piess = c5.toFixed(2);

        r1.forEach(function(r1,i){
          let temp = r1.pres_cia;
          if(temp != null && temp !==''){
            c6 += Number(temp);
          }
        });
        this.suma.s_pcias = c6.toFixed(2);

        r1.forEach(function(r1,i){
          let temp = r1.anticipo;
          if(temp != null && temp !==''){
            c7 += Number(temp);
          }
        });
        this.suma.s_anticipo = c7.toFixed(2);

        r1.forEach(function(r1,i){
          let temp = r1.imp_renta;
          if(temp != null && temp !==''){
            c8 += Number(temp);
          }
        });
        this.suma.s_impr = c8.toFixed(2);

        r1.forEach(function(r1,i){
          let temp = r1.egresos;
          if(temp != null && temp !==''){
            c9 += Number(temp);
          }
        });
        this.suma.s_tegresos = c9.toFixed(2);

        r1.forEach(function(r1,i){
          let temp = r1.neto_pagar;
          if(temp != null && temp !==''){
            c10 += Number(temp);
          }
        });
        this.suma.s_netopagar = c10.toFixed(2);
    },

}
});
}

if(document.getElementById('provision_beneficio')){
const provision_b = new Vue({
  el:'#provision_beneficio',
   data:{
    id_taller: taller,
    user_id: user,
    t_nomina:[], // de la nomina
    nombre:'',   //de la nomina
    fecha:'',    //de la nomina
    t_pro:[],
     suma:{
      s_valor:'',
      s_tercero:'',
      s_cuarto:'',
      s_vacaciones:'',
      s_res:'',
     },
   },
    mounted: function () {
    this.obtenerProvision();
  },

   methods:{
  decimales(saldo){
    if (saldo !== null && saldo !== '' && saldo !== 0) {
      let total = Number(saldo).toFixed(2);
    return total;
  }else{
    return
  }
   }, 

      totales :function(){

        let r1 = this.t_pro;

        let c1 = 0;
        let c2 = 0;
        let c3 = 0;
        let c4 = 0;
        let c5 = 0;

        r1.forEach(function(r1,i){
          let temp = r1.v_recibido;
          if(temp != null && temp !==''){
            c1 += Number(temp);
          }
        });
        this.suma.s_valor = c1.toFixed(2);

        r1.forEach(function(r1,i){
          let temp = r1.d_tercero;
          if(temp != null && temp !==''){
            c2 += Number(temp);
          }
        });
        this.suma.s_tercero = c2.toFixed(2);

        r1.forEach(function(r1,i){
          let temp = r1.d_cuarto;
          if(temp != null && temp !==''){
            c3 += Number(temp);
          }
        });
        this.suma.s_cuarto = c3.toFixed(2);

        r1.forEach(function(r1,i){
          let temp = r1.vacaciones;
          if(temp != null && temp !==''){
            c4 += Number(temp);
          }
        });
        this.suma.s_vacaciones = c4.toFixed(2);

        r1.forEach(function(r1,i){
          let temp = r1.f_reserva;
          if(temp != null && temp !==''){
            c5 += Number(temp);
          }
        });
        this.suma.s_res = c5.toFixed(2);
      }, //end totales
         obtenerProvision: function(){
        let _this = this;
        let url   = '/sistema/admin/docente/provision-obtener-beneficio';
        axios.post(url,{
          id: _this.id_taller,  
          user: _this.user_id
        }).then(response=>{
          if(response.data.datos == true){
            toastr.success("Anexo Provisión Beneficio Social cargado correctamente", "Smarmoddle", {
              "timeOut": "3000"
              });

              this.t_pro = response.data.pro;
              this.totales();
            }
          }).catch(function(error){
          });
      } // end obtener  

         }
       });

}
</script>
@endsection

@endsection
