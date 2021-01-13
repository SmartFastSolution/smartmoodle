@extends('layouts.nav')

@section('title', 'Taller 48')
@section('content')

<h1 class="text-center  mt-5 text-danger font-weight-bold display-4"> {{ $datos->taller->nombre }}</h1>
<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->taller->enunciado }}</h3>
<form action="{{ route('taller47', ['idtaller' => $d]) }}" method="POST">
    @csrf
    <div class="container mb-3">
       <div class="row">
           <div class="col-4 align-self-center">
               <ul class="list-group list-group-flush ">
                @foreach ($datos->enunciados as $enunciado)
                 
                  <li style="font-size: 22px" class="list-group-item bg-transparent border-bottom-0"><span class="badge badge-danger">{{ ++$numero }}. </span>   {{ $enunciado->enunciado }}</li>
                    
                @endforeach
                </ul>
           </div>
           <div class="col-8" style="box-shadow: 5px 5px 15px 0px  #087980;>
               <ul class="list-group list-group-flush ">
                @foreach ($datos->definiciones as $definicion)
                  <li class="list-group-item bg-transparent border-bottom-0 text-justify"><span class="badge badge-info">{{ $letra++ }}. </span>  {{ $definicion->definicion }}</li>    
                @endforeach
                </ul>
           </div>
       </div>
       <div class="row justify-content-center mt-3">
           <div class="col-4 align-self-center">
            <h2 class="font-weight-bold display-4">Alternativas</h2>
            <table class="table table-striped">
              <tbody>
                 @foreach ($datos->alternativas as $alternativa)
                <tr>
                  <td> <p style="font-size: 22px"><span class="badge badge-danger">{{ ++$numer}}. </span> {{ $alternativa->alternativa }}</p></td>
                  <td><input type="radio" class="form-control" value="{{ $alternativa->alternativa }}" name="respuesta"></td>
                </tr>
                  @endforeach
              </tbody>
            </table>
              
               
                   
             
           </div>
       </div>


    <div class="row justify-content-center">
        <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
    </div>

    </div>
</form>

@endsection

