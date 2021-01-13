@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<!-- LLENE  CON  LOS  SIGUIENTES  DATOS  LOS  RECIBOS  CORRECTAMENTE. -->
	<h1 class="text-center  mt-5 text-danger font-weight-bold display-4"> {{ $datos->taller->nombre }}</h1>
    <h3 class="text-center mt-5 mb-3 text-info">{{  $datos->enunciado }}  </h3>
<form action="{{ route('taller23', ['idtaller' => $d]) }}" method="POST">
 @csrf
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-3" style="box-shadow: -5px 5px 15px 0px  #3527F4">
				<h3 class="text-center">Datos</h3>
							<div class="row">				
								<div class="col-6">
								<label>Valor :</label> <span draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->valor  }}')" ondragend="this.classList.add('text-muted');">${{ $datos->valor  }}</span>  <br>
								<label>Acreedor :</label> <br> <span draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->acreedor  }}')" ondragend="this.classList.add('text-muted');">{{ $datos->acreedor  }}</span><br>
								<label>Deudor :</label> <span draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->deudor  }}')" ondragend="this.classList.add('text-muted');">${{ $datos->deudor  }}</span><br>
								<label>Descripcion :</label> <span draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->descripcion  }}')" ondragend="this.classList.add('text-muted');">{{ $datos->descripcion  }}</span><br>
								<label>Direccion :</label> <br> <span draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->direccion  }}')" ondragend="this.classList.add('text-muted');">{{ $datos->direccion  }}</span><br>
								<label>Lugar y fecha :</label> <br> <span draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->lugar }}')" ondragend="this.classList.add('text-muted');">{{ $datos->lugar }}</span> , <span draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->fecha }}')" ondragend="this.classList.add('text-muted');">{{ $datos->fecha }}</span> <br>
								</div>
							</div>

			</div>
			<div class="col-8 border" style="box-shadow: 5px 5px 15px 0px  #27F4AE">
				<h1 class="text-center">RECIBO</h1>
				<div class="row justify-content-between">
					<div class="col-4  form-inline">
						No. <input required type="text" name="no" size="5" class="form-control" name="">
					</div>
					<div class="col-4 form-inline mb-2">
						Por $  <input required type="text" size="5" class="form-control" name="por">
					</div>
				</div>
				<div class="row mb-2">			
					<div class="col-4 text-left">
						<label class="col-form-label" for="">Recibi de:</label>
					</div>
					<div class="col-8">
						<input required type="text" name="recibi" class="form-control">
					</div>
				</div>

				<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">La suma de:</label>
							</div>
							<div class="col-8">
								<input required type="text" name="cantidad" class="form-control">
							</div>
						</div>

						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">Por arriendo de</label>
							</div>
							<div class="col-8 form-inline">
							<p><input required type="text" name="arriendo" class="form-control"> que ocupa <input type="text" name="ocupa" class="form-control"></p>
								
							</div>
						</div>

						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">En la casa de propiedad</label>
							</div>
							<div class="col-8">
								<input required type="text" name="propiedad" class="form-control">
							</div>
						</div>

						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">situado en</label>
							</div>
							<div class="col-8 form-inline">
								<p><input required type="text" class="form-control" name="situado" size="40">  canon cubierto del</p>
							</div>
						</div>
						<div class="row mb-2">			
							
							<div class="col-12 form-inline">
						<p><input required type="text" name="cubierto" class="form-control"  size="30"> Hasta el <input required type="text" name="hasta" class="form-control" size="50"></p>
								
							</div>
						</div>

						<div class="row mb-2 justify-content-center">			
							<div class="col-6 text-center">
								<p><input required type="text" name="firma" class="form-control" size="40">  FIRMA</p>
							</div>
						</div>
			</div>
		</div>
		<div class="row justify-content-center mb-3">
        	<input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
    	</div>
	</div>
</form>

@endsection