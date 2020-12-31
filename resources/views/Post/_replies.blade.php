@foreach ($comments as $comment)
<div class="media mb-4 mt-4">
    <img class="d-flex mr-3 rounded-circle" src="https://img.icons8.com/office/36/000000/person-male.png" alt="">
    <div class="media-body">
        <div class="comment-text"> <span class="username">
                <div class="ml-2">
                    <div class="h5 m-0"> <strong>{{$comment->user->name}} {{$comment->user->apellido}}</strong>
                    </div>
                    <!-- <div class="h9 text-muted">{{$comment->created_at->format('d/m/Y')}}</div> -->
                </div>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div class="comment-text">
                {{$comment->body}}
            </div>
            <div>
                @if($comment->user_id == Auth::id())
                <div class="dropdown">
                    <button class="btn btn-link-dark dropdown-toggle" type="button" id="gedf-drop1"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                        <a class="dropdown-item" href="{{route('comment.edit', $comment->id)}}" data-toggle="modal"
                            data-target="#modal-edit-comment{{$comment->id}}">Editar</a>

                        {!! Form::open(['route'=>['comment.destroy',$comment->id], 'method'=>'DELETE']) !!}
                        <button class="dropdown-item" title="Eliminar">
                            Eliminar
                        </button>
                        {!! Form::close() !!}

                    </div>
                </div>
                @endif
            </div>
        </div>

        {!! Form::open(['route'=>'reply.add', 'method'=>'POST']) !!}
        <form action="#" method="post">
            @csrf
            <div class="img-push">
                <div class="col-sm-10">
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                    @if ($comment->parent_id == null)
                    <div class="input-group input-group-sm mb-0">
                        <input type="text" class="form-control input-sm" name="body"
                            placeholder="Presiona Enter para comentar">
                        <div class="input-group-append">
                            @if ($comment->parent_id == null)
                            <button type="submit" class="btn btn-dark btn-sm" title="Reply">
                                <i class="fas fa-comment-dots"></i> Responder
                            </button>
                            @endif
                        </div>
                    </div>
                    @endif
                    <!-- <div class="action">
                        @if ($comment->parent_id == null)
                        <button type="submit" class="btn btn-dark btn-sm" title="Reply">
                            <i class="fas fa-comment-dots"></i>
                        </button>
                        @endif
                    </div> -->
                </div>
            </div>
        </form>
        {!! Form::close() !!}
        <!-- <div class="action row">
            <div class="ml-1">
                <a href="{{route('comment.edit', $comment->id)}}" class="btn btn-primary btn-xs" title="Editar"
                    data-toggle="modal" data-target="#modal-edit-comment{{$comment->id}}">
                    <i class="fas fa-edit"></i>
                </a>
            </div>
            <div class="ml-1">
                {!! Form::open(['route'=>['comment.destroy',$comment->id], 'method'=>'DELETE']) !!}
                <button class="btn btn-danger btn-xs" title="Eliminar">
                    <i class="fas fa-trash-alt"></i>
                </button>
                {!! Form::close() !!}
            </div>
        </div> -->
        @include('Post._replies',['comments'=>$comment->replies])
    </div>
</div>


{{--<div class="media mb-4 mt-4">
    <img class="d-flex mr-3 rounded-circle" src="https://img.icons8.com/office/36/000000/person-male.png" alt="">
    <div class="media-body">
        <h5 class="mt-0">
            <strong>
                {{$comment->user->name}}
</strong>
{{$comment->created_at->format('d/m/Y')}}
<strong>
    Estado:
</strong>
@if ($comment->status == 'DRAFT')
<i class="fas fa-times" style="color:red;"></i> Pendiente
@else
<i class="fas fa-check" style="color:green;"></i> Aprobado
@endif
</h5>
{{$comment->body}}
{!! Form::open(['route'=>'reply.add', 'method'=>'POST']) !!}
<div class="form-group">
    <input type="hidden" name="post_id" value="{{$post->id}}">
    <input type="hidden" name="comment_id" value="{{$comment->id}}">
    @if ($comment->parent_id == null)
    <textarea class="form-control" name="body" rows="1"></textarea>
    @endif
    <div class="action">
        @if ($comment->parent_id == null)
        <button type="submit" class="btn btn-info btn-xs" title="Reply">
            <i class="fas fa-comment-dots"></i> Responder
        </button>
        @endif

    </div>
</div>
{!! Form::close() !!}
<div class="action row">
    <div class="ml-1">
        <a href="{{route('comment.edit', $comment->id)}}" class="btn btn-primary btn-xs" title="Editar"
            data-toggle="modal" data-target="#modal-edit-comment{{$comment->id}}">
            <i class="fas fa-edit"></i>
        </a>
    </div>
    <div class="ml-1">
        {!! Form::open(['route'=>['comment.destroy',$comment->id], 'method'=>'DELETE']) !!}
        <button class="btn btn-danger btn-xs" title="Eliminar">
            <i class="fas fa-trash-alt"></i>
        </button>
        {!! Form::close() !!}
    </div>
</div>
@include('Post._replies',['comments'=>$comment->replies])
</div>
</div>--}}
@endforeach


@if (isset($comment->replies))
@include('Post.partials._editComments',['comments'=>$comment->replies])
@endif