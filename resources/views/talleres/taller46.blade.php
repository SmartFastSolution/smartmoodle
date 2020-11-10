@extends('layouts.nav')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/mapa.css') }}">

@endsection
@section('titulo', $datos->nombre)
@section('content')
<h1 class="text-center  mt-5 text-danger"> {{ $datos->nombre }}</h1>
     <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="{{ route('taller46', ['idtaller' => $d]) }}" method="POST">
    @csrf
	 <div class="container mb-5">
        <div class="row  justify-content-center align-items-center mb-4">
            <div class="col-4 purple-border">
                <textarea placeholder="4. Personas Juridicas" name="persona_juridica"  class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="col-4 align-self-center text-center" >
                <div class="border border-success mapa" style="">
                        <p> Objeto</p>  
                </div>
              
            </div>
            <div class="col-4 green-border">
                <textarea  placeholder="1.Objetivo " name="objetivo" class="form-control"  id="" cols="30" rows="10"></textarea>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-4">
                <div class="headshot headshot-1">
                    <div class="border border-primary mapa" style="">
                        <p> PERSONAS 
                        JURIDICAS</p>  
                </div>
            </div>
            </div>
            <div class="col-4">
            <div id="foo">
            <p class="hola">RUC</p>
            </div>
            </div>
            <div class="col-4">
                <div class="border border-danger mapa" style="">
                        <p> IMPORTANCIA</p>  
                </div>
            </div>
        </div>
                <div class="row  justify-content-center align-items-center mb-4">
            <div class="col-4 purple-border">
                <textarea placeholder="3. Persona Natural" name="persona_natural"  class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="col-4 align-self-center text-center" >
                <div class="border border-success mapa" style="">
                        <p> PERSONAS NATURALES</p>  
                </div>
              
            </div>
            <div class="col-4 green-border">
                <textarea placeholder="2. Importancia" name="importancia" class="form-control"  id="" cols="30" rows="10"></textarea>
            </div>
        </div>
          <div class="row justify-content-center">
              <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
          </div>
    </div>
       
</form>
@endsection
