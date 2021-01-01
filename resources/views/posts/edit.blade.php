@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <form method="POST" action="{{ route('posts.update', $post->id) }}">
            @csrf
            <div class="card bg-dark text-white" style="margin-top: 10px;">
                <div class="card-body">
                    <h5 class="card-title">
                        <img class="img-circle" src="{{ Auth::user()->avatar }}" alt="User Profile Image">
                        {{ Auth::user()->username }}
                        <button type="submit" class="btn bg-primary text-white" style="float:right; margin-top:5px;">Update&nbsp;<i class="fas fa-comment-dots"></i></button>
                    </h5>
                    <p class="card-text">
                        <textarea class="form-control" name="body" rows="2" maxlength="120">{{ $post->body }}</textarea>
                    </p>
                </div>
            </div>
        </form>
    <div class="col-4"></div>
@endsection