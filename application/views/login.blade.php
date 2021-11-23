@extends('layouts.master')

@section('content')
<div class="container mt-5">
    
    <div class="row">
        <div class="col-lg-4 col-md-6 text-center  mx-auto">
            <form method="post" action="{{ base_url('index.php/auth/login') }}">
                <div class="mb-3">
                    <h3>Login Page</h3>
                    <hr>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
                </div>
               
                <button type="submit" class="btn btn-primary">Login</button>
              </form>
    </div>
</div>
    
@endsection