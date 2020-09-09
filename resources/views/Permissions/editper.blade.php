@extends('layouts.master')
@section('title')


@endsection
@section('contenido')



<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar  Permisos</h1>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Parece que hay porblemas o Malas decisiones <br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Formulario Permisos</h3>
                </div>
                <div class="card-body">

                <form method="POST" action="/permisos/{{ $permission->id}}" >
                        @method('PUT')
                        @csrf

                    

                        <div class=" card-body">
                            <div class="form-group">
                                <label for="name"> Name Permission</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Permission Name"
                                    value="{{ $permission->name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="slug">Permission Slug</label>
                                <input type="text" class="form-control" name="slug" tag="slug" id="slug"
                                    placeholder="Permission Slug" value="{{$permission->slug}}">
                            </div>
                            

                           
                    
                            <input type="submit" class="btn btn-dark " value="Guardar">



                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-6">

        </div>
    </div>
</section>





@endsection
@section('script')






@endsection