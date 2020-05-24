@extends('backend.layouts.master')
@section('title','Permission')
@section('content')
<div class="container center">
    <h1 class="display-4 text-primary text-center my-3">{{ucfirst($user->name)}} Permission</h1>
    <div class="row">
        <div class="col-md-4 offset-md-1">
            <h1 class="display-5 text-secondary text-center mb-4">Available Permissions</h1>
            <ul class="list-group">
                @foreach($permissions as $permission)
                @if(!$user->hasPermissionTo($permission))
                <li class="list-group-item">{{$permission->name}}
                    <a href="{{url('admin/roleper/permission/add/'.$user->id .'/'. $permission->name)}}" class="fas fa-plus text-success float-right"></a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
        <div class="col-md-4 offset-md-1">
            <h1 class="display-5 text-secondary text-center mb-4">{{ucfirst($user->name)}}'s Permissions</h1>
            <ul class="list-group">
                @foreach($permissions as $permission)
                @if($user->hasPermissionTo($permission))
                <li class="list-group-item">{{$permission->name}}
                    <a href="{{url('admin/roleper/permission/remove/'.$user->id .'/'. $permission->name)}}" class="fas fa-minus text-danger float-right"></a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection
