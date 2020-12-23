@extends('layouts.nav')
@section('titulo', 'Creador de plantillas')
@section('css')

@section('content')
<h1 class="text-center  mt-5 text-danger font-weight-bold">Modulo Contable</h1>
<div class="container-fluid" id="modulo">
  
  <div class="form-row" >
    <div class="col-3">
      <label for="">Elegir el metodo del taller:</label>
    </div>
    <div class="col-6">
      <select name="" id="" v-model="categoria" class="custom-select" @change="elegirCategoria()">
          <option value="" selected disabled>Selecciona Una Categoria</option>
          <option value="individual">Individual</option>
          <option value="secuencial">Concatenado</option>
      </select>
    </div>
  </div>

 <div v-if="individual.active">
     <h1 class="text-center text-secondary font-weight-bold mt-3">Taller Individual</h1>
     <div class="border mb-4">
           
     </div>
 </div>
 <div v-else-if="concatenado.active">
     <h1 class="text-center text-info font-weight-bold mt-3">Taller Concatenado</h1>
     <div class="border">
          <div class="row ">
                  <div class="col-3">
                    <div class="list-group" id="list-tab" role="tablist">
                      <a class="list-group-item list-group-item-action active" id="list-balance-inicial-list" data-toggle="list" href="#list-balance-inicial" role="tab" aria-controls="balance-inicial">Balance Inicial</a>
                      <a class="list-group-item list-group-item-action" id="list-kardex-list" data-toggle="list" href="#list-kardex" role="tab" aria-controls="kardex">Kardex</a>
                      <a class="list-group-item list-group-item-action" id="list-diario-general-list" data-toggle="list" href="#list-diario-general" role="tab" aria-controls="diario-general">Diario General</a>
                      <a class="list-group-item list-group-item-action" id="list-mayor-general-list" data-toggle="list" href="#list-mayor-general" role="tab" aria-controls="mayor-general">Mayor General</a>
                      <a class="list-group-item list-group-item-action" id="list-balance-comprobacion-list" data-toggle="list" href="#list-balance-comprobacion" role="tab" aria-controls="balance-comprobacion">Balance de Comprobacion</a>
                    <a class="list-group-item list-group-item-action" id="list-hoja-trabajo-list" data-toggle="list" href="#list-hoja-trabajo" role="tab" aria-controls="hoja-trabajo">Hoja de trabajo</a>
                    <a class="list-group-item list-group-item-action" id="list-balance-comprobacion-ajustado-list" data-toggle="list" href="#list-balance-comprobacion-ajustado" role="tab" aria-controls="balance-comprobacion-ajustado">Balance Comprobacion Ajustado</a>

                    <a class="list-group-item list-group-item-action" id="list-estado-resultado-list" data-toggle="list" href="#list-estado-resultado" role="tab" aria-controls="estado-resultado">Estado de Resultado</a>
                    <a class="list-group-item list-group-item-action" id="list-balance-general-list" data-toggle="list" href="#list-balance-general" role="tab" aria-controls="balance-general">Balance General</a>
                    <a class="list-group-item list-group-item-action" id="list-asientos-cierre-list" data-toggle="list" href="#list-asientos-cierre" role="tab" aria-controls="asientos-cierre">Asientos de cierre</a>
                    <a class="list-group-item list-group-item-action" id="list-anexos-list" data-toggle="list" href="#list-anexos" role="tab" aria-controls="anexos">Anexos</a>

                    </div>
                  </div>
                  <div class="col-9">
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="list-balance-inicial" role="tabpanel" aria-labelledby="list-balance-inicial-list">
                        <div class="row p-3">
                            <div class="col-6">
                                <ckeditor style="height: 300px" class="form-control border" :config="editorConfig" v-model="editorData"></ckeditor>
                                <a href="" class="btn btn-danger" @click.prevent="agregar()">Agregar</a>
                            </div>
                            <div class="col-6">
                                <div v-html="comercial"></div>
                            </div>
                        </div>
                      {{-- <div id="editor"></div> --}}
                       {{-- <ckeditor class="form-control" rows="10" cols="10" type="classic" v-model="editorData"  :config="editorConfig"></ckeditor> --}}
                           {{-- <example-component></example-component> --}}
                      </div>
                      <div class="tab-pane fade" id="list-kardex" role="tabpanel" aria-labelledby="list-kardex-list">
                          Kardex
                      </div>
                      <div class="tab-pane fade" id="list-diario-general" role="tabpanel" aria-labelledby="list-diario-general-list">
                          Diairo General
                      </div>
                      <div class="tab-pane fade" id="list-mayor-general" role="tabpanel" aria-labelledby="list-mayor-general-list">
                          Mayor General
                      </div>
                    <div class="tab-pane fade" id="list-balance-comprobacion" role="tabpanel" aria-labelledby="list-balance-comprobacion-list">
                          Balance comprobacion
                      </div>
                       <div class="tab-pane fade" id="list-hoja-trabajo" role="tabpanel" aria-labelledby="list-hoja-trabajo-list">
                        Hoja de trabajo
                      </div>
                       <div class="tab-pane fade" id="list-balance-comprobacion-ajustado" role="tabpanel" aria-labelledby="list-balance-comprobacion-ajustado-list">
                       Balance Comprobacion Ajustado
                      </div>
                        <div class="tab-pane fade" id="list-estado-resultado" role="tabpanel" aria-labelledby="list-estado-resultado-list">
                       Estado Resultado
                      </div>
                       <div class="tab-pane fade" id="list-balance-general" role="tabpanel" aria-labelledby="list-balance-general-list">
                       Balance General
                      </div>
                      <div class="tab-pane fade" id="list-asientos-cierre" role="tabpanel" aria-labelledby="list-asientos-cierre-list">
                       Asientos de Cierre
                      </div>
                      <div class="tab-pane fade" id="list-anexos" role="tabpanel" aria-labelledby="list-anexos-list">
                       Anexos
                      </div>
                    </div>
                  </div>
                </div>
     </div>

 </div>
</div>

@section('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

<script type="text/javascript">

    let modulo_contable = new Vue({
      el: "#modulo",
  
      data:{
        categoria:'',
        individual:{
            active: false,
        },
        concatenado:{
            active:false,
        },
        comercial:'',
         editorData: '',
        editorConfig: {
                toolbar: {
        items: [ 'heading', 'paragraph','bold', 'italic', 'alignment', 'undo', 'redo', 'numberedList', 'bulletedList' ],

        viewportTopOffset: 30,

        shouldNotGroupWhenFull: true
    }
            }




      },
      methods:{
        elegirCategoria(){
            let tipo = this.categoria;

            if (tipo == 'individual') {
                this.concatenado.active = false;
                this.individual.active = true;

            }else if(tipo == 'secuencial'){
                this.individual.active = false;
                this.concatenado.active = true;

            }


        },
        agregar(){
          this.comercial =  this.editorData;
          this.editorData = ''; 
        }
      }
    
    });
</script>

@endsection

@endsection