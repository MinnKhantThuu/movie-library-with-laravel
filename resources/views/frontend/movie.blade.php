@extends('layouts.master') @section('title','Home') @section('content')
<div class="container mt-5">
    <div class="row m-5">
        <div class="">
            <img src="{{asset('uploads/'.$movie->image)}}" class="mt-5 rounded center" style="width:200px;height:250px;" alt="{{$movie->image}}">
        </div>
        <div class="ml-5 col-md-6 offset-3 mt-5 rounded mx-auto">
            <h1 class="text-danger text-center">{{ucfirst($movie->title)}}</h1>
            <ul class="text-success pull-3 text-center">
                <li>Movie Type : {{$movie->mt->title}}</li>
                <li>Cast : {{$movie->actor->title}}</li>
            </ul>
        </div>
    </div>
    <div class="p-5 text-white bg-dark rounded mb-5">
        <p>
            {{$movie->content}}
        </p>
    </div>
</div>
@endsection
