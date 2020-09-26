@extends('adminlte::page')

@section('title', 'Taller '.$d)
@section('contenido')
    @foreach ($datos as $dato)
<h1 class="text-center  mt-5"> {{ $dato->taller->nombre }}</h1>
     <h3 class="text-center mt-3">{{$dato->enunciado}}</h3>

<form action="" action="{{ route('taller1') }}" method="POST">
    @csrf
<div class="container">

        {{-- expr --}}

    <div class="row justify-content-center">
        <div class="col-4 mt-5 mb-3">
            <textarea class="form-control areadesign" name="resp1" id="" cols="40" rows="5"></textarea>
        </div>
    </div>
    <div class="row row justify-content-center">
        <div class="col-4 mt-5">
            <textarea class="form-control areadesign" name="resp2" id="" cols="40" rows="5"></textarea>
        </div>
            <div class="col-3 text-center ">
                <img class="img-fluid" src="{{ asset($dato->img) }}" alt="">
            </div>
        <div class="col-4 mt-5">
            <textarea class="form-control areadesign" name="resp3" id="" cols="40" rows="5"
            ></textarea>
        </div>

    </div>
    <div class="row justify-content-center">
        <div class="col-4 mt-3">
            <textarea class="form-control areadesign" name="resp4" id="" cols="40" rows="5"></textarea>
        </div>
    </div>
     <div class="row justify-content-center">
        <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
     </div>

</div>

</form>
    @endforeach
@endsection