@extends('layouts.nav')


@section('title', 'Administracion - Docente')

@section('content')
<section class="content mt-5">
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

            <div class="row">
                @foreach(auth()->user()->distribuciondos as $dis1)


                @foreach($dis1->materias as $materia)
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
                @endforeach

                @endforeach


            </div>
        </div>




    </div>
</section>
{{-- <h1>Docente Perfil</h1>



<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Home</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
            aria-selected="false">Profile</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages"
            aria-selected="false">Messages</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings"
            aria-selected="false">Settings</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
    <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">...</div>
    <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">...</div>
</div>
 --}}



@stop




@section('css')

@stop

@section('js')



@stop