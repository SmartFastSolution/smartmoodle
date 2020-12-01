<title>TABLA DE DOCENTES GENERALES</title>
<div class="container">
    <h5 style="text-align: center"><strong>TABLA DE DOCENTES GENERALES</strong></h5>
    <table id="myTable1" class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Unidad Educativa</th>
                <th scope="col">Docente</th>
                <th scope="col">Curso</th>
                <th scope="col">Materia</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doc as $do)
            @if($do->materias != null)
            @foreach($do->materias as $ma)

            @if($ma->distribucionmacus != null)
            @foreach($ma->distribucionmacus as $cur)
            <tr>
                <td>{{$do->instituto->nombre}}</td>
                <td>{{$do->user->name}} {{$do->user->apellido}}</td>
                <td>{{$cur->curso->nombre}}</td>
                <td>{{$ma->nombre}}</td>
            </tr>
            @endforeach
            @endif
            @endforeach
            @endif
            @endforeach
        </tbody>
    </table>
</div>