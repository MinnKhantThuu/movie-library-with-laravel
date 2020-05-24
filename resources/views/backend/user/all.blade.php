@extends('backend.layouts.master') @section('title','Admin Home') @section('content')


<h1 class="text-center">All User View List</h1>
<div class="container">
    <a href="{{url('/admin/user/create')}}" class="btn btn-sm btn-success mb-3">
    Create <i class="fas fa-plus"></i>
</a>

    <table class="table table-bordered">
        <thead class="bg-dark">
            <tr class="text-center">
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="text-center">
                <th>{{$user->id}}</th>
                <td>{{ucfirst($user->name)}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if($user->hasRole('admin'))
                    <a href="{{url('admin/user/edit/' . $user->id)}}" class="btn btn-sm btn-warning rounded-0">Eidt</a>
                    @else
                    @if($user->deleted_at == null)
                    <a href="{{url('admin/user/edit/' . $user->id)}}" class="btn btn-sm btn-warning rounded-0">Eidt</a>
                    <a href="{{url('admin/user/softdelete/' . $user->id)}}" class="btn btn-sm btn-danger rounded-0">Ban</a>
                    @else
                    <a href="{{url('admin/user/softdelete/' . $user->id)}}" class="btn btn-sm btn-dark rounded-0">Reactive</a>
                    @endif
                    @endif



                    @if($user->deleted_at != null)
                    <a href="{{url('admin/user/delete/' . $user->id)}}" class="btn btn-sm btn-danger rounded-0">Delete</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
 @endsection
