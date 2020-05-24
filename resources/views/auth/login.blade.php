@extends('layouts.master') @section('title','Login') @section('content')
<div class="container my-5">
    <div class="col-md-6 offset-md-3">
        <h1 class="display-4 text-center text-info my-3">Login Form</h1>
        <form method="post">
            @csrf
            <div class="form-group">
                <label for="email" class="text-white">Email address</label>
                <input type="email" class="form-control rounded-0" id="email" name='email'>
            </div>
            <div class="form-group" >
                <label for="password" class="text-white">Password</label>
                <input type="password" class="form-control rounded-0" id="password" name='password'>
            </div>
            <div class="float-right">
                <button type="reset" class="btn btn-danger btn-sm rounded-0">Cancel</button>
                <button type="submit" class="btn btn-success btn-sm rounded-0">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection
