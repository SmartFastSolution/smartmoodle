@extends('layouts.nav')

@section('title', 'Unidad Educativa')

@section('encabezado')
<h1>Unidad Educativa</h1>
<br>
<a class="btn btn-info float-right " href="{{route('institutos.create')}}"><i class="fas fa-plus"></i></i> Instituto</a>
<br>
<br>
@stop

@section('content')


<!-- Content Header (Page header) -->


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
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Informacion Unidad Educativa</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <!--Table-->
                    <div class="card-body">
                        <table class="table table-hover">

                            <!--Table head-->
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Provincia</th>
                                    <th scope="col">Canton</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Correo </th>
                                    <th scope="col">Estado</th>
                                    <th></th>
                                    <th></th>
                                    <td> </td>
                                    <th scope="col" coldspan="3">Tools</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <!--Table head-->

                            <!--Table body-->
                            <tbody>
                                <tr>
                                    @foreach ($institutos as $instituto)
                                    <th scope="row">{{$instituto->id}}</th>
                                    <td>{{$instituto->nombre}}</td>
                                    <td>{{$instituto->descripcion}}</td>
                                    <td>{{$instituto->provincia}}</td>
                                    <td>{{$instituto->canton}}</td>
                                    <td>{{$instituto->direccion}}</td>
                                    <td>{{$instituto->telefono}}</td>
                                    <td>{{$instituto->email}}</td>
                                    <td>{{$instituto->estado}}</td>
                                    <td> </td>
                                    <td> </td>


                                    <td class="table-button ">
                                        <a class="btn btn-info " href="institutos/{{ $instituto['id']}}"><i
                                                class="fas fa-eye"></i></a>

                                    </td>
                                    <td class="table-button ">
                                        <a class="btn btn-success" href="institutos/{{ $instituto['id']}}/edit"><i
                                                class=" fas fa-pencil-alt"></i></a>
                                    </td>
                                    <td class="table-button ">
                                        <!--metodo delete funciona pero hay que almacenar la variable array en una variable temporal-->
                                        <form method="POST" action="{{route('institutos.destroy', $instituto->id)}}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger "><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <!--Table body-->
                            {{$institutos->links()}}
                        </table>
                        <!--Table-->
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
    
@stop