    	<div class="row p-3  mb-2 ">
      		<div class="col-12">
					<table class="table table-bordered table-sm">
					  <thead class="thead-dark">
					    <tr align="center">
					      <th scope="col">FECHA</th>
					      <th scope="col">NOMBRE DE CUENTAS</th>
					      <th scope="col">GLOZA</th>
					      <th scope="col">DEBE</th>
					      <th scope="col">HABER</th>
					      <th width="50">ACCION</th>
					    </tr>
					  </thead>
					  <tbody >
					  	<tr v-for="(diar, index) in diarios">
					  		<td align="center" width="50">@{{ diar.fecha}}</td>
					  		<td align="center">@{{ diar.nom_cuenta}}</td>
					  		<td align="center">@{{ diar.gloza}}</td>
					  		<td align="center" width="125">@{{ diar.debe }}</td>
					  		<td align="center" width="125">@{{ diar.haber }}</td>
                      		<td align="center" width="50"><a @click="deleteDiario(index)" class="btn btn-danger re_diario"><i class="fas fa-trash-alt"></i></a></td>
					  	</tr>

					  	<tr>
					  		<td width="50" > <input type="date" name="fecha" v-model="diario.fecha" class="form-control" required></td>
					  		<td >
					  			<select name="n_cuenta" id="" v-model="diario.nom_cuenta" class="custom-select">
					  				<option value="" disabled>ELIGE UNA CUENTA</option>
					  				<option value="banco">BANCO</option>
					  				<option value="muebles">MUEBLES</option>
					  				<option value="caja">CAJA</option>
					  				<option value="vehiculo">VEHICULO</option>
					  			</select>
					  		</td>
					  		<td ><input type="text" v-model="diario.gloza" name="gloza" class="form-control" required></td>
					  		<td width="125"><input type="text" v-model="diario.debe" name="debe" class="form-control" required></td>
					  		<td width="125"><input type="text" v-model="diario.haber" name="haber" class="form-control" required></td>
                      		
					  	</tr>
					  	<tr>
					  		<td></td>
					  		<td align="center" colspan="2" valign="middle">PASAN</td>
					  		<td><input type="text" name="p_debe" class="form-control" v-model="pasan.debe" required></td>
					  		<td><input type="text" name="p_haber" class="form-control" v-model="pasan.haber" required></td>
					  	</tr>
					  </tbody>
					</table>
					<form action="">
						@csrf
					<div class="row justify-content-around">	
						<a href="#" class="addDiario btn btn-outline-danger" @click="Agregar()">Agregar Registro</a> 
						<a href="#" class="addDiario btn btn-success" @click.prevent="guardarDiario()">Guardar Diario General</a>

                    </div>
                    </form>
                    <div class="row justify-content-center">
                    </div>

					</div>
				</div>	