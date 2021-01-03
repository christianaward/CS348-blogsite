@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('users.store')}} ">
    @csrf
    <div class="row h-100">
        <div class="col-2">
            @if ($errors->any())
                <div class="card bg-danger text-white" style="max-width: 18rem;">
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
        <div class="col-3">
            <div class="card text-white bg-secondary">
                <div class="card-header">
                    <h5>Create a new account.</h5>
                </div>
                <div class="card-body">
                    <div class="input-group" style="margin-bottom: 40px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold">Username</span>
                        </div>
                        <input type="text" class="form-control" name="username" value="{{ old('username')}}" placeholder="Username"/>
                    </div>
        
                    <div class="input-group" style="margin-bottom: 40px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold">Full Name</span>
                        </div>
                        <input type="text" class="form-control" name="name" value="{{ old('name')}}" placeholder="Full Name"/>
                    </div>
        
                    <div class="input-group" style="margin-bottom: 40px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold">Email</span>
                        </div>
                        <input type="text" class="form-control" name="email" value="{{ old('email')}}" placeholder="Email"/>
                    </div>
        
                    <div class="input-group" style="margin-bottom: 20px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold">Password</span>
                        </div>
                        <input type="password" class="form-control" name="password" placeholder="Password"/>
                    </div>
        
                    <button type="submit" class="btn btn-primary" style="float: right;">Sign up&nbsp;<i class="fas fa-user-plus"></i></button>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">
                    <h5 class="text-white">Choose a profile image.</h5>
                </div>
                <div class="card-body">
                  <h6 class="card-title">Profile Images</h6>
                  <label>
                      <input type="radio" name="avatar" value="/images/borderCollie.jpg">
                      <img class="img-circle" src="/images/borderCollie.jpg" alt="Border Collie">
                  </label>
                  <label>
                    <input type="radio" name="avatar" value="/images/borderTerrier.jpg">
                    <img class="img-circle" src="/images/borderTerrier.jpg" alt="Border Terrier">
                </label>
                <label>
                    <input type="radio" name="avatar" value="/images/dalmatian.jpg">
                    <img class="img-circle" src="/images/dalmatian.jpg" alt="Dalmatian">
                </label>

                <label>
                    <input type="radio" name="avatar" value="/images/germanSheperd.jpg">
                    <img class="img-circle" src="/images/germanSheperd.jpg" alt="German Sheperd">
                </label>
                <label>
                    <input type="radio" name="avatar" value="/images/goldenLab.jpg">
                    <img class="img-circle" src="/images/goldenLab.jpg" alt="Golden Lab">
                </label>
                <label>
                    <input type="radio" name="avatar" value="/images/spaniel.png">
                    <img class="img-circle" src="/images/spaniel.png" alt="Spaniel">
                </label>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</form>
@endsection