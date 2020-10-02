@extends('layouts.nav')


@section('title', 'Asignación')

@section('encabezado')
<h1>Asignación de Materia/Curso</h1>
<br> <a class="btn btn-info float-right" href="{{route('distribucionmacus.create')}}"><i class="fas fa-plus"></i> Crear
    Asignación</a> <br>
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
                                    <th scope="col">Nivel</th>
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
                                    <td>{{$distribucionmacu->curso->nombre}}
                                        -
                                        {{$distribucionmacu->curso->paralelo}}
                                    </td>
                                    <td>{{$distribucionmacu->curso->nivel->nombre}}  </td>
                                    <td>
                                        @if($distribucionmacu->materias != null)
                                        @foreach($distribucionmacu->materias as $dismacu)
                                        <span class="badge badge-success">
                                            {{$dismacu->nombre}}
                                        </span>
                                        @endforeach
                                        @endif
                                    </td>
                                    <td>{{ $distribucionmacu['descripcion']}}</td>
                                    <td>{{ $distribucionmacu['estado']}}</td>

                                    <td> </td>


                                    <td class="table-button ">
                                        <a class="btn btn-info "
                                            href="{{route('distribucionmacus.show',$distribucionmacu->id)}}"><i
                                                class="fas fa-eye"></i></a>

                                    </td>
                                    <td class="table-button ">
                                        <a class="btn btn-success btn"
                                            href="{{route('distribucionmacus.edit', $distribucionmacu->id)}}"><i
                                                class=" fas fa-pencil-alt"></i></a>
                                    </td>
                                    <td class="table-button ">
                                        <!--metodo delete funciona pero hay que almacenar la variable array en una variable temporal-->
                                        <form method="POST"
                                            action="{{route('distribucionmacus.destroy', $distribucionmacu->id)}}}">
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
    
@stop

@section('js')
    
@stop