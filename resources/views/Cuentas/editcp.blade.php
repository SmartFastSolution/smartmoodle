@extends('layouts.nav')

@section('title', 'Crear Plan de Cuenta')



@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Parece que hay porblemas  <br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<section class="content">
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">Editar Cuenta</h1>
                <div class="row">
                    <div class="col-md-8">

                        <form method="POST" action="{{route('pcuentas.update', $pcuentas->id)}} ">
                        @method('PUT')   
                        @csrf
                        
                            <div class=" card-body">
                                <div class="form-group">
                                    <label>Tip de Cuenta</label>
                                    <select class="form-control select" name="tpcuenta" style="width: 99%;">
                                        <option selected disabled value="{{$pcuentas->id}}">{{$pcuentas->tpcuenta}}</option>
                                        <option>Activo</option>
                                        <option>Activo Corriente</option>
                                        <option>Activo Diferido</option>
                                        <option>Activo Fijo</option>
                                        <option>Pasivo</option>
                                        <option>Pasivo Corriente</option>
                                        <option>Pasivo Fijo</option>
                                        <option>Pasivo Diferido</option>
                                        <option>Patrimonio</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="cuenta">Cuenta</label>
                                    <input type="text" class="form-control"  name="cuenta"
                                        id="cuenta" placeholder="Cuenta" value="{{$pcuentas->cuenta}}">
                                </div>

                                <div class="form-group">
                                <label for="nombre">Estado</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="estadoon" name="estado" class="custom-control-input"
                                        value="on" @if($pcuentas['estado']=="on" ) checked @elseif(old('estado')=="on" )
                                        checked @endif>
                                    <label class="custom-control-label" for="estadoon">Activo</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="estadooff" name="estado" class="custom-control-input"
                                        value="off" @if($pcuentas['estado']=="off" ) checked
                                        @elseif(old('estado')=="off" ) checked @endif>
                                    <label class="custom-control-label" for="estadooff">No Activo</label>
                                </div>
                                </div>
                                <a href="{{route('pcuentas.index')}}" class="btn btn-primary">Atras</a>
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