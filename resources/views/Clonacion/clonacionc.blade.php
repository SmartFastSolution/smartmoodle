@extends('layouts.nav')
@section('title', 'Administracion - Inicio')


@section('content')


<section class="content">
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">Clonación de Unidad Educativa</h1>
                <div class="row">
                    <div class="col-md-10">

                        <form method="POST" action="{{route('users.store')}} ">
                            @csrf

                            <div class="form-group">
                                <label>Unidad Educativa a Clonar</label>
                                <select class="form-control select" name="instituto" style="width: 99%;">
                                    <option selected disabled>Elija una Unidad educativa...</option>
                                    @foreach($institutos as $instituto)
                                    <option value="{{$instituto->id}}">{{$instituto->nombre}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nueva Unidad Educativa </label>
                                <select class="form-control select" name="institutoclon" style="width: 99%;">
                                    <option selected disabled>Elija una Unidad educativa...</option>
                                    @foreach($institutos as $instituto)
                                    <option value="{{$instituto->id}}">{{$instituto->nombre}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" class="btn btn-dark " value="Clonar">
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

<script type="text/javascript">
$(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
})
</script>
@stop