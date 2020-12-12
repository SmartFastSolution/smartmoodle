<div id="kardex" class="border border-danger p-4">
	<div class="float-left">
		<select v-model="producto_id" class="custom-select" name="" id="" @change="obtenerKardexFifo()">
			<option disabled selected value="">ELIGE UN PRODUCTO</option>
			<option :value="1">COCINAS</option>
			<option :value="2">AIRE ACONDICIONADO</option>
			<option :value="3">MESA</option>
		</select>
	</div><br><br>
	<h1 class="text-center font-weight-bold text-danger">KARDEX</h1>
	<h5 class="text-center font-weight-bold text-info">METODO FIFO</h5>
	<div class="row justify-content-center mb-2">
		<div class="col-5">
	<input  v-model="nombre"  type="" name="" placeholder="NOMBRE" class="form-control text-center">

	<input v-model="producto"   type="" name="" placeholder="PRODUCTO" class="form-control text-center">
			
		</div>
	</div>
{{-- 	<example-component :nombres="{{json_encode(Auth::user()->id)}}">
	</example-component>

	<example-component :nombres="'ANTHONY'">
	</example-component> --}}
	<table class="table table-bordered table-responsive table-sm">
		<thead class="bg-warning"> 
		  <tr class="text-center">
		    <th style="vertical-align:middle" rowspan="2" width="100">FECHA</th>
		    <th style="vertical-align:middle" rowspan="2" width="300">MOVIMIENTOS</th>
		    <th colspan="3">INGRESOS</th>
		    <th colspan="3">EGRESOS</th>
		    <th colspan="3">EXISTENCIA</th>
		    <th v-if="transacciones.length >= 1" style="vertical-align:middle" rowspan="2" colspan="2">ACCIONES</th>

		  </tr>
		  <tr class="text-center">
		    <td>CANT.</td>
		    <td>PREC. UNIT</td>
		    <td>TOTAL</td>
		    <td>CANT.</td>
		    <td>PREC. UNIT</td>
		    <td>TOTAL</td>
		    <td>CANT</td>
		    <td>PREC. UNIT</td>
		    <td>TOTAL</td>
		  </tr>
		</thead>
		<tbody v-for="(transa, index) in transacciones" style="border-bottom: solid 3px #0F0101;">
			<tr v-for="(exist, id) in transa" >
				<td>@{{ exist.fecha }}</td>
				<td>@{{ exist.movimiento }}</td>
				<td>@{{ exist.ingreso_cantidad }}</td>
				<td>@{{ exist.ingreso_precio }}</td>
				<td>@{{ exist.ingreso_total }}</td>
				<td>@{{ exist.egreso_cantidad }}</td>
				<td>@{{ exist.egreso_precio }}</td>
				<td>@{{ exist.egreso_total }}</td>
				<td>@{{ exist.existencia_cantidad }}</td>
				<td>@{{ exist.existencia_precio }}</td>
				<td>@{{ exist.existencia_total }}</td>
				<td v-if="transacciones.length >= 1 && transacciones[index][id].tipo == 'ingreso' || transacciones[index][id].tipo == 'inicial' || transacciones[index][id].tipo == 'egreso' || transacciones[index][id].tipo == 'ingreso_venta' || transacciones[index][id].tipo == 'egreso_compra'"><a class="btn btn-sm btn-warning" href="" @click.prevent="editarTransaccion(index, id)"><i class="fas fa-edit"></i></a></td>
				<td v-if="transacciones.length >= 1 && transacciones[index][id].tipo == 'ingreso'  || transacciones[index][id].tipo == 'egreso' || transacciones[index][id].tipo == 'inicial'||  transacciones[index][id].tipo == 'ingreso_venta' || transacciones[index][id].tipo == 'egreso_compra'"><a class="btn btn-sm btn-danger" href="" @click.prevent="borrarTransaccion(index, id)"><i class="fas fa-trash"></i></a></td>
				<td v-else colspan="2"></td>
			</tr>
		</tbody>

		<tbody>
		  <tr class="bg-secondary">
		    <td></td>
		    <td class="font-weight-bold text-danger">SUMAN</td>
		    <td>@{{ suman.ingreso_cantidad }}</td>
		    <td></td>
		    <td>@{{ suman.ingreso_total }}</td>
		    <td>@{{ suman.egreso_cantidad }}</td>
		    <td></td>
		    <td>@{{ suman.egreso_total }}</td>
		    <td></td>
		    <td></td>
		    <td></td>
		  </tr>
		</tbody>
