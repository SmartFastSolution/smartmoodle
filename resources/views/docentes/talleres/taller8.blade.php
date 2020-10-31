@extends('layouts.nav')


@section('title', 'Taller 9')
@section('content')

<!--ESCRIBA  EN  LOS  CÍRCULOS  EJEMPLOS. -->

<h1 class="text-center  mt-5 text-danger">{{ $datos->taller->nombre }}</h1>
     <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="{{ route('taller1.docente', ['idtaller' => $d]) }}" method="POST">
    @csrf
    <div class="container">
        <h1 class="text-center text-danger mt-5 display-1">{{ $datos->taller->nombre }}</h1>
        <div class="card border border-danger mb-3" >
          <div class="card-header font-weight-bold" style="font-size: 25px;"> <h1 class="display-3">{{ $user->name }} Salazar</h1></div>
          <div class="card-body">
            <h2 class="font-weight-bold "><span class="badge badge-danger">#</span>{{ $datos->enunciado }}</h2>
        <div class="row justify-content-center">
            <div class="col-4 mt-5">
                @isset ($datos->respuesta1 )
                    <div class="alert alert-primary" role="alert">
                        {{ $datos->respuesta1 }}
                    </div>
                @endisset
                
            </div>
            <div class="col-4 mt-5">
                 @isset ($datos->respuesta2 )
                    <div class="alert alert-primary" role="alert">
                        {{ $datos->respuesta2 }}
                    </div>
                @endisset
            </div>
        </div>
        <div class="row row justify-content-md-center">
            <div class="col-4 mt-5">
                 @isset ($datos->respuesta3 )
                    <div class="alert alert-primary" role="alert">
                        {{ $datos->respuesta3 }}
                    </div>
                @endisset
            </div>
            <div class="col-3 text-center mt-3 mb-3 ">
                <img class="img-fluid" width="150" src="{{ asset($taller->img) }}" alt="">
            </div>
        <div class="col-4 mt-5">
                 @isset ($datos->respuesta4 )
                    <div class="alert alert-primary" role="alert">
                        {{ $datos->respuesta4 }}
                    </div>
                @endisset
        </div>
    </div>
    <div class="row justify-content-center">
            <div class="col-4 m-2">
                     @isset ($datos->respuesta5 )
                    <div class="alert alert-primary" role="alert">
                        {{ $datos->respuesta5 }}
                    </div>
                @endisset
            </div>
            <div class="col-4 m-2">
                 @isset ($datos->respuesta6 )
                    <div class="alert alert-primary" role="alert">
                        {{ $datos->respuesta6 }}
                    </div>
                @endisset
            </div>
    </div>

          </div>
      
        </div>
    </div>
</form>


@endsection