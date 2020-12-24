@extends('layouts.app')

@section('content')
    <div class="row h-100">
        <div class="col-4"></div>
        <div class="col-4" style="margin-bottom: 20px;">
            @foreach ($posts as $post)
                <div class="card bg-primary text-white" style="margin-top: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <img class="img-circle" src="{{$post->user->avatar}}" alt="User Profile Image">
                            {{ $post->user->name }}
                            <button type="button" class="btn text-white" data-toggle="modal" data-target="#commentModal" style="float:right;">Reply&nbsp;<i class="fas fa-comment"></i></button>

                        </h5>
                        <p class="card-text">
                            {{ $post->body }}
                        </p>
                    </div>
                </div>

                @foreach ($post->comments as $comment)
                <div class="card bg-info text-white" style="margin-left: 10px;">
                    <div class="card-body">
                        <h6 class="card-title">
                            <img class="img-circle" src="{{$comment->user->avatar}}" alt="User Profile Image">
                            {{ $comment->user->name }}
                        </h6>
                        <p class="card-text">
                            {{ $comment->body }}
                        </p>
                    </div>
                </div>
                @endforeach
            @endforeach
            <!--
            <div style="margin-top:10px;">
                <span>{{$posts->links()}}</span>
            </div>
        -->
        </div>
        <div class="col-4"></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="commentModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-secondary text-black">
                <div class="modal-body">
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

                    <form>
                        <div class="card bg-info text-white" style="margin-left: 10px;">
                            <div class="card-body">
                                <h6 class="card-title">
                                    <img class="img-circle" src="{{$comment->user->avatar}}" alt="User Profile Image">
                                    {{ $comment->user->name }}
                                </h6>
                                <textarea class="form-control" id="commentText" placeholder="Your reply" rows="2" maxlength="80"></textarea>
                                <button type="button" class="btn bg-primary text-white" style="float:right; margin-top:5px;">Comment&nbsp;<i class="fas fa-comment-dots"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection