@extends('layouts.nav')

@section('title', 'Materias')

@section('content')
<section class="content">
    <div class="container">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="row justify-content-center">
            <!-- left column -->
            <div class="col-md-13">
                <a class="btn btn-info float-right" href="{{route('materias.create')}}"><i class="fas fa-plus"></i>
                    MATERIAS</a>
                <h1>Materia</h1>
                <div class="card card-secondary">
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
                                    <th scope="col">Unidad Educativa</th>
                                    <th scope="col">Materia</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Estado</th>
                                    <th></th>
                                    <th scope="col">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($materias as $materia)
                                    <th scope="row">{{ $materia['id']}}</th>
                                    <td>
                                    @if($materia->instituto != null)
                                     {{$materia->instituto->nombre}}
                                     @endif
                                    </td>
                                    <td>{{ $materia['nombre']}}</td>
                                    <td>{{ $materia['descripcion']}}</td>
                                    <td>{{ $materia['estado']}}</td>
                                    <td> </td>


                                    <td class="table-button ">
                                        <a class="btn btn-info " href="{{route('materias.show', $materia->id)}}"><i
                                                class="fas fa-eye"></i></a>

                                    </td>
                                    <td class="table-button ">
                                        <a class="btn btn-success btn"
                                            href="{{route('materias.edit', $materia->id)}}"><i
                                                class=" fas fa-pencil-alt"></i></a>
                                    </td>
                                    <td class="table-button ">
                                        <!--metodo delete funciona pero hay que almacenar la variable array en una variable temporal-->
                                        <form method="POST" action="{{route('materias.destroy', $materia->id)}}}">
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
                        {{$materias->links()}}
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
<script>
console.log('Hi!');
</script>
@stop