@extends('backend.layouts.master')
@section('title','Admin')
@section('content')


<div class="container">
    <div class="col-md-6 offset-md-3">
        <h1 class="display-4 text-center text-info my-3">Create A Category</h1>
        <form method="post">
            @csrf
            <div class="form-group">
                <label for="title">Category Name</label>
                <input type="text" class="form-control rounded-0" id="title" name='title'>
            </div>
            <input type="hidden" name="parent" value="
                @if($parent == 0)
                0
                @else
                {{$parent}}
                @endif
            ">
            <div class="float-right">
                <button type="reset" class="btn btn-danger btn-sm rounded-0">Cancel</button>
                <button type="submit" class="btn btn-success btn-sm rounded-0">Create</button>
            </div>
        </form>
    </div>
</div>

@endsection
