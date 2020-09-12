@extends('layouts.master')

@section('title', 'Taller 2')
@section('contenido')

<h1 class="text-center  mt-5"> Taller #2</h1>
     <h3 class="text-center mt-3">Clasifique el comercio con originalidad</h3>

<form action="" action="{{ route('taller1') }}" method="POST">
    @csrf
<div class="container">
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
                <img class="img-fluid" src="{{ asset('img/talleres/imagen-9.jpg') }}" alt="">
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
        <input type="submit" value="Enviar Respuestas" class="btn p-2 mt-3 btn-danger">
     </div>
</div>

</form>

@endsection