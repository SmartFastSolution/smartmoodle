@extends('layouts.nav')
@section('titulo', 'Creador de plantillas')
@section('css')

@section('content')
<h1 class="text-center text-danger font-weight-bold display-4">Modulo Contable</h1>
<div  id="modulo">
  <div class="form-row mb-1" >
    <div class="col-2">
      <label for="">Elegir el metodo del taller:</label>
    </div>
    <div class="col-2">
      <select name="" id="" v-model="categoria" class="custom-select" @change="elegirCategoria()">
          <option value="" selected disabled>Selecciona Una Categoria</option>
          <option value="individual">Individual</option>
          <option value="secuencial">Concatenado</option>
      </select>
    </div>
  </div>
 <div v-if="individual.active">
     {{-- <h1 class="text-center text-secondary font-weight-bold mt-3">Taller Individual</h1> --}}
    <div class="row" >
        <div class="col-2">
          <label for="">Elegir el taller:</label>
        </div>
        <div class="col-3">
          <select name="" id="" v-model="taller_individual" class="custom-select" @change="elegirCategoria()">
              <option value="" selected disabled>Selecciona un Modulo</option>
              <option value="balance-inicial-vertical">Balance Inicial Vertical</option>
              <option value="balance-inicial-horizontal">Balance Inicial Horizontal</option>
              <option value="kardex-fifo">Kardex Fifo</option>
              <option value="kardex-promedio">Kardex Promedio</option>
              <option value="diario-general">Diario General</option>
              <option value="mayor-general">Mayor General</option>
              <option value="balance-comprobacion">Balance de Comprobacion</option>
              <option value="hoja-trabajo">Hoja de trabajo</option>
              <option value="balance-comprobacion-ajustado">Balance Comprobacion Ajustado</option>
              <option value="estado-resultado">Estado de Resultado</option>
              <option value="balance-general">Balance General</option>
              <option value="asientos-cierre">Asientos de cierre</option>
              <option value="anexos">Anexos</option>
          </select>
        </div>
      </div>
      <div class="container border mt-1 p-2 bg-secondary">
             <div class="form-row">
              <div class="form-group col-4">
                  <label for="recipient-name" class="col-form-label">Institucion:</label>
                  <select name="contenido_id" v-model="instituto" class="custom-select select2" @change="onMateria()">
                  <option v-if="materias.length == 0" selected disabled="">@{{ instituto }}</option>
                      @foreach ($institutos = App\Instituto::get() as $instituto)
                      <option value="{{ $instituto->id }}">{{ $instituto->nombre }}</option>
                      @endforeach
                  </select>
              </div>
               <div class="form-group col-4">
                  <label for="recipient-name" class="col-form-label">Materia:</label>
                  <select name="contenido_id" v-model="materia" class="custom-select" @change="onContenido()">
                      <option v-if="contenido.length == 0" disabled>@{{ materia }}</option>
                      <option v-for="mate in materias" :value="mate.id">@{{mate.nombre}}</option>  
                  </select>
              </div>
               <div class="form-group col-4">
                  <label for="recipient-name" class="col-form-label">Unidad:</label>
                  <select v-model="contenido_id" class="custom-select" required>
                      
                     <option v-for="conte in contenido" :value="conte.id">@{{conte.nombre}}
                      </option> 
                  </select>
              </div>
          </div>
      </div>
          
      <div class="container border mt-1 mb-3  p-2 bg-info" v-if="taller_individual == 'balance-inicial-vertical'">
        <h2 class="text-center font-weight-bold text-danger">BALANCE INICIAL VERTICAL</h2>

                   
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mb-2">
              <h3 class="text-center font-weight-bold text-dark" >Transacciones</h3>
              <vue-ckeditor v-model="individuales.balance_vertical" :config="config"/>
                {{-- <a href="" class="btn btn-danger" @click.prevent="agregar()">Agregar</a> --}}
            </div>
            <div class="col-2 mb-2">
                <a href="" class="btn btn-danger btn-block" @click.prevent="crearTaller('balance-inicial-vertical')">Crear Taller</a>
            </div>
        </div>
      </div>
      </div>
      <div class="container border mt-1 mb-3  p-2 bg-info" v-else-if="taller_individual == 'balance-inicial-horizontal'">
        <h2 class="text-center font-weight-bold text-danger">BALANCE INICIAL HORIZONTAL</h2>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mb-2">
              <h3 class="text-center font-weight-bold text-ligth" >Transacciones</h3>
              <vue-ckeditor v-model="individuales.balance_horizontal" :config="config"/>
                {{-- <a href="" class="btn btn-danger" @click.prevent="agregar()">Agregar</a> --}}
            </div>
            <div class="col-2 mb-2">
                <a href="" class="btn btn-danger btn-block" @click.prevent="crearTaller('balance-inicial-horizontal')">Crear Taller</a>
            </div>
        </div>
      </div>
      </div>
      <div class="container border mt-1 mb-3  p-2 bg-info" v-else-if="taller_individual == 'kardex-fifo'">
        <h2 class="text-center font-weight-bold text-danger">KARDEX FIFO</h2>
           <h2 class="text-center font-weight-bold">Agregar Productos </h2>
              <div class="row justify-content-center">
                <div class="col-4 mb-2">
                    <input autocomplete="ÑÖcompletes" type="text" name="" class="form-control" placeholder="Nombre del producto" v-model="individuales.kardex_fifo.nombre">
                </div>
                  <div class="col-12 mb-2">
                    <h3 class="text-center font-weight-bold text-ligth" >Transacciones</h3>
                    {{-- <ckeditor style="height: 300px" class="form-control border" :config="editorConfig" v-model="individuales.kardex_fifo.transacciones"></ckeditor> --}}
                    <vue-ckeditor v-model="individuales.kardex_fifo.transacciones" :config="config"/>
                      {{-- <a href="" class="btn btn-danger" @click.prevent="agregar()">Agregar</a> --}}
                  </div>
                  <div class="col-2 mb-2">
                      <a href="" class="btn btn-danger btn-block" @click.prevent="agregarProductoFifo()">Agregar</a>
                  </div>
              </div>
                      
           {{--    <div class="card-deck"> --}}
          <div class="row row-cols-1 row-cols-md-2">
            <div class="col mb-4" v-for="(producto, index) in individuales.kardex_fifos">
                <div class="card text-white bg-dark mb-3" >
                  <div class="card-header">@{{ producto.nombre }}</div>
                  <div class="card-body">
                    <div v-html="producto.transacciones">
                      
                    </div>
                  </div>
                </div>
             
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-2 mb-2">
                      <a href="" class="btn btn-danger btn-block" @click.prevent="crearTaller('kardex-fifo')">CREAR TALLER</a>
                  </div>
          </div>

      </div>
            <div class="container border mt-1 mb-3  p-2 bg-info" v-else-if="taller_individual == 'kardex-promedio'">
        <h2 class="text-center font-weight-bold text-danger">KARDEX PROMEDIO</h2>
           <h2 class="text-center font-weight-bold">Agregar Productos </h2>
              <div class="row justify-content-center">
                <div class="col-4 mb-2">
                    <input autocomplete="ÑÖcompletes" type="text" name="" class="form-control" placeholder="Nombre del producto" v-model="individuales.kardex_promedio.nombre">
                </div>
                  <div class="col-12 mb-2">
                    <h3 class="text-center font-weight-bold text-ligth" >Transacciones</h3>
                    {{-- <ckeditor style="height: 300px" class="form-control border" :config="editorConfig" v-model="individuales.kardex_promedio.transacciones"></ckeditor> --}}
                    <vue-ckeditor v-model="individuales.kardex_promedio.transacciones" :config="config"/>
                      {{-- <a href="" class="btn btn-danger" @click.prevent="agregar()">Agregar</a> --}}
                  </div>
                  <div class="col-2 mb-2">
                      <a href="" class="btn btn-danger btn-block" @click.prevent="agregarProducto()">Agregar</a>
                  </div>
              </div>
                      
           {{--    <div class="card-deck"> --}}
          <div class="row row-cols-1 row-cols-md-2">
            <div class="col mb-4" v-for="(producto, index) in individuales.kardex_promedios">
                <div class="card text-white bg-dark mb-3" >
                  <div class="card-header">@{{ producto.nombre }}</div>
                  <div class="card-body">
                    <div v-html="producto.transacciones">
                      
                    </div>
                  </div>
                </div>
             
            </div>
          </div>
           <div class="row justify-content-center">
            <div class="col-2 mb-2">
              <a href="" class="btn btn-danger btn-block" @click.prevent="crearTaller('kardex-promedio')">CREAR TALLER</a>
            </div>
          </div>
      </div>

      <div class="container border mt-1 mb-3  p-2 bg-info" v-else-if="taller_individual == 'diario-general'">
        <h2 class="text-center font-weight-bold text-danger">DIARIO GENERAL</h2>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mb-2">
              <h3 class="text-center font-weight-bold text-ligth" >Transacciones</h3>
              {{-- <ckeditor style="height: 300px" class="form-control border" :config="editorConfig" v-model="individuales.diario_general"></ckeditor> --}}
              <vue-ckeditor v-model="individuales.diario_general" :config="config"/>
                {{-- <a href="" class="btn btn-danger" @click.prevent="agregar()">Agregar</a> --}}
            </div>
            <div class="col-2 mb-2">
                <a href="" class="btn btn-danger btn-block" @click.prevent="crearTaller('diario-general')">Crear Taller</a>
            </div>
        </div>
      </div>
      </div>
      <div class="container border mt-1 mb-3  p-2 bg-info" v-else-if="taller_individual == 'mayor-general'">
        <h2 class="text-center font-weight-bold text-danger">MAYOR GENERAL</h2>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mb-2">
              <h3 class="text-center font-weight-bold text-ligth" >Transacciones</h3>
              <vue-ckeditor v-model="individuales.mayorgeneral" :config="config"/>
              {{-- <ckeditor style="height: 300px" class="form-control border" :config="editorConfig" v-model="individuales.mayorgeneral"></ckeditor> --}}
                {{-- <a href="" class="btn btn-danger" @click.prevent="agregar()">Agregar</a> --}}
            </div>
            <div class="col-2 mb-2">
                <a href="" class="btn btn-danger btn-block" @click.prevent="crearTaller('mayor-general')">Crear Taller</a>
            </div>
        </div>
      </div>
      </div>
      <div class="container border mt-1 mb-3  p-2 bg-info" v-else-if="taller_individual == 'balance-comprobacion'">
        <h2 class="text-center font-weight-bold text-danger">BALANCE COMPROBACION</h2>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mb-2">
              <h3 class="text-center font-weight-bold text-ligth" >Transacciones</h3>
              <vue-ckeditor v-model="individuales.balance_comprobacion" :config="config"/>

              {{-- <ckeditor style="height: 300px" class="form-control border" :config="editorConfig" v-model="individuales.mayorgeneral"></ckeditor> --}}
                {{-- <a href="" class="btn btn-danger" @click.prevent="agregar()">Agregar</a> --}}
            </div>
            <div class="col-2 mb-2">
                <a href="" class="btn btn-danger btn-block" @click.prevent="crearTaller('balance-comprobacion')">Crear Taller</a>
            </div>
        </div>
      </div>
      </div>

        <div class="container border mt-1 mb-3  p-2 bg-info" v-else-if="taller_individual == 'hoja-trabajo'">
        <h2 class="text-center font-weight-bold text-danger">HOJA DE TRABAJO</h2>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mb-2">
              <h3 class="text-center font-weight-bold text-ligth" >Transacciones</h3>
              <vue-ckeditor v-model="individuales.hoja_trabajo" :config="config"/>
              {{-- <ckeditor style="height: 300px" class="form-control border" :config="editorConfig" v-model="individuales.mayorgeneral"></ckeditor> --}}
                {{-- <a href="" class="btn btn-danger" @click.prevent="agregar()">Agregar</a> --}}
            </div>
            <div class="col-2 mb-2">
                <a href="" class="btn btn-danger btn-block" @click.prevent="crearTaller('hoja-trabajo')">Crear Taller</a>
            </div>
        </div>
      </div>
      </div>

      <div class="container border mt-1 mb-3  p-2 bg-info" v-else-if="taller_individual == 'balance-comprobacion-ajustado'">
        <h2 class="text-center font-weight-bold text-danger">BALANCE COMPROBACION AJUSTADO</h2>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mb-2">
              <h3 class="text-center font-weight-bold text-ligth" >Transacciones</h3>
              <vue-ckeditor v-model="individuales.balance_comprobacion_ajustado" :config="config"/>

              {{-- <ckeditor style="height: 300px" class="form-control border" :config="editorConfig" v-model="individuales.mayorgeneral"></ckeditor> --}}
                {{-- <a href="" class="btn btn-danger" @click.prevent="agregar()">Agregar</a> --}}
            </div>
            <div class="col-2 mb-2">
                <a href="" class="btn btn-danger btn-block" @click.prevent="crearTaller('balance-comprobacion-ajustado')">Crear Taller</a>
            </div>
        </div>
      </div>
      </div>

      <div class="container border mt-1 mb-3  p-2 bg-info" v-else-if="taller_individual == 'estado-resultado'">
        <h2 class="text-center font-weight-bold text-danger">ESTADO DE RESULTADO</h2>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mb-2">
              <h3 class="text-center font-weight-bold text-ligth" >Transacciones</h3>
              <vue-ckeditor v-model="individuales.estado_resultado" :config="config"/>

              {{-- <ckeditor style="height: 300px" class="form-control border" :config="editorConfig" v-model="individuales.mayorgeneral"></ckeditor> --}}
                {{-- <a href="" class="btn btn-danger" @click.prevent="agregar()">Agregar</a> --}}
            </div>
            <div class="col-2 mb-2">
                <a href="" class="btn btn-danger btn-block" @click.prevent="crearTaller('estado-resultado')">Crear Taller</a>
            </div>
        </div>
      </div>
      </div>

      <div class="container border mt-1 mb-3  p-2 bg-info" v-else-if="taller_individual == 'balance-general'">
        <h2 class="text-center font-weight-bold text-danger">BALANCE GENERAL</h2>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mb-2">
              <h3 class="text-center font-weight-bold text-ligth" >Transacciones</h3>
              <vue-ckeditor v-model="individuales.balance_general" :config="config"/>

              {{-- <ckeditor style="height: 300px" class="form-control border" :config="editorConfig" v-model="individuales.mayorgeneral"></ckeditor> --}}
                {{-- <a href="" class="btn btn-danger" @click.prevent="agregar()">Agregar</a> --}}
            </div>
            <div class="col-2 mb-2">
                <a href="" class="btn btn-danger btn-block" @click.prevent="crearTaller('balance-general')">Crear Taller</a>
            </div>
        </div>
      </div>
      </div>


      <div class="container border mt-1 mb-3  p-2 bg-info" v-else-if="taller_individual == 'asientos-cierre'">
        <h2 class="text-center font-weight-bold text-danger">ASIENTOS CIERRE</h2>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mb-2">
              <h3 class="text-center font-weight-bold text-ligth" >Transacciones</h3>
              <vue-ckeditor v-model="individuales.asientos_cierre" :config="config"/>

              {{-- <ckeditor style="height: 300px" class="form-control border" :config="editorConfig" v-model="individuales.mayorgeneral"></ckeditor> --}}
                {{-- <a href="" class="btn btn-danger" @click.prevent="agregar()">Agregar</a> --}}
            </div>
            <div class="col-2 mb-2">
                <a href="" class="btn btn-danger btn-block" @click.prevent="crearTaller('asientos-cierre')">Crear Taller</a>
            </div>
        </div>
      </div>
      </div>

      <div class="container border mt-1 mb-3  p-2 bg-info" v-else-if="taller_individual == 'anexos'">
        <h2 class="text-center font-weight-bold text-danger">ANEXOS</h2>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mb-2">
              <h3 class="text-center font-weight-bold text-ligth" >Transacciones</h3>
              <vue-ckeditor v-model="individuales.anexos" :config="config"/>

              {{-- <ckeditor style="height: 300px" class="form-control border" :config="editorConfig" v-model="individuales.mayorgeneral" @ready="onReady"></ckeditor> --}}
                {{-- <a href="" class="btn btn-danger" @click.prevent="agregar()">Agregar</a> --}}
            </div>
            <div class="col-2 mb-2">
                <a href="" class="btn btn-danger btn-block" @click.prevent="crearTaller('anexos')">Crear Taller</a>
            </div>
        </div>
      </div>
      </div>
 </div>
 <div class="mb-3 container" v-else-if="concatenado.active">
         <div class="container border mt-1 p-2 bg-secondary">
             <div class="form-row">
              <div class="form-group col-4">
                  <label for="recipient-name" class="col-form-label">Institucion:</label>
                  <select name="contenido_id" v-model="instituto" class="custom-select select2" @change="onMateria()">
                  <option v-if="materias.length == 0" selected disabled="">@{{ instituto }}</option>
                      @foreach ($institutos = App\Instituto::get() as $instituto)
                      <option value="{{ $instituto->id }}">{{ $instituto->nombre }}</option>
                      @endforeach
                  </select>
              </div>
               <div class="form-group col-4">
                  <label for="recipient-name" class="col-form-label">Materia:</label>
                  <select name="contenido_id" v-model="materia" class="custom-select" @change="onContenido()">
                      <option v-if="contenido.length == 0" disabled>@{{ materia }}</option>
                      <option v-for="mate in materias" :value="mate.id">@{{mate.nombre}}</option>  
                  </select>
              </div>
               <div class="form-group col-4">
                  <label for="recipient-name" class="col-form-label">Unidad:</label>
                  <select v-model="contenido_id" class="custom-select" required>
                      
                     <option v-for="conte in contenido" :value="conte.id">@{{conte.nombre}}
                      </option> 
                  </select>
              </div>
          </div>
      </div>

     <h1 class="text-center text-info font-weight-bold mt-3">Taller Concatenado</h1>

          
     <div class="border mt-3">
          <div class="row mb-3">
            <div class="col-2">
              <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-balance-inicial-list" data-toggle="list" href="#list-balance-inicial" role="tab" aria-controls="balance-inicial">Balance Inicial</a>

                <a class="list-group-item list-group-item-action" id="list-kardex-list" data-toggle="list" href="#list-kardex" role="tab" aria-controls="kardex">Kardex Fifo</a>

                <a class="list-group-item list-group-item-action" id="list-diario-general-list" data-toggle="list" href="#list-diario-general" role="tab" aria-controls="diario-general">Diario General</a>

     {{--            <a class="list-group-item list-group-item-action" id="list-mayor-general-list" data-toggle="list" href="#list-mayor-general" role="tab" aria-controls="mayor-general">Mayor General</a>
                <a class="list-group-item list-group-item-action" id="list-balance-comprobacion-list" data-toggle="list" href="#list-balance-comprobacion" role="tab" aria-controls="balance-comprobacion">Balance de Comprobacion</a>
              <a class="list-group-item list-group-item-action" id="list-hoja-trabajo-list" data-toggle="list" href="#list-hoja-trabajo" role="tab" aria-controls="hoja-trabajo">Hoja de trabajo</a>
              <a class="list-group-item list-group-item-action" id="list-balance-comprobacion-ajustado-list" data-toggle="list" href="#list-balance-comprobacion-ajustado" role="tab" aria-controls="balance-comprobacion-ajustado">Balance Comprobacion Ajustado</a>

              <a class="list-group-item list-group-item-action" id="list-estado-resultado-list" data-toggle="list" href="#list-estado-resultado" role="tab" aria-controls="estado-resultado">Estado de Resultado</a>
              <a class="list-group-item list-group-item-action" id="list-balance-general-list" data-toggle="list" href="#list-balance-general" role="tab" aria-controls="balance-general">Balance General</a>
              <a class="list-group-item list-group-item-action" id="list-asientos-cierre-list" data-toggle="list" href="#list-asientos-cierre" role="tab" aria-controls="asientos-cierre">Asientos de cierre</a> --}}
             {{--  <a class="list-group-item list-group-item-action" id="list-anexos-list" data-toggle="list" href="#list-anexos" role="tab" aria-controls="anexos">Anexos</a> --}}

              </div>
            </div>
                  <div class="col-10">
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="list-balance-inicial" role="tabpanel" aria-labelledby="list-balance-inicial-list">
                              <h2 class="text-center font-weight-bold text-danger">BALANCE INICIAL VERTICAL</h2>      
                          <div class="container">
                          <div class="row justify-content-center">
                              <div class="col-12 mb-2">
                                <h3 class="text-center font-weight-bold text-dark" >Transacciones</h3>
                                <vue-ckeditor v-model="concatenados.balance_vertical" :config="config"/>
                                  {{-- <a href="" class="btn btn-danger" @click.prevent="agregar()">Agregar</a> --}}
                              </div>
                           
                          </div>
                        </div>
                    
                      </div>
                      <div class="tab-pane fade" id="list-kardex" role="tabpanel" aria-labelledby="list-kardex-list">
                              <h2 class="text-center font-weight-bold text-danger">KARDEX FIFO</h2>      

                          <h4 class="text-center font-weight-bold">Agregar Productos </h4>
                          <div class="row justify-content-center">
                            <div class="col-4 mb-2">
                                <input autocomplete="ÑÖcompletes"  type="text" name="" class="form-control" placeholder="Nombre del producto" v-model="concatenados.kardex_fifo.nombre">
                            </div>
                              <div class="col-12 mb-2">
                                <h3 class="text-center font-weight-bold text-info" >Transacciones</h3>
                                <vue-ckeditor v-model="concatenados.kardex_fifo.transacciones" :config="config"/>
                              </div>
                              <div class="col-2 mb-2">
                                  <a href="" class="btn btn-danger btn-block" @click.prevent="agregarProductoC()">Agregar Producto</a>
                              </div>
                          </div>
                      
                             <div class="row row-cols-1 row-cols-md-2">
                              <div class="col mb-4" v-for="(producto, index) in concatenados.kardex_fifos">
                                  <div class="card text-white bg-dark mb-3" >
                                    <div class="card-header">@{{ producto.nombre }}</div>
                                    <div class="card-body">
                                      <div v-html="producto.transacciones">
                                        
                                      </div>
                                    </div>
                                  </div>
                               
                              </div>
                            </div>

                      </div>
                      <div class="tab-pane fade" id="list-diario-general" role="tabpanel" aria-labelledby="list-diario-general-list">
                              <h2 class="text-center font-weight-bold text-danger">DIARIO GENERAL</h2>
                            <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 mb-2">
                                  <h3 class="text-center font-weight-bold text-ligth" >Transacciones</h3>
                                  {{-- <ckeditor style="height: 300px" class="form-control border" :config="editorConfig" v-model="individuales.diario_general"></ckeditor> --}}
                                  <vue-ckeditor v-model="concatenados.diario_general" :config="config"/>
                                    {{-- <a href="" class="btn btn-danger" @click.prevent="agregar()">Agregar</a> --}}
                                </div>
                                
                            </div>
                          </div>
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
     <div class="row mt-2 justify-content-center">
       <div class="col-2 mb-2">
            <a href="" class="btn btn-primary btn-block" @click.prevent="tallerConcatenado()">Crear Taller</a>
        </div>
     </div>
 </div>
