<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminCatController extends Controller
{
    public function index(){
        $cats = Category::withTrashed()->get();
        return view('backend.cat.all',compact('cats'));
    }

    public function create($parent = 0){
        return view('backend.cat.create',compact('parent'));
    }

    public function store(Request $request){
        $cat = new Category();
        $cat->title = $request->get('title');
        $cat->is_parent = $request->get('parent');
        if($cat->save()){
            return redirect('admin/cat')->with('success','Category Create Sucessfully');
        }else{
            return redirect('admin/cat')->with('error','Category Create Failed');
        }
    }

    public function edit($id){
        $cat = Category::whereId($id)->first();
        $parents = Category::where('is_parent',0)->get();
        return view('backend.cat.edit',compact('cat','parents'));
    }

    public function update(Request $request,$id){
        $cat = Category::whereId($id)->first();
        $cat->title = $request->get('title');
        if($cat->is_parent){
            $cat->is_parent = $request->get('parent');
        }
        if($cat->update()){
            return redirect('admin/cat')->with('success','Category Update Sucessfully');
        }else{
            return redirect('admin/cat')->with('error','Category Update Failed');
        }

    }

    public function delete($id){
        $cat = Category::whereId($id)->withTrashed()->first();
        if($cat->deleted_at == null){
            $cat->deleted_at = Carbon::now();
            if($cat->update()){
                return redirect('admin/cat')->with('success','Category SoftDelete Sucessfully');
            }else{
                return redirect('admin/cat')->with('error','Category SoftDelete Failed');
            }
        }else{
            $cat->deleted_at = null;
            if($cat->update()){
                return redirect('admin/cat')->with('success','Category Reactive Sucessfully');
            }else{
                return redirect('admin/cat')->with('error','Category Reactive Failed');
            }
        }

    }

    public function destroy($id){
        $cat = Category::whereId($id)->withTrashed()->first();
        if($cat->forceDelete()){
            return redirect('admin/cat')->with('success','Category Delete Sucessfully');
        }else{
            return redirect('admin/cat')->with('error','Category Delete Failed');
        }
    }
}
