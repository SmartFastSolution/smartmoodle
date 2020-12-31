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
        <div class="card gedf-card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="ml-2">
                            <div class="h5 m-0"> <strong>{{$post->user->name}} {{$post->user->apellido}}</strong>
                            </div>
                            <div class="h7 text-muted">Publicado el {{$post->updated_at->format('d/m/y')}}</div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <h1 class="mt-5">{{$post->nombre}}</h1>
                <br>
                <div class="media m-0">
                    <div class="d-flex mr-3">
                        <img class="img-fluid rounded" src="{{$post->image->url}}" alt="">
                    </div>
                </div>
                <div>
                    <p class="lead">{{$post->abstract}}</p>
                </div>
                <p class="card-text">
                    {!!htmlspecialchars_decode($post->body)!!}
                </p>

                <div class="card-footer">
                    <a href="#" class="card-link"><i class="fa fa-comment"></i> Comentarios</a>
                </div>

                <div class="card my-4">
                    <h5 class="card-header">Comentar:</h5>
                    <div class="card-body">
                        {!! Form::open(['route'=>'comment.add', 'method'=>'POST']) !!}
                        <form class="form-horizontal">
                            @csrf
                            <div class="input-group input-group-sm mb-0">
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <textarea class="form-control" name="body" rows="2"></textarea>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-success">Comentar</button>
                                </div>
                            </div>

                        </form>
                        {!! Form::close() !!}
                    </div>
                </div>
                @include('Post._replies',['comments'=>$post->comments, 'post_id'=>$post->id])
            </div>
        </div>
    </div>
</section>




{{--<section class="content">
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
</section>--}}






@stop
@section('css')
@stop
@section('js')

@stop