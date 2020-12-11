<div id="kardex_promedio" class="border border-danger p-4">
	<h1 class="text-center font-weight-bold text-danger">KARDEX</h1>
	<h5 class="text-center font-weight-bold text-info">METODO PROMEDIO</h5>
	<div class="row justify-content-center mb-2">
		<div class="col-5 mb-3">
			<input type="" name="" placeholder="PRODUCTO" class="form-control text-center">
		</div>

			<table class="table table-bordered table-responsive table-sm">
		<thead class="bg-warning"> 
		  <tr class="text-center">
		    <th style="vertical-align:middle" rowspan="2" width="100">FECHA</th>
		    <th style="vertical-align:middle" rowspan="2" width="300">FACTURAS</th>
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
		<tbody  style="border-bottom: solid 3px #0F0101;">
			<tr v-for="(exist, id) in transacciones" >
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
				<td v-if="transacciones.length >= 1 && transacciones[id].tipo == 'ingreso' || transacciones[id].tipo == 'inicial' || transacciones[id].tipo == 'egreso'"><a class="btn btn-sm btn-warning" href="" @click.prevent="editarTransaccion(id, exist.tipo)"><i class="fas fa-edit"></i></a></td>
				<td v-if="transacciones.length >= 1 && transacciones[id].tipo == 'ingreso'  || transacciones[id].tipo == 'inicial' || transacciones[id].tipo == 'egreso'"><a class="btn btn-sm btn-danger" href="" @click.prevent="borrarTransaccion(id)"><i class="fas fa-trash"></i></a></td>
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
 	@include('contabilidad.modales.modalkardex_promedio')

 <div class="col-4 align-self-center">

	<a {{-- v-if="transacciones.length == 0" --}} class="btn btn-sm btn-success mr-2" @click.prevent="modalInicial()">Saldo Inicial</a>
	<a  class="btn btn-sm btn-info mr-2" @click.prevent="modalTransacciones()">Agregar Ingreso / Egreso</a>
	{{-- <a  class="btn btn-sm btn-info mr-2" href="#" @click.prevent="modalEgreso()" data-toggle="modal" data-target="#egreso">EGRESO</a> --}}
	
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
							<td><input type="text" class="form-control form-control-sm"></td>
							<td><input type="text" class="form-control form-control-sm"></td>
						</tr>
						<tr>
							<td>Adquisiciones</td>
							<td><input type="text" placeholder="+" class="form-control form-control-sm"></td>
							<td><input type="text" placeholder="+" class="form-control form-control-sm"></td>
						</tr>
						<tr>
							<td>(-) Ventas</td>
							<td><input type="text" placeholder="-" class="form-control form-control-sm"></td>
							<td><input type="text" placeholder="-" class="form-control form-control-sm"></td>
						</tr>
						<tr>
							<td>Inv. Final Mercaderia Inicial</td>
							<td><input type="text" class="form-control form-control-sm"></td>
							<td><input type="text" class="form-control form-control-sm"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
</div>
<div v-if="ingresos.length > 0">
<table  class="table table-bordered table-responsive">
		<thead class="bg-warning"> 
		  <tr class="text-center">
		    <th style="vertical-align:middle" rowspan="2">FECHA</th>
		    <th style="vertical-align:middle" rowspan="2">MOVIMIENTOS</th>
		    <th colspan="3">INGRESOS</th>
		    <th colspan="3">EGRESOS</th>
		    <th colspan="3">EXISTENCIA</th>
		    {{-- <th style="vertical-align:middle" rowspan="2">ELIMINAR</th> --}}

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
				<tr v-for="(transa, id) in ingresos">
					<td><input type="text"   class="form-control-sm form-control-plaintext" v-model=" transa.fecha"></td>
					<td><input type="text"  class="form-control-sm form-control-plaintext" v-model="transa.movimiento"></td>
					<td ><input type="text"  class="form-control-sm form-control-plaintext" v-model="transa.ingreso_cantidad" @keyup.enter="totalIng(id)"></td>
					<td ><input type="text"  class="form-control-sm form-control-plaintext" v-model="transa.ingreso_precio" @keyup.enter="totalIng(id)"> </td>
					<td>@{{ transa.ingreso_total }}</td>
					<td><input type="text" v-if="transa.egreso_cantidad" class="form-control-sm form-control-plaintext" v-model="transa.egreso_cantidad"></td>
					<td><input type="text" v-if="transa.egreso_precio" class="form-control-sm form-control-plaintext" v-model="transa.egreso_precio"></td>
					<td>@{{ transa.egreso_total }}</td>
					<td><input type="text" class="form-control-sm form-control-plaintext" v-model="transa.existencia_cantidad"></td>
					<td><input type="text" class="form-control-sm form-control-plaintext" v-model="transa.existencia_precio"></td>
					{{-- <td v-if="!actuingreso.estado">@{{ transa.existencia_total }}</td> --}}
					<td><input type="text" class="form-control-sm form-control-plaintext" v-model="transa.existencia_total"></td>
					{{-- <td><a href="#" class="btn btn-sm btn-danger" @click.prevent="borrarIngreso(id, 'ingreso')"> <i class="fas fa-trash"></i></a></td> --}}
				</tr>
			</tbody>
</table>
	<div class="row justify-content-center">
		<a class="btn btn-sm btn-primary mr-2" href="" @click.prevent="actualizarIngreso()">Actualizar Transaccion</a>
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
					    {{-- <th style="vertical-align:middle" rowspan="2">ELIMINAR</th> --}}
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
								<td><input type="text"  v-if="transa.ingreso_cantidad !== ''" class="form-control-sm form-control-plaintext" v-model="transa.ingreso_cantidad" ></td>
								<td><input type="text" v-if="transa.ingreso_precio !== ''"  class="form-control-sm form-control-plaintext" v-model="transa.ingreso_precio" > </td>
								<td>@{{ transa.ingreso_total }}</td>
								<td><input type="text" class="form-control-sm form-control-plaintext" v-model="transa.egreso_cantidad" @keyup.enter="totaEgre(id)"></td>
								<td><input type="text"  class="form-control-sm form-control-plaintext" v-model="transa.egreso_precio" @keyup.enter="totaEgre(id)"></td>
							
								<td>@{{ transa.egreso_total }}</td>
								<td><input type="text" class="form-control-sm form-control-plaintext" v-model="transa.existencia_cantidad"></td>
								<td><input type="text" class="form-control-sm form-control-plaintext" v-model="transa.existencia_precio"></td>
								{{-- <td v-if="!actuegreso.estado">@{{ transa.existencia_total }}</td> --}}
								<td ><input type="text" class="form-control-sm form-control-plaintext" v-model="transa.existencia_total"></td>
								{{-- <td v-if="transa.tipo == 'existencia'"><a href="#"   class="btn btn-sm btn-danger" @click.prevent="borrarEgresoAct(id, 'existencia')"> <i class="fas fa-trash"></i></a></td>
								<td v-if="transa.tipo == 'egreso_compra'"><a href="#"   class="btn btn-sm btn-danger" @click.prevent="borrarEgresoAct(id, 'egreso_compra')"> <i class="fas fa-trash"></i></a></td>
								<td v-if="transa.tipo == 'egreso'"><a href="#"   class="btn btn-sm btn-danger" @click.prevent="borrarEgresoAct(id, 'egreso')"> <i class="fas fa-trash"></i></a></td> --}}
							</tr>
						</tbody>
			</table>
			<div v-if="!transaccion.egreso.edit" class="row justify-content-center">
				<a class="btn btn-sm btn-primary mr-2"  href="" @click.prevent="actualizarEgreso()">Actualizar Transaccion</a>
			</div>
	
		</div>

</div>