@extends('backend.layouts.master')
@section('title','Admin create movie')
@section('content')

<h1 class="text-center">Create Movies</h1>
<div class="container">
        <form class="col-md-8 offset-md-2" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="title">Movie Title</label>
                    <input type="text" class="form-control rounded-0" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file rounded-0" id="image" name='image'>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="cat">Movie Type</label>
                    <select class="form-control rounded-0" id="cat" name='movie'>
                      @foreach($movies as $movie)
                      <option value="{{$movie->id}}">{{$movie->title}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="cat">Cast</label>
                    <select class="form-control rounded-0" id="cat" name='cast'>
                      @foreach($casts as $cast)
                      <option value="{{$cast->id}}">{{$cast->title}}</option>
                      @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
              <label for="content">Content</label>
              <textarea class="form-control rounded-0" id="content" name="content" rows="3"></textarea>
            </div>

            <div class="float-right">
                <button type="reset" class="btn btn-danger btn-sm rounded-0">Cancel</button>
                <button type="submit" class="btn btn-success btn-sm rounded-0">Create</button>
            </div>
          </form>
</div>
@endsection
