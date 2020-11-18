{{-- @extends('layouts.docapp') --}}

@extends('layouts.nav')
@section('title', 'Unidades | SmartMoodle')

@section('content')

<section class="content">
    <div class="container">
        <h1 class="font-weight-light" style="color:red;"> {{ auth()->user()->instituto->nombre}}</h1>
        <h1>Cursos</h1>






        <table id="myTable" class="table">

            <thead>
                <tr>
                    <th scope="col">Curso</th>
                    <th scope="col">Nombre/Apellido</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Ultimo Acceso</th>

                </tr>
            </thead>
            <tbody>
            @foreach($materia->assignments as $ass)

                <tr>
                 
                    <td> {{$ass->user->curso->nombre}}</td>
                    <td> {{$ass->user->name}} {{$ass->user->apellido}}</td>
                    <td>{{$ass->user->email}}</td>
                    <td> {{$ass->user->created_at->diffForHumans()}}</td>


                 

                </tr>


                @endforeach


            </tbody>
        </table>




</section>




@stop
@section('css')
@stop
@section('js')

<script>
$(function() {
    $(document).ready(function() {
        $('#myTable').DataTable({
                "info": true,
                "autoWidth": true,

                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            }

        );
    });

});
</script>

@stop