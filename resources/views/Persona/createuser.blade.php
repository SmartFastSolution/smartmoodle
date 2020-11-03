@extends('layouts.nav')

@section('title', 'Crear Usuario')


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
                <div class="btn-group float-right" role="group" aria-label="Basic example">

                    <a class="btn btn-primary float-right" href="{{route('distribuciondos.create')}}"><i
                            class="fas fa-plus"></i> Asignar Docente</a>
                    <a class="btn btn-success float-right" href="{{route('distrimas.create')}}"><i
                            class="fas fa-plus"></i>
                        Asignar Estudiante</a>
                </div>
                <h1 class="font-weight-light">Añadir Usuarios</h1>

                <div class="row">
                    <div class="col-md-10">

                        <form method="POST" action="{{route('users.store')}} ">
                            @csrf
                            <div class=" card-body">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="cedula">Cédula</label>
                                        <input type="text" class="form-control" value="{{ old('cedula') }}"
                                            name="cedula" id="cedula" placeholder="Cédula">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="name"> Nombres</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name') }}" placeholder="Nombres">
                                    </div>

                                    <div class="col">
                                        <label for="apellido">Apellidos</label>
                                        <input type="text" class="form-control" name="apellido" id="apellido"
                                            value="{{ old('apellido') }}" placeholder=" Apellidos">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="domicilio">Domicilio</label>
                                    <input type="text" class="form-control" name="domicilio" id="domicilio"
                                        value="{{ old('domicilio') }}" placeholder="Domicilio">
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="telefono">Teléfono Fijo</label>
                                        <input type="text" class="form-control" name="telefono" id="telefono"
                                            value="{{ old('telefono') }}" placeholder="Télefono">
                                    </div>
                                    <div class="col">
                                        <label for="celular">Teléfono</label>
                                        <input type="text" class="form-control" name="celular" id="celular"
                                            value="{{ old('celular') }}" placeholder="Teléfono">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Instituto</label>
                                    <select class="form-control select" name="instituto" style="width: 99%;">
                                        <option selected disabled>Elija una Unidad educativa...</option>
                                        @foreach($institutos as $instituto)
                                        <option value="{{$instituto->id}}">{{$instituto->nombre}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Rol</label>
                                    <select class="form-control select" name="role" style="width: 99%;">
                                        <option selected disabled>Elija un rol para el Usuario...
                                        </option>
                                        @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="email">Correo Electrónico</label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            value="{{ old('email') }}" placeholder="Email">
                                    </div>

                                    <div class="col" id="random">
                                        <!-- <a id="pass" class="btn btn-success ">Generar
                                            Passoword</a> -->
                                        <label for="password">Contraseña</label>
                                        <input type="password" v-model="password" id="result" class="form-control" name="password"
                                            id="password" value="{{ old('password') }}" placeholder="Password"
                                            minlength="8"> 
                                            <a href="" class="btn btn-sm btn-primary mt-2" @click.prevent="generarPass">Generar Aleatoria</a>
                                    </div>
                                   
                                    <div class="cold">
                                        <br>
                                    </div>
                                </div>
                                <br><br>
                                <input type="submit" class="btn btn-dark " value="Guardar">
                                <a href="{{url()->previous()}}" class="btn btn-primary">Regesar</a>

                            </div>
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
<!-- <script>
document.querySelector("#pass").addEventListener("click", function() {

    $longitud = 16; //numeros de caracter para password

    $clave = generarClave($longitud);
    document.querySelector("#result").innerHTML = $clave;
});

function generarClave(long) {

    /* Caracteres Permitidos */
    let caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',
        clave = '',
        numero;

    /* creacion de clave */
    for (let i = 0; i < long; i++) {
        numero = getNumero(0, caracteres.length);
        clave += caracteres.substring(numero, numero + 1);
    }
    return clave;
}

/* Generar Numeros Aleatorios*/
function getNumero(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;

}
</script> -->

<script type="text/javascript">
    var random = new Vue({
        el: "#random",
        data:{
            password:''
        },

        methods:{
            generarPass: function() {
                var _this = this;
                var url = '/sistema/admin/ramdom';
                    axios.post(url,{
                        
                }).then(response => {
                     toastr.success("Clave Generada Satisfactoriamente", "Smarmoddle", {
                "timeOut": "3000"
                });
                     _this.password = response.data;
                }).catch(function(error){

                });

            }

        }
    
        
    })
</script>


<script>


</script>

@stop