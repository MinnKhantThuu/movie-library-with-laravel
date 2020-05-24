@extends('backend.layouts.master')
@section('title','Role')
@section('content')
<div class="container center">
    <h1 class="display-4 text-primary text-center my-3">{{ucfirst($user->name)}} Role</h1>
    <div class="row">
        <div class="col-md-4 offset-md-1">
            <h1 class="display-5 text-secondary text-center mb-4">Available Roles</h1>
            <ul class="list-group">
                @foreach($roles as $role)
                @if(!$user->hasRole($role))
                <li class="list-group-item">{{$role->name}}
                    <a href="{{url('admin/roleper/role/add/'.$user->id .'/'. $role->name)}}" class="fas fa-plus text-success float-right"></a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
        <div class="col-md-4 offset-md-1">
            <h1 class="display-5 text-secondary text-center mb-4">{{ucfirst($user->name)}}'s Roles</h1>
            <ul class="list-group">
                @foreach($roles as $role)
                @if($user->hasRole($role))
                <li class="list-group-item">{{$role->name}}
                    <a href="{{url('admin/roleper/role/remove/'.$user->id .'/'. $role->name)}}" class="fas fa-minus text-danger float-right"></a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection
