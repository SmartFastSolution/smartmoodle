@extends('layouts.nav')

@section('css')
<style type="text/css">
#calApp {
    display: flex;
    align-items: center;
    justify-content: center;
    /* height: 100vh;
  width: 100vw;*/
}

.swal-wide {
    width: 300px !important;
}

.calculator {
    display: grid;
    grid-template-rows: repeat(7, minmax(50px, auto));
    grid-template-columns: repeat(4, 50px);
    grid-gap: 10px;
    /*  padding: 35px;*/
    font-family: "Poppins";
    font-weight: 300;
    font-size: 18px;
    /*background-color: #ffffff;*/
    border-radius: 10px;
    /*box-shadow: 0px 3px 80px -30px rgba(13, 81, 134, 1);*/
}

.boton,
.zero {
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    outline: none;
    color: #484848;
    background-color: #f4faff;
    border-radius: 5px;
    border: 1px solid #E42D2D;
}

.display,
.answer {
    grid-column: 1 / 5;
    display: flex;
    align-items: center;
}

.display {
    color: #0B0202;
    font-size: 20px;
    border-bottom: 1px solid #e1e1e1;
    margin-bottom: 15px;
    overflow: hidden;
    text-overflow: clip;
}

.answer {
    font-weight: 500;
    color: #146080;
    font-size: 55px;
    height: 65px;
}

.zero {
    grid-column: 1 / 3;
}

.operator {
    background-color: #d9efff;
    color: #3fa9fc;
}
</style>
@endsection
@section('title', 'Talleres de contabilidad')
@section('content')
<div class="container mb-3">
    <h1 class="text-center text-danger font-weight-bold display-4">Modulo Contable</h1>
    <h1 class="text-center m-2">{{ $datos->taller->nombre }}</h1>
    <h3 class="text-center mt-3">{{ $datos->enunciado }}</h3>
            
 @if ($datos->metodo == 'concatenado')
    <div class="row justify-content-md-center">
        <div class="col-12 col-sm-12 col-md-2 mb-3">
            <div class="list-group" id="list-tab" role="tablist">
               
                    @foreach ($modulo as $key => $element)
                  <a class="list-group-item list-group-item-action @if ($key == 0) active @endif" id="list-{{ $element->code }}-list" data-toggle="list"
                    href="#list-{{ $element->code }}" role="tab" aria-controls="{{ $element->code }}">{{ $element->name }}</a>
               @endforeach 
            
         {{--        <a class="list-group-item list-group-item-action active" id="list-kardex-list" data-toggle="list"
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

                <div class="tab-pane  @if ($modulo[0]->code == 'kardex' )show active @endif  fade" id="list-kardex" role="tabpanel"
                    aria-labelledby="list-kardex-list">
                    @include('contabilidad.kardex')
                </div>
                <div class="tab-pane @if ($modulo[0]->code == 'kardex-promedio' ) show active @endif  fade" id="list-kardex-promedio" role="tabpanel"
                    aria-labelledby="list-kardex-promedio-list">
                    @include('contabilidad.kardex_promedio')
                </div>
                <div class="tab-pane @if ($modulo[0]->code == 'balance_comp' ) show active @endif  fade" id="list-balance_comp" role="tabpanel"
                    aria-labelledby="list-balance_comp-list">
                    @include('contabilidad.balancecomprobacion')
                </div>
                <div class="tab-pane @if ($modulo[0]->code == 'messages' ) show active @endif  fade  " id="list-messages" role="tabpanel"
                    aria-labelledby="list-messages-list">
                    @include('contabilidad.diariogeneral')
                </div>
                <div class="tab-pane @if ($modulo[0]->code == 'balance-ajustado' ) show active @endif  fade" id="list-balance-ajustado" role="tabpanel"
                    aria-labelledby="list-balance-ajustado-list">
                    @include('contabilidad.balanceajustado')
                </div>
                <div class="tab-pane @if ($modulo[0]->code == 'mayor-general' ) show active @endif  fade " id="list-mayor-general" role="tabpanel"
                    aria-labelledby="list-mayor-general-list">
                    @include('contabilidad.mayorgeneral')
                </div>
                <div class="tab-pane @if ($modulo[0]->code == 'hoja-trabajo' ) show active @endif  fade" id="list-hoja-trabajo" role="tabpanel"
                    aria-labelledby="list-hoja-trabajo-list">
                    @include('contabilidad.hojatrabajo')
                </div>      
                <div class="tab-pane @if ($modulo[0]->code == 'diario' ) show active @endif  fade border border-danger p-4" id="list-diario" role="tabpanel"
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
                        @include('contabilidad.balanceinicial')
                    </div>
                </div>
                <div class="tab-pane @if ($modulo[0]->code == 'estado-resultado' ) show active @endif  fade" id="list-estado-resultado" role="tabpanel"
                    aria-labelledby="list-estado-resultado-list">
                    @include('contabilidad.estadoresultado')
                </div>
                <div class="tab-pane @if ($modulo[0]->code == 'balance-general' ) show active @endif  fade" id="list-balance-general" role="tabpanel"
                    aria-labelledby="list-balance-general-list">
                    @include('contabilidad.balancegeneral')
                </div>
                <div class="tab-pane @if ($modulo[0]->code == 'list-asento-cierre' ) show active @endif  fade" id="list-asento-cierre" role="tabpanel"
                    aria-labelledby="list-asento-cierre-list">
                    @include('contabilidad.asientosdecierre')
                </div>
                {{--ARREGLADOS--}}

                {{--parte anexos arreglado--}}
                <div class="tab-pane @if ($modulo[0]->code == 'libro-caja' ) show active @endif  fade" id="list-libro-caja" role="tabpanel" aria-labelledby="list-libro-caja-list">
                    @include('contabilidad.librocaja')
                </div>
                <div class="tab-pane @if ($modulo[0]->code == 'conciliacion-bancaria' ) show active @endif  fade" id="list-conciliacion-bancaria" role="tabpanel"
                    aria-labelledby="list-conciliacion-bancaria-list">
                    @include('contabilidad.conciliacionbancaria')

                </div>
                <div class="tab-pane @if ($modulo[0]->code == 'arqueo-caja' ) show active @endif  fade" id="list-arqueo-caja" role="tabpanel"
                    aria-labelledby="list-arqueo-caja-list">
                    @include('contabilidad.arqueocaja')

                </div>
                <div class="tab-pane @if ($modulo[0]->code == 'libro-banco' ) show active @endif  fade" id="list-libro-banco" role="tabpanel"
                    aria-labelledby="list-libro-banco-list">
                    @include('contabilidad.librobanco')
                </div>
                <div class="tab-pane @if ($modulo[0]->code == 'retencion-iva' ) show active @endif  fade" id="list-retencion-iva" role="tabpanel"
                    aria-labelledby="list-retencion-iva-list">
                    @include('contabilidad.retencioniva')
                </div>
                <div class="tab-pane @if ($modulo[0]->code == 'nomina-empleado' ) show active @endif  fade" id="list-nomina-empleado" role="tabpanel"
                    aria-labelledby="list-nomina-empleado-list">
                    @include('contabilidad.nominaempleados')
                </div>
                <div class="tab-pane @if ($modulo[0]->code == 'provision-beneficio' ) show active @endif  fade" id="list-provision-beneficio" role="tabpanel"
                    aria-labelledby="list-provision-beneficio-list">
                    @include('contabilidad.provisiondebeneficio')
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
                        @include('contabilidad.balanceinicial')
                    </div>

            @elseif ($datos->balance_inicial_horizontal == 1)
        {{--     <ul class="nav nav-tabs" id="bInicial" role="tablist">
                    <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#b_horizontal" role="tab"
                                aria-controls="b_horizontal" aria-selected="true">Balance Inicial Horizontal</a>
                        </li>
                    </ul> --}}
                    <div class="tab-content" id="bInicialContent">
                        @include('contabilidad.balanceinicial')
                    </div>
            @elseif ($datos->kardex_fifo == 1)
                    @include('contabilidad.kardex')
                @elseif ($datos->kardex_promedio == 1)
                    @include('contabilidad.kardex_promedio')
                
                @elseif ($datos->balance_comprobacion== 1)
                    @include('contabilidad.balancecomprobacion')
                
                @elseif ($datos->diario_general == 1)
                    @include('contabilidad.diariogeneral')
                
                @elseif ($datos->balance_comprobacion_ajustado == 1)
                    @include('contabilidad.balanceajustado')
                
                @elseif ($datos->mayor_general == 1)
                    @include('contabilidad.mayorgeneral')
                
                @elseif ($datos->hoja_trabajo == 1)
                    @include('contabilidad.hojatrabajo')
                
                @elseif ($datos->estado_resultado == 1)
                    @include('contabilidad.estadoresultado')
                
                @elseif ($datos->balance_general == 1)
                    @include('contabilidad.balancegeneral')
                
                @elseif ($datos->asientos_cierre == 1)
                    @include('contabilidad.asientosdecierre')
                
                @elseif ($datos->librocaja == 1)
                
                    @include('contabilidad.librocaja')
                
                @elseif ($datos->conciliacionbancaria == 1)
                    @include('contabilidad.conciliacionbancaria')
                
                @elseif ($datos->arqueocaja == 1)
                    @include('contabilidad.arqueocaja')
                
                @elseif ($datos->librobanco == 1)
                    @include('contabilidad.librobanco')
                
                @elseif ($datos->retencioniva == 1)
                    @include('contabilidad.retencioniva')
                
                @elseif ($datos->nominaempleados == 1)
                    @include('contabilidad.nominaempleados')
                
                @elseif ($datos->provisiondebeneficio == 1)
                    @include('contabilidad.provisiondebeneficio')

            @endif
        </div>
    </div>

      @endif



    <div class="row justify-content-center" id="enviarTaller">
        <a href="" @click.prevent="CompletarTaller" class="btn p-2 mt-3 btn-danger">Completar Taller Contable</a>
        
     </div>

      
    {{--  @include ('layouts.modacontabilidad') --}}
</div>

@include ('layouts.footer')
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" src="{{ asset('js/tallercontabilidad.js') }}"></script>
<script type="text/javascript">
    let taller_id = @json($d);
    let enviar = new Vue({
    
      el: "#enviarTaller",
      methods:{
        CompletarTaller(){
        Swal.fire({
        title: 'Seguro que deseas completar el taller??' ,
        text: "Esta accion no se puede revertir",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, completar!'
          }).then((result) => {
        if (result.isConfirmed) {
            this.enviado();
        }
      });
        },
        enviado: function() {
        let _this = this;
        let url = '/sistema/admin/taller37/'+taller_id;
            axios.post(url,{
        }).then(response => {
          if (response.data.success == true) {
            Swal.fire(
            'Completado!',
            'success'
          );
            window.location = "/sistema/homees"; 
            }          
        }).catch(function(error){

        }); 
     } 
      }
    
    })
</script>

@endsection
@endsection