@extends('layouts.nav')

@section('title', $datos->nombre)
@section('content')
{{-- ORDENE  LAS  IDEAS  Y  ANÓTALAS  ADECUADAMENTE. --}}
<h1 class="text-center  mt-5 text-danger"> {{ $datos->nombre }}</h1>
<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>
		<div class="container" id="taller42">
			<div class="row justify-content-center ">
				<div class="col-10">
					<div class="row">
						<div class="col-8 border border-danger p-3">
							<draggable class="row justify-content-around p-2" :list="ideas" group="people">
							     <div
							       style="cursor: move;" 
							         class="col-3 drag align-items-center text-center p-2 border border-danger m-2"
							         v-for="(element, index) in ideas"
							        :key="element.id">
							          <p class="m-2"> @{{ element.idea }}</p>
							        </div>
							      </draggable>
						</div>
						<div class="col-4">
							<draggable class="list-group" :list="orden" group="people" >
								<h6 class="text-muted text-center" v-if="orden.length == 0">Arrastre aqui...</h6>
						        <div v-else
						        	style="cursor: move;"
						          class="list-group-item list-group-item-info"
						          v-for="(element, index) in orden"
						          :key="element.name">
						          @{{ element.idea }}
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
	var idea = @json($ideas);
	var taller42 = new Vue({
	  el: "#taller42",
	  data:{
	  	ideas: idea,
	  	orden:[]
	  }
	})

</script>

@endsection