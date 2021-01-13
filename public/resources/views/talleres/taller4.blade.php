@extends('layouts.nav')
<!--TALLER PARA ESCRIBIR DIFERENCIAS -->
@section('title', $datos->taller->nombre)
@section('content')
@section('css')
<style type="text/css">
	:focus{outline: none;}

/* necessary to give position: relative to parent. */
input[type="text"]{font: 15px/24px 'Muli', sans-serif; color: #333; width: 100%; box-sizing: border-box; letter-spacing: 1px;}

:focus{outline: none;}

.col-3{float: left; width: 27.33%; margin: 40px 3%; position: relative;} /* necessary to give position: relative to parent. */
input[type="text"]{font: 15px/24px "Lato", Arial, sans-serif; color: #333; width: 100%; box-sizing: border-box; letter-spacing: 1px; box-shadow: 5px 6px 5px #AAE1E9}
.effect-1, 
.effect-2, 
.effect-3{border: 0; padding: 7px 0; border-bottom: 1px solid #ccc;}

.effect-1 ~ .focus-border{position: absolute; bottom: 0; left: 0; width: 0; height: 2px; background-color: #4caf50; transition: 0.4s;}
.effect-1:focus ~ .focus-border{width: 100%; transition: 0.4s;}

</style>
@endsection

<h1 class="text-center  mt-5 text-danger font-weight-bold display-4">{{ $datos->taller->nombre }}</h1>
     <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>


<form action="{{ route('taller4',['idtaller' => $d]) }}" method="POST">
    @csrf
	<div class="container">
		<div class="row">
			<div class="col-6 border-right border-info ">
				<div class="row justify-content-center">
					<img class="mt-3 img-fluid" style="border: solid 4px #2182FB;" width="400" src="{{ asset($datos->img1) }}" alt="">
				</div>

				<div class="row">
					<div class="col-12 mt-4">
						 <input class="effect-1" type="text" name="diferencia_1a" autocomplete="ÑÖcompletes">
              			<span class="focus-border"></span>
					</div>
						<div class="col-12 mt-4">
						 <input class="effect-1" type="text" name="diferencia_2a" autocomplete="ÑÖcompletes">
              			<span class="focus-border"></span>
					</div>
						<div class="col-12 mt-4">
						 <input class="effect-1" type="text" name="diferencia_3a" autocomplete="ÑÖcompletes">
              			<span class="focus-border"></span>
					</div>
						{{-- <input required class="form-control mb-3 mt-3" name="diferencia_1a" type="text">
				       <input required class="form-control mb-3" name="diferencia_2a" type="text">
				      <input required class="form-control mb-3" name="diferencia_3a" type="text"> --}}

					
				</div>
			</div>
			<div class="col-6">
				<div class="row justify-content-center">
					<img class="mt-3 img-fluid" style="border: solid 4px #2182FB;" width="400" src="{{ asset($datos->img2) }}" alt="">
				</div>
				<div class="row">
								<div class="col-12 mt-4">
						 <input class="effect-1" type="text" name="diferencia_1b" autocomplete="ÑÖcompletes">
              			<span class="focus-border"></span>
					</div>
						<div class="col-12 mt-4">
						 <input class="effect-1" type="text" name="diferencia_2b" autocomplete="ÑÖcompletes">
              			<span class="focus-border"></span>
					</div>
						<div class="col-12 mt-4">
						 <input class="effect-1" type="text" name="diferencia_3b" autocomplete="ÑÖcompletes">
              			<span class="focus-border"></span>
					</div>
					{{-- <div class="col">
						<input required class="form-control mb-3 mt-3" name="diferencia_1b" type="text">
				       <input required class="form-control mb-3" name="diferencia_2b" type="text">
				      <input required class="form-control mb-3" name="diferencia_3b" type="text">

					</div> --}}
				</div>

			</div>
		</div>
		<div class="row justify-content-center mb-2">
        		<input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
    	</div>
	</div>

</form>
@endsection
