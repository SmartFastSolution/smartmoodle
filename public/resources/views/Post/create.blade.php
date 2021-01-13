@extends('layouts.nav')

@section('title', 'Unidad Educativa')



@section('content')


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
    <div class="container">
        <div class="card border-0 shadow my-5">

            <div class="card-body p-5">
                <h1 class="font-weight-light">Gestión de Publicaciones</h1>

                <div class="row">
                    <div class="col-md-10">

                        {!! Form::open(['route'=>'posts.store', 'method'=>'POST','files' => true]) !!}
                        <div class="card-body ">
                            @include('Post.form.form')
                        </div>

                      
                        <a href="{{route('posts.index')}}" class="btn btn-primary">Atras</a>
                        <input type="submit" class="btn btn-dark " value="Guardar">
                        {!! Form::close() !!}
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

{!! Html::script('vendor/ckeditor/ckeditor.js') !!}
<script>
    CKEDITOR.replace('body');
</script>


@stop