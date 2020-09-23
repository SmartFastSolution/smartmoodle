@extends('adminlte::page')

@section('title', 'Asignación')

@section('content_header')
<h1>Asignación de Materia/Curso</h1>
<br> <a class="btn btn-info float-right" href="{{route('distribucionmacus.create')}}"><i
        class="fas fa-plus"></i> Crear Asignación</a> <br>
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
                                    <th scope="col">Curso</th>
                                    <th scope="col">Materia(s)</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Estado</th>
                                    <th></th>
                                    <th scope="col">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($distribucionmacus as $distribucionmacu)
                                    <th scope="row">{{$distribucionmacu['id']}}</th>
                                    <td> </td>
                                    <td> </td>
                                    <td>{{ $distribucionmacus['descripcion']}}</td>
                                    <td>{{ $distribucionmacus['estado']}}</td>
                                 
                                    <td> </td>


                                    <td class="table-button ">
                                        <a class="btn btn-info " href="{{route('distribucionmacus.show',$distribucionmacus->id)}}"><i
                                                class="fas fa-eye"></i></a>

                                    </td>
                                    <td class="table-button ">
                                        <a class="btn btn-success btn"
                                            href="{{route('distribucionmacus.edit', $distribucionmacus->id)}}"><i
                                                class=" fas fa-pencil-alt"></i></a>
                                    </td>
                                    <td class="table-button ">
                                        <!--metodo delete funciona pero hay que almacenar la variable array en una variable temporal-->
                                        <form method="POST" action="{{route('distribucionmacus.destroy', $distribucionmacus->id)}}}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger "><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <!--Table body-->

                        </table>
                        {{$distribucionmacus->links()}}
                        <!--Table-->
                    </div>
                </div>
            </div>
        </div>
</section>





@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
console.log('Hi!');
</script>
@stop