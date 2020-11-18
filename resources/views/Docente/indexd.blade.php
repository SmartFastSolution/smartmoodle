
@extends('layouts.nav')

@section('title', 'Perfil | SmartMoodle')




@section('title', 'Administracion - Docente')

@section('content')

<section class="content">
    <div class="container">


        <h1 class="font-weight-light" style="color:red;"> {{ auth()->user()->instituto->nombre}}</h1>
        <h2 class="font-weight-light" style="color:blue;"> {{ auth()->user()->name, }} {{ auth()->user()->apellido, }}
        </h2>
        <h2 class="font-weight-light">
            @foreach(auth()->user()->roles as $role)
            {{$role->name}}
            @endforeach</h2>


        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="font-weight-light"> <strong> Materias</strong></h3>
            </div>

                @isset ($au->materias)
            <div class="row">
             

                    @forelse($au->materias as $materia)
                <!-- ./col -->
                <div class="col-lg-3 col-5">
                    <!-- small box -->
                    <div class="small-box bg-gradient-info">
                        <div class="inner">
                            <h3> <i class="far fa-bookmark"></i></h3>
                            <p> {{$materia->nombre}}</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-bookmark"></i>
                        </div>
                        <a href="{{route('Contenidos', $materia->id)}}" class="small-box-footer">
                            Acceder <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                @empty 
                    <h1>No tienes cursos asignados</h1>
                
                @endforelse
             
            </div>
              @endisset
              @empty($au->materias)
               <h1>No tienes cursos Asignados</h1> 
            @endempty
        </div>

@isset ($au->materias)
         <h2>Talleres Por Calificar</h2>
                  <div class="card-body">
                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    <th scope="col">Materia</th>
                                    <th scope="col"> Taller </th>
                                    <th scope="col">Alumno </th>
                                    <th scope="col">Enunciado </th>
                                    <th scope="col">Vista Taller</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                @forelse($users as $taller)
                                    <td>{{$taller->mate_nombre}}</td>
                                    <td>{{$taller->nombre}}</td>
                                    <td>{{$taller->alumno}}</td>
                                    <td>{{$taller->enunciado}}</td>
                                    <td class="table-button ">
                                        <a class="btn btn-info"
                                            href="{{route('taller.docente',['plant'=>$taller->plantilla_id,'id'=>$taller->taller_id, 'user'=>$taller->user_id])}}"><i
                                                class="fas fa-eye"></i></a>

                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="5">No hay talleres disponibles</td>
                                    </tr>
                                
                                @endforelse
                            </tbody>
                        </table>
                        @if ($users->count() >= 1)
                              <div class="row justify-content-center">
                        {{ $users->links() }}
                            
                        </div>
                        @endif
                        


                    </div>

                        <h2>Talleres Calificados</h2>
                     <div class="card-body mb-5">
                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    <th scope="col">Materia</th>
                                    <th scope="col"> Taller </th>
                                    <th scope="col">Alumno </th>
                                    <th scope="col">Enunciado </th>
                                    <th scope="col">Vista Taller</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($calificado as $taller)
                                    <td>{{$taller->mate_nombre}}</td>
                                    <td>{{$taller->nombre}}</td>
                                    <td>{{$taller->alumno}}</td>
                                    <td>{{$taller->enunciado}}</td>
                                    <td class="table-button ">
                                        <a class="btn btn-info"
                                            href="{{route('taller.docente',['plant'=>$taller->plantilla_id,'id'=>$taller->taller_id, 'user'=>$taller->user_id])}}"><i
                                                class="fas fa-eye"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row justify-content-center">
                        {{ $calificado->links() }}
                            
                        </div>
                    </div>


 @endisset

    </div>
</section>

@stop
@section('css')
@stop
@section('js')

@stop