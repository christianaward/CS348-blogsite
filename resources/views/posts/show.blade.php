@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-4"></div>
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

        <form>
            <div class="card bg-info text-white" style="margin-left: 10px;">
                <div class="card-body">
                    <h6 class="card-title">
                        <img class="img-circle" src="{{ Auth::user()->avatar }}" alt="User Profile Image">
                        {{ Auth::user()->username }}
                    </h6>
                    <textarea class="form-control" id="commentText" placeholder="Your reply" rows="2" maxlength="80"></textarea>
                    <button type="button" class="btn bg-primary text-white" style="float:right; margin-top:5px;">Comment&nbsp;<i class="fas fa-comment-dots"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-4"></div>
@endsection