@extends('layouts.app')

@section('content')
    <div class="row h-100">
        <div class="col-4">
        </div>
        <div class="col-4" style="margin-bottom: 20px;">

            <!-- Create post if user is logged in -->
            @if (Auth::check())
            <form method="POST" action="{{ route('posts.store') }}">
                @csrf
                <div class="card bg-dark text-white" style="margin-top: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <img class="img-circle" src="{{ Auth::user()->avatar }}" alt="User Profile Image">
                            {{ Auth::user()->username }}
                            <button type="submit" class="btn bg-primary text-white" style="float:right; margin-top:5px;">Post&nbsp;<i class="fas fa-comment-dots"></i></button>
                        </h5>
                        <p class="card-text">
                            <textarea class="form-control" name="body" placeholder="Your post" rows="2" maxlength="120"></textarea>
                        </p>
                    </div>
                </div>
            </form>
            @endif

            <!-- Loop through Posts in the database displaying them -->
            @foreach ($posts as $post)
                <div class="card bg-primary text-white" style="margin-top: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <img class="img-circle" src="{{$post->user->avatar}}" alt="User Profile Image">
                            {{ $post->user->username }}
                            <a href="{{ route('posts.show',  $post->id) }}" type="button" class="btn text-white" style="float:right;">Reply&nbsp;<i class="fas fa-comment"></i></a>
                            <a href="{{ route('posts.edit',  $post->id) }}" type="button" class="btn text-white" style="float:right;">Edit&nbsp;<i class="fas fa-pencil-alt"></i></a>
                        </h5>
                        <p class="card-text">
                            {{ $post->body }}
                        </p>
                    </div>
                </div>

                <!-- Loop through each Post's comments in the database and display them -->
                @foreach ($post->comments as $comment)
                <div class="card bg-info text-white" style="margin-left: 10px;">
                    <div class="card-body">
                        <h6 class="card-title">
                            <img class="img-circle" src="{{$comment->user->avatar}}" alt="User Profile Image">
                            {{ $comment->user->username }}
                        </h6>
                        <p class="card-text">
                            {{ $comment->body }}
                        </p>
                    </div>
                </div>
                @endforeach
            @endforeach
        </div>
        <div class="col-4">
            <div class="toast float-right" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
                <div class="toast-header">
                  <strong class="mr-auto"><i class="fas fa-info-circle"></i>&nbsp;Info</strong>
                  <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="toast-body">
                    <p>{{ session('message') }}</p>
                </div>
              </div>
        </div>
    </div>

    <script>
        var app = new Vue({
            el: '#comment',
            data: {
                posts: [],
            },
            mounted(){
                axios.get("{{ route('api.posts.index') }}")
                .then( response => {
                    this.posts = response.data;
                })
                .catch( response => {
                    console.log(response);
                })
            },
        })

        function reply_click(clicked_id)
        {
            document.getElementById("post_id").innerHTML = clicked_id;
        }
    </script>
@endsection