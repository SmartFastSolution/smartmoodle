@extends('layouts.nav')

@section('title', 'Taller 48')
@section('content')

<h1 class="text-center  mt-5 text-danger"> {{ $datos->taller->nombre }}</h1>
<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->taller->enunciado }}</h3>
<form action="{{ route('taller47', ['idtaller' => $d]) }}" method="POST">
    @csrf
    <div class="container mb-3">
       <div class="row">
           <div class="col-4 align-self-center">
               <ul class="list-group list-group-flush ">
                @foreach ($datos->enunciados as $enunciado)
                 
                  <li class="list-group-item bg-transparent border-bottom-0"><span class="badge badge-danger">{{ ++$numero }}. </span> {{ $enunciado->enunciado }}</li>
                    
                @endforeach
                </ul>
           </div>
           <div class="col-8">
               <ul class="list-group list-group-flush ">
                @foreach ($datos->definiciones as $definicion)
                 
                  <li class="list-group-item bg-transparent border-bottom-0 text-justify"><span class="badge badge-info">{{ $letra++ }}. </span> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
                    
                @endforeach
                </ul>
           </div>
       </div>
       <div class="row justify-content-center">
           <div class="col-4 align-self-center">
            <h2 class="font-weight-bold">Alternativas</h2>
               @foreach ($datos->alternativas as $alternativa)
                <p><span class="badge badge-danger">{{ ++$numer}}. </span> <input type="radio" value="{{ $alternativa->alternativa }}" name="respuesta"> {{ $alternativa->alternativa }}</p> 
                   
               @endforeach
           </div>
       </div>


    <div class="row justify-content-center">
        <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
    </div>

    </div>
</form>

@endsection

