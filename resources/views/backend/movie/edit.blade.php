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
                    <input type="text" class="form-control rounded-0" id="title" name="title" value="{{$movie->title}}">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file rounded-0" id="image" name='image'>
                </div>
            </div>
            <input type="hidden" name="old_image" value="{{$movie->image}}">

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="cat">Movie Type</label>
                    <select class="form-control rounded-0" id="cat" name='movie'>
                      @foreach($movietypes as $mt)
                      <option value="{{$mt->id}}" <?php echo $mt->id== $movie->movie_type ?'selected':''; ?> >
                      {{$mt->title}}
                      </option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="cat">Cast</label>
                    <select class="form-control rounded-0" id="cat" name='cast'>
                      @foreach($casts as $cast)
                      <option value="{{$cast->id}}" <?php echo $cast->id == $movie->cast ? 'selected':'' ?> >{{$cast->title}}</option>
                      @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
              <label for="content">Content</label>
              <textarea class="form-control rounded-0" id="content" name="content" rows="3"
              >{{$movie->content}}</textarea>
            </div>

            <div class="float-right">
                <button type="reset" class="btn btn-danger btn-sm rounded-0">Cancel</button>
                <button type="submit" class="btn btn-success btn-sm rounded-0">Update</button>
            </div>
          </form>
</div>
@endsection
