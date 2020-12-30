@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('auth.validate')}} ">
    @csrf
    <div class="row h-100">
        <div class="col-2">
            @if ($errors->any())
                <div class="card bg-danger text-white" style="max-width: 18rem;">
                    <div class="card-header"><b>There was an error logging you in</b></div>
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
        <div class="col-3">
            <h4 class="text-white">Login.</h4>

            <div class="input-group" style="margin-bottom: 40px;">
                <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bold">Username</span>
                </div>
                <input type="text" class="form-control" name="username" value="{{ old('username')}}" placeholder="Username"/>
            </div>

            <div class="input-group" style="margin-bottom: 20px;">
                <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bold">Password</span>
                </div>
                <input type="password" class="form-control" name="password" placeholder="Password"/>
            </div>

            <button type="submit" class="btn btn-primary" style="float: right;">Login&nbsp;<i class="fas fa-sign-in-alt"></i></button>
        </div>
        <div class="col-7"></div>
    </div>
</form>
@endsection