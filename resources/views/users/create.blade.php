@extends('layouts.app')

@section('content')
    <div class="row h-100">
        <div class="col-2"></div>
        <div class="col-3">
            <form method="POST" action="{{ route('users.store')}} ">
                @csrf
                <h4 class="text-white">Create a new account.</h4>

                <div class="input-group" style="margin-bottom: 40px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold">Username</span>
                    </div>
                    <input type="text" class="form-control" id="username" placeholder="Username"/>
                </div>

                <div class="input-group" style="margin-bottom: 40px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold">Email</span>
                    </div>
                    <input type="text" class="form-control" id="email" placeholder="Email"/>
                </div>

                <div class="input-group" style="margin-bottom: 20px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold">Password</span>
                    </div>
                    <input type="password" class="form-control" id="password" placeholder="Password"/>
                </div>

                <button type="submit" class="btn btn-primary" style="float: right;">Sign up&nbsp;<i class="fas fa-user-plus"></i></button>
            </form>
        </div>
        <div class="col-7"></div>
    </div>
@endsection