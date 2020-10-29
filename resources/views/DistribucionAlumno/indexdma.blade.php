@extends('layouts.nav')


@section('title', 'Asignación')



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
                
                <a class="btn btn-info float-right" href="{{route('distrimas.create')}}"><i class="fas fa-plus"></i>
                    CREAR ASIGNACION</a>
                <h1>Asignación de Alumno/Curso</h1>
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
                                    <th scope="col">Curso</th>
                                    <th scope="col">Paralelo</th>
                                    <th scope="col">Materias</th>
                                    <th scope="col">Alumno</th>
                                    <th scope="col">Estado</th>
                                    <th></th>
                                    <th scope="col">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($distrimas as $distrima)
                                    <th scope="row">{{$distrima['id']}}</th>
                                    <td>{{$distrima->instituto->nombre}} </td>

                                    @foreach($distrima->distribumacus as $dis)
                                    <td>
                                        <span class="badge badge-success">
                                            {{$dis->curso->nombre}}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">
                                            {{$dis->nivel->nombre}}
                                        </span>
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
                                    @endforeach

                                    <td>
                                        @if($distrima->user != null)

                                        {{$distrima->user->name}}  
                                     
                                        @endif
                                    </td>
 
                                     
                                    <td>{{ $distrima['estado']}}</td>

                                    <td> </td>


                                    <td class="table-button ">
                                        <a class="btn btn-info " href="{{route('distrimas.show',$distrima->id)}}"><i
                                                class="fas fa-eye"></i></a>

                                    </td>
                                    <td class="table-button ">
                                        <a class="btn btn-success btn"
                                            href="{{route('distrimas.edit', $distrima->id)}}"><i
                                                class=" fas fa-pencil-alt"></i></a>
                                    </td>
                                    <td class="table-button ">
                                        <!--metodo delete funciona pero hay que almacenar la variable array en una variable temporal-->
                                        <form method="POST" action="{{route('distrimas.destroy', $distrima->id)}}}">
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
                        {{$distrimas->links()}}
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