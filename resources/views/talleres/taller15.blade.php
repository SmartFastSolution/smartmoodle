@extends('layouts.nav')
@section('title', $datos->taller->nombre)
@section('content')
<!--CON LOS SIGUIENTES DATOS LLENE EL CHEQUE AL PORTADOR, CON CERTEZA. -->

<h1 class="text-center  mt-5 text-danger">{{ $datos->taller->nombre }}</h1>
     <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="{{ route('taller15', ['idtaller' => $d]) }}" method="POST">
	@csrf
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-2">
				<h2>Datos</h2>
				<label for="">Girador</label><br>
					<p style="cursor: move;" draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->girador }}')" ondragend="this.classList.add('text-muted');">{{ $datos->girador }}</p>
				<label for="">Girado</label><br>
					<p style="cursor: move;" draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->girado }}')" ondragend="this.classList.add('text-muted');">{{ $datos->girado }}</p>
				<label for="">Cantidad</label><br>
					<p style="cursor: move;" draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->cantidad }}')" ondragend="this.classList.add('text-muted');">{{ $datos->cantidad }}</p>
				<label for="">Lugar y Fecha</label>	<br>
				<p style="cursor: move;" draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->lugar }}')" ondragend="this.classList.add('text-muted');">{{ $datos->lugar }}</p>
				<p>{{ $datos->fecha }}</p>
			</div>
			<div class="col-9 border">
				<div class="row ">
					<div class="col-6">
						<input type="text" name="girador" class="form-control mt-2" required>
					</div>	
					<div class="col-2 align-self-center">
						<p>16457 <br>
							152
						</p>
					</div>	
				</div>
				<div class="row">
					<div class="col-2">
						<label class="text-capitalize"  for="">PAGUESE A LA ORDEN DE:</label>
						
					</div>
					<div class="col-8">
						<input type="text" name="girado" class="form-control" required>
					</div>
					<div class="col-2">
						<label for="">
							CHEQUE 0145
						</label><br>
						<div class="row">
							<div class="col-2"><label for="">
							US
						</label></div>
							<div class="col-8"><input type="numeric" name="cantidad" class="form-control" size="2" required></div>
						</div>
						
					</div>

				</div>
				<div class="row mb-2">
					<div class="col-2">
						<label for="">LA SUMA DE</label>
					</div>
					<div class="col-8">
						<input type="text" name="suma" class="form-control" required> 
					</div>
					<div class="col-2">
						DOLARES
					</div>
				</div>
				<div class="row">
					<div class="col-6 align-self-start pb-5">
						<div class="row">
							<div class="col-6"><input name="lugar" class="form-control" type="text" required></div>
							<div class="col-6"><input name="fecha" class="form-control" type="date" required></div>
						</div>
							<div class="row">
							<div class="col-6"> <label for="">CIUDAD</label> </div>
							<div class="col-6 text-center"> <label for="">FECHA</label> </div>
						</div>
					</div>
					<div class="col-6 col align-self-end text-center">
						<input disabled="" class="form-control" value="Sra. Dana Lopez" type="text" >
						<label class="" for="">FIRMA</label>
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