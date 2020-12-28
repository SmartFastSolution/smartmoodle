<div id="kardex" class="border border-danger p-4">
	<div class=" row">
		<div class="col-3">
			<h6 class="font-weight-bold">Elegir Producto:</h6>
			<select v-model="producto_id" class="custom-select" name="" id="" @change="obtenerKardexFifo()">
			<option disabled selected value="">ELIGE UN PRODUCTO</option>
			<option v-for="(producto, index) in productos" :value="producto.id">@{{ producto.nombre }}</option>
		</select>
		</div>	
	</div><br><br>
	<h1 class="text-center font-weight-bold text-danger">KARDEX</h1>
	<h5 class="text-center font-weight-bold text-info">METODO FIFO</h5>
	<div class="row justify-content-center mb-2">
		<div class="col-5">
        <h2 class="text-center font-weight-bold display-4">@{{ nombre }}</h2>
        <h4 class="text-center font-weight-bold display-4">@{{ producto }}</h4>			
		</div>
	</div>
	<table class="table table-bordered table-responsive table-sm">
		<thead class="bg-warning"> 
		  <tr class="text-center">
		    <th style="vertical-align:middle" rowspan="2" width="200">FECHA</th>
		    <th width="300" style="vertical-align:middle" rowspan="2" >MOVIMIENTOS</th>
		    <th width="300" colspan="3">INGRESOS</th>
		    <th width="300" colspan="3">EGRESOS</th>
		    <th width="300" colspan="3">EXISTENCIA</th>

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
				<td  style="vertical-align:middle" >@{{ formatoFecha(exist.fecha) }}</td>
				<td style="vertical-align:middle" >@{{ exist.movimiento }}</td>
				<td style="vertical-align:middle" class="text-right">@{{ exist.ingreso_cantidad }}</td>
				<td style="vertical-align:middle" class="text-right">@{{ decimales(exist.ingreso_precio) }}</td>
				<td style="vertical-align:middle"  class="text-right">@{{ exist.ingreso_total }}</td>
				<td style="vertical-align:middle" class="text-right">@{{ exist.egreso_cantidad }}</td>
				<td style="vertical-align:middle" class="text-right">@{{ decimales(exist.egreso_precio) }}</td>
				<td style="vertical-align:middle"  class="text-right">@{{ exist.egreso_total }}</td>
				<td style="vertical-align:middle" class="text-right">@{{ exist.existencia_cantidad }}</td>
				<td style="vertical-align:middle" class="text-right">@{{ decimales(exist.existencia_precio) }}</td>
				<td style="vertical-align:middle"  class="text-right">@{{ exist.existencia_total }}</td>
			</tr>
		</tbody>
		<tbody>
		  <tr class="bg-secondary">
		    <td></td>
		    <td class="font-weight-bold text-danger">SUMAN</td>
		    <td class="text-right">@{{ suman.ingreso_cantidad }}</td>
		    <td></td>
		    <td class="text-right">@{{ suman.ingreso_total }}</td>
		    <td class="text-right">@{{ suman.egreso_cantidad }}</td>
		    <td></td>
		    <td class="text-right">@{{ suman.egreso_total }}</td>
		    <td></td>
		    <td></td>
		    <td></td>
		  </tr>
		</tbody>
</table>         
</div>