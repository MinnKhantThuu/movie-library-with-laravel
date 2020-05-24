<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Movie;
use Illuminate\Http\Request;

class AdminMovieController extends Controller
{
    public function index(){
        $movies = Movie::paginate(8);
        return view('backend.movie.all',compact('movies'));
    }

    public function create(){
        $cats = Category::all();
        $movies = Category::where('is_parent',1)->get();
        $casts = Category::where('is_parent',2)->get();
        return view('backend.movie.create',compact('cats','movies','casts'));
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'image'=>'mimes:jpeg,jpg,png,gif|required|max:10000',
            'content'=>'required'
        ]);
        $movie = new Movie();

        $image = $request->file('image');
        $image_name = uniqid() .'_'. $image->getClientOriginalName();
        $image->storeAs('uploads',$image_name);

        $movie->title = $request->get('title');
        $movie->image = $image_name;
        $movie->content = $request->get('content');
        $movie->movie_type = $request->get('movie');
        $movie->cast = $request->get('cast');

        if($movie->save()){
            return redirect('admin/movie')->with('success','Movie is successfully created');
        }else{
            return redirect('admin/movie')->with('error','Fail');
        }
    }

    public function edit($id){
        $movie = Movie::whereId($id)->first();
        $movietypes = Category::where('is_parent',1)->get();
        $casts = Category::where('is_parent',2)->get();
        return view('backend.movie.edit',compact('movie','movietypes','casts'));
    }

    public function update(Request $request , $id){
        $request->validate([
            'title'=>'required',
            'image'=>'mimes:jpeg,jpg,png,gif|max:10000',
            'content'=>'required'
        ]);
        $movie = Movie::whereId($id)->first();

        $old_image = $request->get('old_image');
        if($request->file('image')){
            $image_name = uniqid() .'_'. $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads',$image_name);
            $old_image = $image_name;
        }


        $movie->title = $request->get('title');
        $movie->image = $old_image;
        $movie->content = $request->get('content');
        $movie->movie_type = $request->get('movie');
        $movie->cast = $request->get('cast');

        if($movie->update()){
            return redirect('admin/movie')->with('success','Movie is successfully updated');
        }else{
            return redirect('admin/movie')->with('error','Fail');
        }
    }

    public function delete($id){
        $movie = Movie::whereId($id)->first();
        if($movie->delete()){
            return redirect('admin/movie')->with('success','Movie is successfully Deleted');
        }else{
            return redirect('admin/movie')->with('error','Fail');
        }
    }

    public function view($id){
        $movie = Movie::whereId($id)->first();
        return view('backend.movie.view',compact('movie'));
    }

    public function search(Request $request){
        $search = $request->get('search');
        $movies = Movie::where('title','like','%'. $search .'%' )->paginate(12);
        return view('backend.movie.all',compact('movies'));
    }

}
