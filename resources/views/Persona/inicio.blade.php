@extends('layouts.nav')
@section('title', 'Usuarios | SmartMoodle')

@section('content')
<section class="content-fluid" id="TabUser">
    <div class="container">
        <div class="btn-group float-right" role="group" aria-label="Basic example">
            <a class="btn btn-info float-right btn" href="{{route('users.create')}}"><i class="fas fa-user-plus"></i>
                Añadir Usuario</a>
        </div>
        <h1 class="font-weight-light">Gestión de Usuarios</h1>

        <table id="myTable" class="table table-hover" style="width:100%">
            <thead>
                <tr>

                    <th>Nombre y Apellido</th>
                    <th>Email</th>
                    <th>Unidad Educativa</th>
                    <th>Rol</th>
                   
                    <th scope="3">Tools</th>
                    
                </tr>
            </thead>
            <tbody>
                
               @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}} {{$user->apellido}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @isset($user->instituto->nombre)
                        {{$user->instituto->nombre}}
                        @endisset
                    </td>
                    <td>
                        @foreach($user->roles as $role)
                        <span class="badge badge-danger"> {{$role->name}}
                        </span>
                        @endforeach
                    </td>
                    
                    <td class="table-button ">
                        <form method="POST" action="{{route('users.destroy', $user->id)}}}">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info btn-sm" href="users/{{ $user['id']}}"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-success btn-sm " href="users/{{ $user['id']}}/edit"><i
                                    class=" fas fa-pencil-alt"></i></a>
                        
                            <button type="submit" class="btn btn-danger btn-sm "><i class="fas fa-trash"></i></button>

                    </td>
                    </form>


                    </td>
                </tr>
                 @endforeach 
            </tbody>
        </table>
    </div>
</section>

@stop

@section('css')

@stop

@section('js')

<script>
$(function() {
    $(document).ready(function() {
        var table = $('#myTable').DataTable({
            "fixedHeader": true,
            "orderCellsTop": false,
            "info": false,
            "autoWidth": true,
            "paging": true,
            "searching": true,
            "ordering": true,
            "responsive": true,


            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });

        $('#myTable thead tr').clone(true).appendTo('#myTable thead');
        $('#myTable thead tr:eq(1) th').each(function(i) {

            var title = $(this).text(); //es el nombre de la columna
            $(this).html('<input type="text" placeholder="Buscar..." />');

            $('input', this).on('keyup change', function() {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });

    });
});
</script>
<script>
let users = @json($users);
console.log(users)
const User = new Vue({
    el: "#TabUser",

    data: {
        users: users,
        estado: '',
    },
    methods: {
        Change(index, id) {
            let user_id = id;
            let estado = this.users[index].users[id].estado;
            this.estado = estado;
            $('#User').modal('show');
        },

        sent: function() {
            var set = this;
            var url = '/sistema/estadouser';

            axios.post(url, {
                estado: set.estado,
            }).then(response => {
                toastr.success(response.data.message, "Smarmoddle", {
                    "timeOut": "3000"
                });

                set.users = [];
                set.users = response.data.users;
                $('#User').modal('show');
            }).catch(function(error) {});
        }
    }


});
</script>

@stop