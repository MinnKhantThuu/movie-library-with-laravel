@extends('backend.layouts.master') @section('title','Admin User Edit') @section('content')


<div class="container">
    <div class="col-md-6 offset-md-3">
        <h1 class="display-4 text-center text-info my-3">Edit User</h1>
        <form method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control rounded-0" id="name" name='name' value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control rounded-0" id="email" name='email' value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control rounded-0" id="password" name='password'>
            </div>
            <div class="float-right">
                <button type="reset" class="btn btn-danger btn-sm rounded-0">Cancel</button>
                <button type="submit" class="btn btn-success btn-sm rounded-0">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection
