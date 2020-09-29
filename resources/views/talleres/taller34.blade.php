@extends('layouts.nav')

 @section('css')
 <link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">
 @endsection
@section('title', $datos->taller->nombre)
@section('content')

<h1 class="text-center  mt-5 text-danger">{{$datos->taller->nombre }} </h1>
<h3 class="text-center mt-5 mb-3 text-info">EN  EL  S IGUIENTE  COLLAGE  APLIQUE  FIGURAS  QUE  SE  RELACIONEN  CON CONTABILIDAD  HOTELERA,  CON  EFICACIA</h3>
	<div class="container">
	<form action="{{ route('taller_34', ['idtaller' => $d]) }}"
      class="dropzone"
      id="my-awesome-dropzone"
     enctype="multipart/form-data">
     @csrf
     

		{{--<div class="row justify-content-center">
							<div class="col-7 border border danger bg-light p-3">
								<textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
							</div>
						</div>--}}
		</form>
		<div class="row justify-content-center">
     <button class="btn btn-outline-danger mt-5 text-center" id="sendAll">Enviar Imagenes</button>
		</div>

	</div>

 @endsection
 @section('js')
<script type="text/javascript" src="{{ asset('js/dropzone.min.js') }}"></script>
<script type="text/javascript">
	Dropzone.options.myAwesomeDropzone = {
		autoProcessQueue: false,
		dictDefaultMessage: "Agregue las imagenes en el recuadro",
  		maxFilesize: 2, // MB
  		acceptedFiles: "image/*",
  		maxFiles: 4,
  		init:function () {
  			var submitButon = document.querySelector("#sendAll");
  		myDropzone = this;
  		submitButon.addEventListener('click', function(){
			myDropzone.processQueue();
  				});
  		this.on("complete", function(){
  			if (this.getQueuedFiles().length == 0 && this. getUploadingFiles().length == 0) {
  				var _this = this;
  				_this.removeAllFiles();
          Swal.fire({
            title: 'Smarmoddle',
            text: 'Datos enviados correctamente',
          }).then(function() {
                window.location = "/sistema";
            });
  			}
  		});
  			}
  		};
</script>
 @endsection