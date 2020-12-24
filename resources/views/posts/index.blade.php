@extends('layouts.app')

@section('content')
    <div class="row h-100">
        <div class="col-4"></div>
        <div class="col-4">
            @foreach ($posts as $post)
                <div class="card bg-primary text-white" style="margin-top: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <img class="img-circle" src="{{$post->user->avatar}}" alt="User Profile Image">
                            {{ $post->user->name }}
                        </h5>
                        <p class="card-text">
                            {{ $post->body }}
                        </p>
                    </div>
                </div>

                @foreach ($post->comments as $comment)
                <div class="card bg-info text-white" style="margin-left: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <img class="img-circle" src="{{$comment->user->avatar}}" alt="User Profile Image">
                            {{ $comment->user->name }}
                            <div style="float: right">         
                                <i class="fas fa-level-up-alt"></i>
                            </div>
                        </h5>
                        <p class="card-text">
                            {{ $comment->body }}
                        </p>
                    </div>
                </div>
                @endforeach
            @endforeach
        </div>
        <div class="col-4"></div>
    </div>
@endsection