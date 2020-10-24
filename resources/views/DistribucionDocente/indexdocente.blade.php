@extends('layouts.nav')


@section('title', ' SmartMoodle')



@section('content')

<section class="content">
    <div class="container">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-13">
                <!-- <a class="btn btn-info float-right" href="{{route('distribuciondos.create')}}"><i
                        class="fas fa-plus"></i> CREAR ASIGNACION</a> -->
                <h1>Asignación de Materia/Docente</h1>
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
                                    <th scope="col">Docente</th>
                                    <th scope="col">Materia(s)</th>
                                    <th scope="col">Estado</th>
                                    <th></th>
                                    <th scope="col">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($distribucions as $dis)
                                    <th scope="row">{{$dis['id']}}</th>
                                    <td>{{$dis->instituto->nombre}} </td>

                                    <td>
                                      
                                        {{$dis->user->name}}
                                        {{$dis->user->apellido}}
                                   

                                    </td>
                                    <td>
                                        @if($dis->materias != null)
                                        @foreach($dis->materias as $dismacu)
                                        <span class="badge badge-success">
                                            {{$dismacu->nombre}}
                                        </span>

                                        @endforeach
                                        @endif
                                    </td>

                                    <td>{{ $dis['estado']}}</td>

                                    <td> </td>


                                    <td class="table-button ">
                                        <a class="btn btn-info " href="{{route('distribuciondos.show', $dis->id)}}"><i
                                                class="fas fa-eye"></i></a>

                                    </td>
                                    <td class="table-button ">
                                        <a class="btn btn-success btn"
                                            href="{{route('distribuciondos.edit',  $dis->id)}}"><i
                                                class=" fas fa-pencil-alt"></i></a>
                                    </td>
                                    <td class="table-button ">
                                        <!--metodo delete funciona pero hay que almacenar la variable array en una variable temporal-->
                                        <form method="POST" action="{{route('distribuciondos.destroy', $dis->id)}}}">
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
                        {{$distribucions->links()}}
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