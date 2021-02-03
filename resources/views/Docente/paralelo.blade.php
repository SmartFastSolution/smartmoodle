@extends('layouts.nav')

@section('title', 'Paralelo '.$paralelo->nombre.' | SmartMoodle')
@section('css')
<style type="text/css">
    :root {
  /* Not my favorite that line-height has to be united, but needed */
  --lh: 1.4rem;
}
.truncate-overflow {
  --max-lines: 3;
  position: relative;
  max-height: calc(var(--lh) * var(--max-lines));
  overflow: hidden;
  padding-right: 1rem; /* space for ellipsis */
}
.truncate-overflow::before {
  position: absolute;
  /*content: "...";*/
  /* tempting... but shows when lines == content */
  /* top: calc(var(--lh) * (var(--max-lines) - 1)); */
  
  /*
  inset-block-end: 0;
  inset-inline-end: 0;
  */
  bottom: 0;
  right: 0;
}
.truncate-overflow::after {
  content: "";
  position: absolute;
  /*
  inset-inline-end: 0;
  */
  right: 0;
  /* missing bottom on purpose*/
  width: 1rem;
  height: 1rem;
  background: white;
}
</style>
@endsection

@section('content')

<section class="content">
    <div class="container">


        <h1 class="font-weight-light" style="color:red;"> @isset ( auth()->user()->instituto->nombre)
            {{ auth()->user()->instituto->nombre}}
            @endisset</h1>

        <h2 class="font-weight-light">
            @foreach(auth()->user()->roles as $role)
            {{$role->name}} | {{ auth()->user()->name, }}
            {{ auth()->user()->apellido, }}
            @endforeach</h2>
        <h2 class="font-weight-bold"> PARALELO {{ $paralelo->nombre }}</h2>
        <h3 class="font-weight-light"> {{ $materia->nombre }}</h3>
    </div>
</section>
<div class="container">
    <div class="card gedf-card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="ml-2">
                        <div class="h5 m-0">Talleres por calificar</div>
                        <div class="h7 text-muted"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
           <table id="myTable" class="table table-hover">

                <thead>
                    <tr>
                        <th width="100">Curso</th>
                        <th width="75">Materia</th>
                        <th width="75"> Taller </th>
                        <th width="100">Alumno </th>
                        <th >Enunciado </th>
                        <th>Vista Taller</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $taller)

                    <tr>
                        <td>{{$taller->cur_nombre}} - {{ $taller->nivel_nombre }}</td>
                        <td>{{$taller->mate_nombre}}</td>
                        <td>{{$taller->nombre}}</td>
                        <td>{{$taller->alumno}}</td>
                        <td>
                            <div class="truncate-overflow">
                            {!!$taller->enunciado!!}
                                
                            </div>
                       {{--      @if ($taller->plantilla_id == 37)
                            Taller de Modulos Contable
                            @else
                            {!!$taller->enunciado!!}
                            @endif --}}
                        </td>
                        <td class="table-button ">
                            <a class="btn btn-info"
                                href="{{route('taller.docente',['plant'=>$taller->plantilla_id,'id'=>$taller->taller_id, 'user'=>$taller->user_id])}}"><i
                                    class="fas fa-eye"></i></a>

                        </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>


<div class="container">
    <div class="card gedf-card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="ml-2">
                        <div class="h5 m-0">Talleres Calificados</div>
                        <div class="h7 text-muted"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="myTable2" class="table table-hover">
                <thead>
                    <tr>
                        <th width="100">Curso</th>
                        <th width="75">Materia</th>
                        <th width="75"> Taller </th>
                        <th width="100">Alumno </th>
                        <th>Enunciado </th>
                        <th>Vista Taller</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($calificado as $taller)
                    <tr>
                        <td>{{$taller->cur_nombre}} - {{ $taller->nivel_nombre }}</td>
                        <td>{{$taller->mate_nombre}}</td>
                        <td>{{$taller->nombre}}</td>
                        <td>{{$taller->alumno}}</td>
                        <td>
                            <div class="truncate-overflow">
                            {!!$taller->enunciado!!}
                                
                            </div>
                          {{--   @if ($taller->plantilla_id == 37)
                            Taller de Modulos Contable
                            @else
                            {!!$taller->enunciado!!}
                            @endif --}}
                        </td>
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
                {{--   {{ $calificado->links() }}--}}

            </div>
        </div>
    </div>
</div>




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
        });
        $('#myTable2').DataTable({
            "info": true,
            "autoWidth": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
});
</script>
@stop