</table>


 @include('contabilidad.modales.modalkardex')


<div v-if="!actuingreso.estado && !actuegreso.estado" class="row justify-content-center">

	<div class="col-4 align-self-center">
	{{-- <a class="btn btn-sm btn-primary mr-2" href="">Agregar Inicial</a> --}}
	<a {{-- v-if="transacciones.length == 0" --}} class="btn btn-sm btn-success mr-2" @click.prevent="modalInicial()">Saldo Inicial</a>
	<a  class="btn btn-sm btn-secondary mr-2" @click.prevent="modalIngreso()" href="#" data-toggle="modal" data-target="#ingreso">INGRESO</a>
	<a  class="btn btn-sm btn-info mr-2" href="#" @click.prevent="modalEgreso()" data-toggle="modal" data-target="#egreso">EGRESO</a>
	{{-- <a class="btn btn-sm btn-success mr-2" href="#" @click.prevent="modalCompra()" data-toggle="modal" data-target="#devolucion_compra">Devolucion compra</a>
	<a class="btn btn-sm btn-warning mr-2" href="#"@click.prevent="modalVenta()"  data-toggle="modal" data-target="#devolucion_venta">Devolucion Venta</a> --}}

	</div>
	<div class="col-12 mt-3">
<div class="row justify-content-center">
			<div class="col-6 border rounded border-danger">
				<table class="table table-sm">
					<thead>
						<tr>
							<th width="200">PRUEBA</th>
							<th class="text-center text-danger">CANTIDAD</th>
							<th class="text-center text-danger">TOTAL</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Inventario Mercaderia Inicial</td>
							<td><input v-model="prueba.cantidad.inventario_inicial" type="text" class="form-control form-control-sm"></td>
							<td><input v-model="prueba.precio.inventario_inicial" type="text" class="form-control form-control-sm"></td>
						</tr>
						<tr>
							<td>Adquisiciones</td>
							<td><input v-model="prueba.cantidad.adquicisiones" type="text" placeholder="+" class="form-control form-control-sm"></td>
							<td><input v-model="prueba.precio.adquicisiones" type="text" placeholder="+" class="form-control form-control-sm"></td>
						</tr>
						<tr>
							<td>(-) Ventas</td>
							<td><input v-model="prueba.cantidad.ventas" type="text" placeholder="-" class="form-control form-control-sm"></td>
							<td><input v-model="prueba.precio.ventas" type="text" placeholder="-" class="form-control form-control-sm"></td>
						</tr>
						<tr>
							<td>Inv. Final Mercaderia Inicial</td>
							<td><input v-model="prueba.cantidad.inventario_final" type="text" class="form-control form-control-sm"></td>
							<td><input v-model="prueba.precio.inventario_final" type="text" class="form-control form-control-sm"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
		<div class="col-2 mt-2">
			<a href="" class="btn btn-primary" @click.prevent="guardarKardex()">GUARDAR KARDEX</a>
		</div>
</div>

