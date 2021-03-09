@extends('layouts.nav')
@section('title', 'Administracion - Clonacion')
@section('content')
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
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{Session::get('success')}}
                </div>
                @endif
                <h1 class="font-weight-bold text-center">Clonación de Unidad Educativa</h1>
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{route('clinstitutos.p_clonainstituto')}} " id="clonacion">
                            @csrf
                            <div class="form-group">
                                <label>Unidad Educativa a Clonar</label>
                                <select class="form-control select" name="p_source" style="width: 99%;">
                                    <option selected disabled>Elija una Unidad educativa...</option>
                                    @foreach($institutos as $instituto)
                                    <option value="{{$instituto->id}}">{{$instituto->nombre}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nueva Unidad Educativa </label>
                                <select class="form-control select" name="p_target" style="width: 99%;">
                                    <option selected disabled>Elija una Unidad educativa...</option>
                                    @foreach($institutos as $instituto)
                                    <option value="{{$instituto->id}}">{{$instituto->nombre}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="button" id="clonar" class="btn btn-dark " value="Clonar">
                            <button class="btn btn-info d-none" type="button" disabled id="rueda">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Clonando....
                            </button>
                         {{--    <div class="spinner-border text-primary d-none" role="status" >
                                <span class="sr-only">Loading...</span>
                            </div> --}}
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
    $( "#clonar" ).click(function( event ) {
    event.preventDefault();
    $("#rueda").removeClass("d-none");
    $("#clonar").addClass("d-none");
    setTimeout(() => {
    $("#clonacion").submit();
    }, 5000)
    });
    // $("#clonar").on("click", function(e) {
    //        $("#rueda").removeClass("d-none");
    //        $("#clonar").addClass("d-none");
    //    });
    //Initialize Select2 Elements
    $('.select2').select2()
    })
    </script>
    @stop