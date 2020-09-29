@extends('layouts.nav')

@section('css')
<link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">
@endsection
@section('title', $datos->taller->nombre)
@section('content')

<!-- LLENE  CON  LOS  SIGUIENTES  DATOS  LA  ORDEN  DE  PAGO CORRECTAMENTE-->
<h1 class="text-center  mt-5 text-danger"> {{ $datos->taller->nombre }}</h1>
  
<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="{{ route('taller26', ['idtaller' => $d]) }}" method="POST">
	@csrf
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-6">
						<h5 class="text-center">Datos</h5>
				<div class="row">
					<div class="col-6">
						<h6><strong>Cliente</strong> {{ $datos->nombre }}</h6>
						<h6><strong>RUC</strong> {{ $datos->ruc }}</h6>
						<h6><strong>Fecha de emision </strong> {{ $datos->fecha }}</h6>
					</div>
				</div>
				<table class="table table-borderless">
                  <thead>
                    <tr class="text-center">
                      <th scope="col">#</th>
                      <th scope="col">Cantidad</th>
                      <th scope="col">Descripcion</th>
                      <th scope="col">Precio Unitario</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach ($datos->notaventaDatos as $dato)
                    <tr class="text-center">
                      <th scope="row">{{ ++$i }}</th>
                      <td>{{ $dato->cantidad }}</td>
                      <td>{{ $dato->descripcion }}</td>
                      <td>{{ $dato->precio }}</td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
			</div>
			<div class="col-8 border border-danger p-5">
				<div class="row ">
					<div class="col-6 text-center">
						<h1>TECNOLOGY  S.A.</h1>
						<h6>Ing. Diego Arcos Quezada <br>
							Contribuyente Régimen Simplificado</h6>

						<input type="text" class="form-control">
						<h5>Dirección  Matriz :  Malecón y Olmedo</h5>
					</div>
					<div class="col-6">
						<table class="table table-bordered">
						  <tbody>
						 <tr>
						 	<td>R.U.C</td>
						 	<td>0938489125001</td>
						 </tr>
						 <tr>
						 	<td colspan="2" align="center">
						 		NOTA DE VENTA <br>
						 		<h6>No. 002-3470</h6>
						 	</td>					 	
						 </tr>
						 <tr>
						 	<td>AUT. SRI:</td>
						 	<td>241899176
						 	</td>
						 </tr>
						  </tbody>
						</table>
					</div>
				</div>
				<div class="row mb-2">
					<input type="text" class="form-control">
				</div>
				<div class="row">
					<div class="col-2 text-right"> <label>Sr (es):</label> </div>
					<div class="col-4"> <input type="text" class="form-control" name="nombre"></div>
					<div class="col-2 text-right"> <label>R.U.C/C.I. :</label> </div>
					<div class="col-4"> <input type="text" class="form-control" name="ruc"></div>
				</div>
				<div class="row justify-content-start mt-2">
					<div class="col-2 text-right">
						<label for="">FECHA :</label>
					</div>
					<div class="col-5">
						<input name="fecha" type="text" class="form-control">
					</div>
				</div>
				<div class="row mt-4">
					<table class="table table-bordered">
					  <thead>
					    <tr align="center">
					      <th scope="col">CANT.</th>
					      <th scope="col">DESCRIPCIÓN</th>
					      <th scope="col">P. UNITARIO </th>
					      <th scope="col">VALOR VENTA</th>

					    </tr>
					  </thead>
					  <tbody class="prin">
					    <tr>
					      <th><input type="text" class="form-control" name="cantidad[]"></th>
					      <td><input type="text" class="form-control" name="descripcion[]"></td>
					      <td><input type="text" class="form-control" name="precio[]"></td>
					      <td><input type="text" class="form-control" name="valor_venta[]"></td>
					    </tr>
					  </tbody>
					</table>
					<a href="#" class="addRow btn btn-outline-danger">Agregar Columna</a>
				</div>
				<div class="row justify-content-end mb-2">
					<div class="col-3 text-right"><label for="">VALOR TOTAL</label></div>
					<div class="col-3"><input type="text" name="total" class="form-control"> </div>
				</div>
				<div class="row mb-2 justify-content-end">
					<input type="text" name="valido" class="form-control">
					<label for="">VÁLIDO PARA SU EMISIÓN HASTA FEBRERO/2021</label>
				</div>
				<div class="row mb-2 justify-content-start">
					<div class="col-6 text-center">
						<h6>Imprenta  Falcao</h6>
						<h6>RUC:  0957742891001 No. Autorización 0518</h6>
					</div>

				</div>
			</div>
		</div>
		 <div class="row justify-content-center mb-5">
        <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
     </div>
	</div>	
</form>

@section('js')
<script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>
	<script type="text/javascript">
		$('.addRow').on('click', function(evt) {
			evt.preventDefault();
			addRow();
		});

		function addRow(){
			
			var tr='<tr>'+
					'<th><input type="text" class="form-control" name="cantidad[]"></th>'+
					'<td><input type="text" class="form-control" name="descripcion[]"></td>'+
					'<td><input type="text" class="form-control" name="precio[]"></td>'+
					'<td><input type="text" class="form-control" name="valor_venta[]"></td>'+
				'</tr>';
			$('.prin').append(tr);
		  toastr.success("Columna agregada correctamente", "Smarmoddle",{
		  	 "timeOut": "1000"
		  });
		}
	</script>
	@endsection
@endsection