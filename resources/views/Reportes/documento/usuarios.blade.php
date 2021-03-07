<div class="container">
    <h5 style="text-align: center"><strong>TABLA DE MATERIAS</strong></h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="vertical-align: middle;" scope="col">Unidad Educativa</th>
                <th style="vertical-align: middle;" scope="col">Nombres</th>
                <th style="vertical-align: middle;" scope="col">Apellidos</th>
                <th style="vertical-align: middle;" scope="col">Correo</th>
                <th style="vertical-align: middle;" scope="col">Rol</th>
                <th style="vertical-align: middle;" scope="col">Estado</th>
                <th style="vertical-align: middle;" scope="col">Ultimo Acceso</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $element)
            <tr>
                <td>{{$element['instituto']}}</td>
                <td>{{$element['user_nombre']}} </td>
                <td>{{ $element['user_apellido'] }}</td>
                <td>{{ $element['email'] }}</td>
                <td class="text-center">{{ $element['role_name'] }}</td>
                <td class="text-center">
                    {{ $element['estado'] }}
                </td>
                <td>
                    @isset ($element['access_at'])
                    {{Carbon\Carbon::parse($element['access_at'])->diffForHumans()}}
                    @else
                    Sin Ingreso
                    @endisset
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>