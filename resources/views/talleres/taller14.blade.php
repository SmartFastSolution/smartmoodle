@extends('layouts.master')

@section('title', 'Taller 15')
@section('contenido')


<h1 class="text-center  mt-5 text-danger"> Taller #15</h1>
     <h3 class="text-center mt-5 mb-3 text-info">IDENTIFIQUE  LAS  PERSONAS  QUE  INTERVIENEN  EN  EL  CHEQUE,  CON 
CERTEZA</h3>
<form action="">
<div class="container">
	<div class="row justify-content-center">
		<div class="col-8">
			<p class="text-justify">Jorge  Almeida  posee  una  cuenta  corriente  en  el  Banco 
Bolivariano  y  firma  un  cheque  a  nombre  de  Pamela  Anderson 
por  $ 5.300</p>
		
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-5">
			<div class="row">
				<div class="col-2">
					<label class="mb-4 form-control-label" for="">Girador</label>
					<label class="mb-4 form-control-label" for="">Girado</label>
					<label class="mb-4 form-control-label" for="">Beneficiario</label>
				</div>
				<div class="col-10">
					<input type="text" class="form-control mb-2 border-left-0 border-right-0 border-top-0 border-bottom border-success">
					<input type="text" class="form-control mb-2 border-left-0 border-right-0 border-top-0 border-bottom border-success">
					<input type="text" class="form-control mb-2 border-left-0 border-right-0 border-top-0 border-bottom border-success">
				</div>
			</div>
		
		</div>
	</div>
</div>

</form>
@endsection