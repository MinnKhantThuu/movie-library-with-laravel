@extends('backend.layouts.master')
@section('title','Admin')
@section('content')
<h1 class="text-center">Category View List</h1>
<div class="container">
<a href="{{url('/admin/cat/create')}}" class="btn btn-sm btn-success mb-3">
    Create <i class="fas fa-plus"></i>
</a>

    <table class="table table-bordered">
        <thead class="bg-dark">
          <tr class="text-center">
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Parent</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($cats as $cat)
          <tr class="text-center">
            <th>{{$cat->id}}</th>
            <td>{{$cat->title}}</td>
            <td>
                @if($cat->is_parent == 0)
                <a href="{{url('/admin/cat/create/' . $cat->id)}}" class="btn btn-sm btn-info">
                    Add Sub Club <i class="fas fa-plus"></i>
                </a>
                @else
                <b>
                {{\App\Category::whereId($cat->is_parent)->first()->title}}
                </b>
                @endif
            </td>
            <td>
                @if($cat->deleted_at == null)
                <a href="{{url('admin/cat/edit/' . $cat->id)}}" class="btn btn-sm btn-warning">Edit</a>
                @endif
                @if($cat->is_parent != 0)
                @if($cat->deleted_at == null)
                    <a href="{{url('admin/cat/delete/' . $cat->id)}}" class="btn btn-sm btn-danger">SoftDelete</a>
                @else
                    <a href="{{url('admin/cat/delete/' . $cat->id)}}" class="btn btn-sm btn-dark">Reactive</a>
                @endif
                @endif
                @if($cat->deleted_at != null)
                <a href="{{url('admin/cat/destroy/' . $cat->id)}}" class="btn btn-sm btn-danger">delete</a>
                @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>

@endsection
