@extends('layouts.nav')

@section('title', $datos->taller->nombre )
@section('content')

<!-- LENE  CON  LOS  SIGUIENTES  DATOS  LA  NOTA  DE  PEDIDO, 
ADECUADAMENTE. -->
	<h1 class="text-center  mt-5 text-danger">{{  $datos->taller->nombre }} </h1>
    <h3 class="text-center mt-5 mb-3 text-info"> {{ $datos->enunciado }}</h3>

<form action="{{ route('taller22', ['idtaller' => $d]) }}" method="POST">
          @csrf
	<div class="container">
			<h1 class="text-center text-danger mt-5 display-1">{{ $datos->taller->nombre }}</h1>
        <div class="card border border-danger mb-3" >
          <div class="card-header font-weight-bold" style="font-size: 25px;"> <h1 class="display-3">{{ $user->name }} Salazar</h1></div>
          <div class="card-body">
            <h2 class="font-weight-bold "><span class="badge badge-danger">#</span>{{ $datos->enunciado }}</h2>
            <div class="jumbotron jumbotron-fluid">
              <div class="container">
                <h1 class="display-4">Respuesta</h1>
                <p class="lead">{{ $datos->respuesta }}</p>
              </div>
            </div>
          </div>
            <div class="row justify-content-center">
            <div class="col-5">
              <div class="form-group">
                <label for="exampleFormControlInput1">Calificacion</label>
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="text" class="form-control" name="calificacion" placeholder="Añada una nota al estudiante">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Retroalimentacion</label>
                <textarea class="form-control" name="retroalimentacion" rows="3" placeholder="Agregue una retroalimentacion"></textarea>
              </div>   
               <div class="row justify-content-center mb-5">
                <input type="submit" value="Calificar" class="btn p-2 mt-3 btn-danger">
             </div>
            </div>
        </div>
        </div>
        
		<div class="row justify-content-center">
			<div class="col-8">
						<h3 class="text-center">Datos</h3>
							<div class="row">				
								<div class="col-6">
									<label>Pedido :</label> <span draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->pedido  }}')" ondragend="this.classList.add('text-muted');">{{ $datos->pedido  }}</span> <br>
									<label>Lugar y fecha :</label> <span draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->lugar  }}')" ondragend="this.classList.add('text-muted');">{{ $datos->lugar }}</span> , <span draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->fecha }}')" ondragend="this.classList.add('text-muted');">{{ $datos->fecha }}</span> <br>

									<label>Firma de Bodeguero :</label> <span draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->firma  }}')" ondragend="this.classList.add('text-muted');">{{ $datos->firma }}</span> <br>
									<label>Plazo de entrega :</label> <span draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->plazo_entrega }}')" ondragend="this.classList.add('text-muted');">{{ $datos->plazo_entrega  }}</span><br>
								</div>
							</div>
							<table class="table table-borderless">
			                  <thead>
			                    <tr class="text-center">
			                      <th scope="col">#</th>
			                      <th scope="col">Codigo</th>
			                      <th scope="col">Cantidad</th>
			                      <th scope="col">Descripcion</th>
			                      <th scope="col">Precio Unitario</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	@foreach ($datos->pedidoDatos as $dato)
			                    <tr class="text-center">
			                      <th scope="row"></th>
			                      <td>{{ $dato->codigo }}</td>
			                      <td>{{ $dato->cantidad }}</td>
			                      <td>{{ $dato->descripcion }}</td>
			                      <td>{{ $dato->precio_unit }}</td>
			                    </tr>
			                    @endforeach

			                  </tbody>
			                </table>
			</div>

			<div class="col-9 border border-warning">
				<div class="row">
					<div class="col-6 text-center p-3">
						<h1>COMERCIAL "PLAZA"</h1>
						<img class="img-fluid" src="{{ asset('img/talleres/imagen-22.jpg') }}" alt="">
						<h5 class="text-left">RUC. 0923568947001</h5><h5 class="text-left">Av. Quito y letamendi</h5>
						<h5 class="text-left">Tlfs: 2580465 - 2413864</h5>
					</div>
					<div class="col-6 text-center p-3">
						<h1>NOTA DE PEDIDA</h1>
						<h4>No. <input type="text" name="pedido" class="" size="5"></h4>
						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">Fecha:</label>
							</div>
							<div class="col-8">
								<input type="text" name="fecha" class="form-control">
							</div>
						</div>
						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">Dependencia</label>
							</div>
							<div class="col-8">
								<input type="text" name="dependencia" class="form-control">
							</div>
						</div>
						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">Destino</label>
							</div>
							<div class="col-8">
								<input type="text" name="destino" class="form-control">
							</div>
						</div>
						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">Plazo de entrega</label>
							</div>
							<div class="col-8">
								<input type="text" name="plazo_entrega" class="form-control">
							</div>
						</div>
					</div>
				</div>

				<div class="row p-3">
					<table class="table table-bordered">
					  <thead>
					    <tr class="text-center">
					      <th scope="col">CANTIDAD</th>
					      <th scope="col">CODIGO</th>
					      <th scope="col">DESCRIPCION</th>
					      <th scope="col">PRECIO UNIT.</th>
					      <th scope="col">TOTAL</th>
					      <th scope="col">ACCION</th>
					    </tr>
					  </thead>
					  <tbody class="prin">
					    <tr>
					      <td><input name="cantidad[]" type="text" class="form-control" ></td>
					      <td><input name="codigo[]" type="text" class="form-control" ></td>
					      <td><input type="text" name="descripcion[]" class="form-control" ></td>
					      <td><input type="text" name="precio_unit[]" class="form-control" ></td>
					      <td><input name="total[]" type="text" class="form-control" ></td>
					      <td><a href="#" class="btn btn-danger remove"><span class="glyphicon glyphicon-remove">X</span></a></td>
					    </tr>
					  </tbody>
					</table>
				<a href="#" class="addRow btn btn-outline-danger">Agregar Columna</a>
				</div>
				<div class="row mb-3">
					<div class="col-4 align-self-center">
						<h4 class="">OBSERVACIONES</h4>
					</div>
					<div class="col-8">
						<input name="observaciones" type="text" class="form-control">
					</div>
				</div>
				<div class="row justify-content-around">
					<div class="col-4 text-center">
						<input name="fabrica" type="text" name="" class="form-control">
						<label >Ing. Fabrica</label>
					</div>
					<div class="col-4 text-center">
						<input name="recibido" type="text" name="" class="form-control">
						<label >Recibido</label>
					</div>
				</div>
			</div>
		</div>
			<div class="row justify-content-center">
        	<input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
    	</div>
	</div>
</form>
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>
	<script type="text/javascript">
		$('.addRow').on('click', function(evt) {
			evt.preventDefault();
			addRow();
		});
		function addRow(){	
		var tr='<tr>'+
			'<td><input name="cantidad[]" type="text" class="form-control" ></td>'+
			'<td><input name="codigo[]" type="text" class="form-control" ></td>'+
			'<td><input type="text" name="descripcion[]" class="form-control" ></td>'+
			'<td><input type="text" name="precio_unit[]" class="form-control" ></td>'+
			'<td><input name="total[]" type="text" class="form-control" ></td>'+
			'<td><a href="#" class="btn btn-danger remove"><span class="glyphicon glyphicon-remove">X</span></a></td>'+
			'</tr>';
			$('.prin').append(tr);
		  toastr.success("Columna agregada correctamente", "Smarmoddle",{
		  	 "timeOut": "1000"
		  });

		}
		$('.remove').live('click', function(evt){
	evt.preventDefault();
      var last=$('.prin tr').length;
      if (last == 1) {
        toastr.error("Esta columna no se puede eliminar", "Smarmoddle",{
         "timeOut": "1000"
      });
      }else{
      $(this).parent().parent().remove();
       i = last;
}
    });

	</script>
	@endsection