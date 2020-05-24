@extends('backend.layouts.master') @section('title','Admin') @section('content')

<h1 class="text-center display-4 text-info mb-5">Movie all List</h1>

<div class="container">
    <div class="row">
        <form class="input-group mb-3 col-md-6" action="/admin/movie/search" method="get">
            <input type="text" class="form-control" name="search">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

        <div class="ml-auto">
            <a href="{{url('admin/movie/create')}}" class="btn btn-sm btn-success rounded-0">
                create <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>
    <div class="row">
        @foreach($movies as $movie)
        <div class="card col-md-3 p-0">
            <img src="{{asset('uploads/'.$movie->image)}}" style="height: 200px;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title text-danger">{{$movie->title}}</h5><br>
                <p class="card-text text-muted">
                    <span class="text-success">Movie Type</span> : <span class="text-dark"> {{$movie->mt->title}} </span> <br>
                    <span class="text-success">Cast</span>: <span class="text-dark">{{$movie->actor->title}} </span>
                </p>
                <p class="card-text text-muted">{{substr($movie->content,0,100)}}...</p>
                <hr>
                <div class="float-right">
                    <a href="{{url('admin/movie/view/' . $movie->id)}}" class="btn btn-sm btn-success">view</a>
                    <a href="{{url('admin/movie/edit/' . $movie->id)}}" class="btn btn-sm btn-warning">edit</a>
                    <a href="{{url('admin/movie/delete/' . $movie->id)}}" class="btn btn-sm btn-danger">delete</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-md-4 offset-md-5">
    {{ $movies->links() }}
    </div>
</div>
</div>



@endsection
