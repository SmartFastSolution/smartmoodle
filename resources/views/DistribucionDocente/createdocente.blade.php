@extends('layouts.nav')


@section('title', 'Dashboard | SmartMoodle')



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
<section class="content" id="materias">
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">Añadir Asignación Docente/Materia</h1>
                <div class="row">
                    <div class="col-md-10">

                        <form method="POST" action="{{route('distribuciondos.index')}} ">
                            @csrf
                            <div class=" card-body">



                                <div class="form-group">
                                    <label>Unidad Educativa</label>
                                    <select class="form-control select" v-model="instituto" @change="onMateria()"
                                        name="instituto" required style="width: 99%;">
                                        <option selected disabled>Elija una Unidad educativa...</option>
                                        @foreach($institutos as $instituto)
                                        <option value="{{$instituto->id}}">{{$instituto->nombre}}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Docente</label>
                                    <select class="form-control select2" name="docente" style="width: 99%;">
                                        <option selected disabled>Elija al Docente...</option>
                                        <option v-for="doce in users" :value="doce.id">@{{doce.name}} @{{doce.apellido}}
                                        </option>


                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Materias</label>
                                    <select class="select2" multiple="multiple" name="materia[]"
                                        data-placeholder="Select a State" style="width: 100%;">
                                        <optgroup v-for="(curso, index) in materias" :label="curso.nombre">
                                            <option v-for="mater in materias[index].materias" :value="mater.id">@{{ mater.nombre}}</option>
                                        </optgroup>
                                    </select>
                                </div>
                               
                             
                                <div class="form-group">
                                    <label for="nombre">Estado</label>
                                    <br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="estadoon" name="estado" class="custom-control-input"
                                            value="on" @if(old('estado')=="on" ) checked @endif
                                            @if(old('estado')===null) checked @endif>
                                        <label class="custom-control-label" for="estadoon">Activo</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="estadooff" name="estado" class="custom-control-input"
                                            value="off" @if(old('estado')=="off" ) checked @endif>
                                        <label class="custom-control-label" for="estadooff">No Activo</label>
                                    </div>
                                </div>
                                <br>
                              <a href="{{route('distribuciondos.index')}}" class="btn btn-primary">Regesar</a>
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
    $(".select2").select2({

    });

})
</script>


</script>
<!-- script para select dinamico prueba 2  -->

<script>
const inst = new Vue({
    el: '#materias',
    data: {
        instituto: '',
        materias: [],
        users:[]
    },
    methods: {
        onMateria() {

            var set = this;

            set.users = [];
            axios.post('/sistema/docinst', {
                id: set.instituto
            }).then(response => {
                set.users = response.data;
                console.log(set.users); //no es necesario
            }).catch(e => {
                console.log(e);
            });

            set.materias = [];
            axios.post('/sistema/materiainst', {
                id: set.instituto
            }).then(response => {
                set.materias = response.data;
                console.log(set.materias);
            }).catch(e => {
                console.log(e);
            });

        }
    }
});
</script>

@stop