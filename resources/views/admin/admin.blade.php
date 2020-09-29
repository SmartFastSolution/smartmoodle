@extends('layouts.nav')

@section('titulo', 'Creador de plantillas')
@section('css')
<link rel="stylesheet" href="{{asset('css/bootstrap-tagsinput.css')}}">
@endsection
@section('content')

<a class="btn btn-info " href="{{route('materias.index')}}"> <i class="fas fa-eye"> Materias</i></a>
<h1 class="text-center  mt-5 text-danger">Administrador de Talleres</h1>

<div id="tallerlist">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card text-center">
                    <div class="card-header bg-primary">
                        <h1>Elija la plantilla a utilizar</h1>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Seleccione:</h5>
                        <select class="custom-select" v-model="numbreTaller" name="taller" id="">
                            <option disabled value="">SELECCIONE UN TALLER</option>
                            @foreach ($talleres = App\Plantilla::get() as $taller)
                            <option value="#taller{{ $taller->id }}">{{ $taller->nombre }}</option>
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

            <div class="col-6">
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
    </div>
</div>

<!-- <ul class="list-group m-3">
    @foreach ($sub = App\Taller::paginate(5) as $taller)
    <li class="list-group-item "><a class="nav-link"
            href="{{ route('taller', ['plant' => $taller->plantilla_id, 'id' => $taller->id]) }}">{{ $taller->nombre }}
            - {{ $taller->materia->nombre }} {{ $taller->enunciado }}</a></li>
    @endforeach

    <div class="row justify-content-center mt-3"> {{ $sub->links() }}</div>

</ul> -->
@include('layouts.modal')

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

<script type="text/javascript">
$(function() {
    var i = 1;

    var objetivo = document.getElementById('num');
    objetivo.innerHTML = 1;

    var objetivo1 = document.getElementById('num1');
    objetivo1.innerHTML = 1;

    $('.addRow').on('click', function(evt) {
        evt.preventDefault();
        addRow();
    });
    $('.addFac').on('click', function(evt) {
        evt.preventDefault();

        addFac();
    });
    $('.addNot').on('click', function(evt) {
        evt.preventDefault();

        addNot();
    });


    function addRow() {
        var prin = $('.prin tr').length;

        var tr = '<tr>' +
            '<td scope="row">' +
            '<div class="custom-file">' +
            '<input type="file" class="custom-file-input" name="col_a[]" lang="es">' +
            '<label class="custom-file-label" for="customFile">Seleciona un archivo</label>' +
            '</div>' +
            '</td>' +
            '<td scope="row">' +
            '<div class="custom-file">' +
            '<input type="file" class="custom-file-input" name="col_b[]" lang="es">' +
            '<label class="custom-file-label" for="customFile">Seleciona un archivo</label>' +
            '</div>' +
            '</td>' +
            '<td><a href="#" class="btn btn-danger remover"><span class="glyphicon glyphicon-remove">X</span></a></td>'
        '</tr>';
        $('.prin').append(tr);
        toastr.success("Columna agregada correctamente", "Smarmoddle", {
            "timeOut": "1000"
        });

    }
    $('.remover').live('click', function() {

        if ($('.prin tr').length == 1) {
            toastr.error("Esta columna no se puede eliminar", "Smarmoddle", {
                "timeOut": "1000"
            });
        } else {
            $(this).parent().parent().remove();

        }
    });

    function addFac() {

        var max = $('.fac tr').length;
        var tr = '<tr>' +
            '<th scope="row" id="num">' + (++i) + '</th>' +
            ' <td><input type="text" class="form-control" name="cod[]"></td>' +
            '<td><input type="text" class="form-control" name="cod_aux[]"></td>' +
            '<td><input type="text" class="form-control" name="cant[]"></td>' +
            '<td><input type="text" class="form-control" name="desc[]"></td>' +
            '<td><input type="text" class="form-control" name="precio[]"></td>' +
            '<td><a href="#" class="btn btn-danger remove"><span class="glyphicon glyphicon-remove">X</span></a></td>' +
            '</tr>';
        if (max == 10) {
            toastr.error("Limite de columnas creadas", "Smarmoddle", {
                "timeOut": "1000"
            });


        } else {
            $('.fac').append(tr);

            toastr.success("Columna agregada correctamente", "Smarmoddle", {
                "timeOut": "1000"
            });
            console.log(max)
        }
    }

    $('.remove').live('click', function() {
        var last = $('.fac tr').length;
        if (last == 1) {
            i = 1;
            toastr.error("Esta columna no se puede eliminar", "Smarmoddle", {
                "timeOut": "1000"
            });
        } else {
            $(this).parent().parent().remove();
            i = last;
        }
    });

    function addNot() {
        var nota_v = $('.nota_v tr').length;

        var tr = '<tr>' +
            '<th scope="row" id="num1">' + (++i) + '</th>' +
            '<td><input type="text" class="form-control" name="cant[]"></td>' +
            '<td><input type="text" class="form-control" name="desc[]"></td>' +
            '<td><input type="text" class="form-control" name="precio[]"></td>' +
            '<td><a href="#" class="btn btn-danger rem"><span class="glyphicon glyphicon-remove">X</span></a></td>'
        '</tr>';
        $('.nota_v').append(tr);
        toastr.success("Columna agregada correctamente", "Smarmoddle", {
            "timeOut": "1000"
        });

    }
    $('.rem').live('click', function() {
        var not = $('.nota_v tr').length;
        if (not == 1) {
            i = 1;
            toastr.error("Esta columna no se puede eliminar", "Smarmoddle", {
                "timeOut": "1000"
            });
        } else {
            $(this).parent().parent().remove();
            i = not;
        }
    });

});
</script>
<script src="{{asset('js/bootstrap-tagsinput.js')}}"></script>
@endsection

@endsection