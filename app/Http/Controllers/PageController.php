<?php

namespace App\Http\Controllers;

use App\Movie;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(){
        $movies = DB::table('movies')->latest('created_at')->paginate(12);
        return view('welcome',compact('movies'));
    }

    public function home(){
        if(Auth::check()){
            if(Auth::user()->hasRole('admin')){
                return redirect('/admin');
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }

    public function view($id){
        $movie = Movie::whereId($id)->first();
        return view('frontend.movie',compact('movie'));
    }

    // public function search(Request $request){
    //     $search = $request->get('search');
    //     $movies = Movie::where('title','like','%'.$search.'%')->get();
    //     return view('frontend.search',compact('movies'));
    // }

    public function search(Request $request){
        $search = $request->get('search');
        $movies = Movie::where('title','like','%'.$search.'%')->paginate(12);
        return view('welcome',compact('movies'));
    }
}