<div v-if="ejercicio.length > 0">
<table  class="table table-bordered table-responsive">
		<thead class="bg-warning"> 
		  <tr class="text-center">
		    <th style="vertical-align:middle" rowspan="2">FECHA</th>
		    <th style="vertical-align:middle" rowspan="2">MOVIMIENTOS</th>
		    <th colspan="3">INGRESOS</th>
		    <th colspan="3">EGRESOS</th>
		    <th colspan="3">EXISTENCIA</th>
		    <th style="vertical-align:middle" rowspan="2">ELIMINAR</th>

		  </tr>
		  <tr class="text-center">
		    <td>CANT.</td>
		    <td>PREC. UNIT</td>
		    <td>TOTAL</td>
		    <td>CANT.</td>
		    <td>PREC. UNIT</td>
		    <td>TOTAL</td>
		    <td>CANT</td>
		    <td>PREC. UNIT</td>
		    <td>TOTAL</td>
		  </tr>
			</thead>
			<tbody is="draggable" group="ejercicio" :list="ejercicio" tag="tbody">
				<tr v-for="(transa, id) in ejercicio">
					<td><input type="text"   class="form-control-sm form-control-plaintext" v-model=" transa.fecha"></td>
					<td><input type="text"  class="form-control-sm form-control-plaintext" v-model="transa.movimiento"></td>

					<td v-if="transa.tipo == 'existencia'"><input type="text"  class="form-control-sm form-control-plaintext" v-model="transa.ingreso_cantidad"></td>
					<td v-if="transa.tipo == 'existencia'"><input type="text"  class="form-control-sm form-control-plaintext" v-model="transa.ingreso_precio"> </td>

					<td v-if="transa.tipo == 'ingreso'"><input type="text"  class="form-control-sm form-control-plaintext" v-model="transa.ingreso_cantidad" @keyup.enter="totalIng(id)"></td>
					<td v-if="transa.tipo == 'ingreso'"><input type="text"  class="form-control-sm form-control-plaintext" v-model="transa.ingreso_precio" @keyup.enter="totalIng(id)"> </td>

					<td v-if="transa.tipo == 'ingreso_venta'"><input type="text"  class="form-control-sm form-control-plaintext" v-model="transa.ingreso_cantidad" @keyup.enter="ventaIng(id)"></td>
					<td v-if="transa.tipo == 'ingreso_venta'"><input type="text"  class="form-control-sm form-control-plaintext" v-model="transa.ingreso_precio" @keyup.enter="ventaIng(id)"> </td>

					<td>@{{ transa.ingreso_total }}</td>
					{{-- <td><input type="text" v-if="transa.ingreso_total" class="form-control-sm form-control-plaintext" v-model=" transa.ingreso_total"></td> --}}
					<td><input type="text" v-if="transa.egreso_cantidad" class="form-control-sm form-control-plaintext" v-model="transa.egreso_cantidad"></td>
					<td><input type="text" v-if="transa.egreso_precio" class="form-control-sm form-control-plaintext" v-model="transa.egreso_precio"></td>
					{{-- <td><input type="text" v-if="transa.egreso_total" class="form-control-sm form-control-plaintext" v-model=" transa.egreso_total"></td> --}}
					<td>@{{ transa.egreso_total }}</td>
					<td><input type="text" class="form-control-sm form-control-plaintext" v-model="transa.existencia_cantidad"></td>
					<td><input type="text" class="form-control-sm form-control-plaintext" v-model="transa.existencia_precio"></td>
					{{-- <td><input type="text" v-if="transa.existencia_total" class="form-control-sm form-control-plaintext" v-model=" transa.existencia_total"></td> --}}
					<td v-if="!actuingreso.estado">@{{ transa.existencia_total }}</td>
					<td v-if="actuingreso.estado"><input type="text" class="form-control-sm form-control-plaintext" v-model="transa.existencia_total"></td>
					<td><a href="#" class="btn btn-sm btn-danger" @click.prevent="borrarIngreso(id, 'ingreso')"> <i class="fas fa-trash"></i></a></td>
				</tr>
			</tbody>
</table>


