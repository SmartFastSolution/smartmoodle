@extends('layouts.nav')

@section('title', 'Niveles')


@section('encabezado')
    <h1>Niveles</h1>
    <br>
    <a class="btn btn-info float-right " href="{{route('nivels.create')}}"><i
                        class="fas fa-user-plus"></i>Niveles</a>
           
                        <br>
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
                        <h3 class="card-title">Información de Niveles </h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Estado</th>
                                    <th></th>
                                    <th scope="col">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($nivels as $nivel)
                                    <th scope="row">{{ $nivel['id']}}</th>
                                    <td>{{ $nivel['nombre']}}</td>
                                    <td>{{ $nivel['estado']}}</td>

                                    <td> </td>


                                    <td class="table-button ">
                                        <a class="btn btn-info "
                                            href="{{route('nivels.show', $nivel->id)}}"><i
                                                class="fas fa-eye"></i></a>

                                    </td>
                                    <td class="table-button ">
                                        <a class="btn btn-success"
                                        href="{{route('nivels.edit', $nivel->id)}}"><i
                                                class=" fas fa-pencil-alt"></i></a>
                                    </td>
                                    <td class="table-button ">
                                        <!--metodo delete funciona pero hay que almacenar la variable array en una variable temporal-->
                                        <form method="POST" action="{{route('nivels.destroy', $nivel->id)}}}">
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
                        {{$nivels->links()}}
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
    <script> console.log('Hi!'); </script>
@stop