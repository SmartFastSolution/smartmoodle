@extends('layouts.nav')
@section('class', 'no-js')
@section('titulo', 'Creador de plantillas')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/customfileinputs/css/component.css') }}">
<link rel="stylesheet" href="{{asset('css/bootstrap-tagsinput.css')}}">
<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
@endsection
@section('content')

<a class="btn btn-info " href="{{route('materias.index')}}"> <i class="fas fa-eye"> Materias</i></a>
<h1 class="text-center  mt-5 text-danger">Administrador de Talleres</h1>

<div id="tallerlist">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header bg-primary">
                        <h1>Elija la plantilla a utilizar</h1>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Seleccione:</h5>
                        <select class="custom-select" v-model="numbreTaller" name="taller" id="">
                            <option disabled value="">SELECCIONE UN TALLER</option>
                            @foreach ($plantillas = App\Plantilla::get() as $plantilla)
                            <option class="text-uppercase" value="#taller{{ $plantilla->id }}">{{ $plantilla->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                            :data-target="numbreTaller">
                            Cargar Plantilla
                        </button>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <form action="{{ route('admin.plantilla') }}" method="POST">
                    @csrf
                    <div class="card text-center">
                        <div class="card-header bg-danger">
                            <h1>Crear plantilla</h1>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Completa el formulario para registrar una nueva plantilla</h3>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Nombre del taller</label>
                                <input class="form-control" name="nombre"></input>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Descripcion</label>

                                <textarea class="form-control" name="descripcion" required=""></textarea>

                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <input type="submit" value="Crear Plantilla" class="btn btn-outline-danger">
                        </div>
                    </div>
                </form>
            </div>
     		</div>
         <div class="row justify-content-start">
        <div class="col-3">
            <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-outline-danger">Atras</a>
        </div>
      </div>
</div> 
</div>

 <ul class="list-group m-3">
    @foreach ($sub = App\Taller::paginate(10) as $taller)
    <li class="list-group-item "><a class="nav-link"
            href="{{ route('taller', ['plant' => $taller->plantilla_id, 'id' => $taller->id]) }}">{{ $taller->nombre }}
            - {{ $taller->materia->nombre }} {{ $taller->enunciado }}</a></li>
    @endforeach

    <div class="row justify-content-center mt-3"> {{ $sub->links() }}</div>

</ul> 

@include('layouts.modal')

@section('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

<script type="text/javascript" src="{{ asset('js/admintalleres.js') }}"></script>
<script type="text/javascript" src="{{asset('plugins/customfileinputs/js/custom-file-input.js')}}"></script>
<div id="js">
<script async = true src="{{asset('js/bootstrap-tagsinput.js')}}"></script>
</div>
@endsection

@endsection