</div>

@section('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.10.0/full/ckeditor.js"></script>
<script type="text/javascript">

    let modulo_contable = new Vue({
      el: "#modulo",
  
      data:{
        instituto: 'Seleccionar el Instituto',
        materia:'Seleccionar una materia',
        materias: [],
        contenido:[],
        contenido_id:'',
        enunciado:'',
        individuales:{
          balance_vertical:'',
          balance_horizontal:'',
          diario_general:'',
          mayorgeneral:'',
          balance_comprobacion:'',
          hoja_trabajo:'',
          balance_comprobacion_ajustado:'',
          estado_resultado:'',
          balance_general:'',
          asientos_cierre:'',
          kardex_promedio:{
            nombre:'',
            transacciones:''
          },
          kardex_fifo:{
            nombre:'',
            transacciones:''
          },
          kardex_fifos:[],
          kardex_promedios:[]
        },
        concatenados:{
          kardex_fifo:{
            nombre:'',
            transacciones:'',
          },
          kardex_fifos:[],
          balance_vertical:'',
          diario_general:'',
        },
        kardex_promedios:[],
        kardex_promedio:{
          nombre:'',
          transacciones:'',
        },
        taller_individual:'',
        categoria:'',
        individual:{
            active: false,
        },
        concatenado:{
            active:false,
        },
        comercial:'',
         editorData: '',
         config: {
        toolbar: [
          ['Bold', 'Italic', 'Underline', 'Strike', 'Styles', 'TextColor', 'BGColor', 'UIColor' , 'JustifyLeft' , 'JustifyCenter' , 'JustifyRight' , 'JustifyBlock' , 'BidiLtr' , 'BidiRtl' , 'NumberedList' , 'BulletedList' , 'Outdent' , 'Indent' , 'Blockquote' , 'CreateDiv']
        ],
        height: 300,
        // extraPlugins: 'colorbutton,colordialog'
      }
      },
      methods:{
          onMateria() {
            let set = this;
            set.materias = [];
            axios.post('/sistema/materiasasig', {
                id: set.instituto
            }).then(response => {
                set.materias = response.data;
                //console.log(set.materias);
            }).catch(e => {
                console.log(e);
            });
        },
        onContenido(){
            let set = this;
            set.contenido = [];
            axios.post('/sistema/contmateria', {
                id: set.materia
            }).then(response => {
                set.contenido = response.data;
                if (set.contenido == 0) {
                     toastr.error("Esta Materia no tiene contenidos", "Smarmoddle", {
                    "timeOut": "3000"
                });
                    set.materia = 'Seleccionar una materia';
                } 
                //console.log(set.contenido);
            }).catch(e => {
                console.log(e);
            });
        },
               guardarTaller34: function() {
                let _this = this;
                let url = '/sistema/admin/taller34';
                if (_this.registros.length == 0 ) {
                     toastr.error("No tienes registros para guardar el taller", "Smarmoddle", {
                        "timeOut": "3000"
                    });
                } else if (_this.taller.enunciado.trim() === ''){
                    toastr.error("No puedes dejar campos en blanco", "Smarmoddle", {
                        "timeOut": "3000"
                    });
                }else {
                axios.post(url,{
                registro: _this.registros,
                unidad: _this.taller.unidad_id,
                enunciado: _this.taller.enunciado,
                plantilla: _this.taller.plantilla_id,
                }).then(response => {
                   toastr.success("Taller Creado Correctamente", "Smarmoddle", {
                        "timeOut": "3000"
                    });
                window.location = "/sistema/home";
                     
                }).catch(function(error){

                }); 


                } 
            },
        elegirCategoria(){
            let tipo = this.categoria;

            if (tipo == 'individual') {
                this.concatenado.active = false;
                this.individual.active = true;


            }else if(tipo == 'secuencial'){
                this.taller_individual = 'kardex-promedio';
                this.individual.active = false;
                this.concatenado.active = true;
             

            }
        },
          crearTaller(tipo){
            let set = this;
            if (tipo == 'balance-inicial-vertical') {
                let url = '/sistema/admin/modulo/balance-inicial';
                if (set.individuales.balance_vertical.trim() === '' ) {
                     toastr.error("No has agregado las transacciones del balance", "Smarmoddle", {
                        "timeOut": "3000"
                    });
                }else if (set.contenido_id == '' ) {
                     toastr.error("No has elegido la materia para el taller", "Smarmoddle", {
                        "timeOut": "3000"
                    });
                }else{
                    axios.post(url,{
                      id: set.id_taller,
                      tipo: 'vertical',
                      enunciado: set.enunciado,
                      transacciones: set.individuales.balance_vertical,
                      contenido_id: set.contenido_id,
                      plantilla: 37,
                }).then(response => {
                   window.location = "/sistema/home";
                     
                }).catch(function(error){

                }); 

                }
             
                }else if(tipo == 'balance-inicial-horizontal'){
                    let url = '/sistema/admin/modulo/balance-inicial';
                    if (set.individuales.balance_horizontal.trim() === '' ) {
                         toastr.error("No has agregado las transacciones del balance", "Smarmoddle", {
                            "timeOut": "3000"
                        });
                    }else if (set.contenido_id == '' ) {
                         toastr.error("No has elegido la materia para el taller", "Smarmoddle", {
                            "timeOut": "3000"
                        });
                    }else{
                        axios.post(url,{
                          id: set.id_taller,
                          tipo: 'horizontal',
                          enunciado: set.enunciado,
                          transacciones: set.individuales.balance_horizontal,
                          contenido_id: set.contenido_id,
                          plantilla: 37,
                    }).then(response => {
                       window.location = "/sistema/home";
                         
                    }).catch(function(error){

                    }); 

                    }

                }else if(tipo == 'kardex-fifo'){
                      let url = '/sistema/admin/modulo/kardex-fifo';
                      if (set.individuales.kardex_fifos.length == 0 ) {
                           toastr.error("No has agregado productos", "Smarmoddle", {
                              "timeOut": "3000"
                          });
                      }else if (set.contenido_id == '' ) {
                           toastr.error("No has elegido la materia para el taller", "Smarmoddle", {
                              "timeOut": "3000"
                          });
                      }else{
                          axios.post(url,{
                            id: set.id_taller,
                            tipo: 'fifo',
                            enunciado: set.enunciado,
                            productos: set.individuales.kardex_fifos,
                            contenido_id: set.contenido_id,
                            plantilla: 37,
                      }).then(response => {
                         window.location = "/sistema/home";
                           
                      }).catch(function(error){

                      }); 

                      }
                }else if(tipo == 'kardex-promedio'){
                  let url = '/sistema/admin/modulo/kardex-fifo';
                      if (set.individuales.kardex_promedios.length == 0 ) {
                           toastr.error("No has agregado productos", "Smarmoddle", {
                              "timeOut": "3000"
                          });
                      }else if (set.contenido_id == '' ) {
                           toastr.error("No has elegido la materia para el taller", "Smarmoddle", {
                              "timeOut": "3000"
                          });
                      }else{
                          axios.post(url,{
                            id: set.id_taller,
                            tipo: 'promedio',
                            enunciado: set.enunciado,
                            productos: set.individuales.kardex_promedios,
                            contenido_id: set.contenido_id,
                            plantilla: 37,
                      }).then(response => {
                         window.location = "/sistema/home";
                           
                      }).catch(function(error){

                      }); 

                      }

                }else if(tipo == 'diario-general'){
                   let url = '/sistema/admin/modulo/diario-general';
                    if (set.individuales.diario_general.trim() === '' ) {
                         toastr.error("No has agregado las transacciones del diario", "Smarmoddle", {
                            "timeOut": "3000"
                        });
                    }else if (set.contenido_id == '' ) {
                         toastr.error("No has elegido la materia para el taller", "Smarmoddle", {
                            "timeOut": "3000"
                        });
                    }else{
                        axios.post(url,{
                          id: set.id_taller,
                          enunciado: set.enunciado,
                          transacciones: set.individuales.diario_general,
                          contenido_id: set.contenido_id,
                          plantilla: 37,
                    }).then(response => {
                       window.location = "/sistema/home";
                         
                    }).catch(function(error){

                    }); 

                    }

                }else if(tipo == 'mayor-general'){
                       let url = '/sistema/admin/modulo/mayor-general';
                    if (set.individuales.mayorgeneral.trim() === '' ) {
                         toastr.error("No has agregado las transacciones del diario", "Smarmoddle", {
                            "timeOut": "3000"
                        });
                    }else if (set.contenido_id == '' ) {
                         toastr.error("No has elegido la materia para el taller", "Smarmoddle", {
                            "timeOut": "3000"
                        });
                    }else{
                        axios.post(url,{
                          id: set.id_taller,
                          enunciado: set.enunciado,
                          transacciones: set.individuales.mayorgeneral,
                          contenido_id: set.contenido_id,
                          plantilla: 37,
                    }).then(response => {
                       window.location = "/sistema/home";
                         
                    }).catch(function(error){

                    }); 

                    }
                }else if(tipo == 'balance-comprobacion'){
                    let url = '/sistema/admin/modulo/balance-comprobacion';
                    if (set.individuales.balance_comprobacion.trim() === '' ) {
                         toastr.error("No has agregado las transacciones del balance", "Smarmoddle", {
                            "timeOut": "3000"
                        });
                    }else if (set.contenido_id == '' ) {
                         toastr.error("No has elegido la materia para el taller", "Smarmoddle", {
                            "timeOut": "3000"
                        });
                    }else{
                        axios.post(url,{
                          id: set.id_taller,
                          enunciado: set.enunciado,
                          transacciones: set.individuales.balance_comprobacion,
                          contenido_id: set.contenido_id,
                          plantilla: 37,
                    }).then(response => {
                       window.location = "/sistema/home";
                         
                    }).catch(function(error){

                    }); 

                    }

                }else if(tipo == 'hoja-trabajo'){
                    let url = '/sistema/admin/modulo/hoja-trabajo';
                    if (set.individuales.hoja_trabajo.trim() === '' ) {
                         toastr.error("No has agregado las transacciones a la hoja de trabajo", "Smarmoddle", {
                            "timeOut": "3000"
                        });
                    }else if (set.contenido_id == '' ) {
                         toastr.error("No has elegido la materia para el taller", "Smarmoddle", {
                            "timeOut": "3000"
                        });
                    }else{
                        axios.post(url,{
                          id: set.id_taller,
                          enunciado: set.enunciado,
                          transacciones: set.individuales.hoja_trabajo,
                          contenido_id: set.contenido_id,
                          plantilla: 37,
                    }).then(response => {
                       window.location = "/sistema/home";
                         
                    }).catch(function(error){

                    }); 

                    }

                }else if(tipo == 'balance-comprobacion-ajustado'){
                    let url = '/sistema/admin/modulo/balance-comprobacion-ajustado';
                    if (set.individuales.balance_comprobacion_ajustado.trim() === '' ) {
                         toastr.error("No has agregado las transacciones al Balance Ajustado", "Smarmoddle", {
                            "timeOut": "3000"
                        });
                    }else if (set.contenido_id == '' ) {
                         toastr.error("No has elegido la materia para el taller", "Smarmoddle", {
                            "timeOut": "3000"
                        });
                    }else{
                        axios.post(url,{
                          id: set.id_taller,
                          enunciado: set.enunciado,
                          transacciones: set.individuales.balance_comprobacion_ajustado,
                          contenido_id: set.contenido_id,
                          plantilla: 37,
                    }).then(response => {
                       window.location = "/sistema/home";
                         
                    }).catch(function(error){

                    }); 

                    }
                }else if(tipo == 'estado-resultado'){
                      let url = '/sistema/admin/modulo/estado-resultado';
                    if (set.individuales.estado_resultado.trim() === '' ) {
                         toastr.error("No has agregado las transacciones al Estado de Resultado", "Smarmoddle", {
                            "timeOut": "3000"
                        });
                    }else if (set.contenido_id == '' ) {
                         toastr.error("No has elegido la materia para el taller", "Smarmoddle", {
                            "timeOut": "3000"
                        });
                    }else{
                        axios.post(url,{
                          id: set.id_taller,
                          enunciado: set.enunciado,
                          transacciones: set.individuales.estado_resultado,
                          contenido_id: set.contenido_id,
                          plantilla: 37,
                    }).then(response => {
                       window.location = "/sistema/home";
                         
                    }).catch(function(error){

                    }); 

                    }
                }else if(tipo == 'balance-general'){
                    let url = '/sistema/admin/modulo/balance-general';
                    if (set.individuales.balance_general.trim() === '' ) {
                         toastr.error("No has agregado las transacciones al Balance General", "Smarmoddle", {
                            "timeOut": "3000"
                        });
                    }else if (set.contenido_id == '' ) {
                         toastr.error("No has elegido la materia para el taller", "Smarmoddle", {
                            "timeOut": "3000"
                        });
                    }else{
                        axios.post(url,{
                          id: set.id_taller,
                          enunciado: set.enunciado,
                          transacciones: set.individuales.balance_general,
                          contenido_id: set.contenido_id,
                          plantilla: 37,
                    }).then(response => {
                       window.location = "/sistema/home";
                         
                    }).catch(function(error){

                    }); 

                    }
                }else if(tipo == 'asientos-cierre'){
                    let url = '/sistema/admin/modulo/asiento-cierre';
                    if (set.individuales.asientos_cierre.trim() === '' ) {
                         toastr.error("No has agregado las transacciones al Asiento de Cierre", "Smarmoddle", {
                            "timeOut": "3000"
                        });
                    }else if (set.contenido_id == '' ) {
                         toastr.error("No has elegido la materia para el taller", "Smarmoddle", {
                            "timeOut": "3000"
                        });
                    }else{
                        axios.post(url,{
                          id: set.id_taller,
                          enunciado: set.enunciado,
                          transacciones: set.individuales.asientos_cierre,
                          contenido_id: set.contenido_id,
                          plantilla: 37,
                    }).then(response => {
                       window.location = "/sistema/home";
                         
                    }).catch(function(error){

                    }); 

                    }
                }else if(tipo == 'anexos'){

                }

          },
        agregarProducto(){
          if (this.individuales.kardex_promedio.nombre.trim() === '') {
            toastr.error("No has agregado el nombre del producto", "Smarmoddle", {
                "timeOut": "3000"
                });
          }else if(this.individuales.kardex_promedio.transacciones.trim() === '') {
            toastr.error("No has agregado las transacciones", "Smarmoddle", {
                "timeOut": "3000"
                });
          }else{

            let producto = {nombre: this.individuales.kardex_promedio.nombre, transacciones: this.individuales.kardex_promedio.transacciones}
            this.individuales.kardex_promedios.push(producto);
             toastr.success("Producto Agregado", "Smarmoddle", {
                "timeOut": "3000"
                });
             this.individuales.kardex_promedio.nombre ='';
              this.individuales.kardex_promedio.transacciones ='';
          }

        },
        agregarProductoFifo(){
          if (this.individuales.kardex_fifo.nombre.trim() === '') {
            toastr.error("No has agregado el nombre del producto", "Smarmoddle", {
                "timeOut": "3000"
                });
          }else if(this.individuales.kardex_fifo.transacciones.trim() === '') {
            toastr.error("No has agregado las transacciones", "Smarmoddle", {
                "timeOut": "3000"
                });
          }else{

            let producto = {nombre: this.individuales.kardex_fifo.nombre, transacciones: this.individuales.kardex_fifo.transacciones}
            this.individuales.kardex_fifos.push(producto);
             toastr.success("Producto Agregado", "Smarmoddle", {
                "timeOut": "3000"
                });
             this.individuales.kardex_fifo.nombre ='';
              this.individuales.kardex_fifo.transacciones ='';
          }

        },
        agregarProductoC(){
          if (this.concatenados.kardex_fifo.nombre.trim() === '') {
            toastr.error("No has agregado el nombre del producto", "Smarmoddle", {
                "timeOut": "3000"
                });
          }else if(this.concatenados.kardex_fifo.transacciones.trim() === '') {
            toastr.error("No has agregado las transacciones", "Smarmoddle", {
                "timeOut": "3000"
                });
          }else{

            let producto = {nombre: this.concatenados.kardex_fifo.nombre, transacciones: this.concatenados.kardex_fifo.transacciones}
            this.concatenados.kardex_fifos.push(producto);
             toastr.success("Producto Agregado", "Smarmoddle", {
                "timeOut": "3000"
                });
             this.concatenados.kardex_fifo.nombre ='';
              this.concatenados.kardex_fifo.transacciones ='';
          }

        },
            tallerConcatenado(){
            let set = this;


            let url = '/sistema/admin/modulo/taller-concatenado';
            if (set.contenido_id == '' ) {
                 toastr.error("No has elegido la materia para el taller", "Smarmoddle", {
                    "timeOut": "3000"
                });
            }else if (set.concatenados.balance_vertical == '' ) {
                 toastr.error("No has puesto las transacciones en el balance horizontal", "Smarmoddle", {
                    "timeOut": "3000"
                });
            }else if (set.concatenados.diario_general == '' ) {
                 toastr.error("No has puesto las transacciones en el Diario General", "Smarmoddle", {
                    "timeOut": "3000"
                });
            }else if (set.concatenados.kardex_fifos.length == 0 ) {
                 toastr.error("No tienes productos en el kardex", "Smarmoddle", {
                    "timeOut": "3000"
                });
            }else{
                axios.post(url,{
                  id: set.id_taller,
                  enunciado: set.enunciado,
                  productos: set.concatenados.kardex_fifos,
                  balance_vertical: set.concatenados.balance_vertical,
                  diario_general: set.concatenados.diario_general,
                  productos: set.concatenados.kardex_fifos,
                  contenido_id: set.contenido_id,
                  plantilla: 37,
            }).then(response => {
               window.location = "/sistema/home";
                 
            }).catch(function(error){

            }); 

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