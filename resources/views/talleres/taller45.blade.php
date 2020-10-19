@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

@section('css')
<link rel="stylesheet" href="{{ asset('css/letras.css') }}">
@endsection
{{-- ENCUENTRE  EN  LA  SOPA  DE  LETRAS  LAS  PALABRAS  RELACIONADAS  AL COMERCIO Y  ENCIÉRRELAS  EN  UN  CÍRCULO,  CON  EFICACIA. --}}
<h1 class="text-center  mt-5 text-danger">{{ $datos->taller->nombre }}</h1>
<h3 class="text-center mt-5 mb-3 text-info"> {{ $datos->enunciado }}</h3>
		<div class="container" id="letra">
			<div class="row justify-content-center">
				<div class="col-12">
					<div class="row" >
						<div class="col-7">
							<div id='puzzle'></div>
						</div>
						<div class="col-5">
							<h4 class="text-info text-center">Palabras relacionadas al comercio </h4>
							<div id='words'></div>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row justify-content-center">
				<form action="">
					<input type="submit" id="activar" disabled="" value="Enviar Respuestas" class=" btn p-2 mt-3 btn-danger ">
				</form>
        	
    	</div>	
		</div>
{{-- @include ('layouts.footer') --}}
@section('js')
    <script src="{{ asset('js/wordfind.js') }}"></script>
    <script src="{{ asset('js/wordfindgame.js') }}"></script>
<script>
	var palabras = @json($palabras);
	 const letra = new Vue({
    		el: '#letra',
    		data:{
    			words: palabras,
    		},
    		mounted() {
  			var gamePuzzle = wordfindgame.create(this.words, '#puzzle', '#words');
  			var puzzle = wordfind.newPuzzle(
    			this.words, 
    		{height: 40, width:40, fillBlanks: false}
  				);
  				wordfind.print(puzzle);    
  		}        
		});

  // create just a puzzle, without filling in the blanks and print to console
 

</script>
@endsection
@endsection