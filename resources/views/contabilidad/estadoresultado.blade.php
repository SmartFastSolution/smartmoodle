<div id="estado_resultado" class="border border-danger p-4">
        <h2 class="text-center display-4 font-weight-bold text-danger">Estado de Resultado</h2>
<div class="row p-3  mb-2 justify-content-center ">
    <div class="col-5 mb-3">
          <input class="form-control" type="text" v-model="nombre" placeholder="Nombre de la empresa" name="" ><br>
          <input type="date" v-model="fecha" class="form-control">
    </div>
   
</div>

<div class="row">
	<div class="col-5"><h4>Ventas</h4></div>
	<div class="col-3"></div>
</div>
<div class="row">
	<div class="col-5"><h4>- Costos de Ventas</h4></div>
	<div class="col-3"></div>
</div>
<div class="row">
	<div class="col-9"><h3 class="font-weight-bold">Utilidad Bruta en Ventas</h3></div>
	<div class="col-3"></div>
</div>

<div class="row mt-2">
	<div class="col-6">
	<h1 class="font-weight-bold pl-3">INGRESOS <a data-toggle="tooltip" data-placement="top" title="Agregar Ingreso" @click="abrirIngreso()" class="btn btn-sm btn-info text-light"><i class="fa fa-plus"></i></a></h1>
		
	</div>
	<div class="col-12">
	<table>
		<tbody is="draggable" group="people" :list="ingresos" tag="tbody">
	    <tr v-for="(balan, index) in ingresos">
                  <td class="text-left" width="300">@{{ balan.cuenta}}</td>
                  <td align="center">@{{ decimales(balan.saldo)}}</td>
                  <td align="center"  width="50">
                    <a @click.prevent="editIngresoFuera(index)" class="btn btn-warning">
                      <i class="fas fa-edit"></i>
                    </a>
                  </td>
                    <td align="center" width="50">
                    <a @click.prevent="warningEliminar(index)" class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </td>
                </tr>
		</tbody>
	</table>
</div>
</div>
<div class="row justify-content-between">
	<div class="col-9"><h3 class="font-weight-bold">Total de ingresos</h3></div>
	<div class="col-2"><span class="badge badge-danger" style="font-size: 20px;">@{{ totales.ingreso }}</span></div>
</div>
<div class="row justify-content-between">
	<div class="col-10"><h3 class="font-weight-bold">Utilidad Neta en Operaciones</h3></div>
	<div class="col-1"><span class="badge badge-danger" style="font-size: 20px;">@{{ totales.utilidad_neta_o }}</span></div>
</div>

<div class="row mt-2">
	<div class="col-6">
	<h1 class="font-weight-bold pl-3">GASTOS <a data-toggle="tooltip" data-placement="top" title="Agregar Gastos" @click="abrirGastos()" class="btn btn-sm btn-info text-light"><i class="fa fa-plus"></i></a></h1>
</div>
		<div class="col-12">
	<table>
		<tbody is="draggable" group="people" :list="gastos" tag="tbody">
	    <tr v-for="(balan, index) in gastos">
                  <td class="text-left" width="300">@{{ balan.cuenta}}</td>
                  <td align="center">@{{ decimales(balan.saldo)}}</td>
                  <td align="center"  width="50">
                    <a @click.prevent="editGastoFuera(index)" class="btn btn-warning">
                      <i class="fas fa-edit"></i>
                    </a>
                  </td>
                    <td align="center" width="50">
                    <a @click.prevent="warningEliminar(index)" class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </td>
                </tr>
		</tbody>
	</table>
</div>
</div>

<div class="row justify-content-between">
	<div class="col-9"><h3 class="font-weight-bold">Total de gastos</h3></div>
	<div class="col-2"><span class="badge badge-danger" style="font-size: 20px;">@{{ totales.gastos }}</span></div>
</div>

<div class="row justify-content-between">
	<div class="col-7">
		<select class="custom-select" v-model="utilidad" name="" id="" @change="selectUtilidad()">
		<option selected="" disabled="" value="">ELEGIR UNA OPCION</option>
		<option value="utilidad_neta">UTILIDAD NETA DEL EJERCICIO</option>
		<option value="utilidad_perdida">UTILIDAD PERDIDA DEL EJERCICIO</option>
		</select>
	</div>
	<div class="col-3"><input type="number" class="form-control text-right"></div>
</div>
<div class="mt-2" v-if="utilidad == 'utilidad_neta'">
	<a href="" class="btn btn-danger btn-sm" @click.prevent="abrirUtilidades()">Agregar Cuentas</a>
	<div class="col-12">
	<table>
		<tbody is="draggable" group="people" :list="utilidades" tag="tbody">
	    <tr v-for="(balan, index) in utilidades">
                  <td class="text-left" width="750">@{{ balan.cuenta}}</td>
                  <td align="center">@{{ decimales(balan.saldo)}}</td>
                  <td align="center"  width="50">
                    <a @click.prevent="editUtilidadFuera(index)" class="btn btn-warning">
                      <i class="fas fa-edit"></i>
                    </a>
                  </td>
                    <td align="center" width="50">
                    <a @click.prevent="warningEliminar(index)" class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </td>
                </tr>
		</tbody>
	</table>
</div>
</div>

<div class="row mt-2 justify-content-between">
	<div class="col-7">
	<h2 class="font-weight-bold">UTILIDAD LIQUIDA DEL EJERCICIO</h2>
		
	</div>
	<div class="col-3"><input type="number" class="form-control text-right"></div>
</div>
<a href="" @click.prevent="VueSweetAlert2('example-component',{title: 'Called from basic js',
                    noteProp: [
                        'Note number 1',
                        'Note number 2'
                    ]})">CALCULADORA</a>
    @include ('contabilidad.modales.modalestadoresultado')

</div>