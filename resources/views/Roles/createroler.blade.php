@extends('layouts.master')
@section('title')


@endsection
@section('contenido')



<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Crear Roles</h1>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Parece que hay porblemas o Malas decisiones <br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Formulario Roles</h3>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{route('roles.index')}} ">

                        @csrf

                        <div class=" card-body">
                            <div class="form-group">
                                <label for="name">Rol Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Rol Name"
                                    value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Rol Descripcion</label>
                                <input type="text" class="form-control" name="descripcion" tag="descripcion"
                                    id="descripcion" placeholder="Rol descripcion" value="{{old('descripcion')}}">
                            </div>
                            <div class="form-group">
                                <h3>Acceso Completo</h3>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="fullaccesyes" name="fullacces" class="custom-control-input"
                                        value="yes" @if(old('fullacces')=="yes" ) checked @endif>
                                    <label class="custom-control-label" for="fullaccesyes">SI</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="fullaccesno" name="fullacces" class="custom-control-input"
                                        value="no" @if(old('fullacces')=="no" ) checked @endif>
                                    <label class="custom-control-label" for="fullaccesno">No</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <h3>Estado del Rol</h3>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="estadoon" name="estado" class="custom-control-input"
                                        value="on" @if(old('estado')=="on" ) checked @endif>
                                    <label class="custom-control-label" for="estadoon">Activo</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="estadooff" name="estado" class="custom-control-input"
                                        value="off" @if(old('estado')=="off" ) checked @endif>
                                    <label class="custom-control-label" for="estadooff">No Activo</label>
                                </div>
                            </div>
                            <div class="card-body">

                                <h4>Lista de Menu</h4>

                                @foreach($permissions as $permission)

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                        id="permission_{{$permission->id}}" value="{{$permission->id}}"
                                        name="permission[]">
                                    <label class="custom-control-label" for="permission_{{$permission->id}}">

                                        {{$permission->id}}
                                        -
                                        {{$permission->namep}}
                                        <em>({{$permission->descripcionp}})</em>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <input type="submit" class="btn btn-dark " value="Guardar">



                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-6">

        </div>
    </div>
</section>





@endsection
@section('script')

<script>
$(document).ready(function() {

    $('#name').keyup(function(e) {
        var str = $('#name').val();
        str = str.replace(/\W+(?!$)/g, '-').toLowerCase(); // remplazamos el estdo de dashe
        $('#descripcion').val(str);
        $('descripcion').attr('placeholder', str);
    });

});
</script>



@endsection