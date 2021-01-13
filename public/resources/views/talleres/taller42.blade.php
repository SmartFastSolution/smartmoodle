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
						<div class="col-8 p-3" style="box-shadow: 5px 5px 15px 0px  #D72866;">
							<draggable class="row justify-content-around p-2" :list="ideas" group="people" >
							     <div
							       style="cursor: move;" 
							         class="card bg-primary text-white text-center p-3"
							         v-for="(element, index) in ideas"
							        :key="element.id">
								      <p class="m-2"> @{{ element.idea }}</p>
								  </div>
							</draggable>
						</div>
						<div class="col-4">
							<draggable class="list-group" :list="orden" group="people" >
								<h6 class="text-muted text-center" v-if="orden.length == 0">Arrastre aqui...</h6>
						        <div  style="box-shadow: 5px 5px 15px 0px  #087980;" v-else
						        	style="cursor: move;"
						          class="list-group-item list-group-item-info mb-2"
						          v-for="(element, index) in orden"
						          :key="element.name">
						          @{{ element.idea }}
						        </div>
						      </draggable>
						</div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
        		<input type="submit" value="Enviar Respuesta" @click.prevent="enviarTaller" class="btn p-2 mt-3 btn-danger">
    		</div>
		</div>

@endsection
@section('js')
<script type="text/javascript">
	let idea = @json($ideas);
	let taller_id = @json($d);

	let principal = @json($principal);
	// let filtro  = idea.filter(x => x.id == principal.id);
	// 	if (filtro.length == 1) {
 //           	idea.splice(0, 1);
 //           }
     let carro = idea.sort(() => Math.random() - 0.5)
	var taller42 = new Vue({
	  el: "#taller42",
	  data:{
	  	ideas: carro,
	  	principal: principal.id,
	  	orden:[]
	  },
	  mounted: function () {
	  },
	  	 methods:{
	  	enviarTaller: function() {
	  	let _this = this;
        let url = '/sistema/admin/taller42/'+taller_id;

        if (_this.ideas.length !== 0) {
        	toastr.error("No has ordenado todas las ideas", "Smarmoddle", {
                "timeOut": "3000"
              });
        } else {
        axios.post(url,{
              id: taller_id,
              respuesta: _this.orden
        }).then(response => {
        	// console.log(response.data)
        	window.location = "/sistema/homees";   
        }).catch(function(error){

        }); 
        }
     
	  	},

	  }
	})
     taller42.orden.push({id:principal.id, idea:principal.idea})
</script>

@endsection