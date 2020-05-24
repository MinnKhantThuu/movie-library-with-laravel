<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(){
        $users = User::withTrashed()->get();
        return view('backend.user.all',compact('users'))->with('success','Welcome back Sir!');
    }

    public function edit($id){
        $user = User::whereId($id)->first();
        return view('backend.user.edit',compact('user'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'email'=>'email',
            'password'=>'min:8'
        ]);
        $user = User::whereId($id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        if($user->update()){
            return redirect('/admin/user')->with('success','User Update Successfully');
        }else{
            return redirect('/admin/user')->with('error','User Update Failed');
        }
    }

    public function softdelete($id){
        $user = User::whereId($id)->withTrashed()->first();
        if($user->deleted_at == null){
            $user->deleted_at = Carbon::now();
            if($user->update()){
                return redirect('/admin/user')->with('success','User Softdelete Successfully');
            }else{
                return redirect('/admin/user')->with('error','User Softdelete Failed');
            }
        }else{
            $user->deleted_at = null ;
            if($user->update()){
                return redirect('/admin/user')->with('success','User Reactive Successfully');
            }else{
                return redirect('/admin/user')->with('error','User Reactive Failed');
            }
        }
    }

    public function delete($id){
        $user = User::whereId($id)->withTrashed()->first();
        if($user->forceDelete()){
            return redirect('/admin/user')->with('success','User Delete Successfully');
        }else{
            return redirect('/admin/user')->with('error','User Delete Failed');
        }
    }
}
