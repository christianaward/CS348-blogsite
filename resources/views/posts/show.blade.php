@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-2">
        @if ($errors->any())
            <div class="card bg-danger text-white" style="max-width: 18rem;">
                <div class="card-header"><b>There was an error posting your comment</b></div>
                <div class="card-body">
                <ul>
                    @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            </div>
        @endif
    </div>
    <div class="col-2"></div>
    <div class="col-4">
        <div class="card bg-primary text-white" style="margin-top: 10px;">
            <div class="card-body">
                <h5 class="card-title">
                    <img class="img-circle" src="{{$post->user->avatar}}" alt="User Profile Image">
                    {{ $post->user->username }}
                </h5>
                <p class="card-text">
                    {{ $post->body }}
                </p>
            </div>
        </div>

        <div id="comments">
            <div v-for="comment in comments" class="card bg-info text-white" style="margin-left: 10px;">
                <div class="card-body">
                    <h6 class="card-title">
                        <img class="img-circle" v-bind:src='comment.avatar' alt="User Profile Image">
                        @{{ comment.username }}
                    </h6>
                    @{{ comment.body }}
            </div>
        </div>

        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <div class="card bg-info text-white" style="margin-left: 10px;">
                <div class="card-body">
                    <h6 class="card-title">
                        <img class="img-circle" src="{{ Auth::user()->avatar }}" alt="User Profile Image">
                        {{ Auth::user()->username }}
                        <input name="post_id" type="text" style="visibility: hidden" value="{{$post->id}}">
                    
                    <textarea class="form-control" name="body" placeholder="Your reply" rows="2" maxlength="60"></textarea>
                    <button type="submit" class="btn bg-primary text-white" style="float:right; margin-top:5px;">Comment&nbsp;<i class="fas fa-comment-dots"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-4"></div>

    <script>
        var app = new Vue({
            el: '#comments',
            data: {
                comments: [],
            },
            mounted(){
                axios.get("{{ route('api.comments.index', $post->id) }}")
                .then( response => {
                    this.comments = response.data;
                })
                .catch( response => {
                    console.log(response);
                })
            },
        })
    </script>
@endsection