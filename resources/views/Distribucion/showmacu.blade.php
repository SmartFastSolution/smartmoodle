@extends('layouts.nav')

@section('title', 'Editar')


@section('content')



<section class="content">
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">Show Asignación Materia/Paralelo</h1>
                <div class="row">
                    <div class="col-md-10">
                        <form method="POST" action="{{route('distribucionmacus.update', $distribucionmacu->id)}} ">
                            @method('PUT')
                            @csrf

                            <div class=" card-body">

                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" class="form-control" name="descripcion" id="descripcion"
                                        value="{{$distribucionmacu->descripcion}}" placeholder="Descripción" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Curso</label>
                                    <select class="form-control select" name="curso" style="width: 99%;" disabled>
                                        @foreach($distcursos as $distcurso)
                                        <option selected disabled value="{{ $distcurso->id }}">
                                            {{ $distcurso->nombre }}
                                            -
                                            {{$distcurso->paralelo}}
                                        </option>
                                        @endforeach
                                        @foreach($cursos as $curso)
                                        <option value="{{$curso->id}}">
                                            {{$curso->nombre}}
                                            -
                                            {{$curso->paralelo}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label> Materias Asignadas</label>
                                    <select class="select2" multiple="true" name="materia[]"
                                        data-placeholder="Select a State" style="width: 100%;" disabled>
                                        @if(! empty($materias))
                                        @foreach($materias as $materia)
                                        <option {{in_array($materia->id, $distribucionmacu_materia) ? 'selected':''}}>
                                            {{$materia->nombre}}
                                        </option>
                                        @endforeach
                                        @endif   
                                    </select>
                                </div>


                                <label for="nombre">Estado</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="estadoon" name="estado" class="custom-control-input"
                                        value="on" @if($distribucionmacu['estado']=="on" ) checked
                                        @elseif(old('estado')=="on" ) checked @endif disabled>
                                    <label class="custom-control-label" for="estadoon">Activo</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="estadooff" name="estado" class="custom-control-input"
                                        value="off" @if($distribucionmacu['estado']=="off" ) checked
                                        @elseif(old('estado')=="off" ) checked @endif disabled>
                                    <label class="custom-control-label" for="estadooff">No Activo</label>
                                </div>
                                <br><br><br>
                               
                                <a href="{{url()->previous()}}" class="btn btn-primary">Regesar</a>

                        </form>
                    </div>
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
    $(".select2").select2({

    });

})
</script>
@stop