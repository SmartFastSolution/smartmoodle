@extends('layouts.nav')


@section('title', 'Talleres de contabilidad')
@section('content')
	 <div class="container-fluid" id="contabilidad">
        
	 	<h1 class="text-center  mt-5">{{ $datos->taller->nombre }}</h1>
     <h3 class="text-center mt-3">{{ $datos->enunciado }}</h3>

     <div class="row justify-content-md-center">
      <div class="col-2">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-diario-list" data-toggle="list" href="#list-diario" role="tab" aria-controls="home">Diario Contable</a>
      <a class="list-group-item list-group-item-action" id="list-balance_comp-list" data-toggle="list" href="#list-balance_comp" role="tab" aria-controls="profile">Balance de Comprobacion</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
    </div>
  </div>
  <div class="col-10">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active border border-danger" id="list-diario" role="tabpanel" aria-labelledby="list-diario-list">
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
					<div class="row justify-content-around">	
						<a href="#" class="addDiario btn btn-outline-danger" @click="Agregar()">Agregar Registro</a> 
						<a href="#" class="addDiario btn btn-success" @click="Agregar()">Guardar Diario General</a>

                    </div>
                    <div class="row justify-content-center">
                    </div>

					</div>
				</div>	
      </div>
      <div class="tab-pane fade" id="list-balance_comp" role="tabpanel" aria-labelledby="list-balance_comp-list">
      	<table class="table table-bordered table-sm">
      		<thead>
			  <tr>
			    <th rowspan="2" align="center" class="text-center">Cuentas</th>
			    <th colspan="2" align="center" class="text-center">SUMAS</th>
			    <th colspan="2" align="center" class="text-center">SALDOS</th>
			    <th></th>
			  </tr>
			  <tr>
			    <td align="center">Debe</td>
			    <td align="center">Haber</td>
			    <td align="center">Debe</td>
			    <td align="center">Haber</td>    
			  </tr>
			 </thead>
			  <tbody >
			  	  	<tr v-for="(balan, index) in balances">
					  <td align="center">@{{ balan.cuenta}}</td>
					  <td align="center">@{{ balan.suma_debe}}</td>
					  <td align="center" width="125">@{{ balan.suma_haber }}</td>
					  <td align="center" width="125">@{{ balan.saldo_debe }}</td>
					  <td align="center" width="125">@{{ balan.saldo_haber }}</td>
                      <td align="center" width="50"><a @click="deleteBalance(index)" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
					</tr>
			  	<tr>
				<td>
				<select name="n_cuenta" id="" v-model="balance.cuenta" class="custom-select">
					<option value="" disabled>ELIGE UNA CUENTA</option>
					<option value="banco">BANCO</option>
					<option value="muebles">MUEBLES</option>
					<option value="caja">CAJA</option>
					<option value="vehiculo">VEHICULO</option>
				</select>
				</td>
				<td width="125"><input type="text" v-model="balance.suma_debe" name="debe" class="form-control" required></td>
				<td width="125"><input type="text" v-model="balance.suma_haber" name="haber" class="form-control" required></td>
				<td width="125"><input type="text" v-model="balance.saldo_debe" name="debe" class="form-control" required></td>
				<td width="125"><input type="text" v-model="balance.saldo_haber" name="debe" class="form-control" required></td>
				<td align="center" width="50"></td>
				</tr>
				<tr>
					<td align="center" valign="middle">SUMAN</td>
					<td><input type="text" name="p_debe" class="form-control" v-model="suman.sum_debe" required></td>
					<td><input type="text" name="p_haber" class="form-control" v-model="suman.sum_haber" required></td>
					<td><input type="text" name="p_haber" class="form-control" v-model="suman.sal_debe" required></td>
					<td><input type="text" name="p_haber" class="form-control" v-model="suman.sal_haber" required></td>
				</tr>
			</tbody>
		</table>
		<a href="#" class="addDiario btn btn-outline-danger" @click="agregarBalance()">Agregar Registro</a>

      </div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
      	<form>
      		<select name="" id=""></select>
      	</form>
      </div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
      	<form>
      		<input type="text">
      	</form>
      </div>
    </div>
  </div>

     </div>

     <div class="row justify-content-center">
        <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
     </div>
 </div>

@section('js')
<script type="text/javascript" src="{{ asset('js/tallercontabilidad.js') }}"></script>

@endsection
@endsection