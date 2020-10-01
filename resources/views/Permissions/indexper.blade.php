@extends('layouts.nav')

@section('title', 'Menú')
@section('content')

<section class="content">
    <div class="container">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-13">
                    <a class="btn btn-info float-right" href="{{route('permissions.create')}}"><i
                            class="fas fa-plus"></i> MENÚ</a>
                    <h1>Permisos de Acceso </h1>
                    <div class="card card-secondary">
                        <div class="card-header">
                            
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Detalle</th>
                                        <th scope="col">Estado</th>
                                        <th></th>
                                        <th scope="col">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($permissions as $permiso)
                                        <th scope="row">{{ $permiso['id']}}</th>
                                        <td>{{ $permiso['namep']}}</td>
                                        <td>{{ $permiso['slug']}}</td>
                                        <td>{{ $permiso['descripcionp']}}</td>
                                        <td>{{ $permiso['estado']}}</td>
                                        <td> </td>
                                        <td class="table-button ">
                                            <a class="btn btn-info"
                                                href="{{route('permissions.show', $permiso->id)}}"><i
                                                    class="fas fa-eye"></i></a>

                                        </td>
                                        <td class="table-button ">
                                            <a class="btn btn-success "
                                                href="{{route('permissions.edit',$permiso->id)}}"><i
                                                    class=" fas fa-pencil-alt"></i></a>
                                        </td>
                                        <td class="table-button ">
                                            <!--metodo delete funciona pero hay que almacenar la variable array en una variable temporal-->
                                            <form method="POST"
                                                action="{{route('permissions.destroy', $permiso->id)}}}">
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
                            {{$permissions->links()}}
                            <!--Table-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@stop

@section('css')

@stop

@section('js')


<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
@stop