<div class="row justify-content-center">
<a class="btn btn-sm btn-primary mr-2 float-left"  href="" @click.prevent="actuExiIng()">Agregar Existencia</a>
<a class="btn btn-sm btn-primary mr-2" v-if="actuingreso.estado" href="" @click.prevent="actualizarIngreso()">Actualizar Transaccion</a>
</div>
</div>


			<div v-if="egresos.length > 0">
			<table  class="table table-bordered table-responsive">
					<thead class="bg-warning"> 
					  <tr class="text-center">
					    <th style="vertical-align:middle" rowspan="2">FECHA</th>
					    <th style="vertical-align:middle" rowspan="2">MOVIMIENTOS</th>
					    <th colspan="3">INGRESOS</th>
					    <th colspan="3">EGRESOS</th>
					    <th colspan="3">EXISTENCIA</th>
					    <th style="vertical-align:middle" rowspan="2">ELIMINAR</th>
					  </tr>
					  <tr class="text-center">
					    <td>CANT.</td>
					    <td>PREC. UNIT</td>
					    <td>TOTAL</td>
					    <td>CANT.</td>
					    <td>PREC. UNIT</td>
					    <td>TOTAL</td>
					    <td>CANT</td>
					    <td>PREC. UNIT</td>
					    <td>TOTAL</td>
					  </tr>
						</thead>
						<tbody>
							<tr v-for="(transa, id) in egresos">
								<td><input type="text"   class="form-control-sm form-control-plaintext" v-model=" transa.fecha"></td>
								<td><input type="text"  class="form-control-sm form-control-plaintext" v-model="transa.movimiento"></td>
								<td><input type="text"  v-if="transa.ingreso_cantidad" class="form-control-sm form-control-plaintext" v-model="transa.ingreso_cantidad" ></td>
								<td><input type="text" v-if="transa.ingreso_precio"  class="form-control-sm form-control-plaintext" v-model="transa.ingreso_precio" > </td>
								<td>@{{ transa.ingreso_total }}</td>
								{{-- <td><input type="text" v-if="transa.ingreso_total" class="form-control-sm form-control-plaintext" v-model=" transa.ingreso_total"></td> --}}
								<td><input type="text" class="form-control-sm form-control-plaintext" v-model="transa.egreso_cantidad" @keyup.enter="totaEgre(id)"></td>
								<td><input type="text"  class="form-control-sm form-control-plaintext" v-model="transa.egreso_precio" @keyup.enter="totaEgre(id)"></td>
								{{-- <td><input type="text" v-if="transa.egreso_total" class="form-control-sm form-control-plaintext" v-model=" transa.egreso_total"></td> --}}
								<td>@{{ transa.egreso_total }}</td>
								<td><input type="text" class="form-control-sm form-control-plaintext" v-model="transa.existencia_cantidad"></td>
								<td><input type="text" class="form-control-sm form-control-plaintext" v-model="transa.existencia_precio"></td>
								{{-- <td><input type="text" v-if="transa.existencia_total" class="form-control-sm form-control-plaintext" v-model=" transa.existencia_total"></td> --}}
								<td v-if="!actuegreso.estado">@{{ transa.existencia_total }}</td>
								<td v-if="actuegreso.estado"><input type="text" class="form-control-sm form-control-plaintext" v-model="transa.existencia_total"></td>
								<td v-if="transa.tipo == 'existencia'"><a href="#"   class="btn btn-sm btn-danger" @click.prevent="borrarEgresoAct(id, 'existencia')"> <i class="fas fa-trash"></i></a></td>
								<td v-if="transa.tipo == 'egreso_compra'"><a href="#"   class="btn btn-sm btn-danger" @click.prevent="borrarEgresoAct(id, 'egreso_compra')"> <i class="fas fa-trash"></i></a></td>
								<td v-if="transa.tipo == 'egreso'"><a href="#"   class="btn btn-sm btn-danger" @click.prevent="borrarEgresoAct(id, 'egreso')"> <i class="fas fa-trash"></i></a></td>
							</tr>
						</tbody>
			</table>
			<div v-if="!transaccion.egreso.edit" class="row justify-content-center">
			<a class="btn btn-sm btn-primary mr-2 float-left" v-if="actuegreso.estado && actuegreso.tipo" href="" @click.prevent="agregarNewEgreso('agregar')">Agregar Egreso</a>
			<a class="btn btn-sm btn-primary mr-2 float-left"  href="" @click.prevent="exisEgresoAct('egreso')">Agregar Existencia</a>
			<a class="btn btn-sm btn-primary mr-2" v-if="actuegreso.estado" href="" @click.prevent="ActualizarEgresos()">Actualizar Transaccion</a>
			</div>
			<div v-if="transaccion.egreso.edit" class="row justify-content-center">
			{{-- 	<div class="col"><input type="text"  placeholder="fecha" v-model="transaccion.fecha" class="form-control"></div>
				<div class="col-4"><input type="text" placeholder="movimiento" v-model="transaccion.movimiento" class="form-control"></div> --}}
				<div class="col-2"><input type="text" placeholder="cantidad" v-model="transaccion.egreso.cantidad" class="form-control"></div>
				<div class="col-2"><input type="text" placeholder="precio" v-model="transaccion.egreso.precio" class="form-control"></div>
				<div class="col-2"><a href="" @click.prevent="agregarEgresoNew()" class="btn btn-success">EGRESO</a> <a href="" @click.prevent="agregarNewEgreso('cerrar')" class="btn btn-danger"><i class="fas fa-window-close"></i></a> </div>
			</div>
			</div>
			</div>
{{-- 
<div id="aPPcalculador">
      <div class="container">
        <div class="calculator">
          <div class="answer">@{{ answer }}</div>
          <div class="display">@{{ logList + current }}</div>
          <div @click="clear" id="clear" class="btn operator">C</div>
          <div @click="sign" id="sign" class="btn operator">+/-</div>
          <div @click="percent" id="percent" class="btn operator">
            %
          </div>
          <div @click="divide" id="divide" class="btn operator">
            /
          </div>
          <div @click="append('7')" id="n7" class="btn">7</div>
          <div @click="append('8')" id="n8" class="btn">8</div>
          <div @click="append('9')" id="n9" class="btn">9</div>
          <div @click="times" id="times" class="btn operator">*</div>
          <div @click="append('4')" id="n4" class="btn">4</div>
          <div @click="append('5')" id="n5" class="btn">5</div>
          <div @click="append('6')" id="n6" class="btn">6</div>
          <div @click="minus" id="minus" class="btn operator">-</div>
          <div @click="append('1')" id="n1" class="btn">1</div>
          <div @click="append('2')" id="n2" class="btn">2</div>
          <div @click="append('3')" id="n3" class="btn">3</div>
          <div @click="plus" id="plus" class="btn operator">+</div>
          <div @click="append('0')" id="n0" class="zero">0</div>
          <div @click="dot" id="dot" class="btn">.</div>
          <div @click="equal" id="equal" class="btn operator">=</div>
        </div>
      </div>
    </div> --}}

{{--     <h1 class="cover-heading">Calculator</h1>


	<div id="calApp">
      <p>@{{ display }}:@{{ prevOps }}:@{{ decimalAdded }}:@{{ total }}</br>CurrentNum=> @{{ currentNum }}</p>
      <div class="calculator">
          <div class="display font-weight-bold">@{{ display }}</div> 
          <div class="boton operator" @click="clear">C</div>
          <div class="boton operator" @click="del">DEL</div>
          <div class="boton operator" @click="enterOps(4)">÷</div>
          <div class="boton operator" @click="enterOps(3)">*</div>
       
          <div class="boton" @click="enterNum(7)">7</div>
          <div class="boton" @click="enterNum(8)">8</div>
          <div class="boton" @click="enterNum(9)">9</div>
          <div class="boton operator" @click="enterOps(2)">-</div>
        
          <div class="boton" @click="enterNum(4)">4</div>
          <div class="boton" @click="enterNum(5)">5</div>
          <div class="boton" @click="enterNum(6)">6</div>
          <div class="boton operator" @click="enterOps(1)">+</div>
        
          <div class="boton" @click="enterNum(1)">1</div>
          <div class="boton" @click="enterNum(2)">2</div>
          <div class="boton" @click="enterNum(3)">3</div>
       
          <div class="zero" @click="enterNum(0)">0</div>
          <div class="boton" @click="addDecimal">.</div>
          <div class="boton operator" @click="sum">=</div>
          <div class="btn ">&nbsp;</div>
      </div>
  </div>
        
  --}}


  {{-- <div class="container"> --}}

  {{-- </div> --}}