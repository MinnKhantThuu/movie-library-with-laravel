@extends('layouts.master') @section('title','film') @section('content')
<h1 class="text-info text-center display-4 my-4">
    All Movie List
</h1>

<div class="my-5 col-md-8 offset-md-2">
        <form action="/search" method="get" class="input-group mb-3">
        <input type="text" class="form-control" name="search" placeholder="search by title">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                <i class="fas fa-search"></i>
            </button>
        </div>
        </form>
</div>

<div class="container">
    <div class="col-md-10 offset-md-1">
        <div class="col-md-12 justify-content-center">
            <div class="row">
                @foreach($movies as $movie)
                <div class="card m-2 p-0 rounded">
                    <a href="{{url('/movies/' . $movie->id)}}">
                            <img src=" {{asset( 'uploads/'. $movie->image)}}" alt="" style="width: 150px;height: 200px;">
                    </a>
                    <span class="text-center bg-dark text-white">{{substr($movie->title,0,17)}}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<div class="col-md-2 offset-md-5 mt-5">
    {{$movies->links()}}
</div>


@endsection
