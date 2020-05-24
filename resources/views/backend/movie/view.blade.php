@extends('backend.layouts.master') @section('title','Admin') @section('content')
<div class="container">
    <div class="col-md-10 offset-md-1 bg-dark">
        <div class="row m-5">
            <div>
                <img src="{{asset('uploads/'.$movie->image)}}" class="mt-5" style="width:200px;height:250px;" alt="{{$movie->image}}">
            </div>
            <div class="ml-5 mt-5">
                <h1 class="text-danger">{{$movie->title}}</h1>
                <ul class="text-info">
                    <li>Movie Type : {{$movie->mt->title}}</li>
                    <li>Cast : {{$movie->actor->title}}</li>
                </ul>
            </div>
        </div>
        <div class="p-5">
            {{$movie->content}}
        </div>
    </div>
</div>
@endsection
