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
                <h1 class="font-weight-light">Detalle de publicación</h1>

                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-8">
                            <h1 class="mt-4">{{$post->nombre}}</h1>
                            <p class="lead">
                                Redactado por
                                <strong>{{$post->user->name}}</strong>
                            </p>
                            <hr>
                            <p>Publicado el {{$post->updated_at->format('d/m/y')}}</p>
                            <hr>
                            <img class="img-fluid rounded" src="{{$post->image->url}}" alt="">
                            <hr>
                            <p class="lead">{{$post->abstract}}</p>
                            <p>
                                {!!htmlspecialchars_decode($post->body)!!}
                            </p>
                            <hr>
                        </div>
                    </div>

                    <div class="card my-4">
                        <h5 class="card-header">Comentar:</h5>
                        <div class="card-body">

                            {!! Form::open(['route'=>'comment.add', 'method'=>'POST']) !!}
                            <div class="form-group">
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <textarea class="form-control" name="body" rows="3"></textarea>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Enviar">
                            {!! Form::close() !!}
                        </div>
                    </div>

                    @include('Post._replies',['comments'=>$post->comments, 'post_id'=>$post->id])
                </div>
            </div>
        </div>
    </div>
</section>



@stop

@section('css')

@stop

@section('js')






@stop