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
                    <input type="text" class="form-control" name="username" placeholder="Username"/>
                </div>

                <div class="input-group" style="margin-bottom: 40px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold">Full Name</span>
                    </div>
                    <input type="text" class="form-control" name="name" placeholder="Full Name"/>
                </div>

                <div class="input-group" style="margin-bottom: 40px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold">Email</span>
                    </div>
                    <input type="text" class="form-control" name="email" placeholder="Email"/>
                </div>

                <div class="input-group" style="margin-bottom: 20px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold">Password</span>
                    </div>
                    <input type="password" class="form-control" name="password" placeholder="Password"/>
                </div>

                <button type="submit" class="btn btn-primary" style="float: right;">Sign up&nbsp;<i class="fas fa-user-plus"></i></button>
            </form>
        </div>
        <div class="col-3">
            @if ($errors->any())
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header"><b>There was an error creating your account</b></div>
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
        <div class="col-4"></div>
    </div>
@endsection