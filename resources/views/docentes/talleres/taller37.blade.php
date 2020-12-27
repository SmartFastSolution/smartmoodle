@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<form action="{{ route('taller1.docente', ['idtaller' => $d]) }}" method="POST">
    @csrf
  <div class="container">
  <h1 class="text-center text-danger display-1">{{ $datos->taller->nombre }}</h1>
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
            <h2 class="font-weight-bold "><span class="badge badge-danger">#</span>{{ $datos->enunciado }}</h2>
                <div class="row justify-content-md-center">
        <div class="col-12 col-sm-12 col-md-2 mb-3">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-kardex-list" data-toggle="list" href="#list-kardex" role="tab" aria-controls="kardex">Kardex</a>
                <a class="list-group-item list-group-item-action " id="list-kardex-promedio-list" data-toggle="list" href="#list-kardex-promedio" role="tab" aria-controls="kardex-promedio">Kardex Promedio</a>
                <a class="list-group-item list-group-item-action " id="list-diario-list" data-toggle="list" href="#list-diario" role="tab" aria-controls="home">Balance Inicial</a>
                <a class="list-group-item list-group-item-action" id="list-balance_comp-list" data-toggle="list" href="#list-balance_comp" role="tab" aria-controls="profile">Balance de Comprobacion</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Diario General</a>

                <a class="list-group-item list-group-item-action" id="list-mayor-general-list" data-toggle="list" href="#list-mayor-general" role="tab" aria-controls="mayor-general">Mayor General</a>
                <a class="list-group-item list-group-item-action" id="list-balance-ajustado-list" data-toggle="list" href="#list-balance-ajustado" role="tab" aria-controls="balance-ajustado">Balance Ajustado</a>
                <a class="list-group-item list-group-item-action" id="list-hoja-trabajo-list" data-toggle="list" href="#list-hoja-trabajo" role="tab" aria-controls="hoja-trabajo">Hoja de Trabajo</a>
                <a class="list-group-item list-group-item-action" id="list-estado-resultado-list" data-toggle="list" href="#list-estado-resultado" role="tab" aria-controls="estado-resultado">Estado de Resultado</a>
                <a class="list-group-item list-group-item-action" id="list-balance-general-list" data-toggle="list" href="#list-balance-general" role="tab" aria-controls="balance-general">Balance General</a>
                <a class="list-group-item list-group-item-action" id="list-asento-cierre-list" data-toggle="list" href="#list-asento-cierre" role="tab" aria-controls="asento-cierre">Asientos de Cierre</a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-10">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane show active fade" id="list-kardex" role="tabpanel" aria-labelledby="list-kardex-list">
                    @include('doceentes.contabilidad.kardex')
                </div>
                   <div class="tab-pane fade" id="list-kardex-promedio" role="tabpanel" aria-labelledby="list-kardex-promedio-list">
                    @include('doceentes.contabilidad.kardex_promedio')
                </div>
                <div class="tab-pane fade border border-danger p-4" id="list-diario" role="tabpanel"
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
                        @include('doceentes.contabilidad.balanceinicial')
                    </div>
                </div>
                <div class="tab-pane fade" id="list-balance_comp" role="tabpanel"
                    aria-labelledby="list-balance_comp-list">
                    @include('doceentes.contabilidad.balancecomprobacion')
                </div>
                <div class="tab-pane fade border border-danger " id="list-messages" role="tabpanel"
                    aria-labelledby="list-messages-list">
                    @include('doceentes.contabilidad.diariogeneral')
                </div>
                <div class="tab-pane fade border border-danger " id="list-mayor-general" role="tabpanel"
                    aria-labelledby="list-mayor-general-list">
                    @include('doceentes.contabilidad.mayorgeneral')
                </div>
                <div class="tab-pane fade" id="list-balance-ajustado" role="tabpanel" aria-labelledby="list-balance-ajustado-list">
                    @include('doceentes.contabilidad.balanceajustado')
                </div>
                 <div class="tab-pane fade" id="list-hoja-trabajo" role="tabpanel" aria-labelledby="list-hoja-trabajo-list">
                    @include('doceentes.contabilidad.hojatrabajo')
                </div>
                <div class="tab-pane fade" id="list-estado-resultado" role="tabpanel" aria-labelledby="list-estado-resultado-list">
                    @include('doceentes.contabilidad.estadoresultado')
                </div>
                  <div class="tab-pane fade" id="list-balance-general" role="tabpanel" aria-labelledby="list-balance-general-list">
                    @include('doceentes.contabilidad.balancegeneral')
                </div>
                <div class="tab-pane fade" id="list-asento-cierre" role="tabpanel" aria-labelledby="list-asento-cierre-list">
                    @include('doceentes.contabilidad.asientosdecierre')
                </div>
            </div>
        </div>
    </div>
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
  let user_id = @json($user->id);
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////BALANCE INICIAL HORIZONTAL/////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
const b_hori = new Vue({
        el: '#b_horizontal',
        data:{
        id_taller: taller,
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
  methods:{
      obtenerBalance:function(){
    var _this = this;
      var url = '/sistema/admin/taller/obtenerbalance';
          axios.post(url,{
          id: _this.id_taller,
          tipo: _this.tipo
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

 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////BALANCE INICIAL HORIZONTAL/////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
const b_ver = new Vue({
        el: '#b_vertical',
        data:{
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
  methods:{
      obtenerBalance:function(){
    var _this = this;
      var url = '/sistema/admin/taller/obtenerbalance';
          axios.post(url,{
          id: _this.id_taller,
          tipo: _this.tipo
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

const asientos_cierre = new Vue({
 el: '#asientos_cierre',
    data:{
      id_taller: taller,
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
    methods:{
        obtenerAsientoCierre: function(){
        let _this = this;
        let url = '/sistema/admin/taller/asiento-cierre-obtener';
            axios.post(url,{
              id: _this.id_taller,
        }).then(response => {
          if (response.data.datos == true) {
          _this.registros = response.data.registros;
          _this.nombre = response.data.nombre;
           toastr.success("Diairo General cargado Correctamente", "Smarmoddle", {
                "timeOut": "3000"
                });
            }          
        }).catch(function(error){

        }); 
    }

    }
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////KARDEX ///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

const kardex = new Vue({
  el: "#kardex",
  data:{
    id_taller: taller,

    producto:'',
    producto_id:'',
    productos:productos,
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
methods:{
   obtenerKardexFifo: function() {
        let _this = this;
        let url = '/sistema/admin/taller/kardex-obtener-fifo';
            axios.post(url,{
              id: _this.id_taller,
              producto_id: _this.producto_id
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
                
            }        
        }).catch(function(error){

        }); 
     },
}

  });

const kardex_promedio = new Vue({

  el: "#kardex_promedio",
  data:{
    id_taller: taller,
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
   // this.obtenerKardexPromedio();
  },
  methods:{
            obtenerKardexPromedio: function() {
        let _this = this;
        let url = '/sistema/admin/taller/kardex-obtener-promedio';
            axios.post(url,{
              id: _this.id_taller,
              producto_id: _this.producto_id,
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
            }         
        }).catch(function(error){

        }); 
     } 
  }

});

const diario = new Vue({
 el: '#diario',
    data:{
      id_taller: taller,
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
    methods:{
          obtenerDiarioGeneral: function(){
        var _this = this;
        var url = '/sistema/admin/taller/diariogeneral';
            axios.post(url,{
              id: _this.id_taller,
        }).then(response => {
          if (response.data.datos == true) {
          _this.registros = response.data.registros;
          _this.ajustes = response.data.ajustes;
          _this.nombre = response.data.nombre;
          if ( response.data.tieneinicial == true) {
            let inicial = response.data.inicial;
            _this.registros.unshift(inicial);
          }
            }          
        }).catch(function(error){

        }); 
      }
    }
  });

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////MAYOR GENERAL//////// /////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
let mayor_general = new Vue({
  el: "#mayor_general",
  data:{
     id_taller: taller,
      nombre:'',
      nombre_dgral:'',
      fechabalance:'',
      complete:false,
      options: objeto,
      cuentas: cuentas,
       dgeneral:[],
        nombre_kardex:'',
        producto_kardex:'',
        registros:[],
       ajustes:[],
  },
methods:{
      obtenerMayorGeneral: function(){
        var _this = this;
        var url = '/sistema/admin/taller/mayorgeneral';
            axios.post(url,{
              id: _this.id_taller,
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
    balances:[], 
    mayorgeneral:[],
    suman:{ 
      sum_debe:0,
      sum_haber:0,
      sal_debe:0,
      sal_haber:0,
    }
  },
  methods:{
        obtenerBalanceCom: function() {
        let _this = this;
        let url = '/sistema/admin/taller/balance-obtener-comprobacion';
            axios.post(url,{
              id: _this.id_taller,
        }).then(response => {
          if (response.data.datos == true) {
              toastr.info("Balance de Comprobacion cargado correctamente", "Smarmoddle", {
            "timeOut": "3000"
            });
              this.balances = response.data.bcomprobacion;
              this.nombre = response.data.nombre;
              this.fecha = response.data.fecha;
            }          
        }).catch(function(error){

        }); 
     } 
  }

  });

let hoja_trabajo = new Vue({
  el: "#hoja_trabajo",
  data:{
    id_taller: taller,
    nombre:'',,
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

  methods:{
      obtenerHojita: function() {
        let _this = this;
        let url = '/sistema/admin/taller/hoja-obtener-trabajo';
            axios.post(url,{
              id: _this.id_taller,
        }).then(response => {
          if (response.data.datos == true) {
              this.registros = response.data.hojatrabajo;
              this.nombre = response.data.nombre;
            }          
        }).catch(function(error){

        }); 
     } 
  }

});

const balance_ajustado = new Vue({
  el: "#balance_ajustado",
  data:{
      id_taller: taller,
      hojatrabajo:[],
      nombre_hoja:'',
      nombre:'',
    balances_ajustados:[],
    suman:{ 
      debe:0,
      haber:0,
    },
  },
  methods:{
    obtenerBalanceAjus: function() {
        let _this = this;
        let url = '/sistema/admin/taller/balance-obtener-ajustado';
            axios.post(url,{
              id: _this.id_taller,
        }).then(response => {
          if (response.data.datos == true) {
          this.balances_ajustados = response.data.bcomprobacionAjustado;
            
            }          
        }).catch(function(error){

        }); 
     } 
  }
});

const estado_resultado = new Vue({

  el: "#estado_resultado",
   data:{
    id_taller: taller,
    nombre_hoja:'',
    venta:'',
    costo_venta:'',
    producto:'',
    nombre:'',
    fecha:'',
    ingresos:[],
    gastos:[],
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
  methods:{
        obtenerEstadoResultado: function() {
    let _this = this;
    let url = '/sistema/admin/taller/estado-obtener-resultado';
        axios.post(url,{
          id: _this.id_taller,
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
                _this.totales.utilidad_ejercicio    = response.data.estadoresultado.utilidad_neta_o
                _this.totales.utilidad_liquida      = response.data.estadoresultado.utilidad_liquida
        }          
    }).catch(function(error){

    }); 
    } 
  }

  });
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////BALANCE GENERAL ///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var balance_general = new Vue({

  el: "#balance_general",
  data:{
    nombre:'',
    fecha:'',
        id_taller: taller,
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
  methods:{
      obtenerBalance:function(){
      var _this = this;
        var url = '/sistema/admin/taller/obtener-balance-general';
            axios.post(url,{
            id: _this.id_taller,
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
            _this.total_balance_inicial.t_patrimonio_pasivo = response.data.total_pasivo_patrimonio;                
          } else {

          }
        }).catch(function(error){
        
        });

    }

  }
});
</script>
@endsection

@endsection
