@extends('layouts.master')
@section('title')
@endsection
@section('contenido')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Vista de Roles</h1>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div>
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
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Informacion del Permiso</h3>
                    </div>
                    <form>
                        <div class=" card-body">
                            <div class="form-group">
                                <label for="namep">Menu Name</label>
                                <input type="text" class="form-control" name="namep" id="namep" placeholder="Menu "
                                    value="{{$permission->namep}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="slug">Descripción</label>
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="Detalle"
                                    value="{{$permission->descripcionp}}" readonly>
                            </div>



                            <div class="card-footer">
                                <a href="{{url()->previous()}}" class="btn btn-primary">Regesar</a>

                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
</section>




@endsection
@section('script')
@endsection