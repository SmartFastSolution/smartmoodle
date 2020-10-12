    	<div class="row p-3  mb-2 " id="diario">
      		<div class="col-12">
					<table class="table table-bordered table-sm">
					  <thead class="thead-dark">
					    <tr align="center">
					      <th scope="col">FECHA</th>
					      <th scope="col">NOMBRE DE CUENTAS</th>
					      <th scope="col">DEBE</th>
					      <th scope="col">HABER</th>
					    </tr>
					  </thead>
					  <tbody >
					  	<tr v-for="(diar, index) in balanceInicial.debe">
					  		<td align="center" width="50">12/03/2019</td>
					  		<td align="rigth">@{{ diar.nom_cuenta}}</td>
					  		<td align="center" width="125">@{{ diar.saldo }}</td>
					  		<td align="center" width="125"></td>
                      		{{-- <td align="center" width="50"><a @click="deleteDiario(index)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a></td> --}}
					  	</tr>
					  	<tr v-for="(diar, index) in balanceInicial.haber" align="end">
					  		<td align="center" width="50">12/03/2019</td>
					  		<td style="padding-left:50px">@{{ diar.nom_cuenta}}</td>
					  		<td align="center" width="125"></td>
					  		<td align="center" width="125">@{{ diar.saldo }}</td>
                      		{{-- <td align="center" width="50"><a @click="deleteDiario(index)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a></td> --}}
					  	</tr>
					  </tbody>
					  <tbody v-for="(registro, index) in registros">
					  	<tr v-for="(diar, index) in registro.debe">
					  		<td align="center" width="50">@{{ diar.fecha}}</td>
					  		<td align="rigth">@{{ diar.nom_cuenta}}</td>
					  		<td align="center" width="125">@{{ diar.saldo }}</td>
					  		<td align="center" width="125"></td>
                      		{{-- <td align="center" width="50"><a @click="deleteDiario(index)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a></td> --}}
					  	</tr>
					  	<tr v-for="(diar, index) in registro.haber" align="end">
					  		<td align="center" width="50"></td>
					  		<td style="padding-left:50px">@{{ diar.nom_cuenta}}</td>
					  		<td align="center" width="125"></td>
					  		<td align="center" width="125">@{{ diar.saldo }}</td>
                      		{{-- <td align="center" width="50"><a @click="deleteDiario(index)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a></td> --}}
					  	</tr>
					  </tbody>
					
			            
					  	
					  	</table>

					  	<table class="table table-bordered table-sm">
					  		    <tbody is="draggable" group="people" :list="diarios.debe" tag="tbody">
				            <tr v-for="(diar, index) in diarios.debe">
						  		<td align="center" width="50">@{{ diar.fecha}}</td>
						  		<td >@{{ diar.nom_cuenta}}</td>
						  		<td align="center" width="125">@{{ diar.saldo }}</td>
						  		<td align="center" width="125"></td>
	                      		<td align="center" width="50"><a @click="deleteDebe(index)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a></td>
						  	</tr>
			            </tbody>
					  		 <tbody is="draggable" group="people" :list="diarios.haber" tag="tbody">
				            <tr v-for="(diar, index) in diarios.haber">
						  		<td align="center" width="50"></td>
						  		<td style="padding-left:50px">@{{ diar.nom_cuenta}}</td>
						  		<td align="center" width="125"></td>
						  		<td align="center" width="125">@{{ diar.saldo }}</td>
	                      		<td align="center" width="50"><a @click="deleteHaber(index)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a></td>
						  	</tr>
			            </tbody>
					  		<tbody>
							  	<tr>
							  		<td align="center" colspan="2" valign="middle">PASAN</td>
							  		<td width="125"><input type="text" name="p_debe" class="form-control" v-model="pasan.debe" required></td>
							  		<td width="125"><input type="text" name="p_haber" class="form-control" v-model="pasan.haber" required></td>

							  		<td></td>
							  	</tr>
					  		</tbody>
					  	</table>
					<form action="">
					
						@csrf
						<div class="row justify-content-around mb-2">	
							<a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#debe">Agregar Debe</a> 
							<a href="#" class=" btn btn-outline-primary" data-toggle="modal" data-target="#haber" >Agregar Haber</a> 
							<a href="#" class="addDiario btn btn-outline-success" @click.prevent="guardarRegistro()">Agregar Registro</a>

	                    </div>
	                    <div class="row justify-content-center">	
							<a href="#" class="addDiario btn btn-danger" @click.prevent="guardarDiario()">Completar Diario General</a>
	                    </div>
                    </form>
                    <div class="row justify-content-center">
                    </div>

					</div>
@include ('contabilidad.modaldiariogeneral')

				</div>	