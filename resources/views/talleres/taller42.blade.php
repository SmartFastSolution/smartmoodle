@extends('layouts.nav')

@section('title', 'Taller 43')
@section('contenido')

<h1 class="text-center  mt-5 text-danger"> Taller #43</h1>
<h3 class="text-center mt-5 mb-3 text-info">IDENTIFIQUE  LA  TRANSACCIÓN  QUE  DEBE  SER  REGISTRADA EN  LOS  LIBROS  DE  CONTABILIDAD,  CON  CERTEZA.</h3>

<form action="">
	<div class="container">
		<div class="row justify-content-center ">
			<div class="col-8">
				<div class="row mb-2">
					<div class="col-10">
						<p><span class="badge badge-danger p-1" >1.</span > El  empresario  compra   juguetes   para   la   venta  en   $ 4.670</p>
					</div>
					<div class="col-2">
						<input type="text" class="form-control">
					</div>
				</div>

				<div class="row mb-2">
					<div class="col-10">
						<p><span class="badge badge-danger p-1" >2.</span > El  empresario  hace  un  préstamo  al  Bco. del Pacífico  para  cubrir  deuda  de  la  empresa.</p>
					</div>
					<div class="col-2">
						<input type="text" class="form-control">
					</div>
				</div>

				<div class="row mb-2">
					<div class="col-10">
						<p><span class="badge badge-danger p-1" >3.</span > El  empresario  compra  un   automóvil  a  su  hijo  en $ 29.800 </p>
					</div>
					<div class="col-2">
						<input type="text" class="form-control">
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-10">
						<p><span class="badge badge-danger p-1" >4.</span > l  empresario  compra  cuatro  computadoras  para 
la  empresa  en  $ 740 c/u.</p>
					</div>
					<div class="col-2">
						<input type="text" class="form-control">
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection