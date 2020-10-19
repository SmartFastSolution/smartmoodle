@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

{{-- ARMA  UNA  PALABRA  DE  9  LETRAS  REFERENTE  A TRANSACCIÓN  COMERCIAL.  (Las  letras  deben  estar  unidas por  líneas) --}}
<h1 class="text-center  mt-5 text-danger"> {{ $datos->taller->nombre }}</h1>
<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

	<div class="container" id="taller39">
		<div class="row justify-content-center ">
			<div class="col-9">
				<div class="row justify-content-between">
				<div class="col-5">
					      <draggable class="row justify-content-around border border-success p-3" :list="letras" group="people">
					        <div
					        style="font-size: 20px; cursor: move;" 
					          class="col-3 drag align-items-center text-center p-2 border border-danger m-2"
					          v-for="(element, index) in letras"
					          :key="element.name">
					          @{{ element }}
					        </div>
					      </draggable>
					{{-- <div class="row justify-content-around ">
							@foreach ($datos as $element)
								<div  class="col-3 drag align-items-center text-center p-2 border border-danger m-2"><h6>{{ $element }}</h6></div>
							@endforeach
					</div> --}}
				</div>
				<div class="col-6 align-self-start ">
				<h2>La  palabra  es :</h2>
				<draggable class="row p-1 bg-light" :list="orden" group="people" >
					<h6 class="text-muted" v-if="orden.length == 0">Arrastre aqui...</h6>
			        <div v-else
			          v-for="(element, index) in orden"
			          :key="element.name">
			          <span
			          style="font-size: 20px; cursor: move;" 
			           class="badge badge-warning ml-1 p-1">@{{ element }}</span>
			        </div>
			      </draggable>
				</div>
			</div>
			</div>
		</div>
	</div>
@endsection
@section('js')
<script type="text/javascript">
	var palabra = @json($letra);
	var taller39 = new Vue({
	  el: "#taller39",
	  data:{
	  	letras: palabra,
	  	orden:[]
	  }
	})

</script>

@endsection