@extends('backend.layouts.master') @section('title','Admin') @section('content')


<div class="container">
    <div class="col-md-6 offset-md-3">
        <h1 class="display-4 text-center text-info my-3">Edit A Category</h1>
        <form method="post">
            @csrf @if($cat->is_parent != 0)
            <div class="form-group">
                <label for="select">Category Select</label>
                <select class="form-control" id="select" name='parent'>
                    @foreach($parents as $parent)
                    <option value="{{$parent->id}}"
                         <?php echo $cat->is_parent == $parent->id ?'selected':''; ?>>
                         {{$parent->title}}
                    </option>
                    @endforeach
                </select>
            </div>
            @endif
            <div class="form-group">
                <label for="title">Category Name</label>
                <input type="text" class="form-control rounded-0" id="title" name='title' value="{{$cat->title}}">
            </div>
            <div class="float-right">
                <button type="reset" class="btn btn-danger btn-sm rounded-0">Cancel</button>
                <button type="submit" class="btn btn-success btn-sm rounded-0">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection