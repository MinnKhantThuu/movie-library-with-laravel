@extends('backend.layouts.master')
@section('title','Admin')
@section('content')
<h1 class="text-center text-info mb-3">
    Role & Permission
</h1>
<div class="container">
<table class="table table-bordered">
  <thead>
    <tr class="bg-dark text-center">
      <th scope="col">Id</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Add Role</th>
      <th scope="col">Permission</th>
      <th scope="col">Add Permission</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr class="text-center">
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->email}}</td>
      <td>
          @if(count($user->roles->pluck('name')) > 0)
          {{$user->roles->pluck('name')[0]}}
          @else
          No Role
          @endif
        </td>
        <td>
            <a href="{{url('/admin/roleper/role/' . $user->id)}}" class="btn btn-sm btn-success rounded-0">
                Role <i class="fas fa-plus"></i>
            </a>
        </td>
        <td>
          @if(count($user->permissions->pluck('name')) > 0)
          {{$user->permissions->pluck('name')[0]}}
          @else
          No Permission
          @endif
        </td>
        <td>
            <a href="{{url('/admin/roleper/permission/' . $user->id)}}" class="btn btn-sm btn-success rounded-0">
                Permission <i class="fas fa-plus"></i>
            </a>
        </td>

    </tr>
    @endforeach
  </tbody>
</table>
</div>

@endsection
