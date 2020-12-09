<div id="kardex_promedio" class="border border-danger p-4">
	<h1 class="text-center font-weight-bold text-danger">KARDEX</h1>
	<h5 class="text-center font-weight-bold text-info">METODO PROMEDIO</h5>
		<div class="row justify-content-center mb-2">
		<div class="col-5">
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
				<td v-if="transacciones.length >= 1 && transacciones[id].tipo == 'ingreso'  || transacciones[id].tipo == 'egreso'"><a class="btn btn-sm btn-danger" href="" @click.prevent="borrarTransaccion(id)"><i class="fas fa-trash"></i></a></td>
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

	<a v-if="transacciones.length == 0" class="btn btn-sm btn-success mr-2" @click.prevent="modalInicial()">Saldo Inicial</a>
	<a  class="btn btn-sm btn-secondary mr-2" @click.prevent="modalTransacciones()">Agregar Ingreso / Egreso</a>
	{{-- <a  class="btn btn-sm btn-info mr-2" href="#" @click.prevent="modalEgreso()" data-toggle="modal" data-target="#egreso">EGRESO</a> --}}
	
</div>
</div>

</div>