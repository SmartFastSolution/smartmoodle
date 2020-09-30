@extends('layouts.nav')

@section('title', 'Plan de Cuenta')


@section('encabezado')
<h1>Plan de Cuentas</h1>
<br>
<!-- <a class="btn btn-info float-right " ><i class="fas fa-file-invoice"></i>  Añadir
    Cuenta</a> -->
<button type="button" class="btn btn-info float-right " data-toggle="modal" href="{{route('pcuentas.create')}}"
    data-target="#modalCR"> Añadir Cuenta</button>
<br>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="row">
            <!-- left column -->
            <div class="col-md-13">
                <!-- general form elements -->
                <div class="card card-dark">
                    <div class="card-header">

                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tipo de Cuenta</th>
                                    <th scope="col">Cuenta</th>
                                    <th scope="col">Estado</th>
                                    <th></th>
                                    <th scope="col">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($cuentas as $cuenta)
                                    <th scope="row">{{ $cuenta['id']}}</th>
                                    <td>{{ $cuenta['Tpcuenta']}}</td>
                                    <td>{{ $cuenta['cuenta']}}</td>
                                    <td>{{ $cuenta['estado']}}</td>
                                    <td> </td>
                                    <td class="table-button ">
                                        <a class="btn btn-info " href="{{route('pcuentas.show', $cuenta->id)}}"><i
                                                class="fas fa-eye"></i></a>
                                    </td>
                                    <td class="table-button ">
                                        <a class="btn btn-success" href="{{route('pcuentas.edit', $cuenta->id)}}"><i
                                                class=" fas fa-pencil-alt"></i></a>
                                    </td>
                                    <td class="table-button ">
                                        <!--metodo delete funciona pero hay que almacenar la variable array en una variable temporal-->
                                        <form method="POST" action="{{route('pcuentas.destroy', $cuenta->id)}}}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" onclick="return confirm('¿Desea Borrar?');"
                                                class="btn btn-danger "><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <!--Table body-->

                        </table>
                        {{$cuentas->links()}}
                        <!--Table-->
                    </div>
                </div>
            </div>
        </div>
</section>
<section>
    <!-- Modal Crear Cuenta  -->
    <div class="modal fade" id="modalCR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Añadir Cuenta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!--action="{{route('pcuentas.store')}}"-->
                <div class="modal-body">
                    <form method="POST" action="{{action('PcuentaController@store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="tpcuenta">Seleccione el Tipo de Cuenta</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">Activo</option>
                                <option>Activo Corriente</option>
                                <option>Activo Fijo</option>
                                <option>Pasivo</option>
                                <option>Pasivo Corriente</option>
                                <option>Pasivo Fijo</option>
                                <option>Patrimonio</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cuenta">Cuenta</label>
                            <input type="text" class="form-control" name="cuenta" id="cuenta"
                                value="{{ old('cuenta') }}" placeholder="Cuenta">
                        </div>

                        <div class="form-group">
                            <label for="nombre">Estado </label>
                            <br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="estadoon" name="estado" class="custom-control-input" value="on"
                                    @if(old('estado')=="on" ) checked @endif @if (old('estado')===null) checked @endif>
                                <label class="custom-control-label" for="estadoon">Activo</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="estadooff" name="estado" class="custom-control-input"
                                    value="off" @if(old('estado')=="off" ) checked @endif>
                                <label class="custom-control-label" for="estadooff">No Activo</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                            <input type="submit" class="btn btn-dark " value="Guardar">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

@stop

@section('css')

@stop

@section('js')
<script>
$(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
});
</script>


@stop