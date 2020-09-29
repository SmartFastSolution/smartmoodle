@extends('layouts.nav')

@section('title', 'Taller 42')
@section('contenido')

<h1 class="text-center  mt-5 text-danger"> Taller #42</h1>
<h3 class="text-center mt-5 mb-3 text-info">RMA  UNA  PALABRA  DE  9  LETRAS  REFERENTE  A 
TRANSACCIÓN  COMERCIAL.  (Las  letras  deben  estar  unidas 
por  líneas)</h3>

<form action="">
	<div class="container">
		<div class="row justify-content-center ">
			<div class="col-9">
				<div class="row">
				<div class="col-8">
					<div class="row justify-content-around ">
						<div draggable="true"  ondragstart="event.dataTransfer.setData('text/plain', 'I'); this.classList.add('dragabling');  this.classList.remove('border');" class="col-1 drag align-items-center text-center P-2 border border-danger m-2"><h6>I</h6></div>
						<div draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'V'); this.classList.add('dragabling'); this.classList.remove('border');"  class="col-1 drag text-center P-2 border border-danger m-2"><h6>V</h6></div>
						<div draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'S'); this.classList.add('dragabling'); this.classList.remove('border');"  class="col-1 drag text-center P-2 border border-danger m-2"><h6>S</h6></div>
					</div>
					<div class="row justify-content-around">
						<div draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'C'); this.classList.add('dragabling'); this.classList.remove('border');"  class="col-1 drag text-center P-2 border border-danger m-2"><h6>C</h6></div>
						<div draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'R'); this.classList.add('dragabling'); this.classList.remove('border');"  class="col-1 drag text-center P-2 border border-danger m-2"><h6>R</h6></div>
						<div draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'E'); this.classList.add('dragabling'); this.classList.remove('border');"  class="col-1 drag text-center P-2 border border-danger m-2"><h6>E</h6></div>
					</div>
					<div class="row justify-content-around">
						<div draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'I'); this.classList.add('dragabling'); this.classList.remove('border');"  class="col-1 drag text-center P-2 border border-danger m-2"><h6>I</h6></div>
						<div draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'O'); this.classList.add('dragabling'); this.classList.remove('border');"  class="col-1 drag text-center P-2 border border-danger m-2"><h6>O</h6></div>
						<div draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'S'); this.classList.add('dragabling'); this.classList.remove('border');"  class="col-1 drag text-center P-2 border border-danger m-2"><h6>S</h6></div>
					</div>
				</div>
			<div class="col-4 align-self-center">
				<h2 class="text-center">La  palabra  es :</h2>
				<div class="row form-inline">
					<div class="col-1"><input type="text" class="p-1 m-1"  size="1"></div>
					<div class="col-1"><input type="text" class="p-1 m-1"  size="1"></div>
					<div class="col-1"><input type="text" class="p-1 m-1"  size="1"></div>
					<div class="col-1"><input type="text" class="p-1 m-1"  size="1"></div>
					<div class="col-1"><input type="text" class="p-1 m-1"  size="1"></div>
					<div class="col-1"><input type="text" class="p-1 m-1"  size="1"></div>
					<div class="col-1"><input type="text" class="p-1 m-1"  size="1"></div>
					<div class="col-1"><input type="text" class="p-1 m-1"  size="1"></div>
					<div class="col-1"><input type="text" class="p-1 m-1"  size="1"></div>
				
				</div>
			</div>
			</div>
			</div>
		</div>
	</div>
</form>
@endsection