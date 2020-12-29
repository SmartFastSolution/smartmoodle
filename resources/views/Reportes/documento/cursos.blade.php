<div class="container">
    <h5 style="text-align: center"><strong>TABLA DE DOCENTES GENERALES</strong></h5>
    <table id="myTable4" class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Unidad Educativa</th>
                <th scope="col">Docente</th>
                <th scope="col">Materia</th>
                <th scope="col">Estudiante</th>
                <th scope="col">Curso/Paralelo</th>
                <th scope="col">Ultimo Acceso</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($doc as $do)
            @if($do->materias != null)
            @foreach($do->materias as $ma)
            @if($ma->assignments != null)
            @foreach($ma->assignments as $asig)
            <tr>
                <td>{{$do->instituto->nombre}}</td>
                <td>{{$do->user->name}} {{$do->user->apellido}}</td>
                <td>{{$ma->nombre}}</td>
                <td>{{$asig->user->name}} {{$asig->user->apellido}}</td>
                <td>{{$asig->user->curso->nombre}}-{{$asig->user->nivel->nombre}}</td>
                <td> {{$asig->user->created_at->diffForHumans()}}</td>
            </tr>
            @endforeach
            @endif
            @endforeach
            @endif
            @endforeach
        </tbody>
    </table>
</div>