@extends('layouts.nav')

@section('title', 'Taller 45')
@section('contenido')

<h1 class="text-center  mt-5 text-danger"> Taller #45</h1>
<h3 class="text-center mt-5 mb-3 text-info">ORDENE  LAS  IDEAS  Y  ANÓTALAS  ADECUADAMENTE.</h3>
	<form action="">
		<div class="container">
			<div class="row justify-content-center ">
				<div class="col-10">
					<div class="row">
						<div class="col-8 border border-danger p-3">
							<div class="row justify-content-around p-2">
								<div draggable="true"  ondragstart="event.dataTransfer.setData('text/plain', 'SE LO OBTIENE'); this.classList.add('dragabling');  this.classList.remove('border');" class="col-3 align-self-center drag text-center border border-danger mt-2 ">
									<p class="m-2"> SE LO OBTIENE</p>
								</div>

								<div draggable="true"  ondragstart="event.dataTransfer.setData('text/plain', 'CORRESPONDE A LOS PROPIETARIOS'); this.classList.add('dragabling');  this.classList.remove('border');" class="col-3 align-self-center drag text-center border border-danger mt-2 ">
									<p class="m-2"> CORRESPONDE A LOS PROPIETARIOS</p>
								</div>

								<div draggable="true"  ondragstart="event.dataTransfer.setData('text/plain', 'MENOS PASIVO'); this.classList.add('dragabling');  this.classList.remove('border');" class="col-3 align-self-center drag text-center border border-danger mt-2 ">
									<p class="m-2"> MENOS PASIVO</p>
								</div>
							</div>

								<div class="row justify-content-around p-2">
								<div draggable="true"  ondragstart="event.dataTransfer.setData('text/plain', 'RESTANDO ACTIVO'); this.classList.add('dragabling');  this.classList.remove('border');" class="col-3 align-self-center drag text-center border border-danger mt-2 ">
									<p class="m-2"> RESTANDO ACTIVO</p>
								</div>

								

								<div draggable="true"  ondragstart="event.dataTransfer.setData('text/plain', 'DE LA EMPRESA'); this.classList.add('dragabling');  this.classList.remove('border');" class="col-3 align-self-center drag text-center border border-danger mt-2 ">
									<p class="m-2"> DE LA EMPRESA</p>
								</div>
							</div>
						</div>
						<div class="col-4">
							<input type="text" class="form-control mb-2">
							<input type="text" class="form-control mb-2">
							<input type="text" class="form-control mb-2">
							<input type="text" class="form-control mb-2">
							<input type="text" class="form-control mb-2">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

@endsection